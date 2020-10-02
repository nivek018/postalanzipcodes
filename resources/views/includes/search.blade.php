<!--                -->
<!-- Search Module  -->
<!--                -->
<div class="s120">
    <form name="search-form" autocomplete="off">

        @csrf

        <div class="pl-3 mb-2">
            <div class="d-inline" id="user-searches">&nbsp;</div>
        </div>

        <div class="inner-form">
            <div class="input-field first-wrap">
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                    </svg>
                </div>
                <input id="search" name="q" type="text" placeholder="Search zip code" value="{{ $search_q ?? '' }}" autocomplete="off" />
            </div>
            <div class="input-field second-wrap">
                <button class="btn-search" type="submit">SEARCH</button>
            </div>
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