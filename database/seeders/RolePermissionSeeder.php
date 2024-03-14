<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'role:viewAny']);
        Permission::create(['name' => 'role:view']);
        Permission::create(['name' => 'role:assign']);
        Permission::create(['name' => 'role:create']);
        Permission::create(['name' => 'role:update']);
        Permission::create(['name' => 'role:delete']);
        Permission::create(['name' => 'role:restore']);
        Permission::create(['name' => 'permission:viewAny']);
        Permission::create(['name' => 'permission:view']);
        Permission::create(['name' => 'permission:assign']);
        Permission::create(['name' => 'permission:create']);
        Permission::create(['name' => 'permission:update']);
        Permission::create(['name' => 'permission:delete']);
        Permission::create(['name' => 'permission:restore']);
        Permission::create(['name' => 'user:viewAny']);
        Permission::create(['name' => 'user:view']);
        Permission::create(['name' => 'user:create']);
        Permission::create(['name' => 'user:update']);
        Permission::create(['name' => 'user:delete']);
        Permission::create(['name' => 'user:restore']);


        $manager = Role::create(['name' => 'manager']);

        $permission = [
        Permission::create(['name' => "product:viewAny"]),
        Permission::create(['name' => "product:view"]),
        Permission::create(['name' => "product:create"]),
        Permission::create(['name' => "product:update"]),
        Permission::create(['name' => "product:delete"]),
        Permission::create(['name' => 'product:restore']),
        Permission::create(['name' => "category:viewAny"]),
        Permission::create(['name' => "category:view"]),
        Permission::create(['name' => "category:create"]),
        Permission::create(['name' => "category:update"]),
        Permission::create(['name' => "category:delete"]),
        Permission::create(['name' => 'category:restore']),
        ];

        $manager->syncPermissions($permission);

        Role::create(['name' => 'customer']);



    }
}
