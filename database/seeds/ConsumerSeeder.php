<?php

use App\Consumer;
use Illuminate\Database\Seeder;

class ConsumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Consumer::class)->create([
            'name' => 'منذر مختار',
            'national_id' => '11857112119',
            'code' => uniqid(),
        ]);

        factory(Consumer::class)->create([
            'name' => 'محمد سنوسي',
            'national_id' => '44857624119',
            'code' => uniqid(),
        ]);

        factory(Consumer::class)->create([
            'name' => 'عثمان النور',
            'national_id' => '4896762754119',
            'code' => uniqid(),
        ]);
    }
}
