<?php

namespace App\Http\Controllers;

use App\CteAgent;
use App\CteShipping;
use App\Http\Requests\CteShippingStoreRequest;
use App\ShippingQrcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CteShippingController extends Controller
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
    public function store(CteShippingStoreRequest $request, CteAgent $cteAgent)
    {

        $request->validated();

        $what = [
            'gtin' => $cteAgent->what->gtin,
            'batch' => $cteAgent->what->batch,
            'quantity' => $request->quantity,
        ];

        $cteAgent->amount -= $request->quantity;
        if ($cteAgent->amount == 0) {
            $cteAgent->status = Config::get('constants.stock.not_available');
        }
        $cteAgent->save();

        $shippingQrcode = ShippingQrcode::create([
            'code' => uniqid(),
            'status' => Config::get('constants.delivery.pending'),
        ]);

        $cteShipping = CteShipping::create([
            'what' => $what,
            'why' => Config::get('constants.status.shipping'),
            'when' => Carbon::now(),
            'cte_agent_id' => $cteAgent->id,
            'user_id' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
            'shipping_qrcode_id' => $shippingQrcode->id,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CteShipping  $cteShipping
     * @return \Illuminate\Http\Response
     */
    public function show(CteShipping $cteShipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CteShipping  $cteShipping
     * @return \Illuminate\Http\Response
     */
    public function edit(CteShipping $cteShipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CteShipping  $cteShipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CteShipping $cteShipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CteShipping  $cteShipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(CteShipping $cteShipping)
    {
        //
    }
}
