/**
- This is jQuery plugin declaration for financial indicators graph
- @html: ./html-component/club_main_stat.html
- @deps: jQuery, Chartist.js
- @using: ./js/main.js
- @author torbara (https://themeforest.net/user/torbara)
- */

(function ($, Chartist) {

    "use strict";

    $.fn.pickcircle = function (labels, series, high, low) {

        var $el = $(this);

        if ($el.length === 0) {
            throw new Error('teamNewsLine: target element not found');
        }

        var id = $el.attr('id');



        var chart = Chartist.Bar('#' + id, {
            labels: labels,
            series: series
        }, {
            high: high,
            low: low,
            axisX: {
                labelInterpolationFnc: function (value, index) {
                    return index % 2 === 0 ? value : null;
                }

            }


        });

        // Listen for draw events on the bar chart
        chart.on('draw', function (data) {
            // If this draw event is of type bar we can use the data to create additional content
            if (data.type === 'bar') {
                // We use the group element of the current series to append a simple circle with the bar peek coordinates and a circle radius that is depending on the value
                data.group.append(new Chartist.Svg('circle', {
                    cx: data.x2,
                    cy: data.y2,
                    r: Math.abs(Chartist.getMultiValue(data.value)) * 2 + 5
                }, 'ct-slice-pie'));
            }
        });


    };

})(jQuery, Chartist);

