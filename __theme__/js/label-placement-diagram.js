/**
- This is jQuery plugin declaration for  attendance graph
- @html: ./html-component/club_main_stat.html
- @deps: jQuery, Chartist.js
- @using: ./js/main.js
- @author torbara (https://themeforest.net/user/torbara)
- */

(function ($, Chartist) {

    "use strict";

    $.fn.label_placement = function (lines, series, distributeSeries) {

        var $el = $(this);

        if ($el.length === 0) {
            throw new Error('teamNewsLine: target element not found');
        }

        var id = $el.attr('id');



        Chartist.Bar('#' + id, {
            labels: lines,
            series: series
        }, {

            distributeSeries: distributeSeries === undefined ? true : distributeSeries


        });

    };

})(jQuery, Chartist);
