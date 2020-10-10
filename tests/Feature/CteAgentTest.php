<?php

namespace Tests\Feature;

use App\CteAgent;
use App\CteHarvest;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Config;

class CteAgentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_cte_agent()
    {

        $this->withoutExceptionHandling();

        $user = factory(User::class)->states('agent')->create();
        $cteHarvest = factory(CteHarvest::class)->create();
        $this->loginUser($user);

        $response = $this->post('/cteagents', [
            'quantity' => 500,
            'cte_harvest_id' => $cteHarvest->id,
        ]);

        $this->assertDatabaseHas('cte_agents', [
            'user_id' => $user->id,
            'organization_id' => $user->organization->id,
            'cte_harvest_id' => $cteHarvest->id,
        ]);

        $this->assertDatabaseHas('harvest_qrcodes', [
            'status' => Config::get('constants.delivery.received'),
        ]);

    }

    /** @test */
    public function can_edit_cte_agent(){

        $this->withoutExceptionHandling();

        $cteAgent = factory(CteAgent::class)->create();

        $this->loginUser($cteAgent->user);

        $response = $this->put('cteagents/'. $cteAgent->id, [
            'quantity' => 100,
        ]);

        $what = [
            'gtin' => $cteAgent->what->gtin,
            'batch' => $cteAgent->what->batch,
            'quantity' => 100,
        ];

        $this->assertDatabaseHas('cte_agents', [
            'what' => json_encode($what),
            'user_id' => $cteAgent->user->id,
            'organization_id' => $cteAgent->user->organization_id,
        ]);

    }

    /** @test */
    public function can_delete_cte_agent(){

        $this->withoutExceptionHandling();

        $cteAgent = factory(CteAgent::class)->create();

        $this->withoutExceptionHandling();
        $this->loginUser($cteAgent->user);


        $response = $this->delete('cteharvests/'. $cteAgent->id);

        $this->assertDatabaseMissing('cte_harvests', [
            'id' => $cteAgent->id,
        ]);

    }

}


