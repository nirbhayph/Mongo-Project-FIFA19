/**
 - This is jQuery plugin declaration for champions timeline tabs
 - @html: ./html-component/sport_championship_timline_tabs.html
 - @html: ./html-component/sport_championship_win_team.html
 - @html: ./html-component/sport_championship_places.html
 - @html: ./html-component/esport_championship_timline_tabs.html
 - @html: ./html-component/esport_championship_win_team.html
 - @html: ./html-component/esport_championship_places.html
 - @deps: jQuery
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */


(function ($) {
    "use strict";
    $.fn.champions = function () {

        var element = $(this);
        var liElements = element.children();
        var blocks = $(".start");
        var firsElement = element.find(".active");

        var showFirst = function () {
            var firstBlock = firsElement.children().attr("href");
            blocks.each(function () {
                $(this).css("display", "none");
            });
            $("." + firstBlock).css("display", "block");

        };

        element.on('click', 'a', function (event) {
            blocks.each(function () {
                $(this).css("display", "none");
            });
            event.preventDefault();
            liElements.each(function () {
                $(this).removeClass('active');
            });

            $(this).parent().addClass("active");

            var elementToDisplay = $(this).attr("href");
            $("." + elementToDisplay).css("display", "block");

        });

        showFirst();


    };

})(jQuery);
