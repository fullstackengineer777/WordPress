<?php
/**
 * The template part for top header
 *
 * @package VW Sports
 * @subpackage vw-sports
 * @since vw-sports 1.0
 */
?>

<div class="logo text-md-start text-center">
  <div class="logo-inner">
    <?php if ( has_custom_logo() ) : ?>
      <div class="site-logo"><?php the_custom_logo(); ?></div>
    <?php endif; ?>
    <?php $blog_info = get_bloginfo( 'name' ); ?>
      <?php if ( ! empty( $blog_info ) ) : ?>
        <?php if ( is_front_page() && is_home() ) : ?>
          <?php if( get_theme_mod('vw_sports_logo_title_hide_show',true) != ''){ ?>
            <h1 class="site-title py-1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php } ?>
        <?php else : ?>
          <?php if( get_theme_mod('vw_sports_logo_title_hide_show',true) != ''){ ?>
            <p class="site-title py-1 mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
          <?php } ?>
        <?php endif; ?>
      <?php endif; ?>
      <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) :
      ?>
      <?php if( get_theme_mod('vw_sports_tagline_hide_show',true) != ''){ ?>
        <p class="site-description mb-0">
          <?php echo esc_html($description); ?>
        </p>
      <?php } ?>
    <?php endif; ?>
  </div>
</div>