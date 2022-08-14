<?php
/* 
 * display product slider ffrom given product category
 */
if(!class_exists('WooCommerce')) return;

class ecommerce_wp_product_slider_widget extends WC_Widget {

function __construct() {
		
		$this->widget_cssclass    = 'woocommerce ecommerce_wp_product_slider_widget';
		$this->widget_description = __( 'Display Product Slider.', 'ecommerce-wp' );
		$this->widget_id          = 'ecommerce_wp_product_slider_widget';
		$this->widget_name        = __( '+ Product Slider', 'ecommerce-wp' );

		parent::__construct();
}

public function widget( $args, $instance ) {

		$max_items = ( ! empty( $instance['max_items'] ) ) ? absint( $instance['max_items'] ) : 6;
		$category = ( ! empty( $instance['category'] ) ) ? wp_strip_all_tags( $instance['category'] ) : -1;
		$display_sub_cat = ( ! empty( $instance['display_sub_cat'] ) ) ? wp_strip_all_tags( $instance['display_sub_cat'] ) : '';
		$product_meta = ( ! empty( $instance['product_meta'] ) ) ? wp_strip_all_tags( $instance['product_meta'] ) : '';
		$max_height = (!empty($instance['max_height'])) ?  absint($instance['max_height']) : 4;
		$speed = (!empty($instance['speed'])) ? absint($instance['speed']) : 4;
		$product_desc = ( ! empty( $instance['product_desc'] ) ) ? wp_strip_all_tags( $instance['product_desc'] ) : '';
		$button_lbl = ( ! empty( $instance['button_lbl'] ) ) ? wp_strip_all_tags( $instance['button_lbl'] ) : '';
		
		$operator = 'IN';
		$product_args = array();
		
		
		if(!$display_sub_cat){
			$operator ='AND';
		}

		if( $category == -1 ){
			$product_args = array ( 'post_type' => 'product', 'posts_per_page'=> $max_items );
		} else {
			$product_args = array ( 'post_type' => 'product',	'posts_per_page'=> $max_items,	
									'tax_query' => array( array( 'taxonomy' => 'product_cat',
																 'terms' => $category,
																 'operator' => $operator )));		
		}
		

		$loop = new WP_Query($product_args );

		$i = 1;
				
		$items = array();
		
		while( $loop->have_posts() ) : $loop->the_post();
			global $product;		  
			$thumb_id = get_post_thumbnail_id(get_the_ID());	
			$url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			
			if(!$url) {
				$url = get_template_directory_uri().'/images/empty.png';
			}
						
			$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
			$link = get_permalink();
			$title = get_the_title();
			$content = get_the_excerpt();			
			$price = $product->get_price_html();
			
			$item = array(	'image_url' => $url, 
							'content' => $content, 
							'title' => $title, 
							'alt' => $alt, 
							'link' => $link, 
							'price_html' => $price);		
			
			array_push($items, $item);
			
			$i++; 
		endwhile;
		wp_reset_postdata();
		
		global $ecommerce_wp_uniqueue_id ;
		$ecommerce_wp_uniqueue_id += 1;		
		$carousal_id = 'product-carousal-'.$ecommerce_wp_uniqueue_id;
		
		//carousal begin
		echo '<div id="'.esc_attr($carousal_id).'" class="product-slider carousel slide" data-ride="carousel" data-interval="'.esc_attr($speed*1000).'" style="height:'.absint($max_height).'px" >';
		echo '<div class="carousel-inner">';
	
		$active = 'active';
		$item_count = count($items);
		
		foreach ($items as $slides) {
		echo '<div class="item '.esc_attr($active).' ">';
		   echo '<a href="'.esc_url($slides['link']).'"><img class="img-responsive" src="'.esc_url($slides['image_url']).'"  style="width:100%;height:'.absint($max_height).'px"></a>';
	
		if( $product_meta ||  $product_desc) {   
			echo	'<div class="carousel-caption">';
			
			if ($product_meta) {
				echo	'<h3>'.esc_html($slides['title']).'</h3>';			
				echo	'<p>'.wp_kses_post($slides['price_html']).'</p>';
			}
			
			if ($button_lbl !=''){
				echo '<a href='.esc_url($slides['link']).' class="call-to-action btn">'.esc_html($button_lbl).'</a><p></p>';
			}
			
			echo	'</div>';
		}				   
		 $active = '';
		 echo '</div>';	
					
		}
		
		//indicators, navigation
		if($item_count>1) {	
	
			echo '<a class="left carousel-control" href="#'.esc_attr($carousal_id).'" data-slide="prev">
			<span class="glyphicon glyphicon-menu-left"></span>
			<span class="sr-only">'.esc_html__('Previous', 'ecommerce-wp').'</span>
			</a>
			<a class="right carousel-control" href="#'.esc_attr($carousal_id).'" data-slide="next">
			<span class="glyphicon glyphicon-menu-right"></span>
			<span class="sr-only">'.esc_html__('Next', 'ecommerce-wp').'</span>
			</a>';	
		
			$active = 'active';		
			echo '<ol class="carousel-indicators">';	
			$s = 0;
			foreach ($items as $slides) {
				echo '<li data-target="#'.esc_attr($carousal_id).'" data-slide-to="'.esc_attr($s).'" class="'.esc_attr($active).'"></li>';
				$active = '';
				$s++;
			}	
			echo '</ol>';

		}//indicators, navigation
				
		 echo '</div>';
		echo '</div>';

}
		
public function form( $instance ) {
		$max_items = ( ! empty( $instance['max_items'] ) ) ? absint( $instance['max_items'] ) : '6';
		$category = ( ! empty( $instance['category'] ) ) ? wp_strip_all_tags( $instance['category'] ) : -1;
		$display_sub_cat = ( ! empty( $instance['display_sub_cat'] ) ) ? wp_strip_all_tags( $instance['display_sub_cat'] ) : '';
		$product_meta = ( ! empty( $instance['product_meta'] ) ) ? wp_strip_all_tags( $instance['product_meta'] ) : '';
		$max_height = (!empty($instance['max_height'])) ?  absint($instance['max_height']) : 400;
		$speed = (!empty($instance['animation'])) ? absint($instance['speed']) : 4;
		$product_desc = ( ! empty( $instance['product_desc'] ) ) ? wp_strip_all_tags( $instance['product_desc'] ) : '';
		$button_lbl = ( ! empty( $instance['button_lbl'] ) ) ? wp_strip_all_tags( $instance['button_lbl'] ) : '';
		
		$args =	array(	'taxonomy'     => 'product_cat',
						'orderby'      => 'date',
						'order'      => 'ASC',
						'show_count'   => 1,
						'pad_counts'   => 0,
						'hierarchical' => 0,
						'title_li'     => '',
						'hide_empty'   => 1,
					);
		 
		$categories = get_categories( $args );
		$category_list = '';
		
		if(0 == $category){
			$category_list = $category_list.'<option value="-1" Selected=selected>'.__( 'All','ecommerce-wp').'</option>';
		} else{
			$category_list = $category_list.'<option value="-1">'.__( 'All','ecommerce-wp').'</option>';
		}
		
		foreach ( $categories as $cat ) {
			$selected ='';
			if(($cat->term_id)==$category){
				$selected ='Selected=selected';
			}
			$category_list = $category_list.'<option value="'.esc_attr($cat->term_id).'" '.esc_attr($selected).' >'.esc_html($cat->name).'</option>';
		}
		?>
		
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Product Category:','ecommerce-wp'  ); ?></label> 
		<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'category' )); ?>" type="text">
		<?php echo $category_list; ?>
		</select>
		</p>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'max_items' )); ?>"><?php esc_html_e( 'Number of Slides to Show:','ecommerce-wp'  ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'max_items' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'max_items' )); ?>" type="number" value="<?php echo esc_attr( $max_items ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('speed')); ?>">
			<?php esc_html_e( 'Slider Speed (Seconds)', 'ecommerce-wp' ); ?></label><br />
			<input type="text" name="<?php echo esc_attr($this->get_field_name('speed')); ?>" id="<?php echo esc_attr($this->get_field_id('speed')); ?>" value="<?php if ($speed) : echo absint($speed); endif; ?>" class="widefat" />
		</p>		
				
		<p>
		<input class="checkbox" type="checkbox" <?php if($display_sub_cat){echo " checked ";} ?> id="<?php echo esc_attr($this->get_field_id( 'display_sub_cat' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_sub_cat' )); ?>" />
		<label for="<?php echo esc_attr($this->get_field_id( 'display_sub_cat' )); ?>"><?php esc_html_e( 'Process Sub Categories','ecommerce-wp' ); ?></label> 
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php if($product_meta){echo " checked ";} ?> id="<?php echo esc_attr($this->get_field_id( 'product_meta' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'product_meta' )); ?>" />
		<label for="<?php echo esc_attr($this->get_field_id( 'product_meta' )); ?>"><?php esc_html_e( 'Show Title & Price','ecommerce-wp' ); ?></label> 
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php if($product_desc){echo " checked ";} ?> id="<?php echo esc_attr($this->get_field_id( 'product_desc' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'product_desc' )); ?>" />
		<label for="<?php echo esc_attr($this->get_field_id( 'product_desc' )); ?>"><?php esc_html_e( 'Show Description', 'ecommerce-wp' ); ?></label> 
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('button_lbl')); ?>">
			<?php esc_html_e( 'Button Label', 'ecommerce-wp' ); ?></label><br />
			<input type="text" name="<?php echo esc_attr($this->get_field_name('button_lbl')); ?>" id="<?php echo esc_attr($this->get_field_id('button_lbl')); ?>" value="<?php if ($button_lbl) : echo esc_attr($button_lbl); endif; ?>" class="widefat" />
		</p>		
					
		<span><strong><?php esc_html_e('Custom Styles:', 'ecommerce-wp'); ?></strong></span><hr />

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('max_height')); ?>">
			<?php esc_html_e( 'Max Height:', 'ecommerce-wp' ); ?></label><br />
			<input type="number" name="<?php echo esc_attr($this->get_field_name('max_height')); ?>" id="<?php echo esc_attr($this->get_field_id('max_height')); ?>" value="<?php echo absint($max_height);?>" class="widefat" />
		</p>
		
		<p><strong><?php esc_html_e('Unlimited products and more options, Go Pro...', 'ecommerce-wp'); ?></strong></p>

						
		<?php 
		}

public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['max_items'] = ( ! empty( $new_instance['max_items'] ) ) ? absint( $new_instance['max_items'] ) : '';
		$instance['category'] = ( ! empty( $new_instance['category'] ) ) ? wp_strip_all_tags( $new_instance['category'] ) : '' ;
		$instance['display_sub_cat'] = ( ! empty( $new_instance['display_sub_cat'] ) ) ? wp_strip_all_tags( $new_instance['display_sub_cat'] ) : '';
		$instance['product_meta'] = ( ! empty( $new_instance['product_meta'] ) ) ? wp_strip_all_tags( $new_instance['product_meta'] ) : '';
		$instance['max_height'] = ( ! empty( $new_instance['max_height'] ) ) ? absint( $new_instance['max_height'] ) : '';
		$instance['speed'] = (!empty($new_instance['speed'])) ? absint($new_instance['speed']): '';
		$instance['product_desc'] = ( ! empty( $new_instance['product_desc'] ) ) ? wp_strip_all_tags( $new_instance['product_desc'] ) : '';
		$instance['button_lbl'] = ( ! empty( $new_instance['button_lbl'] ) ) ? wp_strip_all_tags( $new_instance['button_lbl'] ) : '';
		
		return $instance;
	 }
}

function ecommerce_wp_product_slider_widget() {
		register_widget( 'ecommerce_wp_product_slider_widget' );
}
add_action( 'widgets_init', 'ecommerce_wp_product_slider_widget' );