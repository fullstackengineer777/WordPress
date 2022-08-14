<?php
/**
 * Sports Highlight functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sports_Highlight
 */

namespace Sports_Highlight;

if ( ! defined( 'SPORTS_HIGHLIGHT_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'SPORTS_HIGHLIGHT_VERSION', '1.0.0' );
}

if ( ! defined( 'SPORTS_HIGHLIGHT_PATH' ) ) {
	/**
	 * Path to Sports Highlight folder.
	 */
	define( 'SPORTS_HIGHLIGHT_PATH', trailingslashit( get_template_directory() ) );
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load class Init.
 */
require get_template_directory() . '/inc/classes/class-init.php';

new Init();
new Customizer();
