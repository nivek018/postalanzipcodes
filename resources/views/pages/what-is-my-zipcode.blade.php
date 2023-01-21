@extends('layouts.app')
@section('title', $page_title)

@section('page_styles')
<!-- Leaflet 1.9.3 -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection



@section('content')
<div class="relative overflow-hidden py-10 md:py-5">

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        <!-- ads -->
        @include('ads.ads1')
        <!--  -->
        <!--  -->

        <div class="w-full mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Find your Zip Code using your current location
            </h5>
            <p class="mb-3 font-normal dark:text-gray-400">
                We are tracking your current's device location to pinpoint and extract your zip code information as prerequisites to this we are using <code>Geolocation.getCurrentPosition()</code> method to get the current position of your device.
            </p>
            <p class="mb-3 font-normal dark:text-gray-400">
                However this doesn't mean that we can always right in giving you your zip code information, to help you give an idea if we are tracking your correct location we also display your location on the map.
            </p>
        </div>


        <div class="w-full mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-900 dark:border-gray-700">

            <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-gray-800 dark:text-blue-400" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">Note:</span> The method <code>Geolocation.getCurrentPosition()</code> is more accurate on a mobile device.
                </div>
            </div>



            <dl class="max-full text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Your device's address</dt>
                    <dd class="text-lg font-semibold">
                        <span id="visitors-address" class="font-bold text-3xl">

                            <div role="status" class="animate-pulse">
                                <div class="h-8 bg-gray-300 rounded-lg dark:bg-gray-700 max-w-xl"></div>
                                <span class="sr-only">Loading...</span>
                            </div>

                        </span>
                    </dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Your device's location information</dt>
                    <dd class="text-lg font-semibold">
                        <span id="visitors-lat-long" class="font-bold text-3xl">

                            <div role="status" class="animate-pulse">
                                <div class="h-8 bg-gray-300 rounded-lg dark:bg-gray-700 max-w-xl"></div>
                                <span class="sr-only">Loading...</span>
                            </div>

                        </span>
                    </dd>
                </div>
                <div class="flex flex-col pt-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Zip Code</dt>
                    <dd class="text-lg font-semibold">
                        <span id="visitors-zipcode" class="font-bold text-3xl">

                            <div role="status" class="animate-pulse">
                                <div class="h-8 bg-gray-300 rounded-lg dark:bg-gray-700 max-w-[100px]"></div>
                                <span class="sr-only">Loading...</span>
                            </div>

                        </span>
                    </dd>
                </div>
            </dl>

            <div class="mt-5 h-[50vh] relative overflow-hidden">
                <div id="map" class="h-full"></div>
            </div>

            <div class="mt-4 text-gray-400" id="accuracy"></div>
        </div>

        <!-- ads -->
        @include('ads.ads2')
        <!--  -->
        <!--  -->

    </div>
</div>
@endsection



@section('page_scripts')
<!-- Leaflet 1.9.3 -->
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

<script>
// add event listener to load when the page is ready
window.addEventListener('load', function() {

    // check if the browser supports geolocation
    if (navigator.geolocation) {

        // get the current position of the device
        navigator.geolocation.getCurrentPosition(function(position) {

            // get the latitude and longitude
            var latitude  = position.coords.latitude;
            var longitude = position.coords.longitude;
            var accuracy  = position.coords.accuracy;

            // call the function to update the user info
            final_request(latitude, longitude, accuracy);

        }, function(error) {

            // if the user denies the request
            if (error.code == error.PERMISSION_DENIED) {

                // display the error message
                document.getElementById('visitors-address').innerHTML = '<span class="text-red-500">Permission denied</span>';
                document.getElementById('visitors-lat-long').innerHTML = '<span class="text-red-500">Permission denied</span>';
                document.getElementById('visitors-zipcode').innerHTML = '<span class="text-red-500">Permission denied</span>';

            }

        });

    } else {

        // if the browser doesn't support geolocation
        document.getElementById('visitors-address').innerHTML = '<span class="text-red-500">Geolocation is not supported by this browser</span>';
        document.getElementById('visitors-lat-long').innerHTML = '<span class="text-red-500">Geolocation is not supported by this browser</span>';
        document.getElementById('visitors-zipcode').innerHTML = '<span class="text-red-500">Geolocation is not supported by this browser</span>';

    }

});



function final_request(latitude, longitude, accuracy) {

    // send ajax request to update user info
    fetch(`{{ route('geolocation') }}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            lat: latitude,
            lon: longitude
        })
    })
        .then(response => {
        if (response.ok) {
            return response.json();
        }
        throw new Error('Request failed');
    })
    .then(data => {

        // handle success
        document.getElementById('visitors-zipcode').innerHTML = `<a class="hover:text-blue-700" href="${data.zip_code_url}" title="Zip Code Search">${data.zip_code}</a>`;
        document.getElementById('visitors-lat-long').innerHTML = `<a class="hover:text-blue-700" href="https://www.google.com/maps/@${latitude},${longitude},15z" target="_blank">
                                                                    Lat. ${latitude} Long. ${longitude}
                                                                </a>`;
        document.getElementById('visitors-address').innerHTML = data.display_addr;
        document.getElementById('accuracy').innerHTML =  `More or less ${accuracy} meters accuracy.`;

        var map = L.map('map', {
            center: [latitude, longitude],
            zoom: 15,
            scrollWheelZoom: false,
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([`${latitude}`, `${longitude}`]).addTo(map)
            .bindPopup(`${data.display_addr}`)
            .openPopup();

    })
    .catch(error => {
    // handle error
    });

}
</script>
@endsection
