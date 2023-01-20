@extends('layouts.app')
@section('title', $page_title)
@section('page_styles')

@endsection

@section('content')
<div class="relative overflow-hidden py-10 md:py-5">

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        <!-- search -->
        @include('includes.search')
        <!--  -->
        <!--  -->

        <!-- ads -->
        @include('ads.ads1')
        <!--  -->
        <!--  -->

        @if ( null !== $results )
            {{-- zip code list display --}}
            <x-zip-list :results="$results" :page_info="$page_info" />
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

    </div>
</div>
@endsection



@section('page_scripts')
<!-- dataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/fc-3.3.1/fh-3.1.7/r-2.2.6/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/datatables.mark.js@2.0.2/dist/datatables.mark.es6.min.js"></script>

<script>
$(function() {

    var oTable = $('#results-table').DataTable({
        // ordering: false,
        order: [],
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
