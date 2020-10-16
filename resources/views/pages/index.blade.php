@extends('layouts.app')
@section('title', 'postalandzipcodes.ph | Philippine Zip Codes')



@section('page_styles')
<style>

</style>
@endsection



@section('content')

@php
    $bg_arr = [
        "https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_30/v1601104613/postalandzipcodes.ph/pexels-marfil-graganza-aquino-2604843.jpg",
        "https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_30/v1601104615/postalandzipcodes.ph/pexels-jeff-guab-2407636.jpg",
        "https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_30/v1601104614/postalandzipcodes.ph/pexels-leon-macapagal-2467670.jpg",
        "https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_30/v1601104613/postalandzipcodes.ph/pexels-roiland-hernandez-2406376.jpg",
        "https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_30/v1601104613/postalandzipcodes.ph/pexels-meo-fernando-3214989.jpg",
        "https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_30/v1601104613/postalandzipcodes.ph/pexels-marfil-graganza-aquino-2604843.jpg",
        "https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_30/v1601104610/postalandzipcodes.ph/pexels-christian-paul-del-rosario-1098322.jpg",
        "https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_30/v1601104608/postalandzipcodes.ph/pexels-nice-guys-757450.jpg",
        "https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_30/v1601350997/postalandzipcodes.ph/8f82a63ef0e32770e63eff87ce0913eb.jpg",
    ];
@endphp
<div class="s130"
    style="
        background: linear-gradient(360deg, rgb(31, 30, 30) 0%, rgba(255,255,255,0.35) 90%), url('{{ $bg_arr[array_rand($bg_arr,1)] }}');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    "
>
    <form name="index-search-form" autocomplete="off">
        
        @csrf

        <div class="pl-3 mb-2">
            <div class="d-inline" id="user-searches">&nbsp;</div>
        </div>


        <div class="inner-form">
            <div class="input-field first-wrap">
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                    </svg>
                </div>
                <label>
                <input id="search" name="q" type="text" placeholder="Search zip code" value="" autocomplete="off" />
                </label>
            </div>
            <div class="input-field second-wrap">
                <button class="btn-search" type="submit">SEARCH</button>
            </div>
        </div>

        <span class="info font-weight-lighter">e.g. Barangay, City, Region, and Zip Code</span>
        
        <!-- ads -->
        @include('ads.ads1')
        <!--  -->
        <!--  -->

        <h1 class="text-center font-weight-light">Zip Codes Search Directory</h1>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="font-weight-lighter">
                    Our Zip Code Search is easy-to-use and mostly accurate. Give it a quick try and be amazed at how fast you can look for a Zip Code.
                </p>
            </div>

            <div class="col-md-12 mt-5 text-center">
                <p class="font-weight-lighter">
                    The Philippine Zip Code Directory that we maintain is always update-to-date, And as of the moment, we have a total of {{ session('sess_total_zipcodes') ?? 99 }} Zip Codes in our directory.
                </p>                                                                                                                        
            </div>
        </div>
    </form>    
</div>
@endsection



@section('page_scripts')
<script>
var xhr = null;

$(function() {

    $(`form[name="index-search-form"]`).on(`submit`, function(e) {
        
        e.preventDefault();
        
        let this_que = $(this).find(`input[name="q"]`).val().trim();
        let this_btn = $(this).find(`button[type="submit"]`);
        
        if (this_que.length < 1) {
            return false;
        }

        var formData = new FormData(this);

        $.ajax({
            url:            `{{ route('search_q') }}`,
            type:           `POST`,
            dataType:       `JSON`,
            data:           formData,
            processData:    false,
            contentType:    false,

            beforeSend: function() {

                /* create loading state of the submit button */
                $(this_btn).html(`<div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                                </div>`).addClass('cursor-progress');

                /* abot on-going ajax request */
                if (xhr != null) {
                    xhr.abort();
                }

                /* call function to save user searches on localstorage */
                saveSearchLocal( formData.get(`q`) );

            },

            success: function(data) {

                window.location.replace(data.url);
                                
            }, 

            error: function() {

                $(this_btn).text(`SEARCH`);

                if (xhr != null) {
                    xhr.abort();
                }

            }
            
        });


    });

});
</script>
@endsection