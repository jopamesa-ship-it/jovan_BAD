<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('landingpage');
});

// Authentication routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Google OAuth routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');

// Dashboard routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/student-dashboard', function () {
        return view('studentdashboard/student-dashboard');
    })->name('student.dashboard');
    
    Route::get('/admin-dashboard', function () {
        return view('admindashboard/admin-dashboard');
    })->name('admin.dashboard');
    
    Route::get('/instructor-dashboard', function () {
        return view('instructordashboard/instructor-dashboard');
    })->name('instructor.dashboard');

    // Admin routes
    Route::get('/admin/users', function () {
        return view('admindashboard/user-management');
    })->name('admin.users');
    
    Route::get('/admin/courses', function () {
        return view('admindashboard/course-management');
    })->name('admin.courses');

    // Course routes for students
    Route::get('/my-courses', [CourseController::class, 'myCourses'])->name('student.courses');
    Route::get('/browse-courses', [CourseController::class, 'browseCourses'])->name('student.browse');
    Route::get('/schedule', [CourseController::class, 'schedule'])->name('student.schedule');
    Route::get('/grades', [CourseController::class, 'grades'])->name('student.grades');
    Route::get('/transcript', [CourseController::class, 'transcript'])->name('student.transcript');
    Route::get('/tuition', [CourseController::class, 'tuition'])->name('student.tuition');
    Route::get('/notifications', [CourseController::class, 'notifications'])->name('student.notifications');
    Route::post('/course/{courseId}/enroll', [CourseController::class, 'enroll'])->name('course.enroll');
    Route::delete('/course/{courseId}/drop', [CourseController::class, 'drop'])->name('course.drop');

    // Instructor routes
    Route::prefix('instructor')->group(function () {
        Route::get('/dashboard', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.dashboard');
        
        Route::get('/courses', function () {
            return view('instructordashboard/my-courses');
        })->name('instructor.courses');
        
        Route::get('/courses/create', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.courses.create');
        
        Route::get('/courses/{id}', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.courses.show');
        
        Route::get('/courses/{id}/edit', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.courses.edit');
        
        Route::get('/courses/{id}/manage', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.courses.manage');
        
        Route::get('/students', function () {
            return view('instructordashboard/students');
        })->name('instructor.students');
        
        Route::get('/students/{id}', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.students.show');
        
        Route::get('/assignments', function () {
            return view('instructordashboard/assignments');
        })->name('instructor.assignments');
        
        Route::get('/assignments/create', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.assignments.create');
        
        Route::get('/assignments/{id}/submissions', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.assignments.submissions');
        
        Route::get('/assignments/{id}/grade', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.assignments.grade');
        
        Route::get('/assignments/pending/{id}', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.assignments.pending');
        
        Route::get('/assignments/proposals/{id}', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.assignments.proposals');
        
        Route::get('/gradebook', function () {
            return view('instructordashboard/gradebook');
        })->name('instructor.gradebook');
        
        Route::get('/materials', function () {
            return view('instructordashboard/materials');
        })->name('instructor.materials');
        
        Route::get('/materials/upload', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.materials.upload');
        
        Route::get('/schedule', function () {
            return view('instructordashboard/schedule');
        })->name('instructor.schedule');
        
        Route::get('/messages', function () {
            return view('instructordashboard/messages');
        })->name('instructor.messages');
        
        Route::get('/messages/{id}', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.messages.show');
        
        Route::get('/analytics', function () {
            return view('instructordashboard/analytics');
        })->name('instructor.analytics');
        
        Route::get('/profile', function () {
            return view('instructordashboard/profile');
        })->name('instructor.profile');
        
        Route::get('/settings', function () {
            return view('instructordashboard/settings');
        })->name('instructor.settings');
        
        Route::get('/notifications', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.notifications');
        
        Route::get('/announcements/create', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.announcements.create');
        
        Route::get('/courses/{id}/syllabus', function () {
            return view('instructordashboard/instructor-dashboard');
        })->name('instructor.courses.syllabus');
    });
});