@extends('layouts.app')
@section('title', $data['page_title'])
@section('description', $data['description'])
@section('canonical', $data['canonical'])

@section('content')
    <div class="relative overflow-hidden py-10 md:py-5">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="stack-sm font-mono border border-black p-4 flex flex-col space-y-6 py-8">
                <p>Hey there, I'm <a href="https://twitter.com/mnoquiao" target="_blank"
                        class="font-bold hover:underline font-NanumPenScript text-3xl"
                        title="Visit my twitter profile @mnoquiao">Mark
                        Anthony
                        Noquiao</a>, the creator of this website. I've dedicated my efforts to building a comprehensive and
                    accurate zip code directory for the Philippines. My goal is to provide a reliable resource where fellow
                    Filipinos can easily search for specific zip codes across the country. With this platform, you can
                    conveniently find the zip code you need for your mail, packages, or any other postal-related purposes. I
                    understand the importance of having access to up-to-date and precise zip code information, and that's
                    why I've put in the effort to curate a reliable database for your convenience. Feel free to explore the
                    site and utilize the search functionality to find the accurate zip code you're looking for.
                </p>

                <p>I hope you'll enjoy using <a href="" title="" class="font-bold hover:underline"></a> and
                    consider sharing it with
                    your friends and family. If you have any
                    feedback or questions, please feel free to reach out to me through the <a href="#"
                        title="Contact US" class="font-bold hover:underline">Contact Us</a> page. It's important to note
                    that this website is not affiliated with or endorsed by the <a href="https://psa.gov.ph/"
                        target="_blank" title="Visit PCSO.gov.ph" class="font-bold hover:underline">Philippine Statistics
                        Authority (PSA)<svg class="inline-flex w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z">
                            </path>
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z">
                            </path>
                        </svg></a>, the
                    official agency responsible for managing zip code data in the Philippines. While we strive to provide
                    accurate and comprehensive zip code information, we rely on publicly available sources and user
                    contributions. We make every effort to ensure the data on our website is up-to-date and reliable, but we
                    encourage users to verify the information with the PSA or their local post office for official
                    confirmation. Our aim is to create a user-friendly platform that assists Filipinos in easily accessing
                    zip code information, but we do not claim to be the official source of zip codes in the Philippines.
                </p>

                <p class="text-sm">
                    You may also want to check my other projects <a
                        href="https://https://lottopcso.io/results/lotto-result-today" target="_blank"
                        title="Visit LottoPCSO.io for daily lotto results" class="font-bold underline">LottoPCSO.io<svg
                            class="inline-flex w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z">
                            </path>
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z">
                            </path>
                        </svg></a> - a lotto results news site,
                    and <a href="https://aiztools.com/" target="_blank" title="Visit AizTools.com"
                        class="font-bold underline">AizTools.com<svg class="inline-flex w-3 h-3" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z">
                            </path>
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z">
                            </path>
                        </svg></a> - an online calculators and converters site.
                </p>

                <p>
                    <a href="https://twitter.com/mnoquiao?ref_src=twsrc%5Etfw" class="twitter-follow-button"
                        data-show-count="false">Follow @mnoquiao</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')@endsection
