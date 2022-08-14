<?php
/**
 * VW Sports Theme Customizer
 *
 * @package VW Sports
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_sports_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_sports_custom_controls' );

function vw_sports_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_sports_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_sports_Customize_partial_blogdescription',
	));

	//add home page setting pannel
	$vw_sports_parent_panel = new VW_Sports_WP_Customize_Panel( $wp_customize, 'vw_sports_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-sports' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_sports_left_right', array(
    	'title' => esc_html__( 'General Settings', 'vw-sports' ),
		'panel' => 'vw_sports_panel_id'
	) );

	$wp_customize->add_setting('vw_sports_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Sports_Image_Radio_Control($wp_customize, 'vw_sports_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','vw-sports'),
        'description' => esc_html__('Here you can change the width layout of Website.','vw-sports'),
        'section' => 'vw_sports_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_sports_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vw-sports'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-sports'),
        'section' => 'vw_sports_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vw-sports'),
            'Right Sidebar' => esc_html__('Right Sidebar','vw-sports'),
            'One Column' => esc_html__('One Column','vw-sports'),
            'Grid Layout' => esc_html__('Grid Layout','vw-sports')
        ),
	) );

	$wp_customize->add_setting('vw_sports_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','vw-sports'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-sports'),
        'section' => 'vw_sports_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','vw-sports'),
            'Right_Sidebar' => esc_html__('Right Sidebar','vw-sports'),
            'One_Column' => esc_html__('One Column','vw-sports')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_sports_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'vw_sports_customize_partial_vw_sports_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_sports_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-sports' ),
		'section' => 'vw_sports_left_right'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_sports_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'vw_sports_customize_partial_vw_sports_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_sports_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-sports' ),
		'section' => 'vw_sports_left_right'
    )));

    $wp_customize->add_setting('vw_sports_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_left_right',
		'type'=> 'text'
	));

    //Pre-Loader
	$wp_customize->add_setting( 'vw_sports_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-sports' ),
        'section' => 'vw_sports_left_right'
    )));

	$wp_customize->add_setting('vw_sports_preloader_bg_color', array(
		'default'           => '#ff6c26',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-sports'),
		'section'  => 'vw_sports_left_right',
	)));

	$wp_customize->add_setting('vw_sports_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-sports'),
		'section'  => 'vw_sports_left_right',
	)));

	//Slider
	$wp_customize->add_section( 'vw_sports_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'vw-sports' ),
		'panel' => 'vw_sports_panel_id'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_sports_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_slider_arrows',
	));

	$wp_customize->add_setting( 'vw_sports_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-sports' ),
      	'section' => 'vw_sports_slidersettings'
    )));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_sports_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'vw_sports_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_sports_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'vw-sports' ),
			'description' => esc_html__('Slider image size (1600 x 650)','vw-sports'),
			'section'  => 'vw_sports_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'vw_sports_slider_title_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_slider_title_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Title','vw-sports' ),
		'section' => 'vw_sports_slidersettings'
    )));

	$wp_customize->add_setting( 'vw_sports_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','vw-sports' ),
		'section' => 'vw_sports_slidersettings'
    )));

	//content layout
	$wp_customize->add_setting('vw_sports_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Sports_Image_Radio_Control($wp_customize, 'vw_sports_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','vw-sports'),
        'section' => 'vw_sports_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

     //Slider content padding
    $wp_customize->add_setting('vw_sports_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-sports'),
		'description'	=> __('Enter a value in %. Example:20%','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-sports'),
		'description'	=> __('Enter a value in %. Example:20%','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_slidersettings',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_sports_slider_excerpt_number', array(
		'default'              => 45,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_sports_slider_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-sports' ),
		'section'     => 'vw_sports_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_sports_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_sports_slider_button_text',array(
		'default'=> esc_html__('READ MORE','vw-sports'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_slider_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'READ MORE', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_slidersettings',
		'type'=> 'text'
	));

	//Services
	$wp_customize->add_section('vw_sports_services',array(
		'title'	=> __('Game Section','vw-sports'),
		'description' => __('Increase the number of tab and publish the settings and then refresh the page then the game settings will increase.','vw-sports'),
		'panel' => 'vw_sports_panel_id',
	));

	$wp_customize->add_setting('vw_sports_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_sports_services_text',array(
		'label'	=> esc_html__('Game Section Heading','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Game Highlights', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_services_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_sports_services_number',array(
		'label'	=> esc_html__('No of Tabs to show','vw-sports'),
		'section'=> 'vw_sports_services',
		'type'=> 'number'
	));	

	$featured_post = get_theme_mod('vw_sports_services_number','');
    for ( $j = 1; $j <= $featured_post; $j++ ) {
		$wp_customize->add_setting('vw_sports_services_text'.$j,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('vw_sports_services_text'.$j,array(
			'label'	=> esc_html__('Tab ','vw-sports').$j,
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'All', 'vw-sports' ),
	        ),
			'section'=> 'vw_sports_services',
			'type'=> 'text'
		));

		$categories = get_categories();
			$cat_posts = array();
				$i = 0;
				$cat_posts[]='Select';
			foreach($categories as $category){
				if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cat_posts[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('vw_sports_services_category'.$j,array(
			'default'	=> 'select',
			'sanitize_callback' => 'vw_sports_sanitize_choices',
		));
		$wp_customize->add_control('vw_sports_services_category'.$j,array(
			'type'    => 'select',
			'choices' => $cat_posts,
			'label' => __('Select Category to display game highlight','vw-sports'),
			'section' => 'vw_sports_services',
		));
	}

	//Blog Post
	$wp_customize->add_panel( $vw_sports_parent_panel );

	$BlogPostParentPanel = new VW_Sports_WP_Customize_Panel( $wp_customize, 'vw_sports_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-sports' ),
		'panel' => 'vw_sports_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_sports_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-sports' ),
		'panel' => 'vw_sports_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_sports_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_sports_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-sports' ),
        'section' => 'vw_sports_post_settings'
    )));

    $wp_customize->add_setting( 'vw_sports_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_author',array(
		'label' => esc_html__( 'Author','vw-sports' ),
		'section' => 'vw_sports_post_settings'
    )));

    $wp_customize->add_setting( 'vw_sports_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-sports' ),
		'section' => 'vw_sports_post_settings'
    )));

    $wp_customize->add_setting( 'vw_sports_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_time',array(
		'label' => esc_html__( 'Time','vw-sports' ),
		'section' => 'vw_sports_post_settings'
	)));

	$wp_customize->add_setting( 'vw_sports_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-sports' ),
		'section' => 'vw_sports_post_settings'
    )));

    $wp_customize->add_setting( 'vw_sports_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-sports' ),
		'section' => 'vw_sports_post_settings'
    )));

    $wp_customize->add_setting( 'vw_sports_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-sports' ),
		'section'     => 'vw_sports_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_sports_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-sports' ),
		'section'     => 'vw_sports_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'vw_sports_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_sports_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-sports' ),
		'section'     => 'vw_sports_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_sports_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('vw_sports_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','vw-sports'),
        'section' => 'vw_sports_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vw-sports'),
            'Excerpt' => esc_html__('Excerpt','vw-sports'),
            'No Content' => esc_html__('No Content','vw-sports')
        ),
	) );

	$wp_customize->add_setting('vw_sports_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-sports'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-sports'),
		'section'=> 'vw_sports_post_settings',
		'type'=> 'text'
	));

    // Button Settings
	$wp_customize->add_section( 'vw_sports_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-sports' ),
		'panel' => 'vw_sports_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_sports_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_sports_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-sports' ),
		'section'     => 'vw_sports_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_sports_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_button_text', 
	));

    $wp_customize->add_setting('vw_sports_button_text',array(
		'default'=> esc_html__('READ MORE','vw-sports'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'READ MORE', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_sports_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-sports' ),
		'panel' => 'vw_sports_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_sports_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_sports_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_related_post',array(
		'label' => esc_html__( 'Related Post','vw-sports' ),
		'section' => 'vw_sports_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_sports_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_sports_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_sports_sanitize_number_absint'
	));
	$wp_customize->add_control('vw_sports_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_sports_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-sports' ),
		'panel' => 'vw_sports_blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_sports_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-sports'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-sports'),
		'section'=> 'vw_sports_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-sports'),
		'description'	=> __('Enter a value in %. Example:50%','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_single_blog_settings',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_sports_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-sports'),
		'panel' => 'vw_sports_panel_id',
	));	

	$wp_customize->add_setting('vw_sports_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_no_results_page_title',array(
		'label'	=> __('Add Title','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_no_results_page_content',array(
		'label'	=> __('Add Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_no_results_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_sports_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-sports'),
		'panel' => 'vw_sports_panel_id',
	));

    $wp_customize->add_setting( 'vw_sports_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-sports' ),
      	'section' => 'vw_sports_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_sports_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','vw-sports' ),
      	'section' => 'vw_sports_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_sports_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-sports' ),
      	'section' => 'vw_sports_responsive_media'
    )));

    $wp_customize->add_setting('vw_sports_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_responsive_media',
		'setting'	=> 'vw_sports_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_sports_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_responsive_media',
		'setting'	=> 'vw_sports_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('vw_sports_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-sports'),
		'panel' => 'vw_sports_panel_id',
	));	

	$wp_customize->add_setting('vw_sports_footer_background_color', array(
		'default'           => '#151821',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-sports'),
		'section'  => 'vw_sports_footer',
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_sports_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_footer_text', 
	));
	
	$wp_customize->add_setting('vw_sports_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_sports_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Sports_Image_Radio_Control($wp_customize, 'vw_sports_copyright_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vw-sports'),
        'section' => 'vw_sports_footer',
        'settings' => 'vw_sports_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'vw_sports_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));  
    $wp_customize->add_control( new vw_sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-sports' ),
      	'section' => 'vw_sports_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_sports_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_sports_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control(new vw_sports_Image_Radio_Control($wp_customize, 'vw_sports_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','vw-sports'),
        'section' => 'vw_sports_footer',
        'settings' => 'vw_sports_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_sports_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-sports'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('vw_sports_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_sports_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-sports' ),
		'section'     => 'vw_sports_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_sports_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_woocommerce_section',
		'type'=> 'text'
	));

    //Products Sale Badge
	$wp_customize->add_setting('vw_sports_woocommerce_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-sports'),
        'section' => 'vw_sports_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-sports'),
            'right' => __('Right','vw-sports'),
        ),
	) );

	$wp_customize->add_setting('vw_sports_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_woocommerce_section',
		'type'=> 'text'
	));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Sports_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Sports_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_sports_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Sports_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_sports_panel';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Sports_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_sports_section';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_sports_Customize_controls_scripts() {
	wp_enqueue_script( 'vw-sports-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_sports_Customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Sports_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Sports_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Sports_Customize_Section_Pro( $manager,'vw_sports_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'SPORTS PRO', 'vw-sports' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-sports' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-sports-theme/'),
		) )	);

		$manager->add_section(new VW_Sports_Customize_Section_Pro($manager,'vw_sports_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-sports' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-sports' ),
			'pro_url'  => admin_url('themes.php?page=vw_sports_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-sports-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-sports-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Sports_Customize::get_instance();