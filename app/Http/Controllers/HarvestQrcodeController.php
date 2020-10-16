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
        // dd($harvestQrcode);

        return view('ctes.harvests.qrcode', [
            'qrcode' => $harvestQrcode,
        ]);

    }

    public function accept(HarvestQrcode $harvestQrcode)
    {
        Import::create([
            'amount' => $harvestQrcode->cteHarvest->what->quantity,
            'when' => Carbon::now(),
            'why' => Config::get('constants.delivery.received'),
            'cte_harvest_id' => $harvestQrcode->cteHarvest->id,
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

        Import::create([
            'amount' => $harvestQrcode->cteHarvest->what->quantity,
            'when' => Carbon::now(),
            'why' => Config::get('constants.delivery.rejected'),
            'cte_harvest_id' => $harvestQrcode->cteHarvest->id,
            'user_id' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
        ]);

        session()->flash('success', 'تم الرفض بنجاح');

        return redirect()->route('harvest.qrcodes.show', $harvestQrcode->code);

    }

}

