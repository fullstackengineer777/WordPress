/**
 * Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	var style = [
			'minimal',
			'colored',
			'dark'
		],
		headerPosition = [
			'side',
			'top'
		];

	wp.customize( 'oss_social_share_name', function( value ) {
    	value.bind( function( newval ) {
			var socialWrap = $( '.entry-share' );
			if ( true == newval ) {
				socialWrap.addClass( 'has-name' );
			} else {
				socialWrap.removeClass( 'has-name' );
			}
		} );
    } );
	wp.customize('oss_social_share_heading', function( value ) {
		var heading = $( '.social-share-title span.text' );
		if ( heading.length ) {
			var ogheading = heading.html();
			value.bind( function( newval ) {
				if ( newval ) {
					heading.html( newval );
				} else {
					heading.html( ogheading );
				}
			});
		}
	} );
	wp.customize( 'oss_social_share_heading_position', function( value ) {
		value.bind( function( newval ) {
			var socialWrap = $( '.entry-share' );
			if ( socialWrap.length ) {
				$.each( headerPosition, function( i, v ) {
					socialWrap.removeClass( v );
				});
				socialWrap.addClass( newval );
			}
		} );
	} );
	wp.customize( 'oss_social_share_style', function( value ) {
		value.bind( function( newval ) {
			var socialWrap = $( '.entry-share' );
			if ( socialWrap.length ) {
				$.each( style, function( i, v ) {
					socialWrap.removeClass( v );
				});
				socialWrap.addClass( newval );
			}
		} );
	} );
	wp.customize( 'oss_social_share_style_border_radius', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-oss_social_share_style_border_radius' );
			if ( to ) {
				var img = '<style class="customizer-oss_social_share_style_border_radius">.entry-share ul li a { border-radius: ' + to + '; }</style>';
				if ( $child.length ) {
					$child.replaceWith( img );
				} else {
					$( 'head' ).append( img );
				}
			} else {
				$child.remove();
			}
		} );
	} );
	wp.customize( 'oss_sharing_borders_color', function( value ) {
		value.bind( function( to ) {
			$( '.entry-share.minimal ul li a' ).css( 'border-color', to );
		} );
	} );
	wp.customize( 'oss_sharing_icons_bg', function( value ) {
		value.bind( function( to ) {
			$( '.entry-share.minimal ul li a' ).css( 'background-color', to );
		} );
	} );
	wp.customize( 'oss_sharing_icons_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-oss_sharing_icons_color' );
			if ( to ) {
				var img = '<style class="customizer-oss_sharing_icons_color">.entry-share.minimal ul li a { color: ' + to + '; }.entry-share.minimal ul li a .oss-icon { fill: ' + to + '; }</style>';
				if ( $child.length ) {
					$child.replaceWith( img );
				} else {
					$( 'head' ).append( img );
				}
			} else {
				$child.remove();
			}
		} );
	} );
} )( jQuery );
