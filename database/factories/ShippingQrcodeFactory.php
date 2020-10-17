<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ShippingQrcode;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(ShippingQrcode::class, function (Faker $faker) {
    return [
        'code' => uniqid(),
        'status' => Config::get('constants.delivery.pending'),
    ];
});
