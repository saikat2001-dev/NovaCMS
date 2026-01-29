<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Auth;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::getAllUsersWithRoles();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $brands = Brand::getBrandsOfAdmin();
        return view('admin.users.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'brand_id' => 'nullable|exists:brands,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            
            DB::transaction(function () use ($request) {
                $userId = DB::table('users')->insertGetId([
                    'fullName' => $request->fullName,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'brand_id' => $request->brand_id, // Save selected brand_id
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Default role: user (id 1)
                DB::table('user_role')->insert([
                    'user_id' => $userId,
                    'role_id' => 1, 
                    'name' => 'user',
                    'brand_id' => $request->brand_id, // Save selected brand_id
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            });

            return redirect()->route('admin.users.index')->with('success', 'User created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to create user: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $user = User::getUserWithRoles($id);
        if (!$user) {
            return redirect()->route('admin.users.index')->withErrors('User not found.');
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::getUserWithRoles($id);
        if (!$user) {
            return redirect()->route('admin.users.index')->withErrors('User not found.');
        }

        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'roles' => 'required|array',
            'roles.*' => 'in:admin,user',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            User::updateUserRoles($id, $request->roles, $request->fullName);
            return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to update user: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        // Prevent deleting yourself
        if ($id == Auth::getUser()->id) {
             return redirect()->back()->withErrors('You cannot delete your own account.');
        }

        try {
            User::deleteUser($id);
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
             return redirect()->back()->withErrors('Failed to delete user: ' . $e->getMessage());
        }
    }
}
