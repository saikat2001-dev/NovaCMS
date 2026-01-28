<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginPage'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('signup', [AuthController::class, 'showSignupPage'])->name('signup');
    Route::post('signup', [AuthController::class, 'signup']);
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
