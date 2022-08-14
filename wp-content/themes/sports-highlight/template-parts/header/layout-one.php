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

use function Sports_Highlight\Helpers\primary_menu;

?>

<div id="et-header-layout-1" class="header-area">

	<?php

	get_template_part( 'template-parts/header/parts/topbar' );

	get_template_part( 'template-parts/header/parts/site-branding' );

	?>

	<div id="header-menu" class="header-menu-wrap">
		<div class="et-container et-container-center">
			<div class="et-navigation-wrap">
			<div class="sidebar-icon-area">
				<?php get_template_part( 'template-parts/header/parts/sidebar' ); ?>
			</div><!-- .sidebar-icon-area-->

				<div class="main-menu-area">

					<?php

					get_template_part( 'template-parts/header/parts/menu-toggler' );

					primary_menu();
					?>

				</div><!-- .main-menu-area -->

				<div class="header-search-area">
					<?php get_search_form(); ?>
				</div><!-- .header-search-area-->

			</div><!-- et-navigation-wrap-->
		</div><!-- .et-container -->
	</div><!-- .end-header-menu-wrap-->
</div><!-- .header-area -->
