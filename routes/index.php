<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Routes
require __DIR__.'/home.route.php';

// Authentication Routes (Handled in bootstrap/app.php)
// require __DIR__.'/auth.route.php';

// Admin Routes (Handled in bootstrap/app.php)
// require __DIR__.'/admin.route.php';

// Permission Routes
require __DIR__.'/permission.route.php';

// Redirects for better UX
// Route::redirect('/home', '/');

//redirects for login
// Route::redirect('/signin', '/auth/login');
// Route::redirect('/login', '/auth/login');

//redirects for signup
// Route::redirect('/register', '/auth/signup');
// Route::redirect('/signup', '/auth/signup');

// redirects for logout
// Route::redirect('/logout', '/auth/logout');

// Dashboard redirection
// Route::redirect('/dashboard', '/admin/dashboard');
