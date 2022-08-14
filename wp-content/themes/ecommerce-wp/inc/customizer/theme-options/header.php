<?php
/**
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */
global $ecommerce_wp_options;

$wp_customize->add_section( 'ecommerce_wp_header', array(
	'title'             => esc_html__( 'Header','ecommerce-wp' ),
	'description'       => esc_html__( 'Edit Header layout and other options. You can create transparent header for each page by editing page and selecting transparent header option from right panel.', 'ecommerce-wp' ),
	'panel'             => 'ecommerce_wp_theme_options_panel',
) );




//
$wp_customize->add_setting( 'ecommerce_wp_options[header_label]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[header_label]',
   array(
	  'description'  => esc_html__( 'Menu Bar Button', 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_header'
   )
) );

// menu button
$wp_customize->add_setting( 'ecommerce_wp_options[topbar_login_register_enable]', array(
	'default'   => $options['topbar_login_register_enable'] ,
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',	
	'type'      => 'option'
 ) );

$wp_customize->add_control('ecommerce_wp_options[topbar_login_register_enable]',
	array(
		'section'   => 'ecommerce_wp_header',
		'label'     => esc_html__( 'Display Header Button', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);

		
$wp_customize->selective_refresh->add_partial( 'ecommerce_wp_options[topbar_login_register_enable]', array(
	'selector' => '#masthead .login-register ul li',
) );

// login setting and control
$wp_customize->add_setting( 'ecommerce_wp_options[topbar_login_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_login_label'],
	'type'      		=> 'option',

) );

function ecommerce_wp_login_button_enable( $control ) {
	return $control->manager->get_setting( 'ecommerce_wp_options[topbar_login_register_enable]' )->value();
}

$wp_customize->add_control( 'ecommerce_wp_options[topbar_login_label]', array(
	'label'           	=> esc_html__( 'Button Label', 'ecommerce-wp' ),
	'section'        	=> 'ecommerce_wp_header',
	'type'				=> 'text',
	'active_callback' 	=> 'ecommerce_wp_login_button_enable',
) );


// login url setting and control
$wp_customize->add_setting( 'ecommerce_wp_options[topbar_login_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	'type'      		=> 'option',
	'active_callback' 	=> 'ecommerce_wp_login_button_enable',
) );

$wp_customize->add_control( 'ecommerce_wp_options[topbar_login_url]', array(
	'label'           	=> esc_html__( 'Url [Link]', 'ecommerce-wp' ),
	'section'        	=> 'ecommerce_wp_header',
	'type'				=> 'url',
	'active_callback' 	=> 'ecommerce_wp_login_button_enable',
) );


//
$wp_customize->add_setting( 'ecommerce_wp_options[header_label0]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[header_label0]',
   array(
	  'description'  => esc_html__( 'Header Layouts', 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_header'
   )
) );



//Header
$wp_customize->add_setting( 'ecommerce_wp_options[site_header_layout]', array(
	'sanitize_callback'   => 'ecommerce_wp_sanitize_select',
	'default'             => $options['site_header_layout'],
	'type'				=> 'option',
) );


$wp_customize->add_control(  new ecommerce_wp_Custom_Radio_Image_Control ( $wp_customize, 'ecommerce_wp_options[site_header_layout]', array(
	'label'               => esc_html__( 'Site Header Layout', 'ecommerce-wp' ),
	'description'         => esc_html__( '[Also you can, Edit page|Post using WordPress editor and Change header layout to change each page.]', 'ecommerce-wp' ),
	'section'             => 'ecommerce_wp_header',
	'choices'			  => ecommerce_wp_header_layout(),
) ) );



// Ajax search
$wp_customize->add_setting( 'ecommerce_wp_options[header_label4]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[header_label4]',
   array(
	  'description'  => esc_html__( 'Header AJAX Search', 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_header'
   )
) );

//
$wp_customize->add_setting( 'ecommerce_wp_options[ajax_search]', array(
	'default'   => $options['ajax_search'] ,
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
	'type'      => 'option'
 ) );

$wp_customize->add_control('ecommerce_wp_options[ajax_search]',
	array(
		'section'   => 'ecommerce_wp_header',
		'label'     => esc_html__( 'Enable [Install AJAX Search for WooCommerce Plugin]', 'ecommerce-wp' ),
		'type'      => 'checkbox'
	)
);




//
$wp_customize->add_setting( 'ecommerce_wp_options[header_label2]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[header_label2]',
   array(
	  'description'  => esc_html__( 'Header Colors', 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_header'
   )
) );

// menu background colour
$wp_customize->add_setting(
	'ecommerce_wp_options[header_bg_color]',
	array(
		'default'     => $options['header_bg_color'],
		'type'        => 'option',
		'transport'   => 'refresh',				
		'sanitize_callback' => 'ecommerce_wp_sanitize_rgba_color',
	)
);

$wp_customize->add_control(
	new ecommerce_wp_Alpha_Color_Control(
		$wp_customize,
		'ecommerce_wp_options[header_bg_color]',
		array(
			'label'         =>  __('Header Background','ecommerce-wp' ),
			'section'       => 'ecommerce_wp_header',					
			'settings'      => 'ecommerce_wp_options[header_bg_color]',
			'description'   =>  __('Drag alpha slider for transparency.', 'ecommerce-wp'),
			'show_opacity'  => true,
		)
	)
);		


//
$wp_customize->add_setting( 'ecommerce_wp_options[header_label3]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[header_label3]',
   array(
	  'description'  => esc_html__( 'Storefront Header Colors', 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_header'
   )
) );

// menubar colors

$wp_customize->add_setting(
	'ecommerce_wp_options[store_menu_color]',
	array(
		'default'     => $options['store_menu_color'],
		'type'        => 'option',
		'transport'   => 'refresh',				
		'sanitize_callback' => 'ecommerce_wp_sanitize_rgba_color',
	)
);

$wp_customize->add_control(
	new ecommerce_wp_Alpha_Color_Control(
		$wp_customize,
		'ecommerce_wp_options[store_menu_color]',
		array(
			'label'         =>  __('Menu Text Color','ecommerce-wp' ),
			'section'       => 'ecommerce_wp_header',					
			'settings'      => 'ecommerce_wp_options[store_menu_color]',
			'description'   =>  __('(Header storefron style menu)', 'ecommerce-wp'),
			'show_opacity'  => true,
		)
	)
);

//
$wp_customize->add_setting(
	'ecommerce_wp_options[store_menubar_color]',
	array(
		'default'     => $options['store_menubar_color'],
		'type'        => 'option',
		'transport'   => 'refresh',				
		'sanitize_callback' => 'ecommerce_wp_sanitize_rgba_color',
	)
);

$wp_customize->add_control(
	new ecommerce_wp_Alpha_Color_Control(
		$wp_customize,
		'ecommerce_wp_options[store_menubar_color]',
		array(
			'label'         =>  __('Menu Background Color','ecommerce-wp' ),
			'section'       => 'ecommerce_wp_header',					
			'settings'      => 'ecommerce_wp_options[store_menubar_color]',
			'description'   =>  __('(Header storefront style menu)', 'ecommerce-wp'),
			'show_opacity'  => true,
		)
	)
);

//
$wp_customize->add_setting( 'ecommerce_wp_options[menubar_border_height]', array(
	'sanitize_callback' => 'absint',
	'default'			=> $options['menubar_border_height'],
	'type'      		=> 'option',
) );

$wp_customize->add_control( 'ecommerce_wp_options[menubar_border_height]', array(
	'label'           	=> esc_html__( 'Menubar Line Height', 'ecommerce-wp' ),
	'section'        	=> 'ecommerce_wp_header',
	'type'				=> 'number',
) );


//
$wp_customize->add_setting(
	'ecommerce_wp_options[menubar_border_color]',
	array(
		'default'     => $options['menubar_border_color'],
		'type'        => 'option',
		'transport'   => 'refresh',				
		'sanitize_callback' => 'ecommerce_wp_sanitize_rgba_color',
	)
);

$wp_customize->add_control(
	new ecommerce_wp_Alpha_Color_Control(
		$wp_customize,
		'ecommerce_wp_options[menubar_border_color]',
		array(
			'label'         =>  __('Menu Border Color','ecommerce-wp' ),
			'section'       => 'ecommerce_wp_header',					
			'settings'      => 'ecommerce_wp_options[menubar_border_color]',
			'description'   =>  __('(Header storefront style menu)', 'ecommerce-wp'),
			'show_opacity'  => true,
		)
	)
);


