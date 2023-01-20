@extends('layouts.app')
@section('title', $page_title)
@section('page_styles')
@endsection

@section('page_styles')
<!-- Leaflet 1.7.1 -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
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

        <div class="w-full mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tigh dark:text-white">
                <strong>Note:</strong>
                    The method <code>Geolocation.getCurrentPosition()</code> is more accurate on a mobile device.
            </h5>

            <div>
                <div class="dark:text-white">
                    <span id="visitors-zipcode" class="font-bold text-3xl">

                        <div role="status" class="animate-pulse">
                            <div class="h-8 bg-gray-300 rounded-lg dark:bg-gray-700 max-w-[100px]"></div>
                            <span class="sr-only">Loading...</span>
                        </div>

                    </span>

                    <p class="lead no-margin">YOUR ZIP CODE</p>

                    <div class="mt-2">
                        Your current position in lat. long.:
                        <div class="inline-block" id="lat">
                            <div class="inline-block h-2 bg-gray-300 rounded-lg dark:bg-gray-700 max-w-[100px]"></div>
                        </div>,
                        <div class="inline-block" id="lon">
                            <div class="inline-block h-2 bg-gray-300 rounded-lg dark:bg-gray-700 max-w-[100px]"></div>
                        </div>
                        <div class="mt-2" id="accuracy">
                            <div class="inline-block h-2 bg-gray-300 rounded-lg dark:bg-gray-700 max-w-[100px]"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 h-[50vh] relative overflow-hidden">
                <div id="map"></div>
            </div>
        </div>

        <!-- ads -->
        @include('ads.ads2')
        <!--  -->
        <!--  -->

    </div>
</div>
@endsection



@section('page_scripts')
<!-- Leaflet 1.7.1 -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

<script>
function final_request(latitude, longitude, accuracy) {

    /* send ajax request  to update user info */
    xhr = $.ajax({
        url:        `{{ route('geolocation') }}`,
        type:       `POST`,
        data:       {
                        _token: `{{ csrf_token() }}`,
                        lat:    latitude,
                        lon:    longitude
                    },
        dataType:   `json`,

        beforeSend: function(data) {

            if (xhr != null) {
                xhr.abort();
            }

        },

        success: function(data) {

            $(`#visitors-zipcode`).html(`<a href="${data.zip_code_url}" title="Zip Code Search">${data.zip_code}</a>`);

            $(`#lat`).html(`${latitude}`);
            $(`#lon`).html(`${longitude}`);
            $(`#accuracy`).html(`More or less ${accuracy} meters accuracy.`);

            var map = L.map('map', {
                center: [`${latitude}`, `${longitude}`],
                zoom: 15,
                scrollWheelZoom: false,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([`${latitude}`, `${longitude}`]).addTo(map)
                .bindPopup(`${data.display_addr}`)
                .openPopup();

                }

    });

}



var options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
};

function success(pos) {

    var crd = pos.coords;

    console.log('Your current position is:');
    console.log(`Latitude : ${crd.latitude}`);
    console.log(`Longitude: ${crd.longitude}`);
    console.log(`More or less ${crd.accuracy} meters.`);

    final_request(crd.latitude, crd.longitude, crd.accuracy);
}

function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
}

navigator.geolocation.getCurrentPosition(success, error, options);
</script>
@endsection
