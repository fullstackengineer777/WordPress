<?php
/**
 * The template part for header
 *
 * @package VW Sports 
 * @subpackage vw-sports
 * @since vw-sports 1.0
 */
?>

<div id="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 ps-md-0 position-relative">
        <?php get_template_part('template-parts/header/middle-header'); ?>
      </div>
      <div class="col-lg-8 col-md-8">
        <?php if(has_nav_menu('primary')){ ?>
          <div class="toggle-nav mobile-menu text-center text-md-end my-1">
            <button role="tab" onclick="vw_sports_menu_open_nav()" class="responsivetoggle"><i class="py-2 px-3 <?php echo esc_attr(get_theme_mod('vw_sports_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-sports'); ?></span></button>
          </div>
        <?php } ?>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-sports' ); ?>">
            <?php if(has_nav_menu('primary')){
              wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) );
            } ?>
            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_sports_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_sports_res_close_menu_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-sports'); ?></span></a>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>