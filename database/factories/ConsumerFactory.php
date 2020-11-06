<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consumer;
use Faker\Generator as Faker;

$factory->define(Consumer::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'national_id' => uniqid(13),
    ];
});
