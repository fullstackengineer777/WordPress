<?php
/**
 * Footer options
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */
global $ecommerce_wp_options;

// Footer Section
$wp_customize->add_section( 'ecommerce_wp_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'ecommerce-wp' ),
		'priority'   			=> 900,
		'panel'      			=> 'ecommerce_wp_theme_options_panel',
	)
);

$wp_customize->selective_refresh->add_partial( 'ecommerce_wp_options[copyright_text]', array(
	'selector' => '.site-info .container',
) );

// footer text
$wp_customize->add_setting( 'ecommerce_wp_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'type'      			=> 'option',
		'sanitize_callback'		=> 'ecommerce_wp_santize_allowed_html',
	)
);

$wp_customize->add_control( 'ecommerce_wp_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'ecommerce-wp' ),
		'section'    			=> 'ecommerce_wp_section_footer',
		'type'		 			=> 'textarea',
    )
);

// scroll top visible

$wp_customize->add_setting( 'ecommerce_wp_options[scroll_top_visible]', array(
	'default'   => true,
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[scroll_top_visible]',
	array(
		'section'   => 'ecommerce_wp_section_footer',
		'label'     => esc_html__( 'Display Scroll Top Button', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);

// background Color
$wp_customize->add_setting(
	'ecommerce_wp_options[footer_bg_color]',
	array(
		'default'     => $options['footer_bg_color'],
		'type'        => 'option',
		'transport'   => 'refresh',				
		'sanitize_callback' => 'ecommerce_wp_sanitize_rgba_color',
	)
);

$wp_customize->add_control(
	new ecommerce_wp_Alpha_Color_Control(
		$wp_customize,
		'ecommerce_wp_options[footer_bg_color]',
		array(
			'label'         =>  __('Footer Background','ecommerce-wp' ),
			'section'       => 'ecommerce_wp_section_footer',					
			'settings'      => 'ecommerce_wp_options[footer_bg_color]',
			'description'   =>  __('Drag alpha slider for transparency.', 'ecommerce-wp'),
			'show_opacity'  => true,
		)
	)
);	


// footer text Color
$wp_customize->add_setting( 'ecommerce_wp_options[footer_text_color]', array(
	'default'           => $options['footer_text_color'],
	'sanitize_callback' => 'sanitize_hex_color',
	'type'      		=> 'option',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_wp_options[footer_text_color]', array(
	'label'             => __( 'Footer Text Color', 'ecommerce-wp' ),
	'section'           => 'ecommerce_wp_section_footer',
) ) );

// image
$wp_customize->add_setting('ecommerce_wp_options[footer_image]', array(
	'default'			=> $ecommerce_wp_options['footer_image'],
	'transport'         => 'refresh',
	'sanitize_callback' => 'esc_url_raw',
	'type'        		=> 'option',
));
	
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ecommerce_wp_options[footer_image]', array(
	'label'             => __('Background Image', 'ecommerce-wp'),
	'section'           => 'ecommerce_wp_section_footer',
	'settings'          => 'ecommerce_wp_options[footer_image]',
)));


