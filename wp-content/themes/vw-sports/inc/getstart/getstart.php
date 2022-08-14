<?php
//about theme info
add_action( 'admin_menu', 'vw_sports_gettingstarted' );
function vw_sports_gettingstarted() {
	add_theme_page( esc_html__('About VW Sports', 'vw-sports'), esc_html__('About VW Sports', 'vw-sports'), 'edit_theme_options', 'vw_sports_guide', 'vw_sports_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_sports_admin_theme_style() {
	wp_enqueue_style('vw-sports-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('vw-sports-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_sports_admin_theme_style');

//guidline for about theme
function vw_sports_mostrar_guide() { 
	//custom function about theme customizer
	$vw_sports_return = add_query_arg( array()) ;
	$vw_sports_theme = wp_get_theme( 'vw-sports' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Sports', 'vw-sports' ); ?> <span class="version"><?php esc_html_e( 'Version', 'vw-sports' ); ?>: <?php echo esc_html($vw_sports_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-sports'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Sports at 20% Discount','vw-sports'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-sports'); ?> ( <span><?php esc_html_e('vwpro20','vw-sports'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_SPORTS_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-sports' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="vw_sports_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-sports' ); ?></button>
			<button class="tablinks" onclick="vw_sports_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-sports' ); ?></button>
			<button class="tablinks" onclick="vw_sports_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-sports' ); ?></button>
			<button class="tablinks" onclick="vw_sports_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-sports' ); ?></button>
			<button class="tablinks" onclick="vw_sports_open_tab(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'vw-sports' ); ?></button>
			<button class="tablinks" onclick="vw_sports_open_tab(event, 'lite_pro')"><?php esc_html_e( 'Support', 'vw-sports' ); ?></button>
		</div>

		<?php
			$vw_sports_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_sports_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Sports_Plugin_Activation_Settings::get_instance();
				$vw_sports_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-sports-recommended-plugins">
				    <div class="vw-sports-action-list">
				        <?php if ($vw_sports_actions): foreach ($vw_sports_actions as $key => $vw_sports_actionValue): ?>
				                <div class="vw-sports-action" id="<?php echo esc_attr($vw_sports_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_sports_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_sports_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_sports_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-sports'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_sports_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-sports' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Create a highly dynamic and incredibly professional website for a sports club using this Free Sports WordPress Theme. Using this readymade theme, you can hammer out a web page for representing any sports such as soccer, football, basketball, tennis, badminton, motorsports, or any other sports. Sportspersons may also find this theme useful to show their profession online. It is a top-notch theme with modern quality and expertly written codes making your site perform well under any circumstances and take the user experience to the next level. Its design is currently trending as it very well shows the details right in front and visitors will find it easy to navigate on your website as it comprises simple menus. With some fantastic customization options for changing the default colors given in the color palette, Font Awesome integration with 100+ typography options will give you a chance to at least give some fresh look.','vw-sports'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-sports' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-sports' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_SPORTS_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-sports' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-sports'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-sports'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-sports'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-sports'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-sports'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_SPORTS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-sports'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-sports'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-sports'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_SPORTS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-sports'); ?></a>
					</div>
					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-sports' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-sports'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-sports'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-sports'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_services') ); ?>" target="_blank"><?php esc_html_e('Game Section','vw-sports'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-sports'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-sports'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-sports'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-sports'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-sports'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-sports'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-sports'); ?></span><?php esc_html_e(' Go to ','vw-sports'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-sports'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-sports'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-sports'); ?></span><?php esc_html_e(' Go to ','vw-sports'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-sports'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-sports'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','vw-sports'); ?> <a class="doc-links" href="<?php echo esc_url( VW_SPORTS_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','vw-sports'); ?></a></p>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Sports_Plugin_Activation_Settings::get_instance();
			$vw_sports_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-sports-recommended-plugins">
				    <div class="vw-sports-action-list">
				        <?php if ($vw_sports_actions): foreach ($vw_sports_actions as $key => $vw_sports_actionValue): ?>
				                <div class="vw-sports-action" id="<?php echo esc_attr($vw_sports_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_sports_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_sports_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_sports_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-sports'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_sports_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-sports' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-sports'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-sports'); ?></span></b></p>
	              	<div class="vw-sports-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-sports'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-sports' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-sports'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-sports'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-sports'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-sports'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-sports'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-sports'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Sports_Plugin_Activation_Settings::get_instance();
			$vw_sports_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-sports-recommended-plugins">
				    <div class="vw-sports-action-list">
				        <?php if ($vw_sports_actions): foreach ($vw_sports_actions as $key => $vw_sports_actionValue): ?>
				                <div class="vw-sports-action" id="<?php echo esc_attr($vw_sports_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_sports_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_sports_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_sports_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-sports' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-sports-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-sports'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-sports' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-sports'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-sports'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-sports'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-sports'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_sports_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-sports'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-sports'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Sports_Plugin_Activation_Woo_Products::get_instance();
				$vw_sports_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-sports-recommended-plugins">
					    <div class="vw-sports-action-list">
					        <?php if ($vw_sports_actions): foreach ($vw_sports_actions as $key => $vw_sports_actionValue): ?>
					                <div class="vw-sports-action" id="<?php echo esc_attr($vw_sports_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_sports_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_sports_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_sports_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-sports' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-sports-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-sports'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-sports'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-sports'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-sports'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-sports'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-sports'); ?></span></b></p>
	              	<div class="vw-sports-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-sports'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-sports'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="pro_theme" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-sports' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('As sports is attached to sentiments, your sports website should be able to create the thrill and excitement when someone views it. This Sports WordPress Theme is designed to generate such exciting sports websites. Whether you are a sports enthusiast who wants to show your passion for your favorite sports team or a sports journalist who wants to start a sports-related blog; this theme offers you endless possibilities to set up any kind of website dedicated to sports. WP Sports WordPress Theme has exciting colors and imagery that will match perfectly to the purpose. Its retina-ready full-width slider clearly shows the passion for sports through the display of stunning images presented in the form of the slide show. Well-placed Call To Action (CTA) buttons play a key role in improving conversions along with adding interactive parts to your site. Sports clubs can also utilize its design to make their online appearance in style.','vw-sports'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_SPORTS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-sports'); ?></a>
					<a href="<?php echo esc_url( VW_SPORTS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-sports'); ?></a>
					<a href="<?php echo esc_url( VW_SPORTS_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-sports'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-sports' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-sports'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-sports'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-sports'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-sports'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-sports'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-sports'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-sports'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-sports'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-sports'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-sports'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-sports'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-sports'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-sports'); ?></td>
								<td class="table-img"><?php esc_html_e('16', 'vw-sports'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-sports'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-sports'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-sports'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-sports'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-sports'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-sports'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-sports'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_SPORTS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-sports'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="lite_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-sports'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-sports'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPORTS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-sports'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-sports'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-sports'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPORTS_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-sports'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-sports'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-sports'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPORTS_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-sports'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-sports'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-sports'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPORTS_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-sports'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-sports'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-sports'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPORTS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-sports'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>

<?php } ?>