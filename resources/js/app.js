import "./bootstrap";
import "./lazyImage";

// alpinejs
import Alpine from "alpinejs";
import mask from "@alpinejs/mask";
window.Alpine = Alpine;
window.alpine = Alpine;
Alpine.plugin(mask);
Alpine.start();

// import Swiper bundle with all modules installed
import Swiper from "swiper/bundle"
import "swiper/css/bundle" // import styles bundle
window.Swiper = Swiper

// flowbite
import "flowbite";
import { Modal } from "flowbite";
window.Modal = Modal;
import { initModals } from "flowbite";
window.initModals = initModals;
import { initTooltips } from "flowbite";
window.initTooltips = initTooltips;
import { initDropdowns } from "flowbite";
window.initDropdowns = initDropdowns;
