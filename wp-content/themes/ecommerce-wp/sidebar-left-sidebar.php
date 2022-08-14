<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */


if ( ! is_active_sidebar( 'left-sidebar') ) {
	return;
}
?>

<div id="sidebar-left" class="sidebar">
    <?php dynamic_sidebar( 'left-sidebar' ); ?>
</div>
