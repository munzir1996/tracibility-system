<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CteReceiving;
use App\CteTransport;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(CteReceiving::class, function (Faker $faker) {
    $what = [
        'gtin' => uniqid(),
        'batch' => uniqid(),
        'quantity' => $faker->numberBetween($min = 1, $max = 200),
    ];

    $user = factory(User::class)->states('transport')->create();

    return [
        'what' => $what,
        'why' => Config::get('constants.status.receiving'),
        'when' => Carbon::now(),
        'cte_transport_id' => function(){
            return factory(CteTransport::class)->create()->id;
        },
        'user_id' => $user->id,
        'organization_id' => $user->organization_id,
        'shipping_qrcode_id' => function(){
            return factory(ShippingQrcode::class)->create()->id;
        },
    ];

});
