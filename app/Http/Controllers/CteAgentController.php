<?php

namespace App\Http\Controllers;

use App\CteAgent;
use App\CteHarvest;
use App\HarvestQrcode;
use App\ManafactureQrcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Keygen\Keygen;

class CteAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cteAgents = CteAgent::received()->latest()->get();

        return view('ctes.agents.index', [
            'cteagents' => $cteAgents,
        ]);

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

        // $request->validate([
        //     'quantity' => 'required',
        //     'cte_harvest_id' => 'required',
        // ]);

        // $cteHarvest = CteHarvest::findOrFail($request->cte_harvest_id);

        // $manafactureQrcode = ManafactureQrcode::create([
        //     'code' => uniqid(),
        //     'status' => Config::get('constants.status.manafacturing'),
        // ]);

        // $what = [
        //     'gtin' => Keygen::numeric(14)->generate(),
        //     'batch' => Keygen::numeric(3)->prefix('S-')->generate(true),
        //     'quantity' => $request->quantity,
        // ];

        // CteAgent::create([
        //     'what' => $what,
        //     'when' => Carbon::now(),
        //     'why' => Config::get('constants.status.manafacturing'),
        //     'cte_harvest_id' => $request->cte_harvest_id,
        //     'user_id' => auth()->id(),
        //     'organization_id' => auth()->user()->organization_id,
        //     'manafacture_qrcode_id' => $manafactureQrcode->id,
        // ]);

        // $cteHarvest->harvestQrcode->update([
        //     'status' => Config::get('constants.delivery.received'),
        // ]);

        // session()->flash('success', 'تم الأضافة بنجاح');

        // return redirect()->route('cteagents.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CteAgent  $cteAgent
     * @return \Illuminate\Http\Response
     */
    public function show(CteAgent $cteagent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CteAgent  $cteAgent
     * @return \Illuminate\Http\Response
     */
    public function edit(CteAgent $cteagent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CteAgent  $cteAgent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CteAgent $cteagent)
    {
        // $request->validated();

        // $import->amount -= $request->quantity;
        // if ($import->amount == 0) {
        //     $import->status = Config::get('constants.stock.not_available');
        // }
        // $import->save();

        // return redirect()->route('imports.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CteAgent  $cteAgent
     * @return \Illuminate\Http\Response
     */
    public function destroy(CteAgent $cteagent)
    {
        $cteagent->delete();

        session()->flash('success', 'تم الحذف بنجاح');

        return redirect()->route('cteagents.index');
    }

}








