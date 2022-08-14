<?php
/**
 * pagination options
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */
global $ecommerce_wp_options;

// Add sidebar section
$wp_customize->add_section( 'ecommerce_wp_pagination', array(
	'title'               => esc_html__('Pagination','ecommerce-wp'),
	'description'         => esc_html__( 'Pagination options.', 'ecommerce-wp' ),
	'panel'               => 'ecommerce_wp_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[pagination_enable]', array(
	'default'   => true,
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[pagination_enable]',
	array(
		'section'   => 'ecommerce_wp_pagination',
		'label'     => esc_html__( 'Enable Pagination', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);

// Site layout setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[pagination_type]', array(
	'sanitize_callback'   => 'ecommerce_wp_sanitize_select',
	'default'             => 'numeric',
	'type'      => 'option',
) );

$wp_customize->add_control( 'ecommerce_wp_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'ecommerce-wp' ),
	'section'             => 'ecommerce_wp_pagination',
	'type'                => 'select',
	'choices'			  => ecommerce_wp_pagination_options(),
	'active_callback'	  => 'ecommerce_wp_is_pagination_enable',
) );
