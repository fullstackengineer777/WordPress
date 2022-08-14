<?php
/**
 * Class file that provides helpers methods for customizer related work.
 *
 * @package Sports_Highlight
 */

namespace Sports_Highlight;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class that provides helpers methods for customizer related work.
 */
class Customizer_Helpers {

	const MOD_NAME = 'sports_highlight_theme_mod';

	/**
	 * Method for default values for customizer.
	 *
	 * @return array With default value.
	 */
	public static function defaults() {
		return apply_filters(
			'sports_highlight_customizer_defaults',
			array(
				'general_option_sidebar'                   => 'right',
				'general_option_404_title'                 => esc_html__( 'Oops! That page can\'t be found.', 'sports-highlight' ),
				'general_option_404_textarea'              => esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'sports-highlight' ),
				'general_option_404_search_form'           => 'show',
				/* translators: %s is current year. */
				'general_option_footer_copyright'          => sprintf( esc_html__( 'Copyright &copy; %s, Everest Themes', 'sports-highlight' ), wp_date( 'Y' ) ),
				'general_blog_excerpt_length'              => 55,
				'general_blog_excerpt_indicator'           => '[...]',
				'general_blog_read_more_text'              => esc_html__( 'Read more', 'sports-highlight' ),
				'general_option_footer_toggle'             => 1,
				'general_option_footer_widget_toggle'      => 1,
				'theme_buttons_primary_buttons_bg_color'   => '#4169E1',
				'theme_buttons_primary_buttons_hover'      => '#242424',
				'theme_buttons_primary_buttons_font'       => '#FFFFFF',
				'theme_buttons_primary_buttons_font_hover' => '#FFFFFF',
				'theme_buttons_primary_buttons_primary_border_radius' => 0,
				'theme_buttons_secondary_buttons_bg_color' => '#D7D7D7',
				'theme_buttons_secondary_buttons_hover'    => '#D7D7D7',
				'theme_buttons_secondary_buttons_font'     => '#D7D7D7',
				'theme_buttons_secondary_buttons_font_hover' => '#D7D7D7',
				'theme_buttons_secondary_buttons_secondary_border_radius' => 0,
				'general_option_colors_primary'            => '#2962FF',
				'general_option_colors_secondary'          => '#242424',
				'general_option_sidebar_width'             => 33.33,
				'general_option_layout_boxed_padding'      => 20,
				'general_option_layout_boxed_bg_color'     => '#000000',
				'general_option_layout_box_shadow_blur'    => 100,
				'general_option_layout_box_shadow_spread'  => 100,
				'general_option_layout_box_shadow_horizontal' => 100,
				'general_option_layout_box_shadow_vertical' => 100,
				'general_option_layout_box_shadow_color'   => '#000000',
				'general_option_layout_custom_page_width'  => 1200,
				'general_option_breadcrumbs_bg_color'      => '#e3e3e3',
				'general_option_breadcrumbs_font_color'    => '#000000',
				'general_option_breadcrumbs_accent_color'  => '#000000',
				'general_option_breadcrumbs_hover_color'   => '#000000',
				'general_option_breadcrumbs_alignment'     => 'breadcrumb-left',
				'general_blog_pagination_font_color'       => '#000000',
				'general_blog_pagination_font_hover_color' => '#000000',
				'general_blog_pagination_font_active_color' => '#000000',
				'general_option_scroll_top_show_after'     => 100,
				'general_option_scroll_top_border_radius'  => 0,
				'general_option_scroll_top_bg_color'       => '#242424',
				'general_option_scroll_top_bg_hover_color' => '#000000',
				'general_option_scroll_top_icon_color'     => '#FFFFFF',
				'general_option_scroll_top_icon_hover_color' => '#FFFFFF',
				'general_option_breadcrumbs_display_option' => array(),
				'general_option_breadcrumbs_separator'     => '&#8250;',
				'general_option_header_theme_title_toggle' => 1,
				'general_option_header_theme_tagline_toggle' => 1,
				'general_option_header_page_title_toggle'  => 1,
				'general_option_widget_bg_color'           => '',
				'general_option_scroll_top_icon'           => 'dashicons-arrow-up-alt',
				'general_option_scroll_top_position'       => 'right',
				'general_option_bottom_footer_bg_color'    => '#727272',
				'general_option_bottom_footer_font_color'  => '#ffffff',
				'general_option_footer_widget_bg_color'    => '#eeeeee',
				'general_option_footer_widget_font_color'  => '#000000',
				'general_option_footer_bg_color'           => '#eeeeee',
				'general_option_footer_copyright_alignment' => 'center',
				'general_option_layout_box_shadow_blur'    => 25,
				'general_option_layout_box_shadow_spread'  => 0,
				'general_option_layout_box_shadow_horizontal' => 0,
				'general_option_layout_box_shadow_vertical' => 0,
				'general_option_layout_box_shadow_color'   => '#242424',
				'general_page_banner_section_font_color'   => '#242424',
				'general_option_footer_link_color'         => '#4169e1',
				'general_option_header_layout'             => 'layout-one',
				'general_option_topbar_enable_topbar'      => 1,
				'general_option_topbar_display_topbar_date' => 1,
				'general_option_sidebar_gap'               => 'divider',
				'general_blog_post_layout_dropdown'        => 'default',
				'typography_option_global_toggle'          => 1,
				'typography_option_global_font_dropdown'   => 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
				'typography_option_global_font_variant'    => 'inherit',
				'typography_option_global_font_size'       => 16,
				'typography_option_global_line_height'     => 27,
				'typography_option_global_text_transform'  => 'inherit',
				'typography_option_h1_font_variant_dropdown' => 'inherit',
				'typography_option_h1_text_transform'      => 'inherit',
				'typography_option_h1_font_size'           => 40,
				'typography_option_h1_line_height'         => 50,
				'typography_option_h2_font_variant_dropdown' => 'inherit',
				'typography_option_h2_text_transform'      => 'inherit',
				'typography_option_h2_font_size'           => 30,
				'typography_option_h2_line_height'         => 40,
				'typography_option_h3_font_variant_dropdown' => 'inherit',
				'typography_option_h3_text_transform'      => 'inherit',
				'typography_option_h3_font_size'           => 25,
				'typography_option_h3_line_height'         => 35,
				'typography_option_h4_font_variant_dropdown' => 'inherit',
				'typography_option_h4_text_transform'      => 'inherit',
				'typography_option_h4_font_size'           => 20,
				'typography_option_h4_line_height'         => 30,
				'typography_option_h5_font_variant_dropdown' => 'inherit',
				'typography_option_h5_text_transform'      => 'inherit',
				'typography_option_h5_font_size'           => 18,
				'typography_option_h5_line_height'         => 28,
				'typography_option_h6_font_variant_dropdown' => 'inherit',
				'typography_option_h6_text_transform'      => 'inherit',
				'typography_option_h6_font_size'           => 16,
				'typography_option_h6_line_height'         => 27,
				'typography_option_footer_font_variant_dropdown' => 'inherit',
				'typography_option_footer_text_transform'  => 'inherit',
				'typography_option_footer_font_size'       => 16,
				'typography_option_footer_line_height'     => 27,
				'typography_option_text_font_variant_dropdown' => 'inherit',
				'typography_option_text_text_transform'    => 'inherit',
				'typography_option_text_font_size'         => 16,
				'typography_option_text_line_height'       => 27,
				'typography_option_navigation_font_variant_dropdown' => 'inherit',
				'typography_option_navigation_text_transform' => 'inherit',
				'typography_option_navigation_font_size'   => 16,
				'typography_option_navigation_line_height' => 27,
				'typography_option_site_title_font_variant_dropdown' => 500,
				'typography_option_site_title_text_transform' => 'inherit',
				'typography_option_site_title_font_size'   => 32,
				'typography_option_site_title_line_height' => 40,
				'typography_option_tagline_font_variant_dropdown' => 400,
				'typography_option_tagline_text_transform' => 'inherit',
				'typography_option_tagline_font_size'      => 18,
				'typography_option_tagline_line_height'    => 27,
				'typography_option_text_font_color'        => '#242424',
				'typography_option_text_accent_color'      => '#4169E1',
				'typography_option_text_hover_color'       => '#191970',
				'general_option_topbar_bg_color'           => '#242424',
				'general_option_header_bg_color'           => '#ffffff',
				'general_option_header_menu_bg_color'      => '#f5f5f5',
				'general_option_header_menu_link_color'    => '#242424',
				'general_option_header_menu_link_color_hover' => '#0000FF',
			)
		);
	}

	/**
	 * Function for mods to
	 *
	 * @param string $key is string from controller.
	 *
	 * @param mixed  $default Custom default value.
	 *
	 * @return mixed $mods key or default value.
	 */
	public static function mods( $key, $default = null ) {
		$mods     = get_theme_mod( self::MOD_NAME );
		$defaults = ! is_null( $default ) ? $default : self::defaults();
		$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
		return isset( $mods[ $key ] ) ? $mods[ $key ] : $default;
	}

	/**
	 * Register options for customizer controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @param array                $option args for customizer setting.
	 *
	 * @return void
	 */
	public static function register_option( $wp_customize, $option ) {
		$key      = $option['name'];
		$defaults = self::defaults();
		$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : null;

		if ( isset( $option['default'] ) ) {
			$default = $option['default'];
		}

		$key  = str_replace( '[', '][', $key );
		$name = self::MOD_NAME . "[{$key}]";
		$name = str_replace( ']]', ']', $name );

		// Initialize Setting.
		$wp_customize->add_setting(
			$name,
			array(
				'sanitize_callback' => $option['sanitize_callback'],
				'default'           => $default,
				'transport'         => isset( $option['transport'] ) ? $option['transport'] : 'refresh',
				'theme_supports'    => isset( $option['theme_supports'] ) ? $option['theme_supports'] : '',
			)
		);

		$control = array(
			'label'    => $option['label'],
			'section'  => $option['section'],
			'settings' => $name,
		);

		if ( isset( $option['active_callback'] ) ) {
			$control['active_callback'] = $option['active_callback'];
		}

		if ( isset( $option['priority'] ) ) {
			$control['priority'] = $option['priority'];
		}

		if ( isset( $option['choices'] ) ) {
			$control['choices'] = $option['choices'];
		}

		if ( isset( $option['type'] ) ) {
			$control['type'] = $option['type'];
		}

		if ( isset( $option['input_attrs'] ) ) {
			$control['input_attrs'] = $option['input_attrs'];
		}

		if ( isset( $option['description'] ) ) {
			$control['description'] = $option['description'];
		}

		if ( isset( $option['mime_type'] ) ) {
			$control['mime_type'] = $option['mime_type'];
		}

		if ( ! empty( $option['custom_control'] ) ) {
			$wp_customize->add_control( new $option['custom_control']( $wp_customize, $name, $control ) );
		} else {
			$wp_customize->add_control( $name, $control );
		}
	}

	/**
	 * Parse fonts array into key and value pairs.
	 *
	 * @param array $fonts Fonts array.
	 * @return array
	 */
	protected static function parse_fonts( $fonts ) {

		$parsed = array();

		if ( is_array( $fonts ) && ! empty( $fonts ) ) {
			foreach ( $fonts as $font ) {
				$font_explode = explode( ':', $font );

				if ( ! isset( $font_explode[1] ) ) {
					continue;
				}

				$key = $font_explode[0] . ':' . $font_explode[1];

				$parsed[ $key ] = str_replace( '+', ' ', $font_explode[0] );
			}
		}

		asort( $parsed );

		return $parsed;

	}

	/**
	 * Method for font types.
	 *
	 * @return array of fonts type.
	 */
	public static function get_fonts() {

		static $cached = array();

		if ( $cached ) {
			return $cached;
		}

		$fonts = array(
			'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
			'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
			'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
			'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
			'Caveat:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
			'Licorice:ital,wght@0,400;0,500;',
			'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap',
			'Island+Moments:ital,wght@&display=swap',
			'The+Nautigal:wght@400;700&display=swap',
			'Dancing+Script:wght@400;500;600;700&display=swap',
			'Cinzel:wght@400;500;600;700;800;900&display=swap',
			'Pacifico:wght@400;500;600;700&display=swap',
			'Abril+Fatface:wght@400;500;600;700&display=swap',
			'Alfa+Slab+One:wght@400;500;600;700&display=swap',
		);

		$fonts = apply_filters( 'sports_highlight_fonts', $fonts );

		$cached = self::parse_fonts( $fonts );

		return $cached;
	}

	/**
	 * Returns category array with category id and name.
	 *
	 * @return array
	 */
	public static function get_categories() {

		$cats       = array();
		$categories = get_categories();

		if ( is_array( $categories ) && ! empty( $categories ) ) {
			foreach ( $categories as $category ) {
				$cats[ $category->term_id ] = $category->name;
			}
		}

		return $cats;
	}

	/**
	 * Method for fonts weight.
	 *
	 * @return array of fonts weight.
	 */
	public static function fonts_variant() {
		$variant = array(
			'inherit' => esc_html( 'Inherit' ),
			'400'     => esc_html( 'Normal ' ),
			'500'     => esc_html( 'Medium ' ),
			'600'     => esc_html( 'Semi Bold' ),
			'700'     => esc_html( 'Bold' ),
			'800'     => esc_html( 'Extra Bold' ),
			'900'     => esc_html( 'Ultra Bold' ),
		);

		return apply_filters( 'sports_highlight_variant', $variant );
	}

	/**
	 * Method for Text Transform.
	 *
	 * @return array of Text Transform.
	 */
	public static function text_transform() {
		$text_transform = array(
			'None'       => esc_html( 'None' ),
			'Capitalize' => esc_html( 'Capitalize ' ),
			'Uppercase'  => esc_html( 'Uppercase ' ),
			'Lowercase'  => esc_html( 'Lowercase' ),

		);

		return apply_filters( 'sports_highlight_text_transform', $text_transform );
	}

	/**
	 * Method for fa classes.
	 *
	 * @param string $filter Filter and list array by.
	 * @return array of fa classes.
	 */
	public static function get_dashicons_classes( $filter = null ) {

		$dashicons = array(
			'dashicons-menu'                    => __( 'Menu', 'sports-highlight' ),
			'dashicons-dashboard'               => __( 'Dashboard', 'sports-highlight' ),
			'dashicons-admin-site'              => __( 'Admin-site', 'sports-highlight' ),
			'dashicons-admin-media'             => __( 'Admin-media', 'sports-highlight' ),
			'dashicons-admin-page'              => __( 'Admin-page', 'sports-highlight' ),
			'dashicons-admin-comments'          => __( 'Admin-comments', 'sports-highlight' ),
			'dashicons-admin-appearance'        => __( 'Admin-appearance', 'sports-highlight' ),
			'dashicons-admin-plugins'           => __( 'Admin-plugins', 'sports-highlight' ),
			'dashicons-admin-users'             => __( 'Admin-users', 'sports-highlight' ),
			'dashicons-admin-tools'             => __( 'Admin-tools', 'sports-highlight' ),
			'dashicons-admin-settings'          => __( 'Admin-settings', 'sports-highlight' ),
			'dashicons-admin-network'           => __( 'Admin-network', 'sports-highlight' ),
			'dashicons-admin-generic'           => __( 'Admin-generic', 'sports-highlight' ),
			'dashicons-admin-home'              => __( 'Admin-home', 'sports-highlight' ),
			'dashicons-admin-collapse'          => __( 'Admin-collapse', 'sports-highlight' ),
			'dashicons-admin-links'             => __( 'Admin-links', 'sports-highlight' ),
			'dashicons-admin-post'              => __( 'Admin-post', 'sports-highlight' ),
			'dashicons-format-standard'         => __( 'Format-standard', 'sports-highlight' ),
			'dashicons-format-image'            => __( 'Format-image', 'sports-highlight' ),
			'dashicons-format-gallery'          => __( 'Format-gallery', 'sports-highlight' ),
			'dashicons-format-audio'            => __( 'Format-audio', 'sports-highlight' ),
			'dashicons-format-video'            => __( 'Format-video', 'sports-highlight' ),
			'dashicons-format-links'            => __( 'Format-links', 'sports-highlight' ),
			'dashicons-format-chat'             => __( 'Format-chat', 'sports-highlight' ),
			'dashicons-format-status'           => __( 'Format-status', 'sports-highlight' ),
			'dashicons-format-aside'            => __( 'Format-aside', 'sports-highlight' ),
			'dashicons-format-quote'            => __( 'Format-quote', 'sports-highlight' ),
			'dashicons-welcome-write-blog'      => __( 'Welcome-write-blog', 'sports-highlight' ),
			'dashicons-welcome-edit-page'       => __( 'Welcome-edit-page', 'sports-highlight' ),
			'dashicons-welcome-add-page'        => __( 'Welcome-add-page', 'sports-highlight' ),
			'dashicons-welcome-view-site'       => __( 'Welcome-view-site', 'sports-highlight' ),
			'dashicons-welcome-widgets-menus'   => __( 'Welcome-widgets-menus', 'sports-highlight' ),
			'dashicons-welcome-comments'        => __( 'Welcome-comments', 'sports-highlight' ),
			'dashicons-welcome-learn-more'      => __( 'Welcome-learn-more', 'sports-highlight' ),
			'dashicons-image-crop'              => __( 'Image-crop', 'sports-highlight' ),
			'dashicons-image-rotate-left'       => __( 'Image-rotate-left', 'sports-highlight' ),
			'dashicons-image-rotate-right'      => __( 'Image-rotate-right', 'sports-highlight' ),
			'dashicons-image-flip-vertical'     => __( 'Image-flip-vertical', 'sports-highlight' ),
			'dashicons-image-flip-horizontal'   => __( 'Image-flip-horizontal', 'sports-highlight' ),
			'dashicons-undo'                    => __( 'Undo', 'sports-highlight' ),
			'dashicons-redo'                    => __( 'Redo', 'sports-highlight' ),
			'dashicons-editor-bold'             => __( 'Editor-bold', 'sports-highlight' ),
			'dashicons-editor-italic'           => __( 'Editor-italic', 'sports-highlight' ),
			'dashicons-editor-ul'               => __( 'Editor-ul', 'sports-highlight' ),
			'dashicons-editor-ol'               => __( 'Editor-ol', 'sports-highlight' ),
			'dashicons-editor-quote'            => __( 'Editor-quote', 'sports-highlight' ),
			'dashicons-editor-alignleft'        => __( 'Editor-alignleft', 'sports-highlight' ),
			'dashicons-editor-aligncenter'      => __( 'Editor-aligncenter', 'sports-highlight' ),
			'dashicons-editor-alignright'       => __( 'Editor-alignright', 'sports-highlight' ),
			'dashicons-editor-insertmore'       => __( 'Editor-insertmore', 'sports-highlight' ),
			'dashicons-editor-spellcheck'       => __( 'Editor-spellcheck', 'sports-highlight' ),
			'dashicons-editor-distractionfree'  => __( 'Editor-distractionfree', 'sports-highlight' ),
			'dashicons-editor-expand'           => __( 'Editor-expand', 'sports-highlight' ),
			'dashicons-editor-contract'         => __( 'Editor-contract', 'sports-highlight' ),
			'dashicons-editor-kitchensink'      => __( 'Editor-kitchensink', 'sports-highlight' ),
			'dashicons-editor-underline'        => __( 'Editor-underline', 'sports-highlight' ),
			'dashicons-editor-justify'          => __( 'Editor-justify', 'sports-highlight' ),
			'dashicons-editor-textcolor'        => __( 'Editor-textcolor', 'sports-highlight' ),
			'dashicons-editor-paste-word'       => __( 'Editor-paste-word', 'sports-highlight' ),
			'dashicons-editor-paste-text'       => __( 'Editor-paste-text', 'sports-highlight' ),
			'dashicons-editor-removeformatting' => __( 'Editor-removeformatting', 'sports-highlight' ),
			'dashicons-editor-video'            => __( 'Editor-video', 'sports-highlight' ),
			'dashicons-editor-customchar'       => __( 'Editor-customchar', 'sports-highlight' ),
			'dashicons-editor-outdent'          => __( 'Editor-outdent', 'sports-highlight' ),
			'dashicons-editor-indent'           => __( 'Editor-indent', 'sports-highlight' ),
			'dashicons-editor-help'             => __( 'Editor-help', 'sports-highlight' ),
			'dashicons-editor-strikethrough'    => __( 'Editor-strikethrough', 'sports-highlight' ),
			'dashicons-editor-unlink'           => __( 'Editor-unlink', 'sports-highlight' ),
			'dashicons-editor-rtl'              => __( 'Editor-rtl', 'sports-highlight' ),
			'dashicons-editor-break'            => __( 'Editor-break', 'sports-highlight' ),
			'dashicons-editor-code'             => __( 'Editor-code', 'sports-highlight' ),
			'dashicons-editor-paragraph'        => __( 'Editor-paragraph', 'sports-highlight' ),
			'dashicons-align-left'              => __( 'Align-left', 'sports-highlight' ),
			'dashicons-align-right'             => __( 'Align-right', 'sports-highlight' ),
			'dashicons-align-center'            => __( 'Align-center', 'sports-highlight' ),
			'dashicons-align-none'              => __( 'Align-none', 'sports-highlight' ),
			'dashicons-lock'                    => __( 'Lock', 'sports-highlight' ),
			'dashicons-calendar'                => __( 'Calendar', 'sports-highlight' ),
			'dashicons-visibility'              => __( 'Visibility', 'sports-highlight' ),
			'dashicons-post-status'             => __( 'Post-status', 'sports-highlight' ),
			'dashicons-edit'                    => __( 'Edit', 'sports-highlight' ),
			'dashicons-post-trash'              => __( 'Post-trash', 'sports-highlight' ),
			'dashicons-trash'                   => __( 'Trash', 'sports-highlight' ),
			'dashicons-external'                => __( 'External', 'sports-highlight' ),
			'dashicons-arrow-up'                => __( 'Arrow-up', 'sports-highlight' ),
			'dashicons-arrow-down'              => __( 'Arrow-down', 'sports-highlight' ),
			'dashicons-arrow-left'              => __( 'Arrow-left', 'sports-highlight' ),
			'dashicons-arrow-right'             => __( 'Arrow-right', 'sports-highlight' ),
			'dashicons-arrow-up-alt'            => __( 'Arrow-up-alt', 'sports-highlight' ),
			'dashicons-arrow-down-alt'          => __( 'Arrow-down-alt', 'sports-highlight' ),
			'dashicons-arrow-left-alt'          => __( 'Arrow-left-alt', 'sports-highlight' ),
			'dashicons-arrow-right-alt'         => __( 'Arrow-right-alt', 'sports-highlight' ),
			'dashicons-arrow-up-alt2'           => __( 'Arrow-up-alt2', 'sports-highlight' ),
			'dashicons-arrow-down-alt2'         => __( 'Arrow-down-alt2', 'sports-highlight' ),
			'dashicons-arrow-left-alt2'         => __( 'Arrow-left-alt2', 'sports-highlight' ),
			'dashicons-arrow-right-alt2'        => __( 'Arrow-right-alt2', 'sports-highlight' ),
			'dashicons-leftright'               => __( 'Leftright', 'sports-highlight' ),
			'dashicons-sort'                    => __( 'Sort', 'sports-highlight' ),
			'dashicons-randomize'               => __( 'Randomize', 'sports-highlight' ),
			'dashicons-list-view'               => __( 'List-view', 'sports-highlight' ),
			'dashicons-exerpt-view'             => __( 'Exerpt-view', 'sports-highlight' ),
			'dashicons-hammer'                  => __( 'Hammer', 'sports-highlight' ),
			'dashicons-art'                     => __( 'Art', 'sports-highlight' ),
			'dashicons-migrate'                 => __( 'Migrate', 'sports-highlight' ),
			'dashicons-performance'             => __( 'Performance', 'sports-highlight' ),
			'dashicons-universal-access'        => __( 'Universal-access', 'sports-highlight' ),
			'dashicons-universal-access-alt'    => __( 'Universal-access-alt', 'sports-highlight' ),
			'dashicons-tickets'                 => __( 'Tickets', 'sports-highlight' ),
			'dashicons-nametag'                 => __( 'Nametag', 'sports-highlight' ),
			'dashicons-clipboard'               => __( 'Clipboard', 'sports-highlight' ),
			'dashicons-heart'                   => __( 'Heart', 'sports-highlight' ),
			'dashicons-megaphone'               => __( 'Megaphone', 'sports-highlight' ),
			'dashicons-schedule'                => __( 'Schedule', 'sports-highlight' ),
			'dashicons-wordpress'               => __( 'Wordpress', 'sports-highlight' ),
			'dashicons-wordpress-alt'           => __( 'Wordpress-alt', 'sports-highlight' ),
			'dashicons-pressthis'               => __( 'Pressthis', 'sports-highlight' ),
			'dashicons-update'                  => __( 'Update', 'sports-highlight' ),
			'dashicons-screenoptions'           => __( 'Screenoptions', 'sports-highlight' ),
			'dashicons-info'                    => __( 'Info', 'sports-highlight' ),
			'dashicons-cart'                    => __( 'Cart', 'sports-highlight' ),
			'dashicons-feedback'                => __( 'Feedback', 'sports-highlight' ),
			'dashicons-cloud'                   => __( 'Cloud', 'sports-highlight' ),
			'dashicons-translation'             => __( 'Translation', 'sports-highlight' ),
			'dashicons-tag'                     => __( 'Tag', 'sports-highlight' ),
			'dashicons-category'                => __( 'Category', 'sports-highlight' ),
			'dashicons-archive'                 => __( 'Archive', 'sports-highlight' ),
			'dashicons-tagcloud'                => __( 'Tagcloud', 'sports-highlight' ),
			'dashicons-text'                    => __( 'Text', 'sports-highlight' ),
			'dashicons-media-archive'           => __( 'Media-archive', 'sports-highlight' ),
			'dashicons-media-audio'             => __( 'Media-audio', 'sports-highlight' ),
			'dashicons-media-code'              => __( 'Media-code', 'sports-highlight' ),
			'dashicons-media-default'           => __( 'Media-default', 'sports-highlight' ),
			'dashicons-media-document'          => __( 'Media-document', 'sports-highlight' ),
			'dashicons-media-interactive'       => __( 'Media-interactive', 'sports-highlight' ),
			'dashicons-media-spreadsheet'       => __( 'Media-spreadsheet', 'sports-highlight' ),
			'dashicons-media-text'              => __( 'Media-text', 'sports-highlight' ),
			'dashicons-media-video'             => __( 'Media-video', 'sports-highlight' ),
			'dashicons-playlist-audio'          => __( 'Playlist-audio', 'sports-highlight' ),
			'dashicons-playlist-video'          => __( 'Playlist-video', 'sports-highlight' ),
			'dashicons-yes'                     => __( 'Yes', 'sports-highlight' ),
			'dashicons-no'                      => __( 'No', 'sports-highlight' ),
			'dashicons-no-alt'                  => __( 'No-alt', 'sports-highlight' ),
			'dashicons-plus'                    => __( 'Plus', 'sports-highlight' ),
			'dashicons-plus-alt'                => __( 'Plus-alt', 'sports-highlight' ),
			'dashicons-minus'                   => __( 'Minus', 'sports-highlight' ),
			'dashicons-dismiss'                 => __( 'Dismiss', 'sports-highlight' ),
			'dashicons-marker'                  => __( 'Marker', 'sports-highlight' ),
			'dashicons-star-filled'             => __( 'Star-filled', 'sports-highlight' ),
			'dashicons-star-half'               => __( 'Star-half', 'sports-highlight' ),
			'dashicons-star-empty'              => __( 'Star-empty', 'sports-highlight' ),
			'dashicons-flag'                    => __( 'Flag', 'sports-highlight' ),
			'dashicons-share'                   => __( 'Share', 'sports-highlight' ),
			'dashicons-share1'                  => __( 'Share1', 'sports-highlight' ),
			'dashicons-share-alt'               => __( 'Share-alt', 'sports-highlight' ),
			'dashicons-share-alt2'              => __( 'Share-alt2', 'sports-highlight' ),
			'dashicons-twitter'                 => __( 'Twitter', 'sports-highlight' ),
			'dashicons-rss'                     => __( 'Rss', 'sports-highlight' ),
			'dashicons-email'                   => __( 'Email', 'sports-highlight' ),
			'dashicons-email-alt'               => __( 'Email-alt', 'sports-highlight' ),
			'dashicons-facebook'                => __( 'Facebook', 'sports-highlight' ),
			'dashicons-facebook-alt'            => __( 'Facebook-alt', 'sports-highlight' ),
			'dashicons-networking'              => __( 'Networking', 'sports-highlight' ),
			'dashicons-googleplus'              => __( 'Googleplus', 'sports-highlight' ),
			'dashicons-location'                => __( 'Location', 'sports-highlight' ),
			'dashicons-location-alt'            => __( 'Location-alt', 'sports-highlight' ),
			'dashicons-camera'                  => __( 'Camera', 'sports-highlight' ),
			'dashicons-images-alt'              => __( 'Images-alt', 'sports-highlight' ),
			'dashicons-images-alt2'             => __( 'Images-alt2', 'sports-highlight' ),
			'dashicons-video-alt'               => __( 'Video-alt', 'sports-highlight' ),
			'dashicons-video-alt2'              => __( 'Video-alt2', 'sports-highlight' ),
			'dashicons-video-alt3'              => __( 'Video-alt3', 'sports-highlight' ),
			'dashicons-vault'                   => __( 'Vault', 'sports-highlight' ),
			'dashicons-shield'                  => __( 'Shield', 'sports-highlight' ),
			'dashicons-shield-alt'              => __( 'Shield-alt', 'sports-highlight' ),
			'dashicons-sos'                     => __( 'Sos', 'sports-highlight' ),
			'dashicons-search'                  => __( 'Search', 'sports-highlight' ),
			'dashicons-slides'                  => __( 'Slides', 'sports-highlight' ),
			'dashicons-analytics'               => __( 'Analytics', 'sports-highlight' ),
			'dashicons-chart-pie'               => __( 'Chart-pie', 'sports-highlight' ),
			'dashicons-chart-bar'               => __( 'Chart-bar', 'sports-highlight' ),
			'dashicons-chart-line'              => __( 'Chart-line', 'sports-highlight' ),
			'dashicons-chart-area'              => __( 'Chart-area', 'sports-highlight' ),
			'dashicons-groups'                  => __( 'Groups', 'sports-highlight' ),
			'dashicons-businessman'             => __( 'Businessman', 'sports-highlight' ),
			'dashicons-id'                      => __( 'Id', 'sports-highlight' ),
			'dashicons-id-alt'                  => __( 'Id-alt', 'sports-highlight' ),
			'dashicons-products'                => __( 'Products', 'sports-highlight' ),
			'dashicons-awards'                  => __( 'Awards', 'sports-highlight' ),
			'dashicons-forms'                   => __( 'Forms', 'sports-highlight' ),
			'dashicons-testimonial'             => __( 'Testimonial', 'sports-highlight' ),
			'dashicons-portfolio'               => __( 'Portfolio', 'sports-highlight' ),
			'dashicons-book'                    => __( 'Book', 'sports-highlight' ),
			'dashicons-book-alt'                => __( 'Book-alt', 'sports-highlight' ),
			'dashicons-download'                => __( 'Download', 'sports-highlight' ),
			'dashicons-upload'                  => __( 'Upload', 'sports-highlight' ),
			'dashicons-backup'                  => __( 'Backup', 'sports-highlight' ),
			'dashicons-clock'                   => __( 'Clock', 'sports-highlight' ),
			'dashicons-lightbulb'               => __( 'Lightbulb', 'sports-highlight' ),
			'dashicons-microphone'              => __( 'Microphone', 'sports-highlight' ),
			'dashicons-desktop'                 => __( 'Desktop', 'sports-highlight' ),
			'dashicons-tablet'                  => __( 'Tablet', 'sports-highlight' ),
			'dashicons-smartphone'              => __( 'Smartphone', 'sports-highlight' ),
			'dashicons-smiley'                  => __( 'Smiley', 'sports-highlight' ),
		);

		$dashicons = apply_filters( 'sports_highlight_fa_classes', $dashicons );

		if ( ! is_null( $filter ) ) {

			$icons = array();

			if ( is_array( $dashicons ) && ! empty( $dashicons ) ) {
				foreach ( $dashicons as $dashicon => $dashicon_label ) {
					if ( false !== strpos( $dashicon, $filter ) ) {
						$icons[ $dashicon ] = $dashicon_label;
					}
				}
			}

			return $icons;
		}

		return $dashicons;

	}


}
