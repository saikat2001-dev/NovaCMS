<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'perm_id', // Legacy/Single permission if used
        'brand_id',
    ];

    /**
     * The permissions that allow this role.
     * Pivot table: role_permission
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }

    /**
     * Get the brand that owns the role.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Scope a query to only include universal roles (no brand).
     */
    public function scopeUniversal($query)
    {
        return $query->whereNull('brand_id');
    }

    /**
     * Scope a query to only include roles for a specific brand.
     */
    public function scopeForBrand($query, $brandId)
    {
        return $query->where('brand_id', $brandId);
    }
}
