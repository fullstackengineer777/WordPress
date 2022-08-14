<?php
/**
 * Controls and Settings of Breacrumbs Section in General Options Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'general_breadcrumbs_section';
$panel_id   = 'general_option_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Breadcrumbs', 'sports-highlight' ),
		'priority'   => 120,
		'capability' => 'edit_theme_options',
		'panel'      => $panel_id,
	)
);

// Breadcrumbs Toggle.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_option_breadcrumbs_toggle',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Breadcrumbs', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

// Breadcrumbs Display Pages.
$display_option = array(
	'archive'  => esc_html__( 'Archive Page', 'sports-highlight' ),
	'search'   => esc_html__( 'Search Page', 'sports-highlight' ),
	'single'   => esc_html__( 'Single Post', 'sports-highlight' ),
	'page'     => esc_html__( 'Single Page', 'sports-highlight' ),
	'error404' => esc_html__( '404 Page', 'sports-highlight' ),
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'general_option_breadcrumbs_display_option',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_sanitize_select' ),
		'label'             => esc_html__( 'Hide Breadcrumbs', 'sports-highlight' ),
		'description'       => esc_html__( 'Default: Breadcrumbs will be Enable in all pages', 'sports-highlight' ),
		'choices'           => $display_option,
		'input_attrs'       => array(
			'multiple' => true,
		),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_breadcrumbs_toggle' ),
	)
);

// Breadcrumbs Separator.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'general_option_breadcrumbs_separator',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Breadcrumbs Separator', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_breadcrumbs_toggle' ),

	)
);

// Breadcrumbs Alignment.
$choices = array(
	'breadcrumb-left'   => esc_html__( 'Left', 'sports-highlight' ),
	'breadcrumb-center' => esc_html__( 'Center', 'sports-highlight' ),
	'breadcrumb-right'  => esc_html__( 'Right', 'sports-highlight' ),
);
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-text-radio-button',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Text_Radio_Button',
		'name'              => 'general_option_breadcrumbs_alignment',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Alignment', 'sports-highlight' ),
		'choices'           => $choices,
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_breadcrumbs_toggle' ),
	)
);

// Breadcrumbs Background Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_breadcrumbs_bg_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Background Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_breadcrumbs_toggle' ),
	)
);

// Breadcrumbs Font Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_breadcrumbs_font_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Font Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_breadcrumbs_toggle' ),
	)
);

// Breadcrumbs Accent Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_breadcrumbs_accent_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Accent Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_breadcrumbs_toggle' ),
	)
);

// Breadcrumbs Hover Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_breadcrumbs_hover_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Hover Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_breadcrumbs_toggle' ),
	)
);
