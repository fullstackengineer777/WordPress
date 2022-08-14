<?php
/**
 * Footer template part for widgets area html.
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

do_action( 'sports_highlight_before_footer_widgets' );

if ( Customizer_Helpers::mods( 'general_option_footer_widget_toggle' ) ) {

	$sports_highlight_widget_areas_active = false;

	$sports_highlight_widget_areas = array(
		'footer-widgets-1',
		'footer-widgets-2',
		'footer-widgets-3',
		'footer-widgets-4',
	);

	if ( is_array( $sports_highlight_widget_areas ) && ! empty( $sports_highlight_widget_areas ) ) {
		foreach ( $sports_highlight_widget_areas as $sports_highlight_widget_area ) {
			if ( is_active_sidebar( $sports_highlight_widget_area ) ) {
				$sports_highlight_widget_areas_active = true;
			}
		}
	}

	if ( $sports_highlight_widget_areas_active ) {
		?>
		<div class="et-main-footer-widget-sec">
			<div class="et-container et-container-center et-padding">
				<div class="footer-widgets-inner">
					<div class="inner-wrapper">
						<?php
						if ( is_array( $sports_highlight_widget_areas ) && ! empty( $sports_highlight_widget_areas ) ) {
							foreach ( $sports_highlight_widget_areas as $sports_highlight_widget_area ) {
								?>
								<div class="<?php echo esc_attr( $sports_highlight_widget_area ); ?>">
									<?php dynamic_sidebar( $sports_highlight_widget_area ); ?>
								</div>
								<?php
							}
						}
						?>
					</div><!-- inner-wrapper -->
				</div><!-- .footer-widgets-inner -->
			</div><!-- .et-container -->
		</div><!-- .et-main-footer-sec -->
		<?php
	}
}

do_action( 'sports_highlight_after_footer_widgets' );


