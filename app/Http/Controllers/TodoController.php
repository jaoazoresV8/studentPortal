<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max:255']);
        auth()->user()->todos()->create([
            'title' => $request->title,
            'due_date' => now()->addDays(7), // Default due date
        ]);
        return back();
    }

    public function toggle(Todo $todo)
    {
        $this->authorizeAccess($todo);
        $todo->update(['is_completed' => !$todo->is_completed]);
        return back();
    }

    public function destroy(Todo $todo)
    {
        $this->authorizeAccess($todo);
        $todo->delete();
        return back();
    }

    private function authorizeAccess(Todo $todo)
    {
        if ($todo->user_id !== auth()->id()) {
            abort(403);
        }
    }
}
