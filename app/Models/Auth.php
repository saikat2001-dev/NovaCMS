<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Auth
{
    public static function signup($fullName, $username, $email, $password)
    {
        return DB::transaction(function () use ($fullName, $username, $email, $password) {
            // 1. Create the User (brand_id will be null for now)
            $userId = DB::table('users')->insertGetId([
                'fullName' => $fullName,
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
                'brand_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if (! $userId) {
                throw new \Exception('Failed to create account.');
            }

            // 2. Link the User and Admin Role
            DB::table('user_role')->insert([
                'user_id' => $userId,
                'role_id' => 2, // 2 for admin
                'name' => 'admin',
                'brand_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return DB::table('users')->where('id', $userId)->first();
        });
    }

    public static function login($email, $password)
    {
        $user = DB::table('users')->where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            // Fetch user roles
            $roles = DB::table('user_role')
                ->where('user_id', $user->id)
                ->pluck('name')
                ->toArray();

            $user->roles = $roles;
            session()->put('user', $user);

            return $user;
        }

        return false;
    }

    public static function logout()
    {
        session()->forget('user');

        return true;
    }

    public static function checkAuth()
    {
        return session()->has('user');
    }

    public static function getUser()
    {
        return session()->get('user');
    }

    public static function hasRole($role)
    {
        $user = self::getUser();
        if (! $user || ! isset($user->roles)) {
            return false;
        }

        return in_array($role, $user->roles);
    }
}
