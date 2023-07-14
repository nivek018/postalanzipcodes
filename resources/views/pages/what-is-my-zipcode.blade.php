@extends('layouts.app')
@section('title', $data['page_title'])
@section('description', $data['description'])
@section('canonical', $data['canonical'])

@section('page_styles')
    <!-- Leaflet 1.9.3 -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection



@section('content')
    <div class="relative overflow-hidden py-10 md:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col space-y-10">
            <section class="stack-sm border border-black p-4 gap-4 flex flex-col">
                <h1 class="text-3xl font-Inter font-bold">Get Your Exact Location's Zip Code</h1>
                <p class="font-mono text-sm">
                    Knowing your exact location's zip code can be crucial for various purposes, whether it's for mail
                    delivery, online registrations, or local services. With our innovative location API, finding your zip
                    code has never been easier.
                </p>
                <p class="font-mono text-sm">
                    Your browser will prompt you to allow the location API to access your location, and once you do, we'll
                    extract your zip code and display it on the map.
                </p>
            </section>

            <section class="stack-gray w-full mt-4 p-6 rounded-none shadow-md border dark:bg-gray-900 dark:border-gray-900">
                <header>
                    <h2 class="text-xl font-Inter font-bold dark:text-white mb-4">Extracted Zip Code Information</h2>
                </header>

                <table class="w-full dark:text-white">
                    <thead>
                        <tr class="hidden">
                            <th>Zip Code</th>
                            <th>Address</th>
                            <th>Latitude</th>
                            <th>Longitutde</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="flex flex-wrap">
                            <td class="basis-full">
                                <dl>
                                    <dt class="sr-only">Zip Code</dt>
                                    <dd>
                                        <span id="visitors-zipcode" class="text-5xl font-bold font-Caveat">
                                            <div role="status" class="animate-pulse">
                                                <div class="h-10 my-1 bg-gray-300 dark:bg-gray-700 max-w-[100px]">
                                                </div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </span>
                                    </dd>
                                </dl>
                            </td>
                            <td class="basis-full">
                                <dl>
                                    <dt class="sr-only">Address</dt>
                                    <dd>
                                        <span id="visitors-address" class="text-2xl font-Caveat">
                                            <div role="status" class="animate-pulse">
                                                <div class="h-20 my-1 bg-gray-300 dark:bg-gray-700 max-w-xl">
                                                </div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </span>
                                    </dd>
                                </dl>
                            </td>
                            <td class="basis-2/4">
                                <dl>
                                    <dt class="sr-only">Latitude</dt>
                                    <dd title="Latitude">
                                        <span id="visitors-lat" class="text-2xl font-Caveat">
                                            <div role="status" class="animate-pulse">
                                                <div class="h-10 my-1 bg-gray-300 dark:bg-gray-700 max-w-xl"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </span>
                                    </dd>
                                </dl>
                            </td>
                            <td class="basis-2/4">
                                <dl>
                                    <dt class="sr-only">Longitude</dt>
                                    <dd title="Longitude">
                                        <span id="visitors-long" class="text-2xl font-Caveat">
                                            <div role="status" class="animate-pulse">
                                                <div class="h-10 my-1 bg-gray-300 dark:bg-gray-700 max-w-xl">
                                                </div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </span>
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-5 h-[50vh] relative overflow-hidden z-10">
                    <div id="map" class="h-full">
                        <div class="animate-pulse h-full my-1 bg-gray-300 dark:bg-gray-700 w-full"></div>
                    </div>
                </div>

                <div class="mt-4 text-gray-100 text-sm font-mono font-thin" id="accuracy"></div>
            </section>

            <section class="stack-gold border border-black dark:bg-amber-100 p-4 gap-4 flex flex-col">
                <h2 class="text-3xl font-Inter font-bold">FAQs</h1>
                    <ul class="font-mono text-sm">
                        <li></li>
                    </ul>

                    <div x-data="{ active: 1 }" class="mx-auto w-full min-h-[16rem] space-y-4">
                        <div x-data="{
                            id: 1,
                            get expanded() {
                                return this.active === this.id
                            },
                            set expanded(value) {
                                this.active = value ? this.id : null
                            },
                        }" role="region" class="rounded-lg bg-white shadow">
                            <h2>
                                <button x-on:click="expanded = !expanded" :aria-expanded="expanded"
                                    class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold">
                                    <span>How can I find my zip code?</span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4 text-xl font-NanumPenScript">Finding your zip code is simple with our
                                    location
                                    API. Just
                                    enter
                                    your address, and our system will provide you with the precise zip code for your
                                    location.</div>
                            </div>
                        </div>

                        <div x-data="{
                            id: 2,
                            get expanded() {
                                return this.active === this.id
                            },
                            set expanded(value) {
                                this.active = value ? this.id : null
                            },
                        }" role="region" class="rounded-lg bg-white shadow">
                            <h2>
                                <button x-on:click="expanded = !expanded" :aria-expanded="expanded"
                                    class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold">
                                    <span>Can I use the zip code lookup tool for any location?</span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4 text-xl font-NanumPenScript">Your location's zip code enables
                                    businesses and organizations to provide tailored services, local promotions, and
                                    customized offers specific to your area. It ensures you don't miss out on location-based
                                    opportunities and experiences.</div>
                            </div>
                        </div>

                        <div x-data="{
                            id: 3,
                            get expanded() {
                                return this.active === this.id
                            },
                            set expanded(value) {
                                this.active = value ? this.id : null
                            },
                        }" role="region" class="rounded-lg bg-white shadow">
                            <h2>
                                <button x-on:click="expanded = !expanded" :aria-expanded="expanded"
                                    class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold">
                                    <span>Why is knowing my location's zip code important?</span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4 text-xl font-NanumPenScript">Your location's zip code enables
                                    businesses and
                                    organizations to
                                    provide tailored services, local promotions, and customized offers specific to your
                                    area. It ensures you don't miss out on location-based opportunities and experiences.
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
@endsection



@section('page_scripts')
    <!-- Leaflet 1.9.3 -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script>
        // add event listener to load when the page is ready
        window.addEventListener('load', function() {

            // check if the browser supports geolocation
            if (navigator.geolocation) {

                // get the current position of the device
                navigator.geolocation.getCurrentPosition(function(position) {

                    // get the latitude and longitude
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    var accuracy = position.coords.accuracy;

                    // call the function to update the user info
                    final_request(latitude, longitude, accuracy);

                }, function(error) {

                    // if the user denies the request
                    if (error.code == error.PERMISSION_DENIED) {
                        // display the error message
                        document.getElementById('visitors-address').innerHTML =
                            '<span class="text-red-500">Permission denied</span>';
                        document.getElementById('visitors-lat').innerHTML =
                            '<span class="text-red-500">Permission denied</span>';
                        document.getElementById('visitors-long').innerHTML =
                            '<span class="text-red-500">Permission denied</span>';
                        document.getElementById('visitors-zipcode').innerHTML =
                            '<span class="text-red-500">Permission denied</span>';
                    }

                });

            } else {

                // if the browser doesn't support geolocation
                document.getElementById('visitors-address').innerHTML =
                    '<span class="text-red-500">Geolocation is not supported by this browser</span>';
                document.getElementById('visitors-lat').innerHTML =
                    '<span class="text-red-500">Geolocation is not supported by this browser</span>';
                document.getElementById('visitors-long').innerHTML =
                    '<span class="text-red-500">Geolocation is not supported by this browser</span>';
                document.getElementById('visitors-zipcode').innerHTML =
                    '<span class="text-red-500">Geolocation is not supported by this browser</span>';

            }

        });



        function final_request(latitude, longitude, accuracy) {

            // format latitude and longitude to 5 decimal places
            latitude = latitude.toFixed(5);
            longitude = longitude.toFixed(5);

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
                    document.getElementById('visitors-zipcode').innerHTML =
                        `<a class="hover:text-blue-700" href="${data.zip_code_url}" title="Zip Code ${data.zip_code}">${data.zip_code}</a>`;
                    document.getElementById('visitors-lat').innerHTML = `<a class="hover:text-blue-700" href="https://www.google.com/maps/@${latitude},${longitude},15z" target="_blank">
                                                                    ${latitude}
                                                                </a>`;
                    document.getElementById('visitors-long').innerHTML = `<a class="hover:text-blue-700" href="https://www.google.com/maps/@${latitude},${longitude},15z" target="_blank">
                                                                    ${longitude}
                                                                </a>`;
                    document.getElementById('visitors-address').innerHTML = data.display_addr;
                    document.getElementById('accuracy').innerHTML = `More or less ${accuracy} meters accuracy.`;

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
