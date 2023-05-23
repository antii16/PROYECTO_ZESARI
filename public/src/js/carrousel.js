var swiper = new Swiper('.swiper', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    slidesPerView: 1,
    spaceBetween: 10,
    // init: false,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    /*Puntos donde quiebre*/
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 40,
        },

        620: {
            slidesPerView: 2,
            spaceBetween: 40,
        },

        800: {
            slidesPerView: 1.75,
            spaceBetween: 40,
        },

        920: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        1000: {
            slidesPerView: 2.5,
            spaceBetween: 40,
        },
        1240: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
    }
});