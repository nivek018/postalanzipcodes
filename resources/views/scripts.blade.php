<!--                -->
<!--                -->
<!--                -->
<!--                -->
<!--                -->
<!-- jQuery Core 3.5.1 -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- choices js -->
<!-- <script src="{{ asset('js/extention/choices.js') }}"></script> -->

<!-- font awesome kit -->
<script src="https://kit.fontawesome.com/d234582c9d.js" crossorigin="anonymous"></script>

<!-- global script will run here -->
<script>
/* global xhr */
var xhr = null;

/* this will hold an array of user's searches */
var user_searches   = [];

/* this will handle displaying of last searches of user */
if ( null !== localStorage.getItem(`searches`) ) {

    /* retrieve existing user's searches */
    user_searches = JSON.parse(localStorage.getItem(`searches`));
    
    /*  */
    let user_search_container = document.getElementById(`user-searches`);
    
    /*  */
    let searches_holder = '';

    /* revese on display for the user see's his last searched */
    user_searches.reverse();

    /*  */
    user_searches.forEach( function(item) {
        
        searches_holder += `<span class="badge badge-primary search-badge mr-1"><a class="text-white p-1" href="/search-result?q=` + item + `" title="` + item + `">` + item + `</a></span>`;
        
    })

    /*  */
    if ( null !== user_search_container) { user_search_container.innerHTML = searches_holder; }

}



/* this function will handle the saving or user's searches into localStorage */
function saveSearchLocal(u_search) {

    /* first record of this user search */
    let q_              = u_search.trim();

    /* only process search with length value */
    if (q_.length > 0) {

        if ( null !== localStorage.getItem(`searches`) ) {

            /* retrieve existing user's searches */
            user_searches = JSON.parse(localStorage.getItem(`searches`));
            
            /* array length is 5 or more remove first item of the array */
            if ( user_searches.length > 4 ) {
                user_searches.shift();
            }

            /* push user search into array */
            user_searches.push(q_);

            /* store user search */
            localStorage.setItem(`searches`, JSON.stringify(user_searches));

        }
        else {

            /* add user search into array */
            user_searches = [q_];
            
            /* store user search */
            localStorage.setItem(`searches`, JSON.stringify(user_searches));

        }

    }
}
</script>



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141529030-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-141529030-1');
</script>
