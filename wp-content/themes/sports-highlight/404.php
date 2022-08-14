<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Sports_Highlight
 */

use Sports_Highlight\Customizer_Helpers;

$title_404   = Customizer_Helpers::mods( 'general_option_404_title' );
$content_404 = Customizer_Helpers::mods( 'general_option_404_textarea' );

get_header();

?>
<div id="content-wrapper" class>
	<div id="inner-content" class="et-container et-container-center et-padding-md">
		<div class="et-flex et-main-flex et-flex-md">


			<?php do_action( 'sports_highlight_404_before_main' ); ?>


			<main id="primary" class="site-main et-main et-md-2-3">

				<?php do_action( 'sports_highlight_404_before_section' ); ?>

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php echo wp_kses_post( $title_404 ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php echo wp_kses_post( $content_404 ); ?></p>

						<?php
						if ( 'show' === Customizer_Helpers::mods( 'general_option_404_search_form' ) ) :
							get_search_form();
						endif;
						?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->

				<?php do_action( 'sports_highlight_404_after_section' ); ?>

			</main><!-- #main -->

			<?php do_action( 'sports_highlight_404_after_main' ); ?>

		</div><!-- .et-flex -->
	</div><!-- .inner-content -->
</div><!-- .content-wrapper -->

<?php
get_footer();
