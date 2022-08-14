<?php
/**
 * Custom header implementation
 */

function supermart_ecommerce_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'supermart_ecommerce_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1000,
		'height'             => 68,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'supermart_ecommerce_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'supermart_ecommerce_custom_header_setup' );

if ( ! function_exists( 'supermart_ecommerce_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see supermart_ecommerce_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'supermart_ecommerce_header_style' );
function supermart_ecommerce_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .bottom-header {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'supermart-ecommerce-basic-style', $custom_css );
	endif;
}
endif; // supermart_ecommerce_header_style