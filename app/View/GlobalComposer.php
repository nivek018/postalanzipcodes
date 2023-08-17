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

        $RegionalZipCodes = [
            [
                'region' => 'Region I – Ilocos Region',
                'slug' => 'ilocos-region-%28region-i%29',
            ],
            [
                'region' => 'Region II – Cagayan Valley',
                'slug' => 'cagayan-valley-%28region-ii%29',
            ],
            [
                'region' => 'Region III – Central Luzon',
                'slug' => 'central-luzon-%28region-iii%29',
            ],
            [
                'region' => 'Region IV‑A – CALABARZON',
                'slug' => 'southern-tagalog-mainland-%28region-iv-a---calabarzon%29',
            ],
            [
                'region' => 'MIMAROPA Region',
                'slug' => 'southwestern-tagalog-region-%28region-xvii-mimaropa-region%29',
            ],
            [
                'region' => 'Region V – Bicol Region',
                'slug' => 'bicol-region-%28region-v%29',
            ],
            [
                'region' => 'Region VI – Western Visayas',
                'slug' => 'western-visayas-%28region-vi%29',
            ],
            [
                'region' => 'Region VII – Central Visayas',
                'slug' => 'central-visayas-%28region-vii%29',
            ],
            [
                'region' => 'Region VIII – Eastern Visayas',
                'slug' => 'eastern-visayas-%28region-viii%29',
            ],
            [
                'region' => 'Region IX – Zamboanga Peninsula',
                'slug' => 'zamboanga-peninsula-%28region-ix%29',
            ],
            [
                'region' => 'Region X – Northern Mindanao',
                'slug' => 'northern-mindanao-%28region-x%29',
            ],
            [
                'region' => 'Region XI – Davao Region',
                'slug' => 'davao-region-%28region-xi%29',
            ],
            [
                'region' => 'Region XII – SOCCSKSARGEN',
                'slug' => 'soccsksargen-%28region-xii%29',
            ],
            [
                'region' => 'Region XIII – Caraga',
                'slug' => 'caraga-region-%28region-xiii%29',
            ],
            [
                'region' => 'NCR – National Capital Region',
                'slug' => 'national-capital-region-%28region-xiv---ncr%29',
            ],
            [
                'region' => 'CAR – Cordillera Administrative Region',
                'slug' => 'cordillera-administrative-region-%28region-xv---car%29',
            ],
            [
                'region' => 'BARMM – Bangsamoro Autonomous Region in Muslim Mindanao',
                'slug' => 'bangsamoro-autonomous-region-in-muslim-mindanao-%28region-xvi---barmm%29',
            ],
        ];

        // Pass the data to the view
        $view->with([
            'today' => $today,
            'NCRZipCodes' => $NCRZipCodes,
            'RegionalZipCodes' => $RegionalZipCodes,
        ]);
    }
}


