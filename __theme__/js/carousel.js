/**
 - This is jQuery plugin declaration for main slider
 - @html: ./html-component/esport_championship_main_slider.html
 - @html: ./html-component/sport_championship_main_slider.html
 - @deps: jQuery
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */


(function ($, window) {
    "use strict";
    $.fn.slider = function (time) {


        var model = {
            state: 0,
            statelen: 0,
            itemsVertical: $(".item_vertical"),
            itemsHorizontal: $("#horizontal-wrapper .wrapper"),
            itemsHeight: 0,
            itemsWidth: 0,

            getState: function () {
                var state = this.state;
                return state;
            },

            addState: function () {
                var state = this.state;
                if (state === this.statelen) {
                    state = 0;
                } else {
                    state += 1;
                }

                this.state = state;
                return state;
            },

            stateMin: function () {
                var state = this.state;
                if (state === 0) {
                    state = this.statelen;
                } else {
                    state -= 1;
                }
                this.state = state;
                return state;
            },

            stateLength: function () {
                var statelen = this.itemsVertical.length;
                this.statelen = statelen - 1;
                return this.statelen;

            },

            setState: function () {
                var self = this;
                this.itemsVertical.on("click", function () {
                    var state = parseInt($(this).attr("data-id"), 10);
                    self.state = state;
                    horizontalSlide.slide();
                    verticalSlide.slide();
                });
            },

            setItemsWidth: function () {
                var width = $(".main-slide-post").width();
                this.itemsHorizontal.css({width: width});
                this.itemsWidth = width;
                return this.itemsWidth;

            },

            setItemsHeight: function () {
                var height = this.itemsVertical.height();
                this.itemsHeight = height;
                var heightMain = $(".main-slide-post").height();
                this.itemsHorizontal.css({height: heightMain});
                return this.itemsHeight;
            },

            setRightView: function () {
                var leftState = this.state * this.itemsWidth;
                var topState = this.state * this.itemsHeight;
                this.itemsHorizontal.css({left: -leftState + "px"});
                this.itemsVertical.css({top: -topState + "px"});
            },

            init: function () {
                this.setState();
                this.stateLength();
                this.setItemsWidth();
                this.setItemsHeight();
            }




        };



        var NavigationView = {
            next: $("a.arrow-right"),
            prev: $("a.arrow-left"),
            modelLink: model,
            init: function () {
                var self = this;

                this.next.on("click", function (event) {
                    event.preventDefault();
                    self.modelLink.addState();
                    horizontalSlide.slide();
                    verticalSlide.slide();

                });

                this.prev.on("click", function (event) {
                    event.preventDefault();
                    self.modelLink.stateMin();
                    horizontalSlide.slide();
                    verticalSlide.slide();
                });
            }
        };

        var verticalSlide = {
            modelLink: model,
            slide: function () {
                if (this.modelLink.state !== this.modelLink.statelen) {
                    var xx = this.modelLink.state * this.modelLink.itemsHeight;
                    this.modelLink.itemsVertical.animate({top: -xx + "px"}, time);
                } else if (this.modelLink.state === this.modelLink.statelen) {
                    var b = this.modelLink.state - 1;
                    var xt = b * this.modelLink.itemsHeight;
                    this.modelLink.itemsVertical.animate({top: -xt + "px"}, time);
                }

            }

        };

        var horizontalSlide = {
            modelLink: model,
            slide: function () {
                var xx = this.modelLink.state * this.modelLink.itemsWidth;
                this.modelLink.itemsHorizontal.animate({left: -xx + "px"}, time);
            }

        };



        $(window).on("resize", function () {
            model.setItemsHeight();
            model.setItemsWidth();
            model.setState();
            model.setRightView();

        });

        model.init();
        NavigationView.init();

        var timer = setInterval(function sliderInterval() {
            var span = $(".timeline >span");

            span.animate({width: "100%"}, 4800, function () {
                span.css({width: "0%"});
                NavigationView.next.trigger('click');
            });
        }, 6000);

    };
})(jQuery, window);

