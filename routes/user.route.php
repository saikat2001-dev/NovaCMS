<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\UserController;

Route::middleware('role:user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('user.dashboard');
});