<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HarvestQrcode;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(HarvestQrcode::class, function (Faker $faker) {
    return [
        'code' => uniqid(),
        'status' => Config::get('constants.status.harvesting'),
    ];
});
