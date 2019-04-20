/**
 * This is jQuery plugin declaration for timeseries graph
 * @deps: jQuery, chartist
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function ($, Chartist) {

    "use strict";

    $.fn.teamGraphTimeseries = function (lines, series, ticks, height, lineSmooth) {

        var $el = $(this);

        if ($el.length === 0) {
            throw new Error('teamNewsLine: target element not found');
        }

        var id = $el.attr('id');

        var axisY = {
            type: Chartist.FixedScaleAxis,
            ticks: ticks === undefined ? null : ticks,
            onlyInteger: true
        };

        if (ticks) {
            axisY.ticks = ticks;
        }

        Chartist.Line('#' + id, {
            labels: lines,
            series: series
        }, {
            axisY: axisY,
            height: height === undefined ? '250px' : height,
            lineSmooth: lineSmooth === undefined ? true : lineSmooth

        }
        );

    };

})(jQuery, Chartist);


