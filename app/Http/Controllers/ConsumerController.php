<?php

namespace App\Http\Controllers;

use App\Consumer;
use App\Http\Requests\ConsumerStoreRequest;
use App\Http\Requests\ConsumerUpdateRequest;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumers = Consumer::all();

        return view('consumers.index', [
            'consumers' => $consumers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consumers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsumerStoreRequest $request)
    {
        $request->validated();

        Consumer::create([
            'name' => $request->name,
            'national_id' => $request->national_id,
            'code' => uniqid(),
        ]);

        session()->flash('success', 'تم الأضافة بنجاح');

        return redirect()->route('consumers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function show(Consumer $consumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function edit(Consumer $consumer)
    {

        return view('consumers.edit', [
            'consumer' => $consumer,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function update(ConsumerUpdateRequest $request, Consumer $consumer)
    {
        $request->validated();

        $consumer->update([
            'name' => $request->name,
            'national_id' => $request->national_id,
        ]);

        session()->flash('success', 'تم التعديل بنجاح');

        return redirect()->route('consumers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consumer  $consumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumer $consumer)
    {

        $consumer->delete();

        session()->flash('success', 'تم الحذف بنجاح');

        return redirect()->route('consumers.index');

    }
}
