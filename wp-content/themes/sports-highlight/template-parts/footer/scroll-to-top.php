<?php
/**
 * Footer template part for scroll to top html.
 *
 * @package Sports_Highlight
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Sports_Highlight\Customizer_Helpers;

if ( ! Customizer_Helpers::mods( 'general_option_scroll_top_toggle' ) ) {
	/**
	 * Bail early if disabled from customizer.
	 */
	return;
}

?>

<a class="back-to-top" rel="nofollow">
	<span class="screen-reader-text"><?php esc_html_e( 'Scroll to top', 'sports-highlight' ); ?></span>
	<span class="scroll-top-icon dashicons <?php echo esc_attr( Customizer_Helpers::mods( 'general_option_scroll_top_icon' ) ); ?>"></span>
</a><!-- .back-to-top -->
