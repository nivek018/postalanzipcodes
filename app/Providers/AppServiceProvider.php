<?php

namespace App\Providers;

use App\View\GlobalComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the GlobalComposer to the app layout
        View::composer("layouts.app", GlobalComposer::class);
    }
}
