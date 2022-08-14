<?php
/**
 * Customizer initializing class.
 *
 * @package Sports_Highlight
 */

namespace Sports_Highlight;

/**
 * Class for initializing customizer.
 */
class Customizer {

	/**
	 * Init class.
	 */
	public function __construct() {
		$this->init_hooks();
	}

	/**
	 * Init hooks.
	 *
	 * @return void
	 */
	private function init_hooks() {
		add_action( 'customize_register', array( $this, 'customize_register' ) );
		add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ) );
	}

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => array( $this, 'customize_partial_blogname' ),
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => array( $this, 'customize_partial_blogdescription' ),
				)
			);
		}

		$files = array(
			/**
			* Custom Customizer Control.
			*/
			'/inc/customizer/custom-controls/class-customizer-range-value-control/class-customizer-range-value-control.php',
			'/inc/customizer/custom-controls/class-customizer-toggle-control/class-customizer-toggle-control.php',
			'/inc/customizer/custom-controls/class-customizer-dropdown-control/class-customizer-dropdown-control.php',
			'/inc/customizer/custom-controls/class-customizer-header/class-customizer-font-header.php',
			'/inc/customizer/custom-controls/class-customizer-header/class-customizer-custom-header.php',
			'/inc/customizer/custom-controls/class-customizer-separator/class-customizer-separator.php',
			'/inc/customizer/custom-controls/class-customizer-text-radio-button/class-customizer-text-radio-button.php',

			'/inc/customizer/panels.php',

			// General Panel .
			'/inc/customizer/settings/general/colors.php',
			'/inc/customizer/settings/general/layout.php',
			'/inc/customizer/settings/general/404.php',
			'/inc/customizer/settings/general/sidebar.php',
			'/inc/customizer/settings/general/breadcrumbs.php',
			'/inc/customizer/settings/general/scroll-top.php',
			'/inc/customizer/settings/general/footer.php',
			'/inc/customizer/settings/general/topbar.php',
			'/inc/customizer/settings/general/header.php',
			'/inc/customizer/settings/general/blog.php',
			'/inc/customizer/settings/general/page-banner.php',

			// Theme Buttons Panel.
			'/inc/customizer/settings/theme-buttons/primary-button.php',
			'/inc/customizer/settings/theme-buttons/secondary-button.php',

			// Typography Panel.
			'/inc/customizer/settings/typography/global.php',
			'/inc/customizer/settings/typography/site-title.php',
			'/inc/customizer/settings/typography/navigation.php',
			'/inc/customizer/settings/typography/text.php',
			'/inc/customizer/settings/typography/h1.php',
			'/inc/customizer/settings/typography/h2.php',
			'/inc/customizer/settings/typography/h3.php',
			'/inc/customizer/settings/typography/h4.php',
			'/inc/customizer/settings/typography/h5.php',
			'/inc/customizer/settings/typography/h6.php',
			'/inc/customizer/settings/typography/footer.php',
		);

		if ( is_array( $files ) && ! empty( $files ) ) {
			foreach ( $files as $file ) {
				require_once get_template_directory() . $file;
			}
		}
	}

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	public function customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	public function customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	public function customize_preview_js() {
		wp_enqueue_script( 'sports-highlight-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), SPORTS_HIGHLIGHT_VERSION, true );
	}
}
new Customizer();
