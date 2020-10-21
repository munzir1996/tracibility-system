<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationQrcodeController extends Controller
{


    public function show(Organization $organization)
    {
        dd($organization);
    }


}
