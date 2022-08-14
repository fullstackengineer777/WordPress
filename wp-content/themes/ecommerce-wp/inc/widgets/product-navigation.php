<?php
/*
 * display woocomemrce categories as menu
 */
if (!class_exists('WooCommerce')) return;

class ecommerce_wp_product_navigation_widget extends WC_Widget {

		function __construct() {
				
				$this->widget_cssclass    = 'woocommerce product_navigation_widget';
				$this->widget_description = __( 'Display product navigation through categories.', 'ecommerce-wp' );
				$this->widget_id          = 'ecommerce_wp_product_navigation_widget';
				$this->widget_name        = __( '+ Product Category Menu', 'ecommerce-wp' );
		
				parent::__construct();				
				
		}

		public function widget($args, $instance) {
					
			$title = (!empty($instance['title'])) ? strip_tags($instance['title']) : '';
			$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 20;
			$bg_color = (!empty($instance['bg_color'])) ? strip_tags($instance['bg_color']) : '#178dff';
			$text_color = (!empty($instance['text_color'])) ? strip_tags($instance['text_color']) : '#fff';

			  $args = array(
					 'taxonomy'     => 'product_cat',
					 'orderby'      => 'date',
					 'order'      	=> 'ASC',
					 'show_count'   => 1,
					 'pad_counts'   => 0,
					 'hierarchical' => 1,
					 'title_li'     => '',
					 'hide_empty'   => 1,
			  );
			 $all_categories = get_categories( $args );
			 $cat_count = 1;
			 echo '<div class="product-navigation">'; 	
				 echo '<ul>';
				 if($title){
					echo '<li class="navigation-name" style="background-color:'.esc_attr($bg_color).'"><a href="#" style="color:'.esc_attr($text_color).'"> <i class="fa fa-align-left"></i>&nbsp;&nbsp;'.esc_html($title).'</a></li>';
				 }
				 foreach ($all_categories as $cat) {
					 if($cat_count > $max_items){
						break;
					 }
					 $cat_count++;
				 
						if($cat->category_parent == 0) {
							$category_id = $cat->term_id; 
							$args2 = array(
									'taxonomy'     => 'product_cat',
									'child_of'     => 0,
									'parent'       => $category_id,
									'orderby'      => 'name',
									'show_count'   => 1,
									'pad_counts'   => 0,
									'hierarchical' => 1,
									'title_li'     => '',
									'hide_empty'   => 1,
							);
							$sub_cats = get_categories( $args2 );
							if($sub_cats && ecommerce_wp_extra_plugin()) {
							echo '<li class="has-sub"> <a href="'.esc_url(get_term_link($cat->slug, 'product_cat')).'">'.esc_html($cat->name).' ('.absint($cat->count).')</a>';
							echo '<ul>';
								foreach($sub_cats as $sub_category) {
									$sub_category_id = $sub_category->term_id;
									$args3 = array(
											'taxonomy'     => 'product_cat',
											'child_of'     => 0,
											'parent'       => $sub_category_id,
											'orderby'      => 'name',
											'show_count'   => 1,
											'pad_counts'   => 0,
											'hierarchical' => 1,
											'title_li'     => '',
											'hide_empty'   => 1,
									);
									$sub_sub_cats = get_categories( $args3 );
									if($sub_sub_cats) {
									echo '<li class="has-sub"> <a href="'.esc_url(get_term_link($sub_category->slug, 'product_cat')).'">'.esc_html($sub_category->name).' ('.absint($sub_category->count).')</a>';
										echo '<ul>';
											foreach($sub_sub_cats as $sub_sub_cat) {
												echo '<li> <a href="'.esc_url(get_term_link($sub_sub_cat->slug, 'product_cat')).'">'.esc_html($sub_sub_cat->name).' ('.absint($sub_sub_cat->count).')</a>';
											}
										echo '</ul>';						
									} else {
									echo '<li> <a href="'.esc_url(get_term_link($sub_category->slug, 'product_cat')) .'">'.esc_html($sub_category->name).' ('.absint($sub_category->count).')</a>';
									}
								}
							echo '</ul>'; 
							} else {
								echo '<li> <a href="'.esc_url(get_term_link($cat->slug, 'product_cat')).'">'.esc_html($cat->name).' ('.absint($cat->count).')</a>';
							}
						}		      
				 } /* end for each */
				 echo '</ul>';
			 echo '</div>';

				
		}

		public function form($instance) {
				$title = (!empty($instance['title'])) ? strip_tags($instance['title']) : '';
				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 20;
				
				$text_color = (!empty($instance['text_color'])) ? strip_tags($instance['text_color']) : '#ffffff';
				$bg_color = (!empty($instance['bg_color'])) ? strip_tags($instance['bg_color']) : '#178dff';
			
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'ecommerce-wp'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('max_items')); ?>"><?php esc_html_e('Max Items to Show:', 'ecommerce-wp'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('max_items')); ?>" name="<?php echo esc_attr($this->get_field_name('max_items')); ?>" type="number" value="<?php echo esc_attr($max_items); ?>" />
		</p>
		
		<span><strong><?php esc_html_e('Custom Styles:', 'ecommerce-wp'); ?></strong></span><hr />
		
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('bg_color')); ?>"><?php esc_html_e('Title Background color:', 'ecommerce-wp'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('bg_color')); ?>" name="<?php echo esc_attr($this->get_field_name('bg_color')); ?>" type="color" value="<?php echo esc_attr($bg_color); ?>" />
		</p>		
		
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('text_color')); ?>"><?php esc_html_e('Title Text color:', 'ecommerce-wp'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('text_color')); ?>" name="<?php echo esc_attr($this->get_field_name('text_color')); ?>" type="color" value="<?php echo esc_attr($text_color); ?>" />
		</p>
		
			
		<?php
		}

		// Updating widget replacing old instances with new
		public function update($new_instance, $old_instance) {
				$instance = array();
				$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
				$instance['max_items'] = (!empty($new_instance['max_items'])) ? absint($new_instance['max_items']) : '';
				$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
				
				$instance['bg_color'] = (!empty($new_instance['bg_color'])) ? strip_tags($new_instance['bg_color']) : '';
				$instance['text_color'] = (!empty($new_instance['text_color'])) ? strip_tags($new_instance['text_color']) : '';
								
				return $instance;
		}
} // widget ends

function ecommerce_wp_product_navigation_widget() {
		register_widget('ecommerce_wp_product_navigation_widget');
}
add_action('widgets_init', 'ecommerce_wp_product_navigation_widget');