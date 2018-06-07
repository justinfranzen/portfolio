$(document).ready(function () {
    'use strict';
    
    var top = 80;
    
$(window).on('scroll', function () {
        if ($(window).scrollTop() >= top) {
            // if so, add the blue class
            $('#header').css({background: '#800000'});
            $('#header').addClass('transition');  
            $('.dropbtn').css({color: 'white'});
        } else {
            $('#header').css({background: 'transparent'});
            $('#header').addClass('transition');
            $('.dropbtn').css({color: 'maroon'});
        }
    });
    
});
