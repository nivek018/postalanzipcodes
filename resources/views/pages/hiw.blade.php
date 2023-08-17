@extends('layouts.app')
@section('title', $data['page_title'])
@section('description', $data['description'])
@section('canonical', $data['canonical'])

@section('content')
    <div class="relative overflow-hidden pb-10 md:pb-5">
        <section class="bg-[#1B1A21] text-white pt-3 md:pt-4 relative">
            <header class="z-10">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-4 pb-32">
                    <h1
                        class="font-black md:text-left leading-relaxed text-4xl md:text-4xl lg:text-5xl tracking-tight md:pr-24">
                        How it Works
                    </h1>
                </div>
            </header>
            <img src="{{ asset('branding/drip-horizontal-multi.png') }}" alt="" width="114"
                class="absolute top-24 left-0 hidden lg:block">
            <div class="bg-paper-tear -bottom-24 absolute flip-y"></div>
        </section>

        <section class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div
                class="px-4 py-8 stack-gray font-NanumPenScript text-2xl border dark:bg-white border-black flex flex-col space-y-6 relative">
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
            </div>
        </section>
    </div>
@endsection

@section('page_scripts')@endsection
