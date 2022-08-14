<?php
/**
 * Header template parts for site branding section.
 *
 * @package Sports_Highlight
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use function Sports_Highlight\Helpers\site_branding;

?>

<div class="header-middle-bar">
	<div class="et-container et-container-center">
		<div class="logo-ad-wrapper">
			<div class="site-branding">
				<?php site_branding(); ?>
			</div><!-- .site-branding -->

			<?php get_template_part( 'template-parts/header/parts/header-ad' ); ?>

		</div><!-- .logo-ad-wrapper-->
	</div><!-- .et-container-->
</div> <!-- .header-middle-bar-->
