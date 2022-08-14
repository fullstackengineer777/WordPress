<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="container main-wrapper py-4 px-0">
	<main role="main" id="skip_content">
		<div class="row m-0">
			<div class="background-img-skin <?php if( get_theme_mod( 'storefront_ecommerce_shop_sidebar_enable',true) != '' && get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8"<?php } elseif( get_theme_mod( 'storefront_ecommerce_shop_sidebar_enable',true) != '' && get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/4') { ?>col-lg-9 col-md-8 <?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
				<?php
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>

				<?php
					/**
					 * woocommerce_after_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>
			</div>
			<?php if( get_theme_mod( 'storefront_ecommerce_product_page_sidebar_enable',true) != '') { ?>
				<div class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>">
					<?php
						/**
						 * Hook: woocommerce_sidebar.
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						do_action( 'woocommerce_sidebar' );
					?>
				</div>
			<?php }?>
		</div>
	</main>
</div>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
