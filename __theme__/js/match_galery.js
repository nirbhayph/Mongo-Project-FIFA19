/**
 * This is jQuery plugin declaration for match_galery html-component
 * @html: ./html-component/match_galery.html 
 * @deps: jQuery, owl.carousel
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($){
    
    "use strict";
    
    $.fn.teamMatchGallery = function () {
        
        var $el = $(this);
        
        if ( $el.length === 0 ) {
            throw new Error('teamNewsLine: target element not found');
        }
        
        var owl = $el.find('.owl-carousel').owlCarousel({
            center: true,
            items: 4,
            loop: true,
            dots: false,
            margin: 0,
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
        
        $el.find(".custom-next-btn").on('click', function () {
            owl.trigger('next.owl.carousel');
        });
        
        $el.find(".custom-prev-btn").on('click', function () {
            owl.trigger('prev.owl.carousel');
        });
        
    };

})(jQuery);


