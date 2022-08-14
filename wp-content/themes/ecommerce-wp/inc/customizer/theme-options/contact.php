<?php

	global $ecommerce_wp_options;

	// Add sidebar section
	$wp_customize->add_section( 'ecommerce_wp_contact', array(
		'title'               => esc_html__('Contacts/Social','ecommerce-wp'),
		'description'         => esc_html__( 'Contact and social settings and formattings.', 'ecommerce-wp' ),
		'panel'               => 'ecommerce_wp_theme_options_panel',
	) );
		
	// top bar background colour
	$wp_customize->add_setting(
		'ecommerce_wp_options[contact_bg_color]',
		array(
			'default'     => $options['contact_bg_color'],
			'type'        => 'option',
			'transport'   => 'refresh',				
			'sanitize_callback' => 'ecommerce_wp_sanitize_rgba_color',
		)
	);
	
	$wp_customize->add_control(
		new ecommerce_wp_Alpha_Color_Control(
			$wp_customize,
			'ecommerce_wp_options[contact_bg_color]',
			array(
				'label'         =>  __('Top Bar Background','ecommerce-wp' ),
				'section'       => 'ecommerce_wp_contact',					
				'settings'      => 'ecommerce_wp_options[contact_bg_color]',
				'description'   =>  __('Drag alpha slider for transparency.', 'ecommerce-wp'),
				'show_opacity'  => true,
			)
		)
	);
	
	
	//
	$wp_customize->add_setting( 'ecommerce_wp_options[contact_label]',
	   array(
		  'default' => '',
		  'transport' => 'refresh',
		  'sanitize_callback' => 'wp_filter_nohtml_kses'
	   )
	);
	
	$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[contact_label]',
	   array(
		  'description'  => esc_html__( 'Contacts', 'ecommerce-wp' ),
		  'section' => 'ecommerce_wp_contact'
	   )
	) );		
	
	
	// address
	$wp_customize->add_setting( 'ecommerce_wp_options[contact_section_address]' , array(
	'default'    => $ecommerce_wp_options['contact_section_address'],
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
	));
	
	$wp_customize->add_control('ecommerce_wp_options[contact_section_address]' , array(
	'label' => __('Address','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'text',
	) );
	
	// email
	$wp_customize->add_setting( 'ecommerce_wp_options[contact_section_email]' , array(
	'default'    => '',
	'sanitize_callback' => 'sanitize_email',
	'type'=>'option'
	));
	
	$wp_customize->add_control('ecommerce_wp_options[contact_section_email]' , array(
	'label' => __('Email:','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'text',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'ecommerce_wp_options[contact_section_email]', array(
		'selector' => '.top-bar-left',
	) );		
	
	// phone
	$wp_customize->add_setting( 'ecommerce_wp_options[contact_section_phone]' , array(
	'default'    => '',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
	));
	
	$wp_customize->add_control('ecommerce_wp_options[contact_section_phone]' , array(
	'label' => __('Phone:','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'text',
	) );
	
	
	// work hours
	$wp_customize->add_setting( 'ecommerce_wp_options[contact_section_hours]' , array(
	'default'    => '',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
	));
	
	$wp_customize->add_control('ecommerce_wp_options[contact_section_hours]' , array(
	'label' => __('Work Hours','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'text',
	) );
	
	
	
	
	
	/*
	 * Social Options
	 */
	 
	//
	$wp_customize->add_setting( 'ecommerce_wp_options[contact_label2]',
	   array(
		  'default' => '',
		  'transport' => 'refresh',
		  'sanitize_callback' => 'wp_filter_nohtml_kses'
	   )
	);
	
	$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[contact_label2]',
	   array(
		  'description'  => esc_html__( 'Social Links', 'ecommerce-wp' ),
		  'section' => 'ecommerce_wp_contact'
	   )
	) );		
		 
	 
	$wp_customize->add_setting( 'ecommerce_wp_options[social_facebook_link]' , array(
	'default'    => '',
	'sanitize_callback' => 'esc_url_raw',
	'type'=>'option'
	));
	
	$wp_customize->selective_refresh->add_partial( 'ecommerce_wp_options[social_facebook_link]', array(
		'selector' => '#top-social-right',
	) );
	
	$wp_customize->add_control('ecommerce_wp_options[social_facebook_link]' , array(
	'label' => __('Facebook Link','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'url',
	) );
	
	$wp_customize->add_setting( 'ecommerce_wp_options[social_twitter_link]' , array(
	'default'    => '',
	'sanitize_callback' => 'esc_url_raw',
	'type'=>'option'
	));	
	
	$wp_customize->add_control('ecommerce_wp_options[social_twitter_link]' , array(
	'label' => __('Twitter Link','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'url',
	) );
	
	
	$wp_customize->add_setting( 'ecommerce_wp_options[social_whatsapp_link]' , array(
	'default'    => '',
	'sanitize_callback' => 'esc_url_raw',
	'type'=>'option'
	));	
	
	$wp_customize->add_control('ecommerce_wp_options[social_whatsapp_link]' , array(
	'label' => __('Whats App Link','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'url',
	) );							
	
	$wp_customize->add_setting( 'ecommerce_wp_options[social_pinterest_link]' , array(
	'default'    => '',
	'sanitize_callback' => 'esc_url_raw',
	'type'=>'option'
	));	
	
	$wp_customize->add_control('ecommerce_wp_options[social_pinterest_link]' , array(
	'label' => __('Pinterest Link','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'url',
	) );		
	
	$wp_customize->add_setting( 'ecommerce_wp_options[social_instagram_link]' , array(
	'default'    => '',
	'sanitize_callback' => 'esc_url_raw',
	'type'=>'option'
	));	
	
	$wp_customize->add_control('ecommerce_wp_options[social_instagram_link]' , array(
	'label' => __('Instagram Link','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'url',
	) );				
	
	$wp_customize->add_setting( 'ecommerce_wp_options[social_linkdin_link]' , array(
	'default'    => '',
	'sanitize_callback' => 'esc_url_raw',
	'type'=>'option'
	));	
	
	$wp_customize->add_control('ecommerce_wp_options[social_linkdin_link]' , array(
	'label' => __('Linkdin Link','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'url',
	) );	
	
	$wp_customize->add_setting( 'ecommerce_wp_options[social_youtube_link]' , array(
	'default'    => '',
	'sanitize_callback' => 'esc_url_raw',
	'type'=>'option'
	));	
	
	$wp_customize->add_control('ecommerce_wp_options[social_youtube_link]' , array(
	'label' => __('YouTube Link','ecommerce-wp' ),
	'section' => 'ecommerce_wp_contact',
	'type'=>'url',
	) );
	
