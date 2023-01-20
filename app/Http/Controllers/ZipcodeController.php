<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class ZipcodeController extends Controller
{
    //
    public function search_zipcode($code)
    {

        /* search exact city zip code information */
        $sql  = DB::table('postal_codes')
            ->where('postal', '=', $code)
            ->select(
                'region',
                'barangay',
                'postal',
                'city',
                'phone_area_code'
            )
            ->get();

        /*  */
        $page_title    = sprintf('%s Zip Code', $code);
        $page_info     = sprintf('%s Zip Code is not yet in our database.', $code);

        if ( count($sql) > 0 ) {

            /* Zip Code is belong to more than 1 barangay */
            if ( count($sql) > 1 ) {
                $page_info     = sprintf('%s Zip Code is within %s and belongs to %s Barangays.', $code, $sql[0]->city, count($sql));
            }
            else {
                $page_info     = sprintf('%s is the Zip Code of %s, %s.', $code, $sql[0]->barangay, $sql[0]->city);
            }

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

            }

            /*  */
            $data    = array(
                        'page_title'        => $page_title,
                        'canonical'         => route('url_zipcode', ['code' => $code]),
                        'description'       => $page_info,
                        'subheader_title'   => $page_title,
                        'page_info'         => $page_info,
                        'results'           => json_decode(json_encode($query_data)), /* <- convert array into object */
                        'search_q'          => '',
                    );

        }
        else {

            /*  */
            $data    = array(
                        'page_title'        => $page_title,
                        'canonical'         => null,
                        'description'       => $page_info,
                        'subheader_title'   => $page_title,

                        'page_info'         => $page_info,
                        'results'           => null,
                        'search_q'          => '',
                    );

        }

        return view('pages.zipcodes.zipcode', $data);

    }
}
