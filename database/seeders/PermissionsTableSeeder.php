<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {

        // صلاحيات مخصصة لـ Voyager
        $permissions = [
            'browse_admin',    // صلاحية الدخول للوحة التحكم
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ];

        // إضافة الصلاحيات
        foreach ($permissions as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        // توليد الصلاحيات الافتراضية لإدارة القوائم والمستخدمين
        Permission::generateFor('menus');
        Permission::generateFor('roles');
        Permission::generateFor('users');
        Permission::generateFor('settings');

        
        /* $keys = [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('menus');

        Permission::generateFor('roles');

        Permission::generateFor('users');

        Permission::generateFor('settings'); */

    }
}
