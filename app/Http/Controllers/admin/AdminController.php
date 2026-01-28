<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showDashboard()
    {
        $stats = [
            'users' => DB::table('users')->count(),
            'blogs' => DB::table('blogs')->count(),
            'brands' => DB::table('brands')->count(),
            'roles' => DB::table('roles')->count(),
        ];

        $recentUsers = DB::table('users')->orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers'));
    }
}
