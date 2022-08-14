<?php
/**
 * All the utility helpers function for this theme.
 *
 * @package Sports_Highlight
 */

namespace Sports_Highlight\Helpers;

use Sports_Highlight\Customizer_Helpers;
use function Sports_Highlight\Breadcrumb\get_breadcrumb;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function get_singular_sidebar( $id = null ) {

	if ( ! is_singular() ) {
		return Customizer_Helpers::mods( 'general_option_sidebar' );
	}

	if ( null === $id ) {
		$id = get_the_ID();
	}

	$local_value = get_post_meta( $id, 'sports_highlight_singular_meta_data', true );

	// First check if value set.
	$local_sidebar = ! empty( $local_value['sidebar'] ) ? $local_value['sidebar'] : 'default';

	// Check if value is not set to default.
	$sidebar = 'default' !== $local_sidebar ? $local_sidebar : Customizer_Helpers::mods( 'general_option_sidebar' );

	if ( ( 'no' === $sidebar ) || ! $sidebar ) {
		return 'no';
	}
	return $sidebar;
}

function get_singular_header() {
	if ( ! is_singular() ) {
		return 'enable';
	}
	$local_value  = get_post_meta( get_the_ID(), 'sports_highlight_singular_meta_data', true );
	$local_header = ! empty( $local_value['header'] ) ? $local_value['header'] : 'enable';
	return $local_header;
}

/**
 * Undocumented function
 *
 * @return bool
 */
function get_singular_footer() {
	if ( ! is_singular() ) {
		return Customizer_Helpers::mods( 'general_option_footer_toggle' );
	}
	$local_value  = get_post_meta( get_the_ID(), 'sports_highlight_singular_meta_data', true );
	$local_footer = ! empty( $local_value['footer'] ) ? $local_value['footer'] : 'default';
	$footer       = 'default' !== $local_footer ? $local_footer : Customizer_Helpers::mods( 'general_option_footer_toggle' );
	if ( is_string( $footer ) ) {
		return 'enable' === $footer;
	}
	return $footer;
}

function get_singular_page_banner() {
	if ( ! is_singular() ) {
		return Customizer_Helpers::mods( 'general_page_banner_toggle' );
	}
	$local_value       = get_post_meta( get_the_ID(), 'sports_highlight_singular_meta_data', true );
	$local_page_banner = ! empty( $local_value['page_banner'] ) ? $local_value['page_banner'] : Customizer_Helpers::mods( 'general_page_banner_toggle' );
	$page_banner       = 'default' !== $local_page_banner ? $local_page_banner : Customizer_Helpers::mods( 'general_page_banner_toggle' );
	if ( is_string( $page_banner ) ) {
		return 'enable' === $page_banner;
	}
	return $page_banner;
}

function get_singular_breadcrumb() {
	if ( ! is_singular() ) {
		return Customizer_Helpers::mods( 'general_option_breadcrumbs_toggle' );
	}
	$local_value      = get_post_meta( get_the_ID(), 'sports_highlight_singular_meta_data', true );
	$local_breadcrumb = ! empty( $local_value['breadcrumb'] ) ? $local_value['breadcrumb'] : 'default';
	$breadcrumb       = 'default' !== $local_breadcrumb ? $local_breadcrumb : Customizer_Helpers::mods( 'general_option_breadcrumbs_toggle' );
	if ( is_string( $breadcrumb ) ) {
		return 'enable' === $breadcrumb;
	}
	return $breadcrumb;
}


/**
 * Prints footer classes.
 *
 * @param string $class Class to set in array list for `Sports_Highlight\Helpers\get_footer_classes()`.
 * @return void
 */
function footer_classes( $class = '' ) {
	echo esc_attr( implode( ' ', get_footer_classes( $class ) ) );
}

/**
 * Prints sidebar classes.
 *
 * @param string $class Class to set in array list for Sports_Highlight\Helpers\get_sidebar_classes().
 */
function siderbar_classes( $class = '' ) {
	echo esc_attr( implode( ' ', get_sidebar_classes( $class ) ) );
}

/**
 * Prints breadcrumbs classes.
 *
 * @param string $class Class to set in array list for Sports_Highlight\Helpers\get_breadcrumbs_classes().
 */
function breadcrumbs_classes( $class = '' ) {
	echo esc_attr( implode( ' ', get_breadcrumbs_classes( $class ) ) );
}

/**
 * Returns array of footer classes.
 *
 * @param string $class Class to set in array list.
 * @return array
 */
function get_footer_classes( $class ) {
	$widget_enable = Customizer_Helpers::mods( 'general_option_footer_widget_toggle' ) === 1 ? 'widget-enable' : 'widget-disable';

	$classes = array();

	$classes[] = 'site-footer';
	$classes[] = $widget_enable;

	$classes[] = $class;

	$classes = apply_filters( 'sports_highlight_footer_classes', $classes );

	$classes = array_filter( $classes );
	$classes = array_unique( $classes );

	return array_values( $classes );
}

/**
 * Returns array of sidebar classes.
 *
 * @param string $class Class to set in array list.
 * @return array
 */
function get_breadcrumbs_classes( $class ) {
	$classes              = array();
	$breadcrumb_alignment = Customizer_Helpers::mods( 'general_option_breadcrumbs_alignment' );
	$breadcrumb_position  = Customizer_Helpers::mods( 'general_option_breadcrumbs_position' );

	$classes[] = $breadcrumb_alignment;
	$classes[] = $breadcrumb_position;

	$classes[] = $class;

	$classes = apply_filters( 'sports_highlight_breadcrumbs_classes', $classes );

	$classes = array_filter( $classes );
	$classes = array_unique( $classes );

	return array_values( $classes );
}


/**
 * Returns array of Breadcrumbs classes.
 *
 * @param string $class Class to set in array list.
 * @return array
 */
function get_sidebar_classes( $class ) {
	$classes     = array();
	$sidebar_gap = Customizer_Helpers::mods( 'general_option_sidebar_gap' );

	$classes[] = 'main-sidebar';
	$classes[] = $sidebar_gap;

	if ( is_right_sidebar() ) {
		$classes[] = 'sidebar-right';
	} elseif ( ! is_right_sidebar() ) {
		$classes[] = 'sidebar-left';
	}

	$classes[] = $class;

	$classes = apply_filters( 'sports_highlight_sidebar_classes', $classes );

	$classes = array_filter( $classes );
	$classes = array_unique( $classes );

	return array_values( $classes );
}

/**
 * Method for sidebar option.
 *
 * @return string
 */
function is_right_sidebar() {
	$sidebar_option = Customizer_Helpers::mods( 'general_option_sidebar' ) === 'right' ? true : false;
	return $sidebar_option;
}

/**
 * Display sidebar according to the selected option in the customizer.
 *
 * @param string $side Either `right`, `left` or `no`.
 * @return void
 */
function get_sidebar( $side ) {

	$sidebar_type = get_singular_sidebar();

	do_action(
		'sports_highlight_before_sidebar',
		array(
			'side'         => $side,
			'sidebar_type' => $sidebar_type,
		)
	);

	if ( $sidebar_type === $side ) {
		\get_sidebar();
	}

	do_action(
		'sports_highlight_after_sidebar',
		array(
			'side'         => $side,
			'sidebar_type' => $sidebar_type,
		)
	);
}

/**
 * Breadcrumbs setting accroding to customizer options
 */
function breadcrumb_options() {
	if ( is_home() || is_front_page() ) {
		/**
		 * Don't show our breadcrumb in home page or static frontpage.
		 */
		return;
	}

	if ( ! get_singular_breadcrumb() ) {
		return;
	}

	$hide_breadcrumbs = (array) Customizer_Helpers::mods( 'general_option_breadcrumbs_display_option' );
	if ( ! empty( array_intersect( $hide_breadcrumbs, get_body_class() ) ) ) {
		/**
		 * Don't show the breadcrumb if body class exists in hideables.
		 */
		return;
	}
	get_breadcrumb();
}

/**
 * Fallback callback function for our primary menu.
 *
 * @return void
 */
function primary_menu_callback( $args ) {
	?>
	<ul class="<?php echo esc_attr( $args['menu_class'] ); ?>">
		<?php
		if ( current_user_can( 'edit_theme_options' ) ) {
			?>
			<li class="menu-item"><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Add Menu', 'sports-highlight' ); ?></a></li>
			<?php
		}
		?>
	</ul>
	<?php
}

/**
 * Prints primary menu html.
 *
 * @return void
 */
function primary_menu() {
	do_action( 'sports_highlight_before_primary_menu' );

	?>
	<nav id="site-navigation" class="main-navigation">
	<button class="mobile-menu-close et-hidden-lg"><i class="fa fa-times" aria-hidden="true"></i></button>
	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'menu-1',
			'container_class' => 'menu-header-menu-container',
			'menu_id'         => 'primary-menu',
			'fallback_cb'     => 'Sports_Highlight\Helpers\primary_menu_callback',
		)
	);
	?>
	</nav><!-- #site-navigation -->
	<?php

	do_action( 'sports_highlight_after_primary_menu' );
}

/**
 * Prints site logo, title and tagline.
 *
 * @return void
 */
function site_branding() {
	$title_toggle   = Customizer_Helpers::mods( 'general_option_header_theme_title_toggle' );
	$tagline_toggle = Customizer_Helpers::mods( 'general_option_header_theme_tagline_toggle' );

	$class_title       = 'site-title';
	$class_description = 'site-description';

	do_action( 'sports_highlight_before_site_branding' );

	?>
	<div class="custom-logo">
		<?php
		the_custom_logo();
		?>
	</div>
	<?php
	if ( $title_toggle ) {
		?>
		<span class="<?php echo esc_attr( $class_title ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</span>
		<?php
	}

	if ( $tagline_toggle ) {
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) :
			?>
			<span class="<?php echo esc_attr( $class_description ); ?>"><?php echo esc_html( $description ); ?></span>
			<?php
		endif;
	}

	do_action( 'sports_highlight_after_site_branding' );

}

/**
 * Returns social links array.
 *
 * @return array
 */
function get_social_links() {
	return apply_filters(
		'sports_highlight_social_links',
		array(
			'fa-facebook-f'  => __( 'Facebook', 'sports-highlight' ),
			'fa-twitter'     => __( 'Twitter', 'sports-highlight' ),
			'fa-linkedin-in' => __( 'LinkedIn', 'sports-highlight' ),
		)
	);
}
