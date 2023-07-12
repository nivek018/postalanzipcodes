@extends('layouts.app')
@section('title', $page_title)
@section('page_styles')

@endsection

@section('content')
    <section class="relative overflow-hidden">

        <!-- search -->
        @include('includes.search')
        <!--  -->
        <!--  -->

        <!-- ads -->
        {{-- @include('ads.ads1') --}}
        <!--  -->
        <!--  -->

        @if (null !== $results)
            {{-- zip code list display --}}
            <x-zip-list :$results :$page_info :$subheader_title />
        @else
            <!-- no results -->
            @include('includes.no-results')
            <!--  -->
            <!--  -->
        @endif

        <!-- ads -->
        {{-- @include('ads.ads2') --}}
        <!--  -->
        <!--  -->

    </section>
@endsection



@section('page_scripts')
@endsection
