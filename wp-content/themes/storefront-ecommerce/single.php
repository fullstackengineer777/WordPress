<?php
/**
 * The Template for displaying all single posts.
 * @package Storefront Ecommerce
 */
get_header(); ?>

<main id="skip_content" role="main">
	<div class="container">
	    <div class="main-wrapper py-4 px-0">
	    	<?php
            $storefront_ecommerce_layout_option = get_theme_mod( 'storefront_ecommerce_single_post_layout','Right Sidebar');
            if($storefront_ecommerce_layout_option == 'One Column'){ ?>
				<div class="content_box">
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/single-post' );
		            endwhile; // end of the loop. ?>
		       	</div>		    			
		    <?php }else if($storefront_ecommerce_layout_option == 'Left Sidebar'){ ?>
		    	<div class="row">
		    		<div id="sidebar" class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php dynamic_sidebar('sidebar-1'); ?></div>

					<div class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 content_box"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
						<?php while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/single-post' );
			            endwhile; // end of the loop. ?>
			       	</div>
		       	</div>
		    <?php }else if($storefront_ecommerce_layout_option == 'Right Sidebar'){ ?>
		    	<div class="row">
			       	<div class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 content_box"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
						<?php while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/single-post' );
			            endwhile; // end of the loop. ?>
			       	</div>
					<div id="sidebar" class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php } else {?>
				<div class="row">
			       	<div class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 content_box"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
						<?php while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/single-post' );
			            endwhile; // end of the loop. ?>
			       	</div>
					<div id="sidebar" class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php }?>
		    <div class="clearfix"></div>
	    </div>
	</div>
</main>

<?php get_footer(); ?>