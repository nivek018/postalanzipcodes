require('./bootstrap');

// alpinejs
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle' // import styles bundle
window.Swiper = Swiper

// flowbite
import 'flowbite';
