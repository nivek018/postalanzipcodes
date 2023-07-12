@props(['results', 'page_info', 'subheader_title'])

<section>
    <header>
        <div class="mx-auto max-w-7xl py-6 px-4">
            <h1 class="text-3xl font-bold tracking-tight text-gray-50">{{ html_entity_decode($subheader_title) }}</h1>
            <p class="mb-4 py-4 text-base font-normal dark:text-gray-300">
                {!! $page_info !!}
            </p>
        </div>
    </header>
</section>

<section class="flex flex-col w-full px-4 relative overflow-hidden rounded-lg">
    <div class="px-4 py-5 border border-b-0 dark:border-gray-700 hidden">
        <div class="max-w-full md:max-w-md">
            <form x-data @submit.prevent>
                <label for="search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Filter Results" required>
                </div>
            </form>

        </div>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400 flex flex-col relative overflow-clip">
            <thead
                class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200 rounded-t-xl font-mono">
                <tr class="hidden lg:flex lg:flex-row">
                    <th scope="col" class="basis-1/5 px-6 py-3">Location</th>
                    <th scope="col" class="basis-1/5 px-6 py-3">Zip Code</th>
                    <th scope="col" class="basis-1/5 px-6 py-3">City or Town</th>
                    <th scope="col" class="basis-1/5 px-6 py-3">Region or Province</th>
                    <th scope="col" class="basis-1/5 px-6 py-3 justify-center flex">Phone Area Code</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $idx => $value)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 flex flex-row flex-wrap my-6 lg:my-2 border-blue-500 rounded-xl">
                        <th scope="row"
                            class="basis-3/5 lg:basis-1/5 flex items-end lg:items-start grow-0 px-6 py-4 font-medium text-gray-900 dark:text-white">
                            <a href="{{ $value->barangay_url }}" title="zip code information of {{ $value->barangay }}"
                                class="hover:underline text-xl font-bold lg:text-base">
                                {{ $value->barangay }}
                            </a>
                        </th>
                        <td
                            class="basis-2/5 flex justify-end lg:justify-start lg:basis-1/5 grow-0 px-6 py-4 font-medium text-gray-900 dark:text-white">
                            <a href="{{ $value->postal_url }}" title="{{ $value->postal }} zip code info"
                                class="hover:underline text-2xl font-bold lg:text-base">
                                {{ $value->postal }}
                            </a>
                        </td>
                        <td class="basis-auto lg:basis-1/5 grow-0 px-6 py-0 lg:py-4">
                            <a href="{{ $value->city_url }}" title="zip codes details for {{ $value->city }}"
                                class="hover:underline dark:text-white font-bold">
                                {{ $value->city }}
                            </a>
                        </td>
                        <td class="basis-auto lg:basis-1/5 grow-0 px-6 py-0 lg:py-4">
                            <a href="{{ $value->url_region }}" title="zip codes details for {{ $value->region }}"
                                class="hover:underline">
                                {{ $value->region }}
                            </a>
                        </td>
                        <td class="basis-auto lg:basis-1/5 grow-0 px-6 py-0 lg:py-4 mb-4 lg:mb-0 justify-center flex">
                            {{ $value->phone_area_code }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
