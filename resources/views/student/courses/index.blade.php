@extends('layouts.app')

@section('title', 'Available Courses')

@section('content')
    <div class="nav">
        <h1>Available Courses</h1>
        <div class="nav-right">
            <a href="{{ route('student.dashboard') }}" class="btn">Dashboard</a>
            <a href="{{ route('student.courses.enrolled') }}" class="btn">My Courses</a>
        </div>
    </div>

    <div class="card">
        <h2>Browse Courses</h2>
        
        @if($courses->count() > 0)
            <ul style="margin-top: 15px; list-style: none;">
                @foreach($courses as $course)
                    <li style="padding: 15px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h3>{{ $course->title }}</h3>
                            <p>{{ $course->description }}</p>
                            <p><small>Instructor: {{ $course->teacher->name }}</small></p>
                        </div>
                        <div>
                            <a href="{{ route('student.courses.show', $course) }}" class="btn">View Details</a>
                            
                            @if(in_array($course->id, $enrolledCourseIds))
                                <span style="margin-left: 10px; color: green;">Enrolled</span>
                            @else
                                <form method="POST" action="{{ route('student.courses.enroll', $course) }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn" style="margin-left: 10px;">Enroll</button>
                                </form>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No courses available at the moment.</p>
        @endif
    </div>
@endsection