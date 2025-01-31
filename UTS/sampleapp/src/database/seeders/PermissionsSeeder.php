<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create permissions if they don't exist
        $permissions = [
            'view_driver',
            'view_any_driver',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Get or create the 'supir' role
        $role = Role::firstOrCreate(['name' => 'supir']);

        // Assign the permissions to the 'supir' role
        $role->givePermissionTo($permissions);
    }
}
