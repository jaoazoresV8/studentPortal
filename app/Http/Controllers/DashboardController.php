<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'student') {
            $todos = auth()->user()->todos ?? collect();
            if ($todos->isEmpty()) {
                // Seed some initial todos for demo if empty
                \App\Models\Todo::create([
                    'user_id' => auth()->id(),
                    'title' => 'Submit IT 3C Project',
                    'due_date' => '2025-05-30',
                ]);
                \App\Models\Todo::create([
                    'user_id' => auth()->id(),
                    'title' => 'Read Chapter 5 - Database Systems',
                    'due_date' => '2025-05-31',
                ]);
                \App\Models\Todo::create([
                    'user_id' => auth()->id(),
                    'title' => 'Quiz 2 - Web Systems',
                    'due_date' => '2025-06-02',
                ]);
                $todos = auth()->user()->todos;
            }

            $courses = \App\Models\Course::latest()->take(4)->get();

            return view('student.dashboard', compact('todos', 'courses'));
        }

        $stats = [
            'total_students' => Student::count(),
            'total_courses' => Course::count(),
            'active_students' => Student::where('status', 'Active')->count(),
            'recent_students' => Student::with('course')->latest()->take(5)->get(),
            'recent_logs' => ActivityLog::with('user')->latest()->take(10)->get(),
        ];

        return view('dashboard', compact('stats'));
    }
}
