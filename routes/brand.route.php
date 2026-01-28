<?php

use App\Http\Controllers\brand\BrandController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BrandController::class, 'index'])->name('index');
Route::get('create', [BrandController::class, 'showCreateForm'])->name('create');
Route::post('store', [BrandController::class, 'storeBrand'])->name('store');
