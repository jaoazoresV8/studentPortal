<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate(['key' => 'system_name'], ['value' => 'Computer Communication Development Institute']);
        Setting::updateOrCreate(['key' => 'system_logo'], ['value' => 'ccdi_logo.png']);
        Setting::updateOrCreate(['key' => 'academic_year'], ['value' => 'AY 2025-2026']);
    }
}
