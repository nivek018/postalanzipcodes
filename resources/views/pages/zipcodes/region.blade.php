@extends('layouts.app')
@section('title', $page_title)



@section('page_styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/fc-3.3.1/fh-3.1.7/r-2.2.6/datatables.min.css"/>
<style>

</style>
@endsection



@section('content')
<div class="container mt-5">

    <div class="s120">
        <form name="search-form" autocomplete="off">

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

        </form>
    </div>

    @if ( null !== $results )

        <div class="row mb-2">
            <div class="col-xl-12">
                <h4 class="font-weight-light">{{ $page_info }}</h4>
            </div>
        </div>  

        <div class="table-responsive-md">
            <table class="table" id="results-table">
                <thead>
                    <tr style="white-space:nowrap;">
                        <th scope="col">Zip Code</th>
                        <th scope="col">Barangay</th>
                        <th scope="col">City</th>
                        <th scope="col">Region</th>
                        <th scope="col">IDD: area code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $idx => $value)
                    <tr>
                        <td>
                            <a href="{{ $value->postal_url }}">{{ $value->postal  }}</a>
                        </td>
                        <td>
                            <a href="{{ $value->barangay_url }}">{{ $value->barangay  }}</a>
                        </td>
                        <td>
                            <a href="{{ $value->city_url }}">{{ $value->city  }}</a>
                        </td>
                        <td>
                            <a href="{{ urldecode($value->url_region) }}">{{ $value->region  }}</a>
                        </td>
                        <td>
                            {{ $value->phone_area_code  }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- [ .table-responsive ] END -->

    @else 

        <div class="row">
            <div class="col-xl-12">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container text-center">
                        <h1 class="display-3 font-weight-bold">
                            🙏 SORRY
                        </h1>
                        <p class="lead no-margin">No zip codes were found for 😭 <u class="font-weight-bold">{{ $search_q }}</u>.</p>
                        
                        <a href="" class="btn btn-lg btn-success mt-5 mb-3">
                            HELP NOW
                        </a>

                        <small class="text-muted d-block">
                            But you can help us <u class="font-weight-bold">improve our records</u> by giving us <br> more details about <u class="font-weight-bold">{{ $search_q }} zip code</u>, it'll only take you 😘 1 minute 💪.
                        </small>
                    </div>
                </div>
            </div> <!-- [ .col-xl-12 ] END -->
        </div> <!-- [ .row ] END -->

    @endif



    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            <div class="cardads text-right">
                <a href="#"><img class="img-fluid" width="500px" src="https://sg-test-11.slatic.net/other/lzd-ad/ec1b853e95ca4b1b7150753f1bbb4f8a.jpeg" alt="" srcset="" /></a>
                <span class="text-muted font-weight-bolder">Ad</span>
            </div>
        </div>
    </div>

</div> <!-- [ .container ] END -->
@endsection



@section('page_scripts') 
<!-- jQuery Core 3.5.1 -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- dataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/fc-3.3.1/fh-3.1.7/r-2.2.6/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/datatables.mark.js@2.0.2/dist/datatables.mark.es6.min.js"></script>

<script>
var xhr = null;

$(function() {
                
    $(`form[name="search-form"]`).on(`submit`, function(e) {
            
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
                                </div>`);

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



    var oTable = $('#results-table').DataTable({
        pagingType: 'simple',
        responsive: true,
        sDom: "<'dt-toolbar'<'col-xs-12 col-sm-12 no-padding'f>>" +
            "tr" +
            "<'dt-toolbar-footer'<'col-xs-12 col-sm-12'lip>>",
        language: {
            search: "",
            searchPlaceholder: "🔍 Filter results 🔥",
            emptyTable: "Zip Code information does not exist.",
            processing: "<img src='img/select2-spinner.gif'/> Loading...",
            info: "_START_ - _END_ of _TOTAL_",
            paginate: {
                sNext: '<i class="fa fa-angle-right fa-lg"></i>',
                sPrevious: '<i class="fa fa-angle-left fa-lg"></i>'
            }
        }
    });

});
</script>
@endsection