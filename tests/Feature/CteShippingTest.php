<?php

namespace Tests\Feature;

use App\CteAgent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Config;

class CteShippingTest extends TestCase
{

    /** @test */
    public function can_create_a_shipping()
    {

        $cteAgent = factory(CteAgent::class)->create();

        $this->withoutExceptionHandling();
        $this->loginUser($cteAgent->user);

        $response = $this->post('cteshippings/'. $cteAgent->id, [
            'quantity' => 5,
        ]);

        $what = [
            'gtin' => $cteAgent->what->gtin,
            'batch' => $cteAgent->what->batch,
            'quantity' => 5,
        ];

        $this->assertDatabaseHas('cte_shippings', [
            'why' => Config::get('constants.status.shipping'),
            'cte_agent_id' => $cteAgent->id,
            'user_id' => $cteAgent->user->id,
            'organization_id' => $cteAgent->user->organization->id,
        ]);

    }

}


