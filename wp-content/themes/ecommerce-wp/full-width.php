<?php
/*
 * Template Name: Full Width Page
 */

get_header(); 
?>
<div id="inner-content-wrapper" class="container page-section">
    <div id="primary" class="content-area full-width">
        <main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .page-section -->
<?php
get_footer();