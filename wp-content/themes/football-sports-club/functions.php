<?php
/**
 * Football Sports Club functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Football Sports Club
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Football_Sports_Club_Loader.php' );

$Football_Sports_Club_Loader = new \WPTRT\Autoload\Football_Sports_Club_Loader();

$Football_Sports_Club_Loader->football_sports_club_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Football_Sports_Club_Loader->football_sports_club_register();

if ( ! function_exists( 'football_sports_club_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function football_sports_club_setup() {

		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size('football-sports-club-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','football-sports-club' ),
	        'footer'=> esc_html__( 'Footer Menu','football-sports-club' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'football_sports_club_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'football_sports_club_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function football_sports_club_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'football_sports_club_content_width', 1170 );
}
add_action( 'after_setup_theme', 'football_sports_club_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function football_sports_club_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'football-sports-club' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'football-sports-club' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'football_sports_club_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function football_sports_club_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'outfit',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'football-sports-club-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'flatly-css', esc_url(get_template_directory_uri()) . '/assets/css/flatly.css');

    wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri()) . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'football-sports-club-style', get_stylesheet_uri() );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', esc_url(get_template_directory_uri()).'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('football-sports-club-theme-js', esc_url(get_template_directory_uri()) . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', esc_url(get_template_directory_uri()) . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'football_sports_club_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*dropdown page sanitization*/
function football_sports_club_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*checkbox sanitization*/
function football_sports_club_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function football_sports_club_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function football_sports_club_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Get CSS
 */

function football_sports_club_getpage_css($hook) {
	if ( 'appearance_page_football-sports-club-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'football-sports-club-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'football_sports_club_getpage_css' );

add_action('after_switch_theme', 'football_sports_club_setup_options');

function football_sports_club_setup_options () {
	wp_redirect( admin_url() . 'themes.php?page=football-sports-club-info.php' );
}

if ( ! defined( 'FOOTBALL_SPORTS_CLUB_CONTACT_SUPPORT' ) ) {
define('FOOTBALL_SPORTS_CLUB_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/football-sports-club/','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_REVIEW' ) ) {
define('FOOTBALL_SPORTS_CLUB_REVIEW',__('https://wordpress.org/support/theme/football-sports-club/reviews/#new-post','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_LIVE_DEMO' ) ) {
define('FOOTBALL_SPORTS_CLUB_LIVE_DEMO',__('https://www.themagnifico.net/demo/football-sports-club/','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO' ) ) {
define('FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/wordpress-sports-club-theme/','football-sports-club'));
}
if ( ! defined( 'FOOTBALL_SPORTS_CLUB_PRO_DOC' ) ) {
define('FOOTBALL_SPORTS_CLUB_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/football-sports-club-pro-doc/','football-sports-club'));
}

add_action('admin_menu', 'football_sports_club_themepage');
function football_sports_club_themepage(){
	$theme_info = add_theme_page( __('Theme Options','football-sports-club'), __('Theme Options','football-sports-club'), 'manage_options', 'football-sports-club-info.php', 'football_sports_club_info_page' );
}

function football_sports_club_info_page() {
	$user = wp_get_current_user();
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap football-sports-club-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','football-sports-club'); ?><?php echo esc_html( $theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "football-sports-club"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Football Sports Club , feel free to contact us for any support regarding our theme.", "football-sports-club"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "football-sports-club"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "football-sports-club"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "football-sports-club"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
							<?php esc_html_e("Get Premium", "football-sports-club"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "football-sports-club"); ?></h3>
						<p><?php esc_html_e("If You love Football Sports Club theme then we would appreciate your review about our theme.", "football-sports-club"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "football-sports-club"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","football-sports-club"); ?></h2>
		<div class="football-sports-club-button-container">
			<a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "football-sports-club"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "football-sports-club"); ?>
			</a>
		</div>

		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "football-sports-club"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "football-sports-club"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "football-sports-club"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "football-sports-club"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "football-sports-club"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "football-sports-club"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "football-sports-club"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="football-sports-club-button-container">
			<a target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
				<?php esc_html_e("Go Premium", "football-sports-club"); ?>
			</a>
		</div>
	</div>
	<?php
}
