/**
 * This is jQuery plugin declaration for countdowns elements
 * Deps: jQuery
 * Using examples: /js/matches-slider.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function ($) {

    "use strict";

    $.fn.teamCountdown = function () {

        var View = function (el) {
            this.initialize.apply(this, el);
        };

        View.prototype = {

            initialize: function (el) {
                this.$el = $(el);
                var end = parseInt(this.$el.attr("data-date"));
                if (end < 0 || end < new Date()) {
                    this.hideCounters();
                    return;
                }

                this.end = end;
            },

            render: function () {
                var _second = 1000;
                var _minute = _second * 60;
                var _hour = _minute * 60;
                var _day = _hour * 24;
                var timer;

                var self = this;

                function showRemaining() {
                    var now = new Date();
                    var distance = self.end - now;
                    if (distance < 0) {

                        clearInterval(timer);
                        self.hideCounters();

                        return;
                    }
                    var days = Math.floor(distance / _day);
                    var hours = Math.floor((distance % _day) / _hour);
                    var minutes = Math.floor((distance % _hour) / _minute);
                    var seconds = Math.floor((distance % _minute) / _second);

                    self.$el.find('.days').html(days ? days : 0);
                    self.$el.find('.hours').html(hours ? hours : 0);
                    self.$el.find('.minutes').html(minutes ? minutes : 0);
                    self.$el.find('.seconds').html(seconds ? seconds : 0);
                }

                timer = setInterval(showRemaining, 1000);
            }

        };

        return new View(this);
    };

}(jQuery));