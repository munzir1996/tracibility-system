<?php

namespace Tests\Feature;

use App\Import;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function can_create_manafacture()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();

        $import = factory(Import::class)->create();

        $response = $this->put('/imports'. $import->id, [

        ]);

        $response->assertStatus(200);
    }
}
