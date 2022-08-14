<?php
//about theme info
add_action( 'admin_menu', 'supermart_ecommerce_gettingstarted' );
function supermart_ecommerce_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'supermart-ecommerce'), esc_html__('About Theme', 'supermart-ecommerce'), 'edit_theme_options', 'supermart_ecommerce_guide', 'supermart_ecommerce_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function supermart_ecommerce_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'supermart_ecommerce_admin_theme_style');

//guidline for about theme
function supermart_ecommerce_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'supermart-ecommerce' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Software Company WordPress Theme', 'supermart-ecommerce' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'supermart-ecommerce' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'supermart-ecommerce' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'supermart-ecommerce' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'supermart-ecommerce' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'supermart-ecommerce' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'supermart-ecommerce' ); ?> <a href="<?php echo esc_url( SUPERMART_ECOMMERCE_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'supermart-ecommerce' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'Supermarket Ecommerce is a freshly designed WP theme for a stunning online store that can sell apparel, fashion accessories. Cosmetics, jewelry, grocery, clothing, electric appliances, gadgets, mobile phones, sports equipment, etc online. Its layout suits best for any kind of online store as it has Woocommerce compatibility. With its minimal and elegant layout stealing the show, its retina-ready design and responsive layout make it more sophisticated and apt for the purpose. This beautiful theme is crafted using secure and clean codes that are also optimized resulting in a lightweight design giving faster page loading time. It is crafted by professional developers and includes personalization options for easy customization making the design extremely user-friendly. The HTML codes written are made SEO friendly so that you can get easily spotted by the audience and receive more traffic on your website. The conversion part is taken care of by the Call to Action Button (CTA). a beautiful slider, banner, and various sections compose the complete theme. Social media options are also included that can encourage social sharing and extend your business’s reach. This theme is Bootstrap based making the entire design powerful and it also makes the content available in different languages by providing translation-ready options.', 'supermart-ecommerce')?></p>
			<hr>
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Supermarket Ecommerce Theme', 'supermart-ecommerce' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'supermart-ecommerce'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( SUPERMART_ECOMMERCE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'supermart-ecommerce'); ?></a>
			<a href="<?php echo esc_url( SUPERMART_ECOMMERCE_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'supermart-ecommerce'); ?></a>
			<a href="<?php echo esc_url( SUPERMART_ECOMMERCE_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'supermart-ecommerce'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/supermart-ecommerce.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'supermart-ecommerce'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'supermart-ecommerce'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'supermart-ecommerce'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>