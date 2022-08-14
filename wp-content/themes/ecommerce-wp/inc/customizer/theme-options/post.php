<?php
/**
 * Excerpt options
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'ecommerce_wp_single_post_section', array(
	'title'             => esc_html__( 'Single Post','ecommerce-wp' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'ecommerce-wp' ),
	'panel'             => 'ecommerce_wp_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[single_post_hide_date]', array(
	'default'   => true,
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[single_post_hide_date]',
	array(
		'section'   => 'ecommerce_wp_single_post_section',
		'label'     => esc_html__( 'Hide Date', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);

// Archive author meta setting and control.

$wp_customize->add_setting( 'ecommerce_wp_options[single_post_hide_author]', array(
	'default'   => true,
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[single_post_hide_author]',
	array(
		'section'   => 'ecommerce_wp_single_post_section',
		'label'     => esc_html__( 'Hide Author', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);

// Archive author category setting and control.

$wp_customize->add_setting( 'ecommerce_wp_options[single_post_hide_category]', array(
	'default'   => true,
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[single_post_hide_category]',
	array(
		'section'   => 'ecommerce_wp_single_post_section',
		'label'     => esc_html__( 'Hide Author', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);

// Archive tag category setting and control.

$wp_customize->add_setting( 'ecommerce_wp_options[single_post_hide_tags]', array(
	'default'   => true,
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[single_post_hide_tags]',
	array(
		'section'   => 'ecommerce_wp_single_post_section',
		'label'     => esc_html__( 'Hide Tag', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);
