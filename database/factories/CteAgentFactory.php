<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CteAgent;
use App\CteHarvest;
use App\ManafactureQrcode;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(CteAgent::class, function (Faker $faker) {

    $what = [
        'gtin' => uniqid(),
        'batch' => uniqid(),
        'quantity' => $faker->numberBetween($min = 1, $max = 200),
    ];

    $user = factory(User::class)->states('agent')->create();


    return [
        'what' => $what,
        'when' => Carbon::now(),
        'why' => Config::get('constants.status.manafacturing'),
        'user_id' => $user->id,
        'organization_id' => $user->organization_id,
        'cte_harvest_id' => function(){
            return factory(CteHarvest::class)->create()->id;
        },
        'manafacture_qrcode_id' => function(){
            return factory(ManafactureQrcode::class)->create()->id;
        },
    ];

});
