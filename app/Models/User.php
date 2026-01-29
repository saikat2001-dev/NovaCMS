<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'fullName',
        'username',
        'email',
        'password',
        'brand_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

    public static function isEmailTaken($email)
    {
        return self::where('email', $email)->exists();
    }

    public static function getAllUsersWithRoles()
    {
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $user->roles = DB::table('user_role')
                ->where('user_id', $user->id)
                ->pluck('name')
                ->toArray();
        }
        return $users;
    }

    public static function getUserWithRoles($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if ($user) {
            $user->roles = DB::table('user_role')
                ->where('user_id', $user->id)
                ->pluck('name')
                ->toArray();
        }
        return $user;
    }

    public static function updateUserRoles($userId, $roles, $fullName = null)
    {
        return DB::transaction(function () use ($userId, $roles, $fullName) {
            if ($fullName) {
                DB::table('users')->where('id', $userId)->update([
                    'fullName' => $fullName,
                    'updated_at' => now(),
                ]);
            }

            // Remove existing roles
            DB::table('user_role')->where('user_id', $userId)->delete();

            // Add new roles
            foreach ($roles as $role) {
                
                $roleId = ($role === 'admin') ? 2 : 1; 
                
                DB::table('user_role')->insert([
                    'user_id' => $userId,
                    'role_id' => $roleId,
                    'name' => $role,
                    'brand_id' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return true;
        });
    }

    public static function deleteUser($id)
    {
        return DB::transaction(function () use ($id) {
            DB::table('user_role')->where('user_id', $id)->delete();
            DB::table('users')->where('id', $id)->delete();
            return true;
        });
    }
}
