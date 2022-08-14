<?php
/**
 * Footer template part for copyright html.
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

do_action( 'sports_highlight_before_copyright' );

$sports_highlight_copyright = Customizer_Helpers::mods( 'general_option_footer_copyright' );

if ( $sports_highlight_copyright ) {
	$sports_highlight_copyright_alignment = Customizer_Helpers::mods( 'general_option_footer_copyright_alignment' );
	?>
	<div class="et-bottom-footer-sec">
		<div class="et-container et-container-center et-padding">
			<div class="site-info <?php echo esc_attr( "copyright-text-{$sports_highlight_copyright_alignment}" ); ?>">
				<?php echo wp_kses_post( $sports_highlight_copyright ); ?>
			</div><!-- .site-info -->
		</div> <!-- .et-container -->
	</div><!-- .et-bottom-footer-Sec -->
	<?php
}

do_action( 'sports_highlight_after_copyright' );
