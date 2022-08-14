<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif;
wp_head();			
$ecommerce_wp_options  = ecommerce_wp_get_theme_options(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ecommerce-wp' ); ?></a>
<div class="menu-overlay"></div>

	<header id="masthead" class="site-header <?php //echo esc_attr(ecommerce_wp_get_header_style()); ?>" role="banner">

		<?php
		
		do_action('ecommerce_wp_top_bar');
			
		if ($ecommerce_wp_options['site_header_layout'] == 'storefront' && class_exists('WooCommerce')) { ?>
		
			<div  class="header-storefront">
				<div class="container">

					<div class="row vertical-center">
						<div class="col-md-4 col-sm-12 col-xs-12">
						<?php do_action('ecommerce_wp_branding'); ?>
						</div>
						
						<div class="col-md-5 col-sm-12 col-xs-12 header-search-widget">
							<?php
                                //add ajax search widget if exist
								if ($ecommerce_wp_options['ajax_search'] && class_exists('DGWT_WC_Ajax_Search')) {
									?><div class="header-ajax-search-container"><?php
										echo do_shortcode(wp_kses_post('[wcas-search-form]'));
									?></div><?php
                                    //add product search widget if exist
								} else if (class_exists("WooCommerce")) {
									the_widget('ecommerce_wp_product_search_widget');
								} else {
                                    //otherwise add default WordPress search widget
                                    the_widget('WP_Widget_Search');
                                }
							?>
						</div>
						
						<div class="col-md-3 col-sm-12 col-xs-12 header-woocommerce-icons">
							<?php the_widget('ecommerce_wp_cart_wishlist_acc_widget'); ?>
						</div>
					</div>
				
				</div>
			</div>
			
			<div id="theme-header" class="header-storefront menu">
				<div class="container">
					<?php do_action('ecommerce_wp_toggle'); ?>
					<?php do_action('ecommerce_wp_navigation'); ?>
				</div>
			</div>
			
		<?php } elseif ($ecommerce_wp_options['site_header_layout'] == 'bannerad') { ?>
				
		
			<div  class="header-storefront">
				<div class="container">

					<div class="row vertical-center">
						<div class="col-md-4 col-sm-12 col-xs-12">
						<?php do_action('ecommerce_wp_branding'); ?>
						</div>
						
						<div class="col-md-8 col-sm-12 col-xs-12 header-ad-widget  text-center">
							<?php
								if (is_active_sidebar( 'sidebar-ad' ) ) {
									dynamic_sidebar( 'sidebar-ad' );
								} 
							?>
						</div>

					</div>
				
				</div>
			</div>
			
			<div id="theme-header" class="header-storefront menu">
				<div class="container">
					<?php do_action('ecommerce_wp_toggle'); ?>
					<?php do_action('ecommerce_wp_navigation'); ?>
				</div>
			</div>
			
		<?php } else { ?>	
		
			<div id="theme-header" class="header-default">
				<div class="container">
					<?php do_action('ecommerce_wp_toggle'); ?>
					<?php do_action('ecommerce_wp_branding'); ?>
					<?php do_action('ecommerce_wp_navigation'); ?>
				</div>
			</div>	
						
		<?php } ?>
		
</header><!-- #masthead -->

<div id="content" class="site-content">

<?php


if ($ecommerce_wp_options['breadcrumb_show'] && !is_front_page()) :

	$ecommerce_wp_header_image = $ecommerce_wp_options['breadcrumb_image'];

	if ( is_singular() ) :
		$ecommerce_wp_header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $ecommerce_wp_options['breadcrumb_image'];
	endif;
	?>
	
	<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $ecommerce_wp_header_image ); ?>');">
		<div class="overlay"></div>
		<div class="container">
			<header class="page-header">
				<h2 class="page-title"><?php echo esc_html(ecommerce_wp_custom_header_banner_title()); ?></h2>
			</header>
	
			<?php ecommerce_wp_add_breadcrumb(); ?>
		</div><!-- .wrapper -->
	</div><!-- #page-site-header -->
	<?php
	//end header image
endif;
