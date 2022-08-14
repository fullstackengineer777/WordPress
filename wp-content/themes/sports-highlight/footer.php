<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sports_Highlight
 */

namespace  Sports_Highlight;

use function Sports_Highlight\Helpers\footer_classes;
use function Sports_Highlight\Helpers\get_singular_footer;


do_action( 'sports_highlight_before_footer' );

if ( get_singular_footer() ) {
	$widget_areas = array(
		'footer-widgets-1',
		'footer-widgets-2',
		'footer-widgets-3',
		'footer-widgets-4',
	);
	?>
		<footer id="colophon" class="<?php footer_classes(); ?>">
		<?php
			/**
			 * Load widgets area html.
			 */
			get_template_part( 'template-parts/footer/widgets-area' );
			/**
			 * Load copyright html.
			 */
			get_template_part( 'template-parts/footer/copyright' );
		?>
		</footer><!-- #colophon -->
		<?php
}

do_action( 'sports_highlight_after_footer' );

?>
</div><!-- #page -->

<?php

do_action( 'sports_highlight_before_scroll_to_top' );

/**
 * Load scroll to top html.
 */
get_template_part( 'template-parts/footer/scroll-to-top' );
wp_footer();
?>

</body>

</html>
