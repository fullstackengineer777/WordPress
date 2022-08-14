<?php

/**
 * Controls and Settings of Layout Section in General Options Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'general_layout_section';
$panel_id   = 'general_option_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Layouts', 'sports-highlight' ),
		'priority'   => 130,
		'capability' => 'edit_theme_options',
		'panel'      => 'general_option_panel',
	)
);


// Header Layout page width select dropdown.
$choices = array(
	'default'    => esc_html__( 'Default', 'sports-highlight' ),
	'boxed'      => esc_html__( 'Boxed', 'sports-highlight' ),
	'full-width' => esc_html__( 'Full Width', 'sports-highlight' ),
	'custom'     => esc_html__( 'Custom', 'sports-highlight' ),
);
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'general_option_layout_page_width',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_sanitize_select' ),
		'label'             => esc_html__( 'Page Width', 'sports-highlight' ),
		'choices'           => $choices,
		'section'           => $section_id,
	)
);

// Header Box Layout width.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'general_option_layout_boxed_width',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Width', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => 20,
			'max'    => 1000,
			'step'   => 1,
			'suffix' => 'px',
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_boxed_page_width' ),

	)
);


// Header Box Layout, box shadow toggle button.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_option_layout_box_shadow_toggle',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Box Shadow', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_boxed_page_width' ),

	)
);

// Header Box Layout, box shadow blur.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'general_option_layout_box_shadow_blur',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Blur', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => 0,
			'max'    => 100,
			'step'   => 1,
			'suffix' => 'px',
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_box_layout' ),
	)
);

// Header Box Layout, box shadow spread.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'general_option_layout_box_shadow_spread',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Spread', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => -100,
			'max'    => 100,
			'step'   => 1,
			'suffix' => 'px',
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_box_layout' ),
	)
);

// Header Box Layout, box shadow horizontal.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'general_option_layout_box_shadow_horizontal',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Horizontal', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => -100,
			'max'    => 100,
			'step'   => 1,
			'suffix' => 'px',
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_box_layout' ),
	)
);

// Header Box Layout, box shadow vertical.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'general_option_layout_box_shadow_vertical',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Vertical', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => -100,
			'max'    => 100,
			'step'   => 1,
			'suffix' => 'px',
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_box_layout' ),
	)
);

// Header Box Layout, box shadow color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_layout_box_shadow_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_box_layout' ),
	)
);

// Header Custom Page Width.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'number',
		'name'              => 'general_option_layout_custom_page_width',
		'description'       => esc_html__( 'Default: 1200px', 'sports-highlight' ),
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Custom Page Width', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_layout_custom_page_width' ),

	)
);
