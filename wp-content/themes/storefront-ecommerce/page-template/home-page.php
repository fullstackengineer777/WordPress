<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); 

$archive_year  = get_the_time('Y'); 
$archive_month = get_the_time('m'); 
$archive_day   = get_the_time('d');
?>

<main role="main" id="skip_content">

  <?php do_action( 'storefront_ecommerce_above_slider' ); ?>

  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="product-cat-box">
          <?php if(class_exists('woocommerce')){ ?>
            <strong><i class="fas fa-bars me-3"></i><?php echo esc_html_e('Shop By Categories','storefront-ecommerce'); ?></strong>
            <div class="product-cat">
              <?php
              $args = array(
                //'number'     => $number,
                'orderby'    => 'title',
                'order'      => 'ASC',
                'hide_empty' => 0,
                'parent'  => 0
                //'include'    => $ids
              );
              $storefront_ecommerce_product_categories = get_terms( 'product_cat', $args );
              $count = count($storefront_ecommerce_product_categories);
              if ( $count > 0 ){
                foreach ( $storefront_ecommerce_product_categories as $storefront_ecommerce_product_category ) {
                    $ecommerce_cat_id   = $storefront_ecommerce_product_category->term_id;
                  $cat_link = get_category_link( $ecommerce_cat_id );
                  $thumbnail_id = get_term_meta( $storefront_ecommerce_product_category->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
                  $image = wp_get_attachment_url( $thumbnail_id );
                  if ($storefront_ecommerce_product_category->category_parent == 0) {
                    ?>
                    <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $storefront_ecommerce_product_category ) ); ?>">
                    <?php
                    if ( $image ) {
                      echo '<img class="thumd_img" src="' . esc_url( $image ) . '" alt="" />';
                    }
                    echo esc_html( $storefront_ecommerce_product_category->name ); ?></a></li>
                    <?php
                  }
                }
              }
            ?>
            </div>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-9 col-md-8">
        <?php if( get_theme_mod('storefront_ecommerce_slider_hide', false) != '' || get_theme_mod( 'storefront_ecommerce_display_slider',false) != ''){ ?>
          <section id="slider" class="m-auto p-0 mw-100">
            <?php $storefront_ecommerce_slider_speed = get_theme_mod('storefront_ecommerce_slider_speed', 3000); ?>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr($storefront_ecommerce_slider_speed); ?>"> 
              <?php $storefront_ecommerce_slider_page = array();
                for ( $count = 1; $count <= 4; $count++ ) {
                  $mod = intval( get_theme_mod( 'storefront_ecommerce_slider_setting' . $count ));
                  if ( 'page-none-selected' != $mod ) {
                    $storefront_ecommerce_slider_page[] = $mod;
                  }
                }
                if( !empty($storefront_ecommerce_slider_page) ) :
                  $args = array(
                    'post_type' => 'page',
                    'post__in' => $storefront_ecommerce_slider_page,
                    'orderby' => 'post__in'
                  );
                  $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  $i = 1;
              ?>     
              <div class="carousel-inner" role="listbox">
                <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                    <div class="slider-bg">
                      <?php if(has_post_thumbnail()){
                          the_post_thumbnail();
                      } else{?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="" />
                      <?php } ?>
                    </div>
                    <div class="carousel-caption">
                      <div class="inner_carousel">
                        <div class="carousel-content">
                          <?php if( get_theme_mod('storefront_ecommerce_slider_heading',true) != ''){ ?>
                            <h1 class="mb-0"><?php the_title(); ?></h1>
                          <?php } ?>
                          <?php if( get_theme_mod('storefront_ecommerce_slider_text',true) != ''){ ?>
                            <p><?php $excerpt = get_the_excerpt(); echo esc_html( storefront_ecommerce_string_limit_words( $excerpt, esc_attr(get_theme_mod('storefront_ecommerce_slider_excerpt_number','15')))); ?></p>
                          <?php } ?>
                          <div class="more-btn mt-0 mt-md-3">
                            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','storefront-ecommerce'); ?><span class="screen-reader-text"><?php esc_html_e('Read More','storefront-ecommerce'); ?></span></a>
                          </div>
                        </div>
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
              <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                <span class="screen-reader-text"><?php esc_html_e( 'Previous','storefront-ecommerce' );?></span>
              </a>
              <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                <span class="screen-reader-text"><?php esc_html_e( 'Next','storefront-ecommerce' );?></span>
              </a>
            </div>  
            <div class="clearfix"></div>
          </section>
        <?php }?>
      </div>
    </div>
  </div>
  
  <?php do_action( 'storefront_ecommerce_below_slider' ); ?>

  <?php if( get_theme_mod( 'storefront_ecommerce_product_enable') != '') { ?>
    <section id="video-section" class="py-5">
      <div class="container">
        <div class="row">
          <?php if ( class_exists( 'WooCommerce' )) {
            $storefront_ecommerce_product_page = array();
              $mod = absint( get_theme_mod( 'storefront_ecommerce_product_page'));
              if ( 'page-none-selected' != $mod ) {
                $storefront_ecommerce_product_page[] = $mod;
              }
              if( !empty($storefront_ecommerce_product_page) ) :
                $args = array(
                  'post_type' => 'page',
                  'post__in' => $storefront_ecommerce_product_page,
                  'orderby' => 'post__in'
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  $count = 0;
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php the_content(); ?>
                  <?php $count++; endwhile; ?>
                <?php else : ?>
                  <div class="no-postfound"></div>
                <?php endif;
              endif;
              wp_reset_postdata();
            ?>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?> 

  <div class="container front-page-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="new-text"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>