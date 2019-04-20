/**
 - This is jQuery plugin declaration for footer news slider
 - @html: ./html-component/esport_team_landing_footer.html
 - @deps: jQuery
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */


(function ($) {
    "use strict";

    $.fn.footerSlide = function () {
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("footerSlide");

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



        }

        $("div.header > span > a.arrow.left").on("click", function (event) {
            event.preventDefault();
            plusSlides(-1);
            clearInterval(interval);

        });

        $("div.header > span > a.arrow.rigth").on("click", function (event) {
            event.preventDefault();
            plusSlides(1);
            clearInterval(interval);
        });

        var interval = setInterval(plusSlides,6000,1);

//body > div.esport-team-landing-footer > div > div > div.col-md-5 > div.header > span > a.arrow.rigth
    };
})(jQuery);

