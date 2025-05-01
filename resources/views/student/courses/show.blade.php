@extends('layouts.app')

@section('title', $course->title)

@section('content')
    <div class="nav">
        <h1>Course Details</h1>
        <div class="nav-right">
            <a href="{{ route('student.courses.index') }}" class="btn">Browse Courses</a>
            <a href="{{ route('student.courses.enrolled') }}" class="btn">My Courses</a>
        </div>
    </div>

    <div class="card">
        <h2>{{ $course->title }}</h2>
        <p style="margin-top: 10px;">{{ $course->description }}</p>
        <p style="margin-top: 10px;"><strong>Instructor:</strong> {{ $course->teacher->name }}</p>
        
        <div style="margin-top: 20px;">
            @if($isEnrolled)
                <div style="margin-bottom: 15px;">
                    <strong>Status:</strong> 
                    @if($isCompleted)
                        <span style="color: green;">Completed</span>
                    @else
                        <span style="color: orange;">In Progress</span>
                    @endif
                </div>
                
                <div style="display: flex; gap: 10px;">
                    @if($isCompleted)
                        <form method="POST" action="{{ route('student.courses.incomplete', $course) }}">
                            @csrf
                            <button type="submit" class="btn">Mark as In Progress</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('student.courses.complete', $course) }}">
                            @csrf
                            <button type="submit" class="btn">Mark as Complete</button>
                        </form>
                    @endif
                    
                    <form method="POST" action="{{ route('student.courses.leave', $course) }}" onsubmit="return confirm('Are you sure you want to leave this course?');">
                        @csrf
                        <button type="submit" class="btn" style="background-color: #e3342f;">Leave Course</button>
                    </form>
                </div>
            @else
                <form method="POST" action="{{ route('student.courses.enroll', $course) }}">
                    @csrf
                    <button type="submit" class="btn">Enroll in Course</button>
                </form>
            @endif
        </div>
    </div>
@endsection