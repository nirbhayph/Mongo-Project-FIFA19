/**
 - This is jQuery plugin declaration for raitings graph
 - @html: ./html-component/club_main_stat.html
 - @deps: jQuery, Chartist.js
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */

(function ($, Chartist) {

    "use strict";

    $.fn.svgpath = function (labels, series, low, showArea, showPoint, fullWidth) {

        var $el = $(this);

        if ($el.length === 0) {
            throw new Error('svgpath: target element not found');
        }

        var id = $el.attr('id');


        $(this).on('visible', function () {
            var chart = Chartist.Line('#' + id, {
                labels: labels,
                series: series
            }, {
                low: low,
                showArea: showArea === undefined ? true : showArea,
                showPoint: showPoint === undefined ? true : showPoint,
                fullWidth: fullWidth === undefined ? true : fullWidth

            });

            chart.on('draw', function (data) {
                if (data.type === 'line' || data.type === 'area') {
                    data.element.animate({
                        d: {
                            begin: 2000 * data.index,
                            dur: 2000,
                            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                            to: data.path.clone().stringify(),
                            easing: Chartist.Svg.Easing.easeOutQuint
                        }
                    });
                }
            });

            chart.on('created', function () {
                if (window.__exampleAnimateTimeout1) {
                    clearTimeout(window.__exampleAnimateTimeout1);
                    window.__exampleAnimateTimeout1 = null;
                }
                //  window.__exampleAnimateTimeout1 = setTimeout(chart.update.bind(chart), 12000);
            });
        });

        $(this).showVisible();



    };

})(jQuery, Chartist);

