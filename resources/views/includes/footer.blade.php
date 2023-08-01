<footer class="mt-auto p-4 md:px-6 md:py-8 border-t dark:border-gray-600 dark:bg-gray-900 font-Inter">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="md:max-w-lg">
                <a href="https://postalandzipcodes.ph/" class="flex items-center mb-4 sm:mb-0">
                    <img src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_auto,w_80,h_80/v1601874637/postalandzipcodes.ph/square-logo.svg"
                        class="h-12 w-auto mr-3 aspect-square" alt="postalandzipcodes.ph" />
                    <span
                        class="self-center text-3xl font-NanumPenScript font-semibold whitespace-nowrap dark:text-white">PostalAndZipCodes</span>
                </a>

                <p class="text-sm text-gray-200 mt-2 mb-8 lg:mb-0">
                    Discover the constantly updated Philippine Zip Code Directory. Explore our comprehensive collection
                    of {{ session('sess_total_zipcodes') ?? 99 }} Zip Codes, ensuring accuracy and reliability. Stay
                    informed with the latest postal codes for your convenience.
                </p>
            </div>

            <ul class="flex flex-wrap items-center mb-6 text-sm gap-3 sm:mb-0 dark:text-gray-100">
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
                    <a href="/how-it-works" class="mr-4 hover:underline md:mr-6">How it works?</a>
                </li>
                <li>
                    <a href="/contact-us" class="hover:underline">Contact Us</a>
                </li>
            </ul>
        </div>

        <hr class="my-6 border-gray-200 border-dashed sm:mx-auto dark:border-gray-700 lg:my-8" />

        <span class="text-sm dark:text-gray-300 w-full">
            <span>
                &copy;2019—{{ date('Y') }}
                <a href="https://postalandzipcodes.ph/" class="hover:underline">postalandzipcodes.ph</a>, All Rights
                Reserved.
            </span>
        </span>
    </div>
</footer>
