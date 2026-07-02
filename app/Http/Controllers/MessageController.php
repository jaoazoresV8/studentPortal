<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = [
            [
                'sender' => 'Admin Support',
                'avatar' => 'https://ui-avatars.com/api/?name=Admin+Support&background=A41D31&color=fff',
                'subject' => 'Welcome to CCDI LMS',
                'preview' => 'Hello student! Welcome to your new Learning Management System...',
                'date' => 'July 01, 2026',
                'is_unread' => true
            ],
            [
                'sender' => 'Prof. Juan Dela Cruz',
                'avatar' => 'https://ui-avatars.com/api/?name=Juan+Dela+Cruz&background=012b6e&color=fff',
                'subject' => 'Midterm Project Requirements',
                'preview' => 'Please refer to the attached document for your IT 3C project...',
                'date' => 'June 28, 2026',
                'is_unread' => false
            ],
            [
                'sender' => 'System Notification',
                'avatar' => 'https://ui-avatars.com/api/?name=System&background=0284a3&color=fff',
                'subject' => 'Password Security Update',
                'preview' => 'It is recommended to update your portal password every 3 months...',
                'date' => 'June 25, 2026',
                'is_unread' => false
            ]
        ];

        return view('student.messages.index', compact('messages'));
    }
}
