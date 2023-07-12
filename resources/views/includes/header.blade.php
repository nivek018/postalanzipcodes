<header class="flex-none w-full">
    <nav x-data="{ menuOpen: false }" class="z-40 mb-6 lg:mb-20 flex-none w-full mx-auto font-mono dark:bg-gray-900">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0 truncate">
                        <a href="/" title="Go to postalandzipcodes.ph">
                            <div class="flex items-center space-x-1.5 dark:text-gray-50">
                                <img class="h-12 w-12"
                                    src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_auto,w_80,h_80/v1601874637/postalandzipcodes.ph/square-logo.svg"
                                    alt="PostalAndZipCodes Logo">
                            </div>
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="/"
                                class="{{ request()->routeIs('index') ? 'bg-gray-900 text-white' : 'text-gray-200 hover:bg-gray-700 hover:text-white' }}
                                    px-3 py-2 rounded-md text-sm font-medium"
                                aria-current="page">
                                Home
                            </a>

                            <a href="/what-is-my-zip-code"
                                class="{{ request()->routeIs('what-is-my-postal-code') || request()->routeIs('what-is-my-zip-code')
                                    ? 'bg-gray-900 text-white'
                                    : 'text-gray-200 hover:bg-gray-700 hover:text-white' }}
                                                    px-3 py-2 rounded-md text-sm font-medium"
                                title="Get your current location's zip code information.">
                                What is my zip code?
                            </a>

                            <div class="relative hidden">
                                <div>
                                    <button data-dropdown-toggle="dropdown" type="button"
                                        class="flex items-center text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        <span class="sr-only">Open options</span>
                                        Links
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="ml-2 w-4 h-4 inline-block">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </div>

                                <!--
                      Dropdown menu, show/hide based on menu state.

                      Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                                <div id="dropdown"
                                    class="hidden absolute left-0 z-20 mt-2 w-56 origin-top-right bg-white divide-y border border-gray-600  rounded shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 divide-y divide-gray-600"
                                        aria-labelledby="dropdownDividerButton">
                                        <li>
                                            <a href="/about-us"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">About</a>
                                        </li>
                                        <li>
                                            <a href="/terms-of-service"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Terms
                                                of Service</a>
                                        </li>
                                        <li>
                                            <a href="/privacy-policy"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Privacy
                                                Policy</a>
                                        </li>
                                        <li>
                                            <a href="/how-it-works"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">How
                                                it works?</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <a href="./submit-zip-code" title="Contribute to Zip Code Directory" type="button"
                            class="button button-white border-2 border-black flex space-x-1.5 rounded-sm dark:bg-gray-50 dark:text-gray-900 text-sm py-1.5 px-2 font-bold hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span>Contribute</span>
                        </a>

                    </div>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button @click="menuOpen = !menuOpen" type="button"
                        class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
              Heroicon name: outline/bars-3

              Menu open: "hidden", Menu closed: "block"
            -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
              Heroicon name: outline/x-mark

              Menu open: "block", Menu closed: "hidden"
            -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-show="menuOpen" class="md:hidden" id="mobile-menu" x-cloak>
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/"
                    class="{{ request()->routeIs('index') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
                            block px-3 py-2 rounded-md text-base font-medium"
                    aria-current="page">
                    Home
                </a>

                <a href="/what-is-my-zip-code"
                    class="{{ request()->routeIs('what-is-my-postal-code') || request()->routeIs('what-is-my-zip-code')
                        ? 'bg-gray-900 text-white'
                        : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
                                                block px-3 py-2 rounded-md text-base font-medium"
                    title="Get your current location's zip code information.">
                    What is my zip code?
                </a>

            </div>
        </div>
    </nav>
</header>
