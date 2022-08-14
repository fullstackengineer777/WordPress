<?php
/**
 * The template part for displaying a message that posts cannot be found.
 * @package Storefront Ecommerce
 */
?>

<header role="banner">
	<?php if( get_theme_mod('storefront_ecommerce_no_search_result_heading','Nothing Found') != ''){ ?>
		<h2 class="entry-title"><?php echo esc_html(get_theme_mod('storefront_ecommerce_no_search_result_heading',__('Nothing Found','storefront-ecommerce')));?></h2>
	<?php } ?>
</header>
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.','storefront-ecommerce'), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php elseif ( is_search() ) : ?>
	<p><?php echo esc_html(get_theme_mod('storefront_ecommerce_no_search_result_text',__('Sorry, but nothing matched your search terms. Please try again with some different keywords.','storefront-ecommerce')));?></p><br />
		<?php get_search_form(); ?>
<?php else : ?>
	<p><?php esc_html_e( 'Dont worry it happens to the best of us.', 'storefront-ecommerce' ); ?></p><br />
	<div class="read-moresec my-5 mx-0">
		<a href="<?php echo esc_url( home_url() ); ?>" class="button mt-3 mx-0 mb-0 py-2 px-3"><?php esc_html_e( 'Back to Home Page', 'storefront-ecommerce' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'storefront-ecommerce' ); ?></span></a>
	</div>
<?php endif; ?>