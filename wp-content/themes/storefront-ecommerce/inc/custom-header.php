<?php
/**
 * @package Storefront Ecommerce
 * @subpackage storefront-ecommerce
 * @since storefront-ecommerce 1.0
 * Setup the WordPress core custom header feature.
 * @uses storefront_ecommerce_header_style()
*/

function storefront_ecommerce_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'storefront_ecommerce_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1400,
		'height'                 => 80,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'storefront_ecommerce_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'storefront_ecommerce_custom_header_setup' );

if ( ! function_exists( 'storefront_ecommerce_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'storefront_ecommerce_header_style' );
function storefront_ecommerce_header_style() {
	if ( get_header_image() ) :
	$storefront_ecommerce_custom_css = "
        .middle-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'storefront-ecommerce-basic-style', $storefront_ecommerce_custom_css );
	endif;
}
endif;