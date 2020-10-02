<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Spatie\Permission\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'guard_name' => 'web',
    ];
});





