<?php
/**
 * The main template file
 * @subpackage Supermart Ecommerce
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<div class="container-fluid">

	<div class="content-area">
		<main id="skip-content" class="site-main" role="main">
			<?php
		    $supermart_ecommerce_layout_option = get_theme_mod( 'supermart_ecommerce_theme_options', 'Right Sidebar' );
		    if($supermart_ecommerce_layout_option == 'Left Sidebar'){ ?>
		    	<div class="row">
			        <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
			        <div class="content_area col-lg-8 col-md-8">
				    	<section id="post_section">
							<?php
							if ( have_posts() ) :
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile;

								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif;
							?>
							<div class="navigation">
				                <?php
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'supermart-ecommerce' ),
				                        'next_text'          => __( 'Next page', 'supermart-ecommerce' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'supermart-ecommerce' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
			           	 	</div>
						</section>
					</div>
					<div class="clearfix"></div>
				</div>					
			<?php }else if($supermart_ecommerce_layout_option == 'Right Sidebar'){ ?>
				<div class="row">
					<div class="content_area col-lg-8 col-md-8">
						<section id="post_section">
							<?php
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile;

								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif;
							?>
							<div class="navigation">
				                <?php
				                    // Previous/next page navigation.
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'supermart-ecommerce' ),
				                        'next_text'          => __( 'Next page', 'supermart-ecommerce' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'supermart-ecommerce' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php }else if($supermart_ecommerce_layout_option == 'One Column'){ ?>	
				<div class="content_area">
					<section id="post_section">
						<?php
							if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/content' );

							endwhile;

							else :

								get_template_part( 'template-parts/post/content', 'none' );

							endif;
						?>
						<div class="navigation">
			                <?php
			                    // Previous/next page navigation.
			                    the_posts_pagination( array(
			                        'prev_text'          => __( 'Previous page', 'supermart-ecommerce' ),
			                        'next_text'          => __( 'Next page', 'supermart-ecommerce' ),
			                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'supermart-ecommerce' ) . ' </span>',
			                    ) );
			                ?>
			                <div class="clearfix"></div>
			            </div>
					</section>
				</div>
			<?php }else if($supermart_ecommerce_layout_option == 'Grid Layout'){ ?>
		    	<div class="content_area">
					<section id="post_section">
						<div class="row">
							<?php
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/grid-layout' );

								endwhile;
								
								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif;
							?>
						</div>
						<div class="navigation">
			                <?php
			                    // Previous/next page navigation.
			                    the_posts_pagination( array(
			                        'prev_text'          => __( 'Previous page', 'supermart-ecommerce' ),
			                        'next_text'          => __( 'Next page', 'supermart-ecommerce' ),
			                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'supermart-ecommerce' ) . ' </span>',
			                    ) );
			                ?>
			                <div class="clearfix"></div>
			            </div>
					</section>
				</div>
			<?php } else { ?>
				<div class="row">
					<div class="content_area col-lg-8 col-md-8">
						<section id="post_section">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );
								endwhile;
								else :

									get_template_part( 'template-parts/post/content', 'none' );
								endif;
							?>
							<div class="navigation">
				                <?php
				                    // Previous/next page navigation.
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'supermart-ecommerce' ),
				                        'next_text'          => __( 'Next page', 'supermart-ecommerce' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'supermart-ecommerce' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?>
					</div>
				</div>
			<?php } ?>
		</main>
	</div>
</div>

<?php get_footer();