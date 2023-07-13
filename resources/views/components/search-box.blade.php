@props(['showBackground'])
<!--                -->
<!-- Search Module  -->
<!--                -->
<section class="@if ($showBackground) dark:bg-gray-900 @endif w-full">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-6 py-10">
        <form id="search-form" autocomplete="off">

            @csrf

            <div class="mx-auto w-full md:w-4/5 h-full flex-auto">
                <div class="relative mt-1 flex items-center">
                    <input
                        class="font-Caveat stack-gold transition-all ease-in-out duration-300 block w-full rounded-none bg-gray-900 border-4 border-amber-400 dark:text-gray-500 tracking-widest text-3xl py-5 px-8 pr-16 shadow-sm focus:dark:bg-gray-900 focus:ring-amber-50 focus:border-white focus:dark:text-amber-400"
                        maxlength="255" type="text" name="q" id="search" value="{{ $search_q ?? '' }}"
                        placeholder="Barangay, City, Zip Code...">

                    <div class="absolute right-0 flex py-1.5 pr-8">
                        <button type="submit" aria-label="Search">
                            {{-- loader --}}
                            <div id="submit-loader" class="hidden">
                                <svg aria-hidden="true"
                                    class="cursor-wait w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>

                            {{-- search icon --}}
                            <span id="submit-icon" class="">
                                <svg aria-hidden="true" class="w-8 h-8 dark:text-amber-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>

                <div class="mt-6 relative overflow-auto mx-auto max-w-sm lg:max-w-screen-lg font-mono">
                    <div class="space-x-2 flex text-center justify-center w-full touch-pan-x" id="user-searches">
                        Loading...
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>

<script>
    // add event listener to load when the page is ready
    window.addEventListener('load', function() {

        const submitIcon = document.querySelector("#submit-icon");
        const submitLoader = document.querySelector("#submit-loader");
        const submitBtn = document.querySelector("button[type='submit']");
        const this_que = document.querySelector('input[name="q"]');

        // add event listener to the form
        document.getElementById("search-form").addEventListener("submit", function(event) {

            // prevent the default action
            event.preventDefault();

            if (this_que.value == "") {
                return false;
            }

            // get the form data
            const formData = new FormData(this);

            // disable the submit button
            submitBtn.setAttribute("disabled", true);

            // add the loading class to the submit button
            submitIcon.classList.add("hidden");
            submitLoader.classList.remove("hidden");



            fetch(`{{ route('search_q') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        q: this_que.value,
                    })
                })
                .then(response => response.json())
                .then(data => {

                    setTimeout(() => {

                        if (data.success == true) {
                            window.location.replace(data.url);
                        }

                        /* call function to save user searches on localstorage */
                        saveSearchLocal(formData.get(`q`));

                        submitIcon.classList.remove("hidden");
                        submitLoader.classList.add("hidden");

                        // enable the submit button
                        submitBtn.removeAttribute("disabled");

                    }, 1000);

                })
                .catch(error => {

                    console.error(error);

                    setTimeout(() => {
                        submitIcon.classList.remove("hidden");
                        submitLoader.classList.add("hidden");

                        // enable the submit button
                        submitBtn.removeAttribute("disabled");
                    }, 1000);

                });

        });

    });
</script>
