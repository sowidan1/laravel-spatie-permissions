<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userPermissions = [
            'get_profile_user',
        ];
        foreach ($userPermissions as $permission) {
            Permission::Create( [
                'name' => $permission,
                'guard_name' => 'userapi',
            ]);
        }

        // create role
        $admin_role = Role::updateOrCreate(['name' => 'user'], [
            'name' => 'user',
            'guard_name' => 'userapi',
        ]);

        // give permissions to role
        $admin_role->givePermissionTo($userPermissions);
    }
}
