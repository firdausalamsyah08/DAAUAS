<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure roles exist
        $supirRole = Role::firstOrCreate(['name' => 'supir', 'guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);

        // Assign roles to specific users based on email
        $supirUser = User::where('email', 'supir@admin.com')->first();
        $adminUser = User::where('email', 'admin@admin.com')->first();

        if ($supirUser) {
            // Assign role using the role object
            $supirUser->assignRole($supirRole);
        }

        if ($adminUser) {
            // Assign role using the role object
            $adminUser->assignRole($adminRole);
        }

        // Alternatively, you can use the string name for the role if the roles already exist in the database
        // $supirUser->assignRole('supir');
        // $adminUser->assignRole('super_admin');
    }
}
