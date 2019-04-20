/**
 - This is jQuery plugin declaration for element visibility  check  
 - @deps: jQuery,
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */

(function ($, window, document) {
    "use strict";
    function isVisible(elem) {

        var coords = elem.getBoundingClientRect();

        var windowHeight = document.documentElement.clientHeight;

        // верхняя граница elem в пределах видимости ИЛИ нижняя граница видима
        var topVisible = coords.top > 0 && coords.top < windowHeight;
        var bottomVisible = coords.bottom < windowHeight && coords.bottom > 0;

        return topVisible || bottomVisible;
    }

    $.fn.showVisible = function () {
        var $el = $(this);
        $(window).on('scroll', function () {
            if ($el.attr('data-ready').length === 0) {
                if (isVisible($el[0])) {
                    $el.trigger('visible');
                    $el.attr('data-ready', 'true');

                }
            }


        });

    };

})(jQuery, window, document);
