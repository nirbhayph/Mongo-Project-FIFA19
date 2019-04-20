/**
 * This is jQuery plugin declaration for shop price filter
 * @deps: jQuery, jQueryUI
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($){
    
    "use strict";
    
    $.fn.teamShopPriceFilter = function () {
        
        var $el = $(this);
        
        if ( $el.length === 0 ) {
            throw new Error('teamShopPriceFilter: target element not found');
        }
        
        var $slider = $el.find('.ui-slider').first();
        if ($slider.length === 0) {
            throw new Error('teamShopPriceFilter: children ui-slider element not found');
        }
        
        $slider.slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
            }
        });
        
        var amount_value = $slider.slider("values", 0) + "-" + $slider.slider("values", 1);
        $el.find("input").val(amount_value);
    };

})(jQuery);


