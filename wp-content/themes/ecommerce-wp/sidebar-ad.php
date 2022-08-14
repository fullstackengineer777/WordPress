<?php
/**
 * The sidebar containing header Ad widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */


if ( ! is_active_sidebar( 'sidebar-ad') ) {
	return;
}
?>

<div id="sidebar-ad" class="sidebar">
    <?php dynamic_sidebar( 'sidebar-ad' ); ?>
</div>
