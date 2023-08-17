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
                        Contact Us
                    </h1>
                </div>
            </header>
            <img src="{{ asset('branding/drip-horizontal-multi.png') }}" alt="" width="114"
                class="absolute top-24 left-0 hidden lg:block">
            <div class="bg-paper-tear -bottom-24 absolute flip-y"></div>
        </section>

        <section class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div
                class="w-full max-w-screen-lg mx-auto space-y-6 lg:px-8 px-4 py-8 stack-gray text-2xl border dark:bg-white border-black flex flex-col relative">

                <div class="flex items-center p-4 mb-4 text-base text-yellow-800 border border-yellow-300 rounded-lg shadow-sm bg-yellow-50 dark:bg-orange-100 dark:text-amber-800 dark:border-yellow-200"
                    role="alert">
                    <span class="sr-only">Info</span>
                    <div class="flex flex-col space-y-2">
                        <p class="text-lg font-bold">Warning</p>
                        <span>We will only entertain if your topic is related to <strong>Collaboration</strong>, and
                            <strong>Partnership Opportunities</strong>.</span>
                    </div>
                </div>

                <section>
                    <header>
                        <h2 class="text-xl font-bold">
                            For the above said inquries, you can send an email to:
                        </h2>
                    </header>
                    <p class="text-sm">
                        You can email me at <a href="mailto:mark@aiowireless.ph"
                            class="text-pink-500 underline hover:opacity-90">mark@aiowireless.ph</a> or to our official
                        email
                        address <a href="mailto:hello@aiowireless.ph"
                            class="text-pink-500 underline hover:opacity-90">hello@aiowireless.ph</a>.
                    </p>
                </section>

                <section>
                    <header>
                        <h2 class="text-xl font-bold">
                            Our work Address is located at:
                        </h2>
                    </header>
                    <div itemscope itemtype="http://schema.org/Organization" class="text-sm">
                        <h2><span itemprop="name">AIO WIRELESS NETWORK AND DATA SOLUTION</span></h2>
                        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                            <p>
                                <span itemprop="streetAddress">103 Samson Road, Barangay 80</span><br />
                                <span itemprop="addressLocality">Caloocan City</span>,
                                <span itemprop="addressRegion">National Capital Region</span><br />
                                <span itemprop="postalCode">1400</span><br />
                                <span itemprop="addressCountry">Philippines</span>
                            </p>
                        </div>
                        <p>
                            Tel: <span itemprop="telephone">+63 0947 845 1828</span><br />
                            Email: <span itemprop="email">hello@aiowireless.ph</span>
                        </p>
                    </div>
                </section>

                <section>
                    <div itemscope itemtype="http://schema.org/Place">
                        <h2><span itemprop="name">AIO WIRELESS NETWORK AND DATA SOLUTION</span></h2>
                        <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                            <meta itemprop="latitude" content="14.657823" />
                            <meta itemprop="longitude" content="120.975849" />
                        </div>
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15439.867383659717!2d120.975849!3d14.657823!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b51df3a6fcc7%3A0x76695dc17f96813a!2sAIO%20Wireless%20Network%20and%20Data%20Solution!5e0!3m2!1sen!2sph!4v1690909471795!5m2!1sen!2sph"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </section>

                <div>
                    <p>
                        <a href="{{ route('index') }}"
                            class="flex items-center gap-2 font-bold text-gray-950 hover:underline"><svg
                                class="inline-flex w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z">
                                </path>
                            </svg> Go back to home page</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('page_scripts')@endsection
