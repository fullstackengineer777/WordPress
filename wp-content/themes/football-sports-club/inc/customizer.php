<?php
/**
 * Football Sports Club Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Football Sports Club
 */

use WPTRT\Customize\Section\Football_Sports_Club_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Football_Sports_Club_Button::class );

    $manager->add_section(
        new Football_Sports_Club_Button( $manager, 'football_sports_club_pro', [
            'title'       => __( 'Sports Club Pro', 'football-sports-club' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'football-sports-club' ),
            'button_url'  => esc_url( 'https://www.themagnifico.net/themes/wordpress-sports-club-theme/', 'football-sports-club')
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'football-sports-club-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'football-sports-club-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function football_sports_club_customize_register($wp_customize){
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    // General Settings
     $wp_customize->add_section('football_sports_club_general_settings',array(
        'title' => esc_html__('General Settings','football-sports-club'),
        'description' => esc_html__('General settings of our theme.','football-sports-club'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('football_sports_club_preloader_hide', array(
        'default' => '0',
        'sanitize_callback' => 'football_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'football_sports_club_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'football-sports-club' ),
        'section'        => 'football_sports_club_general_settings',
        'settings'       => 'football_sports_club_preloader_hide',
        'type'           => 'checkbox',
    )));

    // Top Header
    $wp_customize->add_section('football_sports_club_top_header',array(
        'title' => esc_html__('Top Header','football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_upcoming_match',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('football_sports_club_upcoming_match',array(
        'label' => esc_html__('Add Upcoming Match','football-sports-club'),
        'section' => 'football_sports_club_top_header',
        'setting' => 'football_sports_club_upcoming_match',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('football_sports_club_phone',array(
        'default' => '',
        'sanitize_callback' => 'football_sports_club_sanitize_phone_number'
    ));
    $wp_customize->add_control('football_sports_club_phone',array(
        'label' => esc_html__('Add Phone Number','football-sports-club'),
        'section' => 'football_sports_club_top_header',
        'setting' => 'football_sports_club_phone',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('football_sports_club_address',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('football_sports_club_address',array(
        'label' => esc_html__('Add Location Address','football-sports-club'),
        'section' => 'football_sports_club_top_header',
        'setting' => 'football_sports_club_address',
        'type'  => 'text'
    ));

    // Social Link
    $wp_customize->add_section('football_sports_club_social_link',array(
        'title' => esc_html__('Social Links','football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('football_sports_club_facebook_url',array(
        'label' => esc_html__('Facebook Link','football-sports-club'),
        'section' => 'football_sports_club_social_link',
        'setting' => 'football_sports_club_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('football_sports_club_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('football_sports_club_twitter_url',array(
        'label' => esc_html__('Twitter Link','football-sports-club'),
        'section' => 'football_sports_club_social_link',
        'setting' => 'football_sports_club_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('football_sports_club_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('football_sports_club_intagram_url',array(
        'label' => esc_html__('Intagram Link','football-sports-club'),
        'section' => 'football_sports_club_social_link',
        'setting' => 'football_sports_club_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('football_sports_club_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('football_sports_club_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','football-sports-club'),
        'section' => 'football_sports_club_social_link',
        'setting' => 'football_sports_club_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('football_sports_club_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('football_sports_club_youtube_url',array(
        'label' => esc_html__('YouTube Link','football-sports-club'),
        'section' => 'football_sports_club_social_link',
        'setting' => 'football_sports_club_pintrest_url',
        'type'  => 'url'
    ));
    
    //Slider
    $wp_customize->add_section('football_sports_club_top_slider',array(
        'title' => esc_html__('Slider Option','football-sports-club')
    ));

    for ( $count = 1; $count <= 3; $count++ ) {
        $wp_customize->add_setting( 'football_sports_club_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'football_sports_club_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'football_sports_club_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'football-sports-club' ),
            'section'  => 'football_sports_club_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    // Sports Activity
    $wp_customize->add_section('football_sports_club_sports_activities_section',array(
        'title' => esc_html__('Sports Activity','football-sports-club'),
        'description' => esc_html__('Here you have to select category which will display perticular sports activity in the home page.','football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_sports_activities_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('football_sports_club_sports_activities_title',array(
        'label' => esc_html__('Section Title','football-sports-club'),
        'section' => 'football_sports_club_sports_activities_section',
        'setting' => 'football_sports_club_sports_activities_title',
        'type'  => 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0; 
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('football_sports_club_sports_activities_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'football_sports_club_sanitize_select',
    ));
    $wp_customize->add_control('football_sports_club_sports_activities_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select category to display sports activities','football-sports-club'),
        'section' => 'football_sports_club_sports_activities_section',
    ));

    $wp_customize->add_setting('football_sports_club_sports_activities_per_page',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('football_sports_club_sports_activities_per_page',array(
        'label' => esc_html__('No Of Icons','football-sports-club'),
        'section' => 'football_sports_club_sports_activities_section',
        'setting' => 'football_sports_club_sports_activities_per_page',
        'type'  => 'text'
    ));

    $icon = get_theme_mod('football_sports_club_sports_activities_per_page','');
    for ($i=1; $i <= $icon; $i++) {
        $wp_customize->add_setting('football_sports_club_sports_activities_icon'.$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )); 
        $wp_customize->add_control('football_sports_club_sports_activities_icon'.$i,array(
            'label' => esc_html__('Icon ','football-sports-club').$i,
            'section' => 'football_sports_club_sports_activities_section',
            'setting' => 'football_sports_club_sports_activities_icon'.$i,
            'type'  => 'text'
        ));
    }
    
    // Footer
    $wp_customize->add_section('football_sports_club_site_footer_section', array(
        'title' => esc_html__('Footer', 'football-sports-club'),
    ));

    $wp_customize->add_setting('football_sports_club_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('football_sports_club_footer_text_setting', array(
        'label' => __('Replace the footer text', 'football-sports-club'),
        'section' => 'football_sports_club_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}
add_action('customize_register', 'football_sports_club_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function football_sports_club_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function football_sports_club_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function football_sports_club_customize_preview_js(){
    wp_enqueue_script('football-sports-club-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'football_sports_club_customize_preview_js');