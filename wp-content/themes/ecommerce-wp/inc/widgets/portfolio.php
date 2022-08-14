<?php
/* 
 * display product slider from given product category
 */

class ecommerce_wp_portfolio_widget extends WP_Widget {


function __construct() {
		parent::__construct(
		  
		// Base ID of your widget
		'ecommerce_wp_portfolio_widget', 
		  
		// Widget name will appear in UI
		__('+ Portfolio', 'ecommerce-wp'), 
		  
		// Widget description
		array( 'description' => __( 'Display Post Portfolio.', 'ecommerce-wp' ), ) 
		);
}

public function widget( $args, $instance ) {

		$max_items = ( ! empty( $instance['max_items'] ) ) ? absint( $instance['max_items'] ) : 6;
		$category = ( ! empty( $instance['category'] ) ) ? wp_strip_all_tags( $instance['category'] ) : 0;
		$max_height = (!empty($instance['max_height'])) ?  absint($instance['max_height']) : 300;
		$title = ( ! empty( $instance['title'] ) ) ? wp_strip_all_tags( $instance['title'] ) : '';
		$layout = ( ! empty( $instance['layout'] ) ) ? wp_strip_all_tags( $instance['layout'] ) : 1;
		$excerpt = (!empty($instance['excerpt'])) ?  absint($instance['excerpt']) : 15;
		$colums = (!empty($instance['colums'])) ?  wp_strip_all_tags($instance['colums']) : "col-md-6 col-sm-6 col-lg-6 col-xs-6";
		
		$args = array();
	
		$today = getdate();
		
		if( $category == -1 ){
			$args = array ( 'post_type' => 'post', 'posts_per_page'=> $max_items, 'post_status' => 'publish' );
			
		} else if ($category == -2) {	
			$args = array ('post_type' => 'post', 'posts_per_page' => $max_items , 'meta_key' => 'my_post_viewed', 'orderby' => 'meta_value_num', 'order' => 'DESC' , 'post_status' => 'publish' );
		
		} else if ($category == -3) {	
			$args = array ('post_type' => 'post', 'posts_per_page'=> $max_items, 'order' => 'DESC', 'post_status' => 'publish' );
		
		} else {
			$args = array ( 'post_type' => 'post',	'posts_per_page'=> $max_items, 'cat' => $category );		
		
		}

		$loop = new WP_Query($args );
		
		
		echo '<div class="container post-widget-container">';
		
		if($title) {
			echo '<div class="mag-sec-title">';
				echo '<h3 class="post-widget-title"><span>'.esc_html($title).'</span></h3>';
			echo '</div>';
		}
		
		echo '<div class="row multi-columns-row">';
		
		ecommerce_wp_post_grid($loop, $max_height, $title, $layout, $excerpt, $colums );
		
		echo '</div>';		
		echo '</div>';
		

}
		
public function form( $instance ) {

		$max_items = ( ! empty( $instance['max_items'] ) ) ? absint( $instance['max_items'] ) : '6';
		$category = ( ! empty( $instance['category'] ) ) ? wp_strip_all_tags( $instance['category'] ) : -1;
		$max_height = (!empty($instance['max_height'])) ?  absint($instance['max_height']) : 300;
		$title = ( ! empty( $instance['title'] ) ) ? wp_strip_all_tags( $instance['title'] ) : '';
		$layout = ( ! empty( $instance['layout'] ) ) ? wp_strip_all_tags( $instance['layout'] ) : 1;
		$excerpt = (!empty($instance['excerpt'])) ?  absint($instance['excerpt']) : 15;
		$colums = (!empty($instance['colums'])) ?  wp_strip_all_tags($instance['colums']) : "col-md-6 col-sm-6 col-lg-6 col-xs-6";
		
		//category
		$args = get_categories( array(
									'orderby' => 'name',
									'parent'  => 0
								));
		 
		$categories = get_categories( $args );
		$category_list = '';
		
		$item = new ecommerce_wp_cat();
		$item->term_id = '-1';
		$item->name = '-- All Categories --';		
		array_unshift($categories , $item);
		
		
		$item = new ecommerce_wp_cat();
		$item->term_id = '-2';
		$item->name = 'Popular Posts';
		array_unshift($categories , $item);
		
		$item = new ecommerce_wp_cat();
		$item->term_id = '-3';
		$item->name = 'Latest Posts';
		array_unshift($categories , $item);			
			

		foreach ( $categories as $cat ) {
			$selected ='';
			if(($cat->term_id) == $category){
				$selected ='Selected=selected';
			}
			$category_list = $category_list.'<option value="'.esc_attr($cat->term_id).'" '.esc_attr($selected).' >'.esc_html($cat->name).'</option>';
		}
		
		//layout
		$layout_list = '';
		
		$layouts = array(   '1'=> esc_html__('Compact', 'ecommerce-wp'), 
							'2'=> esc_html__('Grid', 'ecommerce-wp'), 
							'3'=> esc_html__('List', 'ecommerce-wp'), 
							'4'=> esc_html__('Summery', 'ecommerce-wp') );
		
		foreach ( $layouts as $key => $val ) {
			$selected ='';
			if( $key == $layout){
				$selected ='Selected=selected';
			}
			$layout_list = $layout_list.'<option value="'.esc_attr($key).'" '.esc_attr($selected).' >'.esc_html($val).'</option>';
		}
		
		//columns
		$product_colums = array(
				"col-md-12 col-sm-12 col-lg-12 col-xs-12" => 1,
				"col-md-6 col-sm-6 col-lg-6 col-xs-12" => 2,
				"col-md-4 col-sm-4 col-lg-4 col-xs-12" => 3,
				"col-md-3 col-sm-3 col-lg-3 col-xs-12" => 4,
				"col-sm-2" => 5,
				"col-md-2 col-sm-2 col-lg-2 col-xs-12" => 6,
				
		);				
		
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','ecommerce-wp'  ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"  />
		</p>
				
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Select Post type / Category:','ecommerce-wp'  ); ?></label> 
		<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'category' )); ?>" type="text">
		<?php echo $category_list; ?>
		</select>
		</p>
				
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'layout' )); ?>"><?php esc_html_e( 'Post Layout:','ecommerce-wp'  ); ?></label> 
		<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'layout' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'layout' )); ?>" type="text">
		<?php echo $layout_list; ?>
		</select>
		</p>
		
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'max_items' )); ?>"><?php esc_html_e( 'Number of Posts to Show:','ecommerce-wp'  ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'max_items' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'max_items' )); ?>" type="number" value="<?php echo absint( $max_items ); ?>" />
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
		<label for="<?php echo esc_attr($this->get_field_id( 'excerpt' )); ?>"><?php esc_html_e( 'Post Excerpt Length:', 'ecommerce-wp'  ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'excerpt' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'excerpt' )); ?>" type="number" value="<?php echo absint( $excerpt ); ?>" />
		</p>	
					
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('max_height')); ?>">
			<?php esc_html_e( 'Max Height:', 'ecommerce-wp' ); ?></label><br />
			<input type="number" name="<?php echo esc_attr($this->get_field_name('max_height')); ?>" id="<?php echo esc_attr($this->get_field_id('max_height')); ?>" value="<?php echo absint($max_height);?>" class="widefat" />
		</p>

		
		
						
		<?php
		}

public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['max_items'] = ( ! empty( $new_instance['max_items'] ) ) ? absint( $new_instance['max_items'] ) : '';
		$instance['category'] = ( ! empty( $new_instance['category'] ) ) ? wp_strip_all_tags( $new_instance['category'] ) : '' ;
		$instance['max_height'] = ( ! empty( $new_instance['max_height'] ) ) ? absint( $new_instance['max_height'] ) : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '' ;
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? wp_strip_all_tags( $new_instance['layout'] ) : '' ;
		$instance['excerpt'] = ( ! empty( $new_instance['excerpt'] ) ) ? absint( $new_instance['excerpt'] ) : '';
		$instance['colums'] = ( ! empty( $new_instance['colums'] ) ) ? wp_strip_all_tags( $new_instance['colums'] ) : '';
		
		return $instance;
	 }
}

function ecommerce_wp_portfolio_widget() {
		register_widget( 'ecommerce_wp_portfolio_widget' );
}
add_action( 'widgets_init', 'ecommerce_wp_portfolio_widget' );

