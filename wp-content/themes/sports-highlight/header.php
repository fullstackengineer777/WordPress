<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sports_Highlight
 */

use Sports_Highlight\Customizer_Helpers;

use function Sports_Highlight\body_open;
use function Sports_Highlight\Helpers\get_singular_header;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php body_open(); ?>

	<div id="page" class="site">

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sports-highlight' ); ?></a>
		<?php

		do_action( 'sports_highlight_before_header' );

		if ( 'enable' === get_singular_header() ) {
			?>
			<header id="masthead" class="site-header">

				<div class="main-header-wrapper">

					<?php
					$layout = Customizer_Helpers::mods( 'general_option_header_layout' );
					/**
					 * Load desktop header part.
					 */
					get_template_part( "template-parts/header/{$layout}" );

					/**
					 * Load mobile header part.
					 */
					if ( 'desktop' === $layout ) {
						get_template_part( 'template-parts/header/mobile' );
					}
					?>
				</div><!-- .main-header-wrapper -->

			</header><!-- #masthead -->
			<?php
		}

		do_action( 'sports_highlight_after_header' );

		/**
		 * Load HTML for page banner part.
		 */
		get_template_part( 'template-parts/header/page-banner' );

		do_action( 'sports_highlight_after_page_banner' );

