/**
 * This is jQuery plugin declaration for main_club_gallery html-component
 * @html: ./html-component/main_club_gallery.html
 * @deps: jQuery, owl.carousel, isotope, imagesloaded
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($){
    
    "use strict";
    
    $.fn.mainClubGallery = function () {
        
        var $el = $(this);
        if ( $el.length === 0 ) {
            throw new Error('mainClubGallery: target element not found');
        }
        
        var owl = $el.find('.owl-carousel');
        
        var init_owl = function (owl) {
            
            var owl_init = $(owl).owlCarousel({
                center: true,
                items:1,
                loop:true,
                dots:false,
                margin:0,
                autoHeight: true,
                responsive:{
                    0:{
                        items:1
                    },
                    767:{
                        items:1
                    },
                    992:{
                        items:1
                    },
                    1400:{
                        items:1
                    }
                }
            });

            $el.find(".custom-next-btn").first().on('click', function(){
                owl_init.trigger('next.owl.carousel');
            });

            $el.find(".custom-prev-btn").first().on('click', function(){
                owl_init.trigger('prev.owl.carousel');
            });
            
        };
        
        var init_isotop = function (grid, owl) {
            
            $(grid).isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
                    
            $(owl).trigger('refresh.owl.carousel');
        };
        

        $(owl).imagesLoaded().done( function() {

            init_owl(owl);

            $(owl).find('.isotope-grid').each(function(){
                init_isotop(this, owl);
            });

        });
            
        
    };

})(jQuery);


