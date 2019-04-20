/**
- This is jQuery plugin declaration for salary cap graph
- @html: ./html-component/club_main_stat.html
- @deps: jQuery, Chartist.js
- @using: ./js/main.js
- @author torbara (https://themeforest.net/user/torbara)
- */

(function ($, Chartist) {

    "use strict";

    $.fn.stackedbar = function (labels, series, stackBars) {

        var $el = $(this);

        if ($el.length === 0) {
            throw new Error('teamNewsLine: target element not found');
        }

        var id = $el.attr('id');



        Chartist.Bar('#' + id, {
            labels: labels,
            series: series
        }, {
            stackBars: stackBars === undefined ? true : stackBars,
            axisY: {
                labelInterpolationFnc: function (value) {
                    return (value / 1000) + 'k';
                }

            }


        }).on('draw', function (data) {
            if (data.type === 'bar') {
                data.element.attr({
                    style: 'stroke-width: 30px'
                });
            }
        });

    };

})(jQuery, Chartist);

