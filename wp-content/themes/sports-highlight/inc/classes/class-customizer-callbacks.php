<?php
/**
 * Class for initializing Customizer Callbacks.
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
 * Class that provides callbacks methods for customizer related work.
 */
class Customizer_Callbacks {

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_title_font( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_site_title_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_tagline_font( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_tagline_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_navigation( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_navigation_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_text( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_text_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_global( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_global_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_h1( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_h1_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_h2( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_h2_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_h3( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_h3_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_h4( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_h4_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_h5( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_h5_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_h6( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_h6_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_typography_footer( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[typography_option_footer_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_box_layout( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_layout_box_shadow_toggle]' )->value();
		return ( self::customizer_is_boxed_page_width( $control ) && 1 === $setting );
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_boxed_page_width( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_layout_page_width]' )->value();
		return 'boxed' === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_breadcrumbs_toggle( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_breadcrumbs_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_scroll_top_toggle( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_scroll_top_toggle]' )->value();
		return 1 === $setting;
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_page_banner_toggle( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_page_banner_toggle]' )->value();
		return 1 === $setting;
	}


	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_siderbar_enabled( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_sidebar]' )->value();
		return ( 'no' !== $setting );
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_layout_custom_page_width( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_layout_page_width]' )->value();
		return ( 'custom' === $setting );
	}

	/**
	 * Customizer setting callbacks.
	 *
	 * @param object $control Customizer Object.
	 * @return bool
	 */
	public static function customizer_is_footer_toggle( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_footer_toggle]' )->value();
		return 1 === $setting;
	}

	public static function customizer_is_widget_toggle( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_footer_widget_toggle]' )->value();
		return 1 === $setting;
	}

	public static function customizer_is_topbar_enabled( $control ) {
		$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_topbar_enable_topbar]' )->value();
		return 1 === $setting;
	}




	/**
	 * =====================================
	 * Sanitize related callback methods.
	 * =====================================
	 */







	/**
	 * Dropdown sanitize callback for customizer settings.
	 *
	 * @param array|string $input Selected dropdown options.
	 * @param object       $setting Customizer settings object.
	 * @return boolean
	 */
	public static function customizer_sanitize_select( $input, $setting ) {
		/**
		 * Bail early if the $input is empty.
		 * It prevents the false validation notification.
		 */
		if ( empty( $input ) ) {
			return $input;
		}
		// Get list of choices from the control associated with the setting.
		$choices     = $setting->manager->get_control( $setting->id )->choices;
		$attrs       = $setting->manager->get_control( $setting->id )->input_attrs;
		$is_multiple = ! empty( $attrs['multiple'] ) ? $attrs['multiple'] : false;
		if ( $is_multiple ) {
			$valid_data = array();
			if ( is_array( $input ) && ! empty( $input ) ) {
				foreach ( $input as $ids ) {
					$found = ! empty( $choices[ $ids ] ) ? $choices[ $ids ] : false;
					if ( $found ) {
						array_push( $valid_data, $ids );
					}
				}
			}
			if ( count( $valid_data ) > 0 ) {
				/**
				 * Return the valid data.
				 */
				return $valid_data;
			}
		} else {
			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
	}


	/**
	 * Checkbox sanitization callback example.
	 *
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	public static function login_designer_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}

	/**
	 * Sanitize hex color.
	 *
	 * @param string $hex_color Hex color code.
	 * @param object $setting Customizer settings object.
	 * @return string
	 */
	public static function sanitize_hex_color( $hex_color, $setting ) {

		// Sanitize $input as a hex value without the hash prefix.
		$hex_color = sanitize_hex_color( $hex_color );

		// If $input is a valid hex value, return it; otherwise, return the default.
		return ( $hex_color ? $hex_color : $setting->default );
	}

	/**
	 * Sanitize image.
	 *
	 * @param string $file File.
	 * @param object $setting Customizer settings object.
	 * @return string
	 */
	public static function sanitize_image( $file, $setting ) {

		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
		);

		// Check file type from file name.
		$file_ext = wp_check_filetype( $file, $mimes );

		// If file has a valid mime type return it, otherwise return default.
		return ( $file_ext['ext'] ? $file : $setting->default );
	}
}

