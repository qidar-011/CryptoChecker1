<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {

        // دور "Admin"
        $adminRole = Role::firstOrNew(['name' => 'admin']);
        if (!$adminRole->exists) {
            $adminRole->fill([
                'display_name' => 'Admin',
            ])->save();
        }

        // دور "Supervisor"
        $supervisorRole = Role::firstOrNew(['name' => 'supervisor']);
        if (!$supervisorRole->exists) {
            $supervisorRole->fill([
                'display_name' => 'Supervisor',
            ])->save();
        }

        // دور "Manager"
        $managerRole = Role::firstOrNew(['name' => 'manager']);
        if (!$managerRole->exists) {
            $managerRole->fill([
                'display_name' => 'Manager',
            ])->save();
        }

        // دور "User"
        $userRole = Role::firstOrNew(['name' => 'user']);
        if (!$userRole->exists) {
            $userRole->fill([
                'display_name' => 'User',
            ])->save();
        }
        
        /* $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('voyager::seeders.roles.admin'),
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'user']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('voyager::seeders.roles.user'),
            ])->save();
        } */
    }
}
