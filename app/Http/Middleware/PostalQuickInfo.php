<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostalQuickInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ( null === session('sess_contributed_zip_codes') && null === session('sess_contributors') ) {

            // query updated contributors count also handle session to avoid unnecessary db calls
            $query_contributors     = 
                                    DB::table('contributors')
                                    ->select(
                                        'contributed_zip_codes', // <- number of contributed zip codes
                                        'contributors', // <- number of contributors
                                        'last_updated'
                                    )
                                    ->first();

            if ( $query_contributors ) {

                /* create session */
                session([
                        'sess_contributed_zip_codes'    => $query_contributors->contributed_zip_codes,
                        'sess_contributors'             => $query_contributors->contributors
                ]);
                
            }

        }
        
        return $next($request);

    }
}
