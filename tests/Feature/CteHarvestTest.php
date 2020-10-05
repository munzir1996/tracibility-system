<?php

namespace Tests\Feature;

use App\CteHarvest;
use App\Organization;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CteHarvestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_cte_harvest()
    {

        $organization = factory(Organization::class)->states('harvest')->create();

        $user = factory(User::class)->create([
            'organization_id' => $organization->id,
        ]);

        $this->withoutExceptionHandling();
        $this->loginUser($user);

        $response = $this->post('/cteharvests', [
            'quantity' => 200,
        ]);

        $this->assertDatabaseHas('cte_harvests', [
            'user_id' => $user->id,
            'organization_id' => $user->organization->id,
        ]);

    }

    /** @test */
    public function can_edit_cte_harvest(){

        $this->withoutExceptionHandling();

        $cteHarvest = factory(CteHarvest::class)->create();

        $this->withoutExceptionHandling();
        $this->loginUser($cteHarvest->user);


        $response = $this->put('cteharvests/'. $cteHarvest->id, [
            'quantity' => 100,
        ]);

        $what = [
            'gtin' => $cteHarvest->what->gtin,
            'batch' => $cteHarvest->what->batch,
            'quantity' => 100,
        ];

        $this->assertDatabaseHas('cte_harvests', [
            'what' => json_encode($what),
            'user_id' => $cteHarvest->user->id,
            'organization_id' => $cteHarvest->user->organization_id,
        ]);


    }

    /** @test */
    public function can_delete_cte_harvest(){

        $this->withoutExceptionHandling();

        $cteHarvest = factory(CteHarvest::class)->create();

        $this->withoutExceptionHandling();
        $this->loginUser($cteHarvest->user);


        $response = $this->delete('cteharvests/'. $cteHarvest->id);

        $this->assertDatabaseMissing('cte_harvests', [
            'id' => $cteHarvest->id,
        ]);


    }

}


