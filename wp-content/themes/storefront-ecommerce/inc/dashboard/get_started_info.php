<?php

add_action( 'admin_menu', 'storefront_ecommerce_gettingstarted' );
function storefront_ecommerce_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'storefront-ecommerce'), esc_html__('About Theme', 'storefront-ecommerce'), 'edit_theme_options', 'storefront-ecommerce-guide-page', 'storefront_ecommerce_guide');   
}

function storefront_ecommerce_admin_theme_style() {
   wp_enqueue_style('storefront-ecommerce-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
}
add_action('admin_enqueue_scripts', 'storefront_ecommerce_admin_theme_style');

function storefront_ecommerce_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Storefront Ecommerce, you rock!', 'storefront-ecommerce' ) ?> </h2>
			<p><?php esc_html_e( 'Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional automobile website. Please Click on the link below to know the theme setup information.', 'storefront-ecommerce' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=storefront-ecommerce-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Getting Started', 'storefront-ecommerce' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'storefront_ecommerce_notice');

/**
 * Theme Info Page
 */
function storefront_ecommerce_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'storefront-ecommerce' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to Storefront Ecommerce', 'storefront-ecommerce' ); ?></h2>
						<p>Version: <?php echo esc_html($theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'storefront-ecommerce' ); ?>	
						</span>
						<div class="powered-by">
							<p><strong><?php esc_html_e( 'Theme created by Buy WP Templates', 'storefront-ecommerce' ); ?></strong></p>
							<p>
								<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/theme-logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( STOREFRONT_ECOMMERCE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'storefront-ecommerce'); ?></a>
						<a href="<?php echo esc_url( STOREFRONT_ECOMMERCE_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'storefront-ecommerce'); ?></a>
						<a href="<?php echo esc_url( STOREFRONT_ECOMMERCE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'storefront-ecommerce'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive1.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1). Setup Storefront Ecommerce Theme', 'storefront-ecommerce' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'Need a perfect and professional manager for your store who will effectively look upon all the services and products in a sequenced manner? WordPress Store Front E-Commerce theme will be the ideal destination for you where you can manage your store by just building your personalized website platform suitable for businesses like electronics, fashion stores, food and grocery market, clothing store, health and fitness studio, agriculture stores with many built-in responsive features in fewer efforts. WordPress themes will transform your offline market into a spacious digitized E-Commerce store with the help of Woo Commerce plugin feature. You will be provided with amazing, clean sleek and modern designed themes which will attract many visitors. Its elementary gallery slider feature will give a bang-on impression by displaying your services and product listing in a presentation format. Enriched with a clean coding system, you can intensify the website in just a few hours without having any coding skills. Also, its impacting colour schemes and designs will approach many visitors to stick on. Its RTL component will let you design the website in any suitable language of your choice with a user-friendly layout design which will fit onto any screen size very efficiently. So hurry and grab this opportunity!', 'storefront-ecommerce' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','storefront-ecommerce'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','storefront-ecommerce'); ?></a> <?php esc_html_e( 'your website.','storefront-ecommerce'); ?> </li>
							<li><?php esc_html_e( 'Storefront Ecommerce','storefront-ecommerce'); ?> <a target="_blank" href="<?php echo esc_url( STOREFRONT_ECOMMERCE_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','storefront-ecommerce'); ?></a> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
					<h2 class="dashboard-install-title"><?php esc_html_e( '2.) Premium Theme Information.','storefront-ecommerce'); ?></h2>
					<div class="row">
						<div class="col-md-7">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
							<div class="pad-box">
								<h3><?php esc_html_e( 'Pro Theme Description','storefront-ecommerce'); ?></h3>
	                    		<p class="pad-box-p"><?php esc_html_e( 'Storefront Ecommerce WordPress Theme comes with a simple yet enticing design as the design is the first thing that your visitors will notice. They will then explore your products and services. This theme puts together a great display of your products and is well combined with all the eCommerce features so that your buyers will get the best possible online purchasing experience. It is designed by experienced developers to give you a wonderful online store and this is made possible because of the Woocommece compliance with this theme. Along with online buying options for customers, you will be able to receive payments online. If you want to get a customized website, this Storefront Ecommerce WordPress Theme comes with many easy customization options included in the theme’s options panel. With these, you will get a personalized look for your store. You can also make the most out of its drag and drop page builder to create customized pages. It features a fully responsive design that will let your website look incredible on multiple devices. It is designed using Bootstrap delivering a powerful design. You will find many useful shortcodes and widgets in the theme. Storefront Ecommerce WordPress Theme can help you create the perfect online store that you have always wished for.', 'storefront-ecommerce' ); ?><p>
	                    	</div>
						</div>
						<div class="col-md-5 install-plugin-right">
							<div class="pad-box">								
								<h3><?php esc_html_e( 'Pro Theme Features','storefront-ecommerce'); ?></h3>
								<div class="dashboard-install-benefit">
									<ul>
										<li><?php esc_html_e( 'Car listing Shortcode with category','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Car listing Shortcode','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Multiple image feature for each property with slider.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Brand Listing Section','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Car Brand(categories) Option','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Car Tags(categories) Option','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Testimonial listing.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Testimonial shortcode.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Social icons widget.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Latest post with the image widget.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Live customize editor for the About US section.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Font Awesome integrated.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Advanced Color options and color pallets.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( '100+ Font Family Options.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Enable-Disable options on All sections.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Allow to set site title, tagline, logo.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Sticky post & Comment threads.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Left and Right Sidebar.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Customizable Home Page.','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Footer Widgets & Editor style','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Gallery & Banner functionality','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Multiple inner page templates','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Full-width Template','storefront-ecommerce'); ?></li>
										<li><?php esc_html_e( 'Custom Menu, Colors Editor','storefront-ecommerce'); ?></li>
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','storefront-ecommerce'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( STOREFRONT_ECOMMERCE_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','storefront-ecommerce'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( STOREFRONT_ECOMMERCE_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','storefront-ecommerce'); ?></a></li>
					</ol>
				</div>

				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','storefront-ecommerce'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','storefront-ecommerce'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','storefront-ecommerce'); ?></a> <?php esc_html_e( 'your website.','storefront-ecommerce'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','storefront-ecommerce'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( STOREFRONT_ECOMMERCE_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','storefront-ecommerce'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( STOREFRONT_ECOMMERCE_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','storefront-ecommerce'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','storefront-ecommerce'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( STOREFRONT_ECOMMERCE_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'storefront-ecommerce'); ?></a>
					</ol>
				</div>
			</div>
		</div>
	</div>

<?php }?>