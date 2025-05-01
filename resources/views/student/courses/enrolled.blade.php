@extends('layouts.app')

@section('title', 'My Courses')

@section('content')
    <div class="nav">
        <h1>My Courses</h1>
        <div class="nav-right">
            <a href="{{ route('student.dashboard') }}" class="btn">Dashboard</a>
            <a href="{{ route('student.courses.index') }}" class="btn">Browse Courses</a>
        </div>
    </div>

    <div class="card">
        <h2>Your Enrolled Courses</h2>
        
        @if($enrolledCourses->count() > 0)
            <ul style="margin-top: 15px; list-style: none;">
                @foreach($enrolledCourses as $course)
                    <li style="padding: 15px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h3>{{ $course->title }}</h3>
                            <p>{{ $course->description }}</p>
                            <p><small>Instructor: {{ $course->teacher->name }}</small></p>
                            <p>
                                <strong>Status:</strong> 
                                @if($course->pivot->is_completed)
                                    <span style="color: green;">Completed</span>
                                @else
                                    <span style="color: orange;">In Progress</span>
                                @endif
                            </p>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 10px;">
                            <a href="{{ route('student.courses.show', $course) }}" class="btn">View Details</a>
                            
                            @if($course->pivot->is_completed)
                                <form method="POST" action="{{ route('student.courses.incomplete', $course) }}">
                                    @csrf
                                    <button type="submit" class="btn" style="width: 100%;">Mark as In Progress</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('student.courses.complete', $course) }}">
                                    @csrf
                                    <button type="submit" class="btn" style="width: 100%;">Mark as Complete</button>
                                </form>
                            @endif
                            
                            <form method="POST" action="{{ route('student.courses.leave', $course) }}" onsubmit="return confirm('Are you sure you want to leave this course?');">
                                @csrf
                                <button type="submit" class="btn" style="width: 100%; background-color: #e3342f;">Leave Course</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>You are not enrolled in any courses yet. <a href="{{ route('student.courses.index') }}">Browse available courses</a>.</p>
        @endif
    </div>
@endsection