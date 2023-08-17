<?php

use App\Http\Constants;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GeolocationController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ZipcodeController;
use App\Http\Controllers\CreateZipcodeController;
use App\Http\Controllers\SitemapController;

/* index page */
Route::get('/', [IndexController::class, 'index'])->name('index');

/* sitemap */
Route::get('/sitemap', [SitemapController::class, 'sitemap'])->name('sitemap');

/* terms of service page */
Route::get('/terms-of-service', function () {
    $data    = [
        'page_title'        => 'Terms of Service',
        'canonical'         => route('terms-of-service'),
        'description'       => 'Learn more about postalandzipcodes.ph terms of service section.',
        'subheader_title'   => 'Terms of service'
    ];

    return view('pages.tos', compact('data'));
})->name('terms-of-service');

/* privacy policy page */
Route::get('/privacy-policy', function () {
    $data    = [
        'page_title'        => 'Provicy Policy',
        'canonical'         => route('privacy-policy'),
        'description'       => 'Learn more about postalandzipcodes.ph privacy policy section.',
        'subheader_title'   => 'Privacy Policy'
    ];

    return view('pages.pp', compact('data'));
})->name('privacy-policy');

/* how it works page */
Route::get('/how-it-works', function () {
    $data    = [
        'page_title'        => 'How it Works?',
        'canonical'         => route('how-it-works'),
        'description'       => 'Learn more about postalandzipcodes.ph how it works section.',
        'subheader_title'   => 'How it Works?'
    ];

    return view('pages.hiw', compact('data'));
})->name('how-it-works');

/* about page */
Route::get('/about-us', function () {
    $data    = [
        'page_title'        => 'About Us',
        'canonical'         => route('about-us'),
        'description'       => 'Learn more about postalandzipcodes.ph about us section.',
        'subheader_title'   => 'About Us'
    ];

    return view('pages.abt', compact('data'));
})->name('about-us');

/* contact page */
Route::get('/contact-us', function () {
    $data    = [
        'page_title'        => 'Contact Us',
        'canonical'         => route('contact-us'),
        'description'       => 'Get in touch with PostalAndZipCodes.ph for any inquiries or feedback.',
        'subheader_title'   => 'Contact Us'
    ];

    return view('pages.contact', compact('data'));
})->name('contact-us');


// Route direct what-is-my-postal-code to my-zip-code
Route::get('/my-zip-code', function () {
    $data    = [
        'page_title'        => "What is my Zip Code? — Get Your Current Location's Zip Code",
        'canonical'         => route('what-is-my-postal-code'),
        'description'       => "Find your Zip Code quickly and easily using your device's GPS location. Our map-based tool uses Geolocation to pinpoint your current location and extract your zip code information. Try it now",
        'subheader_title'   => "Zip Code Lookup using GPS - Get Your Current Location's Zip Code",
    ];

    return view('pages.what-is-my-zipcode', compact('data'));
})->name('my-zip-code');

/* what is my zip code */
Route::get('/what-is-my-zip-code', function () {
    return redirect()->route('my-zip-code');
})->name('what-is-my-zip-code');
/* what is my zip code */
Route::get('/what-is-my-postal-code', function () {
    return redirect()->route('my-zip-code');
})->name('what-is-my-postal-code');



/* submit zip code */
Route::get('/submit-zip-code', function () {
    $data    = [
        'page_title'        => "Contribute to Zip Code Directory",
        'canonical'         => route('submit-zip-code'),
        'description'       => "Contribute to our Zip Code Directory and help keep it up-to-date and accurate for everyone. Share your local knowledge and assist others in finding their desired zip codes easily. Join our community of contributors today and make a difference.",
        'subheader_title'   => "Contribute to Zip Code Directory",
    ];

    return view('pages.submit-zip-code', compact('data'));
})->name('submit-zip-code');



/*      */
/* GET  */
/*      */

/* handles displaying of search term results, Search Controller | SearchController */
Route::get('/search-result', [SearchController::class, 'search_results'])->name('search-results');

/* handles displaying and searching of string url zip code level */
Route::get('/zipcode/{code}', [ZipcodeController::class, 'search_zipcode'])->name('url_zipcode');
Route::get('/postalcode/{code}', [ZipcodeController::class, 'search_zipcode']);

/* handles displaying and searching of string url region level */
Route::get('/zip-code/{region}', [RegionController::class, 'search_region'])->name('url_region');
Route::get('/postal-code/{region}', [RegionController::class, 'search_region']);

/* handles displaying and searching of string url city/town level */
Route::get('/zip-code-{city}', [CityController::class, 'search_city'])->name('url_city');
Route::get('/postal-code-{city}', [CityController::class, 'search_city']);

/* handles displaying and searching of string url barangay level */
Route::get('/zip-code-{city}/{barangay}', [BarangayController::class, 'search_barangay'])->name('url_barangay');
Route::get('/postal-code-{city}/{barangay}', [BarangayController::class, 'search_barangay']);





/*      */
/* POST */
/*      */

/* handles user submitted search term, Search Controller | SearchController */
Route::post('/search', [SearchController::class, 'search_q'])->name('search_q');

/* handles user geolocation extraction, Geolocation Controller | GeolocationController */
Route::post('/get-geolocation', [GeolocationController::class, 'get_geolocation'])->name('geolocation');

/* handles user submitted zip code,  */
Route::post('/create-zipcode', [CreateZipcodeController::class, 'create_zip'])->name('create_zip');
