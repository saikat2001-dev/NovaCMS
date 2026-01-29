<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::middleware('role:admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    
    // User Management Routes
    Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/', [UserManagementController::class, 'index'])->name('index');
        Route::get('create', [UserManagementController::class, 'create'])->name('create');
        Route::post('store', [UserManagementController::class, 'store'])->name('store');
        Route::get('edit/{id}', [UserManagementController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [UserManagementController::class, 'update'])->name('update');
        Route::post('delete/{id}', [UserManagementController::class, 'destroy'])->name('delete');
    });

    // Role Management Routes
    Route::prefix('roles')->name('admin.roles.')->group(function () {
        Route::get('/', [\App\Http\Controllers\admin\RoleManagementController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\admin\RoleManagementController::class, 'create'])->name('create');
        Route::post('store', [\App\Http\Controllers\admin\RoleManagementController::class, 'store'])->name('store');
        Route::get('edit/{id}', [\App\Http\Controllers\admin\RoleManagementController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\admin\RoleManagementController::class, 'update'])->name('update');
        Route::post('delete/{id}', [\App\Http\Controllers\admin\RoleManagementController::class, 'destroy'])->name('delete');
    });
});