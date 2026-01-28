<?php

use App\Http\Controllers\brand\BrandController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BrandController::class, 'index'])->name('index');
Route::get('create', [BrandController::class, 'showCreateForm'])->name('create');
Route::post('store', [BrandController::class, 'storeBrand'])->name('store');
Route::get('edit/{id}', [BrandController::class, 'showEditForm'])->name('edit');
Route::post('update/{id}', [BrandController::class, 'updateBrand'])->name('update');
Route::post('delete/{id}', [BrandController::class, 'deleteBrand'])->name('delete');
Route::get('show/{id}', [BrandController::class, 'showBrand'])->name('show');
