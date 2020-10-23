<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{

    public function run()
    {

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'super-admin']);
        Permission::create(['name' => 'tread-mill']);
        Permission::create(['name' => 'agent']);
        Permission::create(['name' => 'bakery']);
        Permission::create(['name' => 'transporting']);
        // Permission::create(['name' => 'receiving']);

        // $role = Role::create(['name' => 'super-admin']);
        // $role->givePermissionTo(Permission::all());

    }

}





