<?php
/**
 * Controls and settings of Sidebar Section in General Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'general_sidebar_section';
$panel_id   = 'general_option_panel';

// Section For Sidebar.
$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Sidebar', 'sports-highlight' ),
		'priority'   => 140,
		'capability' => 'edit_theme_options',
		'panel'      => $panel_id,
	)
);

// Sidebar Alignment.
$choices = array(
	'left'  => esc_html__( 'Left', 'sports-highlight' ),
	'no'    => esc_html__( 'No Sidebar', 'sports-highlight' ),
	'right' => esc_html__( 'Right', 'sports-highlight' ),
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-text-radio-button',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Text_Radio_Button',
		'name'              => 'general_option_sidebar',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Sidebar', 'sports-highlight' ),
		'choices'           => $choices,
		'section'           => $section_id,
	)
);


// Gap Between Sidebar & Content.
$sidebar_gap = array(
	'divider'  => esc_html__( 'Divider', 'sports-highlight' ),
	'xlarge'   => esc_html__( 'XLarge', 'sports-highlight' ),
	'large'    => esc_html__( 'Large', 'sports-highlight' ),
	'medium'   => esc_html__( 'Medium', 'sports-highlight' ),
	'small'    => esc_html__( 'Small', 'sports-highlight' ),
	'collapse' => esc_html__( 'Collapse', 'sports-highlight' ),
);
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'general_option_sidebar_gap',
		'sanitize_callback' => 'wp_kses_post',
		'label'             => esc_html__( 'Gap', 'sports-highlight' ),
		'choices'           => $sidebar_gap,
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_siderbar_enabled' ),
	)
);

// Sidebar Width.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'general_option_sidebar_width',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Width', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => 20,
			'max'    => 60,
			'step'   => 1,
			'suffix' => '%',
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_siderbar_enabled' ),
	)
);


// Sidebar Widget Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_widget_bg_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Widget Background Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_siderbar_enabled' ),
	)
);

