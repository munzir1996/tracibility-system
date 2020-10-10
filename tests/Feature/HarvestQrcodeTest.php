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
        $this->loginUser();

        $cteHarvest = factory(CteHarvest::class)->create();

        $response = $this->get('/harvest/qrcode/reject/'. $cteHarvest->harvestQrcode->id);

        $this->assertDatabaseHas('harvest_qrcodes', [
            'status' => Config::get('constants.delivery.rejected'),
        ]);

    }
}
