/**
 - This is jQuery plugin declaration for threshold graph
 - @html: ./html-component/player_stats.html
 - @deps: jQuery, Chartist.js, chartist-plugin-legend, chartist-plugin-threshold 
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */


(function ($, Chartist) {

    "use strict";
    $.fn.threshold = function (lines, series, showArea,threshold) {

        var $el = $(this);
        if ($el.length === 0) {
            throw new Error('threshold: target element not found');
        }

        var id = $el.attr('id');
        Chartist.Line('#' + id, {
            labels: lines,
            series: series
        }, {
            showArea: showArea === undefined ? true : showArea,
            axisY: {
                onlyInteger: true
            },            
            plugins: [
                Chartist.plugins.ctPointLabels({
                    textAnchor: 'middle'
                }),
                Chartist.plugins.ctThreshold({
                    threshold: threshold
                })
            ]
        }
        );
    };
}
)(jQuery, Chartist);