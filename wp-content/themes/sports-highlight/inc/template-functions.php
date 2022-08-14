<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Sports_Highlight
 */

use Sports_Highlight\Customizer_Helpers;

use function Sports_Highlight\Helpers\get_singular_sidebar;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sports_highlight_body_classes( $classes ) {
	$classes[] = 'sports-highlight';
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	/**
	 * Add sidebar related class in body.
	 */
	$sidebar    = get_singular_sidebar();
	$scroll_top = Customizer_Helpers::mods( 'general_option_scroll_top_position' );
	$layout     = Customizer_Helpers::mods( 'general_option_layout_page_width' );
	$box_layout = Customizer_Helpers::mods( 'general_option_layout_box_shadow_toggle' );

	$classes[] = is_active_sidebar( 'main-sidebar' ) ? "{$sidebar}-sidebar" : 'no-sidebar';
	$classes[] = 'right' === $scroll_top ? "scrolltop-postion-{$scroll_top}" : "scrolltop-postion-{$scroll_top}";
	if ( ! is_singular() ) {
		$classes[] = $layout ? "{$layout}-layout" : '';
	} else {
		$local_value       = get_post_meta( get_the_ID(), 'sports_highlight_singular_meta_data', true );
		$local_page_layout = ! empty( $local_value['page_layout'] ) ? $local_value['page_layout'] : 'default';
		$page_layout       = 'default' !== $local_page_layout ? $local_page_layout : $layout;
		$classes[]         = "{$page_layout}-layout";

	}
	$classes[] = 1 === $box_layout ? 'enabled-box-shadow' : '';

	return $classes;
}
add_filter( 'body_class', 'sports_highlight_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sports_highlight_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'sports_highlight_pingback_header' );


/**
 * Filter the excerpt length to customizer value.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function sports_highlight_excerpt_length( $length ) {
	$custom = Customizer_Helpers::mods( 'general_blog_excerpt_length' );

	return $custom ? intval( $custom ) : $length;
}
add_filter( 'excerpt_length', 'sports_highlight_excerpt_length' );


/**
 * Add custom html to parent menu items.
 *
 * @param string   $item_output   The menu item's starting HTML output.
 * @param \WP_Post $item Menu item data object.
 * @return string
 */
function sports_highlight_parent_menu_html( $item_output, $item ) {
	$item_classes = array_flip( $item->classes );
	if ( isset( $item_classes['menu-item-has-children'] ) ) {
		$menu_name = $item->post_title;
		$find      = "{$menu_name}</a>";
		$replace   = $menu_name . '</a>
		<button class="btn-mobile-submenu et-hidden-lg"><span class="dashicons dashicons-arrow-down-alt2"></span></button>';
		return str_replace( $find, $replace, $item_output );
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'sports_highlight_parent_menu_html', 10, 2 );

/**
 * If the given post is a single post, then add a class to this post.
 *
 * @param    array $classes    The array of classes being rendered on a single post element.
 * @return   array       $classes    The array of classes being rendered on a single post element.
 */
function sports_highlight_single_post_classes( $classes ) {
	$custom        = Customizer_Helpers::mods( 'general_blog_post_layout_dropdown' );
		$classes[] = 'et-post-article';
		$classes[] = ! empty( $custom ) ? "et-{$custom}-post-layout" : '';
	return $classes;

}
add_filter( 'post_class', 'sports_highlight_single_post_classes' );

/**
 * Function for custom excerpt indicator.
 *
 * @param string $more is default excerpt more.
 */
function sports_highlight_custom_excerpt_more( $more ) {
	$except_indicator = Customizer_Helpers::mods( 'general_blog_excerpt_indicator' );
	return $except_indicator ? $except_indicator : $more;
}
add_filter( 'excerpt_more', 'sports_highlight_custom_excerpt_more' );
