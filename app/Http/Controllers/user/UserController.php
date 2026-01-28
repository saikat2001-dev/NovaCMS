<?php

namespace App\Http\Controllers\user;

class UserController
{
    public function showDashboard()
    {
        return view('user.dashboard');
    }
}
