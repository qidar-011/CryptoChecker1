<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {


        // ربط صلاحيات "admin" بكل الصلاحيات
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $permissions = Permission::all();
        $adminRole->permissions()->sync($permissions->pluck('id')->all());

        // ربط صلاحيات "supervisor" ببعض الصلاحيات
        $supervisorRole = Role::where('name', 'supervisor')->firstOrFail();
        $permissions = Permission::whereIn('key', ['browse_admin', 'browse_users'])->get();
        $supervisorRole->permissions()->sync($permissions->pluck('id')->all());

        // ربط صلاحيات "manager" ببعض الصلاحيات
        $managerRole = Role::where('name', 'manager')->firstOrFail();
        $permissions = Permission::whereIn('key', ['browse_admin'])->get();
        $managerRole->permissions()->sync($permissions->pluck('id')->all());

        /* $role = Role::where('name', 'admin')->firstOrFail();

        $permissions = Permission::all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        ); */
    }
}
