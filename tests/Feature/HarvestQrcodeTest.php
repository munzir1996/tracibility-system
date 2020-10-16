<?php

namespace Tests\Feature;

use App\CteHarvest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Config;

class HarvestQrcodeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_reject_cte_harvest()
    {

        $this->withoutExceptionHandling();
        $cteHarvest = factory(CteHarvest::class)->create();

        $this->loginUser($cteHarvest->user);


        $response = $this->get('/harvest/qrcode/reject/'. $cteHarvest->harvestQrcode->id);

        $this->assertDatabaseHas('harvest_qrcodes', [
            'status' => Config::get('constants.delivery.rejected'),
        ]);

        $this->assertDatabaseHas('imports', [
            'amount' => $cteHarvest->what->quantity,
            'status' => Config::get('constants.stock.available'),
            'why' => Config::get('constants.delivery.rejected')
        ]);

    }

    /** @test */
    public function can_accept_cte_harvest()
    {

        $this->withoutExceptionHandling();
        $cteHarvest = factory(CteHarvest::class)->create();

        $this->loginUser($cteHarvest->user);


        $response = $this->put('/harvest/qrcode/accept/'. $cteHarvest->harvestQrcode->id);

        $this->assertDatabaseHas('harvest_qrcodes', [
            'status' => Config::get('constants.delivery.received'),
        ]);

        $this->assertDatabaseHas('imports', [
            'amount' => $cteHarvest->what->quantity,
            'status' => Config::get('constants.stock.available'),
            'why' => Config::get('constants.delivery.received')
        ]);

    }

}


