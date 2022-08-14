<?php
/**
 * Header template part for desktop layout.
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
use function Sports_Highlight\Helpers\primary_menu;

?>

<div id="et-header-layout-3" class="header-area">
	<div class="header-middle-bar">
		<div class="et-container et-container-center">
			<div class="logo-ad-wrapper">

				<?php get_template_part( 'template-parts/header/parts/date-social-links' ); ?>

				<div class="site-branding">
					<?php site_branding(); ?>
				</div><!-- .site-branding -->

				<?php get_template_part( 'template-parts/header/parts/header-ad' ); ?>

			</div><!-- .logo-ad-wrapper-->
		</div><!-- .et-container-->
	</div> <!-- .header-middle-bar-->

	<div id="header-menu" class="header-menu-wrap">
		<div class="et-container et-container-center">
			<div class="et-navigation-wrap">
				<div class="main-menu-area">
					<div class="menu-area-left">
						<?php get_template_part( 'template-parts/header/parts/menu-toggler' ); ?>
					</div>
					<?php primary_menu(); ?>
				</div><!-- .main-menu-area -->

				<div class="header-search-area">
					<?php get_search_form(); ?>
					<?php get_template_part( 'template-parts/header/parts/sidebar' ); ?>
				</div><!-- .header-search-area-->

			</div><!-- et-navigation-wrap-->
		</div><!-- .et-container -->
	</div><!-- .end-header-menu-wrap-->


</div><!-- .header-area -->
