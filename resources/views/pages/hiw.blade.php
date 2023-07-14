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
                    <p>
                        Our main data came form the public database provided by <a href="https://psa.gov.ph/">PSA</a> and our
                        in-house we have curated our own datasets by the help of our in-house developers.
                    </p>

                    <p>
                        The results is the most intuitive and user-friendly website for postal and zip code directory <a
                            href="./">postalandzipcodes.ph</a>. All materials used on this website is with the consent
                        of the rightful owner, However if you think that one of your works is used without your consend you
                        can always talk to our support team by sending email to mark@aiowireless.ph
                    </p>

                    <p class="mt-4">
                        We used cloud solutions to host our website and database so we are available to anyone in the world
                        24/7.
                    </p>
                </section>
            </div>

        </div>
    </div>
@endsection

@section('page_scripts')@endsection
