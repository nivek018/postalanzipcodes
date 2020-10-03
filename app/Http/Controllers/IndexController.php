<?php

namespace App\Http\Controllers;

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
        $data    = array(
                    'page_title'    => 'Postal and Zip Codes directory of the Philippines',
                    'canonical'     => route('index'),
                    'description'   => 'Looking for Zip Codes in the Philippines? Use our easy-search of Zip Code using your Street, Barangay, City, Town, or Regions.',
                );

        return view('pages.index', $data);

    }

}
