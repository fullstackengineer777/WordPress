<?php
/**
 * The template part for displaying single-post
 *
 * @package Storefront Ecommerce 
 * @subpackage storefront_ecommerce
 * @since 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	<h1><?php the_title(); ?></h1>
	<?php if( get_theme_mod( 'storefront_ecommerce_single_post_date',true) != '' || get_theme_mod( 'storefront_ecommerce_single_post_author',true) != '' || get_theme_mod( 'storefront_ecommerce_single_post_comment',true) != '') { ?>
		<div class="metabox p-2 mb-3">
	      	<?php if( get_theme_mod( 'storefront_ecommerce_single_post_date',true) != '') { ?>
	        	<span class="entry-date me-2"><i class="<?php echo esc_attr(get_theme_mod('storefront_ecommerce_single_post_date_icon','far fa-calendar-alt')); ?> me-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('storefront_ecommerce_single_post_meta_seperator') ); ?>
	      	<?php }?>
	      	<?php if( get_theme_mod( 'storefront_ecommerce_single_post_author',true) != '') { ?>
	        	<span class="entry-author me-2"><i class="<?php echo esc_attr(get_theme_mod('storefront_ecommerce_single_post_author_icon','fas fa-user')); ?> me-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></span><?php echo esc_html( get_theme_mod('storefront_ecommerce_single_post_meta_seperator') ); ?>
	      	<?php }?>
	      	<?php if( get_theme_mod( 'storefront_ecommerce_single_post_comment',true) != '') { ?>
	        	<span class="entry-comments me-2"><i class="<?php echo esc_attr(get_theme_mod('storefront_ecommerce_single_post_comment_icon','fas fa-comments')); ?> me-2"></i> <?php comments_number( __('0 Comment', 'storefront-ecommerce'), __('0 Comments', 'storefront-ecommerce'), __('% Comments', 'storefront-ecommerce') ); ?></span>
	      	<?php }?>
	      	<?php if( get_theme_mod( 'storefront_ecommerce_single_post_time',false) != '' ) { ?>
          		<span class="entry-time me-2"><i class="<?php echo esc_attr(get_theme_mod('storefront_ecommerce_single_post_time_icon','fas fa-clock')); ?> me-2"></i> <?php echo esc_html( get_the_time() ); ?></span>
	        <?php }?>
	    </div>
	<?php }?>
	<?php if( get_theme_mod( 'storefront_ecommerce_single_post_featured_image',true) != '') { ?>
    <div class="feature-box">
      <?php the_post_thumbnail(); ?>
    </div>
    <hr>
    <?php } ?>
    <?php if( get_theme_mod( 'storefront_ecommerce_single_post_tags',true) != '') { ?>
		<div class="tags"><?php the_tags(); ?></div>
	<?php }?>
    <div class="new-text">
      <?php the_content();?>
    </div>  
    <?php if( get_theme_mod( 'storefront_ecommerce_enable_single_post_pagination',true) != '') { ?>
	    <?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'storefront-ecommerce' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'storefront-ecommerce' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
				
			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'storefront-ecommerce' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'storefront-ecommerce' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'storefront-ecommerce' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'storefront-ecommerce' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'storefront-ecommerce' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			echo '<div class="clearfix"></div>';?>

	<?php } ?>
	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	} ?>

	<?php get_template_part('template-parts/related-posts'); ?>
</article>