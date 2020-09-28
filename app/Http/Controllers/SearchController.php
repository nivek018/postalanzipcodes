<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluunimate\Http\Input;
use App\Models\Zipcode;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{

    /*  */
    public function search_q(Request $request) {
        
        /*  */
        $search_q = $request->q;
        
        /*  */
        $data = [ 
            'url'   => route('search-results', ['q' =>$search_q]),
        ];

        /*  */
        return $data;

    }



    /*  */
    public function search_results(Request $request) {

        /*  */
        $search_q = $request->q;
        
        /*  */
        $results = Zipcode::search($search_q)->get();
        
        /*  */
        $page_title    = sprintf('%s', $search_q);
<<<<<<< HEAD
        $page_info     = sprintf('Search results for %s', $search_q);
=======
        $page_info     = sprintf('Search results for "%s"', $search_q);
>>>>>>> mnoquiao

        /*  */
        if ( count($results) > 0 ) {
            
<<<<<<< HEAD
            $page_info     = sprintf('Search results for %s found %s zip codes.', $search_q, count($results));
=======
            $page_info     = sprintf('Search results for "%s" found %s zip codes.', $search_q, count($results));
>>>>>>> mnoquiao
            
            /*  */
            foreach ($results as $key => $value) {

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

            }

            /*  */
            $data    = array(
                        'page_title'    => $page_title,
                        'canonical'     => route('search-results', ['q' => $search_q]),
                        'description'   => $page_info,
                        
                        'page_info'     => $page_info,
                        'results'       => json_decode(json_encode($query_data)), /* <- convert array into object */
                        'search_q'      => $search_q,
                    );

        }
        else { 

            /*  */
            $data    = array(
                        'page_title'    => $page_title,
                        'canonical'     => route('search-results', ['q' => $search_q]),
                        'description'   => $page_info,

                        'page_info'     => $page_info,
                        'results'       => null,
                        'search_q'      => $search_q,
                    );

         };

        /*  */
        return view('pages.search-results', $data);

    }


    
    /*  */
    public function get_geolocation(Request $request)
    {

        $access_key = 'd3cbff95a1b531';
        $lat        = $request['lat'];
        $lon        = $request['lon'];



        /* set IP address and API access key  */
        $ip         = ( isset($request['ipd']) && $request['ipd'] !== '' ) ? $request['ipd'] : $_SERVER['REMOTE_ADDR'];



        /* Initialize CURL: */
        $ch = curl_init('https://us1.locationiq.com/v1/reverse.php?key='.$access_key.'&lat='.$lat.'&lon='.$lon.'&format=json');

        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER      =>  true,
            CURLOPT_FOLLOWLOCATION      =>  true,
            CURLOPT_MAXREDIRS           =>  10,
            CURLOPT_TIMEOUT             =>  30,
            CURLOPT_CUSTOMREQUEST       =>  'GET',
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /* Store the data: */
        $json   = curl_exec($ch);
        $err    = curl_error($ch);

        curl_close($ch);

        if ($err) {

            return 'cURL Error #:' . $err;

        } else {

            /* return results */
            return json_encode($json);
        
        }
    }

}
