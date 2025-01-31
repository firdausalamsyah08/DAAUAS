<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
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

        // Membuat izin jika belum ada
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Pastikan role ada di database
        $adminRole = Role::where('name', 'admin')->first();
        $parentRole = Role::where('name', 'orang_tua')->first();

        // Berikan semua izin ke admin
        if ($adminRole) {
            $adminRole->syncPermissions($permissions);
        }

        // Orang tua hanya bisa melihat data anak dan catatan kesehatan
        if ($parentRole) {
            $parentRole->syncPermissions([
                'view_any_child',
                'view_child',
                'view_any_health_record',
                'view_health_record',
            ]);
        }
    }
}
