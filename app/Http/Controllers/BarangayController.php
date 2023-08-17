<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class BarangayController extends Controller
{

   public function search_barangay($city, $barangay)
   {



      /* query database for `city` and `barangay` that has hyphen(-) into their names */
      $records_to_filter   =  DB::table('postal_codes')
                           ->where('barangay', 'like', '%-%')
                           ->orwhere('city', 'like', '%-%')
                           ->select(
                              'barangay',
                              'city'
                           )
                           ->get();

      /*  */
      $filter_records = [];

      /*  */
      if ($records_to_filter) {

         foreach($records_to_filter as $record) {

            $filter_records[] = [
               'f_city'       => $record->city,
               'f_barangay'   => $record->barangay
            ];

         }

      }


      /*  */
      if ( $this->in_multi_array($city, $filter_records) === false )
      {
         $formatted_city      = str_replace('-', ' ', $city);

      } else { $formatted_city = $city; }

      /*  */
      if ( $this->in_multi_array($barangay, $filter_records) === false )
      {
         $formatted_barangay  = str_replace('-', ' ', $barangay);

      } else { $formatted_barangay  = $barangay; }

      /* search exact barangay + city zip code information */
      $sql  = DB::table('postal_codes')
            ->where('city', 'like', "%$formatted_city%")
            ->where('barangay', 'like', "%$formatted_barangay%")
            ->select(
                'region',
                'barangay',
                'postal',
                'city',
                'phone_area_code'
            )
            ->limit(1) /* <- limit by 1 to be sure of a single result */
            ->get();

      /*  */
      $page_title    = sprintf('%s Zip Code', ucwords($formatted_barangay));
      $page_info     = sprintf('%s Zip Code is not yet in our database.', $formatted_barangay);

      if ( count($sql) > 0 ) {

         /* change title and info if results were found */
         $page_title    = sprintf('📍 Zip Code of Barangay %s', ucwords($formatted_barangay));
         $page_info     = sprintf("Here is the Zip Code information of Barangay %s, that is within %s.",
                                ucwords($formatted_barangay),
                                ucwords($formatted_city)
                            );




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


         $data    = array(
                     'page_title'       => str_replace(
                                                '{zipcodes}',
                                                sprintf('%s', $query_data[0]['postal']),
                                                $page_title
                                            ),
                     'canonical'        => route('url_barangay', ['city' => $formatted_city, 'barangay' => $formatted_barangay]),
                     'description'      => str_replace(
                                                   '{zipcodes}',
                                                   sprintf('%s', $query_data[0]['postal']),
                                                   $page_info
                                                   ),
                    'subheader_title'   => str_replace(
                                                '{zipcodes}',
                                                sprintf('%s', $query_data[0]['postal']),
                                                $page_title
                                            ),
                     'page_info'        => str_replace(
                                                   '{zipcodes}',
                                                   sprintf('%s', $query_data[0]['postal']),
                                                   $page_info
                                                   ),
                     'results'          => json_decode(json_encode($query_data)), /* <- convert array into object */
                     'search_q'         => '',
                  );

      }
      else {

            /*  */
            $data    = [
                        'page_title'        => $page_title,
                        'canonical'         => null,
                        'description'       => $page_info,
                        'subheader_title'   => $page_title,
                        'page_info'         => $page_info,
                        'results'           => null,
                        'search_q'          => '',
            ];

      }

      return view('pages.zipcodes.barangay', compact('data'));

   }

}
