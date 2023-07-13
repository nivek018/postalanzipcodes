@extends('layouts.app')
@section('title', $data['page_title'])
@section('description', $data['description'])
@section('canonical', $data['canonical'])

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

            <img class="absolute object-cover w-full h-full inset-0" src="{{ asset('image/post-office.webp') }}" alt=""
                srcset="">

            <div class="absolute opacity-80 inset-0 bg-gradient-to-tl from-yellow-800 to-green-900 w-full h-full"></div>

            <div class="min-h-[calc(100vh-620px)] flex flex-col items-center relative">

                <header
                    class="flex flex-wrap items-center justify-center dark:text-gray-50 mt-8 mb-4 max-w-screen-md px-4 text-center">
                    <h1 class="text-4xl font-bold text-white text-center font-Inter">
                        Explore the Complete Collection of <span
                            class="whitespace-nowrap font-NanumPenScript font-black text-7xl mx-2 text-transparent leading-none py-1 bg-clip-text bg-gradient-to-r from-amber-200 to-yellow-100">Zip
                            Codes</span> in the <span
                            class="font-Caveat font-black text-7xl text-transparent leading-none bg-clip-text bg-[conic-gradient(at_bottom,_var(--tw-gradient-stops))] from-blue-500 to-red-600">Philippines</span>
                    </h1>
                    <p class="text-lg font-NanumPenScript uppercase mt-6">Your Reliable Source for Accurate and Up-to-Date
                        Postal
                        Information
                    </p>
                </header>

                <!-- search -->
                <x-search-box :showBackground="false" />
                <!--  -->
                <!--  -->

                <div class="flex flex-col space-y-10 mt-16 h-auto items-center justify-center">
                    <div class="text-gray-50 text-center max-w-xl">
                        <h2 class="text-center text-gray-50 text-3xl font-bold mb-4 font-Caveat">Zip Code Directory</h2>

                        <p class="font-NanumPenScript text-lg mb-5">
                            Discover the Comprehensive Zip Code Directory of the Philippines - Your Source for Accurate and
                            Up-to-Date Postal Information
                        </p>

                        <p class="font-NanumPenScript text-lg mb-5">
                            Our website, postalandzipcodes.ph, provides an extensive collection of Zip Code information for
                            every corner of the Philippines. We diligently maintain and regularly update our records to
                            ensure their accuracy. Whether you're looking for Barangay, City, Town, or Regional Zip Codes,
                            we have it all!
                        </p>

                        <p class="font-NanumPenScript text-lg mb-5">
                            We also value the contributions of our visitors. If you cannot find a specific zip code on our
                            site, we encourage you to contribute and be part of our growing database. By sharing your
                            knowledge, you'll help future visitors find the information they need.
                        </p>

                        <p class="font-NanumPenScript text-lg mb-5">
                            Stay informed and navigate the Philippine postal system with ease. Explore our comprehensive Zip
                            Code directory and experience the convenience of having the latest and most reliable postal
                            codes at your fingertips.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
