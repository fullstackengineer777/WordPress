<?php
/**
 * Date and Social links template part.
 *
 * @package Sports_Highlight
 */

use Sports_Highlight\Customizer_Helpers;

use function Sports_Highlight\Helpers\get_social_links;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="top-head-right">

	<?php if ( Customizer_Helpers::mods( 'general_option_topbar_display_topbar_date' ) ) { ?>
		<div class="topbar-date">
			<i class="far fa-calendar-alt icon"></i> <?php echo esc_html( wp_date( get_option( 'date_format' ) ) ); ?>
		</div>
	<?php } ?>

	<?php if ( Customizer_Helpers::mods( 'general_option_topbar_enable_social_links' ) ) { ?>

		<div class="social-label"><?php esc_html_e( 'Follow Us:', 'sports-highlight' ); ?></div>

		<ul class="top-head-social">
			<?php
			$social_links = get_social_links();

			if ( is_array( $social_links ) && ! empty( $social_links ) ) {
				foreach ( $social_links as $social_link_class => $social_link_label ) {

					$social_link = Customizer_Helpers::mods( "general_option_topbar_social_link_{$social_link_class}" );

					if ( ! $social_link ) {
						continue;
					}
					?>
					<li>
						<a
						title="<?php echo esc_attr( $social_link_label ); ?>"
						target="_blank"
						href="<?php echo esc_url( $social_link ); ?>">
							<i class="fab <?php echo esc_attr( $social_link_class ); ?>"></i>
						</a>
					</li>
					<?php
				}
			}
			?>
		</ul>

	<?php } ?>
</div>
