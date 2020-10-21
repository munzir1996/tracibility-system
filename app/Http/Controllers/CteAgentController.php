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
        $cteAgents = CteAgent::organize()->received()->latest()->get();

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
        //
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
        //
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








