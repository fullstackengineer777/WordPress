<?php
/**
 * Supermart Ecommerce functions and definitions
 *
 * @subpackage Supermart Ecommerce
 * @since 1.0
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Supermart_Ecommerce_Loader.php' );

$supermart_ecommerce_loader = new \WPTRT\Autoload\Supermart_Ecommerce_Loader();

$supermart_ecommerce_loader->supermart_ecommerce_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$supermart_ecommerce_loader->supermart_ecommerce_register();

function supermart_ecommerce_setup() {
	
	load_theme_textdomain( 'supermart-ecommerce', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', $defaults = array(
	    'default-color'          => '',
	    'default-image'          => '',
	    'default-repeat'         => '',
	    'default-position-x'     => '',
	    'default-attachment'     => '',
	    'wp-head-callback'       => '_custom_background_cb',
	    'admin-head-callback'    => '',
	    'admin-preview-callback' => ''
	));

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'supermart-ecommerce' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', supermart_ecommerce_fonts_url() ) );

	// Theme Activation Notice
	global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'supermart_ecommerce_activation_notice' );
	}

}
add_action( 'after_setup_theme', 'supermart_ecommerce_setup' );

// Notice after Theme Activation
function supermart_ecommerce_activation_notice() {
	echo '<div class="notice notice-success is-dismissible start-notice">';
		echo '<h3>'. esc_html__( 'Welcome to Luzuk!!', 'supermart-ecommerce' ) .'</h3>';
		echo '<p>'. esc_html__( 'Thank you for choosing Supermart Ecommerce theme. It will be our pleasure to have you on our Welcome page to serve you better.', 'supermart-ecommerce' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=supermart_ecommerce_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'supermart-ecommerce' ) .'</a></p>';
	echo '</div>';
}

function supermart_ecommerce_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'supermart-ecommerce' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'supermart-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'supermart-ecommerce' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'supermart-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'supermart-ecommerce' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'supermart-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'supermart-ecommerce' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'supermart-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'supermart-ecommerce' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'supermart-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'supermart-ecommerce' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'supermart-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'supermart-ecommerce' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'supermart-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'supermart_ecommerce_widgets_init' );

function supermart_ecommerce_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	$query_args = array(
		'family' => rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function supermart_ecommerce_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'supermart-ecommerce-fonts', supermart_ecommerce_fonts_url(), array(), null );
	
	//Bootstarp 
	wp_enqueue_style( 'bootstrap-css', esc_url( get_template_directory_uri() ).'/assets/css/bootstrap.css' );
	
	// Theme stylesheet.
	wp_enqueue_style( 'supermart-ecommerce-basic-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'supermart-ecommerce-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'supermart-ecommerce-style' ), '1.0' );
		wp_style_add_data( 'supermart-ecommerce-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'supermart-ecommerce-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'supermart-ecommerce-style' ), '1.0' );
	wp_style_add_data( 'supermart-ecommerce-ie8', 'conditional', 'lt IE 9' );

	//font-awesome
	wp_enqueue_style( 'font-awesome-css', esc_url( get_template_directory_uri() ).'/assets/css/fontawesome-all.css' );

	require get_parent_theme_file_path( '/lz-custom-style.php' );
	wp_add_inline_style( 'supermart-ecommerce-basic-style',$supermart_ecommerce_custom_style );

	wp_enqueue_script( 'supermart-ecommerce-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-js', esc_url( get_template_directory_uri() ). '/assets/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', esc_url( get_template_directory_uri() ). '/assets/js/jquery.superfish.js', array('jquery') ,'',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'supermart_ecommerce_scripts' );

function supermart_ecommerce_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'supermart_ecommerce_front_page_template' );

define('SUPERMART_ECOMMERCE_LIVE_DEMO',__('https://www.luzukdemo.com/demo/supermart-ecommerce/','supermart-ecommerce'));
define('SUPERMART_ECOMMERCE_PRO_DOCS',__('https://www.luzukdemo.com/docs/supermart-ecommerce/','supermart-ecommerce'));
define('SUPERMART_ECOMMERCE_BUY_NOW',__('https://www.luzuk.com/product/ecommerce-wordpress-template/','supermart-ecommerce'));
define('SUPERMART_ECOMMERCE_SUPPORT',__('https://wordpress.org/support/theme/supermart-ecommerce/','supermart-ecommerce'));
define('SUPERMART_ECOMMERCE_CREDIT',__('https://www.luzuk.com/themes/free-ecommerce-wordpress-template/','supermart-ecommerce'));

if ( ! function_exists( 'supermart_ecommerce_credit' ) ) {
	function supermart_ecommerce_credit(){
		echo "<a href=".esc_url(SUPERMART_ECOMMERCE_CREDIT)." target='_blank'>".esc_html__('Ecommerce WordPress Theme','supermart-ecommerce')."</a>";
	}
}

function supermart_ecommerce_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function supermart_ecommerce_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function supermart_ecommerce_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function supermart_ecommerce_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function supermart_ecommerce_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/* Excerpt Limit Begin */
function supermart_ecommerce_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'supermart_ecommerce_loop_columns');
if (!function_exists('supermart_ecommerce_loop_columns')) {
	function supermart_ecommerce_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Breadcrumb Begin */
function supermart_ecommerce_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url(home_url());
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			echo "&nbsp;>&nbsp;";
			the_category(', ');
			if (is_single()) {
				echo "&nbsp;>&nbsp;";
				echo " <span>";
					the_title();
				echo "</span>";
			}
		} elseif (is_page()) {
			echo "&nbsp;>&nbsp;";
			echo " <span>";
				the_title();
			echo "</span> ";
		}
	}
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/getting-started/getting-started.php' );