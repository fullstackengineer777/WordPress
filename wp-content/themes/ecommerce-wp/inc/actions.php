<?php
//Contact
add_action('ecommerce_wp_product_category', 'ecommerce_wp_product_category');

function ecommerce_wp_product_category() {

	$options = ecommerce_wp_get_theme_options();
		
	global $ecommerce_wp_product_categories;
	
	ecommerce_wp_set_all_product_categories();
	$all_categories = $ecommerce_wp_product_categories;
	
	$featured = array();
	
	for ($i = 0 ; $i < 10 ; $i++) {
		array_push($featured, $options['featured_category_'.$i] );
	}

?>
<div class="product-category-portfolio row multi-columns-row">
<?php
	
	foreach ($all_categories as $cat) {


		$image = $cat->image_url;
		if ($image == '') $image = get_template_directory_uri() . '/images/empty.png';
		
		if (  array_search($cat->id, $featured) !== FALSE) {
		
			echo '<div class="cat-colum '.$options['featured_category_colums'].'">';
				echo '<div class="category-list-widget" >';
				echo '<a href="' . esc_url($cat->link) . '">';
				echo '<img src="' . esc_url($image) . '" style="width:100%;height:'.absint($options['featured_category_height']).'px"/>';
				echo '<div class="category-meta">' . esc_attr($cat->name) . '<br />(' . absint($cat->count) . ')</div>';
				echo '</a>';
				echo '</div>';
			echo '</div>';
			
		}
	} /* end for each */
	
?>
</div>
<?php
}//end product cat



//Contact
add_action('ecommerce_wp_contact', 'ecommerce_wp_contact');

function ecommerce_wp_contact() {

		$options = ecommerce_wp_get_theme_options();

?>
<div id="home-contact-section" class="padding-top-md padding-bottom-md" >
	<div class="container text-center">
			<div class="row">
				<div><h2 class="section-title"><?php echo esc_html($options['contact_section_title']); ?></h2></div>
			</div>	
			<div class="row">
			 <div class="contact-form-container">
				<?php echo do_shortcode($options['contact_form_shortcode']); ?>
			 </div>
			</div>
	</div>		
</div>
<?php
}


//Call to Action
add_action('ecommerce_wp_cta', 'ecommerce_wp_cta');

function ecommerce_wp_cta() {

		$options = ecommerce_wp_get_theme_options();
			
			
		$args = array( 'post_type' => 'page', 'ignore_sticky_posts' => 1 , 'post__in' => array($options['cta_page']) );
		$result = new WP_Query($args);
		$link = '';
		
		?>
		<div id="home-cta-section" class="cta-section" style="background-image:url('<?php echo esc_url($options['cta_image']); ?>');color:<?php echo esc_attr($options['cta_color']);?>;background-repeat: no-repeat;background-size: cover;background-attachment: fixed;background-position: center center;" >		
		<div class="container cta-content text-center" style="padding:<?php echo (absint($options['cta_height'])/2); ?>px 15px;">
			<div class="row">
				<div class="col-sm-12">
		<?php
		while ( $result->have_posts() ) :
			$result->the_post();
			the_content();
			$link = get_page_link();
		endwhile;
		wp_reset_postdata();
		echo '<div class="cta-text"><p>'.esc_html($options['cta_text']).'</p></div>';
		?>
				</div>
			</div>
		<?php if($options['cta_label'] !=''): ?>	
			<div class="row"> 
				<div class="col-sm-12">	
					<a class="call-to-action btn" href="<?php echo esc_url($options['cta_link']) ?>"><?php echo esc_html($options['cta_label']); ?></a><p></p>
				</div>
			</div>
		<?php endif; ?>			
		</div>
		</div>
<?php
}

// Services
add_action('ecommerce_wp_services', 'ecommerce_wp_services');

function ecommerce_wp_services() {

		$options = ecommerce_wp_get_theme_options();
			
			
		$args = array( 'post_type' => 'page', 'ignore_sticky_posts' => 1 , 'post__in' => array($options['service_page']) );
		$result = new WP_Query($args);
		
		?>
		<div id="home-service-section" class="container  padding-top-md padding-bottom-md">
			<div class="row">
				<div class="col-sm-12">
		<?php
		while ( $result->have_posts() ) :
			$result->the_post();
			the_content();
		endwhile;
		wp_reset_postdata();
		?>
				</div>
			</div>
		</div>
<?php
}


// Slider
add_action('ecommerce_wp_post_slider', 'ecommerce_wp_post_slider');

function ecommerce_wp_post_slider() {

	$options = ecommerce_wp_get_theme_options();
	
	$args = array(	'category'	=> $options['slider_cat'], 
					'title_text'=> $options['slider_title_text'],
					'max_height'=> $options['slider_height'],
					'max_items'	=> $options['slider_max'], 
					'btn_label'	=> $options['slider_btn_label'],
					'btn_url'	=> $options['slider_btn_url'],
					'slider_button'	=> $options['slider_button'],
					'title_text'	=> $options['title_text'],
					) ;
	
	
	?>
	<div id="home-post-slider"><?php the_widget('ecommerce_wp_post_slider_widget', $args);?></div>
	<?php
}

//Showcase
add_action('ecommerce_wp_product_showcase', 'ecommerce_wp_product_showcase');

function ecommerce_wp_product_showcase() {

	if (!class_exists('WooCommerce')) return;

	$options = ecommerce_wp_get_theme_options();
	
	$product_args = array(	'category'	=> $options['prod_slider_cat'], 
							'product_meta'		=> $options['prod_slider_title_text'],
							'product_desc'		=> $options['prod_slider_title_text'], //
							'max_height'		=> $options['prod_slider_height'],
							'max_items'			=> $options['prod_slider_max'], 
							'button_lbl'		=> $options['prod_slider_btn_label'],
							
							'display_sub_cat' 	=> true					
						);
					
	$navigation_args = array('title' => $options['prod_slider_cat_label'], 'bg_color'=> $options['primary_color']) ;				

	
	if ($options['prod_navigation_section_enable']){
	?>
	<div id="home-product-showcase" class="container padding-top-md">
		<div class="row">
		
		<div class="col-sm-3 col-xs-12">
		<div><?php the_widget('ecommerce_wp_product_navigation_widget', $navigation_args);?></div>
		</div>	
		
		<div class="col-sm-9 col-xs-12">
		<div class="showcase-product-slider"><?php the_widget('ecommerce_wp_product_slider_widget', $product_args);?></div>
		</div>
		
		
		</div>
	</div>
	<?php
	} else {
	?>
	<div><?php the_widget('ecommerce_wp_product_slider_widget', $product_args);?></div>
	<?php	
	}
}


// Product Slider 1
add_action('ecommerce_wp_product_slider', 'ecommerce_wp_product_slider');

function ecommerce_wp_product_slider() {

	if (!class_exists('WooCommerce')) return;

	$options = ecommerce_wp_get_theme_options();
	$product_args = array(	 
							'slider'		=> $options['product_section_1_slider'],
							'category_id'	=> $options['product_section_1_product_cat'],
							'feature'		=> $options['product_section_1_product_feature'], //
							'colums'		=> $options['product_section_1_colums'],
							'max_items'		=> $options['product_section_1_num_products'], 
							'min_height'	=> $options['product_section_1_height'],
							'image_height' 	=> $options['product_section_1_image_height'],
							'slider_speed' 	=> $options['product_section_1_speed'],											
						);	
	
	//category
	?><div id="home-product-1" class="container  padding-top-md padding-bottom-md">
		<div class="row  text-center">
			<div><h2 class="section-title" ><?php echo esc_html($options['product_section_1_title'], 'ecommerce-wp'); ?></h2></div>
		</div>	
	<?php if ($options['product_section_1_type'] == 0) { ?>
		<div class="row">
			<?php the_widget('ecommerce_wp_product_category_widget', $product_args); ?>
		</div>
	<?php
	} else {	
	?>
		<div class="row">
			<?php the_widget('ecommerce_wp_product_carousel_grid_widget', $product_args); ?> 
		</div>
	<?php
	}
	?></div><?php
}


// Product Slider 2
add_action('ecommerce_wp_product_slider_2', 'ecommerce_wp_product_slider_2');

function ecommerce_wp_product_slider_2() {

	if (!class_exists('WooCommerce')) return;

	$options = ecommerce_wp_get_theme_options();
	$product_args = array(	 
							'slider'		=> $options['product_section_2_slider'],
							'category_id'	=> $options['product_section_2_product_cat'],
							'feature'		=> $options['product_section_2_product_feature'], //
							'colums'		=> $options['product_section_2_colums'],
							'max_items'		=> $options['product_section_2_num_products'], 
							'min_height'	=> $options['product_section_2_height'],
							'image_height' 	=> $options['product_section_2_image_height'],
							'slider_speed' 	=> $options['product_section_2_speed'],											
						);	
	
	//category
	?><div id="home-product-2" class="container  padding-top-md padding-bottom-md">
		<div class="row  text-center">
			<div><h2 class="section-title"><?php echo esc_html($options['product_section_2_title']); ?></h2></div>
		</div>	
	<?php if ($options['product_section_2_type'] == 0) { ?>
		<div class="row">
			<?php the_widget('ecommerce_wp_product_category_widget', $product_args); ?> 
		</div>
	<?php
	} else {	
	?>
		<div class="row">
			<?php the_widget('ecommerce_wp_product_carousel_grid_widget', $product_args); ?> 
		</div>
	<?php
	}
	?></div><?php
}



// Product Slider 3
add_action('ecommerce_wp_product_slider_3', 'ecommerce_wp_product_slider_3');

function ecommerce_wp_product_slider_3() {

	if (!class_exists('WooCommerce')) return;

	$options = ecommerce_wp_get_theme_options();
	$product_args = array(	 
							'slider'		=> $options['product_section_3_slider'],
							'category_id'	=> $options['product_section_3_product_cat'],
							'feature'		=> $options['product_section_3_product_feature'], //
							'colums'		=> $options['product_section_3_colums'],
							'max_items'		=> $options['product_section_3_num_products'], 
							'min_height'	=> $options['product_section_3_height'],
							'image_height' 	=> $options['product_section_3_image_height'],
							'slider_speed' 	=> $options['product_section_3_speed'],											
						);	
	
	//category
	?><div id="home-product-3" class="container  padding-top-md padding-bottom-md">
		<div class="row  text-center">
			<div><h2 class="section-title"><?php echo esc_html($options['product_section_3_title']); ?></h2></div>
		</div>	
	<?php if ($options['product_section_3_type'] == 0) { ?>
		<div class="row">
			<?php the_widget('ecommerce_wp_product_category_widget', $product_args); ?> 
		</div>
	<?php
	} else {	
	?>
		<div class="row">
			<?php the_widget('ecommerce_wp_product_carousel_grid_widget', $product_args); ?> 
		</div>
	<?php
	}
	?></div><?php
}


// Product Slider 4
add_action('ecommerce_wp_product_slider_4', 'ecommerce_wp_product_slider_4');

function ecommerce_wp_product_slider_4() {

	if (!class_exists('WooCommerce')) return;

	$options = ecommerce_wp_get_theme_options();
	$product_args = array(	 
							'slider'		=> $options['product_section_4_slider'],
							'category_id'	=> $options['product_section_4_product_cat'],
							'feature'		=> $options['product_section_4_product_feature'], //
							'colums'		=> $options['product_section_4_colums'],
							'max_items'		=> $options['product_section_4_num_products'], 
							'min_height'	=> $options['product_section_4_height'],
							'image_height' 	=> $options['product_section_4_image_height'],
							'slider_speed' 	=> $options['product_section_4_speed'],											
						);	
	
	//category
	?><div id="home-product-4" class="container  padding-top-md padding-bottom-md">
		<div class="row  text-center">
			<div><h2 class="section-title"><?php echo esc_html($options['product_section_4_title']); ?></h2></div>
		</div>	
	<?php if ($options['product_section_4_type'] == 0) { ?>
		<div class="row">
			<?php the_widget('ecommerce_wp_product_category_widget', $product_args); ?> 
		</div>
	<?php
	} else {	
	?>
		<div class="row">
			<?php the_widget('ecommerce_wp_product_carousel_grid_widget', $product_args); ?> 
		</div>
	<?php
	}
	?></div><?php
}