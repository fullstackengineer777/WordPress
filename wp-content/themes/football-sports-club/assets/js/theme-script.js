function football_sports_club_openNav() {
  jQuery(".sidenav").addClass('show');
}
function football_sports_club_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function football_sports_club_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const football_sports_club_nav = document.querySelector( '.sidenav' );

      if ( ! football_sports_club_nav || ! football_sports_club_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...football_sports_club_nav.querySelectorAll( 'input, a, button' )],
        football_sports_club_lastEl = elements[ elements.length - 1 ],
        football_sports_club_firstEl = elements[0],
        football_sports_club_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && football_sports_club_lastEl === football_sports_club_activeEl ) {
        e.preventDefault();
        football_sports_club_firstEl.focus();
      }

      if ( shiftKey && tabKey && football_sports_club_firstEl === football_sports_club_activeEl ) {
        e.preventDefault();
        football_sports_club_lastEl.focus();
      }
    } );
  }
  football_sports_club_keepFocusInMenu();
} )( window, document );

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
  var owl = jQuery('#top-slider .owl-carousel');
    owl.owlCarousel({
      margin: 0,
      nav: true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      autoHeight: true,
      loop: true,
      dots:false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1024: {
          items: 1
      }
    }
  })
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});