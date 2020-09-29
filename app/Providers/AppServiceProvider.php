<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // query updated contributors count also handle session to avoid unnecessary db calls
        $query_contributors     = 
                                DB::table('contributors')
                                ->select(
                                    'contributed_zip_codes', // <- number of contributed zip codes
                                    'contributors', // <- number of contributors
                                    'last_updated'
                                )
                                ->first();

        /* create session */
        if ( $query_contributors
                && null === session('sess_contributed_zip_codes')
                && null === session('sess_contributors')
            ) {

            /* create session */
            session([
                    'sess_contributed_zip_codes' => $query_contributors->contributed_zip_codes,
                    'sess_contributors' => $query_contributors->contributors
            ]);

        }

    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
