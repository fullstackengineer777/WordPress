<?php
/**
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */
global $ecommerce_wp_options;

$wp_customize->add_section( 'ecommerce_wp_styles', array(
	'title'             => esc_html__( 'Fonts','ecommerce-wp' ),
	'description'       => esc_html__( 'Edit heading, button and global styles.', 'ecommerce-wp' ),
	'panel'             => 'ecommerce_wp_theme_options_panel',
) );


// Post Category
$wp_customize->add_setting( 'ecommerce_wp_options[featured_heading_style]' , array(
	'default'   		=> $ecommerce_wp_options['featured_heading_style'],
	'sanitize_callback' => 'ecommerce_wp_sanitize_select',
	'type'				=> 'option'
));

$wp_customize->add_control('ecommerce_wp_options[featured_heading_style]' , array(
	'label' 	=> __('Featured Title Style','ecommerce-wp' ),
	'section' 	=> 'ecommerce_wp_styles',
	'type'		=> 'select',
	'choices'	=> array (
						'default' => esc_html__('Default', 'ecommerce-wp'),
						'full-underline' => esc_html__('Full Underline', 'ecommerce-wp'),
					),
));


// Styles

$wp_customize->add_setting(
	'ecommerce_wp_options[heading_font]', array(
		'default'           => $ecommerce_wp_options['heading_font'],		
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',  
		'type'        		=> 'option',
));

$wp_customize->add_control( 'ecommerce_wp_options[heading_font]' , array(
	'label' 	=> __('Heading Font Family','ecommerce-wp'),
	'section' 	=> 'ecommerce_wp_styles',
	'type'		=> 'text',
));

//
$wp_customize->add_setting(
	'ecommerce_wp_options[body_font]', array(
		'default'           => $ecommerce_wp_options['body_font'],			
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',  
		'type'        		=> 'option',
));

$wp_customize->add_control( 'ecommerce_wp_options[body_font]' , array(
	'label' 	=> __('Body Font Family','ecommerce-wp'),
	'section' 	=> 'ecommerce_wp_styles',
	'type'		=> 'text',
));


