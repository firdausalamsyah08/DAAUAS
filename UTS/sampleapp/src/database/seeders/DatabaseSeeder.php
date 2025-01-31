<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call RoleSeeder first to create roles
        $this->call([RoleSeeder::class]);

        // Memanggil PermissionSeeder
        $this->call([PermissionsSeeder::class]);

        // Memanggil DriverSeeder untuk menambahkan data driver
        $this->call([DriverSeeder::class]);

        // Memanggil seedUsers untuk memastikan user dibuat
        $this->seedUsers();
    }

    private function seedUsers(): void
    {
        // Create Admin user if not exists
        $adminEmail = 'admin@admin.com';
        if (! User::where('email', $adminEmail)->exists()) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => $adminEmail,
                'password' => bcrypt('password'),
            ]);
            $admin->assignRole('super_admin');
        }

        // Create Supir user if not exists
        $supirEmail = 'supir@admin.com';
        if (! User::where('email', $supirEmail)->exists()) {
            $supir = User::create([
                'name' => 'Supir',
                'email' => $supirEmail,
                'password' => bcrypt('password'),
            ]);
            $supir->assignRole('supir');
        }
    }
}
