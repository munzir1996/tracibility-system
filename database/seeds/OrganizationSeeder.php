<?php

use App\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Keygen\Keygen;
class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Organization::class)->create([
            'gln' => Keygen::numeric(10)->generate(),
            'name' => 'مطحنة السلامة',
            'type' => Config::get('constants.type.treadmill'),
        ]);

        factory(Organization::class)->create([
            'gln' => Keygen::numeric(10)->generate(),
            'name' => 'وكيل بورتسودان',
            'type' => Config::get('constants.type.agent'),
        ]);

        factory(Organization::class)->create([
            'gln' => Keygen::numeric(10)->generate(),
            'name' => 'مخبز بورتسودان',
            'type' => Config::get('constants.type.bakery'),
        ]);

        factory(Organization::class)->create([
            'gln' => Keygen::numeric(10)->generate(),
            'name' => 'الإدمن',
            'type' => Config::get('constants.type.admin'),
        ]);

    }

}




