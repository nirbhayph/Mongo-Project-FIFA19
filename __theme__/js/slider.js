/**
 * This is jQuery plugin declaration slider
 * @html: ./html-component/player_single_wrap.html
 * @deps: jQuery, owl.carousel
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($, window){
    
    "use strict";
    
    $.fn.teamSlider = function () {
        
        if ( $(this).length === 0 ) {
            throw new Error('teamRadarGraph: target element not found');
        }
        
        var self = this;
        var $owl_item = $(this).find('.owl-carousel');

        var resiteItems = function(){
            var top = $(self).offset().top;
            var max_height = $(window).height() - top;
            $(self).find(".item").height(max_height);
        };
        $owl_item.on('resized.owl.carousel', resiteItems);
        $owl_item.on('initialized.owl.carousel', resiteItems);
        $owl_item.on('refresh.owl.carousel', resiteItems);
        
        $owl_item.owlCarousel({
            center: true,
            items:1,
            loop:true,
            margin:0,
            stagePadding: 0,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1500,
            fluidSpeed: 1
        });
        
        $(window).on('load', function(){
            $owl_item.trigger('refresh.owl.carousel');
        });
        
        $(window).on('resize', function(){
            $owl_item.trigger('resize.owl.carousel');
        });

        // Animations and navigation
        $(this).find(".right-arrow").first().on('click', function(){
            $owl_item.trigger('next.owl.carousel');
        });

        $(this).find(".left-arrow").first().on('click', function(){
            $owl_item.trigger('prev.owl.carousel');
        });

        var animateBar = function(){
            $(self).find('.progress-line .bar').stop();
            $(self).find('.progress-line .bar').css({'width': '0px'});
            $(self).find('.progress-line .bar').animate({'width': '100%'}, {
                duration: 5000,
                queue: false
            });
        };

        $owl_item.on('changed.owl.carousel', function(event) {
            animateBar();
        });
        animateBar();         
        
    };

})(jQuery, window);


