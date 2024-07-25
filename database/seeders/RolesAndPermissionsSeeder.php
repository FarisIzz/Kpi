<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

          // Buat permissions
          $permissions = [
            'view permissions',
            'view roles',
            'view users',
            'view dashboard',
            'view add kpi',
            'view user dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Buat roles dan assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'view dashboard',
            'view add kpi'
        ]);

        $superadminRole = Role::create(['name' => 'super admin']);
        $superadminRole->givePermissionTo([
            'view permissions',
            'view roles',
            'view users'
        ]);

        // $adminRole->givePermissionTo(Permission::all());

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'view user dashboard',
        ]);
    }
}