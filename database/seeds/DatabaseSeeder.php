<?php

use App\Organization;
use App\Transport;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Keygen\Keygen;
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
        $this->call(OrganizationSeeder::class);
        $this->call(ConsumerSeeder::class);

        $treadmill = Organization::find(1);
        $agent = Organization::find(2);
        $bakery = Organization::find(3);
        $admin = Organization::find(4);

        // factory(Organization::class)->states('harvest')->create();
        // factory(Organization::class)->states('agent')->create();
        // factory(Organization::class)->states('bakery')->create();

        // $adminOrganization = factory(Organization::class)->states('admin')->create();

        $userAdmin = User::create([
            'name' => 'أدمن',
            'national_id' => '11111',
            'phone' => '0114949901',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'organization_id' => $admin->id,
        ]);

        $userTreadMill = User::create([
            'name' => 'مستخدم المطحنة',
            'national_id' => '22222',
            'phone' => '0920733818',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'organization_id' => $treadmill->id,
        ]);

        $userAgent = User::create([
            'name' => 'مستخدم الوكيل',
            'national_id' => '33333',
            'phone' => '0999544135',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'organization_id' => $agent->id,
        ]);

        $userBakery = User::create([
            'name' => 'مستخدم الفرن',
            'national_id' => '44444',
            'phone' => '0997878421',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'organization_id' => $bakery->id,
        ]);

        $userAgentDriver = User::create([
            'name' => 'سائق الوكيل',
            'national_id' => '55555',
            'phone' => '0999544135',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'organization_id' => $agent->id,
        ]);

        Transport::create([
            'giai' => Keygen::numeric(10)->suffix('-d')->generate(true),
            'user_id' => $userAgentDriver->id,
        ]);

        $userAdmin->givePermissionTo('super-admin');
        $userTreadMill->givePermissionTo('tread-mill');
        $userAgent->givePermissionTo('agent');
        $userBakery->givePermissionTo('bakery');
        $userAgentDriver->givePermissionTo('transporting');

    }
}
