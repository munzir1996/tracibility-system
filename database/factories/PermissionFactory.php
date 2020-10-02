<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Spatie\Permission\Models\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'guard_name' => 'web',
    ];
});
