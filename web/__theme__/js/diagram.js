/**
 - This is jQuery plugin declaration for player stats graph
 - @html: ./html-component/player_stats.html
 - @deps: jQuery, Chartist.js
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */

(function ($, Chartist) {

    "use strict";
    $.fn.diagram = function (lines, series, fullWidth, padding) {

        var $el = $(this);
        if ($el.length === 0) {
            throw new Error('diagram: target element not found');
        }

        var id = $el.attr('id');
        Chartist.Line('#' + id, {
            labels: lines,
            series: series
        }, {
            fullWidth: fullWidth === undefined ? true : fullWidth,
            chartPadding: {
                right: padding
            }

        }

        );
    };
}
)(jQuery, Chartist);
