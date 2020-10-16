<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Import;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

$factory->define(Import::class, function (Faker $faker) {

    $user = factory(User::class)->states('agent')->create();

    return [
        'amount' => $faker->numberBetween($min = 1, $max = 200),
        'status' => Config::get('constants.stock.available'),
        'when' => Carbon::now(),
        'cte_harvest_id' => function(){
            return factory(CteHarvest::class)->create()->id;
        },
        'manafacture_qrcode_id' => function(){
            return factory(ManafactureQrcode::class)->create()->id;
        },
        'user_id' => $user->id,
        'organization_id' => $user->organization_id,
    ];

});

