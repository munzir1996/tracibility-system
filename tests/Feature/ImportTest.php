<?php

namespace Tests\Feature;

use App\Import;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Config;

class ImportTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_manafacture()
    {
        $this->withoutExceptionHandling();
        $import = factory(Import::class)->create();

        $this->loginUser($import->user);

        $response = $this->put('imports/'. $import->id, [
            'quantity' => 20,
            'import_amount' => 20,
            'used' => 10,
        ]);

        $this->assertDatabaseHas('cte_agents', [
            'amount' => 20,
            'why' => Config::get('constants.status.manafacturing'),
            'user_id' => $import->user->id,
            'organization_id' => $import->user->organization->id,
        ]);

    }
}
