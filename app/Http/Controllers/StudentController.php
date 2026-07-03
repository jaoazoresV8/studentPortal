<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('course');

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
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_number' => 'required|unique:students,student_number',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email|unique:users,email',
            'contact_number' => 'required',
            'status' => 'required|in:Active,Inactive,Graduated',
            'profile_picture' => 'nullable|image|max:2048',
            'password' => 'required|min:8',
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('students', 'public');
            $validated['profile_picture'] = $path;
        }

        $student = Student::create($validated);

        // Create associated User account
        User::create([
            'name' => $student->first_name . ' ' . $student->last_name,
            'email' => $student->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'student_id' => $student->student_number,
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Student Created',
            'description' => "Added student: {$student->first_name} {$student->last_name} ({$student->student_number})",
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_number' => 'required|unique:students,student_number,' . $student->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'contact_number' => 'required',
            'status' => 'required|in:Active,Inactive,Graduated',
            'profile_picture' => 'nullable|image|max:2048',
            'password' => 'nullable|min:8',
        ]);

        $oldEmail = $student->email;
        $oldStudentNumber = $student->student_number;

        if ($request->hasFile('profile_picture')) {
            if ($student->profile_picture) {
                Storage::disk('public')->delete($student->profile_picture);
            }
            $path = $request->file('profile_picture')->store('students', 'public');
            $validated['profile_picture'] = $path;
        }

        $student->update($validated);

        // Update associated User account
        $user = User::where('student_id', $oldStudentNumber)->orWhere('email', $oldEmail)->first();
        if ($user) {
            $userData = [
                'name' => $student->first_name . ' ' . $student->last_name,
                'email' => $student->email,
                'student_id' => $student->student_number,
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user->update($userData);
        }

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Student Updated',
            'description' => "Updated student: {$student->student_number}",
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $studentName = $student->first_name . ' ' . $student->last_name;
        $student->delete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Student Soft Deleted',
            'description' => "Soft deleted student: {$studentName}",
        ]);

        return redirect()->route('students.index')->with('success', 'Student moved to trash.');
    }

    public function trash(Request $request)
    {
        $query = Student::onlyTrashed()->with('course');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('student_number', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $students = $query->paginate(10)->withQueryString();
        return view('students.trash', compact('students'));
    }

    public function restore($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Student Restored',
            'description' => "Restored student: {$student->student_number}",
        ]);

        return redirect()->route('students.trash')->with('success', 'Student restored successfully.');
    }

    public function forceDelete($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        if ($student->profile_picture) {
            Storage::disk('public')->delete($student->profile_picture);
        }
        $student->forceDelete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'Student Permanently Deleted',
            'description' => "Permanently deleted student record",
        ]);

        return redirect()->route('students.trash')->with('success', 'Student record deleted permanently.');
    }
}
