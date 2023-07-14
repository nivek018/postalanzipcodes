<?php

namespace App\View;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class GlobalComposer
{
    public function compose(View $view)
    {
        // Get the dayOfWeek of today using Carbon and UTC+08:00 timezone
        $today = Carbon::now('Asia/Manila')->toDateString();

        // Construct NCR Cities Zip Codes
        $NCRZipCodes = [
            [
                'city' => 'Caloocan City (North)',
                'slug' => 'north-caloocan-city',
            ],
            [
                'city' => 'Caloocan City (South)',
                'slug' => 'south-caloocan-city',
            ],
            [
                'city' => 'Las Piñas City',
                'slug' => 'las-pinas-city',
            ],
            [
                'city' => 'Malabon City',
                'slug' => 'malabon-city',
            ],
            [
                'city' => 'Makati City',
                'slug' => 'makati-city',
            ],
            [
                'city' => 'Mandaluyong City',
                'slug' => 'mandaluyong-city',
            ],
            [
                'city' => 'Manila City',
                'slug' => 'manila-city',
            ],
            [
                'city' => 'Marikina City',
                'slug' => 'marikina-city',
            ],
            [
                'city' => 'Muntinlupa City',
                'slug' => 'muntinlupa-city',
            ],
            [
                'city' => 'Navotas City',
                'slug' => 'navotas',
            ],
            [
                'city' => 'Parañaque City',
                'slug' => 'paranaque',
            ],
            [
                'city' => 'Pasay City',
                'slug' => 'pasay-city',
            ],
            [
                'city' => 'Pasig City',
                'slug' => 'pasig-city',
            ],
            [
                'city' => 'Pateros',
                'slug' => 'Pateros',
            ],
            [
                'city' => 'Quezon City',
                'slug' => 'quezon-city',
            ],
            [
                'city' => 'San Juan City',
                'slug' => 'san-juan-city',
            ],
            [
                'city' => 'Taguig City',
                'slug' => 'taguig-city',
            ],
            [
                'city' => 'Valenzuela City',
                'slug' => 'valenzuela-city',
            ],
        ];

        // Pass the data to the view
        $view->with([
            'today' => $today,
            'NCRZipCodes' => $NCRZipCodes,
        ]);
    }
}
