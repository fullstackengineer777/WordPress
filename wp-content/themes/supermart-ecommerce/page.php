<?php
/**
 * The template for displaying all pages
 * @subpackage Supermart Ecommerce
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<?php do_action( 'supermart_ecommerce_above_header_page' ); ?>

<div class="container-fluid">
	<div id="primary" class="content-area">
		<main id="skip-content" class="site-main" role="main">
			<?php
		    $supermart_ecommerce_page_sidebar = get_theme_mod( 'supermart_ecommerce_page_sidebar', 'One Column' );
		    if($supermart_ecommerce_page_sidebar == 'One Column'){ ?>
				<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>
			<?php }else if($supermart_ecommerce_page_sidebar == 'Left Sidebar'){ ?>
				<div class="row">
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2'); ?></div>
					<div class="col-lg-8 col-md-8">
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/page/content', 'page' );

								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>
					</div>
				</div>
			<?php }else if($supermart_ecommerce_page_sidebar == 'Right Sidebar'){ ?>
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/page/content', 'page' );

								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>
					</div>
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2'); ?></div>
				</div>
			<?php } else {?>
				<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>
			<?php }?>
		</main>
	</div>
</div>

<?php do_action( 'supermart_ecommerce_above_footer_page' ); ?>

<?php get_footer();