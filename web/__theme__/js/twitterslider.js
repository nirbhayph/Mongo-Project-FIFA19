/**
 - This is jQuery plugin declaration for twitter slider
 - @html: ./html-component/sport_championship_twitter.html
 - @html: ./html-component/esport_championship_twitter.html
 - @html: ./html-component/esport_team_landing_twitter_slider.html
 - @html: ./html-component/landing_sport_twitter_slider.html
 - @deps: jQuery
 - @using: ./js/main.js
 - @author torbara (https://themeforest.net/user/torbara)
 - */

(function ($) {
    "use strict";
    $.fn.sliderTwitter = function () {
        var $el = $(this);

        if ($el.length === 0) {
            throw new Error("twitterSLider : target element not found");
        }
        var owl_twitter = $($el.find('.owl-carousel'));
        owl_twitter.owlCarousel({
            center: true,
            items: 1,
            loop: true,
            autoHeight: false,
            dots: false



        });

        $(".nav-arrow.left-arrow").on('click', function (event) {
            event.preventDefault();
            owl_twitter.trigger('prev.owl.carousel', [500]);
        });
        $(".nav-arrow.right-arrow").on('click', function (event) {
            event.preventDefault();
            owl_twitter.trigger('next.owl.carousel', [500]);
        });
    };

})(jQuery);
