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
        $data    = [
                    'page_title'        => "Postal and Zip Codes Philippines - Find Your Location's Postal and Zip Codes",
                    'canonical'         => route('index'),
                    'description'       => "Explore the Philippines with our comprehensive zip code directory. Discover towns, cities and regions with our easy-to-use zip code lookup tool. Find all the essential information you need, from demographics to local statistics, and explore the unique culture and lifestyle of this dynamic country. With a range of zip codes, you'll be able to find what you're looking for quickly and easily.",
                    'subheader_title'   => 'Zip Code Search'
                ];


        return view('pages.index', $data);

    }

}
