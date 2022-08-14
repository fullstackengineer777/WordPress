<?php
/**
 * Controls and settings of Header Section in General Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'general_header_section';
$panel_id   = 'general_option_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Header', 'sports-highlight' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => $panel_id,
	)
);


// Layout Custom Header .
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-custom-header',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Custom_Header',
		'name'              => 'general_option_header_custom_header',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Site Title/Tagline Option', 'sports-highlight' ),
		'section'           => 'title_tagline',
	)
);

// Theme Title Enable Toggle .
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_option_header_theme_title_toggle',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Display Site Title', 'sports-highlight' ),
		'section'           => 'title_tagline',
	)
);

// Tagline Enable Toggle .
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_option_header_theme_tagline_toggle',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Display Tagline', 'sports-highlight' ),
		'section'           => 'title_tagline',
	)
);

// Layout Custom Header.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-custom-header',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Custom_Header',
		'name'              => 'general_option_header_page_title_custom_header',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Header Colors', 'sports-highlight' ),
		'section'           => $section_id,
	)
);


Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_header_bg_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Header Background Color', 'sports-highlight' ),
		'section'           => $section_id,
	)
);


Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_header_menu_bg_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Menu Background Color', 'sports-highlight' ),
		'section'           => $section_id,
	)
);


Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_header_menu_link_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Menu Link Color', 'sports-highlight' ),
		'section'           => $section_id,
	)
);


Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_header_menu_link_color_hover',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Menu Link Color (Hover)', 'sports-highlight' ),
		'section'           => $section_id,
	)
);


// Layout Custom Header.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-custom-header',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Custom_Header',
		'name'              => 'general_option_header_header_custom_option',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Header Options', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

// Header Layout select dropdown.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'general_option_header_layout',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_sanitize_select' ),
		'label'             => esc_html__( 'Header Layout', 'sports-highlight' ),
		'choices'           => array(
			'layout-one'   => esc_html__( 'Layout One', 'sports-highlight' ),
			'layout-two'   => esc_html__( 'Layout Two', 'sports-highlight' ),
			'layout-three' => esc_html__( 'Layout Three', 'sports-highlight' ),
		),
		'section'           => $section_id,
	)
);


/**
 * Display this option if layout one is selected.
 */
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'image',
		'custom_control'    => 'WP_Customize_Image_Control',
		'name'              => 'general_option_header_ad_img',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'sanitize_image' ),
		'label'             => esc_html__( 'Ad Image', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => function( $control ) {
			$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_header_layout]' )->value();
			return ( 'layout-one' === $setting ) || ( 'layout-three' === $setting );
		},
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'general_option_header_ad_img_url',
		'sanitize_callback' => 'esc_url_raw',
		'label'             => esc_html__( 'Ad Image Url', 'sports-highlight' ),
		'active_callback'   => function( $control ) {
			$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_header_layout]' )->value();
			return ( 'layout-one' === $setting ) || ( 'layout-three' === $setting );
		},
		'section'           => $section_id,
	)
);
