<?php
/**
 * @package VW Sports
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_sports_header_style()
*/
function vw_sports_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'vw_sports_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 200,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'vw_sports_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'vw_sports_custom_header_setup' );

if ( ! function_exists( 'vw_sports_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see vw_sports_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'vw_sports_header_style' );

function vw_sports_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			padding: 200px 0 0;
		    background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'vw-sports-basic-style', $custom_css );
	endif;
}
endif;