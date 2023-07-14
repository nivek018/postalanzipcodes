@extends('layouts.app')
@section('title', $data['page_title'])
@section('description', $data['description'])
@section('canonical', $data['canonical'])

@section('content')
    <div class="relative overflow-hidden py-10 md:py-5">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div
                class="w-full mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <section class="font-normal dark:text-gray-400">
                    <p class="mb-3 font-normal dark:text-gray-400">
                        This site is a directory and information website for Philippines regions, towns, cities, barangay
                        Postal or Zip Codes information, Our goal is to help our fellow citizen get the information they
                        need related to their location's postal and zip codes information as a bonus we also include some
                        city statisics, local phone area code and population information.
                    </p>

                    <p class="mb-3 font-normal dark:text-gray-400">
                        We hoped that our little effort will help you of what you are looking for and if you like what we
                        did hear sharing this website to your friends and colleague also free feel to visit our other
                        projects by visiting <a href="https://aiowireless.ph/">https://aiowireless.ph/</a>.
                    </p>

                    <p class="mb-3 font-normal dark:text-gray-400">
                        For inquiry email us at mark@aiowireless.ph
                    </p>
                </section>
            </div>

        </div>
    </div>
@endsection

@section('page_scripts')@endsection
