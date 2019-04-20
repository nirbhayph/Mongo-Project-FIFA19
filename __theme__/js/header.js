/**
 * This is jQuery plugin declaration for header html-component
 * Deps: jQuery, jquery.sticky
 * Using examples: /js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function ($, window, document) {

    "use strict";

    $.fn.teamHeader = function (max_width) {

        var $header = $(this);

        if ($header.length === 0) {
            throw new Error('Header: header element not found');
        }

        if (max_width === undefined) {
            max_width = 1199;
        }

        var headerPosition = $header.css("position");
        var headerTop = $header.css("top");

        var checkState = function () {
            if ($(window).scrollTop() > 0) {
                $header.css({position: "fixed",
                    top: "0px"});
                $header.attr("data-id", "1");
            }
            if ($(window).scrollTop() === 0) {
                $header.css({position: headerPosition,
                    top: headerTop});
                $header.attr("data-id", "0");
            }
        };

        var unstick = function () {
            if ($(window).width() < max_width) {
                $header.css({position: headerPosition,
                    top: headerTop});
                return 1;
            } else {
                return 0;
            }
        };

        $(window).on("load", function () {
            checkState();
            unstick();
            $(window).on("resize", function () {
                $(window).on("scroll", function () {
                    checkState();
                    unstick();
                });


            }).trigger("resize");

        });

    };

})(jQuery, window, document);


