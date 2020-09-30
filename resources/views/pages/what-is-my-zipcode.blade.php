@extends('layouts.app')
@section('title', 'Your Zip Code')



@section('page_styles')
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

            <div class="col-xl-12"> 
                <div id="map" style="height:100%;"></div>
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

            let json = JSON.parse(data);
                        
            // json.address.*
            $(`#visitors-zipcode`).html(`${json.address.postcode}`);
            $(`#lat`).html(`${latitude}`);
            $(`#lon`).html(`${longitude}`);
            $(`#accuracy`).html(`More or less ${accuracy} meters`);

        }

    });

    // should remove the map from UI and clean the inner children of DOM element
    // if (map !== null) {
    //     map.remove();
    // }

    // mapRedraw(latitude, longitude, 1);

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



// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
// var map, infoWindow;

// function initMap() {
//     map = new google.maps.Map(document.getElementById('map'), {
//     center: {lat: -34.397, lng: 150.644},
//     zoom: 6
//     });
//     infoWindow = new google.maps.InfoWindow;

//     // Try HTML5 geolocation.
//     if (navigator.geolocation) {

//         navigator.geolocation.getCurrentPosition(function(position) {
//             var pos = {
//             lat: position.coords.latitude,
//             lng: position.coords.longitude
//             };

//             infoWindow.setPosition(pos);
//             infoWindow.setContent('Location found.');
//             infoWindow.open(map);
//             map.setCenter(pos);
//         }, function() {
//             handleLocationError(true, infoWindow, map.getCenter());
//         });

//     } else {

//         // Browser doesn't support Geolocation
//         handleLocationError(false, infoWindow, map.getCenter());
        
//     }
// }

// function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//     infoWindow.setPosition(pos);
//     infoWindow.setContent(browserHasGeolocation ?
//                         'Error: The Geolocation service failed.' :
//                         'Error: Your browser doesn\'t support geolocation.');
//     infoWindow.open(map);
// }
</script>
<!-- <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPzaoRrNUi7glDasKUeYAS3RQ1RZp5v4U&callback=initMap"></script> -->
@endsection