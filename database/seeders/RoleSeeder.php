<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('roles')->insertOrIgnore([
            ['name' => 'admin', 'description' => 'Administrator with full access'],
            ['name' => 'user', 'description' => 'Regular user with restricted access'],
        ]);

        $user = \Illuminate\Support\Facades\DB::table('users')->first();
        $adminRole = \Illuminate\Support\Facades\DB::table('roles')->where('name', 'admin')->first();

        if ($user && $adminRole) {
            \Illuminate\Support\Facades\DB::table('user_role')->insertOrIgnore([
                'user_id' => $user->id,
                'role_id' => $adminRole->id,
                'name' => 'admin',
            ]);
        }
    }
}
