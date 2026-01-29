<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // Table 'permissions' exists
    protected $table = 'permissions';
    
    // Based on describe output: id (int), title, description, create_at (timestamp)
    // Laravel expects created_at and updated_at by default.
    // If table lacks updated_at, set timestamps = false or handle custom.
    // 'describe' showed 'create_at' but no 'updated_at'.
    
    public $timestamps = false; // Disable standard timestamps because columns mismatch default
    
    protected $fillable = [
        'title',
        'description',
        'name', // Add 'name' to fillable attributes
    ];

    /**
     * The roles that have this permission.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
    }
}
