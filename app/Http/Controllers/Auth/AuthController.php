<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth;
use App\Rules\EmailUnique;
use App\Rules\PasswordFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * show login form (GET UI)
     */
    public function showLoginPage()
    {
        return view('auth.login');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out successfully.');
    }

    /**
     * show Signup form (GET UI)
     */
    public function showSignupPage()
    {
        return view('auth.signup');
    }

    /**
     * Handle a new user registration attempt.
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', new EmailUnique],
            'password' => ['required', 'string', 'min:8', 'confirmed', new PasswordFormat],
        ], [
            'fullName.required' => 'Name is required',
            'username.required' => 'Username is required',
            'username.unique' => 'Username already taken',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Passwords do not match',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = Auth::signup(
                $request->fullName,
                $request->username,
                $request->email,
                $request->password
            );

            if (!$user) {
                return redirect()->back()->withErrors('Registration failed! Please try again.')->withInput();
            }

            // Automatically log the user in after signup
            Auth::login($request->email, $request->password);

            return redirect()->route('brand.create')->with('success', 'Registration successful! Now, let\'s create your brand.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::login($request->email, $request->password);

        if ($user) {
            if (Auth::hasRole('admin')) {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
            }

            return redirect()->route('user.dashboard')->with('success', 'Logged in successfully!');
        }

        return redirect()->back()->withErrors('Invalid email or password')->withInput();
    }
}
