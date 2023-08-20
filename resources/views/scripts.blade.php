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

var popunder=new Array()


popunder[0]="https://bit.ly/47CdSrf"


var width = '700';
var height = '700';

var p = 'scrollbars=no,resizable=yes,toolbar=no,' + //these are obvious variables. set "yes" or "no".
'menubar=yes,status=yes,location=no,left=85,top=20,height=' + //the location on the user's screen
height + ',width=' + width;

var one_time=1

function get_cookie(Name) {
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { // if the cookie exists
offset += search.length
end = document.cookie.indexOf(";", offset); // set the index of beginning value
if (end == -1) // set the index of the end of cookie value
end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}
function loadornot(){
if (get_cookie('popunder')==''){
load_pop_power()
document.cookie="popunder=yes"
}
}
function load_pop_power(){
win2=window.open(popunder[Math.floor(Math.random()*(popunder.length))],"bw",p)
win2.blur()
window.focus()
}
if (one_time==0)
load_pop_power()
else
loadornot()
</script>
