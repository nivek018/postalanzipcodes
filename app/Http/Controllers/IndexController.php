<?php

namespace App\Http\Controllers;

use App\Http\Constants;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index()
    {
        // query updated contributors count also handle session to avoid unnecessary db calls
        $total_zipcodes     = DB::table('postal_codes')->count();

        //
        $data    = [
                    'page_title'        => "EXPLORE THE COMPLETE COLLECTION OF ZIP CODES IN THE PHILIPPINES",
                    'description'       => "Discover the constantly updated Philippine Zip Code Directory. Explore our comprehensive collection of {$total_zipcodes} Zip Codes, ensuring accuracy and reliability.",
                    'canonical'         => route('index'),
                    'subheader_title'   => 'Zip Code Search'
                ];

        return view('pages.index', compact('data'));
    }

}
