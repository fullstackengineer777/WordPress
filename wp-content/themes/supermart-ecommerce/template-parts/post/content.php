<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Supermart Ecommerce
 * @since 1.0
 * @version 1.4
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="article_content">
    <h3><?php the_title(); ?></h3>
    <div class="metabox"> 
      <span class="entry-author"><i class="fas fa-user"></i><?php the_author(); ?></span>
      <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date()); ?></span>
      <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','supermart-ecommerce'), __('0 Comments','supermart-ecommerce'), __('% Comments','supermart-ecommerce') ); ?></span>
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
<hr class="post-hr">