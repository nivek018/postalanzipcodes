<!--                -->
<!-- Search Module  -->
<!--                -->
<div class="px-4 py-4 sm:px-6">

    <form name="search-form" autocomplete="off">

        @csrf

        <div class="mx-auto w-full md:w-4/5 h-full flex-auto">
            <div class="relative mt-1 flex items-center">
                <input class="transition-all ease-in-out duration-300 block w-full rounded-full text-white bg-gray-700 border-gray-600 text-xl py-5 px-8 pr-16 shadow-sm outline-none ring-2 focus:ring-offset-blue-700 focus:ring-offset-2 focus:border-blue-500 focus:ring-blue-500 focus:bg-gray-100 focus:text-gray-900"
                        maxlength="255"
                        type="text"
                        name="q"
                        id="search"
                        value="{{ $search_q ?? '' }}"
                        placeholder="Barangay, City, Zip Code...">

                <div class="absolute right-0 flex py-1.5 pr-8">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <div class="mt-3 space-y-2 space-x-2 text-center" id="user-searches">&nbsp;</div>
        </div>

    </form>
</div>
<!-- jQuery Core 3.5.1 -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
$(function() {

    $(`form[name="search-form"]`).on(`submit`, function(e) {

        e.preventDefault();

        let this_que = $(this).find(`input[name="q"]`).val().trim();
        let this_btn = $(this).find(`button[type="submit"]`);

        if (this_que.length < 1) {
            return false;
        }

        var formData = new FormData(this);

        xhr = $.ajax({
            url:            `{{ route('search_q') }}`,
            type:           `POST`,
            dataType:       `JSON`,
            data:           formData,
            processData:    false,
            contentType:    false,

            beforeSend: function() {

                /* create loading state of the submit button */
                $(this_btn).html(`<div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                                </div>`).addClass('cursor-progress');

                /* abot on-going ajax request */
                if (xhr != null) {
                    xhr.abort();
                }

                /* call function to save user searches on localstorage */
                saveSearchLocal( formData.get(`q`) );

            },

            success: function(data) {

                window.location.replace(data.url);

            },

            error: function() {

                $(this_btn).text(`SEARCH`);

                if (xhr != null) {
                    xhr.abort();
                }

            }

        });


    });

});
</script>
