<?php
/**
 * Handles the breadcrumb functions.
 *
 * @package Sports_Highlight\Breadcrumb
 */

namespace Sports_Highlight\Breadcrumb;

use Sports_Highlight\Trail\Breadcrumb_Trail;
use function Sports_Highlight\Helpers\breadcrumbs_classes;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Prints the breadcrumb html.
 */
function get_breadcrumb() {

	do_action( 'sports_highlight_before_breadcrumb_wrapper' );

	?>
		<div class="et-breadcrumb-wrapper">
			<div class="et-container et-container-center">
				<div class="et-breadcrumb <?php breadcrumbs_classes(); ?>">
					<?php

					do_action( 'sports_highlight_before_breadcrumb' );

					breadcrumbs_trail();

					do_action( 'sports_highlight_after_breadcrumb' );

					?>
				</div>
			</div><!-- et-container -->
		</div>
	<?php

	do_action( 'sports_highlight_after_breadcrumb_wrapper' );

}


if ( ! function_exists( 'breadcrumbs_trail' ) ) {
	/**
	 * Shows a breadcrumb for all types of pages.
	 */
	function breadcrumbs_trail() {

		// Return if is static front page.
		if ( is_front_page() ) {
			return;
		}

		// Yoast breadcrumbs.
		if ( function_exists( 'yoast_breadcrumb' )
		&& true === \WPSEO_Options::get( 'breadcrumbs-enable', false ) ) {
			return \yoast_breadcrumb();
		}

		// SEOPress breadcrumbs.
		if ( function_exists( 'seopress_display_breadcrumbs' ) ) {
			return \seopress_display_breadcrumbs();
		}

		// Rank Math breadcrumbs.
		if ( function_exists( 'rank_math_the_breadcrumbs' ) && \RankMath\Helper::get_settings( 'general.breadcrumbs' ) ) {
			return \rank_math_the_breadcrumbs();
		}

		if ( ! class_exists( 'Breadcrumb_Trail' ) ) {
			require_once get_template_directory() . '/inc/third-party/class-breadcrumb-trail.php';
		}

		$breadcrumb = new Breadcrumb_Trail(
			array(
				'show_browse' => false,
			)
		);
		return $breadcrumb->trail();
	}
}
