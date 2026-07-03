<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'system_name' => 'required|string|max:255',
            'system_logo' => 'nullable|image|max:2048',
            'academic_year' => 'required|string|max:255',
        ]);

        Setting::updateOrCreate(['key' => 'system_name'], ['value' => $request->system_name]);
        Setting::updateOrCreate(['key' => 'academic_year'], ['value' => $request->academic_year]);

        // Clear the settings cache so the navbar updates immediately
        \Illuminate\Support\Facades\Cache::forget('system_settings');

        if ($request->hasFile('system_logo')) {
            // Delete old logo if it exists and is not the default
            $oldLogo = Setting::where('key', 'system_logo')->first()?->value;
            if ($oldLogo && $oldLogo !== 'ccdi_logo.png' && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }

            $path = $request->file('system_logo')->store('system', 'public');
            Setting::updateOrCreate(['key' => 'system_logo'], ['value' => $path]);
        }

        return back()->with('success', 'System settings updated successfully.');
    }
}
