<?php
/**
 * Supermart Ecommerce: Customizer
 *
 * @subpackage Supermart Ecommerce
 * @since 1.0
 */

use WPTRT\Customize\Section\Supermart_Ecommerce_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Supermart_Ecommerce_Button::class );

	$manager->add_section(
		new Supermart_Ecommerce_Button( $manager, 'supermart_ecommerce_pro', [
			'title'      => __( 'Supermart Ecommerce Pro', 'supermart-ecommerce' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'supermart-ecommerce' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/ecommerce-wordpress-template/', 'supermart-ecommerce')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'supermart-ecommerce-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'supermart-ecommerce-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function supermart_ecommerce_customize_register( $wp_customize ) {

	$wp_customize->add_setting('supermart_ecommerce_logo_margin',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('supermart_ecommerce_logo_margin',array(
		'label' => __('Logo Margin','supermart-ecommerce'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('supermart_ecommerce_logo_top_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'supermart_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('supermart_ecommerce_logo_top_margin',array(
		'type' => 'number',
		'description' => __('Top','supermart-ecommerce'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('supermart_ecommerce_logo_bottom_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'supermart_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('supermart_ecommerce_logo_bottom_margin',array(
		'type' => 'number',
		'description' => __('Bottom','supermart-ecommerce'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('supermart_ecommerce_logo_left_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'supermart_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('supermart_ecommerce_logo_left_margin',array(
		'type' => 'number',
		'description' => __('Left','supermart-ecommerce'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('supermart_ecommerce_logo_right_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'supermart_ecommerce_sanitize_float'
 	));
 	$wp_customize->add_control('supermart_ecommerce_logo_right_margin',array(
		'type' => 'number',
		'description' => __('Right','supermart-ecommerce'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('supermart_ecommerce_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'supermart_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('supermart_ecommerce_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','supermart-ecommerce'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('supermart_ecommerce_site_title_fontsize',array(
		'default' => '',
		'sanitize_callback'	=> 'supermart_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('supermart_ecommerce_site_title_fontsize',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','supermart-ecommerce'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('supermart_ecommerce_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'supermart_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('supermart_ecommerce_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','supermart-ecommerce'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('supermart_ecommerce_site_tagline_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'supermart_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('supermart_ecommerce_site_tagline_font_size',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','supermart-ecommerce'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_panel( 'supermart_ecommerce_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'supermart-ecommerce' ),
		'description' => __( 'Description of what this panel does.', 'supermart-ecommerce' ),
	) );

	$wp_customize->add_section( 'supermart_ecommerce_theme_options_section', array(
    	'title'      => __( 'General Settings', 'supermart-ecommerce' ),
		'priority'   => 30,
		'panel' => 'supermart_ecommerce_panel_id'
	) );

	$wp_customize->add_setting('supermart_ecommerce_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'supermart_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('supermart_ecommerce_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','supermart-ecommerce'),
		'section' => 'supermart_ecommerce_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','supermart-ecommerce'),
		   'Right Sidebar' => __('Right Sidebar','supermart-ecommerce'),
		   'One Column' => __('One Column','supermart-ecommerce'),
		   'Grid Layout' => __('Grid Layout','supermart-ecommerce')
		),
	));

	$wp_customize->add_setting('supermart_ecommerce_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'supermart_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('supermart_ecommerce_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','supermart-ecommerce'),
        'section' => 'supermart_ecommerce_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','supermart-ecommerce'),
            'Right Sidebar' => __('Right Sidebar','supermart-ecommerce'),
            'One Column' => __('One Column','supermart-ecommerce')
        ),
	));

	$wp_customize->add_setting('supermart_ecommerce_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'supermart_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('supermart_ecommerce_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','supermart-ecommerce'),
        'section' => 'supermart_ecommerce_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','supermart-ecommerce'),
            'Right Sidebar' => __('Right Sidebar','supermart-ecommerce'),
            'One Column' => __('One Column','supermart-ecommerce')
        ),
	));

	$wp_customize->add_setting('supermart_ecommerce_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'supermart_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('supermart_ecommerce_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','supermart-ecommerce'),
        'section' => 'supermart_ecommerce_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','supermart-ecommerce'),
            'Right Sidebar' => __('Right Sidebar','supermart-ecommerce'),
            'One Column' => __('One Column','supermart-ecommerce'),
            'Grid Layout' => __('Grid Layout','supermart-ecommerce')
        ),
	));

	//Header
	$wp_customize->add_section( 'supermart_ecommerce_header_section' , array(
    	'title'    => __( 'Header', 'supermart-ecommerce' ),
		'priority' => null,
		'panel' => 'supermart_ecommerce_panel_id'
	) );

	$wp_customize->add_setting('supermart_ecommerce_sale_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermart_ecommerce_sale_text',array(
	   	'type' => 'text',
	   	'label' => __('Sale Text','supermart-ecommerce'),
	   	'section' => 'supermart_ecommerce_header_section',
	));

	$wp_customize->add_setting('supermart_ecommerce_shop_btn',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('supermart_ecommerce_shop_btn',array(
	   	'type' => 'text',
	   	'label' => __('Shop Now Button Text','supermart-ecommerce'),
	   	'section' => 'supermart_ecommerce_header_section',
	));

	$wp_customize->add_setting('supermart_ecommerce_phone_no',array(
    	'default' => '',
    	'sanitize_callback'	=> 'supermart_ecommerce_sanitize_phone_number'
	));
	$wp_customize->add_control('supermart_ecommerce_phone_no',array(
	   	'type' => 'text',
	   	'label' => __('Phone No.','supermart-ecommerce'),
	   	'section' => 'supermart_ecommerce_header_section',
	));

	//home page slider
	$wp_customize->add_section( 'supermart_ecommerce_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'supermart-ecommerce' ),
		'priority' => null,
		'panel' => 'supermart_ecommerce_panel_id'
	) );

	$wp_customize->add_setting('supermart_ecommerce_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'supermart_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('supermart_ecommerce_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','supermart-ecommerce'),
	   	'section' => 'supermart_ecommerce_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'supermart_ecommerce_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'supermart_ecommerce_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'supermart_ecommerce_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'supermart-ecommerce' ),
			'description' => __('Image Size (625px x 335px)', 'supermart-ecommerce' ),
			'section' => 'supermart_ecommerce_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	//home page slider
	$wp_customize->add_section( 'supermart_ecommerce_blocks_section' , array(
    	'title'    => __( 'Collection Blocks', 'supermart-ecommerce' ),
		'priority' => null,
		'panel' => 'supermart_ecommerce_panel_id'
	) );

	$wp_customize->add_setting( 'supermart_ecommerce_collection1', array(
		'default'           => '',
		'sanitize_callback' => 'supermart_ecommerce_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'supermart_ecommerce_collection1', array(
		'label' => __('Select Collection Page 1', 'supermart-ecommerce' ),
		'description' => __('Image Size (312px x 160px)', 'supermart-ecommerce' ),
		'section' => 'supermart_ecommerce_blocks_section',
		'type' => 'dropdown-pages'
	));

	$wp_customize->add_setting( 'supermart_ecommerce_collection2', array(
		'default'           => '',
		'sanitize_callback' => 'supermart_ecommerce_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'supermart_ecommerce_collection2', array(
		'label' => __('Select Collection Page 2', 'supermart-ecommerce' ),
		'description' => __('Image Size (312px x 160px)', 'supermart-ecommerce' ),
		'section' => 'supermart_ecommerce_blocks_section',
		'type' => 'dropdown-pages'
	));

	//Service Section
	$wp_customize->add_section('supermart_ecommerce_product_section',array(
		'title'	=> __('Product Section','supermart-ecommerce'),
		'description'=> __('This section will appear below the slider.','supermart-ecommerce'),
		'panel' => 'supermart_ecommerce_panel_id',
	));

	$wp_customize->add_setting( 'supermart_ecommerce_product_page', array(
		'default'           => '',
		'sanitize_callback' => 'supermart_ecommerce_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'supermart_ecommerce_product_page', array(
		'label' => __('Select Product Page', 'supermart-ecommerce' ),
		'section' => 'supermart_ecommerce_product_section',
		'type' => 'dropdown-pages'
	));

	//Footer
    $wp_customize->add_section( 'supermart_ecommerce_footer', array(
    	'title'  => __( 'Footer Text', 'supermart-ecommerce' ),
		'priority' => null,
		'panel' => 'supermart_ecommerce_panel_id'
	) );

	$wp_customize->add_setting('supermart_ecommerce_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'supermart_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('supermart_ecommerce_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','supermart-ecommerce'),
       'section' => 'supermart_ecommerce_footer'
    ));

    $wp_customize->add_setting('supermart_ecommerce_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('supermart_ecommerce_footer_copy',array(
		'label'	=> __('Footer Text','supermart-ecommerce'),
		'section' => 'supermart_ecommerce_footer',
		'setting' => 'supermart_ecommerce_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'supermart_ecommerce_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'supermart_ecommerce_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'supermart_ecommerce_customize_register' );

function supermart_ecommerce_customize_partial_blogname() {
	bloginfo( 'name' );
}

function supermart_ecommerce_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function supermart_ecommerce_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function supermart_ecommerce_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}