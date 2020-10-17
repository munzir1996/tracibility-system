<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShippingQrcodeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function accept_transport_shipping()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();

        $response = $this->post('shipping/qrcode/accept/transport/'.);

        $response->assertStatus(200);
    }
}
