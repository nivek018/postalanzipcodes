@props(['results', 'page_info'])

<h2 class="mb-4 px-4 py-4 sm:px-6 text-xl dark:text-gray-300 font-semibold">
{!! $page_info !!}
</h2>

<div class="overflow-hidden shadow rounded relative bg-gray-800">

    <div class="px-6 py-5 border border-b-0 dark:border-gray-700 hidden">
        <div class="max-w-full md:max-w-md">
            <form x-data @submit.prevent>
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="search" id="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Filter Results" required>
                </div>
            </form>

        </div>
    </div>

    <ul role="list" class="border border-gray-200 divide-y divide-gray-200 shadow dark:divide-gray-700 dark:border-gray-700">
        @foreach($results as $idx => $value)
        <li>
            <div class="block hover:bg-gray-700">
                <div class="px-4 py-4 md:py-6 md:px-6">
                    <div class="flex items-center justify-between space-y-4 md:space-y-0">
                        <a href="{{ $value->barangay_url }}" class="hover:underline truncate text-lg font-bold text-blue-500 uppercase">
                            {{ $value->barangay }}
                        </a>
                        <div class="ml-2 flex flex-shrink-0">
                        <a href="{{ $value->postal_url }}" class="hover:underline text-2xl inline-flex font-semibold text-gray-200" title="Zip Code">
                            {{ $value->postal  }}
                        </a>
                        </div>
                    </div>
                    <div class="mt-2 sm:flex sm:justify-between space-y-4 md:space-y-0">
                        <div class="sm:flex space-y-4 md:space-y-0">
                            <p class="flex items-center text-sm text-gray-300" title="City, Town or Province">
                                <a href="{{ $value->city_url }}" class="flex hover:underline">
                                    <!-- Heroicon name: mini/map-pin -->
                                    <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $value->city  }}
                                </a>
                            </p>
                            <p class="mt-2 flex items-center text-sm text-gray-300 sm:mt-0 sm:ml-6" title="Region">
                                <a href="{{ $value->url_region }}" class="flex hover:underline">
                                    <!-- Heroicon name: mini/map-pin -->
                                    <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />
                                    </svg>
                                    Region: {{ $value->region  }}
                                </a>
                            </p>
                        </div>

                        <div class="mt-2 flex items-center text-sm text-gray-300 sm:mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <p title="Phone Area Code">
                                Phone Area Code: {{ $value->phone_area_code  }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>

</div>
