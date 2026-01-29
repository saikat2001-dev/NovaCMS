<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;

Route::middleware('role:admin')->prefix('permissions')->name('admin.permissions.')->group(function () {
    Route::get('/', [PermissionController::class, 'index'])->name('index');
    Route::get('create', [PermissionController::class, 'create'])->name('create');
    Route::post('store', [PermissionController::class, 'store'])->name('store');
    Route::delete('delete/{id}', [PermissionController::class, 'destroy'])->name('destroy');
});