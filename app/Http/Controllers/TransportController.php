<?php

namespace App\Http\Controllers;

use App\Transport;
use App\User;
use Illuminate\Http\Request;
use Keygen\Keygen;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transports = Transport::latest()->get();

        return view('transports.index', [
            'transports' => $transports,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transports.create');
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
            'name' => 'required',
            'national_id' => 'required',
            'phone' => 'required|min:10|max:10',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'national_id' => $request->national_id,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'organization_id' => auth()->user()->organization->id,
        ]);

        $user->givePermissionTo('transporting');
        //suffix('.me') prefix
        Transport::create([
            'giai' => Keygen::numeric(10)->suffix('-d')->generate(true),
            'user_id' => $user->id,
        ]);

        session()->flash('success', 'تم الأضافة بنجاح');

        return redirect()->route('transports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit(Transport $transport)
    {

        return view('transports.edit', [
            'transport' => $transport,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transport $transport)
    {
        $request->validate([
            'name' => 'required',
            'national_id' => 'required',
            'phone' => 'required|min:10|max:10',
            'password' => 'sometimes|min:8|confirmed',
        ]);

        $transport->user->update([
            'name' => $request->name,
            'national_id' => $request->national_id,
            'phone' => $request->phone,
            'organization_id' => auth()->user()->organization->id,
        ]);

        if ($request->has('password')) {
            $transport->user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        session()->flash('success', 'تم التعديل بنجاح');

        return redirect()->route('transports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transport $transport)
    {

        $transport->delete();

        session()->flash('success', 'تم الحذف بنجاح');

        return redirect()->route('transports.index');
    }
}
