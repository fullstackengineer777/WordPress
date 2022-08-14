<?php
/**
 * Plugin Name:         Ocean Social Sharing
 * Plugin URI:          https://oceanwp.org/extension/ocean-social-sharing/
 * Description:         A simple plugin to add social share buttons to your posts.
 * Version:             2.0.2
 * Author:              OceanWP
 * Author URI:          https://oceanwp.org/
 * Requires at least:   5.6
 * Tested up to:        6.0.0
 *
 * Text Domain: ocean-social-sharing
 * Domain Path: /languages
 *
 * @package  Ocean_Social_Sharing
 * @category Core
 * @author   OceanWP
 */

// Exit if accessed directly
if (! defined('ABSPATH') ) {
    exit;
}

/**
 * Returns the main instance of Ocean_Social_Sharing to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Ocean_Social_Sharing
 */
function Ocean_Social_Sharing()
{
    return Ocean_Social_Sharing::instance();
} // End Ocean_Social_Sharing()

Ocean_Social_Sharing();

/**
 * Main Ocean_Social_Sharing Class
 *
 * @class   Ocean_Social_Sharing
 * @version 1.0.0
 * @since   1.0.0
 * @package Ocean_Social_Sharing
 */
final class Ocean_Social_Sharing
{
    /**
     * Ocean_Social_Sharing The single instance of Ocean_Social_Sharing.
     *
     * @var    object
     * @access private
     * @since  1.0.0
     */
    private static $_instance = null;

    /**
     * The token.
     *
     * @var    string
     * @access public
     * @since  1.0.0
     */
    public $token;

    /**
     * The version number.
     *
     * @var    string
     * @access public
     * @since  1.0.0
     */
    public $version;

    // Admin - Start
    /**
     * The admin object.
     *
     * @var    object
     * @access public
     * @since  1.0.0
     */
    public $admin;

    /**
     * Constructor function.
     *
     * @access public
     * @since  1.0.0
     * @return void
     */
    public function __construct( $widget_areas = array() )
    {
        $this->token       = 'ocean-social-sharing';
        $this->plugin_url  = plugin_dir_url(__FILE__);
        $this->plugin_path = plugin_dir_path(__FILE__);
        $this->version     = '2.0.2';

        register_activation_hook(__FILE__, array( $this, 'install' ));

        add_action('init', array( $this, 'oss_load_plugin_textdomain' ));

        add_filter('ocean_register_tm_strings', array( $this, 'register_tm_strings' ));

        add_action('init', array( $this, 'oss_setup' ));
    }

    /**
     * Main Ocean_Social_Sharing Instance
     *
     * Ensures only one instance of Ocean_Social_Sharing is loaded or can be loaded.
     *
     * @since  1.0.0
     * @static
     * @see    Ocean_Social_Sharing()
     * @return Main Ocean_Social_Sharing instance
     */
    public static function instance()
    {
        if (is_null(self::$_instance) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    } // End instance()

    /**
     * Load the localisation file.
     *
     * @access public
     * @since  1.0.0
     * @return void
     */
    public function oss_load_plugin_textdomain()
    {
        load_plugin_textdomain('ocean-social-sharing', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     */
    public function __clone()
    {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), '1.0.0');
    }

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 1.0.0
     */
    public function __wakeup()
    {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), '1.0.0');
    }

    /**
     * Installation.
     * Runs on activation. Logs the version number and assigns a notice message to a WordPress option.
     *
     * @access public
     * @since  1.0.0
     * @return void
     */
    public function install()
    {
        $this->_log_version_number();
    }

    /**
     * Log the plugin version number.
     *
     * @access private
     * @since  1.0.0
     * @return void
     */
    private function _log_version_number()
    {
        // Log the version number.
        update_option($this->token . '-version', $this->version);
    }

    /**
     * Register translation strings
     */
    public static function register_tm_strings( $strings )
    {

        $strings['oss_social_share_heading'] = 'Please Share This';

        return $strings;

    }

    /**
     * Setup all the things.
     * Only executes if OceanWP or a child theme using OceanWP as a parent is active and the extension specific filter returns true.
     *
     * @return void
     */
    public function oss_setup()
    {
        $theme = wp_get_theme();

        if ('OceanWP' == $theme->name || 'oceanwp' == $theme->template ) {
            include_once $this->plugin_path . '/includes/helpers.php';
            add_action('customize_register', array( $this, 'customizer_register' ));
            add_action('customize_preview_init', array( $this, 'customize_preview_js' ));
            add_action('wp_enqueue_scripts', array( $this, 'get_scripts' ), 999);
            add_action('ocean_before_single_post_content', array( $this, 'before_content' ));
            add_action('ocean_social_share', array( $this, 'after_content' ));
            add_filter('ocean_head_css', array( $this, 'head_css' ));
            add_filter( 'oe_theme_panels', array( $this, 'oe_theme_panels' ) );
        }
    }

    /**
     * Customizer Controls and settings
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     * @since 1.0.0
     */
    public function customizer_register( $wp_customize )
    {

        if ( OCEAN_EXTRA_ACTIVE
			&& class_exists( 'Ocean_Extra_Theme_Panel' ) ) {

			if ( empty( Ocean_Extra_Theme_Panel::get_setting( 'ocean_social_sharing_panel' ) ) ) {
				return false;
			}

		}

        /**
         * Add a new section
         */
        $wp_customize->add_section(
            'oss_sharing_section',
            array(
            'title'    => esc_html__('Social Sharing', 'ocean-social-sharing'),
            'priority' => 210,
            )
        );

        /**
         * Sharing sites
         */
        $wp_customize->add_setting(
            'oss_social_share_sites',
            array(
            'default'           => array(
            'twitter',
            'facebook',
            'google_plus',
            'pinterest',
            'linkedin',
            'viber',
            'vk',
            'reddit',
            'tumblr',
            'viadeo',
            'whatsapp',
            ),
            'sanitize_callback' => 'oceanwp_sanitize_multi_choices',
            )
        );

        $wp_customize->add_control(
            new OceanWP_Customizer_Sortable_Control(
                $wp_customize,
                'oss_social_share_sites',
                array(
                'label'    => esc_html__('Sharing Buttons', 'ocean-social-sharing'),
                'section'  => 'oss_sharing_section',
                'settings' => 'oss_social_share_sites',
                'priority' => 10,
                'choices'  => array(
                'twitter'     => 'Twitter',
                'facebook'    => 'Facebook',
                'google_plus' => 'Google Plus',
                'pinterest'   => 'Pinterest',
                'linkedin'    => 'LinkedIn',
                'viber'       => 'Viber',
                'vk'          => 'VK',
                'reddit'      => 'Reddit',
                'tumblr'      => 'Tumblr',
                'viadeo'      => 'Viadeo',
                'whatsapp'    => 'WhatsApp',
                    ),
                )
            )
        );

        /**
         * Position
         */
        $wp_customize->add_setting(
            'oss_social_share_position',
            array(
            'default'           => 'after',
            'sanitize_callback' => 'oceanwp_sanitize_select',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'oss_social_share_position',
                array(
                'label'    => esc_html__('Position', 'ocean-social-sharing'),
                'type'     => 'select',
                'section'  => 'oss_sharing_section',
                'settings' => 'oss_social_share_position',
                'priority' => 10,
                'choices'  => array(
                'before' => esc_html__('Before the Content', 'ocean-social-sharing'),
                'after'  => esc_html__('After the Content', 'ocean-social-sharing'),
                'both'   => esc_html__('Before & After the Content', 'ocean-social-sharing'),
                'none'   => esc_html__('No Buttons in the Content', 'ocean-social-sharing'),
                    ),
                )
            )
        );

        /**
         * Social Name
         */
        $wp_customize->add_setting(
            'oss_social_share_name',
            array(
            'transport'         => 'postMessage',
            'default'           => false,
            'sanitize_callback' => 'oceanwp_sanitize_checkbox',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'oss_social_share_name',
                array(
                'label'    => esc_html__('Add Social Name', 'ocean-social-sharing'),
                'type'     => 'checkbox',
                'section'  => 'oss_sharing_section',
                'settings' => 'oss_social_share_name',
                'priority' => 10,
                )
            )
        );

        /**
         * Heading
         */
        $wp_customize->add_setting(
            'oss_social_share_heading',
            array(
            'default'           => esc_html__('Please Share This', 'ocean-social-sharing'),
            'transport'         => 'postMessage',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'oss_social_share_heading',
                array(
                'label'    => esc_html__('Sharing Heading', 'ocean-social-sharing'),
                'section'  => 'oss_sharing_section',
                'settings' => 'oss_social_share_heading',
                'type'     => 'text',
                'priority' => 10,
                )
            )
        );

        /**
         * Heading Position
         */
        $wp_customize->add_setting(
            'oss_social_share_heading_position',
            array(
            'transport'         => 'postMessage',
            'default'           => 'side',
            'sanitize_callback' => 'oceanwp_sanitize_select',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'oss_social_share_heading_position',
                array(
                'label'    => esc_html__('Heading Position', 'ocean-social-sharing'),
                'type'     => 'select',
                'section'  => 'oss_sharing_section',
                'settings' => 'oss_social_share_heading_position',
                'priority' => 10,
                'choices'  => array(
                'side' => esc_html__('Side', 'ocean-social-sharing'),
                'top'  => esc_html__('Top', 'ocean-social-sharing'),
                    ),
                )
            )
        );

        /**
         * Twitter Handle
         */
        $wp_customize->add_setting(
            'oss_social_share_twitter_handle',
            array(
            'default'           => '',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'oss_social_share_twitter_handle',
                array(
                'label'    => esc_html__('Twitter Username', 'ocean-social-sharing'),
                'section'  => 'oss_sharing_section',
                'settings' => 'oss_social_share_twitter_handle',
                'type'     => 'text',
                'priority' => 10,
                )
            )
        );

        /**
         * Heading Styling
         */
        $wp_customize->add_setting(
            'oss_social_share_styling_heading',
            array(
            'sanitize_callback' => 'wp_kses',
            )
        );

        $wp_customize->add_control(
            new OceanWP_Customizer_Heading_Control(
                $wp_customize,
                'oss_social_share_styling_heading',
                array(
                'label'    => esc_html__('Styling', 'ocean-social-sharing'),
                'section'  => 'oss_sharing_section',
                'priority' => 10,
                )
            )
        );

        /**
         * Style
         */
        $wp_customize->add_setting(
            'oss_social_share_style',
            array(
            'transport'         => 'postMessage',
            'default'           => 'minimal',
            'sanitize_callback' => 'oceanwp_sanitize_select',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'oss_social_share_style',
                array(
                'label'    => esc_html__('Style', 'ocean-social-sharing'),
                'type'     => 'select',
                'section'  => 'oss_sharing_section',
                'settings' => 'oss_social_share_style',
                'priority' => 10,
                'choices'  => array(
                'minimal' => esc_html__('Minimal', 'ocean-social-sharing'),
                'colored' => esc_html__('Colored', 'ocean-social-sharing'),
                'dark'    => esc_html__('Dark', 'ocean-social-sharing'),
                    ),
                )
            )
        );

        /**
         * Border Radius
         */
        $wp_customize->add_setting(
            'oss_social_share_style_border_radius',
            array(
            'transport'         => 'postMessage',
            'sanitize_callback' => 'wp_kses_post',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'oss_social_share_style_border_radius',
                array(
                'label'       => esc_html__('Border Radius', 'ocean-social-sharing'),
                'description' => esc_html__('Add a custom border radius. px - em - %.', 'ocean-social-sharing'),
                'type'        => 'text',
                'section'     => 'oss_sharing_section',
                'settings'    => 'oss_social_share_style_border_radius',
                'priority'    => 10,
                )
            )
        );

        /**
         * Borders color
         */
        $wp_customize->add_setting(
            'oss_sharing_borders_color',
            array(
            'transport'         => 'postMessage',
            'sanitize_callback' => 'oceanwp_sanitize_color',
            )
        );

        $wp_customize->add_control(
            new OceanWP_Customizer_Color_Control(
                $wp_customize,
                'oss_sharing_borders_color',
                array(
                'label'    => esc_html__('Minimal Style: Borders Color', 'ocean-social-sharing'),
                'section'  => 'oss_sharing_section',
                'settings' => 'oss_sharing_borders_color',
                'priority' => 10,
                )
            )
        );

        /**
         * Icons background color
         */
        $wp_customize->add_setting(
            'oss_sharing_icons_bg',
            array(
            'transport'         => 'postMessage',
            'sanitize_callback' => 'oceanwp_sanitize_color',
            )
        );

        $wp_customize->add_control(
            new OceanWP_Customizer_Color_Control(
                $wp_customize,
                'oss_sharing_icons_bg',
                array(
                'label'    => esc_html__('Minimal Style: Background Color', 'ocean-social-sharing'),
                'section'  => 'oss_sharing_section',
                'settings' => 'oss_sharing_icons_bg',
                'priority' => 10,
                )
            )
        );

        /**
         * Icons color
         */
        $wp_customize->add_setting(
            'oss_sharing_icons_color',
            array(
            'transport'         => 'postMessage',
            'sanitize_callback' => 'oceanwp_sanitize_color',
            )
        );

        $wp_customize->add_control(
            new OceanWP_Customizer_Color_Control(
                $wp_customize,
                'oss_sharing_icons_color',
                array(
                'label'    => esc_html__('Minimal Style: Color', 'ocean-social-sharing'),
                'section'  => 'oss_sharing_section',
                'settings' => 'oss_sharing_icons_color',
                'priority' => 10,
                )
            )
        );

    }

    /**
     * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
     *
     * @since 1.0.0
     */
    public function customize_preview_js()
    {
        wp_enqueue_script('oss-customizer', plugins_url('/assets/js/customizer.min.js', __FILE__), array( 'customize-preview' ), '1.1', true);
    }

    /**
     * Enqueue scripts.
     *
     * @since 1.0.0
     */
    public function get_scripts()
    {

        // Load main stylesheet
        wp_enqueue_style('oss-social-share-style', plugins_url('/assets/css/style.min.css', __FILE__));

        // Load main script
        wp_enqueue_script('oss-social-share-script', plugins_url('/assets/js/social.js', __FILE__), array( 'jquery' ), $this->version, true);

        // If rtl
        if (is_RTL() ) {
            wp_enqueue_style('oss-social-share-rtl', plugins_url('/assets/css/rtl.css', __FILE__));
        }

    }

    /**
     * Social sharing links before content
     *
     * @since 1.0.8
     */
    public function before_content()
    {

        // Return if after content
        if ('after' == get_theme_mod('oss_social_share_position', 'after') ) {
            return;
        } ?>

        <div class="entry-share-wrap"><?php $this->social_share(); ?></div>

        <?php
    }

    /**
     * Social sharing links after content
     *
     * @since 1.0.8
     */
    public function after_content()
    {

        // Return if before content
        if ('before' == get_theme_mod('oss_social_share_position', 'after') ) {
            return;
        }

        $this->social_share();

    }

    /**
     * Social sharing links template
     *
     * @since 1.0.0
     */
    public function social_share()
    {

        $file       = $this->plugin_path . 'template/social-share.php';
        $theme_file = get_stylesheet_directory() . '/templates/extra/social-share.php';

        if (file_exists($theme_file) ) {
            $file = $theme_file;
        }

        if (file_exists($file) ) {
            include $file;
        }

    }

    /**
     * Add css in head tag.
     *
     * @since 1.0.0
     */
    public function head_css( $output )
    {

        // Global vars
        $sharing_border_radius = get_theme_mod('oss_social_share_style_border_radius');
        $sharing_borders       = get_theme_mod('oss_sharing_borders_color');
        $sharing_icons_bg      = get_theme_mod('oss_sharing_icons_bg');
        $sharing_icons_color   = get_theme_mod('oss_sharing_icons_color');

        // Define css var
        $css = '';

        // Add border radius
        if (! empty($sharing_border_radius) ) {
            $css .= '.entry-share ul li a{border-radius:' . $sharing_border_radius . ';}';
        }

        // Add border color
        if (! empty($sharing_borders) ) {
            $css .= '.entry-share.minimal ul li a{border-color:' . $sharing_borders . ';}';
        }

        // Add icon background
        if (! empty($sharing_icons_bg) ) {
            $css .= '.entry-share.minimal ul li a{background-color:' . $sharing_icons_bg . ';}';
        }

        // Add icon color
        if (! empty($sharing_icons_color) ) {
            $css .= '.entry-share.minimal ul li a{color:' . $sharing_icons_color . ';}';
            $css .= '.entry-share.minimal ul li a .oss-icon{fill:' . $sharing_icons_color . ';}';
        }

        // Return CSS
        if (! empty($css) ) {
            $output .= '/* Social Sharing CSS */' . $css;
        }

        // Return output css
        return $output;

    }

    /**
	 * Add social sharing switcher.
	 *
	 * @since  1.0.0
	 */
	public function oe_theme_panels( $panels ) {

		$panels['ocean_social_sharing_panel'] = [
			'label' => esc_html__('Social Sharing', 'ocean-social-sharing'),
		];

		// Return panels list
		return $panels;
	}

} // End Class

// --------------------------------------------------------------------------------
// region Freemius
// --------------------------------------------------------------------------------

if (! function_exists('ocean_social_sharing_fs') ) {
    // Create a helper function for easy SDK access.
    function ocean_social_sharing_fs()
    {
        global $ocean_social_sharing_fs;

        if (! isset($ocean_social_sharing_fs) ) {
            $ocean_social_sharing_fs = OceanWP_EDD_Addon_Migration::instance('ocean_social_sharing_fs')->init_sdk(
                array(
                'id'              => '3807',
                'slug'            => 'ocean-social-sharing',
                'public_key'      => 'pk_0aa6121ff893b29efa9a58d6c0ad5',
                'is_premium'      => false,
                'is_premium_only' => false,
                'has_paid_plans'  => false,
                )
            );
        }

        return $ocean_social_sharing_fs;
    }

    function ocean_social_sharing_fs_addon_init()
    {
        if (class_exists('Ocean_Extra') ) {
            OceanWP_EDD_Addon_Migration::instance('ocean_social_sharing_fs')->init();
        }
    }

    if (0 == did_action('owp_fs_loaded') ) {
        // Init add-on only after parent theme was loaded.
        add_action('owp_fs_loaded', 'ocean_social_sharing_fs_addon_init', 15);
    } else {
        if (class_exists('Ocean_Extra') ) {
            /**
             * This makes sure that if the theme was already loaded
             * before the plugin, it will run Freemius right away.
             *
             * This is crucial for the plugin's activation hook.
             */
            ocean_social_sharing_fs_addon_init();
        }
    }
}

// endregion
