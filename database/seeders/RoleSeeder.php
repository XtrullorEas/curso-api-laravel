<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::create([
            'name' => 'admin',
            'guard_name' => 'api',
        ]);

        $roles->syncPermissions([
            'permission.index',
            'permission.store',
            'permission.show',
            'permission.update',
            'permission.destroy',
            'role.index',
            'role.store',
            'role.show',
            'role.update',
            'role.destroy',
        ]);
    }
}
