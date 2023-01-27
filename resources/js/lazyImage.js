window.imageLazy = () => {

    var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

    if ("IntersectionObserver" in window) {

        let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {

                if (entry.isIntersecting) {
                    let lazyImage = entry.target;
                    lazyImage.src = lazyImage.dataset.src;
                    lazyImage.srcset = lazyImage.dataset.srcset;
                    lazyImage.classList.remove("lazy");
                    lazyImageObserver.unobserve(lazyImage);
                }

            });
        });

        lazyImages.forEach(function(lazyImage) {
            lazyImageObserver.observe(lazyImage);
        });

    } else {
        // Possibly fall back to event handlers here
    }

}


   /* this function will handle the saving or user's searches into localStorage */
window.saveSearchLocal = (u_search) => {

    /* first record of this user search */
    let q_              = u_search.trim();

    /* retrieve existing user's searches */
    let user_searches = JSON.parse(localStorage.getItem(`searches`));

    /* only process search with length value */
    if (q_.length > 0) {

        if ( null !== localStorage.getItem(`searches`) ) {

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
