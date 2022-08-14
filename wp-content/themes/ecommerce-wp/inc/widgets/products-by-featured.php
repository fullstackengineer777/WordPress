<?php
/*
 * Widget to display woocommerce products by feature
 */
if (!class_exists('WooCommerce')) return;

class ecommerce_wp_product_carousel_grid_widget extends WC_Widget {

		function __construct() {
			
				$this->widget_cssclass    = 'woocommerce ecommerce_wp_products_carousel_grid_widget';
				$this->widget_description = __( 'Display Products by Feature', 'ecommerce-wp' );
				$this->widget_id          = 'ecommerce_wp_product_carousel_grid_widget';
				$this->widget_name        = __( '+ Product Carousel | Grid', 'ecommerce-wp' );
		
				parent::__construct();

		}

		// Creating widget front-end
		public function widget($args, $instance) {
		

				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 12;
				$slider = (!empty($instance['slider'])) ? wp_strip_all_tags($instance['slider']) : '';
				$feature = (!empty($instance['feature'])) ? wp_strip_all_tags($instance['feature']) : "";
				$colums = (!empty($instance['colums'])) ? wp_strip_all_tags($instance['colums']) : "col-md-2 col-sm-2 col-lg-2 col-xs-6";
				$min_height = (!empty($instance['min_height'])) ? absint($instance['min_height']) : 250;
				$image_height = (!empty($instance['image_height'])) ? absint($instance['image_height']) : 200;
				$slider_speed = (!empty($instance['slider_speed'])) ? absint($instance['slider_speed']) : 4;
						
				$order = 'DESC';
				if($feature == 'price-low') {
					$order = 'ASC';
				}
								
				/* This run the code and display the output
				 * $feature :- '' = All, featured, best-selling, on-sale, top-rated, price */
				$product_args = ecommerce_wp_get_product_args($max_items, $feature, $order);
								
				if($slider) {
					ecommerce_wp_product_slider_grid($product_args, $image_height, $colums, $slider_speed, $min_height);
				} else {
					ecommerce_wp_product_slider_grid($product_args, $image_height, $colums, $slider_speed, $min_height, false);
				}
				
			
		}

		// Widget Backend
		public function form($instance) {
				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 12;
				$slider = (!empty($instance['slider'])) ? wp_strip_all_tags($instance['slider']) : '';
				$feature = (!empty($instance['feature'])) ? wp_strip_all_tags($instance['feature']) : "";
				$colums = (!empty($instance['colums'])) ? wp_strip_all_tags($instance['colums']) : "col-md-2 col-sm-2 col-lg-2 col-xs-6";
				$min_height = (!empty($instance['min_height'])) ? absint($instance['min_height']) : 250;
				$image_height = (!empty($instance['image_height'])) ? absint($instance['image_height']) : '';
				$slider_speed = (!empty($instance['slider_speed'])) ? absint($instance['slider_speed']) : 4;
				
				$item_types = array(
						"featured" => __('Featured', 'ecommerce-wp'),
						"best-selling" => __('Best Selling', 'ecommerce-wp'),
						"top-rated" => __('Top Rated', 'ecommerce-wp'),
						"on-sale" => __('On Sale', 'ecommerce-wp'),
						"latest" => __('Latest', 'ecommerce-wp'),
						"price" => __('Price (Height to low)', 'ecommerce-wp'),
						"price-low" => __('Price (Low to height)', 'ecommerce-wp'),
				);

				$product_colums = array(
				
						"col-md-4 col-sm-4 col-lg-4 col-xs-6" => 3,
						"col-md-3 col-sm-3 col-lg-3 col-xs-6" => 4,
						"col-sm-2" => 5,
						"col-md-2 col-sm-2 col-lg-2 col-xs-6" => 6,
						
				);


				?>
				
												
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('feature')); ?>"><?php esc_html_e('Select Product Type:', 'ecommerce-wp'); ?></label> 
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('feature')); ?>" name="<?php echo esc_attr($this->get_field_name('feature')); ?>" type="text">
				<option value="" Selected=selected><?php esc_html_e('All', 'ecommerce-wp'); ?></option>
				<?php
						foreach ($item_types as $key => $value) {
								if ($key == $feature) {
										echo '<option value="' . esc_attr($key) . '" Selected=selected>' . esc_html($value) . '</option>';
								}
								else {
										echo '<option value="' . esc_attr($key) . '" >' . esc_html($value) . '</option>';
								}
						}
				?>
				</select>
				</p>
						
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('colums')); ?>"><?php esc_html_e('Number of colums:', 'ecommerce-wp'); ?></label> 
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('colums')); ?>" name="<?php echo esc_attr($this->get_field_name('colums')); ?>" type="text">
				<?php
						foreach ($product_colums as $key => $value) {
								if ($key == $colums) {
										echo '<option value="' . esc_attr($key) . '" Selected=selected>' . esc_html($value) . '</option>';
								}
								else {
										echo '<option value="' . esc_attr($key) . '" >' . esc_html($value) . '</option>';
								}
						}
				?>
				</select>
				</p>
				
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('max_items')); ?>"><?php esc_html_e('Max Items to show:', 'ecommerce-wp'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('max_items')); ?>" name="<?php echo esc_attr($this->get_field_name('max_items')); ?>" type="number" value="<?php echo esc_attr($max_items); ?>" />
				</p>

								
				<p>
				<input class="checkbox" type="checkbox" <?php if ($slider) { echo " checked "; } ?> id="<?php echo esc_attr($this->get_field_id('slider')); ?>" name="<?php echo esc_attr($this->get_field_name('slider')); ?>" />
				<label for="<?php echo esc_attr($this->get_field_id('slider')); ?>"><?php esc_html_e('Display Products as a Carousal', 'ecommerce-wp'); ?></label> 
				</p>

				<span><strong><?php esc_html_e('Custom Styles:', 'ecommerce-wp'); ?></strong></span><hr />
				
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('min_height')); ?>"><?php esc_html_e('Product Minimum Height (px):', 'ecommerce-wp'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('min_height')); ?>" name="<?php echo esc_attr($this->get_field_name('min_height')); ?>" type="number" value="<?php echo esc_attr($min_height); ?>" />
				</p>
												
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('slider_speed')); ?>"><?php esc_html_e('Slider Speed (Seconds):', 'ecommerce-wp'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('slider_speed')); ?>" name="<?php echo esc_attr($this->get_field_name('slider_speed')); ?>" type="number" value="<?php echo esc_attr($slider_speed); ?>" />
				</p>

				<p>
				<label for="<?php echo esc_attr($this->get_field_id('image_height')); ?>"><?php esc_html_e('Image Height (px):', 'ecommerce-wp'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_height')); ?>" name="<?php echo esc_attr($this->get_field_name('image_height')); ?>" type="number" value="<?php echo esc_attr($image_height); ?>" />
				</p>
				
				<p><strong><?php esc_html_e('Unlimited products and more options, Go Pro...', 'ecommerce-wp'); ?></strong></p>
							
				
				<?php
				}

		// Updating widget replacing old instances with new
		public function update($new_instance, $old_instance) {
				$instance = array();
				$instance['feature'] = (!empty($new_instance['feature'])) ? wp_strip_all_tags($new_instance['feature'])  : '' ;
				$instance['colums'] = (!empty($new_instance['colums'])) ? wp_strip_all_tags($new_instance['colums'])  : '' ;
				$instance['max_items'] = (!empty($new_instance['max_items'])) ? absint($new_instance['max_items'])  : '' ;
				$instance['slider'] = (!empty($new_instance['slider'])) ? wp_strip_all_tags($new_instance['slider'])  : '' ;
				$instance['min_height'] = (!empty($new_instance['min_height'])) ? absint($new_instance['min_height'])  : '' ;
				$instance['image_height'] = (!empty($new_instance['image_height'])) ? absint($new_instance['image_height'])  : '' ;
				$instance['slider_speed'] = (!empty($new_instance['slider_speed'])) ? absint($new_instance['slider_speed'])  : '' ;
				
				return $instance;
		}
}

// Register and load the widget
function ecommerce_wp_product_carousel_grid_widget() {
		register_widget('ecommerce_wp_product_carousel_grid_widget');
}
add_action('widgets_init', 'ecommerce_wp_product_carousel_grid_widget');