<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses ecommerce_wp_header_style()
 */
function ecommerce_wp_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ecommerce_wp_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 1200,
		'height'                 => 528,
		'flex-height'            => true,
		'flex-width'			=> true,
		'default-image' 		=> get_template_directory_uri() . '/images/breadcrumb.jpg',
		'wp-head-callback'       => 'ecommerce_wp_header_style',
	) ) );


}
add_action( 'after_setup_theme', 'ecommerce_wp_custom_header_setup' );

if ( ! function_exists( 'ecommerce_wp_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see ecommerce_wp_custom_header_setup().
	 */
	function ecommerce_wp_header_style() {
		$options = ecommerce_wp_get_theme_options();
		$css = '';

		$header_title_color = $options['header_title_color'];
		$header_tagline_color = $options['header_tagline_color'];


		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
		 */
		if ( $header_title_color && $header_tagline_color ) {

			// If we get this far, we have custom styles. Let's do this.
			// Has the text been hidden?
			if ( ! display_header_text() ) :
			$css .='
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}';

			// If the user has set a custom color for the text use that.
			else :
			$css .='
			.site-title a {
				color: '.esc_attr( $header_title_color ).';
			}
			.site-description {
				color: '.esc_attr( $header_tagline_color ).';
			}';
			endif;
		}

		$css .= '.trail-items li:not(:last-child):after {
			    content: "' . html_entity_decode( esc_attr( $options['breadcrumb_separator'] ) ) . '";
			    padding: 0 5px;
			    color: rgba(255, 255, 255, 0.30);
			}';
			
			
		if ( get_header_image() ) {
		
		$css .= '#masthead {
					background-image:url("'.esc_url(get_header_image()).'");
					background-position: center center;
					background-size: cover;
				}
		
				
				';
		
		}
		
		wp_add_inline_style( 'ecommerce-wp-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'ecommerce_wp_header_style', 10 );