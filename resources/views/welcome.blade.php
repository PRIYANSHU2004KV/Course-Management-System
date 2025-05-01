@extends('layouts.app')

@section('title', 'Welcome to Course Management')

@section('content')
    <div class="card">
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="margin-bottom: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#3490dc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                    <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                </svg>
            </div>
            <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 15px; color: #2d3748;">Course Management System</h1>
            <p style="font-size: 1.2rem; color: #4a5568; margin-bottom: 30px; max-width: 700px; margin-left: auto; margin-right: auto;">
                The smart way to manage your educational journey. Connect with peers and teachers for a seamless learning experience.
            </p>
        </div>
        
        <div style="display: flex; justify-content: center; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
            <div style="background-color: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 300px; text-align: center;">
                <h2 style="color: #3490dc; margin-bottom: 20px;">Student Portal</h2>
                <div style="margin-bottom: 20px;">
                    <i class="fas fa-user-graduate" style="font-size: 2.5rem; color: #3490dc; margin-bottom: 15px;"></i>
                    <p style="margin-bottom: 20px; color: #4a5568;">Access your courses, submit assignments, and track your progress.</p>
                </div>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <a href="{{ route('student.login') }}" class="btn" style="width: 100%;">Login as Student</a>
                    <a href="{{ route('student.register') }}" class="btn" style="width: 100%; background-color: white; color: #3490dc; border: 1px solid #3490dc;">Register as Student</a>
                </div>
            </div>
            
            <div style="background-color: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 300px; text-align: center;">
                <h2 style="color: #3490dc; margin-bottom: 20px;">Teacher Portal</h2>
                <div style="margin-bottom: 20px;">
                    <i class="fas fa-chalkboard-teacher" style="font-size: 2.5rem; color: #3490dc; margin-bottom: 15px;"></i>
                    <p style="margin-bottom: 20px; color: #4a5568;">Manage your courses, grade assignments, and engage with students.</p>
                </div>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <a href="{{ route('teacher.login') }}" class="btn" style="width: 100%;">Login as Teacher</a>
                    <a href="{{ route('teacher.register') }}" class="btn" style="width: 100%; background-color: white; color: #3490dc; border: 1px solid #3490dc;">Register as Teacher</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="text-align: center; padding: 30px; margin-top: 20px;">
        <h2 style="margin-bottom: 20px; color: #3490dc;">Why Choose Our Course Management System?</h2>
        <p style="color: #4a5568; margin-bottom: 15px;">Our platform provides everything you need for effective learning and teaching:</p>
        
        <div style="display: flex; justify-content: center; gap: 30px; margin-top: 20px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 200px; max-width: 300px;">
                <div style="color: #3490dc; margin-bottom: 15px;">
                    <i class="fas fa-book-open" style="font-size: 2rem;"></i>
                </div>
                <h3 style="margin-bottom: 10px; color: #2d3748;">Rich Course Content</h3>
                <p style="color: #4a5568;">Access comprehensive materials and resources for effective learning.</p>
            </div>
            
            <div style="flex: 1; min-width: 200px; max-width: 300px;">
                <div style="color: #3490dc; margin-bottom: 15px;">
                    <i class="fas fa-comments" style="font-size: 2rem;"></i>
                </div>
                <h3 style="margin-bottom: 10px; color: #2d3748;">Real-time Communication</h3>
                <p style="color: #4a5568;">Communicate easily with instructors and fellow students.</p>
            </div>
            
            <div style="flex: 1; min-width: 200px; max-width: 300px;">
                <div style="color: #3490dc; margin-bottom: 15px;">
                    <i class="fas fa-chart-line" style="font-size: 2rem;"></i>
                </div>
                <h3 style="margin-bottom: 10px; color: #2d3748;">Progress Tracking</h3>
                <p style="color: #4a5568;">Monitor your learning progress and academic performance.</p>
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate cards on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        // Get all cards and set initial styles
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.style.opacity = 0;
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    });
</script>
@endsection