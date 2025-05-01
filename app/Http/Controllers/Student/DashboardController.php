<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::findOrFail(session('student_id'));
        $enrolledCourses = $student->courses;
        
        return view('student.dashboard.index', compact('student', 'enrolledCourses'));
    }
}