<?php
/*
 * Display product categories
 */
if (!class_exists('WooCommerce')) return;

class ecommerce_wp_product_category_widget extends WC_Widget {

		function __construct() {
		
				$this->widget_cssclass    = 'woocommerce product_category_widget';
				$this->widget_description = __( 'Display product categories as colums.', 'ecommerce-wp' );
				$this->widget_id          = 'ecommerce_wp_product_category_widget';
				$this->widget_name        = __( '+ Product Category Carousel | Grid', 'ecommerce-wp' );
		
				parent::__construct();
				
		}

		// Creating widget front-end
		public function widget($args, $instance) {				
				
						
				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 12;
				$category_id = (!empty($instance['category_id'])) ? absint($instance['category_id']) : '';
				$slider = (!empty($instance['slider'])) ? wp_strip_all_tags($instance['slider']) : false;
				$colums = (!empty($instance['colums'])) ? wp_strip_all_tags($instance['colums']) : "col-md-2 col-sm-2 col-lg-2 col-xs-6";
				$min_height = (!empty($instance['min_height'])) ? absint($instance['min_height']) : 250;
				$image_height = (!empty($instance['image_height'])) ? absint($instance['image_height']) : 200;
				$slider_speed = (!empty($instance['slider_speed'])) ? absint($instance['slider_speed']) : 4;

				$operator = 'IN';
				
				$product_args = array();
				
				
				if( $category_id ) {
					$product_args = array(
							'post_type' => 'product',
							'post_status' => 'publish',
							'posts_per_page' => $max_items,
							'tax_query' => array(
									array(
											'taxonomy' => 'product_cat',
											'terms' => $category_id,
											'operator' => $operator,
									)
							)
					);				
				
				} else {
					$product_args = array(	'post_type' => 'product',    
											'post_status' => 'publish',
    										'posts_per_page' => $max_items );			
				}

				if($slider) {
					ecommerce_wp_product_slider_grid($product_args, $image_height, $colums, $slider_speed , $min_height, $slider);
				} else {
					ecommerce_wp_product_slider_grid($product_args, $image_height, $colums, $slider_speed , $min_height, false);
				}

				echo $args['after_widget'];
							
		}

		public function form($instance) {
				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 12;
				$category_id = (!empty($instance['category_id'])) ? absint($instance['category_id']) : '';
				$slider = (!empty($instance['slider'])) ? wp_strip_all_tags($instance['slider']) : false;
				$colums = (!empty($instance['colums'])) ? wp_strip_all_tags($instance['colums']) : "col-md-2 col-sm-2 col-lg-2 col-xs-6";
				$min_height = (!empty($instance['min_height'])) ? absint($instance['min_height']) : 250;				
				$image_height = (!empty($instance['image_height'])) ? absint($instance['image_height']) : '';
				$slider_speed = (!empty($instance['slider_speed'])) ? absint($instance['slider_speed']) : 4;

				// Widget admin form
				
				$product_colums = array(
						"col-md-4 col-sm-4 col-lg-4 col-xs-6" 	=> 3,
						"col-md-3 col-sm-3 col-lg-3 col-xs-6" 	=> 4,
						"col-sm-2" 								=> 5,
						"col-md-2 col-sm-2 col-lg-2 col-xs-6" 	=> 6,
						
				);

				$args = array(
						'taxonomy' => 'product_cat',
						'orderby' => 'date',
						'order' => 'ASC',
						'show_count' => 1,
						'pad_counts' => 0,
						'hierarchical' => 0,
						'title_li' => '',
						'hide_empty' => 1,
				);

				$categories = get_categories($args);
				$category_list = '';
				if (0 == $category_id) {
						$category_list = $category_list . '<option value="0" Selected=selected>' . __('Any', 'ecommerce-wp') . '</option>';
				}
				else {
						$category_list = $category_list . '<option value="0">' . __('Any', 'ecommerce-wp') . '</option>';
				}
				foreach ($categories as $cat) {
						$selected = '';
						if (($cat->term_id) == $category_id) {
								$selected = 'Selected=selected';
						}
						$category_list = $category_list . '<option value="' . esc_attr($cat->term_id) . '" ' . $selected . ' >' . esc_html($cat->name) . '</option>';
				}
				?>
				
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('category_id')); ?>"><?php esc_html_e('Select Product Category:', 'ecommerce-wp'); ?></label> 
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('category_id')); ?>" name="<?php echo esc_attr($this->get_field_name('category_id')); ?>" type="text">
				<?php echo $category_list; ?>
				</select>
				</p>
								
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('max_items')); ?>"><?php esc_html_e('Max Items to show:', 'ecommerce-wp'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('max_items')); ?>" name="<?php echo esc_attr($this->get_field_name('max_items')); ?>" type="number" value="<?php echo esc_attr($max_items); ?>" />
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
				<input class="checkbox" type="checkbox" <?php if ($slider) { echo " checked ";} ?> id="<?php echo esc_attr($this->get_field_id('slider')); ?>" name="<?php echo esc_attr($this->get_field_name('slider')); ?>" />
				<label for="<?php echo esc_attr($this->get_field_id('slider')); ?>"><?php esc_html_e('Display Products as a Carousal', 'ecommerce-wp'); ?></label> 
				</p>
				
				<p>
				
				<span><strong><?php esc_html_e('Custom Styles:', 'ecommerce-wp'); ?></strong></span><hr />
				
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('slider_speed (Seconds)')); ?>"><?php esc_html_e('Slider Speed (Seconds):', 'ecommerce-wp'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('slider_speed')); ?>" name="<?php echo esc_attr($this->get_field_name('slider_speed')); ?>" type="number" value="<?php echo absint($slider_speed); ?>" />
				</p>
				
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('min_height')); ?>"><?php esc_html_e('Product Minimum Height (px):', 'ecommerce-wp'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('min_height')); ?>" name="<?php echo esc_attr($this->get_field_name('min_height')); ?>" type="number" value="<?php echo esc_attr($min_height); ?>" />
				</p>
				
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('image_height')); ?>"><?php esc_html_e('Image Height (px):', 'ecommerce-wp'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_height')); ?>" name="<?php echo esc_attr($this->get_field_name('image_height')); ?>" type="number" value="<?php echo absint($image_height); ?>" />
				</p>	
				
				<p><strong><?php esc_html_e('Unlimited product slider and more options, Go Pro...', 'ecommerce-wp'); ?></strong></p>

		<?php
		}

		public function update($new_instance, $old_instance) {
				$instance = array();
				$instance['max_items'] = (!empty($new_instance['max_items'])) ? absint($new_instance['max_items']) : '';
				$instance['category_id'] = (!empty($new_instance['category_id'])) ? absint($new_instance['category_id']) : '';
				$instance['slider'] = (!empty($new_instance['slider'])) ? wp_strip_all_tags($new_instance['slider']) : '';
				$instance['colums'] = (!empty($new_instance['colums'])) ? wp_strip_all_tags($new_instance['colums']) : '';
				$instance['image_height'] = (!empty($new_instance['image_height'])) ? absint($new_instance['image_height'])  : '' ;		
				$instance['slider_speed'] = (!empty($new_instance['slider_speed'])) ? absint($new_instance['slider_speed'])  : '' ;
				return $instance;
		}
}


function ecommerce_wp_product_category_widget() {
		register_widget('ecommerce_wp_product_category_widget');
}
add_action('widgets_init', 'ecommerce_wp_product_category_widget');