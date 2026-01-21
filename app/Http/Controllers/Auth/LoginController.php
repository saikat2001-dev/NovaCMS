<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * show login form (GET UI)
     */
    public function showLoginForm() {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request) {

    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request) {
        
    }
}
