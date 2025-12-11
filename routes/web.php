<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeAttendanceV2Controller;


// redirect root to login
Route::redirect('/', '/login');

// only guests can access login/register pages
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// authenticated area
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');
    // Route::get('/attendance', [AuthController::class, 'attendance'])->name('attendance');
    // Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

    Route::get('/attendance', [EmployeeAttendanceV2Controller::class, 'index'])->name('attendance');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
