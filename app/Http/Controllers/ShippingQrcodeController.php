<?php

namespace App\Http\Controllers;

use App\CteReceiving;
use App\CteTransport;
use App\ShippingQrcode;
use App\Transport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ShippingQrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShippingQrcode  $shippingQrcode
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {

        $shippingQrcode = ShippingQrcode::where('code', $code)->first();

        return view('ctes.shippings.qrcode', [
            'qrcode' => $shippingQrcode,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShippingQrcode  $shippingQrcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingQrcode $shippingQrcode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShippingQrcode  $shippingQrcode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingQrcode $shippingQrcode)
    {
        //
    }

    public function acceptTransport($code)
    {

        $shippingQrcode = ShippingQrcode::where('code', $code)->first();
        $transport = Transport::where('user_id', auth()->user()->id)->first();

        $shippingQrcode->update([
            'status' => Config::get('constants.delivery.transporting'),
        ]);

        CteTransport::create([
            'why' => Config::get('constants.status.transporting'),
            'what_truck' => $transport->giai,
            'when' => Carbon::now(),
            'cte_shipping_id' => $shippingQrcode->cteShipping->id,
            'user_id' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
            'shipping_qrcode_id' => $shippingQrcode->id,
        ]);

        session()->flash('success', 'تم الأضافة بنجاح');

        return redirect()->route('shipping.qrcodes.show', $code);

    }




    public function acceptReceive($code)
    {
        $shippingQrcode = ShippingQrcode::where('code', $code)->first();
        $transport = Transport::where('user_id', auth()->user()->id)->first();
        $shippingQrcode->update([
            'status' => Config::get('constants.delivery.received'),
        ]);

        CteReceiving::create([
            'why' => Config::get('constants.status.receiving'),
            'what' => $shippingQrcode->cteShipping->what,
            'when' => Carbon::now(),
            'cte_transport_id' => $transport->id,
            'user_id' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
            'shipping_qrcode_id' => $shippingQrcode->id,
        ]);

        session()->flash('success', 'تم الأضافة بنجاح');

        return redirect()->route('shipping.qrcodes.show', $code);
    }

}
