<?php

namespace App\Http\Controllers;

use App\CteShipping;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {

        $request->validate([
            'amount' => 'required',
        ]);

        dd($request->all());

        CteShipping::create([

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
