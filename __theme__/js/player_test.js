/**
 - This is jQuery plugin declaration for landing players grid
 - @html: ./html-component/esport_team_landing_players_slider.html
 - @html: ./html-component/esport_championship_players.html
 - @deps: jQuery
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */


(function ($, document) {
    "use strict";
    $.fn.players = function () {
        var players = {
            itemWidth: 0,
            hoverItemWidth: 0,
            wrapperWidth: 0,
            items: $(".active .players-wrapper a"),
            itemsCount: 0,
            flag: 0,

            wrapper: $(".players-wrapper"),

            setWrapperWidth: function () {
                this.wrapper.css({width: this.wrapperWidth + "px"});
                return this.wrapperWidth;
            },

            getItemsCount: function () {
                this.itemsCount = this.items.length;
                return this.itemsCount;
            },
            getItemWidth: function () {
                this.itemWidth = this.items.width();
            },

            getWrapperWidth: function () {
                this.wrapperWidth = this.itemsCount * this.itemWidth;

                return this.wrapperWidth;
            },

            clickFunction: function (param, event) {
                var element = $(param);
                if (element.attr("data-id") === "0") {
                    event.preventDefault();
                    element.attr("data-id", "1");
                } else {
                    element.unbind("click");
                    element.attr("data-id", "0");
                }
            },

            dropLinkstate: function () {
                this.wrapper.css({width: "10000px"});
                var self = this;
                var x = function () {
                    self.wrapper.css({width: self.wrapperWidth + "px"});
                };
                setTimeout(x, 500);
                this.items.each(function () {
                    $(this).attr("data-id", "0");
                });

            },
            setSmallWrapper: function () {
                var b = this.wrapperWidth;
                var width = b + 82;
                  this.wrapper.css({width: "10000px"});
                var self = this;
                var x = function () {
                    self.wrapper.css({width: width + "px"});
                };
                setTimeout(x, 500);
            },

            init: function () {

                this.getItemsCount();
                this.getItemWidth();
                this.getWrapperWidth();
                this.setWrapperWidth();

            }

        };




        $(window).on("load", function () {
            $(window).on("resize", function () {
                if ($(window).width() < 1200) {
                    players.init();
                    $(".players-wrapper").css({width: "1140px"});
                    $(".active .wrap").css("overflow", "auto");
                    $(".players-wrapper a").on("click", function (event) {
                        players.setSmallWrapper();
                        players.clickFunction(this, event);
                        $(document).mouseup(function (e) {
                            $(".players-wrapper").css({width: "11040px"});
                            var div = $(".active .wrap");
                            if (!div.is(e.target) && div.has(e.target).length === 0) {

                                players.dropLinkstate();

                            }
                        });
                    });

                } else {
                    $(".players-wrapper a").off("click");
                    $(".players-wrapper").css("width", "10000px");
                    $(".active .wrap").css("overflow", "hidden");
                }
            }).trigger("resize");

        });

    };

})(jQuery, document);