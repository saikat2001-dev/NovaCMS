<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('role:admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
});