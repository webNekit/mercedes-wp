export const initSlider = () => {
    const swiper = new Swiper('.swiper.reviews-section__slider', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            520: {
                slidesPerView: 2,
                spaceBetween: 25
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 25
            }
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });

}