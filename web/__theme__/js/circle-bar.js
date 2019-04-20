/**
 * This is jQuery plugin declaration 
 * @deps: jQuery, progressbar.js
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($, ProgressBar){
    
    "use strict";
    
    $.fn.teamCircleBar = function () {
        
        var $el = $(this);
        
        if ( $el.length === 0 ) {
            throw new Error('teamCircleBar: target element not found');
        }
        
        var id = $el.attr('id');
        
        var circle = new ProgressBar.Circle('#' + id, {
            color: '#141414',
            strokeWidth: 4,
            duration: 2000,
            easing: 'easeInOut',
            //from: {color: '#ffa000', width: 1},
            //to: {color: '#ffcc00', width: 6},
            step: function (state, circle, attachment) {
                circle.path.setAttribute('stroke', state.color);
                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('');
                } else {
                    circle.setText(value + "%");
                }
            }
        });
        
        var percent = $el.attr('data-percent');
        circle.animate(percent / 100);
        
    };

})(jQuery, ProgressBar);


