<?php

namespace App\Http\Controllers;

use App\CteAgent;
use App\CteHarvest;
use App\Http\Requests\ImportUpdateRequest;
use App\Import;
use App\ManafactureQrcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Keygen\Keygen;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $imports = Import::received()->latest()->get();

        return view('ctes.agents.import', [
            'imports' => $imports,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function show(Import $import)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function edit(Import $import)
    {
        return view('ctes.agents.create-manafacture', [
            'import' => $import,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function update(ImportUpdateRequest $request, Import $import)
    {

        $request->validated();

        $import->amount -= $request->quantity;
        if ($import->amount == 0) {
            $import->status = Config::get('constants.stock.not_available');
        }
        $import->save();

        $manafactureQrcode = ManafactureQrcode::create([
            'code' => uniqid(),
            'status' => Config::get('constants.delivery.pending'),
        ]);

        $what = [
            'gtin' => Keygen::numeric(14)->generate(),
            'batch' => Keygen::numeric(3)->prefix('S-')->generate(true),
            'quantity' => $request->quantity,
        ];

        $cteAgent = CteAgent::create([
            'what' => $what,
            'when' => Carbon::now(),
            'why' => Config::get('constants.status.agent'),
            'amount' => $request->quantity,
            'cte_harvest_id' => $import->cteHarvest->id,
            'user_id' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
            'manafacture_qrcode_id' => $manafactureQrcode->id,
        ]);

        session()->flash('success', 'تم الأضافة بنجاح');

        return redirect()->route('imports.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function destroy(Import $import)
    {
        //
    }
}
