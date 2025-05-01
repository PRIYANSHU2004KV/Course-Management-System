<?php

use App\Http\Controllers\Student\AuthController as StudentAuthController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Teacher\AuthController as TeacherAuthController;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboardController;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Student Routes
Route::prefix('student')->name('student.')->group(function () {
    // Guest routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [StudentAuthController::class, 'login'])->name('login.post');
        Route::get('/register', [StudentAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [StudentAuthController::class, 'register'])->name('register.post');
    });
    
    // Auth routes
    Route::middleware('auth.student')->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [StudentAuthController::class, 'logout'])->name('logout');
        // Course routes
        Route::get('/courses', [StudentCourseController::class, 'index'])->name('courses.index');
            Route::get('/courses/enrolled', [StudentCourseController::class, 'enrolledCourses'])->name('courses.enrolled');
            Route::get('/courses/{course}', [StudentCourseController::class, 'show'])->name('courses.show');
            Route::post('/courses/{course}/enroll', [StudentCourseController::class, 'enroll'])->name('courses.enroll');
            Route::post('/courses/{course}/leave', [StudentCourseController::class, 'leave'])->name('courses.leave');
            Route::post('/courses/{course}/complete', [StudentCourseController::class, 'markComplete'])->name('courses.complete');
            Route::post('/courses/{course}/incomplete', [StudentCourseController::class, 'markIncomplete'])->name('courses.incomplete');
    });
});

// Teacher Routes
Route::prefix('teacher')->name('teacher.')->group(function () {
    // Guest routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [TeacherAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [TeacherAuthController::class, 'login'])->name('login.post');
        Route::get('/register', [TeacherAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [TeacherAuthController::class, 'register'])->name('register.post');
    });
    
    // Auth routes
    Route::middleware('auth.teacher')->group(function () {
        Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [TeacherAuthController::class, 'logout'])->name('logout');


        // course manage routes
        Route::resource('courses', CourseController::class);
    });
});