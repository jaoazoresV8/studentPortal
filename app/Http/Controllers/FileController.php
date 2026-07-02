<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = [
            [
                'id' => 1,
                'name' => 'Academic_Calendar_2026-2027.pdf',
                'size' => '1.2 MB',
                'type' => 'PDF',
                'date' => 'July 01, 2026',
                'icon' => 'M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z'
            ],
            [
                'id' => 2,
                'name' => 'Student_Handbook_v2.pdf',
                'size' => '4.5 MB',
                'type' => 'PDF',
                'date' => 'June 15, 2026',
                'icon' => 'M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z'
            ],
            [
                'id' => 3,
                'name' => 'Enrollment_Form_Template.docx',
                'size' => '850 KB',
                'type' => 'DOCX',
                'date' => 'June 10, 2026',
                'icon' => 'M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z'
            ]
        ];

        return view('student.files.index', compact('files'));
    }

    public function download($id)
    {
        // Simple mock download logic
        $files = [
            1 => 'Academic_Calendar_2026-2027.pdf',
            2 => 'Student_Handbook_v2.pdf',
            3 => 'Enrollment_Form_Template.docx',
        ];

        $fileName = $files[$id] ?? 'document.txt';
        $content = "This is a sample downloadable file for CCDI LMS Portal: " . $fileName;

        return response($content)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    }
}
