<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Account
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin123'),
            'role' => 'admin',
        ]);

        // Additional Users
        User::factory(10)->create([
            'role' => 'staff'
        ]);

        // Seed Courses (Subjects/Lessons)
        $subjects = [
            ['code' => 'IT101', 'name' => 'Introduction to Computing', 'department' => 'CCDI', 'description' => 'Fundamentals of computer hardware and software.'],
            ['code' => 'IT201', 'name' => 'Event Driven Programming', 'department' => 'CCDI', 'description' => 'Advanced UI development using event-based logic.'],
            ['code' => 'IT202', 'name' => 'Data Structures and Algorithms', 'department' => 'CCDI', 'description' => 'Optimizing data storage and processing.'],
            ['code' => 'IT301', 'name' => 'Web Systems and Technologies', 'department' => 'CCDI', 'description' => 'Modern full-stack web development.'],
            ['code' => 'IT302', 'name' => 'Information Management', 'department' => 'CCDI', 'description' => 'Database systems and SQL operations.'],
            ['code' => 'CS101', 'name' => 'Discrete Mathematics', 'department' => 'CCDI', 'description' => 'Mathematical foundations for computer science.'],
            ['code' => 'CS201', 'name' => 'Operating Systems', 'department' => 'CCDI', 'description' => 'Process management, memory, and file systems.'],
            ['code' => 'CS301', 'name' => 'Software Engineering', 'department' => 'CCDI', 'description' => 'Software development lifecycle and patterns.'],
            ['code' => 'GE101', 'name' => 'Ethics in Technology', 'department' => 'CCDI', 'description' => 'Moral implications of digital advancement.'],
            ['code' => 'NET101', 'name' => 'Networking 1', 'department' => 'CCDI', 'description' => 'Basics of CCNA and network protocols.'],
        ];

        foreach ($subjects as $subject) {
            $course = Course::create($subject);

            // Seed 8-12 Students for each course
            Student::factory(rand(8, 12))->create([
                'course_id' => $course->id
            ]);
        }

        $this->call(SettingSeeder::class);
    }
}
