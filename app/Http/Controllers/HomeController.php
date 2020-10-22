<?php

namespace App\Http\Controllers;

use App\CteReceiving;
use App\CteSelling;
use App\CteShipping;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $cteReceivings = CteReceiving::latest()->get();

        return view('index', [
            'ctereceivings' => $cteReceivings,
        ]);
    }

    public function selling(CteReceiving $ctereceiving)
    {

        $cteSellings = CteSelling::where('cte_receiving_id', $ctereceiving->id)->latest()->get();

        return view('selling', [
            'ctesellings' => $cteSellings,
        ]);

    }

}
