<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $grades = $user->grades()->with('course')->get();

        if ($grades->isEmpty()) {
            // Seed sample grades for all courses for demonstration
            $courses = Course::all();
            foreach ($courses as $course) {
                $prelim = rand(85, 98);
                $midterm = rand(85, 98);
                $semi = rand(85, 98);
                $final = rand(85, 98);
                $avg = ($prelim + $midterm + $semi + $final) / 4;

                Grade::create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'prelim' => $prelim,
                    'midterm' => $midterm,
                    'semi_final' => $semi,
                    'final' => $final,
                    'average' => $avg,
                    'remarks' => $avg >= 75 ? 'Passed' : 'Failed',
                ]);
            }
            $grades = $user->grades()->with('course')->get();
        }

        return view('student.grades.index', compact('grades'));
    }
}
