<?php

global $ecommerce_wp_options;

$wp_customize->add_section( 'ecommerce_wp_preloader', array(
	'title'             => esc_html__( 'Preloader','ecommerce-wp' ),
	'description'       => esc_html__( 'Select preloader style.', 'ecommerce-wp' ),
	'panel'             => 'ecommerce_wp_theme_options_panel',
) );


// Prealoader selection
$wp_customize->add_setting( 'ecommerce_wp_options[prealoader_style]' , array(
	'default'   		=> $ecommerce_wp_options['prealoader_style'],
	'sanitize_callback' => 'ecommerce_wp_sanitize_select',
	'type'				=> 'option'
));


if(ecommerce_wp_extra_plugin()) {

	$wp_customize->add_control('ecommerce_wp_options[prealoader_style]' , array(
		'label' 	=> __('Preloader Style','ecommerce-wp' ),
		'section' 	=> 'ecommerce_wp_preloader',
		'type'		=> 'select',
		'choices'	=> array (
							'' => esc_html__('None', 'ecommerce-wp'),
							'0' => esc_html__('Spinner', 'ecommerce-wp'),
							'1' => esc_html__('Spinner Dots', 'ecommerce-wp'),
							'2' => esc_html__('Spinner Rectangle', 'ecommerce-wp'),
							'3' => esc_html__('Spinner Double', 'ecommerce-wp'),
							'4' => esc_html__('Chase', 'ecommerce-wp'),
							'5' => esc_html__('Folding Cube', 'ecommerce-wp'),
							'6' => esc_html__('Fading Circle', 'ecommerce-wp'),						
						),
	));

} else {

	$wp_customize->add_control('ecommerce_wp_options[prealoader_style]' , array(
		'label' 	=> __('Preloader Style','ecommerce-wp' ),
		'section' 	=> 'ecommerce_wp_preloader',
		'type'		=> 'select',
		'choices'	=> array (
							'' => esc_html__('None', 'ecommerce-wp'),
							'4' => esc_html__('Chase', 'ecommerce-wp'),
						),
	));

}

