<?php

namespace App\Http\Controllers;

use App\CteReceiving;
use App\CteSelling;
use Illuminate\Http\Request;

class CteReceivingController extends Controller
{

    public function index()
    {
        $cteReceivings = CteReceiving::organize()->latest()->get();

        return view('ctes.receivings.index', [
            'ctereceivings' => $cteReceivings,
        ]);

    }

    public function show(CteReceiving $ctereceiving)
    {

        $cteSellings = CteSelling::where('cte_receiving_id', $ctereceiving->id)->latest()->get();

        return view('ctes.receivings.show', [
            'ctesellings' => $cteSellings,
        ]);

    }

}
