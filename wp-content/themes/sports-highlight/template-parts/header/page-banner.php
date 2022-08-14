<?php
/**
 * Header template part for page banner html.
 *
 * @package Sports_Highlight
 */

use Sports_Highlight\Customizer_Helpers;
use function Sports_Highlight\Helpers\breadcrumb_options;
use function Sports_Highlight\Helpers\get_singular_breadcrumb;
use function Sports_Highlight\Helpers\get_singular_page_banner;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_home() || is_front_page() ) {
	return;
}

if ( get_singular_page_banner() ) {
	?>
	<div class="page-header-banner
	<?php
	if ( is_singular() ) {
		echo has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image';
	} else {
		echo 'no-featured-image';
	}
	?>
" style="background-image: url(
	<?php
	if ( is_singular() ) {
		has_post_thumbnail() ? the_post_thumbnail_url() : header_image();
	} else {
		header_image();
	}
	?>
 ); background-position:<?php echo esc_attr( Customizer_Helpers::mods( 'general_page_banner_section_bg_position' ) ); ?>; background-size:<?php echo esc_attr( Customizer_Helpers::mods( 'general_page_banner_section_bg_size' ) ); ?> !important; <?php echo esc_attr( 1 === Customizer_Helpers::mods( 'general_page_banner_section_toggle_parallax' ) ? 'background-attachment:fixed;' : '' ); ?>">
		<?php
		if ( is_page() ) {
			if ( Sports_Highlight\Customizer_Helpers::mods( 'general_option_header_page_title_toggle' ) ) {
				?>
				<div class="et-container et-container-center">
					<div class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div><!-- .entry-header -->
				</div> <!-- .et-container -->
				<?php
			}
		} else {
			?>
			<div class="et-container et-container-center">
				<div class="entry-header">
					<h1 class="entry-title">
						<?php wp_title(); ?>
					</h1>
				</div><!-- .entry-header -->
			</div> <!-- .et-container -->
			<?php
		}

		?>
	</div>
	<?php
}

if ( get_singular_breadcrumb() ) {
	breadcrumb_options();
}
