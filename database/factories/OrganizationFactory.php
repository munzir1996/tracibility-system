<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organization;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(Organization::class, function (Faker $faker) {
    return [
        'gln' => uniqid(),
        'name' => $faker->name,
    ];
});

$factory->state(Organization::class, 'harvest', function($faker){
    return[
        'type' => Config::get('constants.type.harvest'),
    ];
});

$factory->state(Organization::class, 'agent', function($faker){
    return[
        'type' => Config::get('constants.type.agent'),
    ];
});

$factory->state(Organization::class, 'bakery', function($faker){
    return[
        'type' => Config::get('constants.type.bakery'),
    ];
});

$factory->state(Organization::class, 'transport', function($faker){
    return[
        'type' => Config::get('constants.type.transport'),
    ];
});
