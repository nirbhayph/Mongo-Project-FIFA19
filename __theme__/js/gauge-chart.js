/**
 - This is jQuery plugin declaration for main investors graph
 - @html: ./html-component/club_main_stat.html
 - @deps: jQuery, Chartist.js
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */

(function ($, Chartist) {

    "use strict";

    $.fn.gaugechart = function (series, donut, donutWidth, donutSolid, startAngle, total, showLabel, legendNames, clickable) {

        var $el = $(this);

        if ($el.length === 0) {
            throw new Error('gaugechart: target element not found');
        }

        var id = $el.attr('id');



        Chartist.Pie('#' + id, {
            series: series
        }, {
            donut: donut === undefined ? true : donut,
            donutWidth: donutWidth,
            donutSolid: donutSolid === undefined ? true : donutSolid,
            startAngle: startAngle,
            total: total,
            showLabel: showLabel === undefined ? true : showLabel,
            plugins: [
                Chartist.plugins.legend({
                    legendNames: legendNames,
                    clickable: clickable === undefined ? true : clickable,
                    position: 'bottom'
                })
            ]



        });

    };

})(jQuery, Chartist);

