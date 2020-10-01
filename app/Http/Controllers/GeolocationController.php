<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluunimate\Http\Input;

class GeolocationController extends Controller
{

    /*  */
    public function get_geolocation(Request $request)
    {

        $access_key = 'd3cbff95a1b531';
        $lat        = $request['lat'];
        $lon        = $request['lon'];



        /* set IP address and API access key  */
        $ip         = ( isset($request['ipd']) && $request['ipd'] !== '' ) ? $request['ipd'] : $_SERVER['REMOTE_ADDR'];




        /* do not make any request if ip is local ip */
        // if (in_array($ip, $whitelist)) { exit; }



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

            // {
            //     "place_id": "26693344",
            //     "licence": "© LocationIQ.com CC BY 4.0, Data © OpenStreetMap contributors, ODbL 1.0",
            //     "osm_type": "node",
            //     "osm_id": "2525193585",
            //     "lat": "-37.870662",
            //     "lon": "144.9803321",
            //     "display_name": "Imbiss 25, Blessington Street, St Kilda, City of Port Phillip, Greater Melbourne, Victoria, 3182, Australia",
            //     "address": {
            //         "cafe": "Imbiss 25",
            //         "road": "Blessington Street",
            //         "suburb": "St Kilda",
            //         "county": "City of Port Phillip",
            //         "region": "Greater Melbourne",
            //         "state": "Victoria",
            //         "postcode": "3182",
            //         "country": "Australia",
            //         "country_code": "au"
            //     },
            //     "boundingbox": [
            //         "-37.870762",
            //         "-37.870562",
            //         "144.9802321",
            //         "144.9804321"
            //     ]
            // }

            $json_data = json_decode($json);

            $data = [
                'zip_code'      => $json_data->address->postcode,
                'display_addr'  => $json_data->display_name,
            ];

            /* return results */
            return $data;
        
        }
    }

}
