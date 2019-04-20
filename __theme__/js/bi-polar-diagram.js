/**
 - This is jQuery plugin declaration for net rating graph
 - @html: ./html-component/player_stats.html
 - @deps: jQuery, Chartist.js
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */



(function ($, Chartist) {

    "use strict";

    $.fn.bipolardiagram = function (lines, series, high, low, showArea, showLine, showPoint, fullWidth, showLabel, showGrid) {

        var $el = $(this);

        if ($el.length === 0) {
            throw new Error('bipolardiagram: target element not found');
        }

        var id = $el.attr('id');



        Chartist.Line('#' + id, {
            labels: lines,
            series: series
        }, {
            high:high,
            low:low,
            showArea: showArea === undefined ? true : showArea,
            showLine: showLine === undefined ? true : showLine,
            showPoint: showPoint === undefined ? true : showPoint,
            fullWidth: fullWidth === undefined ? true : fullWidth,
            axisX: {
                showLabel: showLabel === undefined ? true : showLabel,
                showGrid: showGrid === undefined ? true : showGrid,
            }


        });

    };

})(jQuery, Chartist);