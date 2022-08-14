<?php
/*
 * Widget to display woocommerce products by feature
 */

class ecommerce_wp_post_carousel_widget extends WP_Widget {
		
		function __construct() {	
				parent::__construct(
				  
				// Base ID of your widget
				'ecommerce_wp_post_carousel_widget', 
				  
				// Widget name will appear in UI
				__('+ Post Carousel', 'ecommerce-wp'), 
				  
				// Widget description
				array( 'description' => __( 'Display Posts Carousel', 'ecommerce-wp' ), ) 
				);		
		}
		
		// Creating widget front-end
		public function widget($args, $instance) {
		

				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 12;
				$slider = (!empty($instance['slider'])) ? wp_strip_all_tags($instance['slider']) : '';
				$feature = (!empty($instance['feature'])) ? wp_strip_all_tags($instance['feature']) : "";
				$css_class = (!empty($instance['colums'])) ? wp_strip_all_tags($instance['colums']) : "col-md-2 col-sm-2 col-lg-2 col-xs-6";
				$min_height = (!empty($instance['min_height'])) ? absint($instance['min_height']) : 250;
				$image_height = (!empty($instance['image_height'])) ? absint($instance['image_height']) : 200;
				$slider_speed = (!empty($instance['slider_speed'])) ? absint($instance['slider_speed']) : 4;
				$category = (!empty($instance['category'])) ? strip_tags($instance['category']) : 0;

				$order = 'DESC';
				if($feature == 'price-low') {
					$order = 'ASC';
				}
				
				$infinite = true;
								
				/* This run the code and display the output */
				
				if( $category == -1 ){
					$args = array ( 'post_type' => 'post', 'posts_per_page'=> $max_items );
				} else {
					$args = array ( 'post_type' => 'post',	'posts_per_page'=> $max_items, 'cat' => $category );		
				}	
				
				
				/* slider colum count is determined by css class */
				if($css_class == "col-md-3 col-sm-3 col-lg-3 col-xs-6"){
					$colums = 4;			
				} else if($css_class == "col-md-4 col-sm-4 col-lg-4 col-xs-6"){
					$colums = 3;
				} else if($css_class == "col-md-2 col-sm-2 col-lg-2 col-xs-6"){
					$colums = 6;
				} else if($css_class == "col-sm-2"){
					$colums = 5;
				}
				
				
				$loop = new WP_Query($args);
				
				global $ecommerce_wp_uniqueue_id ;
				$ecommerce_wp_uniqueue_id += 1;
				$carousal_id = 'product-carousal-'.$ecommerce_wp_uniqueue_id;
				$i = 1;
				$items = array();
				$subitems = array();
				
				while( $loop->have_posts() ) : $loop->the_post();
					global $post;
					
		
					$prod_id = get_the_ID();
					$thumb_id = get_post_thumbnail_id($prod_id);	
					$url = get_the_post_thumbnail_url($prod_id , 'full');
					$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
					$link = get_permalink();
					$title = get_the_title();
					$date = get_the_time('M d, Y', $prod_id );
					$author = get_the_author();
		
						
					$slideritem = new ecommerce_wp_Product_Item(); 
					$slideritem->image_url = $url;
					$slideritem->title = $title;
					$slideritem->alt = $alt;
					$slideritem->link = $link;
					$slideritem->id = $prod_id;
					$slideritem->author = $author;
					$slideritem->date = $date;
					
						/* slider colum count is determined by
						 * css class Add sub items = colums */
						 
						if($i % $colums == 0){
							array_push($subitems, $slideritem);
							array_push($items, $subitems);
							$subitems = array();					
						} else {
							array_push($subitems, $slideritem);
						}             
					
					$i++; 
				endwhile;
				wp_reset_postdata();
				/* add remaining items (% not reach multiples of value) */
				if(!empty($subitems)) {array_push($items, $subitems);}
				
				if ($infinite){
					$array_count = count($items);
					if ($array_count> 1)  {
						//last item
						$last_count = count($items[$array_count-1]);
						$first_count = count($items[0]);
						$last_item = $items[$array_count-1];
						$first_item = $items[0];			
						$subitems = array();
						
						if ($last_count < $colums){
							$offset = $colums - $last_count;
							if($offset > 0) {
								$k = 0;
								for ($j = 0; $j < $last_count; $j++) {
									array_push($subitems, $last_item[$j]);
									$k = $j;
								}				
								for ($j = 0; $j < $offset; $j++) {
									array_push($subitems, $first_item[$j]);
								}
								$items[$array_count-1] = $subitems;
							}
						}
					}
				
				}
				
				//carousal begin
				if($slider) {		
					echo '<div id="'.esc_attr($carousal_id).'" class="news product-carousel carousel slide" data-ride="carousel" data-interval="'.absint($slider_speed * 1000).'" >';
					echo '<div class="carousel-inner border square">';
				} else {
					echo '<div class="news product-carousel">';
					echo '<div class="row multi-columns-row border square">';
				}
				
				$active = 'active';
				
				$item_count = count($items);
				foreach ($items as $slides) {
						//slider item begin
						if ($slider){
							echo '<div class="item '.esc_attr($active).' ">';
						}
						$active = '';
						//subitem begin
						$offfset_css = ' col-sm-offset-1';	
						foreach ($slides as $slideritem) {
						?>
						<div class="<?php if($colums != 5){ echo esc_attr($css_class); } else { echo esc_attr($css_class.$offfset_css); $offfset_css=''; } ?>" >
							<div class="product-wrapper product" style=" min-height:<?php echo absint($min_height); ?>px">
							
								<div class="product-image-wrapper" style="height:<?php echo absint($image_height); ?>px">
									<?php if ( $slideritem->image_url ) : ?>
										<a href="<?php echo esc_url($slideritem->link); ?>" >
										<img src="<?php echo esc_url($slideritem->image_url); ?>" style="height:<?php echo absint($image_height); ?>px" />
										</a>
									<?php endif; ?>
								</div>
								
								<div class="news-slider-content">
							
								<div class="product-description">
									<h4><a href="<?php echo esc_url($slideritem->link); ?>" ><span class="product-title"><?php echo esc_html($slideritem->title); ?></span></a></h4>
								</div> <!--end product description-->
										
								<div class="item-metadata ">
									<span class="author"><i class="fa fa-user-o"></i><?php echo ' '.esc_html($slideritem->author); ?></span>
									<span class="posts-date">
									<i class="fa fa-clock-o" aria-hidden="true"></i><?php echo ' '.esc_html($slideritem->date); ?>
									</span>	
								</div>
								
								</div>
							
																	
							</div>
						</div>							
						<?php		
						}
						//subitem end
					if ($slider){	
					echo '</div>';
					//slider item end
					}
				}
				
				if($slider && $item_count>1){	
				
					echo '<a class="left carousel-control" href="#'.esc_attr($carousal_id).'" data-slide="prev">
					<span class="glyphicon glyphicon-menu-left"></span>
					<span class="sr-only">'.esc_html__('Previous', 'ecommerce-wp').'</span>
					</a>
					<a class="right carousel-control" href="#'.esc_attr($carousal_id).'" data-slide="next">
					<span class="glyphicon glyphicon-menu-right"></span>
					<span class="sr-only">'.esc_html__('Next', 'ecommerce-wp').'</span>
					</a>';
		
				}		
				//indicators start
				echo '</div>';
				echo '</div>';
				
				$active = 'active';
			

								
				
			
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
				$category = (!empty($instance['category'])) ? strip_tags($instance['category']) : '';

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
				
				$args = get_categories( array(
											'orderby' => 'name',
											'parent'  => 0
										));
				 
				$categories = get_categories( $args );
				$category_list = '';
				if(0 == $category){
					$category_list = $category_list.'<option value="-1" Selected=selected>'.__( 'All','ecommerce-wp').'</option>';
				} else{
					$category_list = $category_list.'<option value="-1">'.__( 'All','ecommerce-wp').'</option>';
				}
				foreach ( $categories as $cat ) {
					$selected ='';
					if(($cat->term_id) == $category){
						$selected ='Selected=selected';
					}
					$category_list = $category_list.'<option value="'.esc_attr($cat->term_id).'" '.esc_attr($selected).' >'.esc_html($cat->name).'</option>';
				}

				?>
		
				<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Post Category:','ecommerce-wp'  ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'category' )); ?>" type="text">
				<?php echo $category_list; ?>
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
				$instance['category'] = (!empty($new_instance['category'])) ? strip_tags($new_instance['category']) : '';

				return $instance;
		}
}

// Register and load the widget
function ecommerce_wp_post_carousel_widget() {
		register_widget('ecommerce_wp_post_carousel_widget');
}
add_action('widgets_init', 'ecommerce_wp_post_carousel_widget');

if(!class_exists('ecommerce_wp_Product_Item')) { 
class ecommerce_wp_Product_Item	{
	public $id;
	public $image_url;
	public $link;
	public $title;
	public $content;
	public $alt;
	public $sale;
	public $categories;
	public $price_html;
	public $rating_html;
	public $author;
	public $date;
 }
}