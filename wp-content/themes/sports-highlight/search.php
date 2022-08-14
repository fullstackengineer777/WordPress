<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Sports_Highlight
 */

get_header();
?>
<div id="content-wrapper">
	<div id="inner-content" class="et-container et-container-center et-padding-md">
		<div class="et-flex et-main-flex et-flex-md">

			<main id="primary" class="site-main et-main et-md-2-3">
				<? get_search_form(); ?>

				<?php

				do_action( 'sports_highlight_before_loop' );

				if ( have_posts() ) :
					?>

					<header class="page-header">
						<h1 class="page-title">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'sports-highlight' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						do_action( 'sports_highlight_before_loop_content' );

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

						do_action( 'sports_highlight_after_loop_content' );

					endwhile;

					the_posts_pagination();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;

				do_action( 'sports_highlight_after_loop' );

				?>

			</main><!-- #main -->

		</div><!-- .et-flex -->
	</div><!-- .inner-content -->
</div><!-- .content-wrapper -->

<?php
get_footer();
