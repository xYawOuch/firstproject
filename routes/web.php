<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    Route::get('/home', [AuthController::class, 'showHome'])->name('home');
    Route::get('/attendance', [AuthController::class, 'attendance'])->name('attendance');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
