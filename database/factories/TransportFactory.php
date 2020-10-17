<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transport;
use App\User;
use Faker\Generator as Faker;

$factory->define(Transport::class, function (Faker $faker) {

    $user = factory(User::class)->states('transport')->create();

    return [
        'giai' => uniqid(),
        'user_id' => $user->id,
    ];

});

