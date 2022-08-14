<?php
/**
 * Controls and settings of 404 Section in General Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'general_404_section';
$panel_id   = 'general_option_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( '404', 'sports-highlight' ),
		'priority'   => 160,
		'capability' => 'edit_theme_options',
		'panel'      => $panel_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'general_option_404_title',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Title', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'textarea',
		'name'              => 'general_option_404_textarea',
		'sanitize_callback' => 'wp_kses_post',
		'label'             => esc_html__( 'Text Area', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

$choices = array(
	'show' => esc_html__( 'Show', 'sports-highlight' ),
	'hide' => esc_html__( 'Hide', 'sports-highlight' ),
);
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'general_option_404_search_form',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::customizer_sanitize_select',
		'label'             => esc_html__( 'Search Form', 'sports-highlight' ),
		'choices'           => $choices,
		'section'           => $section_id,
	)
);

