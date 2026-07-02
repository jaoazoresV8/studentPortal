<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $data = [
            'student_stats' => [
                'total' => Student::count(),
                'active' => Student::where('status', 'Active')->count(),
                'inactive' => Student::where('status', 'Inactive')->count(),
                'graduated' => Student::where('status', 'Graduated')->count(),
            ],
            'course_stats' => Course::withCount('students')->get(),
            'user_role_stats' => User::select('role', DB::raw('count(*) as total'))
                ->groupBy('role')
                ->get(),
            'total_users' => User::count(),
            'monthly_enrollment' => Student::select(
                    DB::raw('MONTHNAME(created_at) as month'),
                    DB::raw('MONTH(created_at) as month_num'),
                    DB::raw('count(*) as total')
                )
                ->whereYear('created_at', date('Y'))
                ->groupBy('month', 'month_num')
                ->orderBy('month_num')
                ->get(),
            'recent_activities' => ActivityLog::with('user')->latest()->take(20)->get(),
        ];

        return view('reports.index', compact('data'));
    }
}
