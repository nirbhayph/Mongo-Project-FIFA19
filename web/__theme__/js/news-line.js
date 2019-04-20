/**
 * This is jQuery plugin declaration for news_line html-component
 * @html: ./html-component/news-line.html 
 * @deps: jQuery, owl.carousel
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($){
    
    "use strict";
    
    $.fn.teamNewsLine = function () {
        
        var $el = $(this);
        
        if ( $el.length === 0 ) {
            throw new Error('teamNewsLine: target element not found');
        }
        
        $el.find('.owl-carousel').owlCarousel({
            center: true,
            items: 2,
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
        
    };

})(jQuery);


