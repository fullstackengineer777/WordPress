<?php
/**
 * Controls and settings of Colors for General Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'general_colors_section';
$panel_id   = 'general_option_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Colors', 'sports-highlight' ),
		'priority'   => 170,
		'capability' => 'edit_theme_options',
		'panel'      => 'general_option_panel',
	)
);

	// Primary Color Control which is in Wp Colors Section.
	Customizer_Helpers::register_option(
		$wp_customize,
		array(
			'type'              => 'color',
			'name'              => 'general_option_colors_primary',
			'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
			'label'             => esc_html__( 'Primary Color', 'sports-highlight' ),
			'section'           => 'colors',
		)
	);

	// Secondary Color Control which is in Wp Colors Section.
	Customizer_Helpers::register_option(
		$wp_customize,
		array(
			'type'              => 'color',
			'name'              => 'general_option_colors_secondary',
			'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
			'label'             => esc_html__( 'Secondary Color', 'sports-highlight' ),
			'section'           => 'colors',
		)
	);
