<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'profile_picture', 'student_id'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        // This ensures the email is sent via the notification system.
        // To make it truly "1 sec" fast, make sure your QUEUE_CONNECTION is NOT 'sync' in .env
        $this->notify(new \Illuminate\Auth\Notifications\ResetPassword($token));
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function completedLessons()
    {
        return $this->belongsToMany(Lesson::class)->withTimestamps()->withPivot('completed_at');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
