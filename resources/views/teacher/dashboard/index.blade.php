@extends('layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Navigation Bar -->
    <div class="dashboard-nav">
        <h1>Teacher Dashboard</h1>
        <div class="nav-right">
            <a href="{{ route('teacher.courses.index') }}" class="nav-btn">Manage Courses</a>
            <span class="welcome-message">Welcome, {{ $teacher->name }}</span>
            <form method="POST" action="{{ route('teacher.logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <!-- Dashboard Stats Cards -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-book"></i>
            </div>
            <div class="stat-content">
                <h3>Active Courses</h3>
                <p class="stat-number">{{ $activeCourses ?? 5 }}</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <h3>Total Students</h3>
                <p class="stat-number">{{ $totalStudents ?? 48 }}</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="stat-content">
                <h3>Assignments</h3>
                <p class="stat-number">{{ $totalAssignments ?? 12 }}</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-comment"></i>
            </div>
            <div class="stat-content">
                <h3>New Messages</h3>
                <p class="stat-number">{{ $newMessages ?? 7 }}</p>
            </div>
        </div>
    </div>

    <!-- Recent Activities Section -->
    <div class="dashboard-section">
        <div class="section-header">
            <h2>Recent Activities</h2>
            <a href="#" class="view-all">View All</a>
        </div>
        <div class="activity-list">
            @forelse($recentActivities ?? [] as $activity)
                <div class="activity-item">
                    <div class="activity-icon {{ $activity->type }}">
                        <i class="fas fa-{{ $activity->icon }}"></i>
                    </div>
                    <div class="activity-details">
                        <p class="activity-text">{{ $activity->description }}</p>
                        <p class="activity-time">{{ $activity->created_at }}</p>
                    </div>
                </div>
            @empty
                <!-- Sample activity items if no activities are provided -->
                <div class="activity-item">
                    <div class="activity-icon submission">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-details">
                        <p class="activity-text">Sarah Johnson submitted assignment "Introduction to Physics"</p>
                        <p class="activity-time">Today, 2:30 PM</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon enrollment">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="activity-details">
                        <p class="activity-text">5 new students enrolled in "Advanced Mathematics"</p>
                        <p class="activity-time">Yesterday, 11:15 AM</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon message">
                        <i class="fas fa-comment"></i>
                    </div>
                    <div class="activity-details">
                        <p class="activity-text">Michael Brown sent you a message regarding course materials</p>
                        <p class="activity-time">Apr 18, 10:05 AM</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Upcoming Classes Section -->
    <div class="dashboard-section">
        <div class="section-header">
            <h2>Upcoming Classes</h2>
            <a href="#" class="view-all">View Schedule</a>
        </div>
        <div class="classes-grid">
            @forelse($upcomingClasses ?? [] as $class)
                <div class="class-card">
                    <div class="class-header">
                        <h3>{{ $class->title }}</h3>
                        <span class="class-date">{{ $class->date }}</span>
                    </div>
                    <div class="class-details">
                        <p><i class="fas fa-clock"></i> {{ $class->time }}</p>
                        <p><i class="fas fa-users"></i> {{ $class->students_count }} Students</p>
                        <p><i class="fas fa-map-marker-alt"></i> {{ $class->location }}</p>
                    </div>
                    <div class="class-actions">
                        <a href="#" class="class-btn">View Details</a>
                    </div>
                </div>
            @empty
                <!-- Sample class cards if no classes are provided -->
                <div class="class-card">
                    <div class="class-header">
                        <h3>Algebra Fundamentals</h3>
                        <span class="class-date">Today</span>
                    </div>
                    <div class="class-details">
                        <p><i class="fas fa-clock"></i> 3:30 PM - 5:00 PM</p>
                        <p><i class="fas fa-users"></i> 18 Students</p>
                        <p><i class="fas fa-map-marker-alt"></i> Room 203</p>
                    </div>
                    <div class="class-actions">
                        <a href="#" class="class-btn">View Details</a>
                    </div>
                </div>
                <div class="class-card">
                    <div class="class-header">
                        <h3>Chemistry Lab</h3>
                        <span class="class-date">Tomorrow</span>
                    </div>
                    <div class="class-details">
                        <p><i class="fas fa-clock"></i> 1:15 PM - 2:45 PM</p>
                        <p><i class="fas fa-users"></i> 12 Students</p>
                        <p><i class="fas fa-map-marker-alt"></i> Science Lab</p>
                    </div>
                    <div class="class-actions">
                        <a href="#" class="class-btn">View Details</a>
                    </div>
                </div>
                <div class="class-card">
                    <div class="class-header">
                        <h3>Literature Analysis</h3>
                        <span class="class-date">Apr 22</span>
                    </div>
                    <div class="class-details">
                        <p><i class="fas fa-clock"></i> 10:00 AM - 11:30 AM</p>
                        <p><i class="fas fa-users"></i> 22 Students</p>
                        <p><i class="fas fa-map-marker-alt"></i> Room 105</p>
                    </div>
                    <div class="class-actions">
                        <a href="#" class="class-btn">View Details</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    /* Main Dashboard Container */
    .dashboard-container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 0 20px;
    }

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
        gap: 20px;
    }

    .welcome-message {
        color: #555;
        font-weight: 500;
        margin: 0 15px;
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

    .logout-form {
        display: inline;
    }

    .logout-btn {
        background-color: #f5f5f5;
        color: #555;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 9px 16px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
    }

    .logout-btn:hover {
        background-color: #e74c3c;
        color: white;
        border-color: #e74c3c;
    }

    /* Stats Cards */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        padding: 20px;
        display: flex;
        align-items: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .stat-icon {
        background-color: rgba(74, 144, 226, 0.1);
        color: #4a90e2;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        font-size: 24px;
    }

    .stat-content h3 {
        color: #555;
        font-size: 16px;
        margin: 0 0 8px 0;
        font-weight: 500;
    }

    .stat-number {
        color: #333;
        font-size: 28px;
        font-weight: 600;
        margin: 0;
    }

    /* Dashboard Sections */
    .dashboard-section {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        padding: 25px;
        margin-bottom: 30px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .section-header h2 {
        color: #333;
        font-size: 20px;
        margin: 0;
        font-weight: 600;
    }

    .view-all {
        color: #4a90e2;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        transition: color 0.3s;
    }

    .view-all:hover {
        color: #3a7bcc;
        text-decoration: underline;
    }

    /* Activity List */
    .activity-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .activity-item {
        display: flex;
        align-items: flex-start;
        padding: 15px;
        border-radius: 6px;
        background-color: #f9fafc;
        transition: background-color 0.3s;
    }

    .activity-item:hover {
        background-color: #f1f4f9;
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: white;
    }

    .activity-icon.submission {
        background-color: #4caf50;
    }

    .activity-icon.enrollment {
        background-color: #ff9800;
    }

    .activity-icon.message {
        background-color: #2196f3;
    }

    .activity-details {
        flex: 1;
    }

    .activity-text {
        margin: 0 0 5px 0;
        color: #333;
    }

    .activity-time {
        margin: 0;
        font-size: 13px;
        color: #888;
    }

    /* Classes Grid */
    .classes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .class-card {
        background-color: #f9fafc;
        border-radius: 8px;
        padding: 20px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .class-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .class-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .class-header h3 {
        color: #333;
        margin: 0;
        font-size: 18px;
        font-weight: 600;
    }

    .class-date {
        background-color: #4a90e2;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }

    .class-details {
        margin-bottom: 15px;
    }

    .class-details p {
        margin: 8px 0;
        color: #555;
        font-size: 14px;
    }

    .class-details i {
        width: 20px;
        text-align: center;
        margin-right: 8px;
        color: #777;
    }

    .class-actions {
        display: flex;
        justify-content: flex-end;
    }

    .class-btn {
        background-color: transparent;
        color: #4a90e2;
        border: 1px solid #4a90e2;
        border-radius: 4px;
        padding: 8px 12px;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s;
    }

    .class-btn:hover {
        background-color: #4a90e2;
        color: white;
    }

    /* Font Awesome CDN Link */
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

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
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }
        
        .welcome-message {
            order: -1;
            width: 100%;
            text-align: center;
            margin-bottom: 15px;
        }
        
        .stats-container {
            grid-template-columns: 1fr;
        }
        
        .classes-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection