<?php

namespace App\Http\Controllers;

use App\CteHarvest;
use App\HarvestQrcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Keygen\Keygen;

class CteHarvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cteHarvests = CteHarvest::all();

        return view('ctes.harvests.index', [
            'cteharvests' => $cteHarvests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ctes.harvests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
        ]);

        $harvestQrcode = HarvestQrcode::create([
            'code' => uniqid(),
            'status' => Config::get('constants.delivery.pending'),
        ]);

        $what = [
            'gtin' => Keygen::numeric(14)->generate(),
            'batch' => Keygen::numeric(3)->prefix('F-')->generate(true),
            'quantity' => $request->quantity,
        ];

        CteHarvest::create([
            'what' => $what,
            'when' => Carbon::now(),
            'why' => Config::get('constants.status.harvesting'),
            'user_id' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
            'harvest_qrcode_id' => $harvestQrcode->id,
        ]);

        session()->flash('success', 'تم الأضافة بنجاح');

        return redirect()->route('cteharvests.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CteHarvest  $cteharvest
     * @return \Illuminate\Http\Response
     */
    public function show(CteHarvest $cteharvest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CteHarvest  $cteharvest
     * @return \Illuminate\Http\Response
     */
    public function edit(CteHarvest $cteharvest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CteHarvest  $cteharvest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CteHarvest $cteharvest)
    {

        $request->validate([
            'quantity' => 'required',
        ]);

        $what = [
            'gtin' => $cteharvest->what->gtin,
            'batch' => $cteharvest->what->batch,
            'quantity' => $request->quantity,
        ];

        $cteharvest->update([
            'what' => $what,
            'when' => Carbon::now(),
            'user_id' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CteHarvest  $cteharvest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CteHarvest $cteharvest)
    {
        $cteharvest->delete();

        session()->flash('success', 'تم الحذف بنجاح');

        return redirect()->route('cteharvests.index');

    }
}
