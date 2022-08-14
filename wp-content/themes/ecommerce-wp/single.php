<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */

get_header(); 
?>

<div id="inner-content-wrapper" class="container page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );

				/**
				* Hook ecommerce_wp_action_post_pagination
				*  
				* @hooked ecommerce_wp_post_pagination 
				*/
				do_action( 'ecommerce_wp_action_post_pagination' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( ecommerce_wp_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
</div><!-- .page-section -->
<?php
get_footer();
