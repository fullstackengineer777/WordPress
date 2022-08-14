<?php
/**
 * Controls and settings of Footer Section in General Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

$section_id = 'general_footer_section';
$panel_id   = 'general_option_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Footer', 'sports-highlight' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
		'panel'      => $panel_id,
	)
);

// Footer Toggle.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_option_footer_toggle',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Footer', 'sports-highlight' ),
		'section'           => $section_id,
	)
);


// Footer Background Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_footer_bg_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Footer Background Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_footer_toggle' ),
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_footer_link_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Footer Link Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_footer_toggle' ),
	)
);



// Widget Toggle.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_option_footer_widget_toggle',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Widget', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_footer_toggle' ),
	)
);

// Widget Background Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_footer_widget_bg_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Widget Background Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_widget_toggle' ),
	)
);

// Widget Font Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_footer_widget_font_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Widget Font Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_widget_toggle' ),
	)
);

// Footer Copyright Textarea.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'textarea',
		'name'              => 'general_option_footer_copyright',
		'sanitize_callback' => 'wp_kses_post',
		'label'             => esc_html__( 'Copyright ©', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_footer_toggle' ),
	)
);


// Footer Copyright Alignment.
$alignment_option = array(
	'left'   => esc_html__( 'Left', 'sports-highlight' ),
	'center' => esc_html__( 'Center', 'sports-highlight' ),
	'right'  => esc_html__( 'Right', 'sports-highlight' ),
);
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-text-radio-button',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Text_Radio_Button',
		'name'              => 'general_option_footer_copyright_alignment',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Footer Copyright Alignment', 'sports-highlight' ),
		'choices'           => $alignment_option,
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_footer_toggle' ),
	)
);

// Bottom Footer Background Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_bottom_footer_bg_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Bottom Footer Background Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_footer_toggle' ),
	)
);


// Bottom Font Color.
Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_bottom_footer_font_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Bottom Fotter Font Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_footer_toggle' ),
	)
);



