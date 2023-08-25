@props(['results', 'page_info', 'subheader_title'])

<section class="bg-[#1B1A21]">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-8 h-full w-full relative min-h-[250px]">
        <center><x-ads-square /> </center>
    </div>

<section class="bg-[#1B1A21] text-white pt-3 md:pt-4 relative">
    <header class="z-10">
        <div class="max-w-screen-lg mx-auto px-4 lg:px-6 py-4 pb-96">
            <h1
                class="font-black text-center md:text-left leading-relaxed text-4xl md:text-4xl lg:text-5xl tracking-tight md:pr-24">
                {{ html_entity_decode($subheader_title) }}
            </h1>
            <p class="my-16 font-hand text-2xl text-mint antialiased text-center md:text-left font-NanumPenScript">
                {!! $page_info !!}
            </p>
        </div>
    </header>

    <div class="bg-paper-tear -bottom-24 absolute flip-y"></div>
</section>

<section class="dark:text-black dark:white -mt-[28rem] lg:-mt-96 min-h-[70rem]">
    <div class="max-w-screen-xl mx-auto px-0 lg:px-6 py-10">

        {{-- kalabaw background --}}
        <div class="absolute w-full h-[17.6rem] mt-[40rem]  inset-x-0"
            style="background-image: url({{ asset('/image/kalabaw.svg') }});background-size: 167px;"></div>

        <div class="px-4 py-5 border border-b-0 dark:border-gray-700 hidden">
            <div class="max-w-full md:max-w-md">
                <form x-data @submit.prevent>
                    <label for="fiter-results"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="fiter-results" name="search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Filter Results" required>
                    </div>
                </form>

            </div>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-base text-left dark:text-gray-400 flex flex-col px-6 lg:px-4 font-mono">
                <thead class="text-sm font-black uppercase font-Inter tracking-widest">
                    <tr
                        class="hidden lg:flex lg:flex-row stack-gray border rounded-sm dark:bg-amber-400 dark:text-gray-900 dark:border-gray-700 flex-wrap my-8 lg:my-6">
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
                            class="stack-sm border rounded-sm dark:bg-white dark:border-gray-700 flex flex-row flex-wrap my-7 lg:my-6">
                            <th scope="row"
                                class="basis-3/5 lg:basis-1/5 flex items-end lg:items-start pl-6 py-4 font-medium dark:text-gray-900">
                                <a href="{{ $value->barangay_url }}"
                                    title="zip code information of {{ $value->barangay }}"
                                    class="hover:underline text-4xl lg:text-3xl font-bold font-NanumPenScript">
                                    {{ $value->barangay }}
                                </a>
                            </th>
                            <td
                                class="basis-2/5 lg:basis-1/5 grow flex justify-end lg:justify-start px-6 py-4 font-medium dark:text-gray-900">
                                <a href="{{ $value->postal_url }}" title="{{ $value->postal }} zip code info"
                                    class="hover:underline text-xl font-black lg:text-lg font-Inter">
                                    <dl>
                                        <dt class="sr-only">Zip Code</dt>
                                        <dd>
                                            {{ $value->postal }}
                                        </dd>
                                    </dl>
                                </a>
                            </td>
                            <td
                                class="basis-full lg:basis-1/5 grow-0 px-6 py-0.5 lg:py-4 font-medium dark:text-gray-900">
                                <a href="{{ $value->city_url }}" title="zip codes details for {{ $value->city }}"
                                    class="hover:underline text-xl font-medium font-Caveat">
                                    <svg class="w-5 h-5 inline-flex dark:text-gray-700" fill="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z">
                                        </path>
                                    </svg>
                                    {{ $value->city }}
                                </a>
                            </td>
                            <td
                                class="basis-full lg:basis-1/5 grow-0 px-6 py-0.5 lg:py-4 font-medium dark:text-gray-900">
                                <a href="{{ $value->url_region }}" title="zip codes details for {{ $value->region }}"
                                    class="hover:underline text-xl font-medium font-Caveat">
                                    <svg class="w-5 h-5 inline-flex dark:text-gray-700" fill="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z">
                                        </path>
                                    </svg>
                                    {{ $value->region }}
                                </a>
                            </td>
                            <td
                                class="basis-full lg:basis-1/5 grow-0 px-6 py-0 lg:py-4 font-medium dark:text-gray-600 mb-4">
                                <dl
                                    class="flex items-center justify-start lg:justify-center gap-2 text-sm font-medium lg:text-base">
                                    <dt class="block lg:hidden">Phone Area Code</dt>
                                    <dd class="font-Caveat text-3xl">
                                        {{ $value->phone_area_code }}
                                    </dd>
                                </dl>
                            </td>
                        </tr>

                        {{-- on first loop --}}
                        @if (($loop->index == 0 || $loop->index % 5 == 0) && $loop->index < 16)
                            <tr class="flex relative items-center h-auto w-auto mb-6">
                                <td colspan="5" class="flex-auto min-h-[80px] w-0 relative">
                                    <x-ads-horizontal />
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <div class="max-w-lg lg:max-w-3xl mx-auto text-center lg:pt-16 relative">
            <div class="relative">
                <div class="bg-mint h-8 lg:h-16 inset-0 w-full absolute m-auto"></div>
                <h2 class="font-display font-bold leading-none relative z-10 italic antialiased text-3xl lg:text-6xl">
                    Continue your Statamic adventure!</h2> <svg width="42" height="34"
                    xmlns="http://www.w3.org/2000/svg" class="absolute right-8 -top-16">
                    <g fill="none" fill-rule="evenodd">
                        <path
                            d="M1.9 4.68l10.57 19.65.5 4.698L2.4 9.378 1.9 4.68zm12.44 28.786a.751.751 0 00.525-.796l-.92-8.644a.757.757 0 00-.085-.276L1.41.603a.75.75 0 00-1.406.435l.92 8.645c.01.096.04.19.085.276l12.45 23.146a.751.751 0 00.882.361z"
                            fill="#001207"></path>
                        <path
                            d="M30.224 11.562l9.001-6.908.735 6.862-25.185 19.33-.734-6.862 16.183-12.422zM14.629 32.845l26.579-20.402a.744.744 0 00.288-.67l-.92-8.605a.752.752 0 00-1.205-.512L12.794 23.057a.747.747 0 00-.289.67l.92 8.606a.748.748 0 00.747.667.75.75 0 00.458-.155z"
                            fill="#191A1B"></path>
                        <path
                            d="M16.777 14.698l-1.2.934-.561-1.055 1.761.12zm-.987 2.647l3.424-2.668a.748.748 0 00.254-.804.737.737 0 00-.655-.526l-5.027-.345a.735.735 0 00-.668.339.75.75 0 00-.03.755l1.603 3.012a.738.738 0 00.649.392.73.73 0 00.45-.155z"
                            fill="#001207"></path>
                        <path
                            d="M27.164 7.104l-11.447 8.83-5.36-9.972 16.807 1.142zm-11.23 10.558l3.488-2.691-.458-.594.458.594 10.225-7.888a.75.75 0 00-.408-1.341L9.104 4.373a.75.75 0 00-.711 1.104l6.422 11.946a.751.751 0 001.119.239zm21.81-13.437L13.44 22.971 2.053 1.8l35.69 2.426zM13.656 24.699L40.226 4.204a.75.75 0 00-.407-1.342L.8.212A.75.75 0 00.09 1.314L12.54 24.46a.748.748 0 001.117.239z"
                            fill="#191A1B"></path>
                        <path
                            d="M10.54 5.626l16.703 1.168-8.38 6.654-4.398-.308-3.925-7.514zm9.009 9.214L29.71 6.773a.782.782 0 00.258-.83.752.752 0 00-.662-.542L9.296 4a.74.74 0 00-.677.35.788.788 0 00-.03.78l4.758 9.11c.122.231.35.383.606.401l5.09.356a.731.731 0 00.506-.158z"
                            fill="#191A1B"></path>
                    </g>
                </svg> <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg"
                    class="absolute -left-8 -bottom-8">
                    <g fill="#001207" fill-rule="evenodd">
                        <path
                            d="M4.052 9.105c1.511 5.166 7.336 10.01 12.985 10.796 1.318.183 2.548.137 3.638-.125l-1.324 1.76c-1.115 1.48-3.224 2.126-5.788 1.768-5.119-.713-10.39-5.08-11.751-9.732-.557-1.901-.362-3.613.547-4.821l1.329-1.765c.03.68.151 1.391.364 2.119M20.55 22.438l3.679-4.886.002-.003a.75.75 0 10-1.198-.902l-.003.003c-1.115 1.478-3.224 2.122-5.785 1.766-5.12-.714-10.39-5.08-11.752-9.732-.556-1.902-.362-3.614.548-4.822A.75.75 0 004.84 2.96l-.002.003L1.161 7.85C-.041 9.444-.32 11.626.372 13.993c1.511 5.166 7.336 10.01 12.984 10.797.532.074 1.05.11 1.55.11 2.43 0 4.439-.863 5.643-2.462">
                        </path>
                        <path
                            d="M4.052 9.105c1.511 5.166 7.336 10.01 12.985 10.796 1.318.183 2.548.137 3.638-.125l-1.324 1.76c-1.115 1.48-3.224 2.126-5.788 1.768-5.119-.713-10.39-5.08-11.751-9.732-.557-1.901-.362-3.613.547-4.821l1.329-1.765c.03.68.151 1.391.364 2.119M20.55 22.438l3.679-4.886.002-.003a.75.75 0 10-1.198-.902l-.003.003c-1.115 1.478-3.224 2.122-5.785 1.766-5.12-.714-10.39-5.08-11.752-9.732-.556-1.902-.362-3.614.548-4.822A.75.75 0 004.84 2.96l-.002.003L1.161 7.85C-.041 9.444-.32 11.626.372 13.993c1.511 5.166 7.336 10.01 12.984 10.797.532.074 1.05.11 1.55.11 2.43 0 4.439-.863 5.643-2.462">
                        </path>
                        <path
                            d="M11.828 2.094c5.118.713 10.39 5.079 11.751 9.732.592 2.023.338 3.81-.716 5.03-1.148 1.329-3.195 1.898-5.62 1.56-5.118-.714-10.39-5.08-11.751-9.732-.592-2.024-.338-3.81.716-5.03C7.138 2.576 8.66 2 10.496 2c.428 0 .873.031 1.332.095m12.17 15.742c1.398-1.619 1.76-3.903 1.02-6.431-1.51-5.166-7.335-10.01-12.983-10.797C9.098.201 6.56.952 5.073 2.674c-1.398 1.618-1.76 3.902-1.02 6.43 1.51 5.167 7.335 10.01 12.984 10.797.525.073 1.037.11 1.532.11 2.278 0 4.208-.761 5.43-2.175">
                        </path>
                    </g>
                </svg>
            </div>
        </div> --}}

    </div>
</section>
