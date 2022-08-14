<?php
/**
 * Create panel.
 */

	$wp_customize->add_panel(
		'general_option_panel',
		array(
			'title'      => esc_html__( 'General Options', 'sports-highlight' ),
			'priority'   => 30,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel(
		'theme_buttons_panel',
		array(
			'title'      => esc_html__( 'Theme Buttons', 'sports-highlight' ),
			'priority'   => 30,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel(
		'blog_panel',
		array(
			'title'      => esc_html__( 'Blog', 'sports-highlight' ),
			'priority'   => 30,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel(
		'typography_panel',
		array(
			'title'      => esc_html__( 'Typography', 'sports-highlight' ),
			'priority'   => 30,
			'capability' => 'edit_theme_options',
		)
	);


