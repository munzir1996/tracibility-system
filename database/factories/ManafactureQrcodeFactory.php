<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ManafactureQrcode;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(ManafactureQrcode::class, function (Faker $faker) {
    return [
        'code' => uniqid(),
        'status' => Config::get('constants.stock.available'),
    ];
});
