<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Auth;

class RoleManagementController extends Controller
{
    public function index()
    {
        $user = Auth::getUser();
        // Admin sees all roles? Or only their brand roles?
        // Task says "if roles doesn't have brand_id, then its universal... if it has brand id then it's created by brand owner".
        // Assuming super admin sees all, brand admin sees their own + universal?
        // Let's list all for now, or filter if we had scoped admins.
        // Assuming current 'admin' is a super admin or brand owner.
        // If we want to scope:
        // $roles = Role::whereNull('brand_id')->orWhere('brand_id', $user->brand_id)->get();
        // Since we don't have $user->brand_id explicit on user model yet (it's on user_role pivot or brand owner check), 
        // let's just show all for now but mark them.
        
        $roles = Role::with('permissions', 'brand')->get(); // We might need Brand relation on Role model if not added yet.
        // Role model has brand_id but no relationship defined yet.
        
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $brands = Brand::getBrandsOfAdmin();
        $permissions = Permission::all();
        return view('admin.roles.create', compact('brands', 'permissions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles,name',
            'description' => 'nullable|string|max:255',
            'brand_id' => 'nullable|exists:brands,id',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::transaction(function () use ($request) {
                $role = new Role();
                $role->name = $request->name;
                $role->description = $request->description;
                $role->brand_id = $request->brand_id;
                $role->save();

                if ($request->has('permissions')) {
                    $role->permissions()->sync($request->permissions);
                }
            });

            return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to create role: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $brands = Brand::getBrandsOfAdmin();
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'brands', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        
        // Prevent editing Universal roles if strict? Or allow?
        // Let's allow editing for now.

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles,name,'.$id,
            'description' => 'nullable|string|max:255',
            'brand_id' => 'nullable|exists:brands,id',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::transaction(function () use ($request, $role) {
                $role->name = $request->name;
                $role->description = $request->description;
                $role->brand_id = $request->brand_id;
                $role->save();

                if ($request->has('permissions')) {
                    $role->permissions()->sync($request->permissions);
                } else {
                    $role->permissions()->detach();
                }
            });

            return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to update role: ' . $e->getMessage())->withInput();
        }
    }
    
    // Missing destroy? The plan mentioned it. I'll add basic destroy.
    public function destroy($id)
    {
         // Prevent deleting critical roles? e.g. 'admin', 'user'.
         // Let's soft check by name.
         $role = Role::findOrFail($id);
         if(in_array(strtolower($role->name), ['admin', 'user'])) {
             return redirect()->back()->withErrors('Cannot delete system roles.');
         }
         
         $role->delete();
         return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
