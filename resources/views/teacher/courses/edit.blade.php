@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="nav">
        <h1>Edit Course</h1>
        <div class="nav-right">
            <a href="{{ route('teacher.courses.index') }}" class="btn">Back to Courses</a>
        </div>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('teacher.courses.update', $course) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Course Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}" required>
                @error('title')
                    <span style="color: red; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Course Description</label>
                <textarea id="description" name="description" rows="5" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>{{ old('description', $course->description) }}</textarea>
                @error('description')
                    <span style="color: red; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Update Course</button>
            </div>
        </form>
    </div>
@endsection