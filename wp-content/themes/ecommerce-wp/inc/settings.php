<?php 
/**
 * Customizer default options
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 * @return array An array of default values
 */

function ecommerce_wp_get_default_theme_options() {
	$ecommerce_wp_default_options = array(
	
		// Header Options
		'site_header_layout'			=> 'storefront',
				
		'prealoader_style'				=> '',
		'ajax_search'					=> false,
		
		//layout
		'footer_width'					=> 1280,
		'content_width'					=> 1280,
		'header_width'					=> 1280,
				
		// styles
		'featured_heading_style'		=> 'default',
		'two_colum_checkout'			=> 'true',
		
		//banner
		'banner_image'					=> '',
		'banner_link'					=> '',		
		
		// Color Options
		'primary_color'					=> '#178dff',		
		'link_color'					=> '#404040',
		'text_color'					=> '#4a4a4a',
		'link_hover_color'				=> '#178dff',
		'accent_color'					=> '#dd3333',
		
		'store_menu_color'				=> '#fff',
		'store_menubar_color'			=> '#178dff',		
		
		'header_title_color'			=> '#002a45',
		'header_tagline_color'			=> '#373737',
		'header_txt_logo_extra'			=> 'show-all',
		'header_bg_color'				=> '#ffffff',
		
		'header_text_color'				=> '#002a45',
		
		'menubar_border_height'			=> 0,
		'menubar_border_color'			=> '#eaeaea',		
		
		
		//post slider
		'slider_cat'					=> '0',	
		'slider_height'					=> 450,
		'slider_title_text'				=> true,
		'slider_max'					=> 3,
		'slider_btn_label'				=> esc_html__('Read More', 'ecommerce-wp'),			
		'slider_btn_url'				=> '',
		'slider_button'					=> false,
		'title_text'					=> false,
				
		// Fonts
		'heading_font'					=> 'Oswald',
		'body_font'						=> 'Work Sans',
		
		'contact_section_address'		=> '',
		'contact_section_email'			=> '',
		'contact_section_phone'			=> '',
		'contact_section_hours'			=> '',
		
		//color
		'contact_bg_color'				=> 'rgba(0,0,0,0.45)',	
			
		//social
		'social_facebook_link'			=> '',
		'social_twitter_link'			=> '',
		'social_whatsapp_link'			=> '',
		'social_pinterest_link'			=> '',
		'social_instagram_link'			=> '',
		'social_linkdin_link'			=> '',
		'social_youtube_link'			=> '',
	
		
		// breadcrumb
		'breadcrumb_category'			=> true,
		'breadcrumb_show'				=> false,
		'breadcrumb_separator'			=> '>',
		'breadcrumb_image'				=> get_template_directory_uri(). '/images/breadcrumb.jpg',
		
		// layout 
		'site_layout'         			=> 'fluid',
		'sidebar_position' 				=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'no-sidebar',
		'woo_sidebar_position'			=> 'left-sidebar',


		// excerpt options
		'long_excerpt_length'           => 20,
		'read_more_text'           		=> esc_html__( 'Read More', 'ecommerce-wp' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'footer_bg_color'           	=> 'rgba(40,40,40,0.4)',
		'copyright_text'           		=> esc_html__('eCommerce WP Theme', 'ecommerce-wp'),
		'scroll_top_visible'        	=> true,
		'footer_image'        			=> '',	
		'footer_text_color'           	=> '#fff',	


		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'ecommerce-wp' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,
		
		// top bar
		'topbar_login_register_enable'	=> false,
		'topbar_login_label'			=> esc_html__( 'Contact', 'ecommerce-wp' ),
		'topbar_login_url'				=> '',
		
	);

	$output = apply_filters( 'ecommerce_wp_default_theme_options', $ecommerce_wp_default_options );

	return $output;
}