<?php
/**
 * eCommerce WP Customizer.
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */

//load section-pro section
require get_template_directory() . '/inc/customizer/section-pro/class-customize.php';


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ecommerce_wp_customize_register( $wp_customize ) {
	$options = ecommerce_wp_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-branding .site-title',
	) );	

	// Header title color setting and control.
	$wp_customize->add_setting( 'ecommerce_wp_options[header_title_color]', array(
		'default'           => $options['header_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage',
		'type'      		=> 'option',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_wp_options[header_title_color]', array(
		'label'             => esc_html__( 'Header Title Color', 'ecommerce-wp' ),
		'section'           => 'colors',
	) ) );
	
	
	// Primary Color
	$wp_customize->add_setting( 'ecommerce_wp_options[primary_color]', array(
		'default'           => $options['primary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'      		=> 'option',
	) );
	/*
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_wp_options[primary_color]', array(
		'label'             => esc_html__( 'Primary Color', 'ecommerce-wp' ),
		'section'           => 'colors',
	) ) );
	*/
	
	// Accent Color
	$wp_customize->add_setting( 'ecommerce_wp_options[accent_color]', array(
		'default'           => $options['accent_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'      		=> 'option',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_wp_options[accent_color]', array(
		'label'             => esc_html__( 'Accent Color', 'ecommerce-wp' ),
		'section'           => 'colors',
	) ) );		
	
	
	// Text Color
	$wp_customize->add_setting( 'ecommerce_wp_options[text_color]', array(
		'default'           => $options['text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'      		=> 'option',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_wp_options[text_color]', array(
		'label'             => esc_html__( 'Text Color', 'ecommerce-wp' ),
		'section'           => 'colors',
	) ) );

	
	// Link Color
	$wp_customize->add_setting( 'ecommerce_wp_options[link_color]', array(
		'default'           => $options['link_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'      		=> 'option',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_wp_options[link_color]', array(
		'label'             => esc_html__( 'Link Color', 'ecommerce-wp' ),
		'section'           => 'colors',
	) ) );	
	
	// Link Hover Color
	$wp_customize->add_setting( 'ecommerce_wp_options[link_hover_color]', array(
		'default'           => $options['link_hover_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'type'      		=> 'option',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_wp_options[link_hover_color]', array(
		'label'             => esc_html__( 'Link Hover Color', 'ecommerce-wp' ),
		'section'           => 'colors',
	) ) );
	
	// Header tagline color setting and control.
	$wp_customize->add_setting( 'ecommerce_wp_options[header_tagline_color]', array(
		'default'           => $options['header_tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage',
		'type'      		=> 'option',		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_wp_options[header_tagline_color]', array(
		'label'             => esc_html__( 'Header Tagline Color', 'ecommerce-wp' ),
		'section'           => 'colors',
	) ) );
	
	
	// Site identity extra options.
	$wp_customize->add_setting( 'ecommerce_wp_options[header_txt_logo_extra]', array(
		'default'           => $options['header_txt_logo_extra'],
		'sanitize_callback' => 'ecommerce_wp_sanitize_select',
		'transport'			=> 'refresh',
		'type'      => 'option',
	) );

	$wp_customize->add_control( 'ecommerce_wp_options[header_txt_logo_extra]', array(
		'priority'			=> 50,
		'type'				=> 'radio',
		'label'             => esc_html__( 'Additional Options', 'ecommerce-wp' ),
		'section'           => 'title_tagline',
		'choices'			=> array( 
								'hide-all'     => esc_html__( 'Hide All', 'ecommerce-wp' ),
								'show-all'     => esc_html__( 'Show All', 'ecommerce-wp' ),
								'logo-only'    => esc_html__( 'Logo Only', 'ecommerce-wp' ),
								'title-tagline'=> esc_html__( 'Title and Tagline', 'ecommerce-wp' ),
								'title-only'   => esc_html__( 'Title only', 'ecommerce-wp' ),
								
			)
	) );

	// Add panel for common theme options
	$wp_customize->add_panel( 'ecommerce_wp_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','ecommerce-wp' ),
	    'description'=> esc_html__( 'eCommerce WP Theme Options.', 'ecommerce-wp' ),
	    'priority'   => 6,
	) );
	


	// contact
	require get_template_directory() . '/inc/customizer/theme-options/contact.php';
			
	// header
	require get_template_directory() . '/inc/customizer/theme-options/header.php';
	
	// preloader
	require get_template_directory() . '/inc/customizer/theme-options/preloader.php';	
	
	// styles
	require get_template_directory() . '/inc/customizer/theme-options/global-styles.php';	
	
	// breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';


    /*
	// Add panel for common theme options
	$wp_customize->add_panel( 'ecommerce_wp_home_panel' , array(
	    'title'      => esc_html__( 'Theme Sections','ecommerce-wp' ),
	    'description'=> esc_html__( 'Displays home page template sections', 'ecommerce-wp' ),
	    'priority'   => 7,
	) );
	
	// load home template options
	require get_template_directory() . '/inc/customizer/home-page-options/sections.php';
		
	// load home template options
	require get_template_directory() . '/inc/customizer/home-page-options/home-slider.php';
    */
		
		
}
add_action( 'customize_register', 'ecommerce_wp_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ecommerce_wp_customize_preview_js() {
	wp_enqueue_script( 'ecommerce-wp-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ecommerce_wp_customize_preview_js' );


/**
 * Load dynamic logic for the customizer controls area.
 */
function ecommerce_wp_customize_control_js() {
	
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/css/chosen.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/js/chosen.jquery.js', array( 'jquery' ), '1.4.2', true );

	wp_enqueue_style( 'ecommerce-wp-customize-controls-css', get_template_directory_uri() . '/css/customize-controls.css' );
	wp_enqueue_script( 'ecommerce-wp-customize-controls', get_template_directory_uri() . '/js/customize-controls.js', array(), '1.0', true );
	$ecommerce_wp_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'ecommerce-wp' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'ecommerce-wp-customize-controls', 'ecommerce_wp_reset_data', $ecommerce_wp_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'ecommerce_wp_customize_control_js' );


/*
 * slider function
 */
function ecommerce_wp_slider_sanitize( $value ) {
    if ( ! in_array( $value, array( 'Uncategorized','category' ) ) )    
    return $value;
}

/*
 * checkbox function
 */ 
function ecommerce_wp_sanitize_checkbox( $checked ) {
    // Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/*
 * radio function
 */ 
function ecommerce_wp_sanitize_radio( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/*
 * 
 */ 

function ecommerce_wp_sanitize_rgba_color( $value ) {
	// Check and mach 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
	$pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';\preg_match( $pattern, $value, $matches );
	// Return 1st mach.
	if ( isset( $matches[0] ) ) {
		if ( is_string( $matches[0] ) ) {
			return $matches[0];
		}
		if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
			return $matches[0][0];
		}
	}
	// if no mach return an empty.
	return '';
}

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function ecommerce_wp_get_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'ecommerce-wp' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function ecommerce_wp_get_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'ecommerce-wp' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}


/*
 * List product category id's
 */
function ecommerce_wp_get_product_categories(){

	$args = array(
			'taxonomy' => 'product_cat',
			'orderby' => 'date',
			'order' => 'ASC',
			'show_count' => 1,
			'pad_counts' => 0,
			'hierarchical' => 0,
			'title_li' => '',
			'hide_empty' => 1,
	);

	$cats = get_categories($args);

	$arr = array();
	$arr['0'] = esc_html__('Select Category', 'ecommerce-wp');
	foreach($cats as $cat){
		$arr[$cat->term_id] = $cat->name;
	}
	return $arr;
}


/*
 * Get post categories
 */

function ecommerce_wp_get_post_categories(){
	$cats = get_categories();
	$arr = array();
	$arr['0'] = esc_html__('Select Post Category', 'ecommerce-wp');
	foreach($cats as $cat){
		$arr[$cat->term_id] = $cat->name;
	}
	return $arr;
}


/**
 * Customizer active callbacks
 * @since 1.0.0
 */

if ( ! function_exists( 'ecommerce_wp_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function ecommerce_wp_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'ecommerce_wp_options[breadcrumb_category]' )->value();
	}
endif;

if ( ! function_exists( 'ecommerce_wp_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function ecommerce_wp_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'ecommerce_wp_options[pagination_enable]' )->value();
	}
endif;


/**
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function ecommerce_wp_is_login_register_meta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'ecommerce_wp_options[topbar_login_register_enable]' )->value() );
}

/**
 * Check if product category enabled
 * @return bool Whether the control is active to the current preview.
 */
function ecommerce_wp_sec_1_is_product_category_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_1_type]' )->value() == '0');
}

function ecommerce_wp_sec_2_is_product_category_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_2_type]' )->value() == '0');
}

function ecommerce_wp_sec_3_is_product_category_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_3_type]' )->value() == '0');
}

function ecommerce_wp_sec_4_is_product_category_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_4_type]' )->value() == '0');
}


/**
 * Check if product type enabled
 * @return bool Whether the control is active to the current preview.
 */
function ecommerce_wp_sec_1_is_product_type_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_1_type]' )->value() == '1');
}

function ecommerce_wp_sec_2_is_product_type_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_2_type]' )->value() == '1');
}

function ecommerce_wp_sec_3_is_product_type_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_3_type]' )->value() == '1');
}

function ecommerce_wp_sec_4_is_product_type_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_4_type]' )->value() == '1');
}
/**
 * Check if product type enabled
 * @return bool Whether the control is active to the current preview.
 */
function ecommerce_wp_sec_1_is_slider_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_1_slider]' )->value() == '1');
}
function ecommerce_wp_sec_2_is_slider_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_2_slider]' )->value() == '1');
}

function ecommerce_wp_sec_3_is_slider_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_3_slider]' )->value() == '1');
}
function ecommerce_wp_sec_4_is_slider_enable( $control ) {
	return ($control->manager->get_setting( 'ecommerce_wp_options[product_section_4_slider]' )->value() == '1');
}

/**
 * Ecommerce Extra plugin installed
 */
function ecommerce_wp_extra_plugin( ) {
	return (class_exists('Ecommerce_Pro_Plugin'));
}


 
/**
 * Available sections
 */
function ecommerce_wp_home_sections(){
	$sections = array(	''									=> esc_html__('--None--', 'ecommerce-wp'),
						'ecommerce_wp_post_slider' 		=> esc_html__('Home Slider', 'ecommerce-wp'),
						'ecommerce_wp_product_showcase' 	=> esc_html__('Product Showcase', 'ecommerce-wp'),
						'ecommerce_wp_product_slider' 	=> esc_html__('Product Slider | Grid 1', 'ecommerce-wp'),
						'ecommerce_wp_product_slider_2' 	=> esc_html__('Product Slider | Grid 2', 'ecommerce-wp'),
						'ecommerce_wp_product_slider_3' 	=> esc_html__('Product Slider | Grid 3', 'ecommerce-wp'),
						'ecommerce_wp_product_slider_4' 	=> esc_html__('Product Slider | Grid 4', 'ecommerce-wp'),						
						'ecommerce_wp_product_category' 	=> esc_html__('Featured Categories', 'ecommerce-wp'),
						'ecommerce_wp_cta' 				=> esc_html__('Call to Action', 'ecommerce-wp'),
						'ecommerce_wp_contact' 			=> esc_html__('Contact Us', 'ecommerce-wp'),
					);
	
	
	$sections = apply_filters('ecommerce_wp_home_sections', $sections);
	
	return $sections;
}


if (class_exists('WP_Customize_Control')) :

/**
 * Simple Link Control
 */
class ecommerce_wp_Custom_Link_Control extends WP_Customize_Control {
   /**
    * The type of control being rendered
    */
   public $type = 'custome_link';
   public $link = '#';
   /**
    * Render the control in the customizer
    */
   public function render_content() {
   ?>
   <div class="simple-notice-custom-control" style="text-align:center; padding:6px;">
      <?php if( !empty( $this->description ) && !empty( $this->link ) && !(ecommerce_wp_extra_plugin())) { ?>
         <a href="<?php echo esc_url( $this->link ); ?>" target="_blank"><b><span class="customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span></b></a>
      <?php } ?>
   </div>
   <?php
   }
}


/**
 * Simple Label Control
 */
class ecommerce_wp_Custom_Label_Control extends WP_Customize_Control {
   /**
    * The type of control being rendered
    */
   public $type = 'custome_label';
   public $description = '';
   /**
    * Render the control in the customizer
    */
   public function render_content() {
   ?>
   <div class="simple-notice-custom-control" style="text-align: left;padding: 4px 10px;background-color: #026baa;color: #fff; display: inline-block;">
      <?php if( !empty( $this->description ) ) { ?>
         <b><span class="customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
      <?php } ?>
   </div>
   <?php
   }
}

endif;