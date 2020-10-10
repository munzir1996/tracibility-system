<?php

namespace App\Http\Controllers;

use App\HarvestQrcode;
use App\Import;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class HarvestQrcodeController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\HarvestQrcode  $harvestQrcode
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {

        $harvestQrcode = HarvestQrcode::with('cteHarvest')->where('code', $code)->first();

        return view('ctes.harvests.qrcode', [
            'qrcode' => $harvestQrcode,
        ]);

    }

    public function accept(Request $request, HarvestQrcode $harvestQrcode)
    {

        $request->validate([
            'cte_harvest_id' => 'required',
            'amount' => 'required',
        ]);

        Import::create([
            'amount' => $request->amount,
            'when' => Carbon::now(),
            'cte_harvest_id' => $request->cte_harvest_id,
            'user_id' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
        ]);

        $harvestQrcode->update([
            'status' => Config::get('constants.delivery.received'),
        ]);

        session()->flash('success', 'تم القبول بنجاح');

        return redirect()->route('harvest.qrcodes.show', $harvestQrcode->code);

    }

    public function reject(HarvestQrcode $harvestQrcode)
    {

        $harvestQrcode->update([
            'status' => Config::get('constants.delivery.rejected'),
        ]);

        session()->flash('success', 'تم الرفض بنجاح');

        return redirect()->route('harvest.qrcodes.show', $harvestQrcode->code);

    }

}

