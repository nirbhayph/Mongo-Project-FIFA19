/**
 * This is jQuery plugin declaration for radar graph
 * @html: ./html-component/player_single_wrap.html
 * @deps: jQuery, Chart.js
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($, Chart){
    
    "use strict";
    
    $.fn.teamRadarGraph = function (label, labels, values, height, width) {
        
        if (Chart === undefined) {
            throw new Error('teamRadarGraph: Chart.js not found!');
        }
        
        var $el = $(this);
        
        if ( $el.length === 0 ) {
            throw new Error('teamRadarGraph: target element not found');
        }
        
        var ctx = $el.get(0).getContext("2d");
        ctx.canvas.width = width === undefined ? 200 : width;
        ctx.canvas.height = height === undefined ? 200 : height;
        
        var ChartRadar = {
            
            render: function () {
                
                var color = $el.parents().first().css('color');
                
                this.myChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: labels,

                        datasets: [{
                                label: label,
                                backgroundColor: color,
                                borderColor: color,
                                pointBorderColor: color,
                                //pointBackgroundColor: bg_color,
                                pointBorderWidth: 1,
                                pointHoverRadius: 1,
                                pointHoverBorderWidth: 1,
                                pointRadius: 1,

                                data: values
                            }]
                    }, options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        }
                    }
                });
                
                return this.myChart;
            },
            
            events: function () {
                var self = this;
                $el.on('radarchart.rebuild', function(){
                    self.myChart.destroy();
                    self.render();
                });
            }
            
        };
        
        ChartRadar.render();
        ChartRadar.events();
        return ChartRadar;
    };

})(jQuery, Chart);


