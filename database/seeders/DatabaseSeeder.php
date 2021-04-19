<?php

namespace Database\Seeders;

use App\Models\Drug;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name'=>'admin']);
        $super_admin  = Role::create(['name'=>'super_admin']);
        $admin_create =  User::factory()->admin()->create();
        $super_admin_create =  User::factory()->super_admin()->create();
        $admin_create->assignRole($admin);
        $super_admin_create->assignRole($super_admin);

        $permission_admin = Permission::create(['name' => 'show admins section']);
        $permission_super_admin = Permission::create(['name' => 'show super admins section']);


        $super_admin->givePermissionTo($permission_admin);
        $super_admin->givePermissionTo($permission_super_admin);


    }
}
