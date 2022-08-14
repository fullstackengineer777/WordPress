<?php

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
 }
}

if(!class_exists('ecommerce_wp_Category_Item')) { 
class ecommerce_wp_Category_Item {
	public $image_url;
	public $link;
	public $name;
	public $count;
	public $id;
 }
}

$ecommerce_wp_product_categories = array() ;

function ecommerce_wp_set_all_product_categories () {
				$product_args = array(
						'taxonomy' => 'product_cat',
						'orderby' => 'date',
						'order' => 'ASC',
						'show_count' => 1,
						'pad_counts' => 0,
						'hierarchical' => 1,
						'title_li' => '',
						'hide_empty' => 1,
				);
				
				global $ecommerce_wp_product_categories;
				$ecommerce_wp_product_categories = array() ;

				$all_categories = get_categories($product_args);
				
				
				foreach ($all_categories as $cat) {

					$item = new ecommerce_wp_Category_Item();
					$item->name = ($cat->cat_name) ;
					$item->count = absint($cat->count);
					$item->id = ($cat->term_id);
					
					$thumbnail_id = get_term_meta($item->id, 'thumbnail_id', true);
										
					$item->image_url = wp_get_attachment_url($thumbnail_id);
					$item->link = esc_url(get_term_link($cat->slug, 'product_cat'));
					
					array_push($ecommerce_wp_product_categories, $item );				
				
				}
				
}


/**
 * Woocommerce Custom add to cart button
 *
 */
if ( ! function_exists( 'ecommerce_wp_add_to_cart' ) ) {
	function ecommerce_wp_add_to_cart( $id = '' ) {
		
		if(!class_exists( 'WooCommerce' )){return;}
		global $product;
		
		if( $id ) {
			$product = wc_get_product( $id );
		}		

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_type' ) ) {
			$prod_type = $product->get_type();
		} else {
			$prod_type = $product->product_type;
		}

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_stock_status' ) ) {
			$prod_in_stock = $product->get_stock_status();
		} else {
			$prod_in_stock = $product->is_in_stock();
		}

		if ( $product ) {
			$args = array();
			$defaults = array(
				'quantity' => 1,
				'class'    => implode(
					' ', array_filter(
						array('button',
							'product_type_' . $prod_type,
							$product->is_purchasable() && $prod_in_stock ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',)
					)
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
			
			if (locate_template('woocommerce/add-to-cart.php') != '') {
				wc_get_template( 'woocommerce/add-to-cart.php', $args );
			}
		}
	}
}




/**
 * Set list of products arguments
 * $product_type :- '' = All, featured, best-selling, on-sale, top-rated, price
 */
function ecommerce_wp_get_product_args($number_of_products, $product_type, $order = 'DESC'){
 
	if(!class_exists( 'WooCommerce' ))	return;
	
	$args = array(	'post_type' => 'product', 
					'post_status' => 'publish', 
					'posts_per_page'=> $number_of_products,					 
					'order' => $order
				  );
		
	switch($product_type){
		case 'featured':
			$args['tax_query'] = array(array('taxonomy' => 'product_visibility', 'field' => 'name', 'terms' => 'featured'));
			break;		
		
		case 'best-selling':
			$args['meta_key'] = 'total_sales';
			$args['orderby'] = 'meta_value_num';
			break;			
		
		case 'on-sale':
			
			$args['meta_query']      = array(
					'relation' => 'OR',
					array( // Simple products type
						'key'           => '_sale_price',
						'value'         => 0,
						'compare'       => '>',
						'type'          => 'numeric'
					),
					array( // Variable products type
						'key'           => '_min_variation_sale_price',
						'value'         => 0,
						'compare'       => '>',
						'type'          => 'numeric'
					)
				)	;
			
			break;	
		
		case 'top-rated':
			$args['meta_query']  = WC()->query->get_meta_query();
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = '_wc_average_rating';
			break;		
		//heigh to low
		case 'price':
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = '_price';
			break;
		//low to heigh
		case 'price-low':
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = '_price';
			break;				
		
		case 'latest':
			$args['orderby'] = 'date';
			$args['order']= 'DESC';
			break;	
	}
	
	return $args;
}

/**
 * Get list of products with buttons based ecommerce_wp_get_product_args 
 * included product category inside function
 */
function ecommerce_wp_list_products($args, $image_height ,$colums , $min_height = 250){
	
	$loop = new WP_Query( $args );
	
	if ( $loop->have_posts() ) :
	$i = 1;
	echo '<div class="container" style=" width:unset;">';
	echo '<div class="row multi-columns-row">';
		while ( $loop->have_posts() ) :
			$loop->the_post();
			global $product;
			global $post;
			$offfset_css = ' col-sm-offset-1';
			?>
			<div class="<?php if($colums != 'col-sm-2'){ echo esc_attr($colums); } else { echo esc_attr($colums.$offfset_css); $offfset_css=''; } ?>">
			<div class="product-wrapper product" style=" min-height:<?php echo absint($min_height); ?>px">

				<div class="product-image-wrapper" style="height:<?php echo absint($image_height); ?>px" >
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( 'full', array( 'alt' => esc_html(get_the_title()) )); ?>
						</a>
					<?php endif; ?>
					<?php if ($product->is_on_sale() ) : ?>
						<div class="badge-wrapper"> <span class="onsale"><?php esc_html_e('Sale!', 'ecommerce-wp') ?></span></div>
					<?php endif; ?>
					<div class="product-rating-wrapper">
						<?php
						$rating = $product->get_average_rating();
						 if($rating > 0){												
							for($r=1; $r<=5; $r++){
								$class = ($r<=$rating)? 'checked':'';
								echo '<span class="fa fa-star '.esc_attr($class).'"></span>';
							}
						 }	
						?>
					</div>									
				</div>
				
				<div class="product-description">
				
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><p class="product-title"><?php esc_html(the_title()); ?></p></a>
				
					<span class="price">
						<?php
						$price = $product->get_price_html();
						if ( ! empty( $price ) ) {
							echo '<p>';
							echo wp_kses(
								$price, array(
									'span' => array(
										'class' => array(),
									),
									'del' => array(),
								)
							);
							echo '</p>';
						}
						?>					
					</span>

				</div> <!--end product description-->
				
				<div class="wc-button-container woocommerce">
					<div>
						<?php ecommerce_wp_add_to_cart(); ?>
					</div>
				</div>
				
				<?php ecommerce_wp_yith(); ?>				
				
			</div>
		</div>							
	<?php
	$i++;				
	endwhile;
	wp_reset_postdata();
	echo '</div>';
	echo '</div>';
	endif; // end loop

}


/* 
 * product slider function 
 */
 
function ecommerce_wp_product_slider_grid($args, $image_height, $css_class, $slider_speed, $min_height, $slider = true, $infinite = true){

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
			global $product;
			global $post;
			

			$prod_id = get_the_ID();
			$thumb_id = get_post_thumbnail_id($prod_id);	
			$url = get_the_post_thumbnail_url($prod_id , 'full');
			$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
			$link = get_permalink();
			$title = get_the_title();
			$content = get_the_content();			

			//product category
			$categories = "";
			if ( function_exists( 'wc_get_product_category_list' ) ) {
				$categories = wc_get_product_category_list( $prod_id );
			} else {
				$categories = $product->get_categories();
			}
			//is on sale
			$sale = ($product->is_on_sale());
			//price
			$price = $product->get_price_html();
			$price_html = '';
			if ( ! empty( $price ) ) {
				$price_html .= '<p>';
				$price_html .= wp_kses(
					$price, array(
						'span' => array(
							'class' => array(),
						),
						'del' => array(),
					)
				);
				$price_html .= '</p>';
			}
			
			$rating = $product->get_average_rating();
			$rating_html = '';
			 if($rating > 0){												
				for($r = 1; $r <= 5; $r++){
					$class = ($r <= $rating)? 'checked':'';
					$rating_html .= '<span class="fa fa-star '.$class.'"></span>';
				}
			 }			
				
			$slideritem = new ecommerce_wp_Product_Item(); 
			$slideritem->image_url = $url;
			$slideritem->content = $content;
			$slideritem->title = $title;
			$slideritem->alt = $alt;
			$slideritem->link = $link;
			$slideritem->categories = $categories;
			$slideritem->price_html = $price_html;
			$slideritem->rating_html = $rating_html;
			$slideritem->sale = $sale;
			$slideritem->id = $prod_id;
			
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
			echo '<div id="'.esc_attr($carousal_id).'" class="product-carousel carousel slide" data-ride="carousel" data-interval="'.absint($slider_speed*1000).'" >';
			echo '<div class="carousel-inner product-carousal-inner border square">';
		} else {
			echo '<div class="product-carousel">';
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
								<?php if ($slideritem->sale) : ?>
									<div class="badge-wrapper"> <span class="onsale"><?php esc_html_e('Sale!', 'ecommerce-wp') ?></span></div>
								<?php endif; ?>				
							</div>
					
							<div class="product-description">
						
								<a href="<?php echo esc_url($slideritem->link); ?>" ><p class="product-title"><?php echo esc_html($slideritem->title); ?></p></a>
								<span class="price">
									<?php
									if ( $slideritem->price_html ) {
										echo wp_kses(
										$slideritem->price_html, array(
											'span' => array(
											'class' => array(),
										),
											'del' => array(),
										));
									}
									?>					
								</span>
								<div class="product-rating-wrapper">
									<?php echo wp_kses_post($slideritem->rating_html); ?>
								</div>
							</div> <!--end product description-->
							
							<div class="wc-button-container woocommerce">
								<div>
									<?php ecommerce_wp_add_to_cart($slideritem->id); ?>
								</div>
							</div>
							
							<?php ecommerce_wp_yith(); ?>
							
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

		
		//carousal end				
}



function ecommerce_wp_yith(){
?>
	<div class="my-yith-wishlist">
	<?php
	global $product;
		if( class_exists('YITH_WCWL')) {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist product_id="'.esc_attr($product->get_id()).'"]' );
		}
		if( class_exists('YITH_WOOCOMPARE')) {	
			echo do_shortcode( '[yith_compare_button product_id="' .esc_attr($product->get_id()). '"]' );
		}
		if( class_exists('YITH_WCQV')) {	
			echo do_shortcode( '[yith_quick_view product_id=' .esc_attr($product->get_id()). '  type="button" label="'.esc_html__("Quick View",'ecommerce-wp').'"]' );
		}
	?>
	</div>							
<?php
}



