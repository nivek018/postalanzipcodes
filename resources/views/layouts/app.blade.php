<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <meta name="description" content="{{ $description ?? '' }}">
    <link rel="canonical" href="{{ $canonical ?? '' }}" />
    <meta name="robots" content="index">
    <meta name="googlebot" content="index">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('image/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('image/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('image/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('image/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('image/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('image/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('image/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('image/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('image/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('image/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('image/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('image/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anton&family=Caveat:wght@400;500;600;700&family=IBM+Plex+Sans:wght@700&display=swap"
        rel="stylesheet">

    <!-- main resources app -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- in-page styles -->
    @yield('page_styles')
    <!--  -->
    <!--  -->

</head>

<body class="dark font-IBMPlexSans">

    <div class="min-h-screen h-full bg-white dark:bg-gray-900"
        style="font-size: 1rem; font-weight: 40; line-height: 1.5rem;">

        <!--                                    -->
        <!--    menus and nagivation            -->
        @include('includes.header')
        <!--                                    -->

        <main>
            <div class="h-full dark:bg-white">

                {{-- <div class="h-96 rounded-lg border-4 border-dashed border-gray-200"></div> --}}
                <!--                                    -->
                <!--    main content (pages)            -->
                @yield('content')
                <!--                                    -->

            </div>
        </main>

        <!--                                    -->
        <!--    menus and nagivation            -->
        @include('includes.footer')
        <!--                                    -->

    </div>

    <!--                                    -->
    <!--    global js scripts               -->
    @include('scripts')
    <!--                                    -->



    <!--                                    -->
    <!--    in-page js scripts              -->
    @yield('page_scripts')
    <!--                                    -->

</body>

</html>
