<?php
/**
 * The Header for our theme.
 * @package Storefront Ecommerce
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open(); 
  } else { 
    do_action( 'wp_body_open' ); 
  } ?>
  <?php if(get_theme_mod('storefront_ecommerce_preloader',false) != '' || get_theme_mod( 'storefront_ecommerce_display_preloader',false) != ''){ ?>
    <div class="frame w-100 h-100">
      <div class="loader">
        <div class="dot-1"></div>
        <div class="dot-2"></div>
        <div class="dot-3"></div>
      </div>
    </div>
  <?php }?>
  <header role="banner" class="header-box">
    <a class="screen-reader-text skip-link" href="#skip_content"><?php esc_html_e( 'Skip to content', 'storefront-ecommerce' ); ?></a>
    
    <div id="header">
      <div class="topbar text-md-start text-center">
        <?php if( get_theme_mod('storefront_ecommerce_topbar_text') != '' ) {?>
          <marquee width="100%" direction="left" height="35%">
            <p class="topbar-text"><?php echo esc_html(get_theme_mod('storefront_ecommerce_topbar_text')); ?></p>
          </marquee>
        <?php }?>
      </div>
      <div class="topbar-2">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-md-5 align-self-center">
              <?php if(class_exists('woocommerce')){ ?>
                <div class="order-track position-relative">
                  <span><?php esc_html_e('Order Tracking','storefront-ecommerce'); ?></span>
                  <div class="order-track-hover text-left">
                    <?php echo do_shortcode('[woocommerce_order_tracking]','storefront-ecommerce'); ?>
                  </div>
                </div>
              <?php }?>
            </div>
            <div class="col-lg-4 col-md-7 align-self-center phone text-lg-start text-md-end text-center">
              <?php if (get_theme_mod('storefront_ecommerce_phone_number') != '') {?>
                <span class="me-2"><?php echo esc_html('Need Help! Call Us:', 'storefront-ecommerce'); ?></span>
                <a href="tel:<?php echo esc_attr(get_theme_mod('storefront_ecommerce_phone_number')); ?>"><?php echo esc_html(get_theme_mod('storefront_ecommerce_phone_number')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('storefront_ecommerce_phone_number')); ?></span></a>
              <?php }?>
            </div>
            <div class="col-lg-3 col-md-6 align-self-center social-icon text-lg-end text-center">
              <?php if(get_theme_mod('storefront_ecommerce_facebook_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('storefront_ecommerce_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'storefront-ecommerce'); ?></span></a>
              <?php }?>
              <?php if(get_theme_mod('storefront_ecommerce_twitter_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('storefront_ecommerce_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'storefront-ecommerce'); ?></span></a>
              <?php }?>
              <?php if(get_theme_mod('storefront_ecommerce_instagram_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('storefront_ecommerce_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'storefront-ecommerce'); ?></span></a>
              <?php }?>
              <?php if(get_theme_mod('storefront_ecommerce_pinterest_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('storefront_ecommerce_pinterest_url')); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'storefront-ecommerce'); ?></span></a>
              <?php }?>
            </div>
            <div class="col-lg-2 col-md-4 col-6 align-self-center">
              <?php if( class_exists( 'GTranslate' ) ) { ?>
                <div class="translate-lang">
                  <?php echo do_shortcode( '[gtranslate]' );?>
                </div>
              <?php }?>
            </div>
            <div class="col-lg-1 col-md-2 col-6 align-self-center">
              <?php if(class_exists('woocommerce')){ ?>
                <div class="currency-box">
                  <?php echo do_shortcode( '[woocommerce_currency_switcher_drop_down_box]' );?>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="middle-header">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 align-self-center">
              <div class="logo text-md-start text-center">
                <div class="row">
                  <div class="<?php if( get_theme_mod( 'storefront_ecommerce_site_logo_inline') != '') { ?>col-lg-5 col-md-5 col-5<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                    <?php if ( has_custom_logo() ) : ?>
                      <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="<?php if( get_theme_mod( 'storefront_ecommerce_site_logo_inline') != '') { ?>col-lg-7 col-md-7 col-7 site-logo-inline"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                    <?php $blog_info = get_bloginfo( 'name' ); ?>
                    <?php if ( ! empty( $blog_info ) ) : ?>
                      <?php if( get_theme_mod('storefront_ecommerce_site_title_enable',true) != ''){ ?>
                        <?php if ( is_front_page() && is_home() ) : ?>
                          <h1 class="site-title pb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif; ?>
                      <?php }?>
                    <?php endif; ?>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                      <?php if( get_theme_mod('storefront_ecommerce_site_tagline_enable',true) != ''){ ?>
                        <p class="site-description"><?php echo esc_html($description); ?></p>
                      <?php }?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-6 align-self-center text-md-end text-center px-md-0">
              <?php if(get_theme_mod('storefront_ecommerce_location_text') != '' || get_theme_mod('storefront_ecommerce_location_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('storefront_ecommerce_location_url')); ?>" class="location-btn"><i class="fas fa-map-marker-alt me-2"></i><?php echo esc_html(get_theme_mod('storefront_ecommerce_location_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('storefront_ecommerce_location_text')); ?></span></a>
              <?php }?>
            </div>
            <div class="col-lg-5 col-md-7 align-self-center header-search">
              <?php if(class_exists('woocommerce')){ ?>
                <?php get_product_search_form(); ?>
              <?php }?>
            </div>
            <div class="col-lg-2 col-md-5 align-self-center woo-icons text-md-end text-center">
              <?php if ( class_exists('woocommerce') ) { ?>
                <?php if(defined('YITH_WCWL')){ ?>
                  <a class="wishlist_view position-relative me-4" href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>"><i class="fas fa-heart"></i><span class="screen-reader-text"><?php esc_html_e( 'Wishlist','storefront-ecommerce' );?></span></a>
                <?php }?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="me-4"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','storefront-ecommerce' );?></span></a>
                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" class="cart-icon"><i class="fas fa-shopping-cart"></i><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','storefront-ecommerce' );?></span></a>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-header">
        <div class="container">
          <div class="menu-section">
            <div class="row">
              <div class="offset-md-3 col-lg-9 col-md-9 align-self-center">
                <div class="<?php if( get_theme_mod( 'storefront_ecommerce_sticky_header', false) != '') { ?> sticky-header<?php } else { ?>close-sticky <?php } ?>">
                  <?php
                  if(has_nav_menu('primary')){ ?>
                    <div class="toggle-menu responsive-menu">
                      <button role="tab" onclick="storefront_ecommerce_menu_open()" class="mobiletoggle"><i class="<?php echo esc_attr(get_theme_mod('storefront_ecommerce_responsive_menu_open_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','storefront-ecommerce'); ?></span>
                      </button>
                    </div>
                  <?php }?>
                  <div id="navbar-header" class="menu-brand primary-nav">
                    <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'storefront-ecommerce' ); ?>">
                      <?php
                        if(has_nav_menu('primary')){
                          wp_nav_menu( array( 
                            'theme_location' => 'primary',
                            'container_class' => 'main-menu-navigation clearfix' ,
                            'menu_class' => 'clearfix',
                            'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 ps-0 text-lg-end">%3$s</ul>',
                            'fallback_cb' => 'wp_page_menu',
                          ) );
                        } 
                      ?>
                    </nav>
                    <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="storefront_ecommerce_menu_close()"><i class="<?php echo esc_attr(get_theme_mod('storefront_ecommerce_responsive_menu_close_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','storefront-ecommerce'); ?></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>