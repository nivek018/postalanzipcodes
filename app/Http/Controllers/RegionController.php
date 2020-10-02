<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class RegionController extends Controller
{

    //
    public function search_region($region)
    {

        /* we format the region name with possible --- or triple hyphen so we need to manipulate it before starting a query */
        $formatted_region      = str_replace('---', '&&&', $region); /* <- &&& is just temporary */
        $formatted_region      = str_replace('-', ' ', $formatted_region); /* now removing hyphens(-) */
        $formatted_region      = str_replace('&&&', ' - ', $formatted_region); /* last format it where it can be found in our database */
                
        /* search exact city zip code information */
        $sql  = DB::table('postal_codes')
            ->where('region', '=', $formatted_region)
            ->select(
                'region',
                'barangay',
                'postal',
                'city',
                'phone_area_code'
            )
            ->get();
        
        /*  */
        $page_title    = sprintf('%s Zip Code', ucwords($formatted_region));
        $page_info     = sprintf('%s Zip Code is not yet in our database.', $formatted_region);

        if ( count($sql) > 0 ) {

            /* modify page title, info/description */
            $page_title      = sprintf('%s Zip Codes', $sql[0]->region);
            $page_info       = sprintf('%s is composed of %s Barangays, having {zipcodes} Zip Code.', $sql[0]->region, count($sql), count($sql));

            /*  */
            $highest_postal  = 0;

            /*  */
            foreach ($sql as $key => $value) {

                $query_data[]        = [
                                        'region'        => $value->region,
                                        'url_region'    => route( 'url_region', [
                                                                                    'region' => str_replace(' ', '-', strtolower($value->region))
                                                                                ]),

                                        'barangay'      => $value->barangay,
                                        'barangay_url'  => route( 'url_barangay',   [
                                                                                        'city' => str_replace(' ', '-', strtolower($value->city)), 
                                                                                        'barangay' => str_replace(' ', '-', strtolower($value->barangay))
                                                                                    ]),
                                                    
                                        'postal'        => $value->postal,
                                        'postal_url'    => route( 'url_zipcode',    [
                                                                                        'code' => str_replace(' ', '-', strtolower($value->postal)), 
                                                                                    ]),
                                        
                                        'city'          => $value->city,
                                        'city_url'      => route( 'url_city',   [
                                                                                    'city' => str_replace(' ', '-', strtolower($value->city))
                                                                                ]),
                                        
                                        'phone_area_code' => $value->phone_area_code
                                    ];

                /* getting the highest postal value */
                $highest_postal = $value->postal > $highest_postal ? $value->postal: $highest_postal;

            }

            /*  */
            $data    = array(
                        'page_title'    => $page_title,
                        'canonical'     => route('url_region', ['region' => urlencode($formatted_region)]),
                        'description'   => str_replace(
                                                    '{zipcodes}', 
                                                    sprintf('%s to %s', $query_data[0]['postal'], $highest_postal), 
                                                    $page_info
                                                    ),

                        'page_info'     => str_replace(
                                                    '{zipcodes}', 
                                                    sprintf('%s to %s', $query_data[0]['postal'], $highest_postal), 
                                                    $page_info
                                                    ),
                        'results'       => json_decode(json_encode($query_data)), /* <- convert array into object */
                        'search_q'      => $formatted_region,
                    );

        }
        else { 

            /*  */
            $data    = array(
                        'page_title'    => $page_title,
                        'canonical'     => null,
                        'description'   => $page_info,

                        'page_info'     => $page_info,
                        'results'       => null,
                        'search_q'      => $formatted_region,
                    );
                  
        }

        return view('pages.zipcodes.region', $data);
        
    }

}
