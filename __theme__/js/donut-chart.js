/**
- This is jQuery plugin declaration for assists per game graph
- @html: ./html-component/player_stats.html
- @deps: jQuery, Chartist.js
- @using: ./js/main.js
- @author torbara (https://themeforest.net/user/torbara)
- */

(function ($, Chartist) {

    "use strict";

    $.fn.donutchart = function (labels,series, donut,donutWidth, donutSolid, startAngle,showLabel) {

        var $el = $(this);

        if ($el.length === 0) {
            throw new Error('donutchart: target element not found');
        }

        var id = $el.attr('id');



        Chartist.Pie('#' + id, {
            labels:labels,
            series: series
        }, {
            donut:donut === undefined ? true:donut,
            donutWidth:donutWidth,
            donutSolid:donutSolid === undefined ? true : donutSolid,
            startAngle:startAngle,
            showLabel: showLabel === undefined ? true : showLabel,
            plugins:[
                Chartist.plugins.legend()   
            ]


        });

    };

})(jQuery, Chartist);
