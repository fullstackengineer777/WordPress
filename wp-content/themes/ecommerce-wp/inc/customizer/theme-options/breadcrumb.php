<?php
/**
 * Breadcrumb options
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */
global $ecommerce_wp_options;

$wp_customize->add_section( 'ecommerce_wp_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','ecommerce-wp' ),
	'description'       => esc_html__( 'Breadcrumb options.', 'ecommerce-wp' ),
	'panel'             => 'ecommerce_wp_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[breadcrumb_show]', array(
	'default'   => $ecommerce_wp_options['breadcrumb_show'],
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[breadcrumb_show]',
	array(
		'section'   => 'ecommerce_wp_breadcrumb',
		'label'     => esc_html__( 'Show Breadcrumb', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);

//category
$wp_customize->add_setting( 'ecommerce_wp_options[breadcrumb_category]', array(
	'default'   => $ecommerce_wp_options['breadcrumb_category'],
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[breadcrumb_category]',
	array(
		'section'   => 'ecommerce_wp_breadcrumb',
		'label'     => esc_html__( 'Hide Category', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
	'type'      => 'option',
) );

$wp_customize->add_control( 'ecommerce_wp_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'ecommerce-wp' ),
	'active_callback' 	=> 'ecommerce_wp_is_breadcrumb_enable',
	'section'          	=> 'ecommerce_wp_breadcrumb',
) );

// image
$wp_customize->add_setting('ecommerce_wp_options[breadcrumb_image]', array(
	'default'			=> $ecommerce_wp_options['breadcrumb_image'],
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
	'type'        		=> 'option',
));
	
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ecommerce_wp_options[breadcrumb_image]', array(
	'label'             => __('Background Image', 'ecommerce-wp'),
	'section'           => 'ecommerce_wp_breadcrumb',
	'settings'          => 'ecommerce_wp_options[breadcrumb_image]',
)));
