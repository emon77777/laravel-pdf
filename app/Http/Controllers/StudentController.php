<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function Index()
    {
        return view('student');
    }

    public function allStudent()
    {
        return view('studentlist');
    }
}
