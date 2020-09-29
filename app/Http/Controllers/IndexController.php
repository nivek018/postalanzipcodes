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
                    'description'   => 'Browse our always up-to-date zip codes directory of the Philippines, Easy search from Barangay, City, Town, or Regions.',
                );

        return view('pages.index', $data);

    }

}
