/**
 * This is jQuery plugin declaration for matches-slider html-component
 * Deps: jQuery
 * Using examples: /js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($, window){
    
    "use strict";
    
    var PreloaderView = window.teamPreloader = {
        
        ended: false,
        
        initialize: function ($el) {
            this.$el = $el;
            var self = this;
            $(window).on("load", function(){
                self.end();
            });
            
            this.width = $(window).width();
            this.$DarkBig = this.$el.find('.dark-big');
            this.$DarkSmall = this.$el.find('.dark-small');
            this.$YellowBig = this.$el.find('.yellow-big');
            this.$YellowNormal = this.$el.find('.yellow-normal');
            this.$YellowSmall1 = this.$el.find('.yellow-small1');
            this.$YellowSmall2 = this.$el.find('.yellow-small2');
            
            
            this.start();
        },
        
        start: function () {
            if (this.ended) {
                return;
            }
            
            var self = this;
            setTimeout(function(){
                //self.end();
            }, 8000);
            
            this.startPosition();
            
            
            this.$YellowBig.animate({'right': this.width}, 4000, 'linear');
            this.$YellowNormal.animate({'right': this.width}, 1400, 'linear');
            this.$DarkBig.animate({'left': this.width}, 4000, 'linear');
            
            setTimeout(function(){
                self.$DarkSmall.animate({'left': self.width}, 2000, 'linear');
            }, 600);
            
            setTimeout(function(){
                self.$YellowSmall1.animate({'right': self.width}, 800, 'linear');
                self.$YellowSmall2.animate({'right': self.width}, 900, 'linear');
            }, 350);
            
            
            setTimeout(function(){
                self.start();
            }, 4100);
            
        },
        
        startPosition: function () {
            this.$DarkBig.stop();
            this.$DarkSmall.stop();
            this.$YellowBig.stop();
            this.$YellowNormal.stop();
            this.$YellowSmall1.stop();
            this.$YellowSmall2.stop();
            
            this.$DarkBig.css('left', -this.$DarkBig.outerWidth(true));
            this.$DarkSmall.css('left', -this.$DarkSmall.outerWidth(true));
            this.$YellowBig.css('right', -this.$YellowBig.outerWidth(true));
            this.$YellowNormal.css('right', -this.$YellowNormal.outerWidth(true));
            this.$YellowSmall1.css('right', -this.$YellowSmall1.outerWidth(true));
            this.$YellowSmall2.css('right', -this.$YellowSmall2.outerWidth(true));
        },
        
        end: function () {
            var self = this;
            this.ended = true;
            
            setTimeout(function(){
                self.$el.fadeOut();
                $(window).trigger('preloader.end');
            }, 400);
        }
        
    };
    
    PreloaderView.initialize($('.preloader-wrapper'));
    
})(jQuery, window);

