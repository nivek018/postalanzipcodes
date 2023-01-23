@extends('layouts.app')
@section('title', 'Search Zip Codes')



@section('page_styles')
<style>

</style>
@endsection



@section('content')
<div class="relative overflow-hidden py-10">

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        {{-- <video
                poster="{{ asset('image/vid_1.svg') }}"
                autoplay="{true}" loop muted
                class="absolute z-10 w-auto min-w-full min-h-full max-w-none inset-0">
            <source src="{{ asset('image/vid_1.webm') }}" type="video/webm">
            <source src="{{ asset('image/vid_1.mp4') }}" type="video/mp4">
        </video> --}}

        <img class="absolute object-cover z-10 w-full h-full inset-0"
            src="{{ asset('image/post-office.webp') }}" alt="" srcset="">

        <div class="absolute z-10 opacity-80 inset-0 bg-gradient-to-tl from-yellow-800 to-green-900 w-full h-full"></div>

        <div class="flex h-[80vh] z-20 items-center justify-center w-full relative">
            <form class="w-11/12 md:w-3/4 min-h-fit h-fit" id="index-search-form" autocomplete="off">

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
                            <button type="submit">
                                {{-- loader --}}
                                <div id="submit-loader" class="hidden">
                                    <svg aria-hidden="true" class="cursor-wait w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>

                                {{-- search icon --}}
                                <span id="submit-icon" class="">
                                    <svg aria-hidden="true" class="w-8 h-8 text-gray-500 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="mt-3 space-x-2 text-center justify-center flex overflow-auto touch-pan-x " id="user-searches">&nbsp;</div>
                </div>

                <div class="flex flex-col space-y-10 mt-16 h-auto items-center justify-center">
                    <div class="text-gray-50 text-center max-w-xl">
                        <h2 class="text-center text-gray-50 text-2xl font-semibold">Zip Code Search Directory</h2>
                        <p class="">
                            Explore the Philippines with our comprehensive zip code directory. Discover towns, cities and regions with our easy-to-use zip code lookup tool. Find all the essential information you need, from demographics to local statistics, and explore the unique culture and lifestyle of this dynamic country. With a range of zip codes, you'll be able to find what you're looking for quickly and easily.
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
// add event listener to load when the page is ready
window.addEventListener('load', function() {

    const submitIcon = document.querySelector("#submit-icon");
    const submitLoader = document.querySelector("#submit-loader");
    const submitBtn = document.querySelector("button[type='submit']");
    const this_que = document.querySelector('input[name="q"]');

    // add event listener to the form
    document.getElementById("index-search-form").addEventListener("submit", function(event) {

        // prevent the default action
        event.preventDefault();

        if (this_que.value == "") {
            return false;
        }

        // get the form data
        const formData = new FormData(this);

        // disable the submit button
        submitBtn.setAttribute("disabled", true);

        // add the loading class to the submit button
        submitIcon.classList.add("hidden");
        submitLoader.classList.remove("hidden");



        fetch(`{{ route('search_q') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                q: this_que.value,
            })
        })
        .then(response => response.json())
        .then(data => {

            setTimeout(() => {

                if (data.success == true) {
                    window.location.replace(data.url);
                }

                /* call function to save user searches on localstorage */
                saveSearchLocal( formData.get(`q`) );

                submitIcon.classList.remove("hidden");
                submitLoader.classList.add("hidden");

                // enable the submit button
                submitBtn.removeAttribute("disabled");

            }, 1000);

        })
        .catch(error => {

            console.error(error);

            setTimeout(() => {
                submitIcon.classList.remove("hidden");
                submitLoader.classList.add("hidden");

                // enable the submit button
                submitBtn.removeAttribute("disabled");
            }, 1000);

        });

    });

});
</script>
@endsection
