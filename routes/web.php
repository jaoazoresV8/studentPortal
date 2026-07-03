<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/verify-password', [ProfileController::class, 'verifyPassword'])->name('profile.verify-password');

    // Student Routes
    Route::get('students/trash', [StudentController::class, 'trash'])->name('students.trash');
    Route::post('students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');
    Route::delete('students/{id}/force-delete', [StudentController::class, 'forceDelete'])->name('students.force-delete');
    Route::resource('students', StudentController::class);

    // Course Routes
    Route::get('student/courses', [CourseController::class, 'myCourses'])->name('student.courses');
    Route::get('student/courses/{course}', [CourseController::class, 'studentCourseShow'])->name('student.courses.show');
    Route::resource('courses', CourseController::class);

    // Lesson Routes
    Route::post('lessons/{lesson}/toggle-complete', [App\Http\Controllers\LessonController::class, 'toggleComplete'])->name('lessons.toggle-complete');

    // Grade Routes
    Route::get('student/grades', [App\Http\Controllers\GradeController::class, 'index'])->name('student.grades');

    // Message Routes
    Route::get('student/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('student.messages');

    // File Routes
    Route::get('student/files', [App\Http\Controllers\FileController::class, 'index'])->name('student.files');
    Route::get('student/files/{id}/download', [App\Http\Controllers\FileController::class, 'download'])->name('student.files.download');

    // Support Routes
    Route::get('student/support', [App\Http\Controllers\SupportController::class, 'index'])->name('student.support');

    // User Routes
    Route::resource('users', UserController::class);

    // Report Routes
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');

    // Settings Routes
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');

    // Calendar Routes
    Route::get('calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar.index');

    // Todo Routes
    Route::post('todos', [App\Http\Controllers\TodoController::class, 'store'])->name('todos.store');
    Route::post('todos/{todo}/toggle', [App\Http\Controllers\TodoController::class, 'toggle'])->name('todos.toggle');
    Route::delete('todos/{todo}', [App\Http\Controllers\TodoController::class, 'destroy'])->name('todos.destroy');
});

require __DIR__.'/auth.php';
