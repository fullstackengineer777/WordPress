<?php
/**
 * Displays main header
 *
 * @package Football Sports Club
 */
?>

<div class="top_header py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 align-self-center text-center text-md-left">
                <?php if(get_theme_mod('football_sports_club_upcoming_match') != ''){ ?>
                    <span><span class="match-cl"><?php esc_html_e('UPCOMING MATCH:  ','football-sports-club'); ?></span> <?php echo esc_html(get_theme_mod('football_sports_club_upcoming_match','')); ?></span>
                <?php }?>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-9 align-self-center text-center text-md-right">
                <?php if(get_theme_mod('football_sports_club_address') != ''){ ?>
                    <span class="mr-3"><i class="fas fa-map-marker-alt mr-2"></i><?php echo esc_html(get_theme_mod('football_sports_club_address','')); ?></span>
                <?php }?>
                <?php if(get_theme_mod('football_sports_club_phone') != ''){ ?>
                    <span><i class="fas fa-phone mr-2"></i><?php echo esc_html(get_theme_mod('football_sports_club_phone','')); ?></span>
                <?php }?>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 align-self-center">
                <div class="social-link text-center text-md-right">
                    <?php if(get_theme_mod('football_sports_club_facebook_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('football_sports_club_facebook_url','')); ?>"><i class="fab fa-facebook-f mr-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('football_sports_club_twitter_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('football_sports_club_twitter_url','')); ?>"><i class="fab fa-twitter mr-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('football_sports_club_intagram_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('football_sports_club_intagram_url','')); ?>"><i class="fab fa-instagram mr-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('football_sports_club_linkedin_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('football_sports_club_linkedin_url','')); ?>"><i class="fab fa-linkedin-in mr-3"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('football_sports_club_youtube_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('football_sports_club_youtube_url','')); ?>"><i class="fab fa-youtube"></i></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 col-8 align-self-center">
                <div class="navbar-brand text-center text-md-left">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo esc_html($description); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-8 col-4 align-self-center">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
        </div>
    </div>
</div>