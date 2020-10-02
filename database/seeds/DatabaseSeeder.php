<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $user = User::create([
            'name' => 'Super-Admin',
            'national_id' => '11111',
            'phone' => '0114949901',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
        ]);

        $user->assignRole('super-admin');

    }
}
