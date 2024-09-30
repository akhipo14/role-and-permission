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
        Permission::create(['name'=>'add user']);
        Permission::create(['name'=>'update user']);
        Permission::create(['name'=>'delete user']);
        Permission::create(['name'=>'view user']);

        Permission::create(['name'=>'add role']);
        Permission::create(['name'=>'update role']);
        Permission::create(['name'=>'delete role']);
        Permission::create(['name'=>'view role']);

        Permission::create(['name'=>'add permission']);
        Permission::create(['name'=>'update permission']);
        Permission::create(['name'=>'delete permission']);
        Permission::create(['name'=>'view permission']);

        Permission::create(['name'=>'add post']);
        Permission::create(['name'=>'update post']);
        Permission::create(['name'=>'delete post']);
        Permission::create(['name'=>'view post']);
        Permission::create(['name'=>'show all post']);

        Permission::create(['name'=>'update permission to role']);

        $superAdminRole = Role::create(['name'=>'super admin']);
        $adminRole = Role::create(['name'=>'admin']);
        $userRole = Role::create(['name'=>'user']);

        $superAdminRole->syncPermissions(Permission::all());
        
        $adminRole->givePermissionTo([
            'view user','view role','view permission'
        ]);

        $userRole->givePermissionTo([
            'view post','add post','update post','delete post'
        ]);
    }
}
