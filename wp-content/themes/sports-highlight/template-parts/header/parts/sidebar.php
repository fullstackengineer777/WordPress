<?php
/**
 * Template parts for header sidebar.
 *
 * @package Sports_Highlight
 */

use function Sports_Highlight\Helpers\site_branding;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>


	<div class="offcanvas-nav-wrap">

		<button type="button" class="side-menu-open side-menu-trigger">
			<span class="menu-btn-icon">
				<span class="line line-1"></span>
				<span class="line line-2"></span>
				<span class="line line-3"></span>
			</span>
		</button>

		<div class="sidenav sidecanvas" style="display: none;">
			<div class="canvas-content">

				<a href="#" class="closebtn-canvas" style="display: none;">
					<i class="fa fa-times"></i>
				</a>

				<div class="sidenav-logo">
					<?php site_branding(); ?>
				</div>

				<div class="canvas-inner-contents">
					<?php dynamic_sidebar( 'header-sidebar' ); ?>
				</div>

			</div>
		</div>

	</div><!-- .offcanvas-nav-wrap -->
