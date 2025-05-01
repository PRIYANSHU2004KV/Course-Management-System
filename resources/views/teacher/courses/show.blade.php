@extends('layouts.app')

@section('title', $course->title)

@section('content')
    <div class="nav">
        <h1>Course Details</h1>
        <div class="nav-right">
            <a href="{{ route('teacher.courses.index') }}" class="btn">Back to Courses</a>
            <a href="{{ route('teacher.courses.edit', $course) }}" class="btn">Edit Course</a>
        </div>
    </div>

    <div class="card">
        <h2>{{ $course->title }}</h2>
        <p style="margin-top: 10px;">{{ $course->description }}</p>
    </div>

    <div class="card">
        <h2>Enrolled Students</h2>
        
        @if($enrolledStudents->count() > 0)
            <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                <thead>
                    <tr>
                        <th style="text-align: left; padding: 10px; border-bottom: 2px solid #ddd;">Name</th>
                        <th style="text-align: left; padding: 10px; border-bottom: 2px solid #ddd;">Email</th>
                        <th style="text-align: left; padding: 10px; border-bottom: 2px solid #ddd;">Status</th>
                        <th style="text-align: left; padding: 10px; border-bottom: 2px solid #ddd;">Enrolled On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrolledStudents as $student)
                        <tr>
                            <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $student->name }}</td>
                            <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $student->email }}</td>
                            <td style="padding: 10px; border-bottom: 1px solid #eee;">
                                @if($student->pivot->is_completed)
                                    <span style="color: green;">Completed</span>
                                @else
                                    <span style="color: orange;">In Progress</span>
                                @endif
                            </td>
                            <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $student->pivot->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No students are enrolled in this course yet.</p>
        @endif
    </div>
@endsection