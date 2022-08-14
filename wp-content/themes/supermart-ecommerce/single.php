<?php
/**
 * The template for displaying all single posts
 * @subpackage Supermart Ecommerce
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<div class="container-fluid">
	<div class="content-area">
		<main id="skip-content" class="site-main" role="main">
			<?php
		    $supermart_ecommerce_layout_option = get_theme_mod( 'supermart_ecommerce_single_post_sidebar', 'Right Sidebar' );
		    if($supermart_ecommerce_layout_option == 'Left Sidebar'){ ?>
		    	<div class="row">
			        <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
			        <div class="content_area col-lg-8 col-md-8">
				    	<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/content-single' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'supermart-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous Post', 'supermart-ecommerce' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'supermart-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next Post', 'supermart-ecommerce' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>
					<div class="clearfix"></div>
				</div>			
			<?php }else if($supermart_ecommerce_layout_option == 'Right Sidebar'){ ?>
				<div class="row">
					<div class="content_area col-lg-8 col-md-8">
						<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/content-single' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'supermart-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous Post', 'supermart-ecommerce' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'supermart-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next Post', 'supermart-ecommerce' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php }else if($supermart_ecommerce_layout_option == 'One Column'){ ?>
					<div class="content_area">
						<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/content-single' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'supermart-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous Post', 'supermart-ecommerce' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'supermart-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next Post', 'supermart-ecommerce' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>
			<?php }else { ?>
				<div class="row">
					<div class="content_area col-lg-8 col-md-8">
						<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/content-single' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'supermart-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous Post', 'supermart-ecommerce' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'supermart-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next Post', 'supermart-ecommerce' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php } ?>
		</main>
	</div>
</div>

<?php get_footer();