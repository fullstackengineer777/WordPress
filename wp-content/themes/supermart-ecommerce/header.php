<?php
/**
 * The header for our theme
 *
 * @subpackage Supermart Ecommerce
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'supermart-ecommerce' ); ?></a>

<div id="header">
	<div class="row">
		<div class="col-lg-3 col-md-3 align-self-center">
			<div class="logo text-md-left text-center">
				<?php if ( has_custom_logo() ) : ?>
            		<?php the_custom_logo(); ?>
	            <?php endif; ?>
             	<?php if (get_theme_mod('supermart_ecommerce_show_site_title',true)) {?>
          			<?php $blog_info = get_bloginfo( 'name' ); ?>
	                <?php if ( ! empty( $blog_info ) ) : ?>
	                  	<?php if ( is_front_page() && is_home() ) : ?>
	                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	                  	<?php else : ?>
                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  		<?php endif; ?>
	                <?php endif; ?>
	            <?php }?>
			</div>
		</div>
		<div class="col-lg-9 col-md-9">
			<div class="sale-banner">
				<div class="row">
					<div class="col-lg-9 col-md-8 text-md-left text-center align-self-center">
						<?php if(get_theme_mod('supermart_ecommerce_sale_text') != '') {?>
							<p class="sale-text mb-md-0"><?php echo esc_html(get_theme_mod('supermart_ecommerce_sale_text')) ?></p>
						<?php }?>
					</div>
					<div class="col-lg-3 col-md-4 text-md-right text-center align-self-center">
						<?php if(get_theme_mod('supermart_ecommerce_shop_btn') != '') {?>
							<a class="shop-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_shop_page_id') ) ); ?>"><?php echo esc_html(get_theme_mod('supermart_ecommerce_shop_btn')); ?><i class="fas fa-arrow-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('supermart_ecommerce_shop_btn')); ?></span></a>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="middle header">
				<div class="row">
					<div class="col-lg-4 col-md-7 col-9 align-self-center">
			            <?php if (get_theme_mod('supermart_ecommerce_show_tagline',true)) {?>
			                <?php $description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) : ?>
			                  	<p class="site-description"><?php echo esc_html($description); ?>            	</p>
		              		<?php endif; ?>
		          		<?php }?>
					</div>
					<div class="col-lg-8 col-md-5 col-3">
						<div class="menu-bar">
							<div class="toggle-menu responsive-menu">
								<?php if(has_nav_menu('primary')){ ?>
					            	<button onclick="supermart_ecommerce_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','supermart-ecommerce'); ?></span></button>
					            <?php }?>
					        </div>
							<div id="sidelong-menu" class="nav sidenav">
				                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'supermart-ecommerce' ); ?>">
				                  	<?php if(has_nav_menu('primary')){
					                    wp_nav_menu( array( 
											'theme_location' => 'primary',
											'container_class' => 'main-menu-navigation clearfix' ,
											'menu_class' => 'clearfix',
											'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
											'fallback_cb' => 'wp_page_menu',
					                    ) ); 
				                  	} ?>
				                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="supermart_ecommerce_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','supermart-ecommerce'); ?></span></a>
				                </nav>
				            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-3 col-md-4">
		<?php if(class_exists('woocommerce')){ ?>
			<div class="sidebar-category pl-3 mt-3">
				<div class="categry-header"><span><?php echo esc_html_e('Category','supermart-ecommerce'); ?></span></div>
				<div class="cat-drop">
					<?php
						$args = array(
						    'orderby'    => 'title',
						    'order'      => 'ASC',
						    'hide_empty' => 0,
						    'parent'  => 0
						);
						$supermart_ecommerce_product_categories = get_terms( 'product_cat', $args );
						$count = count($supermart_ecommerce_product_categories);
						if ( $count > 0 ){
						    foreach ( $supermart_ecommerce_product_categories as $supermart_ecommerce_product_category ) {
					    		$ecommerce_cat_id   = $supermart_ecommerce_product_category->term_id;
								$cat_link = get_category_link( $ecommerce_cat_id );
								$thumbnail_id = get_term_meta( $supermart_ecommerce_product_category->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
								$image = wp_get_attachment_url( $thumbnail_id );
						    	if ($supermart_ecommerce_product_category->category_parent == 0) {
						    		?>
									<li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $supermart_ecommerce_product_category ) ); ?>">
									 	<?php
									if ( $image ) {
										echo '<img class="thumd_img" src="' . esc_url( $image ) . '" alt="" />';
									}
									echo esc_html( $supermart_ecommerce_product_category->name ); ?></a><i class="fas fa-caret-down"></i></li>
								<?php }
								$supermart_ecommerce_child_args = array(
					              	'taxonomy' => 'product_cat',
					              	'hide_empty' => false,
				              		'parent'   => $supermart_ecommerce_product_category->term_id
					          	);
						  		$supermart_ecommerce_child_product_cats = get_terms( $supermart_ecommerce_child_args );
						  		foreach ($supermart_ecommerce_child_product_cats as $supermart_ecommerce_child_product_cat){
						    		echo '<li><a href="'.esc_url(get_term_link($supermart_ecommerce_child_product_cat->term_id)).'">'. esc_html( $supermart_ecommerce_child_product_cat->name ).'</a><i class="fas fa-caret-down"></i></li>';
						  		}
							}
						}
					?>
				</div>
			</div>
		<?php }?>
	</div>
	<div class="col-lg-9 col-md-8 pl-md-0">
		<div class="bottom-header">
			<div class="row">
				<div class="col-lg-7 col-md-12 align-self-center">
					<?php if(class_exists('woocommerce')){ ?>
			            <div class="search-box">
							<?php if(class_exists('woocommerce')){ ?>
								<?php get_product_search_form()?>
							<?php }?> 
						</div>
					<?php }?>
		        </div>
		        <div class="col-lg-3 col-md-10 phone text-md-right text-center align-self-center py-1">
		        	<?php if(get_theme_mod('supermart_ecommerce_phone_no') != ''){ ?>
		        		<a href="tel:<?php echo esc_attr(get_theme_mod('supermart_ecommerce_phone_no')); ?>"><?php echo esc_html(get_theme_mod('supermart_ecommerce_phone_no')); ?><i class="fas fa-phone ml-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('supermart_ecommerce_phone_no')); ?></span></a>
		        	<?php }?>
		        </div>
		        <div class="col-lg-1 col-md-1 col-6 cart_icon text-md-center text-right align-self-center">
		        	<?php if(class_exists('woocommerce')){ ?>
				        <a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-cart"></i></a>
			            <li class="cart_box">
			              	<span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
			            </li>
					<?php }?>
			    </div>
			    <div class="col-lg-1 col-md-1 col-6 myaccount-icon text-md-center text-left align-self-center">
			    	<?php if(class_exists('woocommerce')){ ?>
			    		<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'MyAccount', 'supermart-ecommerce' ); ?></span></a>
			    	<?php }?>
			    </div>
			</div>
		</div>

		<?php if(is_singular()) {?>
			<div id="inner-pages-header">
			    <div class="header-content py-2">
				    <div class="container"> 
				      	<h1><?php single_post_title(); ?></h1>
			      	</div>
		      	</div>
		      	<div class="theme-breadcrumb py-2">
		      		<div class="container">
						<?php supermart_ecommerce_breadcrumb();?>
					</div>
				</div>
			</div>
		<?php } ?>