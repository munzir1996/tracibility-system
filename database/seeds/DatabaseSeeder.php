<?php

use App\Organization;
use App\Transport;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $this->call(RolesAndPermissionsSeeder::class);
        factory(Organization::class)->states('harvest')->create();
        factory(Organization::class)->states('agent')->create();
        factory(Organization::class)->states('bakery')->create();

        $adminOrganization = factory(Organization::class)->states('agent')->create();

        $user = User::create([
            'name' => 'Super-Admin',
            'national_id' => '11111',
            'phone' => '0114949901',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'organization_id' => $adminOrganization->id,
        ]);

        $transport = Transport::create([
            'giai' => uniqid(),
            'user_id' => $user->id,
        ]);

        $user->givePermissionTo('super-admin');

        // $this->call(ComponentsSeeder::class);
    }
}
