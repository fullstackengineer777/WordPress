<?php
/**
 * Controls and Settings of Scroll Top Section in General Options Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'general_scroll_top_section';
$panel_id   = 'general_option_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Scroll Top', 'sports-highlight' ),
		'priority'   => 190,
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
		'name'              => 'general_option_scroll_top_toggle',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Scroll Top', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

// ScrollTop Alignment.
$alignment_option = array(
	'left'  => esc_html__( 'Left Alignment', 'sports-highlight' ),
	'right' => esc_html__( 'Right Alignment', 'sports-highlight' ),
);
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-text-radio-button',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Text_Radio_Button',
		'name'              => 'general_option_scroll_top_position',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_sanitize_select' ),
		'label'             => esc_html__( 'Scroll Top Alignment', 'sports-highlight' ),
		'choices'           => $alignment_option,
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_scroll_top_toggle' ),
	)
);


// ScrollTop Show After.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'general_option_scroll_top_show_after',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Show After (px)', 'sports-highlight' ),
		'description'       => esc_html__( 'Display Scroll Top button after certain pixels of scrolling', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => 10,
			'max'    => 1000,
			'step'   => 1,
			'suffix' => 'px',
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_scroll_top_toggle' ),
	)
);

// Scroll Top Icon.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'general_option_scroll_top_icon',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_sanitize_select' ),
		'label'             => esc_html__( 'Select Icon', 'sports-highlight' ),
		'choices'           => Customizer_Helpers::get_dashicons_classes( '-up' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_scroll_top_toggle' ),
	)
);

// ScrollTop Border Radius.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-range-value',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Range_Value_Control',
		'name'              => 'general_option_scroll_top_border_radius',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Border Radius', 'sports-highlight' ),
		'input_attrs'       => array(
			'min'    => 0,
			'max'    => 20,
			'step'   => 1,
			'suffix' => 'px',
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_scroll_top_toggle' ),
	)
);

// ScrollTop Background Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_scroll_top_bg_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Background Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_scroll_top_toggle' ),
	)
);

// ScrollTop Background Hover Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_scroll_top_bg_hover_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Background Hover Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_scroll_top_toggle' ),
	)
);

// ScrollTop Icon Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_scroll_top_icon_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Icon Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_scroll_top_toggle' ),
	)
);

// ScrollTop Icon Hover Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_scroll_top_icon_hover_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Icon Hover Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_scroll_top_toggle' ),
	)
);




