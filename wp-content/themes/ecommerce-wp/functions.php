<?php
/**
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */

define ('ECOMMERCE_WP_URI', 'https://www.ceylonthemes.com/product/wordpress-ecommerce-theme/');

if ( ! function_exists( 'ecommerce_wp_setup' ) ) :

	function ecommerce_wp_setup() {

		load_theme_textdomain( 'ecommerce-wp' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets');

		
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 600, 450, true );

		// Set the default content width.
		$GLOBALS['content_width'] = 525;
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary', 'ecommerce-wp' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ecommerce_wp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// This setup supports logo, site-title & site-description
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( '/css/editor-style.css', ecommerce_wp_fonts_url() ) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'ecommerce-wp' ),
		       	'shortName' => esc_html__( 'S', 'ecommerce-wp' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'ecommerce-wp' ),
		       	'shortName' => esc_html__( 'M', 'ecommerce-wp' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'ecommerce-wp' ),
		       	'shortName' => esc_html__( 'L', 'ecommerce-wp' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'ecommerce-wp' ),
		       	'shortName' => esc_html__( 'XL', 'ecommerce-wp' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'ecommerce-wp' ),
				'slug' => 'blue',
				'color' => '#2c7dfa',
	       	),
	       	array(
	           	'name' => esc_html__( 'Green', 'ecommerce-wp' ),
	           	'slug' => 'green',
	           	'color' => '#07d79c',
	       	),
	       	array(
	           	'name' => esc_html__( 'Orange', 'ecommerce-wp' ),
	           	'slug' => 'orange',
	           	'color' => '#ff8737',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'ecommerce-wp' ),
	           	'slug' => 'black',
	           	'color' => '#2f3633',
	       	),
	       	array(
	           	'name' => esc_html__( 'Grey', 'ecommerce-wp' ),
	           	'slug' => 'grey',
	           	'color' => '#82868b',
	       	),
	   	));

		add_theme_support( 'wp-block-styles' );
		
		
	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
            
 			// Place search widget in header ad area
			'sidebar-ad' => array(
				'search',
			),
            
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'footer-sidebar-1' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'footer-sidebar-2' => array(
				'text_about',
			),
			// Put two core-defined widgets in the footer 2 area.
			'footer-sidebar-3' => array(
				'text_about',
			),
			// Put two core-defined widgets in the footer 2 area.
			'footer-sidebar-4' => array(
				'search',
			),					
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
				'home-page',
				'about' ,
				'contact' ,
				'blog',
		),


		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'home-page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods'  => array(
			'panel_1' => '{{home-page}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'primary'   => array(
				'name'  => __( 'Top Menu', 'ecommerce-wp' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

		));

 	add_theme_support( 'starter-content', $starter_content);
		
		
	}
endif;
add_action( 'after_setup_theme', 'ecommerce_wp_setup' );

//used to name html elements
$ecommerce_wp_uniqueue_id = 999;
$ecommerce_wp_product_categories = '' ;

$ecommerce_wp_options = '';
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecommerce_wp_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Header Ad', 'ecommerce-wp' ),
		'id'            => 'sidebar-ad',
		'description'   => esc_html__( 'Add widgets here.', 'ecommerce-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2><span></span>',
	) );

	register_sidebar(
		array(
			'name'          => esc_html__( 'Woocommerce Sidebar', 'ecommerce-wp' ),
			'id'            => 'sidebar-woocommerce',
			'description'   => esc_html__( 'Add widgets here to appear in your woocommerce pages.', 'ecommerce-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2><span></span>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'ecommerce-wp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ecommerce-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="mag-sec-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Home Left Sidebar', 'ecommerce-wp' ),
		'id'            => 'left-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'ecommerce-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="mag-sec-title"><h2 class="widget-title">',
		'after_title'   => '</h2><div>',
	) );	

		
	/* footer widgets */
	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'ecommerce-wp' ),
			'id'            => 'footer-sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'ecommerce-wp' ),
			'id'            => 'footer-sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'ecommerce-wp' ),
			'id'            => 'footer-sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);	
	
	register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'ecommerce-wp' ),
			'id'            => 'footer-sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	

}
add_action( 'widgets_init', 'ecommerce_wp_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ecommerce_wp_content_width() {

	$content_width = $GLOBALS['content_width'];

	$sidebar_position = ecommerce_wp_layout();
		
	switch ( $sidebar_position ) {

	  case 'no-sidebar':
	    $content_width = 1170;
	    break;

	  case 'left-sidebar':
	  case 'right-sidebar':
	    $content_width = 820;
	    break;

	  default:
	    break;
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) || !is_active_sidebar( 'sidebar-woocommerce' ) ) {
		$content_width = 1170;
	}

	/**
	 * Filter eCommerce WP content width of the theme.
	 *
	 * @since 1.0.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'ecommerce_wp_content_width', $content_width );
}
add_action( 'template_redirect', 'ecommerce_wp_content_width', 0 );


if ( ! function_exists( 'ecommerce_wp_fonts_url' ) ) :
/**
 * Register Google fonts
 * @package twentyseventeen
 * @return string Google fonts URL for the theme.
 */
function ecommerce_wp_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by "PT Sans", sans-serif;, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$typography = _x( 'on', 'PT Sans font: on or off', 'ecommerce-wp' );

	if ( 'off' !== $typography ) {
	
		$fontface = ecommerce_wp_get_theme_options();  
		
		$fonts[] = $fontface['heading_font'].':400,600,700';
		$fonts[] = $fontface['body_font'].':300,400,600,700';
	}


	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function ecommerce_wp_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'ecommerce-wp-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'ecommerce_wp_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function ecommerce_wp_scripts() {
	$options = ecommerce_wp_get_theme_options();
	
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'ecommerce-wp-fonts', ecommerce_wp_fonts_url(), array(), null );

	// font-awesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css' );
	
	// bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' , array() );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ) , true );


	wp_enqueue_style( 'ecommerce-wp-style', get_stylesheet_uri() );
	
	// Load the html5 shiv.
	wp_enqueue_script( 'ecommerce-wp-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'ecommerce-wp-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'ecommerce-wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20201201', true );

	wp_enqueue_script( 'ecommerce-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20201202', true );
	
	$ecommerce_wp_l10n = array(
		'quote'          => ecommerce_wp_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'ecommerce-wp' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'ecommerce-wp' ),
		'icon'           => ecommerce_wp_get_svg( array( 'icon' => 'down', 'fallback' => true ) ),
	);
	
	wp_localize_script( 'ecommerce-wp-navigation', 'ecommerce_wp_l10n', $ecommerce_wp_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	wp_enqueue_script( 'jquery-matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'ecommerce-wp-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20201203', true );

}
add_action( 'wp_enqueue_scripts', 'ecommerce_wp_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since 1.0.0
 */
function ecommerce_wp_block_editor_styles() {
	// Add custom fonts.
	wp_enqueue_style( 'ecommerce-wp-fonts', ecommerce_wp_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'ecommerce_wp_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/*** Load core file ***/


// Load customizer defaults values
require get_template_directory() . '/inc/settings.php';


/**
 * Merge values from default options array and values from customizer
 * @return array Values returned from customizer
 * @since 1.0.0
 */
function ecommerce_wp_get_theme_options() {
 	global $ecommerce_wp_options;	
	if ( class_exists( 'WP_Customize_Control' ) ||  $ecommerce_wp_options == '') {
	     $ecommerce_wp_options = wp_parse_args( get_option( 'ecommerce_wp_options', array() ), ecommerce_wp_get_default_theme_options()) ;
	}
	return $ecommerce_wp_options;
}


/**
 * Load admin custom styles
 * 
 */
function ecommerce_wp_load_admin_style() {
    wp_register_style( 'ecommerce_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'ecommerce_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'ecommerce_wp_load_admin_style' );



/**
 * Add woocommerce theme support
 */
if (class_exists('WooCommerce')) {

	add_action( 'after_setup_theme', 'ecommerce_wp_woocommerce_support' );
	function ecommerce_wp_woocommerce_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );	
	}

}

/**
 *
 */
require get_template_directory() . '/inc/post-functions.php';

/**
 *
 */
require get_template_directory() . '/inc/actions.php';

/**
 * Add breadcrumb functions.
 */
require get_template_directory() . '/inc/breadcrumb-class.php';


/**
 * Add metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';



/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/plugin-activation.php';

/**
* Woo Functions
*/
require get_template_directory() . '/inc/woo-functions.php';

/*
 * Custom widgets
 */
require get_template_directory() . '/inc/widgets/product-search.php';

require get_template_directory() . '/inc/widgets/cart-wishlist-acc.php';

require get_template_directory() . '/inc/widgets/post-slider.php';

require get_template_directory() . '/inc/widgets/product-categories.php';

require get_template_directory() . '/inc/widgets/product-navigation.php';

require get_template_directory() . '/inc/widgets/product-slider.php';

require get_template_directory() . '/inc/widgets/products-by-featured.php';

require get_template_directory() . '/inc/widgets/featured-category.php';

require get_template_directory() . '/inc/widgets/social.php';

require get_template_directory() . '/inc/widgets/contact.php';

require get_template_directory() . '/inc/widgets/portfolio.php';

require get_template_directory() . '/inc/widgets/post-carousel.php';

require get_template_directory() . '/inc/widgets/post-marquee.php';


if ( class_exists( 'WP_Customize_Control' ) ) {
	
	// Inlcude the Alpha Color Picker control file.
	require get_template_directory().'/inc/color-picker/alpha-color-picker.php';
	 
}

/**
 * Do Action
 */
function ecommerce_wp_do_action ($action) {
	if(has_action($action)) {
		do_action($action);
	}
}

/**
 * Display custom color CSS.
 */
function ecommerce_wp_colors_css_container() {

	require_once get_template_directory().'/inc/styles.php';

?>
	<style type="text/css" id="custom-theme-colors" >
		<?php echo wp_strip_all_tags(ecommerce_wp_custom_css()); ?>
	</style>
<?php
}
add_action( 'wp_head', 'ecommerce_wp_colors_css_container' );


if (!function_exists('ecommerce_wp_cart_link')) {

    function ecommerce_wp_cart_link() {
        ?>	
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" data-tooltip="<?php esc_attr_e('Cart', 'ecommerce-wp'); ?>" title="<?php esc_attr_e('Cart', 'ecommerce-wp'); ?>">
            <i class="fa fa-shopping-bag"><span class="count"><?php if(WC()->cart) { echo wp_kses_data(WC()->cart->get_cart_contents_count()); } ?></span></i>
            <div class="amount-cart hidden-xs"><?php if(WC()->cart) { echo wp_kses_data(WC()->cart->get_cart_subtotal()); }; ?></div> 
        </a>
        <?php
    }

}

if (!function_exists('ecommerce_wp_header_add_to_cart_fragment')) {
    add_filter('woocommerce_add_to_cart_fragments', 'ecommerce_wp_header_add_to_cart_fragment');

    function ecommerce_wp_header_add_to_cart_fragment($fragments) {
        ob_start();

        ecommerce_wp_cart_link();

        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }

}



function ecommerce_wp_site_branding() {

			$options  = ecommerce_wp_get_theme_options();

			$header_txt_logo_extra = $options['header_txt_logo_extra'];	
			?>
		
			
			<div class="site-branding <?php echo esc_attr($header_txt_logo_extra); ?>">
				<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-only' ) )  ) { ?>
				 	<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo">
						<?php the_custom_logo(); ?>
					</div>
					<?php endif; ?>
				<?php } 
				if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'title-tagline', 'show-all') ) ) : ?>
					<div id="site-identity">
						<?php
						if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'title-tagline', 'logo-title' ) )  ) {
							
							if ( ecommerce_wp_is_latest_posts() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							endif;
							
						} 
						if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-tagline', 'show-all') ) ) : 
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
							<?php
							endif; 					
									
						endif; ?>
					</div>
				<?php endif; ?>
			</div><!-- .site-branding -->
<?php
}

add_action('ecommerce_wp_branding', 'ecommerce_wp_site_branding');


function ecommerce_wp_site_navigation() {
			
			$options  = ecommerce_wp_get_theme_options(); 
?>
			<div id="site-menu">
			

			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
			
					<?php 
					$login = '';
					if ( $options['topbar_login_register_enable'] ) :
					
/*						$login .= '<li class="login-register-item">';
						$login .= '<div class="login-register">';
						$login .= '<ul>';
						$login .= '<li><a href="' . esc_url( $options['topbar_login_url'] ) . '">' . esc_html( $options['topbar_login_label'] ) . '</a></li>';
						$login .= '</ul>';
						$login .= '</div><!-- .social-icons -->';
						$login .= '</li>';*/
						
						$login .= 	'<li><form  method="get" class="menu-search-form" action="'.esc_url( home_url( '/' ) ).'">
									<input type="search" class="search-field" value="'.esc_attr(get_search_query()).'" name="s" style="padding: 0 5px; height: 34px;" placeholder="'.esc_html__('Type and enter', 'ecommerce-wp').'" />
									</form></li>';
						
						$login .= '<li><a href="#" class="menu-search-icon"><i class="fa fa-search"></i></a></li>';
						$login .= '<li style="float: right;background-color: #ae0e0e;"><a href="' . esc_url( $options['topbar_login_url'] ) . '">' . esc_html( $options['topbar_login_label'] ) . '</a></li>';
						
					endif;
					if ( $options['topbar_login_register_enable'] ) {
						wp_nav_menu( 
							array(
								'theme_location' => 'primary',
								'container' => 'div',
								'menu_class' => 'menu nav-menu',
								'menu_id' => 'primary-menu',
								'echo' => true,
								'fallback_cb' => 'ecommerce_wp_menu_fallback_cb',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $login . '</ul>',
								)
							);
					} else {
						wp_nav_menu( 
							array(
								'theme_location' => 'primary',
								'container' => 'div',
								'menu_class' => 'menu nav-menu',
								'menu_id' => 'primary-menu',
								'echo' => true,
								'fallback_cb' => 'ecommerce_wp_menu_fallback_cb',
								)
							);
					}
				?>
			</nav><!-- #site-navigation -->
		</div><!-- #site-menu -->
<?php
}

add_action('ecommerce_wp_navigation', 'ecommerce_wp_site_navigation');


function ecommerce_wp_toggle_menu() {
?>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php
				echo ecommerce_wp_get_svg( array( 'icon' => 'menu' ) );
				echo ecommerce_wp_get_svg( array( 'icon' => 'close' ) );
				?>					
				<span class="menu-label"><?php esc_html_e( 'Menu', 'ecommerce-wp' ); ?></span>
			</button>
<?php
}

add_action('ecommerce_wp_toggle', 'ecommerce_wp_toggle_menu');


function ecommerce_wp_topbar_content(){
$options  = ecommerce_wp_get_theme_options();

if ($options['contact_section_phone'] =='' && $options['contact_section_email'] =='' && $options['contact_section_address'] =='' && $options['contact_section_hours'] =='' &&
$options['social_whatsapp_link'] =='' && $options['social_instagram_link'] =='' && $options['social_youtube_link'] =='' && $options['social_linkdin_link'] =='' 
&& $options['social_twitter_link'] =='' && $options['social_facebook_link'] =='' ) return;

?>
<div class="top_bar_wrapper">
  <div class="container">
  	<div class="row">
	  
      <div class="col-sm-8 col-xs-12">
        <div class="top-bar-left">
          <ul class="infobox_header_wrapper">
            <?php if ($options['contact_section_phone'] !='') { ?><li> <i class="fa fa-phone"></i><?php echo esc_html($options['contact_section_phone']); ?></li> <?php } ?>
            <?php if ($options['contact_section_email'] !='') { ?><li> <i class="fa fa-envelope"></i><?php echo esc_html($options['contact_section_email']); ?></li> <?php } ?>
            <?php if ($options['contact_section_address'] !='') { ?><li> <i class="fa fa-map-marker"></i><?php echo esc_html($options['contact_section_address']); ?></li> <?php } ?>
			<?php if ($options['contact_section_hours'] !='') { ?><li> <i class="fa fa-clock-o"></i><?php echo esc_html($options['contact_section_hours']); ?></li> <?php } ?>
          </ul>
        </div>
      </div>	
	  
	  
      <div class="col-sm-4 col-xs-12">
        <div id="top-social-right" class="header_social_links">
          <ul>
			<?php if ($options['social_whatsapp_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_whatsapp_link']); ?>" class="social_links_header_4 whatsapp" target="_blank"> <span class="ts-icon"> <i class="fa fa-whatsapp"></i> </a></li> <?php } ?>
            <?php if ($options['social_pinterest_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_pinterest_link']); ?>" class="social_links_header_6 pinterest" target="_blank"> <span class="ts-icon"> <i class="fa fa-pinterest"></i> </a></li> <?php } ?>            
			<?php if ($options['social_instagram_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_instagram_link']); ?>" class="social_links_header_2 instagram" target="_blank"> <span class="ts-icon"> <i class="fa fa-instagram"></i> </a></li> <?php } ?>
            <?php if ($options['social_youtube_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_youtube_link']); ?>" class="social_links_header_3 youtube" target="_blank"> <span class="ts-icon"> <i class="fa fa-youtube"></i> </a></li> <?php } ?>
			<?php if ($options['social_linkdin_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_linkdin_link']); ?>" class="social_links_header_5 linkedin" target="_blank"> <span class="ts-icon"> <i class="fa fa-linkedin"></i> </a></li> <?php } ?>
            <?php if ($options['social_twitter_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_twitter_link']); ?>" class="social_links_header_1 twitter" target="_blank"> <span class="ts-icon"> <i class="fa fa-twitter"></i> </a></li> <?php } ?>
            <?php if ($options['social_facebook_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_facebook_link']); ?>" class="social_links_header_0 facebook" target="_blank"> <span class="ts-icon"> <i class="fa fa-facebook"></i> </a></li> <?php } ?>
		  </ul>
        </div>
      </div>

	  
	  
    </div>	
  </div>
</div>

<?php
}
add_action('ecommerce_wp_top_bar', 'ecommerce_wp_topbar_content');



function ecommerce_wp_get_header_layout(){

	global $post;
	$layout = '';
	if ($post){	
		$layout = get_post_meta( $post->ID, 'ecommerce-wp-header-layout', true );	
	} 
	
return $layout;

}

if (!function_exists('ecommerce_wp_get_header_style')):

function ecommerce_wp_get_header_style(){

		global $post;
		
		if ($post){
			$style = get_post_meta( $post->ID, 'ecommerce-wp-header-style', true );	
			if ($style == 'shadow') {
				return "box-shadow";
			} elseif ($style == 'border'){
				return "header-border";
			} elseif ($style == 'transparent'){
				return "header-transparent";
			} elseif ($style == 'none'){
				return "header-style-none";	
			} else {
				return "box-shadow";
			}
		} else {
			return "box-shadow";
		}
	
	}

endif;

define('ecommerce_wp_tutorial_link','https://www.ceylonthemes.com/product/wordpress-ecommerce-theme');


add_action('advanced_export_include_options','ecommerce_wp_include_my_options');

 function ecommerce_wp_include_my_options( $included_options ){
     $my_options = array(
         'ecommerce_wp_options',
     );
     return array_unique (array_merge( $included_options, $my_options));
 }
 
 
/* code to add cart, account wishist popup */
add_action('wp_footer', 'ecommerce_wp_popup_cart');
function ecommerce_wp_popup_cart(){

	if(class_exists('woocommerce')) { 
	?>
	<div id="scroll-cart" class="topcorner">
	
		<ul>
			<li class="my-cart"><?php ecommerce_wp_cart_link(); ?></li>
			<li>
				<a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" data-tooltip="<?php esc_attr_e('My Account', 'ecommerce-wp'); ?>" title="<?php esc_attr_e('My Account', 'ecommerce-wp'); ?>">
					<i class="fa fa-user-circle-o"></i>
				</a>			
			</li>
			<?php if ( is_product() ): ?>
			<li class="my-add-to-cart">
			<?php 
				ecommerce_wp_add_to_cart(); 
			?>
			</li>
			<?php endif; ?>	
		</ul>
					
	</div>
	<?php
	}
} 


function ecommerce_wp_count_post_visits() {
   if( is_single() ) {
      global $post;
      $views = get_post_meta( $post->ID, 'my_post_viewed', true );
      if( $views == '' ) {
         update_post_meta( $post->ID, 'my_post_viewed', '1' );   
      } else {
         $views_no = intval( $views );
         update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
      }
   }
}
add_action( 'wp_head', 'ecommerce_wp_count_post_visits' );

/**
 * Add Menu Item to start of menu
 */

function ecommerce_wp_add_home_item($items, $args) {
    if( $args->theme_location == 'primary' ){
        $homelink = '<li class="top-menu-home"><a href="' . esc_url(home_url()) . '"><i class="fa fa-home"></i></a></li>';
        $items = $homelink . $items;
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'ecommerce_wp_add_home_item', 10, 2 );

// Disables the block editor from widget areas.
//add_filter( 'use_widgets_block_editor', '__return_false' );
