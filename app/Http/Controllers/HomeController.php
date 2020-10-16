<?php

namespace App\Http\Controllers;

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

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم أضافة المستخدم'
        ]);

        // return redirect('/')->with('success','Item created successfully!');
        return view('index')->with('success','Item created successfully!');
    }
}
