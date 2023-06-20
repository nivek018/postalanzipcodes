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

        if ( null === session('sess_total_zipcodes') ) {

            // query updated contributors count also handle session to avoid unnecessary db calls
            $total_zipcodes     =
                                    DB::table('postal_codes')
                                    ->count();

            if ( $total_zipcodes > 0 ) {

                /* create session */
                session([
                        'sess_total_zipcodes' => $total_zipcodes
                ]);

            }

        }



        //
        $data    = [
                    'page_title'        => "Postal and Zip Codes Philippines - Find Your Location's Postal and Zip Codes",
                    'canonical'         => route('index'),
                    'description'       => "Discover the constantly updated Philippine Zip Code Directory. Explore our comprehensive collection of " . session('sess_total_zipcodes') ?? 99 . " Zip Codes, ensuring accuracy and reliability.",
                    'subheader_title'   => 'Zip Code Search'
                ];


        return view('pages.index', $data);

    }

}
