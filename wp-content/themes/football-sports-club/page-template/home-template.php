<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider">
    <?php $football_sports_club_slide_pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'football_sports_club_top_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $football_sports_club_slide_pages[] = $mod;
        }
      }
      if( !empty($football_sports_club_slide_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $football_sports_club_slide_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="slider-box">
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="slider-inner-box">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
            <div class="slider-box-btn mt-4">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Register Now','football-sports-club'); ?></a>
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
  </section>

  <section class="sports-activities py-5">
    <div class="container">
      <?php if(get_theme_mod('football_sports_club_sports_activities_title') != ''){ ?>
        <h3 class="mb-5 text-center"><?php echo esc_html(get_theme_mod('football_sports_club_sports_activities_title','')); ?></h3>
      <?php }?>
      <div class="row">
        <?php
          $football_sports_club_sports_activities_cat = get_theme_mod('football_sports_club_sports_activities_category','');
          $football_sports_club_sports_activities_per_page = get_theme_mod('football_sports_club_sports_activities_per_page',4);
          if($football_sports_club_sports_activities_cat){
            $football_sports_club_page_query5 = new WP_Query(array( 'category_name' => esc_html($football_sports_club_sports_activities_cat,'football-sports-club'),'post_per_page' => esc_attr( $football_sports_club_sports_activities_per_page )));
            $i=1;
            while( $football_sports_club_page_query5->have_posts() ) : $football_sports_club_page_query5->the_post(); ?>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box-category mb-3">
                  <?php if ( has_post_thumbnail() ) { ?>
                    <div class="box-image">
                      <?php the_post_thumbnail(); ?>
                      <p class="box-icon"><i class="<?php echo esc_attr(get_theme_mod('football_sports_club_sports_activities_icon'.$i,'fas fa-swimmer')); ?>"></i></p>
                    </div>
                  <?php }?>
                  <div class="px-3 pb-3">
                    <h4 class="mb-3"><?php the_title(); ?></h4>
                    <p><?php echo esc_html( wp_trim_words( get_the_content(), 15 )); ?></p>
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','football-sports-club'); ?><i class="fas fa-angle-double-right ml-1"></i></a>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>


  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>