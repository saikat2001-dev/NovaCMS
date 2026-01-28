<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Auth {
  public static function signup($fullName, $username, $email, $password, $role = 'user', $brandName = null) {
    return DB::transaction(function () use ($fullName, $username, $email, $password, $role, $brandName) {
      $brandId = null;

      // 1. Create the Brand first if user is an Admin
      if ($role === 'admin' && $brandName) {
        $brandId = DB::table('brands')->insertGetId([
          'name' => $brandName,
          'created_at' => now(),
          'updated_at' => now(),
        ]);

        if (!$brandId) {
          throw new \Exception('Failed to create project brand.');
        }
      }

      // 2. Create the User and link the Brand ID immediately
      $userId = DB::table('users')->insertGetId([
        'fullName' => $fullName,
        'username' => $username,
        'email' => $email,
        'password' => Hash::make($password),
        'brand_id' => $brandId, // Linked to the brand if Admin, else null
        'created_at' => now(),
        'updated_at' => now(),
      ]);

      if (!$userId) {
        throw new \Exception('Failed to create account.');
      }

      // 3. Link the User and Role (and Brand if applicable)
      DB::table('user_role')->insert([
        'user_id' => $userId,
        'role_id' => ($role === 'admin') ? 2 : 1, // 2 for admin, 1 for user
        'name' => $role,
        'brand_id' => $brandId,
        'created_at' => now(),
        'updated_at' => now(),
      ]);

      // 4. Set the Admin User as the owner of the Brand
      if ($role === 'admin' && $brandId) {
        DB::table('brands')->where('id', $brandId)->update(['owner' => $userId]);
      }

      return DB::table('users')->where('id', $userId)->first();
    });
  }
  public static function login($email, $password) {
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
  public static function logout() {
    session()->forget('user');
    return true;
  }
  public static function checkAuth() {
    return session()->has('user');
  }
  public static function getUser() {
    return session()->get('user');
  }
  public static function hasRole($role) {
    $user = self::getUser();
    if (!$user || !isset($user->roles)) {
      return false;
    }
    return in_array($role, $user->roles);
  }
}