function vw_sports_menu_open_nav() {
	window.vw_sports_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function vw_sports_menu_close_nav() {
	window.vw_sports_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
   	});
});

jQuery(document).ready(function () {
	window.vw_sports_currentfocus=null;
  	vw_sports_checkfocusdElement();
	var vw_sports_body = document.querySelector('body');
	vw_sports_body.addEventListener('keyup', vw_sports_check_tab_press);
	var vw_sports_gotoHome = false;
	var vw_sports_gotoClose = false;
	window.vw_sports_responsiveMenu=false;
 	function vw_sports_checkfocusdElement(){
	 	if(window.vw_sports_currentfocus=document.activeElement.className){
		 	window.vw_sports_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_sports_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.vw_sports_responsiveMenu){
			if (!e.shiftKey) {
				if(vw_sports_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vw_sports_gotoHome = true;
			} else {
				vw_sports_gotoHome = false;
			}

		}else{

			if(window.vw_sports_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vw_sports_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.vw_sports_responsiveMenu){
				if(vw_sports_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vw_sports_gotoClose = true;
				} else {
					vw_sports_gotoClose = false;
				}
			
			}else{

			if(window.vw_sports_responsiveMenu){
			}}}}
		}
	 	vw_sports_checkfocusdElement();
	}
});

jQuery(function($){
	new WOW().init();
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

jQuery(document).ready(function () {
	jQuery( ".tablinks" ).first().addClass( "active" );
});

function vw_sports_services_tab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  jQuery('#'+ cityName).show()
  evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
	jQuery('.tabcontent').hide();
	jQuery('.tabcontent:first').show();
});