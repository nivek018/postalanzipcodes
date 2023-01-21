@extends('layouts.app')
@section('title', 'Search Zip Codes')



@section('page_styles')
<style>

</style>
@endsection



@section('content')
<div class="relative overflow-hidden py-10">

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <video
                poster="{{ asset('image/vid_1.svg') }}"
                autoplay="{true}" loop muted
                class="absolute z-10 w-auto min-w-full min-h-full max-w-none inset-0">
            <source src="{{ asset('image/vid_1.webm') }}" type="video/webm">
            <source src="{{ asset('image/vid_1.mp4') }}" type="video/mp4">
        </video>

        {{-- <video
            src="{{ asset('image/vid_1.mp4') }}"
            autoplay="{true}" loop muted
            class="absolute z-10 w-auto min-w-full min-h-full max-w-none inset-0">
        </video> --}}

        <div class="absolute z-10 opacity-90 inset-0 bg-gradient-to-tl from-gray-800 to-gray-900 w-full h-full"></div>

        <div class="flex h-[80vh] z-20 items-center justify-center w-full relative">
            <form class="w-11/12 md:w-3/4 min-h-fit h-fit" name="index-search-form" autocomplete="off">

                @csrf



                <div class="mx-auto w-full md:w-4/5 h-full flex-auto">
                    <label for="search" class="block text-4xl font-extrabold uppercase text-white text-center mb-10">Postal/Zip Code Search</label>

                    <div class="relative mt-1 flex items-center">
                        <input class="transition-all ease-in-out duration-300 block w-full rounded-full border-gray-300 text-gray-900 font-light text-xl py-5 px-8 pr-16 shadow-sm outline-none ring-2 focus:ring-offset-blue-700 focus:ring-offset-2 focus:border-blue-500 focus:ring-blue-500"
                                maxlength="255"
                                type="text"
                                name="q"
                                id="search"
                                placeholder="Barangay, City, Zip Code...">

                        <div class="absolute right-0 flex py-1.5 pr-8">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-500 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </div>

                    <div class="mt-3 space-x-2 text-center justify-center flex overflow-auto touch-pan-x " id="user-searches">&nbsp;</div>
                </div>

                <div class="flex flex-col space-y-10 mt-10 h-auto items-center justify-center">
                    <div class="text-gray-50 text-center max-w-lg">
                        <h1 class="text-center text-gray-50 text-2xl font-semibold">Zip Code Search Directory</h1>
                        <p class="">
                            Explore the Philippines with our comprehensive zip code directory. Discover towns, cities and regions with our easy-to-use zip code lookup tool. Find all the essential information you need, from demographics to local statistics, and explore the unique culture and lifestyle of this dynamic country. With a range of zip codes, you'll be able to find what you're looking for quickly and easily.
                        </p>
                    </div>

                    <div class="text-gray-50 mt-5 text-center max-w-lg">
                        <p class="">
                            The Philippine Zip Code Directory that we maintain is always update-to-date, And as of the moment, we have a total of {{ session('sess_total_zipcodes') ?? 99 }} Zip Codes in our directory.
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
