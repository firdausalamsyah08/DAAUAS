<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder untuk user admin
        $user = \App\Models\User::firstOrCreate(
            ['email' => 'admin@admin.com'], // Cek email sudah ada atau belum
            [
                'name' => 'Admin',
                'password' => bcrypt('password'), // Pastikan password di-hash
            ]
        );

        // Assign role super_admin jika menggunakan Spatie Laravel Permission
        if (!$user->hasRole('super_admin')) {
            $user->assignRole('super_admin');
        }

        // Seeder lainnya
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
