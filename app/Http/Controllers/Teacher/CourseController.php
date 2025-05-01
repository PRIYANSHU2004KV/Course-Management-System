<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     */
    public function index()
    {
        $teacher = Teacher::findOrFail(session('teacher_id'));
        $courses = $teacher->courses;
        
        return view('teacher.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('teacher.courses.create');
    }

    /**
     * Store a newly created course in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $teacherId = session('teacher_id');
        
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'teacher_id' => $teacherId,
        ]);

        return redirect()->route('teacher.courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified course.
     */
    public function show(Course $course)
    {
        // Check if the course belongs to the authenticated teacher
        if ($course->teacher_id != session('teacher_id')) {
            return redirect()->route('teacher.courses.index')->with('error', 'Unauthorized access.');
        }

        $enrolledStudents = $course->students;
        
        return view('teacher.courses.show', compact('course', 'enrolledStudents'));
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit(Course $course)
    {
        // Check if the course belongs to the authenticated teacher
        if ($course->teacher_id != session('teacher_id')) {
            return redirect()->route('teacher.courses.index')->with('error', 'Unauthorized access.');
        }
        
        return view('teacher.courses.edit', compact('course'));
    }

    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, Course $course)
    {
        // Check if the course belongs to the authenticated teacher
        if ($course->teacher_id != session('teacher_id')) {
            return redirect()->route('teacher.courses.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('teacher.courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified course from storage.
     */
    public function destroy(Course $course)
    {
        // Check if the course belongs to the authenticated teacher
        if ($course->teacher_id != session('teacher_id')) {
            return redirect()->route('teacher.courses.index')->with('error', 'Unauthorized access.');
        }

        $course->delete();

        return redirect()->route('teacher.courses.index')->with('success', 'Course deleted successfully.');
    }
}