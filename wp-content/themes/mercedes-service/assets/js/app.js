import { toggleNavbar } from "./modules/toggler-navbar.js";
import { initSlider } from "./modules/reviews-slider.js";
import { initPhoneMask } from "./modules/phone-mask.js";
import { handleScrollButton } from "./modules/scroll-button.js";

document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
    initPhoneMask();
    toggleNavbar();
    initSlider();
    handleScrollButton();
})