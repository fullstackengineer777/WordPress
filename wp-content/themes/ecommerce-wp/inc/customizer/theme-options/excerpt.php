<?php
/**
 * Excerpt options
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */
global $ecommerce_wp_options;

// Add excerpt section
$wp_customize->add_section( 'ecommerce_wp_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','ecommerce-wp' ),
	'description'       => esc_html__( 'Excerpt is a part (usually a number of words) taken from page, post or content. You can adjust the length here' , 'ecommerce-wp' ),
	'panel'             => 'ecommerce_wp_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[long_excerpt_length]', array(
	'sanitize_callback' => 'ecommerce_wp_sanitize_number_range',
	'validate_callback' => 'ecommerce_wp_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
	'type'      		=> 'option',
) );

$wp_customize->add_control( 'ecommerce_wp_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'ecommerce-wp' ),
	'description' 		=> esc_html__( 'Number of words to be displayed in archive page/search page.', 'ecommerce-wp' ),
	'section'     		=> 'ecommerce_wp_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

// read more text setting and control
$wp_customize->add_setting( 'ecommerce_wp_options[read_more_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['read_more_text'],
	'type'      		=> 'option',
) );

$wp_customize->add_control( 'ecommerce_wp_options[read_more_text]', array(
	'label'           	=> esc_html__( 'Read More Text Label', 'ecommerce-wp' ),
	'section'        	=> 'ecommerce_wp_excerpt_section',
	'type'				=> 'text',
) );
