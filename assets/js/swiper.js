
var sliderinit = function() {

    // basic options for all sliders
    let defaults = {
        spaceBetween: 0,
        slidesPerView: 1
    };
    // call init function
    initSwipers(defaults);
    function initSwipers(defaults = {}, selector = ".swiper-container") {
    let swipers = document.querySelectorAll(selector);
    swipers.forEach((swiper) => {
        // get options
        let optionsData = swiper.dataset.swiper
        ? JSON.parse(swiper.dataset.swiper)
        : {};
        // combine defaults and custom options
        let options = {
        ...defaults,
        ...optionsData
        };
        // init
        new Swiper(swiper, options);
    });
    }
}
sliderinit();


var swiper = new Swiper(".slider-page-title", {
    spaceBetween: 0,
    slidesPerView: 1,
    pagination: {
        el: ".page-title-pagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    },
});