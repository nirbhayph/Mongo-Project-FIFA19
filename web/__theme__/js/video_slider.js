/**
 - This is jQuery plugin declaration for latest video slider
 - @html: ./html-component/esport_championship_latest_videos.html
 - @html: ./html-component/esport_team_landing_latest_videos.html
 - @html: ./html-components/sport_championship_latest_videos.html
 - @deps: jQuery
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */


(function ($, window) {
    "use strict";
    $.fn.videoslider = function () {
        var slider = {
            state: 0,
            flag: 0,
            video: $(".ifram-wrapper > iframe"),
            elementsCount: 2,
            elements: $(".news-wrapper"),
            elementsHeight: 0,
            totalElements: 0,
            elementsWidth: 300,
            screenWidth: 0,

            getElementsHeight: function () {
                this.elementsHeight = this.video.height() / this.elementsCount;
                return this.elementsHeight;
            },

            setScreenWidth: function () {
                var width = $(window).width();
                this.screenWidth = width;
                return this.screenWidth;
            },

            setTotalElements: function () {
                this.totalElements = this.elements.length;
                return this.totalElements;
            },

            addState: function () {
                if (this.flag === 0) {
                    if (this.state !== this.totalElements - 1) {
                        this.state += 1;
                    } else {
                        this.flag = 1;
                    }
                } else if (this.flag === 1) {
                    if (this.state !== 0) {
                        this.state -= 1;
                    } else {
                        this.flag = 0;
                    }
                }
            },

            init: function () {
                this.setScreenWidth();
                this.getElementsHeight();
                this.setTotalElements();

            }
        };

        var view = {
            model: slider,
            itemWrapper: $(".video-wrapper .wrapper"),
            itemWidthWrapper: $(".wrapper .width"),

            styleVertical: function () {
                if (this.model.screenWidth >= 992) {
                    this.itemWrapper.css({
                        height: this.model.elementsHeight * this.model.elementsCount + "px",
                        "overflow": "hidden"

                    });

                    this.itemWidthWrapper.css({
                        "overflow": "auto",
                        width: ""
                    });
                    this.model.elements.css({height: this.model.elementsHeight});

                }
            },

            styleHorizontal: function () {
                if (this.model.screenWidth < 992) {
                    this.itemWrapper.css({
                        height: "",
                        "overflow": ""
                    });
                    this.itemWidthWrapper.css({
                        "width": this.model.elementsWidth * this.model.totalElements + "px"
                    });
                }
            },

            animation: function () {
                var state = this.model.state;
                this.itemWidthWrapper.animate({scrollTop: state * this.model.elementsHeight + "px"}, 1600);
            },

            setVideo: function () {
                this.model.elements.on('click', function () {

                    var video = $(this).find("iframe").clone();
                    $(".ifram-wrapper iframe").remove();
                    $(".ifram-wrapper").append(video);
                });
            },

            init: function () {
                this.styleHorizontal();
                this.styleVertical();
                this.animation();
                this.setVideo();
            }
        };

        $(window).on("resize", function () {
            slider.init();
            view.init();
        });

        $(window).on("load", function () {
            slider.init();
            view.init();
        });


        slider.init();
        view.init();

        var interval = setInterval(function () {
            slider.addState();
            view.animation();
        }, 3000);

        slider.elements.on("touchstart", function () {
            clearInterval(interval);
        });
        slider.elements.on("mouseenter", function () {
            clearInterval(interval);
        });

    };


})(jQuery, window);

