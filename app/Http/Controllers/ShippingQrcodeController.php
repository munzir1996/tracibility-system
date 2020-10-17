<?php

namespace App\Http\Controllers;

use App\ShippingQrcode;
use Illuminate\Http\Request;

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
        //
    }

}
