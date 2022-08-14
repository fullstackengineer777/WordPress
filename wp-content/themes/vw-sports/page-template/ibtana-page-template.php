<?php
/**
 * Template Name: Ibtana Page Template
 */

get_header(); ?>

<?php do_action( 'vw_sports_page_top' ); ?>

<main id="maincontent" class="middle-align" role="main">  
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <div id="content-vw">
                <?php the_content();?>
                <div class="clearfix"></div>
            </div> 
        <?php endwhile; ?>
    </div>
</main>

<?php do_action( 'vw_sports_page_bottom' ); ?>

<?php get_footer(); ?>