<?php

namespace App\Http\Controllers;

use App\CteAgent;
use App\HarvestQrcode;
use App\Import;
use App\ManafactureQrcode;
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

    public function accept(HarvestQrcode $harvestQrcode)
    {
        $manafactureQrcode = ManafactureQrcode::create([
            'code' => uniqid(),
            'status' => Config::get('constants.stock.available'),
        ]);

        $cteAgent = CteAgent::create([
            'what' => $harvestQrcode->cteHarvest->what,
            'amount' => $harvestQrcode->cteHarvest->what->quantity,
            'when' => Carbon::now(),
            'why' => Config::get('constants.status.agent'),
            'cte_harvest_id' => $harvestQrcode->cteHarvest->id,
            'user_id' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
            'manafacture_qrcode_id' => $manafactureQrcode->id,
        ]);

        $harvestQrcode->update([
            'status' => Config::get('constants.delivery.received'),
        ]);

        session()->flash('success', 'تم القبول بنجاح');

        return redirect()->route('harvest.qrcodes.show', $harvestQrcode->code);

    }

    public function reject(HarvestQrcode $harvestQrcode)
    {

        $manafactureQrcode = ManafactureQrcode::create([
            'code' => uniqid(),
            'status' => Config::get('constants.delivery.rejected'),
        ]);

        $cteAgent = CteAgent::create([
            'what' => $harvestQrcode->cteHarvest->what,
            'amount' => $harvestQrcode->cteHarvest->what->quantity,
            'when' => Carbon::now(),
            'why' => Config::get('constants.status.agent'),
            'cte_harvest_id' => $harvestQrcode->cteHarvest->id,
            'user_id' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
            'manafacture_qrcode_id' => $manafactureQrcode->id,
        ]);

        $harvestQrcode->update([
            'status' => Config::get('constants.delivery.rejected'),
        ]);

        session()->flash('success', 'تم الرفض بنجاح');

        return redirect()->route('harvest.qrcodes.show', $harvestQrcode->code);


    }

}

