<?php

namespace Tests\Feature;

use App\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class OrganizationTest extends TestCase
{
    use RefreshDatabase;

    // $concert = factory(Concert::class)->states('published')->create();

    /** @test */
    public function can_create_an_organization()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();

        $x = [
            'x' => 1,
            'y' => 2,
        ];

        dd($x);

        $response = $this->post('/organizations', [
            'name' => 'Local',
            'type' => Config::get('constants.type.harvest'),
        ]);

        $this->assertDatabaseHas('organizations' , [
            'name' => 'Local',
            'type' => Config::get('constants.type.harvest'),
        ]);

    }

    /** @test */
    public function can_edit_an_organization(){

        $this->withoutExceptionHandling();
        $this->loginUser();

        $organization = factory(Organization::class)->states('harvest')->create();

        $response = $this->put('/organizations/'. $organization->id, [
            'name' => 'import',
            'type' => Config::get('constants.type.agent'),
        ]);

        $this->assertDatabaseHas('organizations' , [
            'name' => 'import',
            'type' => Config::get('constants.type.agent'),
        ]);

    }

    /** @test */
    public function can_delete_an_organzatin(){

        $this->withoutExceptionHandling();
        $this->loginUser();

        $organization = factory(Organization::class)->states('harvest')->create();

        $response = $this->delete('/organizations/'. $organization->id);

        $this->assertDatabaseMissing('organizations' , [
            'name' => 'import',
            'type' => Config::get('constants.type.agent'),
        ]);

    }

}






