jQuery(document).ready(function($) {


    var loader              = $('#loader');
    var loader_container    = $('#preloader');
    var scroll              = $(window).scrollTop();  
    var scrollup            = $('.backtotop');
    var menu_toggle         = $('.menu-toggle');
    var dropdown_toggle     = $('button.dropdown-toggle');
    var nav_menu            = $('.main-navigation');
    var introduction_slider = $('.introduction-slider');
    var portfolio_slider    = $('.portfolio-slider');
    var filtering           = $('.filtering-posts');

    
/*    BACK TO TOP   */

    $(window).scroll(function() {
        if ($(this).scrollTop() > 40) {
            scrollup.css({bottom:"25px"});
			
			if(document.getElementById("scroll-cart")) { 
				document.getElementById("scroll-cart").style.display = "block";
			}			
        } 
        else {
            scrollup.css({bottom:"-100px"});
			if(document.getElementById("scroll-cart")) { 
				document.getElementById("scroll-cart").style.display = "none";
			}			
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });
	
    $(".menu-search-icon").click(function() {
        $(".menu-search-form").toggleClass("display-search");
		$(".menu-search-form .search-field").focus();
        return false;
    });
	
	
    $(".menu-search-icon").keydown(function(e){
		if (e.key == "Enter") {									
        	$(".menu-search-form").toggleClass("display-search");
			$(".menu-search-form .search-field").focus();
        	return false;
		}
    });
	
/* MAIN NAVIGATION  */

    menu_toggle.click(function(){
        nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('.main-navigation').toggleClass('menu-open');
        $('body').toggleClass('main-navigation-active');
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
       $('#primary-menu > li:last-child button.active').unbind('keydown');
    });


/*     Match Height   */

$('.post-item-wrapper').matchHeight();
$('.portfolio-slider article').matchHeight();



/* Keyboard Navigation */

if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });
}
else {
    $('#primary-menu').find("li").unbind('keydown');
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $('#primary-menu').find("li").unbind('keydown');
    }
});


});