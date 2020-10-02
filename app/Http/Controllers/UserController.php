<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
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
        // dd(uniqid());

        $request->validate([
            'name' => 'required',
            'national_id' => 'required',
            'phone' => 'required|min:10|max:10',
            'password' => 'required|min:8|confirmed',
            'permission' => 'required',
            'organization_id' => 'required_unless:permission,super-admin',
        ]);

        $user = User::create([
            'name' => $request->name,
            'national_id' => $request->national_id,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'organization_id' => $request->organization_id,
        ]);

        $user->syncPermissions($request->permission);

        // session()->flash('toast', [
        //     'type' => 'success',
        //     'message' => 'تم أضافة المستخدم'
        // ]);

        // return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'national_id' => 'required',
            'phone' => 'required|min:10|max:10',
            'password' => 'sometimes|min:8|confirmed',
            'permission' => 'required',
            'organization_id' => 'required_unless:permission,super-admin',
        ]);

        $user->update([
            'name' => $request->name,
            'national_id' => $request->national_id,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'organization_id' => $request->organization_id,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
