/**
 * This is jQuery plugin declaration for product_slider html-component
 * @html: ./html-component/product_slider.html 
 * @deps: jQuery, owl.carousel
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($){
    
    "use strict";
    
    $.fn.teamProductSlider = function () {
        
        var $el = $(this);
        
        if ( $el.length === 0 ) {
            throw new Error('teamProductSlider: target element not found');
        }
        
        var owl = $el.find('.owl-carousel').owlCarousel({
            center: false,
            items: 4,
            loop: true,
            dots: false,
            margin: 30,
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


