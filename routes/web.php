<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\VideoViewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

// Home
Route::get('/', function () {return view('welcome');})->name('home');

// Authentication routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});
Route::middleware(['web', 'auth'])->group(function () {
// Logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/home', [DashboardController::class, 'index'])->name('home');
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::get('/teacher', [DashboardController::class, 'teacher'])->name('teacher');
        Route::get('/student', [DashboardController::class, 'student'])->name('student');
        Route::get('/admin', [DashboardController::class, 'admin'])->name('admin');
    });

// Courses
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::post('/courses/enroll/{course}', [CourseController::class, 'enroll'])->name('courses.enroll');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

// Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Enrollments
    Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
    Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
    Route::get('/enrollments/{enrollment}', [EnrollmentController::class, 'show'])->name('enrollments.show');
    Route::get('/enrollments/{enrollment}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');
    Route::put('/enrollments/{enrollment}', [EnrollmentController::class, 'update'])->name('enrollments.update');
    Route::delete('/enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
//video routes
    Route::get('/video_views', [VideoViewController::class, 'index'])->name('video_views.index');
    Route::get('/video_views/create', [VideoViewController::class, 'create'])->name('video_views.create');
    Route::post('/video_views', [VideoViewController::class, 'store'])->name('video_views.store');
    Route::get('/video_views/{video_view}', [VideoViewController::class, 'show'])->name('video_views.show');
    Route::get('/video_views/{video_view}/edit', [VideoViewController::class, 'edit'])->name('video_views.edit');
    Route::put('/video_views/{video_view}', [VideoViewController::class, 'update'])->name('video_views.update');
    Route::delete('/video_views/{video_view}', [VideoViewController::class, 'destroy'])->name('video_views.destroy');

});
