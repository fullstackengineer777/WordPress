<?php
/**
 * Controls and Settings of Blog Section in General Options Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'general_blog_section';
$panel_id   = 'general_option_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Blog', 'sports-highlight' ),
		'priority'   => 150,
		'capability' => 'edit_theme_options',
		'panel'      => $panel_id,
	)
);

// Blog Excerpt Length.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'number',
		'name'              => 'general_blog_excerpt_length',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Excerpt Length', 'sports-highlight' ),
		'description'       => esc_html__( 'By default the excerpt length is set to return 55 words.', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

// Blog Excerpt Indicator.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'general_blog_excerpt_indicator',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Excerpt Indicator', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

// Separator.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-separator',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Separator',
		'name'              => 'general_blog_separator',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Separator', 'sports-highlight' ),
		'section'           => $section_id,
	)
);


// Blog Post Custom Header.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-custom-header',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Custom_Header',
		'name'              => 'general_blog_post_layout_header',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Post Layout', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

// Blog Post Layout Select Dropdown.
$choices = array(
	'default' => esc_html__( 'Default', 'sports-highlight' ),
	'boxed'   => esc_html__( 'Boxed', 'sports-highlight' ),
);
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'general_blog_post_layout_dropdown',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_sanitize_select' ),
		'label'             => esc_html__( 'Select Layout', 'sports-highlight' ),
		'choices'           => $choices,
		'section'           => $section_id,
	)
);


// Blog Pagination Custom Header.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-custom-header',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Custom_Header',
		'name'              => 'typography_option_footer_blog_header',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Pagination', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

// Blog Pagination Font Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_blog_pagination_font_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Font Color', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

// Blog Pagination Font Hover Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_blog_pagination_font_hover_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Hover', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

// Blog Pagination Font Active Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_blog_pagination_font_active_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Active', 'sports-highlight' ),
		'section'           => $section_id,
	)
);
