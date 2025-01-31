<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Membuat Admin
        $admin = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
        ]);

        // Membuat Orang Tua
        $parent = User::firstOrCreate([
            'email' => 'orangtua@admin.com',
        ], [
            'name' => 'Orang Tua User',
            'password' => Hash::make('password'),
        ]);

        // Pastikan role sudah ada di database
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $parentRole = Role::firstOrCreate(['name' => 'orang_tua', 'guard_name' => 'web']);

        // Assign role ke masing-masing user
        $admin->assignRole($adminRole);
        $parent->assignRole($parentRole);
    }
}
