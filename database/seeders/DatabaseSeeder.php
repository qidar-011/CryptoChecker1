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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            ['display_name' => 'Admin']
        );

        // إنشاء حساب مسؤول
        User::create([
            'name' => 'sudo',
            'email' => 'quidarsarhan@gmail.com',
            'password' => bcrypt('123123'), // استبدل 'your_password' بكلمة المرور الخاصة بك
            'role_id' => $adminRole->id,
        ]);

        $this->call(TokenSeeder::class);
    }
}
