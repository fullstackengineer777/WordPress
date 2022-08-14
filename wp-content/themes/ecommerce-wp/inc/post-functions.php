<?php

function ecommerce_wp_post_grid( $loop, $max_height, $title, $layout, $excerpt, $colums ){

		global $post;
		$i = 1;
		
		while( $loop->have_posts() ) : $loop->the_post();
			$post_id = get_the_ID();		  
			$thumb_id = get_post_thumbnail_id($post_id);
			$url = get_the_post_thumbnail_url($post_id, 'full');
			
			if(!$url) {
				$url = get_template_directory_uri().'/images/empty.png';
			}
						
			$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
			$title = get_the_title();
			$content = get_the_excerpt();
			$date = get_the_time('M d, Y', $post_id );
			$author = get_the_author();
			
			//compact
			if($layout == 1) {
			?>
			<div class="<?php echo esc_attr($colums); ?> post-compact" >
		  		<div class="background-img" style="background-image:url(<?php echo($url); ?>); background-position:center center; background-size:cover;">
					<div class="post-compact-container" style="height:<?php echo absint($max_height); ?>px;">
						<div class="portfolio-content" >
							<h3><a href="<?php the_permalink(); ?>" ><?php echo esc_html($title); ?></a></h3>
							<div class="item-metadata ">
								<span class="author"><i class="fa fa-user-o"></i><?php echo ' '.esc_html($author); ?></span>
								<span class="posts-date">
								<i class="fa fa-clock-o" aria-hidden="true"></i><?php echo ' '.esc_html($date); ?>
								</span>	
							</div>
							<?php ecommerce_wp_print_post_cat($post_id); ?>												
						</div>
						
					</div>
				</div>
			</div>
			<?php
			
			//List
			} else if ($layout == 2){
			
			?>
			<div class="<?php echo esc_attr($colums); ?> post-grid" >
			 <div class="post-content" >
		  		<div class="post-compact-container">
					<a  href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($url); ?>" style="height:<?php echo absint($max_height); ?>px; width:100%" /></a>
					<?php ecommerce_wp_print_post_cat($post_id); ?>
				</div>
					<div class="portfolio-content" >
						<h4><a  href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h4>		
						
						<div class="item-metadata ">
							<span class="author"><i class="fa fa-user-o"></i><?php echo ' '.esc_html($author); ?></span>
							<span class="posts-date">
							<i class="fa fa-clock-o" aria-hidden="true"></i><?php echo ' '.esc_html($date); ?>
							</span>	
						</div>											
						
						<?php if($excerpt > 0): ?>
						<p><?php echo wp_kses_post( ecommerce_wp_trim_content($excerpt , $post) ); ?></p>
						<?php endif; ?>
						
						<a class="more-link" href="<?php the_permalink(); ?>"><?php echo esc_html__("Read More", "ecommerce-wp"); ?></a>
					</div>
				</div>				
			</div>
			<?php
			
			//grid
			} else if ($layout == 3) {
			
			?>
			<div class="container row post-list">
			 <div class="post-content">		  
		  		<div class="post-img" >
					<div style="position:relative">
					<a  href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($url); ?>" style="height:<?php echo absint($max_height); ?>px; width:100%" /></a>
					<?php ecommerce_wp_print_post_cat($post_id); ?>
					</div>
				</div>

				<div class="portfolio-content vertical-center" >
					 <div>
						<h4><a  href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h4>
						<div class="item-metadata ">
							<span class="author"><i class="fa fa-user-o"></i><?php echo ' '.esc_html($author); ?></span>
							<span class="posts-date">
							<i class="fa fa-clock-o" aria-hidden="true"></i><?php echo ' '.esc_html($date); ?>
							</span>	
						</div>
						
						<?php if($excerpt > 0): ?>									
						<p><?php echo wp_kses_post( ecommerce_wp_trim_content($excerpt , $post) ); ?></p>
						<?php endif; ?>
						
						<a class="more-link" href="<?php the_permalink(); ?>"><?php echo esc_html__("Read More", "ecommerce-wp"); ?></a>
					 </div>					
				</div>
			 </div>		
			</div>
						
			<?php
			// Post summery
			} else if ($layout == 4) {
			?>
			
			<div class="<?php echo esc_attr($colums); ?>  container row post-summery">
			
			 <div class="post-content">		  
		  		<div class="post-img" >
					<a  href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($url); ?>" /></a>
				</div>

				<div class="portfolio-content vertical-center" >
					 <div>
					 	<?php ecommerce_wp_print_post_cat($post_id); ?>
						<div class="portfolio-content-inner">
							<h4><a  href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h4>
					 	</div>
					 </div>					
				</div>
			 </div>	
				
			</div>
							
			<?php			
			}

			$i++; 
		endwhile;
		wp_reset_postdata();
		
}		

/*
 * 
 */
function ecommerce_wp_print_post_cat ( $post_id ){

$category_object = get_the_category($post_id);
    
	echo '<div class="post-widget-categories">';
	foreach($category_object as $c){
		$cat = get_category( $c );
		echo '<a>'.esc_html($cat->name).' </a>';
		break;
	}
	echo '</div>';

}

		
class ecommerce_wp_cat	{
	public $term_id = '';
	public $name = '';
}
