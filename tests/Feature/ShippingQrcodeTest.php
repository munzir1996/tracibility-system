<?php

namespace Tests\Feature;

use App\CteShipping;
use App\CteTransport;
use App\Transport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class ShippingQrcodeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function accept_transport_shipping()
    {
        $cteShipping = factory(CteShipping::class)->create();
        $transport = factory(Transport::class)->create([
            'user_id' => $cteShipping->user->id,
        ]);

        $this->withoutExceptionHandling();
        $this->loginUser($cteShipping->user);

        $response = $this->get('shipping/qrcode/accept/transport/'. $cteShipping->shippingQrcode->code);

        $this->assertDatabaseHas('shipping_qrcodes', [
            'status' => Config::get('constants.delivery.transporting'),
        ]);

        $this->assertDatabaseHas('cte_transports', [
            'why' => Config::get('constants.status.transporting'),
            'what_truck' => $transport->giai,
            'cte_shipping_id' => $cteShipping->id,
            'user_id' => $cteShipping->user->id,
            'organization_id' => $cteShipping->user->organization->id,
            'shipping_qrcode_id' => $cteShipping->shippingQrcode->id,
        ]);

    }

    /** @test */
    public function accept_receiving_shipping()
    {

        $cteTransport = factory(CteTransport::class)->create();
        $transport = factory(Transport::class)->create([
            'user_id' => $cteTransport->user->id,
        ]);
        dd($cteTransport->shippingQrcode->code);
        $this->withoutExceptionHandling();
        $this->loginUser($cteTransport->user);

        $response = $this->get('shipping/qrcode/accept/receive/'. $cteTransport->shippingQrcode->code);

        $this->assertDatabaseHas('shipping_qrcodes', [
            'status' => Config::get('constants.delivery.received'),
        ]);

        $this->assertDatabaseHas('cte_receivings', [
            'what' => $transport->giai,
            'why' => Config::get('constants.status.receiving'),
            'cte_transport_id' => $cteTransport->id,
            'user_id' => $cteTransport->user->id,
            'organization_id' => $cteTransport->user->organization->id,
            'shipping_qrcode_id' => $cteTransport->shippingQrcode->id,
        ]);

    }
}
