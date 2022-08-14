<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sports_Highlight
 */

get_header();
?>
<div id="content-wrapper" class>
	<div id="inner-content" class="et-container et-container-center et-padding-md">
		<div class="et-flex et-main-flex et-flex-md">

			<?php Sports_Highlight\Helpers\get_sidebar( 'left' ); ?>

			<main id="primary" class="site-main et-main et-md-2-3">

				<?php

				do_action( 'sports_highlight_before_loop' );

				if ( have_posts() ) :
					
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						do_action( 'sports_highlight_before_loop_content' );

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

						do_action( 'sports_highlight_after_loop_content' );

					endwhile;

					the_posts_pagination();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;

				do_action( 'sports_highlight_after_loop' );

				?>
			</main><!-- #main -->

			<?php Sports_Highlight\Helpers\get_sidebar( 'right' ); ?>

		</div>
	</div>
</div>

<?php
get_footer();
