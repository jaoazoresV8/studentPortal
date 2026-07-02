<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'department',
        'description',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }

    public function getProgressAttribute()
    {
        if (!auth()->check()) return 0;

        $totalLessons = $this->lessons()->count();
        if ($totalLessons === 0) return 0;

        $completedCount = auth()->user()->completedLessons()
            ->whereIn('lesson_id', $this->lessons()->pluck('id'))
            ->count();

        return round(($completedCount / $totalLessons) * 100);
    }
}
