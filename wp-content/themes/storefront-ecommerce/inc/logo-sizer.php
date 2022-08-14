<?php

function storefront_ecommerce_customize_logo_resizer( $html ) {
	$size = get_theme_mod( 'storefront_ecommerce_logo_sizer' );
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	// set the short side minimum
	$min = 48;

	// don't use empty() because we can still use a 0
	if ( is_numeric( $size ) && is_numeric( $custom_logo_id ) ) {

		// we're looking for $img['width'] and $img['height'] of original image
		$logo = wp_get_attachment_metadata( $custom_logo_id );
		if ( ! $logo ) return $html;

		// get the logo support size
		$sizes = get_theme_support( 'custom-logo' );

		// Check for max height and width, default to image sizes if none set in theme
		$max['height'] = isset( $sizes[0]['height'] ) ? $sizes[0]['height'] : $logo['height'];
		$max['width'] = isset( $sizes[0]['width'] ) ? $sizes[0]['width'] : $logo['width'];

		// landscape or square
		if ( $logo['width'] >= $logo['height'] ) {
			$output = storefront_ecommerce_min_max( $logo['height'], $logo['width'], $max['height'], $max['width'], $size, $min );
			$img = array(
				'height'	=> $output['short'],
				'width'		=> $output['long']
			);
		// portrait
		} else if ( $logo['width'] < $logo['height'] ) {
			$output = storefront_ecommerce_min_max( $logo['width'], $logo['height'], $max['width'], $max['height'], $size, $min );
			$img = array(
				'height'	=> $output['long'],
				'width'		=> $output['short']
			);
		}

		// add the CSS
		$css = '
			<style>
			.custom-logo {
				height: ' . $img['height'] . 'px;
				max-height: ' . $max['height'] . 'px;
				max-width: ' . $max['width'] . 'px;
				width: ' . $img['width'] . 'px;
			}
			</style>';

		$html = $css . $html;
	}

	return $html;
}
add_filter( 'get_custom_logo', 'storefront_ecommerce_customize_logo_resizer' );

/* Helper function to determine the max size of the logo */
function storefront_ecommerce_min_max( $short, $long, $short_max, $long_max, $percent, $min ){
	$ratio = ( $long / $short );
	$max['long'] = ( $long_max >= $long ) ? $long : $long_max;
	$max['short'] = ( $short_max >= ( $max['long'] / $ratio ) ) ? floor( $max['long'] / $ratio ) : $short_max;

	$ppp = ( $max['short'] - $min ) / 100;

	$size['short'] = round( $min + ( $percent * $ppp ) );
	$size['long'] = round( $size['short'] / ( $short / $long ) );

	return $size;
}

function storefront_ecommerce_customize_preview_js() {
	wp_enqueue_script( 'storefront-ecommerce-customizer', esc_url(get_template_directory_uri()) . '/js/logo-sizer/customize-preview.js', array( 'jquery', 'customize-preview' ), '201709081119', true );
}
add_action( 'customize_preview_init', 'storefront_ecommerce_customize_preview_js' );

function storefront_ecommerce_customize_controls_js() {
	wp_enqueue_script( 'storefront-ecommerce-customizer-controls', esc_url(get_template_directory_uri()) . '/js/logo-sizer/customize-controls.js', array( 'jquery', 'customize-preview' ), '201709071000', true );
}
add_action( 'customize_controls_enqueue_scripts', 'storefront_ecommerce_customize_controls_js' );

function storefront_ecommerce_remove_theme_mod() {
	if ( isset( $_GET['remove_logo_size'] ) && 'true' == $_GET['remove_logo_size'] ){
		set_theme_mod( 'storefront_ecommerce_logo_sizer', '' );
	}
}
add_action( 'wp_loaded', 'storefront_ecommerce_remove_theme_mod' );