/**
 - This is jQuery plugin declaration for standings 
 - @html: ./html-component/landing_sport_standings.html
 - @deps: jQuery
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */

(function ($) {
    "use strict";

    $.fn.sportStandings = function () {
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");

            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                slides[i].classList.remove("ok");

            }

            slides[slideIndex - 1].style.display = "block";
            slides[slideIndex - 1].classList.add("ok");



        }
        var change = function () {
            var name = $(".ok > .league_name").text();
            $("span.league").text(name);
        };


        $("a.arrow.left").on("click", function (event) {
            event.preventDefault();
            plusSlides(-1);
            change();
        });

        $("a.arrow.right").on("click", function (event) {
            event.preventDefault();
            plusSlides(1);
            change();
        });



    };
})(jQuery);

