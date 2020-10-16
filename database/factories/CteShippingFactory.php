<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CteAgent;
use App\CteShipping;
use App\ShippingQrcode;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(CteShipping::class, function (Faker $faker) {

    $what = [
        'gtin' => uniqid(),
        'batch' => uniqid(),
        'quantity' => $faker->numberBetween($min = 1, $max = 200),
    ];

    $user = factory(User::class)->states('agent')->create();

    return [
        'what' => 1,
        'why' => Config::get('constants.status.shipping'),
        'when' => Carbon::now(),
        'cte_agent_id' => function(){
            return factory(CteAgent::class)->create()->id;
        },
        'user_id' => $user->id,
        'organization_id' => $user->organization_id,
        'shipping_qrcode_id' => function(){
            return factory(ShippingQrcode::class)->create()->id;
        },
    ];
});
