<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'supermart_ecommerce_above_slider' ); ?>

	<div class="row mx-0">
		<div class="col-lg-8 col-md-12">
			<?php if( get_theme_mod('supermart_ecommerce_slider_hide_show') != ''){ ?>
				<section id="slider">
					<div id="carouselExampleIndicators" class="carousel" data-ride="carousel"> 
					    <?php $supermart_ecommerce_slider_pages = array();
					    for ( $count = 1; $count <= 4; $count++ ) {
					        $mod = intval( get_theme_mod( 'supermart_ecommerce_slider'. $count ));
					        if ( 'page-none-selected' != $mod ) {
					          $supermart_ecommerce_slider_pages[] = $mod;
					        }
					    }
				      	if( !empty($supermart_ecommerce_slider_pages) ) :
					        $args = array(
					          	'post_type' => 'page',
					          	'post__in' => $supermart_ecommerce_slider_pages,
					          	'orderby' => 'post__in'
					        );
				        	$query = new WP_Query( $args );
				        if ( $query->have_posts() ) :
				          	$i = 1;
				    	?>     
					    <div class="carousel-inner" role="listbox">
					      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
					        	<div class="slider-img">
		            				<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
		            			</div>
		            			<div class="carousel-caption">
						            <div class="inner-carousel">
						              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						              	<p><?php $supermart_ecommerce_excerpt = get_the_excerpt(); echo esc_html( supermart_ecommerce_string_limit_words( $supermart_ecommerce_excerpt,12 ) ); ?></p>
						              	<a href="<?php the_permalink(); ?>" class="read-btn"><?php echo esc_html('Read More', 'supermart-ecommerce'); ?><i class="fas fa-arrow-right ml-1"></i></a>
				            		</div>
				            	</div>
					        </div>
					      	<?php $i++; endwhile; 
					      	wp_reset_postdata();?>
					    </div>
					    <?php else : ?>
					    <div class="no-postfound"></div>
				      		<?php endif;
					    endif;?>
					    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
					      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','supermart-ecommerce' );?></span>
					    </a>
					    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
					      	<span class="screen-reader-text"><?php esc_html_e( 'Next','supermart-ecommerce' );?></span>
					    </a>
					</div>
				  	<div class="clearfix"></div>
				</section>
			<?php }?>
		</div>
		<div class="col-lg-4 col-md-12 pl-lg-0">
			<div class="collection block1 position-relative">
				<?php $supermart_ecommerce_collection1 = array();
		      	$mod = absint( get_theme_mod( 'supermart_ecommerce_collection1'));
		      	if ( 'page-none-selected' != $mod ) {
		        	$supermart_ecommerce_collection1[] = $mod;	
		      	}
			    if( !empty($supermart_ecommerce_collection1) ) :
			      	$args = array(
				        'post_type' => 'page',
				        'post__in' => $supermart_ecommerce_collection1,
				        'orderby' => 'post__in'
			      	);
			      	$query = new WP_Query( $args );
			      	if ( $query->have_posts() ) :
				        while ( $query->have_posts() ) : $query->the_post(); ?>
				        	<?php the_post_thumbnail(); ?>
				        	<div class="outer-box">
					        	<div class="box-content">
							        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							    </div>
							</div>
				        <?php endwhile; ?>
			      	<?php else : ?>
			          	<div class="no-postfound"></div>
			      	<?php endif;
			    endif;
			    wp_reset_postdata()
				?>
			</div>
			<div class="collection block2 position-relative">
				<?php $supermart_ecommerce_collection2 = array();
		      	$mod = absint( get_theme_mod( 'supermart_ecommerce_collection2'));
		      	if ( 'page-none-selected' != $mod ) {
		        	$supermart_ecommerce_collection2[] = $mod;	
		      	}
			    if( !empty($supermart_ecommerce_collection2) ) :
			      	$args = array(
				        'post_type' => 'page',
				        'post__in' => $supermart_ecommerce_collection2,
				        'orderby' => 'post__in'
			      	);
			      	$query = new WP_Query( $args );
			      	if ( $query->have_posts() ) :
				        while ( $query->have_posts() ) : $query->the_post(); ?>
				        	<?php the_post_thumbnail(); ?>
				        	<div class="outer-box">
					        	<div class="box-content">
							        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							    </div>
							</div>
				        <?php endwhile; ?>
			      	<?php else : ?>
			          	<div class="no-postfound"></div>
			      	<?php endif;
			    endif;
			    wp_reset_postdata()
				?>
			</div>
		</div>
	</div>
	

	<?php do_action('supermart_ecommerce_below_slider'); ?>

	<section id="product-section" class="py-5">
		<div class="container-fluid">
			<?php $supermart_ecommerce_product_page = array();
	      	$mod = absint( get_theme_mod( 'supermart_ecommerce_product_page'));
	      	if ( 'page-none-selected' != $mod ) {
	        	$supermart_ecommerce_product_page[] = $mod;	
	      	}
		    if( !empty($supermart_ecommerce_product_page) ) :
		      	$args = array(
			        'post_type' => 'page',
			        'post__in' => $supermart_ecommerce_product_page,
			        'orderby' => 'post__in'
		      	);
		      	$query = new WP_Query( $args );
		      	if ( $query->have_posts() ) :
			        while ( $query->have_posts() ) : $query->the_post(); ?>
			        	<h3><?php the_title(); ?></h3>
			        	<?php the_content(); ?>
			        <?php endwhile; ?>
		      	<?php else : ?>
		          	<div class="no-postfound"></div>
		      	<?php endif;
		    endif;
		    wp_reset_postdata()
			?>
		</div>
	</section>

	<?php do_action('supermart_ecommerce_below_service_section'); ?>

	<div class="container-fluid">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>