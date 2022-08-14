<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
            <div class="archive-blog-wrapper">
				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
			<?php  
			/**
			* Hook - ecommerce_wp_action_pagination.
			*
			* @hooked ecommerce_wp_pagination 
			*/
			do_action( 'ecommerce_wp_action_pagination' ); 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( ecommerce_wp_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
</div><!-- .wrapper -->

<?php
get_footer();
