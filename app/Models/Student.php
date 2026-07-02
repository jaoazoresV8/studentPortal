<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'student_number',
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'status',
        'profile_picture',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
