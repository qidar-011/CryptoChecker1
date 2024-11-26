<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {

        if (User::count() == 0) {
            // إنشاء مستخدم "Admin"
            $adminRole = Role::where('name', 'admin')->firstOrFail();
            User::create([
                'name'           => 'Admin User',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('adminpassword'),
                'remember_token' => Str::random(60),
                'role_id'        => $adminRole->id,
            ]);

            // إنشاء مستخدم "Supervisor"
            $supervisorRole = Role::where('name', 'supervisor')->firstOrFail();
            User::create([
                'name'           => 'Supervisor User',
                'email'          => 'supervisor@admin.com',
                'password'       => bcrypt('supervisorpassword'),
                'remember_token' => Str::random(60),
                'role_id'        => $supervisorRole->id,
            ]);

            // إنشاء مستخدم "Manager"
            $managerRole = Role::where('name', 'manager')->firstOrFail();
            User::create([
                'name'           => 'Manager User',
                'email'          => 'manager@admin.com',
                'password'       => bcrypt('managerpassword'),
                'remember_token' => Str::random(60),
                'role_id'        => $managerRole->id,
            ]);

            // إنشاء مستخدم "Regular User"
            $userRole = Role::where('name', 'user')->firstOrFail();
            User::create([
                'name'           => 'Regular User',
                'email'          => 'user@admin.com',
                'password'       => bcrypt('userpassword'),
                'remember_token' => Str::random(60),
                'role_id'        => $userRole->id,
            ]);
        }

        /* if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),
                'role_id'        => $role->id,
            ]);
        } */
    }
}
