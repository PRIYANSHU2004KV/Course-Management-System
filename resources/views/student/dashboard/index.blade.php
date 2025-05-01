@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #4e7df9;
        --primary-dark: #3a64d8;
        --secondary-color: #38b2ac;
        --accent-color: #f6ad55;
        --light-gray: #e2e8f0;
        --dark-gray: #2d3748;
        --error-color: #e53e3e;
        --success-color: #38a169;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .dashboard-title {
        font-size: 1.875rem;
        font-weight: 600;
        color: var(--dark-gray);
    }

    .dark .dashboard-title {
        color: #f7fafc;
    }

    .nav-right {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .welcome-text {
        font-size: 0.875rem;
        font-weight: 500;
        color: #718096;
        margin-right: 0.5rem;
    }

    .dark .welcome-text {
        color: #a0aec0;
    }

    .btn {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: #ffffff;
        border: none;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
    }

    .btn-secondary {
        background-color: var(--secondary-color);
        color: #ffffff;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #2c9a94;
    }

    .btn-danger {
        background-color: var(--error-color);
        color: #ffffff;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c53030;
    }

    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 1.25rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .dark .stat-card {
        background-color: #1a202c;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3), 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.08);
    }

    .stat-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: rgba(78, 125, 249, 0.1);
        border-radius: 8px;
        margin-bottom: 0.75rem;
    }

    .stat-icon svg {
        width: 20px;
        height: 20px;
        color: var(--primary-color);
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark-gray);
        margin-bottom: 0.25rem;
    }

    .dark .stat-value {
        color: #f7fafc;
    }

    .stat-label {
        font-size: 0.875rem;
        color: #718096;
    }

    .dark .stat-label {
        color: #a0aec0;
    }

    .section-card {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
    }

    .dark .section-card {
        background-color: #1a202c;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3), 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--dark-gray);
    }

    .dark .section-title {
        color: #f7fafc;
    }

    .view-all {
        font-size: 0.875rem;
        color: var(--primary-color);
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .view-all:hover {
        text-decoration: underline;
    }

    .view-all svg {
        width: 16px;
        height: 16px;
        margin-left: 0.25rem;
    }

    .course-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .course-item {
        display: flex;
        border-radius: 8px;
        overflow: hidden;
        background-color: #f7fafc;
        transition: all 0.3s ease;
    }

    .dark .course-item {
        background-color: #2d3748;
    }

    .course-item:hover {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .course-thumbnail {
        width: 80px;
        height: 80px;
        object-fit: cover;
        background-color: var(--light-gray);
    }

    .course-thumbnail-placeholder {
        width: 80px;
        height: 80px;
        background-color: var(--light-gray);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .dark .course-thumbnail-placeholder {
        background-color: #4a5568;
    }

    .course-thumbnail-placeholder svg {
        color: #a0aec0;
        width: 32px;
        height: 32px;
    }

    .course-info {
        padding: 1rem;
        flex-grow: 1;
    }

    .course-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
        color: var(--dark-gray);
    }

    .dark .course-title {
        color: #f7fafc;
    }

    .course-meta {
        display: flex;
        font-size: 0.75rem;
        color: #718096;
    }

    .dark .course-meta {
        color: #a0aec0;
    }

    .meta-item {
        display: flex;
        align-items: center;
        margin-right: 1rem;
    }

    .meta-item svg {
        width: 12px;
        height: 12px;
        margin-right: 0.25rem;
    }

    .progress-wrapper {
        margin-top: 0.5rem;
    }

    .progress-bar {
        height: 6px;
        background-color: var(--light-gray);
        border-radius: 3px;
        overflow: hidden;
    }

    .dark .progress-bar {
        background-color: #4a5568;
    }

    .progress-fill {
        height: 100%;
        background-color: var(--primary-color);
        border-radius: 3px;
    }

    .progress-text {
        font-size: 0.75rem;
        color: #718096;
        margin-top: 0.25rem;
        text-align: right;
    }

    .dark .progress-text {
        color: #a0aec0;
    }

    .empty-courses {
        text-align: center;
        padding: 2rem 1rem;
    }

    .empty-courses svg {
        width: 48px;
        height: 48px;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .empty-courses-title {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--dark-gray);
    }

    .dark .empty-courses-title {
        color: #f7fafc;
    }

    .empty-courses-message {
        color: #718096;
        margin-bottom: 1.5rem;
        font-size: 0.875rem;
    }

    .dark .empty-courses-message {
        color: #a0aec0;
    }

    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .nav-right {
            width: 100%;
            flex-wrap: wrap;
        }
        
        .dashboard-stats {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }
    }

    @media (max-width: 640px) {
        .dashboard-container {
            padding: 1rem;
        }
        
        .dashboard-stats {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] p-6 lg:p-8 min-h-screen">
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Student Dashboard</h1>
            <div class="nav-right">
                <a href="{{ route('student.courses.index') }}" class="btn btn-primary">Browse Courses</a>
                <a href="{{ route('student.courses.enrolled') }}" class="btn btn-secondary">My Courses</a>
                <span class="welcome-text">Welcome, {{ $student->name }}</span>
                <form method="POST" action="{{ route('student.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>

        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                    </svg>
                </div>
                <div class="stat-value">{{ $enrolledCourses->count() ?? 0 }}</div>
                <div class="stat-label">Enrolled Courses</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="7"></circle>
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                    </svg>
                </div>
                <div class="stat-value">{{ $completedCourses ?? 0 }}</div>
                <div class="stat-label">Completed Courses</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <div class="stat-value">{{ $totalHours ?? 0 }}</div>
                <div class="stat-label">Hours Spent Learning</div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-header">
                <h2 class="section-title">In Progress Courses</h2>
                <a href="{{ route('student.courses.enrolled') }}" class="view-all">
                    View All
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>

            @if(isset($enrolledCourses) && $enrolledCourses->count() > 0)
                <div class="course-list">
                    @foreach($enrolledCourses->take(3) as $course)
                        <div class="course-item">
                            @if(isset($course->thumbnail))
                                <img src="{{ asset('storage/' . $course->thumbnail) }}" class="course-thumbnail" alt="{{ $course->title }}">
                            @else
                                <div class="course-thumbnail-placeholder">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                                        <line x1="7" y1="2" x2="7" y2="22"></line>
                                        <line x1="17" y1="2" x2="17" y2="22"></line>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                    </svg>
                                </div>
                            @endif
                            <div class="course-info">
                                <h3 class="course-title">{{ $course->title }}</h3>
                                <div class="course-meta">
                                    <div class="meta-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        {{ $course->lessons_count ?? 0 }} Lessons
                                    </div>
                                    <div class="meta-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                            <polyline points="10 9 9 9 8 9"></polyline>
                                        </svg>
                                        {{ $course->completed_lessons ?? 0 }}/{{ $course->lessons_count ?? 0 }} Completed
                                    </div>
                                </div>
                                <div class="progress-wrapper">
                                    @php
                                        $progress = isset($course->lessons_count) && $course->lessons_count > 0 
                                            ? round(($course->completed_lessons ?? 0) / $course->lessons_count * 100) 
                                            : 0;
                                    @endphp
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: {{ $progress }}%"></div>
                                    </div>
                                    <div class="progress-text">{{ $progress }}% Complete</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-courses">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                    </svg>
                    <h3 class="empty-courses-title">No Courses Yet</h3>
                    <p class="empty-courses-message">You haven't enrolled in any courses yet. Start learning today!</p>
                    <a href="{{ route('student.courses.index') }}" class="btn btn-primary">Browse Courses</a>
                </div>
            @endif
        </div>

        <div class="section-card">
            <div class="section-header">
                <h2 class="section-title">Recommended Courses</h2>
                <a href="{{ route('student.courses.index') }}" class="view-all">
                    Browse All
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>

            @if(isset($recommendedCourses) && $recommendedCourses->count() > 0)
                <div class="course-list">
                    @foreach($recommendedCourses->take(3) as $course)
                        <div class="course-item">
                            @if(isset($course->thumbnail))
                                <img src="{{ asset('storage/' . $course->thumbnail) }}" class="course-thumbnail" alt="{{ $course->title }}">
                            @else
                                <div class="course-thumbnail-placeholder">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                                        <line x1="7" y1="2" x2="7" y2="22"></line>
                                        <line x1="17" y1="2" x2="17" y2="22"></line>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                    </svg>
                                </div>
                            @endif
                            <div class="course-info">
                                <h3 class="course-title">{{ $course->title }}</h3>
                                <div class="course-meta">
                                    <div class="meta-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        {{ $course->teacher->name ?? 'Teacher' }}
                                    </div>
                                    <div class="meta-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                        </svg>
                                        {{ $course->rating ?? '0.0' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-courses">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <p class="empty-courses-message">We'll recommend courses based on your interests soon.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add any client-side functionality here
        console.log('Student dashboard loaded');
    });
</script>
@endsection