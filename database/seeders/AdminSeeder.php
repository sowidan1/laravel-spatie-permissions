<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminPermissions = [
            'get_profile_admin',
            'delete_profile_admin'
        ];

        foreach ($adminPermissions as $permissionName) {
            // Check if the permission already exists
            $existingPermission = Permission::where('name', $permissionName)->where('guard_name', 'adminapi')->first();

            if (!$existingPermission) {
                // Permission does not exist, create it
                Permission::create(['name' => $permissionName, 'guard_name' => 'adminapi']);
            }
        }


        // create role
        $admin_role = Role::updateOrCreate(['name' => 'admin'], [
            'name' => 'admin',
            'guard_name' => 'adminapi',
        ]);

        // give permissions to role
        $admin_role->givePermissionTo($adminPermissions);

        // assign role to model
        $admin = Admin::create([
            'name' => 'abdo',
            'email' => 'abdo@abdo.com',
            'password' => Hash::make('abdo@abdo.com'),
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $admin->assignRole($admin_role);
    }
}
