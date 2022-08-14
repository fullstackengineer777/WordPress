<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sports_Highlight
 */

use function Sports_Highlight\Helpers\get_singular_sidebar;
use function Sports_Highlight\Helpers\siderbar_classes;

if ( 'no' === get_singular_sidebar() ) {
	return;
}

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}

?>

<div id="secondary" class="et-md-1-3 et-sidebar-wrapper">
	<aside class="widget-area <?php siderbar_classes(); ?>">
		<?php dynamic_sidebar( 'main-sidebar' ); ?>
	</aside>
</div><!-- #secondary -->
