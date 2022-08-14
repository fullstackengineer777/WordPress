<?php
/*
 * Display product categories
 */
if (!class_exists('WooCommerce')) return;

class ecommerce_wp_contact_widget extends WC_Widget {

		function __construct() {
		
				$this->widget_cssclass    = 'woocommerce contact_widget';
				$this->widget_description = __( 'Display contact links in theme options -> contact', 'ecommerce-wp' );
				$this->widget_id          = 'ecommerce_wp_contact_widget';
				$this->widget_name        = __( '+ Contact Details', 'ecommerce-wp' );
		
				parent::__construct();
				
		}

		// Creating widget front-end
		public function widget($args, $instance) {
			$options  = ecommerce_wp_get_theme_options();
			?>
			
			<div class="top-bar-left">
			  <ul class="infobox_header_wrapper">
				<?php if ($options['contact_section_phone'] !='') { ?><li> <i class="fa fa-phone"></i><?php echo esc_html($options['contact_section_phone']); ?></li> <?php } ?>
				<?php if ($options['contact_section_email'] !='') { ?><li> <i class="fa fa-envelope"></i><?php echo esc_html($options['contact_section_email']); ?></li> <?php } ?>
				<?php if ($options['contact_section_address'] !='') { ?><li> <i class="fa fa-map-marker"></i><?php echo esc_html($options['contact_section_address']); ?></li> <?php } ?>
				<?php if ($options['contact_section_hours'] !='') { ?><li> <i class="fa fa-clock-o"></i><?php echo esc_html($options['contact_section_hours']); ?></li> <?php } ?>
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


function ecommerce_wp_contact_widget() {
		register_widget('ecommerce_wp_contact_widget');
}
add_action('widgets_init', 'ecommerce_wp_contact_widget');





