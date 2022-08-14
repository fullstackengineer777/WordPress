jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
	});
});

function storefront_ecommerce_menu_open() {
	jQuery(".menu-brand.primary-nav").addClass('show');
}
function storefront_ecommerce_menu_close() {
	jQuery(".menu-brand.primary-nav").removeClass('show');
}

var storefront_ecommerce_Keyboard_loop = function (elem) {
    var storefront_ecommerce_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var storefront_ecommerce_firstTabbable = storefront_ecommerce_tabbable.first();
    var storefront_ecommerce_lastTabbable = storefront_ecommerce_tabbable.last();
    /*set focus on first input*/
    storefront_ecommerce_firstTabbable.focus();

    /*redirect last tab to first input*/
    storefront_ecommerce_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            storefront_ecommerce_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    storefront_ecommerce_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            storefront_ecommerce_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 0) {
	        jQuery('#scrollbutton').fadeIn();
	    } else {
	        jQuery('#scrollbutton').fadeOut();
	    }
	});
	jQuery(window).on("scroll", function () {
	   document.getElementById("scrollbutton").style.display = "block";
	});
	jQuery('#scrollbutton').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});

jQuery(function($){
	$('.mobiletoggle').click(function () {
        storefront_ecommerce_Keyboard_loop($('.menu-brand.primary-nav'));
    });
});

// preloader
jQuery(function($){
    setTimeout(function(){
        $(".frame").delay(1000).fadeOut("slow");
    });
});

// sticky header
(function( $ ) {

    $(window).scroll(function(){
        var sticky = $('.sticky-header'),
        scroll = $(window).scrollTop();

        if (scroll >= 100) sticky.addClass('fixed-header');
        else sticky.removeClass('fixed-header');
    });

})( jQuery );