<?php
/**
 * Template Name: Blank Canvas Template
 *
 * @package Sports_Highlight
 */

get_header();
?>
<div id="content-wrapper" class>
		<div class="et-flex et-main-flex et-flex-md">

			<?php Sports_Highlight\Helpers\get_sidebar( 'left' ); ?>

			<main id="primary" class="site-main et-main et-md-2-3">
				<?php
				if ( have_posts() ) :
					if ( is_home() && is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content-singular' );
						the_posts_pagination();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</main><!-- #main -->

			<?php Sports_Highlight\Helpers\get_sidebar( 'right' ); ?>

		</div>
</div>

<?php
get_footer();
