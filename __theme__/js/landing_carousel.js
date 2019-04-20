/**
 - This is jQuery plugin declaration for landing gallery 
 - @html: ./html-component/landing_sport_galery.html
 - @deps: jQuery
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */

(function ($) {
    "use strict";
    $.fn.landingCarousel = function () {
        var $el = $(this);

        if ($el.length === 0) {
            throw new Error("landingCarousel : target element not found");
        }

        $el.find('.owl-carousel').owlCarousel({
            center: false,
            items: 4,
            loop: true,
            dots: true,
            merge:true,
            margin: 1,
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1400: {
                    items: 4
                }
            }
            
        });
    };

})(jQuery);
