<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package VW Sports
 */
?>

<div id="sidebar" <?php if( is_page_template('blog-post-left-sidebar.php')){?> style="float:left;"<?php } ?>>    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside id="archives" class="widget" role="complementary" aria-label="firstsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'vw-sports' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside id="meta" class="widget" role="complementary" aria-label="secondsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'vw-sports' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; ?>
</div>