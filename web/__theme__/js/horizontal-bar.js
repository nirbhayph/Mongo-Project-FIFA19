/**
 - This is jQuery plugin declaration for Pace graph
 - @html: ./html-component/player_stats.html
 - @deps: jQuery, Chartist.js
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */


(function ($, Chartist) {

    "use strict";

    $.fn.horizontalbar = function (labels, series, seriesBarDistance, reverseData, horizontalBars,legendNames,clickable,position, offset) {

        var $el = $(this);

        if ($el.length === 0) {
            throw new Error('horizontalbar: target element not found');
        }

        var id = $el.attr('id');



        Chartist.Bar('#' + id, {
        labels: labels,
                series: series
        }, {
        seriesBarDistance: seriesBarDistance,
                reverseData: reverseData === undefined ? true : reverseData,
                horizontalBars: horizontalBars === undefined ? true : horizontalBars,
                plugins:[
                    Chartist.plugins.legend({
                        legendNames:legendNames,
                        clickable:clickable===undefined ? true: clickable,
                        position:position
                    })
                ],
                axisY: {
                offset: offset
                },
                axisX: {
                 labelInterpolationFnc: function (value, index) {
                    return index % 2 === 0 ? value : null;
                },
                
            }


                });

    };

})(jQuery, Chartist);

