<?php
/**
 * Controls and settings of H3 in Typography Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'typography_h3_section';
$panel_id   = 'typography_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'H3', 'sports-highlight' ),
		'priority'   => 140,
		'capability' => 'edit_theme_options',
		'panel'      => $panel_id,
	)
);

// Title Font Settings Toggle.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'typography_option_h3_toggle',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Font Settings', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-font-header',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Font_Header',
		'name'              => 'typography_option_h3_font_header',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Font', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_typography_h3' ),
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'typography_option_h3_font_dropdown',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_sanitize_select' ),
		'label'             => esc_html__( 'Font Family', 'sports-highlight' ),
		'choices'           => Customizer_Helpers::get_fonts(),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_typography_h3' ),
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'typography_option_h3_font_variant_dropdown',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_sanitize_select' ),
		'label'             => esc_html__( 'Font Weight', 'sports-highlight' ),
		'choices'           => Customizer_Helpers::fonts_variant(),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_typography_h3' ),
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'typography_option_h3_text_transform',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_sanitize_select' ),
		'label'             => esc_html__( 'Text Transform', 'sports-highlight' ),
		'choices'           => Customizer_Helpers::text_transform(),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_typography_h3' ),
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'typography_option_h3_font_size',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Font Size', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => 5,
			'max'    => 200,
			'step'   => 1,
			'suffix' => 'px',
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_typography_h3' ),
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'typography_option_h3_line_height',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Line Height', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => 5,
			'max'    => 200,
			'step'   => 1,
			'suffix' => 'px',
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_typography_h3' ),
	)
);
