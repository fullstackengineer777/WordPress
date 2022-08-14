<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ecommerce_wp_body_classes( $classes ) {
	$options = ecommerce_wp_get_theme_options();
	
	$classes[] = $options['featured_heading_style'];
	
	 if ( has_header_image() ){
	 	$classes[] = 'has-header-image';
	 }

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class for layout
	$classes[] = esc_attr( $options['site_layout'] );

	// Add a class for sidebar
	$sidebar_position = ecommerce_wp_layout();
	$sidebar = 'sidebar-1';
	if ( is_singular() || is_home() ) {
		$id = ( is_home() && ! is_front_page() ) ? get_option( 'page_for_posts' ) : get_the_id();
	  	$sidebar = get_post_meta( $id, 'ecommerce-wp-selected-sidebar', true );
	  	$sidebar = ! empty( $sidebar ) ? $sidebar : 'sidebar-1';
	}
	if ( class_exists('WooCommerce') && is_woocommerce() ) {
		$classes[] = esc_attr($sidebar_position) ;
	}  elseif ( is_archive()) {
		$classes[] = esc_attr( $sidebar_position );
	}  elseif ( is_active_sidebar( $sidebar ) ) {
		$classes[] = esc_attr( $sidebar_position );
	} else {
		$classes[] = 'no-sidebar';
	}
	
	

	return $classes;
}
add_filter( 'body_class', 'ecommerce_wp_body_classes' );
