@extends('layouts.app')
@section('title', 'Home')



@section('page_styles')
<style>

</style>
@endsection



@section('content')
<div class="s130">
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
                <input id="search" name="q" type="text" placeholder="Search zip code" value="" autocomplete="off" />
            </div>
            <div class="input-field second-wrap">
                <button class="btn-search" type="submit">SEARCH</button>
            </div>
        </div>

        <span class="info">e.g. Barangay, City, Region, and Zip Code</span>



        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="cardads text-right">
                    <a href="#"><img class="img-fluid" width="500px" src="https://sg-test-11.slatic.net/other/lzd-ad/629f69c5e0ede3c68d9727cc2cbfc61c.jpeg" alt="" srcset="" /></a>
                    <span class="text-muted font-weight-bolder">Ad</span>
                </div>
            </div>
        </div>

    </form>    
</div>
@endsection



@section('page_scripts')
<!-- jQuery Core 3.5.1 -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
var xhr = null;

$(function() {

    $(`form[name="index-search-form"]`).on(`submit`, function(e) {
            
        e.preventDefault();
        
        let this_btn = $(this).find('button[type="submit"]');
        
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
                
                setTimeout(() => {
                    $(this_btn).text(`SEARCH`);    
                }, 5000);
                
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