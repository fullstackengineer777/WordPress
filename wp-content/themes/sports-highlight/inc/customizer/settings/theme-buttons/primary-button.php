<?php
/**
 * Controls and settings of Primary Button in Theme Buttons Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'theme_buttons_primary_button_section';
$panel_id   = 'theme_buttons_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Primary Buttons', 'sports-highlight' ),
		'priority'   => 120,
		'capability' => 'edit_theme_options',
		'panel'      => $panel_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'theme_buttons_primary_buttons_bg_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Background Color', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'theme_buttons_primary_buttons_hover',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Background Hover', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'theme_buttons_primary_buttons_font',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Font Color', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'theme_buttons_primary_buttons_font_hover',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Font Hover', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'theme_buttons_primary_buttons_primary_border_radius',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Border Radius', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => 0,
			'max'    => 100,
			'step'   => 1,
			'suffix' => 'px',
		),
		'section'           => $section_id,
	)
);
