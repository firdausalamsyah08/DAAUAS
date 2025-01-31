<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Pastikan peran admin dan orang tua dibuat
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $parentRole = Role::firstOrCreate(['name' => 'orang_tua', 'guard_name' => 'web']);

        // Daftar izin untuk admin
        $permissions = [
            'view_any_child',
            'view_child',
            'create_child',
            'edit_child',
            'delete_child',
            'view_any_health_record',
            'view_health_record',
            'create_health_record',
            'edit_health_record',
            'delete_health_record',
        ];

        // Buat izin jika belum ada
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Berikan semua izin ke admin
        $adminRole->syncPermissions($permissions);

        // Orang tua hanya bisa melihat data anak dan catatan kesehatan
        $parentRole->syncPermissions(['view_child', 'view_health_record']);
    }
}
