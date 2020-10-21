<?php

namespace App\Http\Controllers;

use App\CteReceiving;
use Illuminate\Http\Request;

class CteReceivingController extends Controller
{

    public function index()
    {
        $cteReceivings = CteReceiving::latest()->get();

        return view('ctes.receivings.index', [
            'ctereceivings' => $cteReceivings,
        ]);

    }

}
