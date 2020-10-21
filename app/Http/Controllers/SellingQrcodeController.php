<?php

namespace App\Http\Controllers;

use App\Consumer;
use App\CteReceiving;
use App\CteSelling;
use App\Http\Requests\SellingQrcodeSellRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SellingQrcodeController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\ShippingQrcode  $shippingQrcode
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $consumer = Consumer::where('code', $code)->first();
        $cteReceiving = CteReceiving::where('organization_id', auth()->user()->organization->id)->latest('id')->first();

        return view('consumers.qrcode', [
            'ctereceiving' => $cteReceiving,
            'consumer' => $consumer,
        ]);

    }

    public function sell(SellingQrcodeSellRequest $request, CteReceiving $cteReceiving, $code)
    {

        $request->validated();
        $consumer = Consumer::where('code', $code)->first();

        $whatCteReceiving = [
            'gtin' => $cteReceiving->what->gtin,
            'batch' => $cteReceiving->what->batch,
            'quantity' => $cteReceiving->what->quantity,
            'produced' => $cteReceiving->what->produced,
            'consumed' => $request->consumed + $cteReceiving->what->consumed,
            'status' => $cteReceiving->what->status,
        ];


        if ($cteReceiving->what->produced == $whatCteReceiving['consumed']) {
            $whatCteReceiving['status'] = Config::get('constants.stock.not_available');
        }

        $cteReceiving->update([
            'what' => $whatCteReceiving,
        ]);

        $whatCteSelling = [
            'gtin' => $cteReceiving->what->gtin,
            'batch' => $cteReceiving->what->batch,
            'quantity' => $request->consumed,
        ];

        CteSelling::create([
            'what' => $whatCteSelling,
            'why' => Config::get('constants.status.selling'),
            'when' => Carbon::now(),
            'cte_receiving_id' => $cteReceiving->id,
            'consumer_id' => $consumer->id,
            'organization_id' =>  auth()->user()->organization->id,
        ]);

        session()->flash('success', 'تمت عملية البيع بنجاح');

        return redirect()->route('selling.qrcodes.show', $code);


    }

}








