<?php

namespace App\Http\Controllers;

use App\Models\Zipcode;
use Iluunimate\Http\Input;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{

    /*  */
    public function search_q(Request $request) {

        $validator = Validator::make($request->all(), [
            'q' => 'required',
        ]);

        /*  */
        $search_q = $request->q;

        if ($validator->fails()) {

            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 200);

        }
        else {

            /*  */
            $data = [
                'success'   => true,
                'url'   => route('search-results', ['q' => $search_q]),
            ];

            /*  */
            return $data;

        }

    }



    /*  */
    public function search_results(Request $request) {

        // convert Str::slug to Str::title
        $search_q = Str::title(Str::slug($request->q, ' '));

        /*  */
        $results        = Zipcode::search($search_q)->get();
        $results_cnt    = count($results);

        /* insert logs */
        DB::table('search_logs')
        ->insert([
            'query'             => strlen($search_q) > 255 ?  substr($search_q, 0, 255) : $search_q,
            'no_of_results'     => $results_cnt ?? 0,
        ]);

        /*  */
        $page_title    = sprintf('%s', $search_q);
        $page_info     = sprintf('Search results for "%s"', $search_q);

        /*  */
        if ( $results_cnt > 0 ) {

            $page_info     = sprintf('Search results for %s found %s Zip %s. Also displayed are related zip code information like City, Town, Region and Phone Area Code.', html_entity_decode($search_q), count($results), (count($results) == 1 ? 'Code' : 'Codes'));

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
            $data    = [
                        'page_title'        => "🔎 Zip Code search: " . ucwords($page_title),
                        'canonical'         => route('search-results', ['q' => Str::slug($search_q)]),
                        'description'       => $page_info,
                        'subheader_title'   => "🔎 Zip Code search: " . ucwords($page_title),

                        'page_info'         => $page_info,
                        'results'           => json_decode(json_encode($query_data)), /* <- convert array into object */
                        'search_q'          => $search_q,
            ];

        }
        else {

            /*  */
            $data    = [
                        'page_title'        => "🔎 Zip Code search: " . ucwords($page_title),
                        'canonical'         => route('search-results', ['q' => Str::slug($search_q)]),
                        'description'       => $page_info,
                        'subheader_title'   => "🔎 Zip Code search: " . ucwords($page_title),

                        'page_info'         => $page_info,
                        'results'           => null,
                        'search_q'          => $search_q,
            ];

         };

        /*  */
        return view('pages.search-results', compact('data'));

    }

}
