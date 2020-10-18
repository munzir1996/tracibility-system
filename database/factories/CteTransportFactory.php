<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CteShipping;
use App\CteTransport;
use App\ShippingQrcode;
use App\Transport;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(CteTransport::class, function (Faker $faker) {

    $user = factory(User::class)->states('transport')->create();
    $transport = factory(Transport::class)->create([
        'user_id' => $user->id,
    ]);

    return [
        'why' => Config::get('constants.status.transporting'),
        'what_truck' => $transport->giai,
        'when' => Carbon::now(),
        'cte_shipping_id' => function(){
            return factory(CteShipping::class)->create()->id;
        },
        'user_id' => $user->id,
        'organization_id' => $user->organization_id,
        'shipping_qrcode_id' => function(){
            return factory(ShippingQrcode::class)->create()->id;
        },
    ];
});
