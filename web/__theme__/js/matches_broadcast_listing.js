/**
 * This is jQuery plugin declaration for header html-component
 * @html: ./html-component/matches_broadcast_listing.html 
 * @deps: jQuery, bootstrap.js
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($){
    
    "use strict";
    
    $.fn.matchesBroadcastLisng = function () {
        
        var $listing = $(this);
        
        if ( $listing.length === 0 ) {
            throw new Error('matchesBroadcastLisng: target element not found');
        }
        
        $listing.find(".broadcast-item").on("show.bs.collapse hide.bs.collapse", function (e) {
            if (e.type == 'show') {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        });
        
    };

})(jQuery);


