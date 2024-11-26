<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use TCG\Voyager\Models\Role;
use Illuminate\Database\Seeder;
use Database\Seeders\TokenSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TBotSeeder::class);
        $this->call(AirdropSeeder::class);


        // User::factory(10)->create();

        // إنشاء الأدوار باستخدام `name` كمعيار فريد
        $adminRole = Role::updateOrCreate([
            'name' => 'admin',
        ], [
            'display_name' => 'Admin'
        ]);

        $supervisorRole = Role::updateOrCreate([
            'name' => 'supervisor',
        ], [
            'display_name' => 'Supervisor'
        ]);

        $managerRole = Role::updateOrCreate([
            'name' => 'manager',
        ], [
            'display_name' => 'Manager'
        ]);

        $userRole = Role::updateOrCreate([
            'name' => 'user',
        ], [
            'display_name' => 'User'
        ]);

        // إنشاء مستخدم "المسئول"
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),
            'role_id' => $adminRole->id,
        ]);

        // إنشاء مستخدم "المشرف"
        User::create([
            'name' => 'Supervisor User',
            'email' => 'supervisor@example.com',
            'password' => bcrypt('supervisorpassword'),
            'role_id' => $supervisorRole->id,
        ]);

        // إنشاء مستخدم "المدير"
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => bcrypt('managerpassword'),
            'role_id' => $managerRole->id,
        ]);

        // إنشاء مستخدم عادي
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('userpassword'),
            'role_id' => $userRole->id,
        ]);






       /*  
       // إنشاء الأدوار وتحديد الـ ID الخاص بها
        $adminRole = Role::updateOrCreate(['id' => 1], [
            'name' => 'admin',
            'display_name' => 'Admin'
        ]);

        $supervisorRole = Role::updateOrCreate(['id' => 2], [
            'name' => 'supervisor',
            'display_name' => 'Supervisor'
        ]);

        $managerRole = Role::updateOrCreate(['id' => 3], [
            'name' => 'manager',
            'display_name' => 'Manager'
        ]);

        $userRole = Role::updateOrCreate(['id' => 4], [
            'name' => 'user',
            'display_name' => 'User'
        ]);

        // إنشاء مستخدم "المسئول"
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),
            'role_id' => $adminRole->id,
        ]);

        // إنشاء مستخدم "المشرف"
        User::create([
            'name' => 'Supervisor User',
            'email' => 'supervisor@example.com',
            'password' => bcrypt('supervisorpassword'),
            'role_id' => $supervisorRole->id,
        ]);

        // إنشاء مستخدم "المدير"
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => bcrypt('managerpassword'),
            'role_id' => $managerRole->id,
        ]);

        // إنشاء مستخدم عادي
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('userpassword'),
            'role_id' => $userRole->id,
        ]); 
        */

        
        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => $adminRole->id,
        ]); */

        // old $adminRole
        /* $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            ['display_name' => 'Admin']
        ); */

        // إنشاء حساب مسؤول
       /*  User::create([
            'name' => 'sudo',
            'email' => 'quidarsarhan@gmail.com',
            'password' => bcrypt('123123'), // استبدل 'your_password' بكلمة المرور الخاصة بك
            'role_id' => $adminRole->id,
        ]); */

        // $this->call(TokenSeeder::class);
    }
}
