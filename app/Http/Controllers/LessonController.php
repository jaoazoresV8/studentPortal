<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function toggleComplete(Lesson $lesson)
    {
        $user = auth()->user();

        if ($user->completedLessons()->where('lesson_id', $lesson->id)->exists()) {
            $user->completedLessons()->detach($lesson->id);
        } else {
            $user->completedLessons()->attach($lesson->id, ['completed_at' => now()]);
        }

        return back();
    }
}
