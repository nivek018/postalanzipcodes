<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluunimate\Http\Input;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class CreateZipcodeController extends Controller
{
    //
    public function create_zip(Request $request)
    {

        $request->validate([
            'region'        => 'required|max:255',
            'address'       => 'required|max:255',
            'zipcode'       => 'required|max:4',
            'contributor'   => 'max:255',
        ]);      

        dd(
            $request->region,
            $request->address,
            $request->zipcode,
            $request->contributor
        );

    }
    
}
