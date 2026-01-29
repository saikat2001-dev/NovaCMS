<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    // Display a listing of the permissions
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    // Show the form for creating a new permission
    public function create()
    {
        return view('permissions.create');
    }

    // Store a newly created permission in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:permissions,title',
        ]);

        Permission::create($request->only('title'));

        return redirect()->route('admin.permissions.index')->with('success', 'Permission created successfully.');
    }

    // Remove the specified permission from storage
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted successfully.');
    }
}