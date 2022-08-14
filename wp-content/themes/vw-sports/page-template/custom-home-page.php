<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_sports_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_sports_slider_arrows', false) != '' || get_theme_mod( 'vw_sports_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"> 
        <?php $vw_sports_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_sports_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_sports_pages[] = $mod;
            }
          }
          if( !empty($vw_sports_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_sports_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){ ?>
                <div class="slide-image">
                  <?php the_post_thumbnail(); ?>
                </div>
              <?php } else{ ?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/slider.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="slider-inner-box">
                  <?php if( get_theme_mod('vw_sports_slider_title_hide_show',true) != ''){ ?>
                    <h1 class="mb-0 pt-0 wow slideInRight" data-wow-duration="3s"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  <?php } ?>
                  <?php if( get_theme_mod('vw_sports_slider_content_hide_show',true) != ''){ ?>
                    <p class="mt-2 wow slideInLeft" data-wow-duration="3s"><?php $excerpt = get_the_excerpt(); echo esc_html( vw_sports_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_sports_slider_excerpt_number','30')))); ?></p>
                  <?php }?>
                  <?php if( get_theme_mod('vw_sports_slider_button_text','READ MORE') != ''){ ?>
                    <div class="more-btn my-3 my-lg-5 my-md-4 wow slideInLeft" data-wow-duration="3s">
                      <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('vw_sports_slider_button_text',__('READ MORE','vw-sports')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_sports_button_text',__('READ MORE','vw-sports')));?></span></a>
                    </div>
                  <?php } ?>
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
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-sports' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-sports' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'vw_sports_after_slider' ); ?>

  <div class="homepageheader">
    <?php get_template_part('template-parts/header/navigation'); ?>
  </div>

  <section id="services-sec" class="py-5 text-center wow bounceInRight delay-1000" data-wow-duration="3s">
    <div class="container">
      <?php if( get_theme_mod('vw_sports_services_text') != '' ){ ?>
        <h3 class="mb-3 htext text-center"><?php echo esc_html(get_theme_mod('vw_sports_services_text',''));?></h3>
      <?php }?>

      <div class="tab">
        <?php
          $featured_post = get_theme_mod('vw_sports_services_number', '');
          for ( $j = 1; $j <= $featured_post; $j++ ){ ?>
          <button class="tablinks" onclick="vw_sports_services_tab(event, '<?php $main_id = get_theme_mod('vw_sports_services_text'.$j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?> ')">
          <?php echo esc_html(get_theme_mod('vw_sports_services_text'.$j)); ?></button>
        <?php }?>
      </div>

      <?php for ( $j = 1; $j <= $featured_post; $j++ ){ ?>
        <div id="<?php $main_id = get_theme_mod('vw_sports_services_text'.$j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?>"  class="tabcontent mt-3">
          <div class="row">
            <?php
            $vw_sports_catData = get_theme_mod('vw_sports_services_category'.$j);
            if($vw_sports_catData){
              $page_query = new WP_Query(array( 'category_name' => esc_html( $vw_sports_catData ,'vw-sports')));
              $bgcolor = 1; ?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                  <?php if(has_post_thumbnail()) {?>
                    <div class="box mb-4">
                      <?php the_post_thumbnail(); ?>
                      <div class="box-content">
                        <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                      </div>                     
                    </div>
                  <?php }?>
                </div>
              <?php if($bgcolor >= 6){ $bgcolor = 0; } $bgcolor++; endwhile;
              wp_reset_postdata();
            } ?>
          </div>
        </div>
      <?php }?>      
    </div>
  </section>

  <?php do_action( 'vw_sports_after_service' ); ?>

  <div id="content-vw" class="py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>