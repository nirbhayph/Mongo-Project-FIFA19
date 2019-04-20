
(function ($, window) {

    "use strict";

    var DemoSwitcher = {

        demos: [
            'soccer',
            'hockey',
            'dota',
            'csgo',
            'basketball',
            'baseball',
            'amfootball'
        ],

        init: function () {
            if ($('#style-scheme-css').length === 0) {
                $('<style id="style-scheme-css" type="text/css"></style>')
                        .appendTo('head');
            }
            
            var query_params = new URLSearchParams(window.location.search);
            var scheme = query_params.get('scheme');
            if (scheme) {
                this.setCurrentDemo(scheme);
            } else {
                this.changeDemo();
            }
            
            this.events();
        },

        changeDemo: function () {
            var demo = this.getCurrentDemo();
            this.changeMenuActive();

            // Preloader start
            window.teamPreloader.$el.css('display', 'block');
            window.teamPreloader.startPosition();
            window.teamPreloader.ended = false;
            window.teamPreloader.start();

            // Change styles
            var $style = $("#style-scheme-css");
            $style.html('@import url("' + 'css-min/' + demo + '.min.css' + '")');

            // Change images path
            var current_slag = 'images/' + demo + '/';
            for (var i = 0; i < this.demos.length; i++) {
                var demo_other = this.demos[i];
                if (demo_other === demo) {
                    continue;
                }

                var slag_other = 'images/' + demo_other + '/';
                var query = "img[src*='" + slag_other + "']";
                this.replaceImg(query, slag_other, current_slag);
            }

            // Preloader end event
            $('body').imagesLoaded().done(function () {
                window.teamPreloader.end();
            });

            $(window).trigger('demo_switcher:demo_change');
        },

        replaceImg: function (query, slag_other, current_slag) {
            $(query).each(function () {
                var url = $(this).attr('src');
                var demo_url = url.replace(slag_other, current_slag);
                $(this).attr('src', demo_url);
            });
        },

        changeMenuActive: function () {
            var Demo = this.getCurrentDemo();
            $('.demo-switcher ul.demo-swith li a').parents('li').removeClass('active');
            $('.demo-switcher ul.demo-swith li a[data-scheme="' + Demo + '"]').parents('li').first().addClass('active');
        },

        events: function () {
            var self = this;
            $('.demo-switcher ul.demo-swith li a').on('click', function () {
                var Demo = $(this).attr('data-scheme');
                self.setCurrentDemo(Demo);
                return false;
            });
        },

        setCurrentDemo: function (demo) {
            localStorage.setItem('team_html_demo', demo);
            this.changeDemo();
        },

        getCurrentDemo: function () {
            var demo = localStorage.getItem('team_html_demo');
            
            if (!demo || demo === undefined || demo === 'undefined') {
                return 'soccer';
            }

            return demo;
        }

    };

    $(window).on('demo_switcher:demo_change', function () {
        if ($('#player-radar-graph').length > 0) {
            setTimeout(function () {
                $('#player-radar-graph').trigger('radarchart.rebuild');
            }, 400);
        }
    });

    if (window.location.pathname !== "/sport-championship-landing.html" && 
        window.location.pathname !== "/sport-team-landing.html" &&
        window.location.pathname !== "/esport-championship-landing.html" &&
        window.location.pathname !== "/esport-team-landing.html")
    {
        DemoSwitcher.init();
    }

    var DemoSwithesMenu = {

        initialize: function () {
            this.$el = $('.demo-switcher');
            this.$menu = this.$el.find('.switcher-menu').first();
            this.startPosition();
            this.events();
        },

        events: function () {
            var self = this;
            this.$el.find('.switcher-header').first().on('click', function () {
                self.close();
            });

            $('.demo-switcher-small-button').on('click', function () {
                self.open();
            });
        },

        open: function () {
            if (this.isOpen() === true) {
                return;
            }

            var $el = this.$el;
            var $menu = this.$menu;
            $el.animate({'left': '0'}, 400, 'swing', function () {

                $menu.animate({'top': '0'}, 400, 'swing', function () {

                });

            });
        },

        close: function () {
            if (this.isOpen() === false) {
                return;
            }

            var $el = this.$el;
            var $menu = this.$menu;

            var switcher_width = this.$el.width();
            var menu_height = this.$menu.height();

            $menu.animate({'top': -menu_height}, 400, 'swing', function () {

                $el.animate({'left': -switcher_width}, 400, 'swing', function () {

                });

            });
        },

        startPosition: function () {
            var switcher_width = this.$el.width();
            var menu_height = this.$menu.height();
            this.$el.css('left', -switcher_width);
            this.$menu.css('top', -menu_height);
        },

        isOpen: function () {
            var switcher_left = parseInt(this.$el.css('left'));
            var menu_top = parseInt(this.$menu.css('top'));
            if (switcher_left < 0 || menu_top < 0) {
                return false;
            }

            return true;
        }

    };

    DemoSwithesMenu.initialize();
    if ( document.referrer == null || document.referrer.indexOf(window.location.hostname) < 0 ) {
        DemoSwithesMenu.open();
    }

})(jQuery, window);
    