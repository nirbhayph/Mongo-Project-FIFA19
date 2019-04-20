/**
 * This is jQuery plugin declaration for standings html-component
 * @html: ./html-component/standings.html 
 * @deps: jQuery, jquery-bracket
 * @using: ./js/main.js
 * @author torbara  (https://themeforest.net/user/torbara)
 */

(function($){
    
    "use strict";
    
    $.fn.teamStandings = function (doubleElimination) {
        
        var $el = $(this);
        
        if ( $el.length === 0 ) {
            throw new Error('teamNewsLine: target element not found');
        }
        
        var Standings = {
            
            build: function(){
                
                $el.bracket({
                    init: doubleElimination,
                    skipConsolationRound: true,
                    matchMargin: 150,
                    roundMargin: 180,
                    teamWidth: 400,
                    scoreWidth: 40,
                    centerConnectors: true,
                    disableHighlight: true
                });
                
            },
            
            events: function (){
                var self = this;
                $el.on('show', function(){
                    self.build();
                });
            }
        };
        
        Standings.build();
        Standings.events();
        return Standings;
    };

})(jQuery);


