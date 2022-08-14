<?php
/**
 * Header template parts for top bar.
 *
 * @package Sports_Highlight
 */

use Sports_Highlight\Customizer_Helpers;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! Customizer_Helpers::mods( 'general_option_topbar_enable_topbar' ) ) {
	return;
}

?>

<div id="tophead" class="header-top-bar">
	<div class="et-container et-container-center">
		<div class="top-bar-wrap">

			<?php
			
			get_template_part( 'template-parts/header/parts/news-ticker' );
			get_template_part( 'template-parts/header/parts/date-social-links' );

			?>

		</div>
	</div> <!-- .et-conteiner -->
</div> <!-- .header-top-bar -->
