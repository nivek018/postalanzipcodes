<!--                -->
<!--                -->
<!--                -->
<!--                -->
<!--                -->
<!-- global script will run here -->
<script defer>
    // code to be executed when the window has finished loading
    window.addEventListener('load', function() {

        // initiate lazy load
        imageLazy();

        /* global xhr */
        var xhr = null;

        /* this will hold an array of user's searches */
        var user_searches = [];

        /*  */
        let user_search_container = document.getElementById(`user-searches`);

        /* this will handle displaying of last searches of user */
        if (null !== localStorage.getItem(`searches`)) {

            /* retrieve existing user's searches */
            user_searches = JSON.parse(localStorage.getItem(`searches`));

            /*  */
            let searches_holder = '';

            /* revese on display for the user see's his last searched */
            user_searches.reverse();

            /*  */
            // loop user_searches with index and value using forEach
            user_searches.forEach((item, index) => {
                if (index < 5) {
                    const link = document.createElement('a');
                    link.href = `/search-result?q=${item}`;
                    link.title = item;

                    const div1 = document.createElement('div');
                    div1.className =
                        'select-none max-w-[120px] cursor-pointer flex items-center rounded-full border border-dashed border-amber-500 px-2 py-1 text-sm font-medium text-amber-400 hover:shadow-lg';

                    const svg = `<svg class="w-5 h-5 mr-1 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                 <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                             </svg>`;

                    div1.innerHTML = svg;

                    const span = document.createElement('span');
                    span.classList.add('truncate');
                    span.textContent = item;

                    div1.appendChild(span);
                    link.appendChild(div1);

                    searches_holder += link.outerHTML;
                }
            });

            /*  */
            user_search_container.innerHTML = searches_holder;


        } else {
            user_search_container.innerHTML = '';
        }
    });
</script>

{{-- Adsense --}}
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3980043434451295"
     crossorigin="anonymous"></script>

{{-- Google tag (gtag.js) --}}
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6ZNGZV1Q47"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-6ZNGZV1Q47');
</script>


<script>
        function setCookiez(name, value, days) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
            document.cookie = name + '=' + value + ';expires=' + expires.toUTCString();
        }

        function getCookie(name) {
            var cookieName = name + '=';
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].trim();
                if (cookie.indexOf(cookieName) === 0) {
                    return cookie.substring(cookieName.length, cookie.length);
                }
            }
            return null;
        }

        function showPopunderAd(url) {
            var userCookie = getCookie('popunderShown');
            if (!userCookie) {
                var popunder = window.open(url, '_blank');
                if (popunder) {
                    popunder.blur();
                    window.focus();
                    setCookiez('popunderShown', 'true', 1); // Set cookie for 1 day
                }
            }
        }

        document.body.addEventListener('click', function() {
            showPopunderAd('https://bit.ly/3RQkL2q');
        });
    </script>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    #popup-modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        max-width: 60%;
        width: auto;
        text-align: center;
        padding: 20px;
        animation: fadeInUp 0.5s ease-out;
    }

    #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    .fb-page {
        margin: 20px 0;
        width: 100%; 
    }

    #popup-modal button {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
        margin-top: 20px;
    }

    #popup-modal button:hover {
        background-color: #45a049;
    }

    @keyframes fadeInUp {
        from {
            transform: translate(-50%, -60%);
            opacity: 0;
        }
        to {
            transform: translate(-50%, -50%);
            opacity: 1;
        }
    }

    @media (max-width: 600px) {
        #popup-modal {
            max-width: 90%; 
            padding: 15px; 
        }

        .fb-page {
            width: 100%; 
        }
    }
</style>

<!-- Modal Trigger -->
<script>
    function showModal() {
        document.getElementById('popup-modal').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
        document.cookie = 'modalShown=true; max-age=86400'; // once a day per user
    }

    function checkModal() {
        var modalShown = document.cookie.includes('modalShown=true');
        if (!modalShown) {
            setTimeout(showModal, 3000); 
        }
    }

    window.onload = checkModal;
</script>

<!-- Modal HTML -->
<div id="popup-modal">
    <p>Hey there! 👋 We'd love for you to follow us on Facebook!</p>
    <div class="fb-page" data-href="https://www.facebook.com/postalandzipcodes/" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
    <blockquote cite="https://www.facebook.com/postalandzipcodes/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/postalandzipcodes/">Postalandzipcodes</a></blockquote>
    </div>
    <button onclick="document.getElementById('popup-modal').style.display='none'; document.getElementById('overlay').style.display='none'">Close</button>
</div>

<!-- Overlay -->
<div id="overlay"></div>

<!-- Facebook SDK -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0"></script>
