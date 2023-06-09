<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{

   public function sitemap()
   {
      return response()->view('pages.sitemap')->header('Content-Type', 'text/xml');   
   }

}
