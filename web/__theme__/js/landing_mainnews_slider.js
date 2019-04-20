/**
 - This is jQuery plugin declaration for news slider
 - @html: ./html-component/sport_championship_news.html
 - @deps: jQuery
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */



(function ($) {
    "use strict";
    $.fn.newsSlider = function () {
        var $element = $(this);
        var carousel = $element.find(".owl-carousel");
        carousel.owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    };

})(jQuery);