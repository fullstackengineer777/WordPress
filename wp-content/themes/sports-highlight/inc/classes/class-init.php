<?php
/**
 * Customizer initializing class.
 *
 * @package Sports_Highlight
 */

namespace Sports_Highlight;

/**
 * Init class.
 */
class Init {
	/**
	 *  Init class.
	 */
	public function __construct() {
		$this->include_files();
		$this->init_hooks();

	}

	/**
	 * Initalizing hooks.
	 *
	 * @return void
	 */
	private function init_hooks() {
		add_action( 'after_setup_theme', array( $this, 'content_width' ), 0 );
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	/**
	 * Function to include files.
	 *
	 * @return void
	 */
	public function include_files() {
		$path = SPORTS_HIGHLIGHT_PATH;

		$files = array(

			'inc/helpers.php',

			/**
			* Customizer files.
			*/
			'inc/classes/class-customizer.php',
			'inc/classes/class-customizer-callbacks.php',
			'inc/classes/class-customizer-helpers.php',
			'inc/classes/class-ebwp-notice.php',

			/**
			* Metabox class.
			*/
			'inc/classes/class-metabox.php',

			/**
			* Core classes.
			*/
			'inc/classes/class-assets.php',

			/**
			* Custom template tags for this theme.
			*/
			'inc/template-tags.php',

			/**
			* Functions which enhance the theme by hooking into WordPress.
			*/
			'inc/template-functions.php',

			/**
			 * Third party files.
			 */
			'inc/breadcrumbs.php',
			'inc/third-party/class-breadcrumb-trail.php',
			'inc/third-party/class-tgm-plugin-activation.php',
		);

		if ( function_exists( 'WC' ) ) {
			$files[] = 'inc/woocommerce.php';
		}

		if ( is_array( $files ) && ! empty( $files ) ) {
			foreach ( $files as $file ) {
				$file_path = $path . $file;

				if ( file_exists( $file_path ) ) {
					require_once wp_normalize_path( $file_path );
				}
			}
		}
	}


	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	public function setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Sports Highlight, use a find and replace
		* to change 'sports-highlight' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'sports-highlight', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'sports-highlight' ),
			)
		);

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom header feature.
		$defaults = array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => true,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
			'video'                  => false,
			'video-active-callback'  => 'is_front_page',
		);
		add_theme_support( 'custom-header', $defaults );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'sports_highlight_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Support for gutenberg blocks.
		add_theme_support( 'align-wide' );

		// Support for custom color for blocks.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Greyish Purple', 'sports-highlight' ),
					'slug'  => 'greyish-purple',
					'color' => '#525d5b',
				),
				array(
					'name'  => __( 'Pale Green', 'sports-highlight' ),
					'slug'  => 'pale-green',
					'color' => '#9dd3a8',
				),
			)
		);

		// Embeded urls from blocks will be responsive.
		add_theme_support( 'responsive-embeds' );

	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	public function content_width() {
		$GLOBALS['content_width'] = apply_filters( 'sports_highlight_content_width', 640 );
	}


	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	public function widgets_init() {

		/**
		 * Header sidebar.
		 */
		register_sidebar(
			array(
				'id'            => 'header-sidebar',
				'name'          => esc_html__( 'Header Sidebar', 'sports-highlight' ),
				'description'   => esc_html__( 'Widget area for theme header sidebar.', 'sports-highlight' ),
				'before_widget' => '<div id="%1$s" class="header-widget-area-content widget layout1 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h2 class="title">',
				'after_title'   => '</h2></div>',
			)
		);

		/**
		 * Main sidebar.
		 */
		register_sidebar(
			array(
				'id'            => 'main-sidebar',
				'name'          => esc_html__( 'Main Sidebar', 'sports-highlight' ),
				'description'   => esc_html__( 'Widget area for theme main sidebar. It is located at pages, posts, blogs and archives.', 'sports-highlight' ),
				'before_widget' => '<div id="%1$s" class="secondary-widget-area-content widget layout1 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h2 class="title">',
				'after_title'   => '</h2></div>',
			)
		);

		register_sidebars(
			4,
			array(
				/* translators: %d: footer widgets */
				'name'          => esc_html__( 'Footer Widgets %d', 'sports-highlight' ),
				'id'            => 'footer-widgets',
				'description'   => Customizer_Helpers::mods( 'general_option_footer_widget_toggle' ) ? esc_html__( 'Add footer widget here.', 'sports-highlight' ) : esc_html__( 'Widgets area is disabled from Customizer > General Option > Footer > Widget.', 'sports-highlight' ),
				'before_widget' => '<div id="%1$s" class="wp-widget widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

	}

	/**
	 * Set up the WordPress core custom header feature.
	 *
	 * @uses sports_highlight_header_style()
	 */
	public function custom_header_setup() {
		add_theme_support(
			'custom-header',
			apply_filters(
				'sports_highlight_custom_header_args',
				array(
					'default-image'      => '',
					'default-text-color' => '000000',
					'width'              => 1000,
					'height'             => 250,
					'flex-height'        => true,
					'wp-head-callback'   => 'sports_highlight_header_style',
				)
			)
		);
	}



	/**
	 * Styles the header image and text displayed on the blog.
	 */
	public function header_style() {
		$header_text_color = get_header_textcolor();

		/*
		* If no custom options for text are set, let's bail.
		* get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		*/
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
			<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
				.site-title,
				.site-description {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
					}
			<?php
			// If the user has set a custom color for the text use that.
			else :
				?>
				.site-title a,
				.site-description {
					color: #<?php echo esc_attr( $header_text_color ); ?>;
				}
			<?php endif; ?>
			</style>
			<?php
	}

}
