<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {

        // 
        $data    = array(
                    'page_title'    => 'Postal and Zip Codes directory of the Philippines',
                    'canonical'     => route('index'),
                    'description'   => 'Looking for Zip Codes in the Philippines? Use our easy-search of Zip Code using your Street, Barangay, City, Town, or Regions.',
                );

        return view('pages.index', $data);

    }

}
