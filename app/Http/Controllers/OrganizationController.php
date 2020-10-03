<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::all();

        return view('organizations.index', [
            'organizations' => $organizations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizations.create');
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
            'type' => 'required',
        ]);

        Organization::create([
            'gln' => uniqid(),
            'name' => $request->name,
            'type' => $request->type,
        ]);

        session()->flash('success', 'تم الأضافة بنجاح');

        return redirect()->route('organizations.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return view('organizations.edit', [
            'organization' => $organization,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $organization->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        session()->flash('success', 'تم التعديل بنجاح');

        return redirect()->route('organizations.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();

        session()->flash('success', 'تم الحذف بنجاح');

        return redirect()->route('organizations.index');
    }

    public function getOrganization($permission){

        $organizations = Organization::permissionType($permission)->get();

        return $organizations;

    }

}



