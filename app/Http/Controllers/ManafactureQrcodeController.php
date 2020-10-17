<?php

namespace App\Http\Controllers;

use App\CteAgent;
use App\CteShipping;
use App\Http\Requests\ShippingQrcodeStoreRequest;
use App\ManafactureQrcode;
use App\ShippingQrcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ManafactureQrcodeController extends Controller
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
    public function store(ShippingQrcodeStoreRequest $request, CteAgent $cteAgent)
    {
        $request->validated();

        $what = [
            'gtin' => $cteAgent->what->gtin,
            'batch' => $cteAgent->what->batch,
            'quantity' => $request->quantity,
        ];

        $cteAgent->amount -= $request->quantity;
        if ($cteAgent->amount == 0) {
            $cteAgent->manafactureQrcode->update([
                'status' => Config::get('constants.stock.not_available'),
            ]);
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

        session()->flash('success', 'تم الأضافة بنجاح');

        return redirect()->route('manafacture.qrcodes.show', $cteAgent->manafactureQrcode->code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ManafactureQrcode  $manafactureQrcode
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {

        $manafactureQrcode = ManafactureQrcode::with(['cteAgent', 'cteAgent.cteHarvest'])->where('code', $code)->first();

        return view('ctes.agents.qrcode', [
            'qrcode' => $manafactureQrcode,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManafactureQrcode  $manafactureQrcode
     * @return \Illuminate\Http\Response
     */
    public function edit(ManafactureQrcode $manafactureQrcode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManafactureQrcode  $manafactureQrcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManafactureQrcode $manafactureQrcode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManafactureQrcode  $manafactureQrcode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManafactureQrcode $manafactureQrcode)
    {
        //
    }
}
