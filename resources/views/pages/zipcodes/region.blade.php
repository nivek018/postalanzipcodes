@extends('layouts.app')
@section('title', $data['page_title'])
@section('description', $data['description'])
@section('canonical', $data['canonical'])

@section('content')
    <section class="relative overflow-hidden">

        <!-- search -->
        <x-search-box :showBackground="true" />
        <!--  -->
        <!--  -->

        <!-- ads -->
        {{-- @include('ads.ads1') --}}
        <!--  -->
        <!--  -->

        @if (null !== $data['results'])
            {{-- zip code list display --}}
            <x-zip-list :results="$data['results']" :page_info="$data['page_info']" :subheader_title="$data['subheader_title']" />
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
