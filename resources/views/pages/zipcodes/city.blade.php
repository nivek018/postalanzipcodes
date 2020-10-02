@extends('layouts.app')
@section('title', $page_title)



@section('page_styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/fc-3.3.1/fh-3.1.7/r-2.2.6/datatables.min.css"/>
<style>

</style>
@endsection



@section('content')
<div class="container mt-5">

    <!-- ads -->
    @include('ads.ads1')
    <!--  -->
    <!--  -->
    


    <!-- search -->
    @include('includes.search')
    <!--  -->
    <!--  -->



    @if ( null !== $results )

        <div class="row mb-2">
            <div class="col-xl-12">
                <h1 class="font-weight-light f-16">{{ $page_info }}</h1>
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

        <!-- no results -->
        @include('includes.no-results')
        <!--  -->
        <!--  -->

    @endif


    <!-- ads -->
    @include('ads.ads2')
    <!--  -->
    <!--  -->

</div> <!-- [ .container ] END -->
@endsection



@section('page_scripts') 
<!-- dataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/fc-3.3.1/fh-3.1.7/r-2.2.6/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/datatables.mark.js@2.0.2/dist/datatables.mark.es6.min.js"></script>

<script>
$(function() {
   
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