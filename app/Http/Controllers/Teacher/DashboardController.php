<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $teacher = Teacher::findOrFail(session('teacher_id'));
        $courses = $teacher->courses;
        
        return view('teacher.dashboard.index', compact('teacher', 'courses'));
    }
}