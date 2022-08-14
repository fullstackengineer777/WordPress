<?php
/**
 * Header ad template part.
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

$header_ad_img     = Customizer_Helpers::mods( 'general_option_header_ad_img' );
$header_ad_img_url = Customizer_Helpers::mods( 'general_option_header_ad_img_url' );

if ( $header_ad_img ) {
	?>
	<div class="header-ad-main">
		<?php if ( $header_ad_img_url ) { ?>
			<a href="<?php echo esc_url( $header_ad_img_url ); ?>" target="_blank">
				<img width="850" height="90" src="<?php echo esc_url( $header_ad_img ); ?>">
			</a>
		<?php } else { ?>
			<img width="850" height="90" src="<?php echo esc_url( $header_ad_img ); ?>">
		<?php } ?>
	</div><!-- .header-ad-main-->
	<?php
}
