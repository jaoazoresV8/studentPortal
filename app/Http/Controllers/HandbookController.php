<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandbookController extends Controller
{
    public function index()
    {
        return view('student.handbook.index');
    }
}
