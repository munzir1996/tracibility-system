<?php

namespace App\Http\Controllers;

use App\CteReceiving;
use App\CteSelling;
use App\CteShipping;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function shipping()
    {
        $cteShippings = CteShipping::latest()->get();

        return view('operations.shippings.index', [
            'cteshippings' => $cteShippings,
        ]);
    }

    public function deleteShipping(CteShipping $cteshipping)
    {
        $cteshipping->delete();

        session()->flash('success', 'تم الحذف بنجاح');

        return redirect()->route('operation.shipping');
    }

    public function receiving()
    {
        $cteReceivings = CteReceiving::latest()->get();

        return view('operations.receivings.index', [
            'ctereceivings' => $cteReceivings,
        ]);
    }

    public function deleteReceiving(CteReceiving $ctereceiving)
    {
        $ctereceiving->delete();

        session()->flash('success', 'تم الحذف بنجاح');

        return redirect()->route('operation.receiving');
    }

    public function selling(CteReceiving $ctereceiving)
    {

        $cteSellings = CteSelling::where('cte_receiving_id', $ctereceiving->id)->latest()->get();

        return view('operations.receivings.show', [
            'ctesellings' => $cteSellings,
        ]);

    }




}

