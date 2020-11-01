<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
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
        $users = User::permission(['super-admin', 'tread-mill', 'agent', 'bakery'])->get();

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
            // 'super-admin',
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
    public function store(UserStoreRequest $request)
    {

        $request->validated();

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
            // 'super-admin',
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
    public function update(UserUpdateRequest $request, User $user)
    {

        $request->validated();

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
