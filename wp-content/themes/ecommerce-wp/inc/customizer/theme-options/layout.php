<?php
/**
 * Layout options
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */
global $ecommerce_wp_options;

// Add sidebar section
$wp_customize->add_section( 'ecommerce_wp_layout', array(
	'title'               => esc_html__('Layout','ecommerce-wp'),
	'description'         => esc_html__( 'Manage site layout options. Also, you can edit header layouts for each page settings.', 'ecommerce-wp' ),
	'panel'               => 'ecommerce_wp_theme_options_panel',
) );



//
$wp_customize->add_setting( 'ecommerce_wp_options[layout_label2]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[layout_label2]',
   array(
	  'description'  => esc_html__( 'Site Layouts', 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_layout'
   )
) );

// Site layout setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[site_layout]', array(
	'sanitize_callback'   => 'ecommerce_wp_sanitize_select',
	'default'             => $options['site_layout'],
	'type'				=> 'option',
) );


$wp_customize->add_control(  new ecommerce_wp_Custom_Radio_Image_Control ( $wp_customize, 'ecommerce_wp_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'ecommerce-wp' ),
	'section'             => 'ecommerce_wp_layout',
	'choices'			  => ecommerce_wp_site_layout(),
) ) );


//
$wp_customize->add_setting( 'ecommerce_wp_options[layout_label3]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[layout_label3]',
   array(
	  'description'  => esc_html__( 'WooCommerce Layouts', 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_layout'
   )
) );

// Checkout page

$wp_customize->add_setting( 'ecommerce_wp_options[two_colum_checkout]', array(
	'default'   		=> true,
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
	'type'      		=> 'option'
));

$wp_customize->add_control('ecommerce_wp_options[two_colum_checkout]',
	array(
		'section'   => 'ecommerce_wp_layout',
		'label'     => esc_html__( 'WooCommerce Two Colum Checkout Page', 'ecommerce-wp' ),
		'type'      => 'checkbox'
));

//WooCommerce Sidebars

$wp_customize->add_setting( 'ecommerce_wp_options[woo_sidebar_position]', array(
	'sanitize_callback'   	=> 'ecommerce_wp_sanitize_select',
	'default'             	=> $options['sidebar_position'],
	'type'					=> 'option',
));

$wp_customize->add_control(  new ecommerce_wp_Custom_Radio_Image_Control ( $wp_customize, 'ecommerce_wp_options[woo_sidebar_position]', array(
	'label'               => esc_html__( 'WooCommerce Sidebar Layout', 'ecommerce-wp' ),
	'section'             => 'ecommerce_wp_layout',
	'choices'			  => ecommerce_wp_woo_sidebar_position(),
)));


//
$wp_customize->add_setting( 'ecommerce_wp_options[layout_label4]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[layout_label4]',
   array(
	  'description'  => esc_html__( 'Post Sidebar Layouts', 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_layout'
   )
) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'ecommerce_wp_sanitize_select',
	'default'             => $options['post_sidebar_position'],
	'type'      => 'option',
) );

$wp_customize->add_control(  new ecommerce_wp_Custom_Radio_Image_Control ( $wp_customize, 'ecommerce_wp_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Layout', 'ecommerce-wp' ),
	'section'             => 'ecommerce_wp_layout',
	'choices'			  => ecommerce_wp_sidebar_position(),
) ) );


//
$wp_customize->add_setting( 'ecommerce_wp_options[layout_label5]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[layout_label5]',
   array(
	  'description'  => esc_html__( 'Page Sidebar Layouts', 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_layout'
   )
) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'ecommerce_wp_sanitize_select',
	'default'             => $options['page_sidebar_position'],
	'type'				=> 'option',
	
) );

$wp_customize->add_control( new ecommerce_wp_Custom_Radio_Image_Control( $wp_customize, 'ecommerce_wp_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Layout', 'ecommerce-wp' ),
	'section'             => 'ecommerce_wp_layout',
	'choices'			  => ecommerce_wp_sidebar_position(),
) ) );


	//
	$wp_customize->add_setting( 'ecommerce_wp_options[layout_label6]',
	   array(
		  'default' => '',
		  'transport' => 'refresh',
		  'sanitize_callback' => 'wp_filter_nohtml_kses'
	   )
	);
	
	$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[layout_label6]',
	   array(
		  'description'  => esc_html__( 'Site Width', 'ecommerce-wp' ),
		  'section' => 'ecommerce_wp_layout'
	   )
	) );

	//
	$wp_customize->add_setting( 'ecommerce_wp_options[header_width]' , array(
	'default'    => $ecommerce_wp_options['header_width'],
	'sanitize_callback' => 'absint',
	'type'=>'option'
	));
	
	$wp_customize->add_control('ecommerce_wp_options[header_width]' , array(
	'label' => __('Header Width','ecommerce-wp' ),
	'section' => 'ecommerce_wp_layout',
	'type'	=>'number',
	) );
	

	//
	$wp_customize->add_setting( 'ecommerce_wp_options[content_width]' , array(
	'default'    => $ecommerce_wp_options['content_width'],
	'sanitize_callback' => 'absint',
	'type'=>'option'
	));
	
	$wp_customize->add_control('ecommerce_wp_options[content_width]' , array(
	'label' => __('Content Width','ecommerce-wp' ),
	'section' => 'ecommerce_wp_layout',
	'type'	=>'number',
	) );
	
	

	//
	$wp_customize->add_setting( 'ecommerce_wp_options[footer_width]' , array(
	'default'    => $ecommerce_wp_options['footer_width'],
	'sanitize_callback' => 'absint',
	'type'=>'option'
	));
	
	$wp_customize->add_control('ecommerce_wp_options[footer_width]' , array(
	'label' => __('Footer Width','ecommerce-wp' ),
	'section' => 'ecommerce_wp_layout',
	'type'	=>'number',
	) );		