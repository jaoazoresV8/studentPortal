<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function myCourses(Request $request)
    {
        $query = Course::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%");
            });
        }

        $courses = $query->latest()->paginate(10)->withQueryString();
        return view('student.courses.index', compact('courses'));
    }

    public function studentCourseShow(Course $course)
    {
        $course->load(['lessons' => function($q) {
            $q->orderBy('order');
        }]);

        $completedLessons = auth()->user()->completedLessons()->pluck('lesson_id')->toArray();

        return view('student.courses.show', compact('course', 'completedLessons'));
    }

    public function index(Request $request)
    {
        $query = Course::withCount('students');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%");
            });
        }

        $courses = $query->latest()->paginate(10)->withQueryString();
        return view('courses.index', compact('courses'));
    }

    public function show(Course $course, Request $request)
    {
        $query = $course->students();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('student_number', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $students = $query->latest()->paginate(10)->withQueryString();
        return view('courses.show', compact('course', 'students'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:courses,code',
            'name' => 'required',
            'department' => 'required',
            'description' => 'nullable',
        ]);

        $course = Course::create($validated);

        // Create sample lessons
        $course->lessons()->createMany([
            ['title' => 'Introduction to ' . $course->name, 'content' => 'Sample content for lesson 1. This is a basic introduction.', 'order' => 1],
            ['title' => 'Core Concepts', 'content' => 'Deep dive into the main concepts of the course.', 'order' => 2],
            ['title' => 'Advanced Techniques', 'content' => 'Exploring complex implementation details.', 'order' => 3],
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Course Created',
            'description' => "Created course: {$course->code} - {$course->name} with sample lessons.",
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully with sample lessons.');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'code' => 'required|unique:courses,code,' . $course->id,
            'name' => 'required',
            'department' => 'required',
            'description' => 'nullable',
        ]);

        $course->update($validated);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Course Updated',
            'description' => "Updated course: {$course->code}",
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $courseCode = $course->code;
        $course->delete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Course Deleted',
            'description' => "Deleted course: {$courseCode}",
        ]);

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
