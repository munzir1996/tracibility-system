<?php

namespace App\Http\Controllers;

use App\Organization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all()->whereNotIn('name', array(
            'super-admin',
            'shipping',
            'transporting',
            ))->pluck('name');

        return view('users.create', [
            'permissions' => $permissions,
        ]);

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

        session()->flash('success', 'تم الأضافة بنجاح');

        return redirect()->route('users.index');

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
        $permissions = Permission::all()->whereNotIn('name', array(
            'super-admin',
            'shipping',
            'transporting',
            ))->pluck('name');

        $organizations = Organization::where('type', $user->organization->type)->get();

        $user['permission'] = $user->permission;

        return view('users.edit', [
            'permissions' => $permissions,
            'user' => $user,
            'organizations' => $organizations,
        ]);
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

        $user->name = $request->name;
        $user->national_id = $request->national_id;
        $user->phone = $request->phone;
        $user->organization_id = $request->organization_id;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        session()->flash('success', 'تم التعديل بنجاح');

        return redirect()->route('users.index');

        // $user->update([
        //     'name' => $request->name,
        //     'national_id' => $request->national_id,
        //     'phone' => $request->phone,
        //     'password' => bcrypt($request->password),
        //     'organization_id' => $request->organization_id,
        // ]);

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

        session()->flash('success', 'تم الحذف بنجاح');

        return redirect()->route('users.index');
    }
}
