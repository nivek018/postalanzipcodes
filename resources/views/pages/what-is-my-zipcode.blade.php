@extends('layouts.app')
@section('title', 'Your Zip Code')



@section('page_styles')
<!-- Leaflet 1.7.1 -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>

<style>
/* Always set the map height explicitly to define the size of the div
* element that contains the map. */
#map {
    height: 100%;
}

.alert {
    background: #fff;
    border-color: #eee;
    border-left-color: #f6b73c;
    border-left-width: 3.5pt;
    color: #000;
}
</style>
@endsection



@section('content')
<div>
    <div class="container mt-5">

        <div class="row">
            
            <div class="col-xl-12">                

                <section>
                    <h1 class="mb-5">
                        <strong>Your Zip Code</strong>    
                    </h1>

                    <p>
                        We are tracking your current's device location to pinpoint and extract your zip code information as prerequisites to this we are using <code>Geolocation.getCurrentPosition()</code> method to get the current position of your device.
                    </p>

                    <p>
                        However this doesn't mean that we can always right in giving you your zip code information, to help you give an idea if we are tracking your correct location we also display your location on the map.
                    </p>

                </section>

            </div> <!-- [ .col-xl-12 ] END -->

            <div class="col-xl-12">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-3">
                            <span id="visitors-zipcode" class="font-weight-bold">
                                <div class="spinner-grow text-warning" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </span>
                            <p class="lead no-margin">YOUR ZIP CODE</p>
                        </h1>
                        
                        <small class="text-muted">Your current position is: lat. <span id="lat">?</span>, lon. <span id="lon">?</span> <span id="accuracy">?</span> accuracy.</small>
                    </div>
                </div>
            </div> <!-- [ .col-xl-12 ] END -->

            <div class="col-xl-12" style="height: 50vh;"> 
                <div id="map"></div>
            </div>
             
        </div> <!-- [ .row ] END -->

        <!-- ads -->
        @include('ads.ads1')
        <!--  -->
        <!--  -->

        <div class="row">
            <div class="col-xl-12">  
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <strong>Note:</strong> 
                    The method <code>Geolocation.getCurrentPosition()</code> is more accurate on a mobile device.
                </div>
            </div> <!-- [ .col-xl-12 ] END -->
        </div> <!-- [ .row ] END -->

    </div>
</div>
@endsection



@section('page_scripts')
<!-- jQuery Core 3.5.1 -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- Leaflet 1.7.1 -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>
<script>
var xhr = null;



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
                        
            $(`#visitors-zipcode`).html(`${data.zip_code}`);

            $(`#lat`).html(`${latitude}`);
            $(`#lon`).html(`${longitude}`);
            $(`#accuracy`).html(`More or less ${accuracy} meters`);

            var map = L.map('map').setView([`${latitude}`, `${longitude}`], 17);

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
<!-- <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPzaoRrNUi7glDasKUeYAS3RQ1RZp5v4U&callback=initMap"></script> -->
@endsection