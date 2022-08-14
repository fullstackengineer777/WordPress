<?php
/**
 * Controls and settings of Page Banner Section in General Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'general_page_banner_section';
$panel_id   = 'general_option_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Page Banner', 'sports-highlight' ),
		'priority'   => 110,
		'capability' => 'edit_theme_options',
		'panel'      => $panel_id,
	)
);

// ScrollTop Toggle.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_page_banner_toggle',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Page Banner', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

$choices = array(
	'left top'      => esc_html__( 'Left Top', 'sports-highlight' ),
	'left center'   => esc_html__( 'Left Center', 'sports-highlight' ),
	'left bottom'   => esc_html__( 'Left Bottom', 'sports-highlight' ),
	'right top'     => esc_html__( 'Right Top', 'sports-highlight' ),
	'right center'  => esc_html__( 'Right Center', 'sports-highlight' ),
	'right bottom'  => esc_html__( 'Right Bottom', 'sports-highlight' ),
	'center top'    => esc_html__( 'Center Top', 'sports-highlight' ),
	'center center' => esc_html__( 'Center Center', 'sports-highlight' ),
	'center bottom' => esc_html__( 'Center Bottom', 'sports-highlight' ),
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'general_page_banner_section_bg_position',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::customizer_sanitize_select',
		'label'             => esc_html__( 'Background Position', 'sports-highlight' ),
		'choices'           => $choices,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_page_banner_toggle' ),
		'section'           => $section_id,
	)
);

$choices = array(
	'auto'    => esc_html__( 'Auto', 'sports-highlight' ),
	'length'  => esc_html__( 'Length', 'sports-highlight' ),
	'cover'   => esc_html__( 'Cover', 'sports-highlight' ),
	'contain' => esc_html__( 'Contain', 'sports-highlight' ),
	'initial' => esc_html__( 'Initial', 'sports-highlight' ),
	'inherit' => esc_html__( 'Inherit', 'sports-highlight' ),

);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'general_page_banner_section_bg_size',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::customizer_sanitize_select',
		'label'             => esc_html__( 'Background Size', 'sports-highlight' ),
		'choices'           => $choices,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_page_banner_toggle' ),
		'section'           => $section_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_page_banner_section_toggle_parallax',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Enable Parallax', 'sports-highlight' ),
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_page_banner_toggle' ),
		'section'           => $section_id,
	)
);
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_page_banner_section_font_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Font Color', 'sports-highlight' ),
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_page_banner_toggle' ),
		'section'           => $section_id,
	)
);
