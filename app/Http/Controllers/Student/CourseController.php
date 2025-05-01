<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of available courses.
     */
    public function index()
    {
        $courses = Course::all();
        $student = Student::findOrFail(session('student_id'));
        $enrolledCourseIds = $student->courses->pluck('id')->toArray();
        
        return view('student.courses.index', compact('courses', 'enrolledCourseIds'));
    }

    /**
     * Display a list of courses the student is enrolled in.
     */
    public function enrolledCourses()
    {
        $student = Student::findOrFail(session('student_id'));
        $enrolledCourses = $student->courses;
        
        return view('student.courses.enrolled', compact('enrolledCourses'));
    }

    /**
     * Enroll the student in a course.
     */
    public function enroll(Course $course)
    {
        $student = Student::findOrFail(session('student_id'));
        
        // Check if already enrolled
        if ($student->courses->contains($course->id)) {
            return redirect()->route('student.courses.index')->with('error', 'You are already enrolled in this course.');
        }
        
        // Enroll in the course
        $student->courses()->attach($course->id, ['is_completed' => false]);
        
        return redirect()->route('student.courses.enrolled')->with('success', 'Successfully enrolled in the course.');
    }

    /**
     * Leave a course.
     */
    public function leave(Course $course)
    {
        $student = Student::findOrFail(session('student_id'));
        
        // Check if enrolled
        if (!$student->courses->contains($course->id)) {
            return redirect()->route('student.courses.enrolled')->with('error', 'You are not enrolled in this course.');
        }
        
        // Leave the course
        $student->courses()->detach($course->id);
        
        return redirect()->route('student.courses.enrolled')->with('success', 'Successfully left the course.');
    }

    /**
     * Mark a course as completed.
     */
    public function markComplete(Course $course)
    {
        $student = Student::findOrFail(session('student_id'));
        
        // Check if enrolled
        if (!$student->courses->contains($course->id)) {
            return redirect()->route('student.courses.enrolled')->with('error', 'You are not enrolled in this course.');
        }
        
        // Mark as completed
        $student->courses()->updateExistingPivot($course->id, ['is_completed' => true]);
        
        return redirect()->route('student.courses.enrolled')->with('success', 'Course marked as completed.');
    }

    /**
     * Mark a course as incomplete (in progress).
     */
    public function markIncomplete(Course $course)
    {
        $student = Student::findOrFail(session('student_id'));
        
        // Check if enrolled
        if (!$student->courses->contains($course->id)) {
            return redirect()->route('student.courses.enrolled')->with('error', 'You are not enrolled in this course.');
        }
        
        // Mark as incomplete
        $student->courses()->updateExistingPivot($course->id, ['is_completed' => false]);
        
        return redirect()->route('student.courses.enrolled')->with('success', 'Course marked as in progress.');
    }

    /**
     * Display details of a specific course.
     */
    public function show(Course $course)
    {
        $student = Student::findOrFail(session('student_id'));
        $isEnrolled = $student->courses->contains($course->id);
        $isCompleted = false;
        
        if ($isEnrolled) {
            $pivot = $student->courses->find($course->id)->pivot;
            $isCompleted = $pivot->is_completed;
        }
        
        return view('student.courses.show', compact('course', 'isEnrolled', 'isCompleted'));
    }
}