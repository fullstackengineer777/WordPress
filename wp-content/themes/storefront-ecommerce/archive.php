<?php
/**
 * The template for displaying Archive pages.
 * @package Storefront Ecommerce
 */
get_header(); ?>

<main role="main" id="skip_content">
    <div class="container">
        <?php
        $storefront_ecommerce_layout_option = get_theme_mod( 'storefront_ecommerce_layout_options','Right Sidebar');
        if($storefront_ecommerce_layout_option == 'One Column'){ ?>
            <div class="blog-section">
                <?php if(get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                    <?php if( get_theme_mod( 'storefront_ecommerce_enable_post_pagination',true) != '') { ?>
                        <div class="navigation">
                            <?php storefront_ecommerce_pagination_type(); ?>
                        </div>
                    <?php } ?>
                <?php } ?>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>   
                <?php storefront_ecommerce_blog_post_content(); ?>
                <?php if(get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                    <?php if( get_theme_mod( 'storefront_ecommerce_enable_post_pagination',true) != '') { ?>
                        <div class="navigation">
                            <?php storefront_ecommerce_pagination_type(); ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php }else if($storefront_ecommerce_layout_option == 'Grid Layout'){ ?>
            <div class="row">
                <div class="blog-section col-lg-8 col-md-8">
                    <?php if(get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'storefront_ecommerce_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php storefront_ecommerce_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?> 
                    <div class="row">
                        <?php if ( have_posts() ) :
                            /* Start the Loop */          
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/grid-layout' );
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                    </div>
                    <?php if(get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'storefront_ecommerce_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php storefront_ecommerce_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
            </div>
        <?php }else if($storefront_ecommerce_layout_option == 'Left Sidebar'){ ?>
            <div class="row">
                <div class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
                <div class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 blog-section"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php if(get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'storefront_ecommerce_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php storefront_ecommerce_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>   
                    <?php storefront_ecommerce_blog_post_content(); ?>
                    <?php if(get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'storefront_ecommerce_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php storefront_ecommerce_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php }else if($storefront_ecommerce_layout_option == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 blog-section"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php if(get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'storefront_ecommerce_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php storefront_ecommerce_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>   
                    <?php storefront_ecommerce_blog_post_content(); ?>
                    <?php if(get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'storefront_ecommerce_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php storefront_ecommerce_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
            </div>
        <?php } else {?>
            <div class="row">
                <div class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-8 col-md-8 blog-section"<?php } else { ?>col-lg-9 col-md-8 <?php } ?>">
                    <?php if(get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Top' || get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'storefront_ecommerce_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php storefront_ecommerce_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>   
                    <?php storefront_ecommerce_blog_post_content(); ?>
                    <?php if(get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Bottom' || get_theme_mod('storefront_ecommerce_post_pagination_position', 'Bottom') == 'Both Top & Bottom'){ ?>
                        <?php if( get_theme_mod( 'storefront_ecommerce_enable_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php storefront_ecommerce_pagination_type(); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="<?php if( get_theme_mod( 'storefront_ecommerce_sidebar_size', 'Sidebar 1/3') == 'Sidebar 1/3') { ?>col-lg-4 col-md-4"<?php } else { ?>col-lg-3 col-md-4 <?php } ?>"><?php get_sidebar(); ?></div>
            </div>
        <?php }?>
    </div>
</main>

<div class="clearfix"></div>
<?php get_footer(); ?>