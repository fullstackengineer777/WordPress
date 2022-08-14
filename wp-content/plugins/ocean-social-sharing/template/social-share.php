<?php
/**
 * Social Share Buttons Output
 *
 * @package Ocean WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Disabled if post is password protected or if disabled
if ( post_password_required() ) {
	return;
}

// Get sharing sites
$sites = oss_social_share_sites();

// Return if there aren't any sites enabled
if ( empty( $sites ) ) {
	return;
}

// Declare main vars
$style 				= get_theme_mod( 'oss_social_share_style', 'minimal' );
$style 				= $style ? $style : 'minimal';
$heading 			= oceanwp_tm_translation( 'oss_social_share_heading', get_theme_mod( 'oss_social_share_heading', 'Please Share This' ) );
$headingPosition 	= get_theme_mod( 'oss_social_share_heading_position', 'side' );
$headingPosition 	= $headingPosition ? $headingPosition : 'side';
$name 				= get_theme_mod( 'oss_social_share_name', false );
$name 				= $name ? $name : false;
$post_id  			= get_the_ID();
$url      			= apply_filters( 'oss_social_share_url', get_permalink( $post_id ) );
$title    			= get_the_title();

// Classes
$classes = array( 'entry-share', 'clr' );

// Add the style class
$classes[] = $style;

// Add the heading position class
$classes[] = $headingPosition;

// Add class if name
if ( true == $name ) {
	$classes[] = 'has-name';
}

// Add class if no heading
if ( empty( $heading ) ) {
	$classes[] = 'no-heading';
}

// Turn classes into space seperated string
$classes = implode( ' ', $classes ); ?>

<div class="<?php echo esc_attr( $classes ); ?>">

	<?php
	// If heading
	if ( ! empty( $heading )
		|| is_customize_preview() ) { ?>

		<h3 class="theme-heading social-share-title">
			<span class="text" aria-hidden="true"><?php echo esc_attr( $heading ); ?></span>
			<span class="screen-reader-text"><?php echo esc_attr__( 'Share this content', 'ocean-social-sharing' ); ?></span>
		</h3>

	<?php
	} ?>

	<ul class="oss-social-share clr" aria-label="<?php echo esc_attr__( 'Available sharing options', 'ocean-social-sharing' ); ?>">

		<?php
		// Loop through sites
		foreach ( $sites as $site ) :

			// Twitter
			if ( 'twitter' == $site ) {

				// Get SEO meta and use instead if they exist
				if ( defined( 'WPSEO_VERSION' ) ) {
					if ( $meta = get_post_meta( $post_id, '_yoast_wpseo_twitter-title', true ) ) {
						$title = $meta;
					}
					if ( $meta = get_post_meta( $post_id, '_yoast_wpseo_twitter-description', true ) ) {
						$title = $title .': '. $meta;
						$title = $title;
					}
				}

				// Get twitter handle
				$handle = get_theme_mod( 'oss_social_share_twitter_handle' );
				$handle = str_replace( '@' , '' , trim( $handle ) ); ?>

				<li class="twitter">
					<a href="https://twitter.com/share?text=<?php echo wp_strip_all_tags( rawurlencode( $title ) ); ?>&amp;url=<?php echo rawurlencode( esc_url( $url ) ); ?><?php if ( $handle ) echo '&amp;via='. esc_attr( $handle ); ?>" aria-label="<?php esc_attr_e( 'Share on Twitter', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'Twitter', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php }

			// Facebook
			if ( 'facebook' == $site ) { ?>

				<li class="facebook">
					<a href="https://www.facebook.com/sharer.php?u=<?php echo rawurlencode( esc_url( $url ) ); ?>" aria-label="<?php esc_attr_e( 'Share on Facebook', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M5.677,12.998V8.123h3.575V6.224C9.252,2.949,11.712,0,14.736,0h3.94v4.874h-3.94
								c-0.432,0-0.934,0.524-0.934,1.308v1.942h4.874v4.874h-4.874V24H9.252V12.998H5.677z"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'Facebook', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php }

			// Google+
			if ( 'google_plus' == $site ) { ?>

				<li class="googleplus">
					<a href="https://plus.google.com/share?url=<?php echo rawurlencode( esc_url( $url ) ); ?>" aria-label="<?php esc_attr_e( 'Share on Google plus', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;">
					<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M7.636,10.929V13.5h4.331c-0.175,1.104-1.309,3.236-4.331,3.236c-2.607,0-4.735-2.121-4.735-4.736
								s2.127-4.736,4.735-4.736c1.484,0,2.476,0.621,3.044,1.157l2.073-1.961C11.422,5.239,9.698,4.5,7.636,4.5C3.415,4.5,0,7.854,0,12
								s3.415,7.5,7.636,7.5c4.407,0,7.331-3.043,7.331-7.329c0-0.493-0.055-0.868-0.12-1.243H7.636z"/>
								<path d="M21.818,10.929V8.786h-2.182v2.143h-2.182v2.143h2.182v2.143h2.182v-2.143H24c0,0.022,0-2.143,0-2.143
								H21.818z"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'Google+', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php }

			// Pinterest
			if ( 'pinterest' == $site ) { ?>

				<li class="pinterest">
					<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo rawurlencode( esc_url( $url ) ); ?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id ) ); ?>&amp;description=<?php echo urlencode( wp_trim_words( strip_shortcodes( get_the_content( $post_id ) ), 40 ) ); ?>" aria-label="<?php esc_attr_e( 'Share on Pinterest', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M13.757,17.343c-1.487,0-2.886-0.804-3.365-1.717c0,0-0.8,3.173-0.969,3.785
								c-0.596,2.165-2.35,4.331-2.487,4.508c-0.095,0.124-0.305,0.085-0.327-0.078c-0.038-0.276-0.485-3.007,0.041-5.235
								c0.264-1.118,1.772-7.505,1.772-7.505s-0.44-0.879-0.44-2.179c0-2.041,1.183-3.565,2.657-3.565c1.252,0,1.857,0.94,1.857,2.068
								c0,1.26-0.802,3.142-1.216,4.888c-0.345,1.461,0.734,2.653,2.174,2.653c2.609,0,4.367-3.352,4.367-7.323
								c0-3.018-2.032-5.278-5.731-5.278c-4.177,0-6.782,3.116-6.782,6.597c0,1.2,0.355,2.047,0.909,2.701
								c0.255,0.301,0.29,0.422,0.198,0.767c-0.067,0.254-0.218,0.864-0.281,1.106c-0.092,0.349-0.375,0.474-0.69,0.345
								c-1.923-0.785-2.82-2.893-2.82-5.262c0-3.912,3.3-8.604,9.844-8.604c5.259,0,8.72,3.805,8.72,7.89
								C21.188,13.307,18.185,17.343,13.757,17.343z"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'Pinterest', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php }

			// LinkedIn
			if ( 'linkedin' == $site ) { ?>

				<li class="linkedin">
					<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo rawurlencode( esc_url( $url ) ); ?>&amp;title=<?php echo wp_strip_all_tags( rawurlencode( $title ) ); ?>&amp;summary=<?php echo urlencode( wp_trim_words( strip_shortcodes( get_the_content( $post_id ) ), 40 ) ); ?>&amp;source=<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Share on LinkedIn', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;">
					<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M6.52,22h-4.13V8.667h4.13V22z M4.436,6.92
								c-1.349,0-2.442-1.101-2.442-2.46C1.994,3.102,3.087,2,4.436,2s2.442,1.102,2.442,2.46C6.877,5.819,5.784,6.92,4.436,6.92z
								M21.994,22h-4.109c0,0,0-5.079,0-6.999c0-1.919-0.73-2.991-2.249-2.991c-1.652,0-2.515,1.116-2.515,2.991c0,2.054,0,6.999,0,6.999
								h-3.96V8.667h3.96v1.796c0,0,1.191-2.202,4.02-2.202c2.828,0,4.853,1.727,4.853,5.298C21.994,17.129,21.994,22,21.994,22z"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'LinkedIn', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php }

			// Viber
			if ( 'viber' == $site ) { ?>

				<li class="viber">
					<a href="viber://forward?text=<?php echo rawurlencode( esc_url( $url ) ); ?>" aria-label="<?php esc_attr_e( 'Share on Viber', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M14.957,5.825c0.764,0.163,1.349,0.453,1.849,0.921c0.643,0.608,0.996,1.343,1.151,2.4
								c0.105,0.689,0.062,0.96-0.182,1.184c-0.229,0.209-0.651,0.217-0.907,0.019c-0.186-0.139-0.244-0.286-0.287-0.685
								c-0.05-0.53-0.143-0.902-0.302-1.246c-0.341-0.731-0.942-1.111-1.957-1.235c-0.477-0.058-0.62-0.112-0.775-0.294
								c-0.283-0.337-0.174-0.883,0.217-1.084c0.147-0.074,0.209-0.081,0.535-0.062C14.5,5.755,14.798,5.79,14.957,5.825z M14.131,2.902
								c2.353,0.344,4.175,1.436,5.369,3.209c0.671,0.999,1.089,2.171,1.233,3.429c0.05,0.461,0.05,1.3-0.004,1.44
								c-0.051,0.131-0.213,0.309-0.353,0.383c-0.151,0.078-0.473,0.07-0.651-0.023c-0.298-0.151-0.388-0.391-0.388-1.041
								c0-1.002-0.26-2.059-0.709-2.88c-0.512-0.937-1.256-1.711-2.163-2.249c-0.779-0.465-1.93-0.809-2.981-0.894
								c-0.38-0.031-0.589-0.108-0.733-0.275c-0.221-0.252-0.244-0.592-0.058-0.875C12.895,2.813,13.205,2.763,14.131,2.902z
								M5.002,0.514c0.136,0.047,0.345,0.155,0.465,0.232c0.736,0.488,2.787,3.108,3.458,4.416c0.384,0.747,0.512,1.3,0.392,1.711
								C9.193,7.314,8.988,7.547,8.069,8.286C7.701,8.584,7.356,8.89,7.301,8.971C7.162,9.172,7.049,9.567,7.049,9.846
								c0.004,0.646,0.423,1.819,0.973,2.721c0.426,0.7,1.19,1.598,1.946,2.287c0.888,0.813,1.671,1.366,2.555,1.804
								c1.136,0.565,1.83,0.708,2.337,0.472c0.128-0.058,0.264-0.135,0.306-0.17c0.039-0.035,0.337-0.399,0.663-0.801
								c0.628-0.79,0.771-0.917,1.202-1.065c0.547-0.186,1.105-0.135,1.667,0.151c0.427,0.221,1.357,0.797,1.957,1.215
								c0.791,0.553,2.481,1.931,2.71,2.206c0.403,0.495,0.473,1.13,0.202,1.831c-0.287,0.739-1.403,2.125-2.182,2.717
								c-0.705,0.534-1.206,0.739-1.865,0.77c-0.543,0.027-0.768-0.019-1.461-0.306c-5.442-2.241-9.788-5.585-13.238-10.179
								c-1.802-2.4-3.175-4.888-4.113-7.47c-0.547-1.505-0.574-2.16-0.124-2.93c0.194-0.325,1.019-1.13,1.62-1.579
								c1-0.743,1.461-1.018,1.83-1.095C4.285,0.371,4.723,0.414,5.002,0.514z M13.864,0.096c1.334,0.166,2.411,0.487,3.593,1.065
								c1.163,0.569,1.907,1.107,2.892,2.086c0.923,0.925,1.434,1.626,1.977,2.713c0.756,1.517,1.186,3.321,1.26,5.306
								c0.027,0.677,0.008,0.828-0.147,1.022c-0.294,0.375-0.942,0.313-1.163-0.108c-0.07-0.139-0.089-0.259-0.112-0.801
								c-0.039-0.832-0.097-1.37-0.213-2.013c-0.458-2.52-1.667-4.532-3.597-5.976c-1.609-1.208-3.272-1.796-5.45-1.924
								c-0.737-0.043-0.864-0.07-1.031-0.197c-0.31-0.244-0.326-0.817-0.027-1.084c0.182-0.166,0.31-0.19,0.942-0.17
								C13.116,0.027,13.6,0.065,13.864,0.096z"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'Viber', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php }

			// VK
			if ( 'vk' == $site ) { ?>

				<li class="vk">
					<a href="https://vk.com/share.php?url=<?php echo rawurlencode( esc_url( $url ) ); ?>" aria-label="<?php esc_attr_e( 'Share on VK', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;">
					<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M11.701 18.771h1.437s.433-.047.654-.284c.21-.221.21-.63.21-.63s-.031-1.927.869-2.21c.887-.281 2.012 1.86 3.211 2.683.916.629 1.605.494 1.605.494l3.211-.044s1.682-.105.887-1.426c-.061-.105-.451-.975-2.371-2.76-2.012-1.861-1.742-1.561.676-4.787 1.469-1.965 2.07-3.166 1.875-3.676-.166-.48-1.26-.361-1.26-.361l-3.602.031s-.27-.031-.465.09c-.195.119-.314.391-.314.391s-.572 1.529-1.336 2.82c-1.623 2.729-2.268 2.879-2.523 2.699-.604-.391-.449-1.58-.449-2.432 0-2.641.404-3.75-.781-4.035-.39-.091-.681-.15-1.685-.166-1.29-.014-2.378.01-2.995.311-.405.203-.72.652-.539.675.24.03.779.146 1.064.537.375.506.359 1.636.359 1.636s.211 3.116-.494 3.503c-.495.262-1.155-.28-2.595-2.756-.735-1.26-1.291-2.67-1.291-2.67s-.105-.256-.299-.406c-.227-.165-.557-.225-.557-.225l-3.435.03s-.51.016-.689.24c-.166.195-.016.615-.016.615s2.686 6.287 5.732 9.453c2.79 2.902 5.956 2.715 5.956 2.715l-.05-.055z"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'VK', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php }

			// Reddit
			if ( 'reddit' == $site ) { ?>

				<li class="reddit">
					<a href="https://www.reddit.com/submit?url=<?php echo rawurlencode( esc_url( $url ) ); ?>&amp;title=<?php echo wp_strip_all_tags( rawurlencode( $title ) ); ?>" aria-label="<?php esc_attr_e( 'Share on Reddit', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M23.999,11.786c0-1.576-1.294-2.858-2.885-2.858c-0.689,0-1.321,0.241-1.817,0.641
								c-1.759-1.095-3.991-1.755-6.383-1.895l1.248-3.91l3.43,0.8c0.09,1.237,1.134,2.217,2.405,2.217c1.33,0,2.412-1.072,2.412-2.391
								c0-1.318-1.082-2.39-2.412-2.39c-0.93,0-1.739,0.525-2.141,1.291l-3.985-0.93c-0.334-0.078-0.671,0.112-0.775,0.436L11.547,7.65
								C8.969,7.712,6.546,8.375,4.658,9.534c-0.49-0.38-1.105-0.607-1.774-0.607C1.293,8.927,0,10.209,0,11.785
								c0,0.974,0.495,1.836,1.249,2.351c-0.031,0.227-0.048,0.455-0.048,0.686c0,1.97,1.156,3.803,3.254,5.16
								C6.468,21.283,9.13,22,11.952,22s5.485-0.716,7.496-2.018c2.099-1.357,3.254-3.19,3.254-5.16c0-0.21-0.014-0.419-0.041-0.626
								C23.464,13.689,23.999,12.798,23.999,11.786 M19.997,3.299c0.607,0,1.102,0.49,1.102,1.091c0,0.602-0.494,1.092-1.102,1.092
								s-1.102-0.49-1.102-1.092C18.896,3.789,19.389,3.299,19.997,3.299 M6.805,13.554c0-0.888,0.752-1.633,1.648-1.633
								c0.897,0,1.625,0.745,1.625,1.633c0,0.889-0.728,1.61-1.625,1.61C7.557,15.163,6.805,14.442,6.805,13.554 M15.951,18.288
								c-0.836,0.827-2.124,1.229-3.939,1.229c-0.004,0-0.008-0.001-0.013-0.001c-0.004,0-0.008,0.001-0.013,0.001
								c-1.815,0-3.103-0.402-3.938-1.229c-0.256-0.254-0.256-0.665,0-0.919c0.256-0.253,0.671-0.253,0.927,0
								c0.576,0.571,1.561,0.849,3.01,0.849c0.005,0,0.009,0.001,0.013,0.001c0.005,0,0.009-0.001,0.013-0.001
								c1.45,0,2.435-0.278,3.012-0.849c0.256-0.254,0.671-0.253,0.927,0C16.206,17.623,16.206,18.034,15.951,18.288 M15.569,15.163
								c-0.897,0-1.651-0.721-1.651-1.61s0.754-1.633,1.651-1.633s1.625,0.745,1.625,1.633C17.193,14.442,16.466,15.163,15.569,15.163"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'Reddit', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php }

			// Tumblr
			if ( 'tumblr' == $site ) { ?>

				<li class="tumblr">
					<a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo rawurlencode( esc_url( $url ) ); ?>" aria-label="<?php esc_attr_e( 'Share on Tumblr', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;">
					<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M19.44,22.887c-1.034,0.487-1.97,0.828-2.808,1.024
								c-0.838,0.195-1.744,0.293-2.718,0.293c-1.106,0-2.083-0.14-2.933-0.418c-0.851-0.279-1.575-0.677-2.175-1.194
								c-0.6-0.518-1.017-1.067-1.248-1.649c-0.231-0.581-0.347-1.425-0.347-2.53V9.93H4.56V6.482c0.947-0.309,1.759-0.751,2.434-1.327
								C7.67,4.58,8.212,3.889,8.62,3.081C9.029,2.274,9.311,1.247,9.464,0h3.429v6.131h5.747V9.93h-5.747v6.208
								c0,1.403,0.074,2.304,0.223,2.702c0.149,0.399,0.426,0.718,0.829,0.954c0.536,0.322,1.148,0.483,1.838,0.483
								c1.225,0,2.444-0.399,3.657-1.196V22.887L19.44,22.887z"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'Tumblr', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php }

			// Viadeo
			if ( 'viadeo' == $site ) { ?>

				<li class="viadeo">
					<a href="https://partners.viadeo.com/share?url=<?php echo rawurlencode( esc_url( $url ) ); ?>" aria-label="<?php esc_attr_e( 'Share on Viadeo', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M21.046,0.546c-1.011,2.159-2.882,2.557-2.882,2.557c-1.87,0.476-2.525,1.202-2.525,1.202
								c-1.871,1.889-0.396,4.181-0.396,4.181c4.039-0.922,5.514-4.259,5.514-4.259c-0.181,2.242-4.986,4.887-4.986,4.887
								c1.592,1.565,3.111,1.374,4.112,0.775c1.328-0.795,1.968-2.537,1.968-2.537C23.142,3.484,21.046,0.546,21.046,0.546z
								M14.424,7.082c0.044,0.662,0.772,12.464-5.445,14.829c0,0,0.571,0.108,1.216,0.079c0,0,7.912-5.015,4.283-14.745
								C14.478,7.244,14.463,7.185,14.424,7.082z M11.113,0c1.988,3.356,3.067,6.364,3.311,7.081V7.052C13.936,1.88,11.113,0,11.113,0z"/>
								<path d="M16.465,15.438c0,1.192-0.283,2.301-0.85,3.332c-0.566,1.031-1.328,1.825-2.295,2.385
								c-0.962,0.559-2.022,0.839-3.169,0.839c-1.153,0-2.207-0.28-3.169-0.839C6.02,20.595,5.253,19.8,4.687,18.769
								c-0.566-1.03-0.85-2.139-0.85-3.332c0-1.845,0.62-3.42,1.861-4.725c1.24-1.3,2.725-1.953,4.454-1.953
								c0.82,0,1.587,0.152,2.3,0.447c0.073-0.756,0.337-1.457,0.625-2.032c-0.899-0.329-1.87-0.491-2.92-0.491
								c-2.496,0-4.561,0.923-6.197,2.772c-1.485,1.673-2.232,3.656-2.232,5.932c0,2.301,0.786,4.313,2.354,6.031
								C5.655,23.141,7.677,24,10.152,24c2.466,0,4.488-0.859,6.056-2.581c1.573-1.722,2.354-3.734,2.354-6.031
								c0-1.232-0.215-2.375-0.645-3.425c-0.723,0.447-1.406,0.677-1.973,0.8C16.295,13.578,16.465,14.471,16.465,15.438z"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'Viadeo', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php }

			// WhatsApp
			if ( 'whatsapp' == $site ) { ?>

				<li class="whatsapp">
					<a href="whatsapp://send?text=<?php echo rawurlencode( esc_url( $url ) ); ?>" aria-label="<?php esc_html_e( 'Share on WhatsApp', 'ocean-social-sharing' ); ?>" onclick="oss_onClick( this.href );return false;" data-action="share/whatsapp/share">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-social-sharing' ); ?></span>
						<span class="oss-icon-wrap">
							<svg class="oss-icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90" aria-hidden="true" focusable="false">
								<path id="WhatsApp" d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522
									c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982
									c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537
									c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938
									c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537
									c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333
									c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882
									c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977
									c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344
									c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223
									C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z"/>
							</svg>
						</span>
						<?php
						// If name
						if ( true == $name
							|| is_customize_preview() ) { ?>
							<span class="oss-name" aria-hidden="true"><?php esc_html_e( 'WhatsApp', 'ocean-social-sharing' ); ?></span>
						<?php
						} ?>
					</a>
				</li>

			<?php } ?>

		<?php endforeach; ?>

	</ul>

</div><!-- .entry-share -->