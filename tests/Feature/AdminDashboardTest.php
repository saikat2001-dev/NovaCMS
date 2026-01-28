<?php

use App\Models\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

test('admin can access dashboard', function () {
    $userData = (object)[
        'id' => 1,
        'fullName' => 'Admin User',
        'email' => 'admin@example.com',
        'roles' => ['admin']
    ];

    Session::put('user', $userData);

    // Mock DB calls
    DB::shouldReceive('table')->with('users')->andReturnSelf();
    DB::shouldReceive('table')->with('blogs')->andReturnSelf();
    DB::shouldReceive('table')->with('brands')->andReturnSelf();
    DB::shouldReceive('table')->with('roles')->andReturnSelf();
    DB::shouldReceive('count')->andReturn(10, 5, 2, 3);
    DB::shouldReceive('orderBy')->with('created_at', 'desc')->andReturnSelf();
    DB::shouldReceive('limit')->with(5)->andReturnSelf();
    DB::shouldReceive('get')->andReturn(collect([
        (object)['fullName' => 'Test User', 'email' => 'test@example.com', 'created_at' => now()]
    ]));

    $response = $this->get('/admin/dashboard');

    $response->assertStatus(200);
    $response->assertSee('Admin Dashboard');
    $response->assertSee('10'); // Total Users
});

test('non-admin cannot access admin dashboard', function () {
    $userData = (object)[
        'id' => 2,
        'fullName' => 'Regular User',
        'email' => 'user@example.com',
        'roles' => ['user']
    ];

    Session::put('user', $userData);

    $response = $this->get('/admin/dashboard');

    $response->assertRedirect('/');
});

test('guest cannot access admin dashboard', function () {
    $response = $this->get('/admin/dashboard');

    $response->assertRedirect('/auth/login');
});
