<?php
/**
 * The template for displaying WooCommerce pages.
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */

get_header(); 
?>
<div id="inner-content-wrapper" class="container page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
			
			<?php if (class_exists('WooCommerce') && is_woocommerce()) : ?>	
				<div><?php woocommerce_breadcrumb(); ?></div>
			<?php endif; ?>		
		
			<?php woocommerce_content(); ?>
			
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	if ( is_active_sidebar( 'sidebar-woocommerce' )) {
		get_template_part('sidebar', 'woocommerce');
	} ?>
</div><!-- .page-section -->
<?php
get_footer();
