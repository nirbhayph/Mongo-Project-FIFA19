/**
 * This is jQuery plugin declaration for matches-slider html-component
 * Deps: jQuery, jquery.team-coundown
 * Using examples: /js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($, window, document){
    
    "use strict";
    
    $.fn.MatchesSlider = function () {
        
        var $slider = $(this);
        
        if ( $slider.length === 0 ) {
            throw new Error('MatchesSlider: Slider element not found');
        }
        
        /**
         * Resize slider for full height
         */
        var match_slider_resize = function () {
            var top = $slider.offset().top;
            var max_height = $(window).height() - top;
            if (max_height < 600) {
                max_height = 600;
            }
            
            $slider.height(max_height);
            var item_height = max_height - 60;
            $slider.find(".item").height(item_height);
            
            console.log('slider resize');
        };
        
        /**
         * Resize on window resize event
         */
        $(window).on('resize', match_slider_resize);
        $(window).on('load', match_slider_resize);
        match_slider_resize();
        
        /**
         * Init counters
         */
        $slider.find('.counter, .nav-item .score').each(function(index, el){
            
            var $el = $(el);
            if (typeof $el.teamCountdown === "undefined") { 
                throw new Error('MatchesSlider: jquery.team_countdown.js not found. This is a main dependency.');
            }
            $el.teamCountdown().render();
            
        });
        
    };

})(jQuery, window, document);


