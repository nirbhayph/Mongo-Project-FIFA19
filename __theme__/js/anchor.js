/**
 - This is jQuery plugin declaration for anchor link scrolling 
 - @html: ./html-component/landing_sport_standings.html
 -        ./html-component/landing_sport_header.html  
 -        ./html-component/landing_sport_main_slider.html
 -        ./html-component/landing_sport_players_slider.html  
 -        ./html-component/landing_sport_main_news.html  
 -        ./html-component/landing_sport_about.html  
 -        ./html-component/landing_sport_twitter_slider.html  
 - @deps: jQuery
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */

(function ($, window) {
    "use strict";
    $.fn.anchor = function (time, menu,menuToStyle) {
     
        var element = $(this);
        var elementId = element.attr("id");
        var menuHeight = 0;
        window.onload = function () {
            menuHeight = $(menu).innerHeight();
             var top = 0;

        var styleMenu = function () {
            if ($(menuToStyle).attr("data-id") === "1") {
                $(menuToStyle).addClass('style-menu');
            } else {
                $(menuToStyle).removeClass('style-menu');
            }

        };

        var scrollMenu = function () {
            styleMenu();
            $(menu + " li").each(function () {
                var link = $(this).children();
                var target = link.attr("href");
               var menuH = $(menu).offset().top + $(menu).height() +1;
               
                if (menuH >= $(target).offset().top && menuH <= $(target).offset().top + $(target).height() - $(menu).height()) {
                    $(menu + " li.active").removeClass("active");
                    $(this).addClass("active");
                } else {
                    $(this).removeClass("active");
                }
            });

        };

        var animateAnchor = function () {
            $("body,html").animate({scrollTop: top}, time);
            styleMenu();
        };


        element.on("click", "a", function (event) {
            $(window).off("scroll", scrollMenu);
            $("#" + elementId + " li").removeClass("active");
            event.preventDefault();
            $(".list a").css({"pointer-events":"none"});
            var id = $(this).attr("href");
            if($(menuToStyle).css("position")==="relative"){
                top = $(id).offset().top - menuHeight*2;
            }
            else{
                 top = $(id).offset().top - menuHeight;
            }
                
            animateAnchor();
            setTimeout(function () {
                $(window).on("scroll", scrollMenu);
                  $(".list a").css({"pointer-events":"auto"});
            }, time);


            $(this).parent().addClass("active");

        });

        $(window).on("scroll", scrollMenu);
        $(window).on("scroll", styleMenu);

        };
       

    };


})(jQuery, window);
