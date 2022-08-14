<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Supermart Ecommerce
 * @since 1.0
 * @version 1.4
 */
?>

<div class="col-lg-4 col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service grid-layout'); ?>>
    <div class="article_content">
      <h3><?php the_title(); ?></h3>
      <div class="post-date">
        <span class="entry-date"><span><?php echo esc_html( get_the_date()); ?></span></span>
      </div>
      <?php if(has_post_thumbnail()) { ?>
        <?php the_post_thumbnail(); ?>
      <?php }?>
      <p><?php the_excerpt(); ?></p>
      <div class="read-btn">
        <a href="<?php the_permalink(); ?>"><span><?php esc_html_e('Read More','supermart-ecommerce'); ?><i class="fas fa-arrow-right ml-2"></i></span><span class="screen-reader-text"><?php esc_html_e('Read More','supermart-ecommerce'); ?></span></a>
      </div>
      <div class="clearfix"></div>
    </div>
  </article>
</div>