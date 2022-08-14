<?php
/**
 * Archive options
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */
global $ecommerce_wp_options;

// Add archive section
$wp_customize->add_section( 'ecommerce_wp_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive/Post','ecommerce-wp' ),
	'panel'             => 'ecommerce_wp_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'type'      		=> 'option',
) );

$wp_customize->add_control( 'ecommerce_wp_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'ecommerce-wp' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'ecommerce-wp' ),
	'section'           => 'ecommerce_wp_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'ecommerce_wp_is_latest_posts'
) );


//
$wp_customize->add_setting( 'ecommerce_wp_options[archive_label]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[archive_label]',
   array(
	  'description'  => esc_html__( 'Archive meta and control', 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_archive_section'
   )
) );

// Archive date meta setting and control.

$wp_customize->add_setting( 'ecommerce_wp_options[hide_date]', array(
	'default'   => true,
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[hide_date]',
	array(
		'section'   => 'ecommerce_wp_archive_section',
		'label'     => esc_html__( 'Hide Date', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);

// Archive author category setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[hide_category]', array(
	'default'   => true,
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[hide_category]',
	array(
		'section'   => 'ecommerce_wp_archive_section',
		'label'     => esc_html__( 'Hide Category', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);



/**
 * pagination options
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */

//
$wp_customize->add_setting( 'ecommerce_wp_options[archive_label2]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[archive_label2]',
   array(
	  'description'  => esc_html__( 'Pagination Settings' , 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_archive_section'
   )
) );

// Pagination
$wp_customize->add_setting( 'ecommerce_wp_options[pagination_enable]', array(
	'default'   => true,
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[pagination_enable]',
	array(
		'section'   => 'ecommerce_wp_archive_section',
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
	'section'             => 'ecommerce_wp_archive_section',
	'type'                => 'select',
	'choices'			  => ecommerce_wp_pagination_options(),
	'active_callback'	  => 'ecommerce_wp_is_pagination_enable',
) );


/**
 * Excerpt options
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */


$wp_customize->add_setting( 'ecommerce_wp_options[archive_label3]',
   array(
	  'default' => '',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'wp_filter_nohtml_kses'
   )
);

$wp_customize->add_control( new ecommerce_wp_Custom_Label_Control( $wp_customize, 'ecommerce_wp_options[archive_label3]',
   array(
	  'description'  => esc_html__( 'Single Post' , 'ecommerce-wp' ),
	  'section' => 'ecommerce_wp_archive_section'
   )
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'ecommerce_wp_options[single_post_hide_date]', array(
	'default'   => true,
	'type'      => 'option',
	'sanitize_callback' => 'ecommerce_wp_sanitize_checkbox',
 ) );

$wp_customize->add_control('ecommerce_wp_options[single_post_hide_date]',
	array(
		'section'   => 'ecommerce_wp_archive_section',
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
		'section'   => 'ecommerce_wp_archive_section',
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
		'section'   => 'ecommerce_wp_archive_section',
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
		'section'   => 'ecommerce_wp_archive_section',
		'label'     => esc_html__( 'Hide Tag', 'ecommerce-wp' ),
		'type'      => 'checkbox'
		 )
);


