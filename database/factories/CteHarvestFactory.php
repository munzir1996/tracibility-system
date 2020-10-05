<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CteHarvest;
use App\HarvestQrcode;
use App\Organization;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(CteHarvest::class, function (Faker $faker) {

    $what = [
        'gtin' => uniqid(),
        'batch' => uniqid(),
        'quantity' => $faker->numberBetween($min = 1, $max = 200),
    ];

    $user = factory(User::class)->create([
        'organization_id' => factory(Organization::class)->states('harvest')->create()->id,
    ]);

    return [
        'what' => json_encode($what),
        'when' => Carbon::now(),
        'why' => Config::get('constants.status.harvesting'),
        'user_id' => $user->id,
        'organization_id' => $user->organization_id,
        'harvest_qrcode_id' => function(){
            return factory(HarvestQrcode::class)->create()->id;
        },
    ];
});
