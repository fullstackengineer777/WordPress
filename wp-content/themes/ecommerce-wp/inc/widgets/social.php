<?php
/*
 * Display product categories
 */
if (!class_exists('WooCommerce')) return;

class ecommerce_wp_social_widget extends WC_Widget {

		function __construct() {
		
				$this->widget_cssclass    = 'woocommerce social_widget';
				$this->widget_description = __( 'Display social links in theme options -> social', 'ecommerce-wp' );
				$this->widget_id          = 'ecommerce_wp_social_widget';
				$this->widget_name        = __( '+ Social Icons', 'ecommerce-wp' );
		
				parent::__construct();
				
		}

		// Creating widget front-end
		public function widget($args, $instance) {
			$options  = ecommerce_wp_get_theme_options();
			?>
        
			<div id="top-social-right" class="header_social_links">
			  <ul>
				<?php if ($options['social_whatsapp_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_whatsapp_link']); ?>" class="social_links_header_4 whatsapp" target="_blank"> <span class="ts-icon"> <i class="fa fa-whatsapp"></i> </a></li> <?php } ?>
				<?php if ($options['social_pinterest_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_pinterest_link']); ?>" class="social_links_header_6 pinterest" target="_blank"> <span class="ts-icon"> <i class="fa fa-pinterest"></i> </a></li> <?php } ?>            
				<?php if ($options['social_instagram_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_instagram_link']); ?>" class="social_links_header_2 instagram" target="_blank"> <span class="ts-icon"> <i class="fa fa-instagram"></i> </a></li> <?php } ?>
				<?php if ($options['social_youtube_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_youtube_link']); ?>" class="social_links_header_3 youtube" target="_blank"> <span class="ts-icon"> <i class="fa fa-youtube"></i> </a></li> <?php } ?>
				<?php if ($options['social_linkdin_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_linkdin_link']); ?>" class="social_links_header_5 linkedin" target="_blank"> <span class="ts-icon"> <i class="fa fa-linkedin"></i> </a></li> <?php } ?>
				<?php if ($options['social_twitter_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_twitter_link']); ?>" class="social_links_header_1 twitter" target="_blank"> <span class="ts-icon"> <i class="fa fa-twitter"></i> </a></li> <?php } ?>
				<?php if ($options['social_facebook_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_facebook_link']); ?>" class="social_links_header_0 facebook" target="_blank"> <span class="ts-icon"> <i class="fa fa-facebook"></i> </a></li> <?php } ?>
			  </ul>
			</div>
		
		<?php
		}

		public function form($instance) { }

		public function update($new_instance, $old_instance) {
				$instance = array();
				return $instance;
		}
}


function ecommerce_wp_social_widget() {
		register_widget('ecommerce_wp_social_widget');
}
add_action('widgets_init', 'ecommerce_wp_social_widget');





