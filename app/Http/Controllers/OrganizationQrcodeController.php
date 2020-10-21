<?php

namespace App\Http\Controllers;

use App\CteReceiving;
use App\CteSelling;
use App\Organization;
use Illuminate\Http\Request;

class OrganizationQrcodeController extends Controller
{


    public function show(Organization $organization)
    {
        $cteReceivings = CteReceiving::where('organization_id', $organization->id)->latest()->get();

        return view('organizations.qrcode', [
            'ctereceivings' => $cteReceivings,
        ]);

    }

    public function selling(CteReceiving $cteReceiving)
    {
        $cteSellings = CteSelling::where('cte_receiving_id', $cteReceiving->id)->latest()->get();

        return view('organizations.qrcode-selling', [
            'ctesellings' => $cteSellings,
        ]);

    }


}
