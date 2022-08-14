<?php
/**
 *  Class for initializing assets.
 *
 *  @package Sports_Highlight
 */

namespace Sports_Highlight;

use Sports_Highlight\Customizer_Helpers;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *  Class for initializing assets.
 *
 *  @package Sports_Highlight
 */
class Assets {

	/**
	 * Fonts array.
	 *
	 * @var array
	 */
	protected $fonts = array();


	/**
	 * Mod key of font family.
	 *
	 * @var string
	 */
	protected $mod_font = '';

	/**
	 * Handle prefixing.
	 */
	const HANDLE_PREFIX = 'sports-highlight';

	/**
	 * Init class.
	 */
	public function __construct() {
		$this->fonts = Customizer_Helpers::get_fonts();
		add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Function to return HANDLE_PREFIX.
	 *
	 * @param string $name String to be prefixed.
	 * @return returns HANDLE_PREFIX
	 */
	public function get_handle( $name ) {
		return self::HANDLE_PREFIX . '-' . $name;
	}

	/**
	 * Function to create vars for css.
	 *
	 * @return void
	 */
	protected function generate_css_vars() {
		$css_vars = array(
			'primary-btn-bg-color'                        => 'theme_buttons_primary_buttons_bg_color',
			'primary-btn-hover'                           => 'theme_buttons_primary_buttons_hover',
			'primary-btn-font'                            => 'theme_buttons_primary_buttons_font',
			'primary-btn-font-hover'                      => 'theme_buttons_primary_buttons_font_hover',
			'primary-btn-primary-border-radius'           => 'theme_buttons_primary_buttons_primary_border_radius',
			'secondary-btn-bg-color'                      => 'theme_buttons_secondary_buttons_bg_color',
			'secondary-btn-hover'                         => 'theme_buttons_secondary_buttons_hover',
			'secondary-btn-font'                          => 'theme_buttons_secondary_buttons_font',
			'secondary-btn-font-hover'                    => 'theme_buttons_secondary_buttons_font_hover',
			'secondary-btn-secondary-border-radius'       => 'theme_buttons_secondary_buttons_secondary_border_radius',
			'general-option-color-primary'                => 'general_option_colors_primary',
			'general-option-color-secondary'              => 'general_option_colors_secondary',
			'general-option-sidebar-width'                => 'general_option_sidebar_width',
			'general-option-layout-boxed-padding'         => 'general_option_layout_boxed_padding',
			'general-option-layout-boxed-bg-color'        => 'general_option_layout_boxed_bg_color',
			'general-option-layout-box-shadow-blur'       => 'general_option_layout_box_shadow_blur',
			'general-option-layout-box-shadow-spread'     => 'general_option_layout_box_shadow_spread',
			'general-option-layout-box-shadow-horizontal' => 'general_option_layout_box_shadow_horizontal',
			'general-option-layout-box-shadow-vertical'   => 'general_option_layout_box_shadow_vertical',
			'general-option-layout-box-shadow-color'      => 'general_option_layout_box_shadow_color',
			'general-option-layout-custom-page-width'     => 'general_option_layout_custom_page_width',
			'general-option-breadcrumbs-bg-color'         => 'general_option_breadcrumbs_bg_color',
			'general-option-breadcrumbs-font-color'       => 'general_option_breadcrumbs_font_color',
			'general-option-breadcrumbs-accent-color'     => 'general_option_breadcrumbs_accent_color',
			'general-option-breadcrumbs-hover-color'      => 'general_option_breadcrumbs_hover_color',
			'general-blog-pagination-font-color'          => 'general_blog_pagination_font_color',
			'general-blog-pagination-font-hover-color'    => 'general_blog_pagination_font_hover_color',
			'general-blog-pagination-font-active-color'   => 'general_blog_pagination_font_active_color',
			'general-option-scroll-top-show-after'        => 'general_option_scroll_top_show_after',
			'general-option-scroll-top-border-radius'     => 'general_option_scroll_top_border_radius',
			'general-option-scroll-top-bg-color'          => 'general_option_scroll_top_bg_color',
			'general-option-scroll-top-bg-hover-color'    => 'general_option_scroll_top_bg_hover_color',
			'general-option-scroll-top-icon-color'        => 'general_option_scroll_top_icon_color',
			'general-option-scroll-top-icon-hover-color'  => 'general_option_scroll_top_icon_hover_color',
			'general-option-widget-bg-color'              => 'general_option_widget_bg_color',
			'general-option-bottom-footer-bg-color'       => 'general_option_bottom_footer_bg_color',
			'general-option-bottom-footer-font-color'     => 'general_option_bottom_footer_font_color',
			'general-option-footer-widget-bg-color'       => 'general_option_footer_widget_bg_color',
			'general-option-footer-widget-font-color'     => 'general_option_footer_widget_font_color',
			'general-option-footer-bg-color'              => 'general_option_footer_bg_color',
			'general-option-footer-bg-color'              => 'general_option_footer_bg_color',
			'typography-option-global-font-dropdown'      => 'typography_option_global_font_dropdown',
			'typography-option-h1-font-dropdown'          => 'typography_option_h1_font_dropdown',
			'typography-option-h2-font-dropdown'          => 'typography_option_h2_font_dropdown',
			'typography-option-h3-font-dropdown'          => 'typography_option_h3_font_dropdown',
			'typography-option-h4-font-dropdown'          => 'typography_option_h4_font_dropdown',
			'typography-option-h5-font-dropdown'          => 'typography_option_h5_font_dropdown',
			'typography-option-h6-font-dropdown'          => 'typography_option_h6_font_dropdown',
			'typography-option-footer-font-dropdown'      => 'typography_option_footer_font_dropdown',
			'typography-option-navigation-font-dropdown'  => 'typography_option_navigation_font_dropdown',
			'typography-option-site-title-font-dropdown'  => 'typography_option_site_title_font_dropdown',
			'typography-option-tagline-font-dropdown'     => 'typography_option_tagline_font_dropdown',
			'typography-option-text-font-dropdown'        => 'typography_option_text_font_dropdown',
			'general-page-banner-section-font-color'      => 'general_page_banner_section_font_color',
			'general-option-footer-link-color'            => 'general_option_footer_link_color',
			'typography-option-global-text-transform'     => 'typography_option_global_text_transform',
			'typography-option-global-font-size'          => 'typography_option_global_font_size',
			'typography-option-global-line-height'        => 'typography_option_global_line_height',
			'typography-option-global-font-weight'        => 'typography_option_global_font_variant',
			'typography-option-h1-font-weight'            => 'typography_option_h1_font_variant_dropdown',
			'typography-option-h1-text-transform'         => 'typography_option_h1_text_transform',
			'typography-option-h1-font-size'              => 'typography_option_h1_font_size',
			'typography-option-h1-line-height'            => 'typography_option_h1_line_height',
			'typography-option-h2-font-weight'            => 'typography_option_h2_font_variant_dropdown',
			'typography-option-h2-text-transform'         => 'typography_option_h2_text_transform',
			'typography-option-h2-font-size'              => 'typography_option_h2_font_size',
			'typography-option-h2-line-height'            => 'typography_option_h2_line_height',
			'typography-option-h3-font-weight'            => 'typography_option_h3_font_variant_dropdown',
			'typography-option-h3-text-transform'         => 'typography_option_h3_text_transform',
			'typography-option-h3-font-size'              => 'typography_option_h3_font_size',
			'typography-option-h3-line-height'            => 'typography_option_h3_line_height',
			'typography-option-h4-font-weight'            => 'typography_option_h4_font_variant_dropdown',
			'typography-option-h4-text-transform'         => 'typography_option_h4_text_transform',
			'typography-option-h4-font-size'              => 'typography_option_h4_font_size',
			'typography-option-h4-line-height'            => 'typography_option_h4_line_height',
			'typography-option-h5-font-weight'            => 'typography_option_h5_font_variant_dropdown',
			'typography-option-h5-text-transform'         => 'typography_option_h5_text_transform',
			'typography-option-h5-font-size'              => 'typography_option_h5_font_size',
			'typography-option-h5-line-height'            => 'typography_option_h5_line_height',
			'typography-option-h6-font-weight'            => 'typography_option_h6_font_variant_dropdown',
			'typography-option-h6-text-transform'         => 'typography_option_h6_text_transform',
			'typography-option-h6-font-size'              => 'typography_option_h6_font_size',
			'typography-option-h6-line-height'            => 'typography_option_h6_line_height',
			'typography-option-footer-font-weight'        => 'typography_option_footer_font_variant_dropdown',
			'typography-option-footer-text-transform'     => 'typography_option_footer_text_transform',
			'typography-option-footer-font-size'          => 'typography_option_footer_font_size',
			'typography-option-footer-line-height'        => 'typography_option_footer_line_height',
			'typography-option-text-font-weight'          => 'typography_option_text_font_variant_dropdown',
			'typography-option-text-transform'            => 'typography_option_text_text_transform',
			'typography-option-text-font-size'            => 'typography_option_text_font_size',
			'typography-option-text-line-height'          => 'typography_option_text_line_height',
			'typography-option-navigation-font-weight'    => 'typography_option_navigation_font_variant_dropdown',
			'typography-option-navigation-text-transform' => 'typography_option_navigation_text_transform',
			'typography-option-navigation-font-size'      => 'typography_option_navigation_font_size',
			'typography-option-navigation-line-height'    => 'typography_option_navigation_line_height',
			'typography-option-site-title-font-weight'    => 'typography_option_site_title_font_variant_dropdown',
			'typography-option-site-title-text-transform' => 'typography_option_site_title_text_transform',
			'typography-option-site-title-font-size'      => 'typography_option_site_title_font_size',
			'typography-option-site-title-line-height'    => 'typography_option_site_title_line_height',
			'typography-option-tagline-font-weight'       => 'typography_option_tagline_font_variant_dropdown',
			'typography-option-tagline-text-transform'    => 'typography_option_tagline_text_transform',
			'typography-option-tagline-font-size'         => 'typography_option_tagline_font_size',
			'typography-option-tagline-line-height'       => 'typography_option_tagline_line_height',
			'typography-option-text-font-color'           => 'typography_option_text_font_color',
			'typography-option-text-accent-color'         => 'typography_option_text_accent_color',
			'typography-option-text-hover-color'          => 'typography_option_text_hover_color',
			'typography-option-h1-toggle'                 => 'typography_option_h1_toggle',
			'typography-option-h2-toggle'                 => 'typography_option_h2_toggle',
			'typography-option-h3-toggle'                 => 'typography_option_h3_toggle',
			'typography-option-h4-toggle'                 => 'typography_option_h4_toggle',
			'general-option-header-bg-color'              => 'general_option_header_bg_color',
			'general-option-topbar-bg-color'              => 'general_option_topbar_bg_color',
			'general-option-header-menu-bg-color'         => 'general_option_header_menu_bg_color',
			'general-option-header-menu-link-color'       => 'general_option_header_menu_link_color',
			'general-option-header-menu-link-color-hover' => 'general_option_header_menu_link_color_hover',
		);

		$css_units = array(
			'general_option_scroll_top_border_radius'     => 'px',
			'general_option_layout_custom_page_width'     => 'px',
			'general_option_sidebar_width'                => '%',
			'general_option_layout_box_shadow_blur'       => 'px',
			'general_option_layout_box_shadow_spread'     => 'px',
			'general_option_layout_box_shadow_horizontal' => 'px',
			'general_option_layout_box_shadow_vertical'   => 'px',
			'theme_buttons_primary_buttons_primary_border_radius' => 'px',
			'theme_buttons_secondary_buttons_secondary_border_radius' => 'px',
			'typography_option_global_line_height'        => 'px',
			'typography_option_global_font_size'          => 'px',
			'typography_option_h1_font_size'              => 'px',
			'typography_option_h1_line_height'            => 'px',
			'typography_option_h2_font_size'              => 'px',
			'typography_option_h2_line_height'            => 'px',
			'typography_option_h3_font_size'              => 'px',
			'typography_option_h3_line_height'            => 'px',
			'typography_option_h4_font_size'              => 'px',
			'typography_option_h4_line_height'            => 'px',
			'typography_option_h5_font_size'              => 'px',
			'typography_option_h5_line_height'            => 'px',
			'typography_option_h6_font_size'              => 'px',
			'typography_option_h6_line_height'            => 'px',
			'typography_option_text_line_height'          => 'px',
			'typography_option_text_font_size'            => 'px',
			'typography_option_footer_line_height'        => 'px',
			'typography_option_footer_font_size'          => 'px',
			'typography_option_navigation_line_height'    => 'px',
			'typography_option_navigation_font_size'      => 'px',
			'typography_option_site_title_line_height'    => 'px',
			'typography_option_site_title_font_size'      => 'px',
			'typography_option_tagline_line_height'       => 'px',
			'typography_option_tagline_font_size'         => 'px',
		);
		?>
		<style id="sports-highlight-css-vars">
			:root{
				<?php
				if ( is_array( $css_vars ) && ! empty( $css_vars ) ) {
					foreach ( $css_vars as $css_var => $mod_key ) {

						$unit      = ! empty( $css_units[ $mod_key ] ) ? $css_units[ $mod_key ] : '';
						$mod_value = Customizer_Helpers::mods( $mod_key );
						$font_name = $this->get_font_name( $mod_value, $mod_key );
						if ( $font_name ) {
							echo sprintf( '--%1$s: %2$s%3$s;', esc_attr( $this->get_handle( $css_var ) ), esc_attr( $font_name ), esc_attr( $unit ) ) . PHP_EOL;
						} else {
							if ( 'general_option_sidebar_width' === $mod_key ) {
								/**
								 * Process everything for css variables.
								 */
								echo sprintf( '--%1$s: %2$s%3$s;', esc_attr( $this->get_handle( "{$css_var}-content" ) ), esc_attr( ( 100 - $mod_value ) ), esc_attr( $unit ) ) . PHP_EOL;
							}
							/**
							 * Process everything for css variables.
							 */
							echo sprintf( '--%1$s: %2$s%3$s;', esc_attr( $this->get_handle( $css_var ) ), esc_attr( $mod_value ), esc_attr( $unit ) ) . PHP_EOL;
						}
					}
				}
				?>
			}
		</style>
		<?php
	}

	/**
	 * Function to enqueue css.
	 *
	 * @return void
	 */
	public function styles() {

		$this->generate_css_vars();

		if ( ! wp_style_is( 'dashicons' ) ) {
			wp_enqueue_style( 'dashicons' );
		}

		wp_enqueue_style( $this->get_handle( 'style' ), get_stylesheet_uri(), array(), SPORTS_HIGHLIGHT_VERSION );
		wp_style_add_data( $this->get_handle( 'style' ), 'rtl', 'replace' );
	}

	/**
	 * All values to be localized.
	 *
	 * @return array
	 */
	protected function localized() {
		$localized = array(
			'scrollTopShowAfter' => Customizer_Helpers::mods( 'general_option_scroll_top_show_after' ),
		);

		return apply_filters( 'sports_highlight_filter_localized', $localized );
	}

	/**
	 * Function to enqueue scripts.
	 *
	 * @return void
	 */
	public function scripts() {

		wp_register_script( $this->get_handle( 'index' ), get_template_directory_uri() . '/assets/js/index.js', array(), SPORTS_HIGHLIGHT_VERSION, false );
		wp_localize_script( $this->get_handle( 'index' ), '_sports_highlight', $this->localized() );
		wp_enqueue_script( $this->get_handle( 'index' ) );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	/**
	 * Function for assigning & to load default value to heading tag accroding to global font setting.
	 *
	 * @param string $font_key to load google font at header.
	 * @param string $tag_font to assign default value.
	 * @return fonts_key
	 */
	protected function get_font_name( $font_key, $tag_font ) {

		if ( strpos( $tag_font, 'font_dropdown' ) ) {
						$mod_value = ! empty( Customizer_Helpers::mods( $tag_font ) ) ? Customizer_Helpers::mods( $tag_font ) : Customizer_Helpers::mods( 'typography_option_global_font_dropdown' );
						$font_key  = $mod_value;
		}
		$fonts = $this->fonts;

		if ( empty( $fonts[ $font_key ] ) ) {
			return;
		}
		$handle   = str_replace( ' ', '-', $fonts[ $font_key ] );
		$font_url = "//fonts.googleapis.com/css?family={$font_key}";
		wp_enqueue_style( "load-google-font-{$handle}", $font_url, array(), SPORTS_HIGHLIGHT_VERSION );
		return $fonts[ $font_key ] . ', Verdana, Helvetica, Arial, sans-serif';

	}

}

new Assets();

