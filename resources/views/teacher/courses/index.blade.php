@extends('layouts.app')

@section('title', 'Manage Courses')

@section('content')
    <div class="dashboard-nav">
        <h1>Manage Courses</h1>
        <div class="nav-right">
            <a href="{{ route('teacher.dashboard') }}" class="nav-btn secondary-btn">Dashboard</a>
            <a href="{{ route('teacher.courses.create') }}" class="nav-btn">Create New Course</a>
        </div>
    </div>

    <div class="courses-container">
        <div class="section-header">
            <h2>Your Courses</h2>
        </div>
        
        @if($courses->count() > 0)
            <ul class="courses-list">
                @foreach($courses as $course)
                    <li class="course-item">
                        <div class="course-info">
                            <h3 class="course-title">{{ $course->title }}</h3>
                            <p class="course-description">{{ $course->description }}</p>
                        </div>
                        <div class="course-actions">
                            <a href="{{ route('teacher.courses.show', $course) }}" class="action-btn view-btn">View</a>
                            <a href="{{ route('teacher.courses.edit', $course) }}" class="action-btn edit-btn">Edit</a>
                            <form method="POST" action="{{ route('teacher.courses.destroy', $course) }}" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="empty-state">
                <p>You haven't created any courses yet.</p>
                <a href="{{ route('teacher.courses.create') }}" class="empty-action-btn">Create your first course</a>
            </div>
        @endif
    </div>

    <style>
        /* Navigation Bar */
        .dashboard-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ffffff;
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border-radius: 6px;
            margin-bottom: 25px;
        }

        .dashboard-nav h1 {
            color: #333;
            font-size: 24px;
            margin: 0;
            font-weight: 600;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-btn {
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .nav-btn:hover {
            background-color: #3a7bcc;
        }

        .secondary-btn {
            background-color: #f5f5f5;
            color: #555;
            border: 1px solid #ddd;
        }

        .secondary-btn:hover {
            background-color: #e0e0e0;
            color: #333;
        }

        /* Courses Container */
        .courses-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
        }

        .section-header {
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .section-header h2 {
            color: #333;
            font-size: 20px;
            margin: 0;
            font-weight: 600;
        }

        /* Courses List */
        .courses-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .course-item {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s;
        }

        .course-item:last-child {
            border-bottom: none;
        }

        .course-item:hover {
            background-color: #f9fafc;
        }

        .course-info {
            flex: 1;
        }

        .course-title {
            color: #333;
            margin: 0 0 8px 0;
            font-size: 18px;
            font-weight: 600;
        }

        .course-description {
            color: #666;
            margin: 0;
            font-size: 14px;
            line-height: 1.5;
        }

        /* Course Actions */
        .course-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 8px 14px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
        }

        .view-btn {
            background-color: #f5f5f5;
            color: #555;
            border: 1px solid #ddd;
        }

        .view-btn:hover {
            background-color: #e5e5e5;
            color: #333;
        }

        .edit-btn {
            background-color: #4a90e2;
            color: white;
            border: none;
        }

        .edit-btn:hover {
            background-color: #3a7bcc;
        }

        .delete-form {
            display: inline;
        }

        .delete-btn {
            background-color: #fff;
            color: #e3342f;
            border: 1px solid #e3342f;
        }

        .delete-btn:hover {
            background-color: #e3342f;
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
        }

        .empty-state p {
            color: #666;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .empty-action-btn {
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 18px;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .empty-action-btn:hover {
            background-color: #3a7bcc;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .dashboard-nav {
                flex-direction: column;
                padding: 15px;
            }
            
            .dashboard-nav h1 {
                margin-bottom: 15px;
            }
            
            .nav-right {
                width: 100%;
                justify-content: center;
            }
            
            .course-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .course-info {
                margin-bottom: 15px;
                width: 100%;
            }
            
            .course-actions {
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
@endsection