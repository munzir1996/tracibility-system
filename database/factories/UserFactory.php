<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organization;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Keygen\Keygen;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Fctories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'national_id' => $faker->unique()->ean8,
        'phone' => $faker->e164PhoneNumber,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class, 'harvest', function($faker){
    return[
        'organization_id' => factory(Organization::class)->states('harvest')->create()->id,
    ];
});

$factory->state(User::class, 'agent', function($faker){
    return[
        'organization_id' => factory(Organization::class)->states('agent')->create()->id,
    ];
});

$factory->state(User::class, 'bakery', function($faker){
    return[
        'organization_id' => factory(Organization::class)->states('bakery')->create()->id,
    ];
});

$factory->state(User::class, 'transport', function($faker){
    return[
        'organization_id' => factory(Organization::class)->states('transport')->create()->id,
    ];
});

$factory->state(User::class, 'admin', function($faker){
    return[
        'organization_id' => factory(Organization::class)->states('admin')->create()->id,
    ];
});


