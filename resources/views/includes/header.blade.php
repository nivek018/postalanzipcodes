<header class="flex-none w-full">
    <nav class="z-40 pb-0 lg:pb-6 flex-none w-full mx-auto font-mono dark:bg-[#1B1A21] pt-0 lg:pt-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center justify-between gap-6">
                    <button @click="sidebarOpen = !sidebarOpen" type="button"
                        class="transition-all ease-in-out duration-300 button button-white border-2 border-black flex rounded-sm dark:bg-gray-50 dark:text-gray-900 text-sm p-2 font-bold hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>

                    <div class="flex-shrink-0 truncate">
                        <a href="/" title="Home">
                            <div class="flex items-center space-x-1.5 dark:text-gray-50">
                                <img class="h-11 w-auto"
                                    src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_auto,w_80,h_80/v1601874637/postalandzipcodes.ph/square-logo.svg"
                                    alt="PostalAndZipCodes Logo">
                                <span class="text-2xl font-bold truncate">PostalAndZipCodes</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <a href="./submit-zip-code" title="Contribute to Zip Code Directory" type="button"
                            class="transition-all ease-in-out duration-300 button button-white border-2 border-black flex space-x-1.5 rounded-sm dark:bg-gray-50 dark:text-gray-900 text-sm px-2.5 py-2 font-bold hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span>Contribute</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- backdrop --}}
    <div x-show="sidebarOpen" x-cloak class="fixed inset-0 h-screen w-screen dark:bg-opacity-90 dark:bg-gray-900 z-10">
        <button class="absolute top-3.5 right-0 px-1 py-1 dark:text-white lg:hidden">
            <svg class="w-11 h-11" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true">
                <path
                    d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z">
                </path>
            </svg>
        </button>
    </div>
    {{-- sidebar --}}
    <aside x-show="sidebarOpen" @click.outside="sidebarOpen = false" x-cloak
        x-transition:enter="transition ease-in-out transform" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out  transform"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 z-50 w-[calc(100vw-60px)] lg:w-80 h-screen" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-[#1B1A21]">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('my-zip-code') }}" title="Zip code of my location"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path
                                d="M6 3a3 3 0 00-3 3v1.5a.75.75 0 001.5 0V6A1.5 1.5 0 016 4.5h1.5a.75.75 0 000-1.5H6zM16.5 3a.75.75 0 000 1.5H18A1.5 1.5 0 0119.5 6v1.5a.75.75 0 001.5 0V6a3 3 0 00-3-3h-1.5zM12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5zM4.5 16.5a.75.75 0 00-1.5 0V18a3 3 0 003 3h1.5a.75.75 0 000-1.5H6A1.5 1.5 0 014.5 18v-1.5zM21 16.5a.75.75 0 00-1.5 0V18a1.5 1.5 0 01-1.5 1.5h-1.5a.75.75 0 000 1.5H18a3 3 0 003-3v-1.5z">
                            </path>
                        </svg>
                        <span class="ml-3">My Zip code</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-ncr" data-collapse-toggle="dropdown-ncr">
                        <svg class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">NCR Zip Codes</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-ncr" class="hidden py-2 space-y-2">
                        @foreach ($NCRZipCodes as $location)
                            <li>
                                <a href="{{ route('url_city', $location['slug']) }}"
                                    title="{{ $location['city'] }} Zip Codes"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ $location['city'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-regional" data-collapse-toggle="dropdown-regional">
                        <svg class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Regional Zip Codes</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-regional" class="hidden py-2 space-y-2">
                        @foreach ($RegionalZipCodes as $location)
                            <li>
                                <a href="{{ route('url_region', $location['slug']) }}"
                                    title="{{ $location['region'] }} Zip Codes"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ $location['region'] }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </li>
            </ul>
        </div>
    </aside>




    <img src="{{ asset('branding/drip-vertical-orange.png') }}" alt="" width="69"
        class="absolute top-0 left-80 hidden lg:block">
    <img src="{{ asset('branding/drip-vertical-blue.png') }}" alt="" width="26"
        class="absolute top-0 right-4 hidden lg:block">
</header>
