<footer class="mt-auto p-4 bg-white shadow md:px-6 md:py-8 border-t border-gray-600 dark:bg-gray-800">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="md:max-w-lg">
                <a href="https://postalandzipcodes.ph/" class="flex items-center mb-4 sm:mb-0">
                    <img src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_auto,w_80,h_80/v1601874637/postalandzipcodes.ph/square-logo.svg"
                        class="h-12 mr-3" alt="postalandzipcodes.ph" />
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">postalandzipcodes.ph</span>
                </a>

                <p class="text-sm text-gray-400 mt-2 mb-8 lg:mb-0">
                    Discover the constantly updated Philippine Zip Code Directory. Explore our comprehensive collection
                    of {{ session('sess_total_zipcodes') ?? 99 }} Zip Codes, ensuring accuracy and reliability. Stay
                    informed with the latest postal codes for your convenience.
                </p>
            </div>

            <ul class="flex flex-wrap items-center mb-6 text-sm gap-3 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="/about-us" class="mr-4 hover:underline md:mr-6">About</a>
                </li>
                <li>
                    <a href="/terms-of-service" class="mr-4 hover:underline md:mr-6">Terms of Service</a>
                </li>
                <li>
                    <a href="/privacy-policy" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="/how-it-works" class="hover:underline">How it works?</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />

        <span class="text-sm text-gray-500 dark:text-gray-400 w-full">
            <span class="mr-2">
                &copy; 2019 - {{ date('Y') }}
                <a href="https://postalandzipcodes.ph/" class="hover:underline">postalandzipcodes.ph</a>
            </span>
            <div class="mt-2 md:inline-block md:mt-0 md:space-x-2">
                <span class="hidden md:inline-block">|</span>
                <button type="button" role="button" data-modal-toggle="medium-modal"
                    class="hover:text-gray-100 text-white font-medium text-sm">
                    Donate ❤️
                </button>
            </div>
        </span>
    </div>
</footer>


@if (rand(1, 10) % 2 == 1)
    <a href="https://shope.ee/8pDVmnJsEG" target="_blank" class="fixed right-4 bottom-4 lg:right-8 lg:bottom-8 z-[9999]"
        title="ShopeePay Promo">
        <img class="object-fill w-[80px] h-[80px] lg:w-[90px] lg:h-[90px]"
            src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_auto/v1674966819/postalandzipcodes.ph/ads-images/shopee-click.gif"
            alt="" srcset="">
    </a>
@else
    <a href="https://shope.ee/8pDVmnJsEG" target="_blank" class="fixed right-4 bottom-4 lg:right-8 lg:bottom-8 z-[9999]"
        title="ShopeePay Promo">
        <img class="object-fill w-[80px] h-[80px] lg:w-[90px] lg:h-[90px]"
            src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_auto/v1674966427/postalandzipcodes.ph/ads-images/ph-50009109-c3e63c811b64fe4b2b234ed9e6ceffd7.gif"
            alt="" srcset="">
    </a>
@endif


<!-- Default Modal -->
<div id="medium-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-[999] hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-lg md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Donation
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="medium-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Your support is crucial in helping us maintain and improve our site. With your donation, we can
                    continue to provide valuable resources and services to our users. Every little bit helps and we
                    deeply appreciate your generosity.
                </p>

                <div
                    class="flex flex-col md:flex-row md:justify-between border rounded border-gray-500 p-4 space-y-6 md:space-y-0 md:space-x-4">
                    <div>
                        <span class="text-xl text-gray-200 font-medium">GCASH</span>
                        <span class="block text-sm text-gray-200 font-light">MARK ANTHONY N..</span>
                        <span class="block text-sm text-gray-200 font-light mb-2">09457743837</span>
                        <img class="w-full object-contain" src="{{ asset('image/donate-GCASH.webp') }}" alt=""
                            srcset="">
                    </div>
                    <div>
                        <span class="text-xl text-gray-200 font-medium">MAYA</span>
                        <span class="block text-sm text-gray-200 font-light">MARK ANTHONY N..</span>
                        <span class="block text-sm text-gray-200 font-light mb-2">09478451828</span>
                        <img class="w-full object-contain" src="{{ asset('image/donate-MAYA.webp') }}" alt=""
                            srcset="">
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="medium-modal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
            </div>
        </div>
    </div>
</div>
