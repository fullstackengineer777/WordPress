<?php
/**
 * @package twentysixteen
 * @subpackage eCommerce WP
 * @since 1.0.0
 */

if ( ! function_exists( 'ecommerce_wp_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function ecommerce_wp_posted_on( $id = '' ) {
		if ( false === ecommerce_wp_archive_meta_option( 'hide_date' ) ) {
			return;
		}

		$id = ! empty( $id ) ? $id : get_the_id();
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U', $id ) !== get_the_modified_time( 'U', $id ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
		
			esc_attr(get_the_date( DATE_W3C, $id )),
			esc_html(get_the_date( '', $id )),
			esc_attr(get_the_modified_date( DATE_W3C, $id )),
			esc_html(get_the_modified_date( '', $id ))
			
		);

		$year = get_the_date( 'Y' );
		$month = get_the_date( 'm' );

		// Wrap the time string in a link, and preface it with 'Posted on'.
		printf(
			/* translators: %s: post date */
			__( '<span class="posted-on"><span class="screen-reader-text">Posted on</span> %s', 'ecommerce-wp' ),
			'<a href="' . esc_url( get_month_link( $year, $month ) ) . '" rel="bookmark">' . $time_string . '</a></span>'
		);
	}
endif;

if ( ! function_exists( 'ecommerce_wp_author' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function ecommerce_wp_author() {

		// Get the author name; wrap it in a link.
		$byline = sprintf(
			/* translators: %s: post author */
			__( 'By: %s', 'ecommerce-wp' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		// Finally, let's write all of this to the page.
		return '<span class="byline"> ' . $byline . '</span>';
	}
endif;

if ( ! function_exists( 'ecommerce_wp_single_categories' ) ) :
	/**
	 * Prints HTML with meta information for the categories,
	 */
	function ecommerce_wp_single_categories() {
		$options = ecommerce_wp_get_theme_options();
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			if ( ! $options['single_post_hide_category'] ) :
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'ecommerce-wp' ) );
				if ( $categories_list && ecommerce_wp_categorized_blog() ) {
					printf( '<span class="post-categories"><span class="cat-links">'.esc_html__( 'Categories: ', 'ecommerce-wp' ) . '%1$s' . '</span></span>', $categories_list ); // WPCS: XSS OK.
				}
			endif;
		}

	}
endif;

if ( ! function_exists( 'ecommerce_wp_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function ecommerce_wp_entry_footer() {
		$options = ecommerce_wp_get_theme_options();
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			if ( ! $options['single_post_hide_tags'] ) :
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list();
				if ( $tags_list ) {
					printf( '<span class="tags-links">%1$s</span>', $tags_list ); // WPCS: XSS OK.
				}
			endif;
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'ecommerce-wp' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * articles meta
 *  @param [id] $id post id
 *  @param [html] $authro author template
 */
function ecommerce_wp_article_footer_meta( $id = '' ) { 
	$id = ! empty( $id ) ? $id : get_the_id();

	if ( 'post' !== get_post_type( $id ) ) { 
		return;
	}	
	$output = '';
	
	if ( true === ecommerce_wp_archive_meta_option( 'hide_category' ) ) {
	    $categories_list = get_the_category_list( '', '', $id );
		if ( $categories_list && ecommerce_wp_categorized_blog() ) {
			$output .= $categories_list;
		}
	}

    return $output;
}

/**
 * Checks to see if meta option is hide enabled in archive/blog
 */
function ecommerce_wp_archive_meta_option( $option = '' ) {
	$options = ecommerce_wp_get_theme_options();
	if ( is_archive() || is_search() || is_home() ) :
		if ( true === $options[$option] )
			return false;
		else
			return true;
	else :
		return true;
	endif;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ecommerce_wp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'ecommerce_wp_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'ecommerce_wp_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so ecommerce_wp_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so ecommerce_wp_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in ecommerce_wp_categorized_blog.
 */
function ecommerce_wp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ecommerce_wp_categories' );
}
add_action( 'edit_category', 'ecommerce_wp_category_transient_flusher' );
add_action( 'save_post',     'ecommerce_wp_category_transient_flusher' );



/*************************
 * Theme custom funtions *
 ************************/

if( ! function_exists( 'ecommerce_wp_check_enable_status' ) ):
	/**
	 * Check status of content.
	 *
	 * @since 1.0.0
	 */
  	function ecommerce_wp_check_enable_status( $input, $content_enable ){
		$options = ecommerce_wp_get_theme_options();

		// Content status.
		$content_status = $options[ $content_enable ];

		if ( ( ! is_home() && is_front_page() ) && $content_status ) {
			$input = true;
		}
		else {
			$input = false;
		}
		
		return $input;
  	}
endif;
add_filter( 'ecommerce_wp_section_status', 'ecommerce_wp_check_enable_status', 10, 2 );


if ( ! function_exists( 'ecommerce_wp_is_sidebar_enable' ) ) :
	/**
	 * Check if sidebar is enabled in meta box first then in customizer
	 *
	 * @since 1.0.0
	 */
	function ecommerce_wp_is_sidebar_enable() {
		$options               = ecommerce_wp_get_theme_options();
		$sidebar_position      = $options['sidebar_position'];

		if ( is_home() ) {
			$post_id = get_option( 'page_for_posts' );
			if ( ! empty( $post_id ) )
				$post_sidebar_position = get_post_meta( $post_id, 'ecommerce-wp-sidebar-position', true );
			else
				$post_sidebar_position = '';
		} elseif ( is_archive() || is_search() ) {
			$post_sidebar_position = '';
		} else {
			$post_sidebar_position = get_post_meta( get_the_id(), 'ecommerce-wp-sidebar-position', true );
			if ( is_single() ) {
				$post_sidebar_position = ! empty( $post_sidebar_position ) ? $post_sidebar_position : $options['post_sidebar_position'];
			} elseif ( is_page() ) {
				$post_sidebar_position = ! empty( $post_sidebar_position ) ? $post_sidebar_position : $options['page_sidebar_position'];
			}
		}
		if ( ( in_array( $sidebar_position, array( 'no-sidebar', 'no-sidebar-content' ) ) && $post_sidebar_position == "" ) || in_array( $post_sidebar_position, array( 'no-sidebar', 'no-sidebar-content' ) ) ) {
			return false;
		} else {
			return true;
		}

	}
endif;

/**
 * Sidebar position
 * @return array Sidbar positions
 */
function ecommerce_wp_header_layout() {
	$ecommerce_wp_header_layout = array(
		'default' => get_template_directory_uri() . '/images/default.png',
		'storefront'    => get_template_directory_uri() . '/images/storefront.png',
		'bannerad'    => get_template_directory_uri() . '/images/headerad.png',
	);

	$output = apply_filters( 'ecommerce_wp_header_layout', $ecommerce_wp_header_layout );

	return $output;

}


add_action( 'ecommerce_wp_action_pagination', 'ecommerce_wp_pagination', 10 );
if ( ! function_exists( 'ecommerce_wp_pagination' ) ) :

	/**
	 * pagination.
	 *
	 * @since 1.0.0
	 */
	function ecommerce_wp_pagination() {
	
		$options = ecommerce_wp_get_theme_options();
 
		if ( true == $options['pagination_enable'] ) {
			$pagination = $options['pagination_type'];
				if ( $pagination == 'default' ) :
					the_posts_navigation( array(
				'prev_text'	=> ecommerce_wp_get_svg( array( 'icon' => 'up' ) ) .  '<span>' . esc_html__( 'Older', 'ecommerce-wp' ) . '</span>',
				'next_text' => '<span>' . esc_html__( 'Next', 'ecommerce-wp' ) . '</span>' . ecommerce_wp_get_svg( array( 'icon' => 'up' ) ),
				) );
			else:
				the_posts_pagination( array(
				    'mid_size' => 4,
				    'prev_text' => ecommerce_wp_get_svg( array( 'icon' => 'up' ) ),
				    'next_text' => ecommerce_wp_get_svg( array( 'icon' => 'up' ) ),
				) );
			endif;
		}
	}

endif;


add_action( 'ecommerce_wp_action_post_pagination', 'ecommerce_wp_post_pagination', 10 );
if ( ! function_exists( 'ecommerce_wp_post_pagination' ) ) :

	/**
	 * post pagination.
	 *
	 * @since 1.0.0
	 */
	function ecommerce_wp_post_pagination() {
		the_post_navigation( array(
			'prev_text'	=> ecommerce_wp_get_svg( array( 'icon' => 'up' ) ) .  '<span>%title</span>',
            'next_text' => '<span>%title</span>' . ecommerce_wp_get_svg( array( 'icon' => 'up' ) ),
		) );
	}
endif;


if ( ! function_exists( 'ecommerce_wp_excerpt_length' ) ) :
	/**
	 * long excerpt
	 * 
	 * @since 1.0.0
	 * @return long excerpt value
	 */
	function ecommerce_wp_excerpt_length( $length ){
		if ( is_admin() ) {
			return $length;
		}

		$options = ecommerce_wp_get_theme_options();
		$length = $options['long_excerpt_length'];
		return $length;
	}
endif;
add_filter( 'excerpt_length', 'ecommerce_wp_excerpt_length', 999 );


if ( ! function_exists( 'ecommerce_wp_excerpt_more' ) ) :
	// Read more
	function ecommerce_wp_excerpt_more( $more ){
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'ecommerce_wp_excerpt_more' );


if ( ! function_exists( 'ecommerce_wp_trim_content' ) ) :
	/**
	 * custom excerpt function
	 * 
	 * @since 1.0.0
	 * @return  no of words to display
	 */
	function ecommerce_wp_trim_content( $length = 40, $post_obj = null ) {
		global $post;
		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );
		if ( $length < 1 ) {
			$length = 40;
		}

		$source_content = $post_obj->post_content;
		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );

	   return apply_filters( 'ecommerce_wp_trim_content', $trimmed_content );
	}
endif;


if ( ! function_exists( 'ecommerce_wp_layout' ) ) :
	/**
	 * Check home page layout option
	 * @since 1.0.0
	 * @return string eCommerce WP layout value
	 */
	function ecommerce_wp_layout() {
		$options = ecommerce_wp_get_theme_options();
		$sidebar_position = $options['sidebar_position'];
		
		$sidebar_position_post = $options['post_sidebar_position'];
		$sidebar_position_page = $options['page_sidebar_position'];
		$sidebar_position_woo = $options['woo_sidebar_position'];
		
		
		if ( is_singular() || is_home() || (class_exists('WooCommerce') && is_woocommerce()) ) {
					
			if (class_exists('WooCommerce') && is_woocommerce() ){
				$sidebar_position = 'no-sidebar';
				if (is_active_sidebar( 'sidebar-woocommerce' )) {
					$sidebar_position = $sidebar_position_woo;
				}
			} else if (isset( $post_sidebar_position ) && ! empty( $post_sidebar_position )){
				$sidebar_position = $post_sidebar_position;				
			}  elseif ( is_single() ) {
				$sidebar_position = $sidebar_position_post;
			} elseif ( is_page() ) {
				$sidebar_position = 'no-sidebar';
				if (is_active_sidebar( 'sidebar-1' )) {
					$sidebar_position = $sidebar_position_page;
				}
			}
		}
		return $sidebar_position;
	}
endif;

/**
 * Add SVG definitions to the footer.
 */
function ecommerce_wp_include_svg_icons() {
	// Define SVG sprite file.
	$svg_icons = get_template_directory() . '/images/svg-icons.svg';

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require $svg_icons;
	}
}
add_action( 'wp_footer', 'ecommerce_wp_include_svg_icons', 9999 );

/**
 * Return SVG markup.
 */
function ecommerce_wp_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return esc_html__( 'Please define default parameters in the form of an array.', 'ecommerce-wp' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return esc_html__( 'Please define an SVG icon filename.', 'ecommerce-wp' );
	}

	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'class'        => '',
		'fallback'    => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id    	 = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . esc_attr( $unique_id ) . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . esc_attr( $unique_id ) . ' desc-' . esc_attr( $unique_id ) . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . ' ' . esc_attr( $args['class'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . esc_attr( $unique_id ) . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . esc_attr( $unique_id ) . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 */
	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}

/**
 * Add dropdown icon if menu item has children.
 */
function ecommerce_wp_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
	if ( 'primary' === $args->theme_location ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . ecommerce_wp_get_svg( array( 'icon' => 'down' ) );
			}
		}
	}

	return $title;
}
add_filter( 'nav_menu_item_title', 'ecommerce_wp_dropdown_icon_to_menu_link', 10, 4 );

/**
 * @return array $social_links_icons
 */
function ecommerce_wp_social_links_icons() {
	// Supported social links icons.
	$social_links_icons = array(
		'behance.net'     => 'behance',
		'codepen.io'      => 'codepen',
		'deviantart.com'  => 'deviantart',
		'digg.com'        => 'digg',
		'dribbble.com'    => 'dribbble',
		'dropbox.com'     => 'dropbox',
		'facebook.com'    => 'facebook',
		'flickr.com'      => 'flickr',
		'foursquare.com'  => 'foursquare',
		'plus.google.com' => 'google-plus',
		'github.com'      => 'github',
		'instagram.com'   => 'instagram',
		'linkedin.com'    => 'linkedin',
		'mailto:'         => 'envelope-o',
		'medium.com'      => 'medium',
		'pinterest.com'   => 'pinterest-p',
		'getpocket.com'   => 'get-pocket',
		'reddit.com'      => 'reddit-alien',
		'skype.com'       => 'skype',
		'skype:'          => 'skype',
		'slideshare.net'  => 'slideshare',
		'snapchat.com'    => 'snapchat-ghost',
		'soundcloud.com'  => 'soundcloud',
		'spotify.com'     => 'spotify',
		'stumbleupon.com' => 'stumbleupon',
		'tumblr.com'      => 'tumblr',
		'twitch.tv'       => 'twitch',
		'twitter.com'     => 'twitter',
		'vimeo.com'       => 'vimeo',
		'vine.co'         => 'vine',
		'vk.com'          => 'vk',
		'wordpress.org'   => 'wordpress',
		'wordpress.com'   => 'wordpress',
		'yelp.com'        => 'yelp',
		'youtube.com'     => 'youtube',
	);

	/**
	 * Filter eCommerce WP social links icons.
	 */
	return apply_filters( 'ecommerce_wp_social_links_icons', $social_links_icons );
}

/**
 * Display SVG icons in social links menu.
 */
function ecommerce_wp_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Get supported social icons.
	$social_icons = ecommerce_wp_social_links_icons();

	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$item_output = str_replace( $args->link_after, '</span>' . ecommerce_wp_get_svg( array( 'icon' => esc_attr( $value ) ) ), $item_output );
			}
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'ecommerce_wp_nav_menu_social_icons', 10, 4 );

/**
 * Display SVG icons as per the link.
 */
function ecommerce_wp_return_social_icon( $social_link ) {
	// Get supported social icons.
	$social_icons = ecommerce_wp_social_links_icons();

	// Check in the URL for the url in the array.
	foreach ( $social_icons as $attr => $value ) {
		if ( false !== strpos( $social_link, $attr ) ) {
			return ecommerce_wp_get_svg( array( 'icon' => esc_attr( $value ) ) );
		}
	}
}

/**
 * Fallback function call for menu
 * @param  Mixed $args Menu arguments
 * @return String $output Return or echo the add menu link.       
 */
function ecommerce_wp_menu_fallback_cb( $args ){
    if ( ! current_user_can( 'edit_theme_options' ) ){
	    return;
   	}
    // see wp-includes/nav-menu-template.php for available arguments
    $link = $args['link_before']
        	. '<a href="' .esc_url( admin_url( 'nav-menus.php' ) ) . '">' . $args['before'] . esc_html__( 'Add a menu','ecommerce-wp' ) . $args['after'] . '</a>'
        	. $args['link_after'];

   	if ( FALSE !== stripos( $args['items_wrap'], '<ul' ) || FALSE !== stripos( $args['items_wrap'], '<ol' )){
		$link = "<li>$link</li>";
	}
	$output = sprintf( $args['items_wrap'], $args['menu_id'], $args['menu_class'], $link );
	if ( ! empty ( $args['container'] ) ){
		$output = sprintf( '<%1$s class="%2$s" id="%3$s">%4$s</%1$s>', $args['container'], $args['container_class'], $args['container_id'], $output );
	}
	if ( $args['echo'] ){
		echo $output;
	}
	return $output;
}


/**
 * Checks to see if we're on the homepage or not.
 */
function ecommerce_wp_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Your latest posts".
 */
function ecommerce_wp_is_latest_posts() {
	return ( is_front_page() && is_home() );
}

/**
 * Checks to see if blog Page
 */
function ecommerce_wp_is_blog_page() {
	return ( ! is_front_page() && is_home() );
}

if ( ! function_exists( 'ecommerce_wp_simple_breadcrumb' ) ) :
	/**
	 * Simple breadcrumb.
	 *
	 * @param  array $args Arguments
	 */
	function ecommerce_wp_simple_breadcrumb( $args = array() ) {
		/**
		 * Add breadcrumb.
		 *
		 */
		$options = ecommerce_wp_get_theme_options();
		
		// Bail if Breadcrumb disabled.
		if ( ! $options['breadcrumb_category'] ) {
			return;
		}

		$args = array(
			'show_on_front'   => false,
			'show_title'      => true,
			'show_browse'     => false,
		);
		ecommerce_wp_breadcrumb_trail( $args );      

		return;
	}

endif;
add_action( 'ecommerce_wp_simple_breadcrumb', 'ecommerce_wp_simple_breadcrumb' , 10 );

/**
 * Display custom header title in frontpage and blog
 */
function ecommerce_wp_custom_header_banner_title() {
	$options = ecommerce_wp_get_theme_options();
	if ( ecommerce_wp_is_latest_posts() ) : 
		$title = ! empty( $options['your_latest_posts_title'] ) ? $options['your_latest_posts_title'] : esc_html_e( 'Blog', 'ecommerce-wp' ); ?>
		<h2 class="page-title"><?php echo esc_html( $title ); ?></h2>
	<?php elseif ( ecommerce_wp_is_blog_page() || is_singular() ): ?>
		<h2 class="page-title"><?php single_post_title(); ?></h2>
	<?php elseif ( is_archive() ) : 
		the_archive_title( '<h2 class="page-title">', '</h2>' );
		//the_archive_description( '<div class="archive-description">', '</div>' );
	elseif ( is_search() ) : ?>
		<h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'ecommerce-wp' ), get_search_query() ); ?></h2>
	<?php elseif ( is_404() ) :
		echo '<h2 class="page-title">' . esc_html__( 'Oops! That page can&#39;t be found.', 'ecommerce-wp' ) . '</h2>';
	endif;
}



if ( ! function_exists( 'ecommerce_wp_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function ecommerce_wp_add_breadcrumb() {
		$options = ecommerce_wp_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_category'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( ecommerce_wp_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list">';
				/**
				 * ecommerce_wp_simple_breadcrumb hook
				 *
				 * @hooked ecommerce_wp_simple_breadcrumb -  10
				 *
				 */
				do_action( 'ecommerce_wp_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;



 
if ( ! function_exists( 'ecommerce_wp_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function ecommerce_wp_site_layout() {
        $ecommerce_wp_site_layout = array(
            'fluid'  => get_template_directory_uri() . '/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/images/boxed.png',
        );

        $output = apply_filters( 'ecommerce_wp_site_layout', $ecommerce_wp_site_layout );
        return $output;
    }
endif;

 
if ( ! function_exists( 'ecommerce_wp_header_layout' ) ) :
    /**
     * Header Layout
     * @return array header layout options
     */
    function ecommerce_wp_header_layout() {
        $ecommerce_wp_header_layout = array(
            'default'  => get_template_directory_uri() . '/images/default.png',
            'storefront' => get_template_directory_uri() . '/images/storefront.png',
        );

        $output = apply_filters( 'ecommerce_wp_header_layout', $ecommerce_wp_header_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'ecommerce_wp_header_type' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function ecommerce_wp_header_type() {
        $ecommerce_wp_header_type = array(
            'none'        				=> esc_html__( 'None', 'ecommerce-wp' ),
            'shadow'      				=> esc_html__( 'Box Shadow', 'ecommerce-wp' ),
			'border'      				=> esc_html__( 'Border', 'ecommerce-wp' ),
			'transparent'		=> esc_html__( 'Transparent Header', 'ecommerce-wp' ),
        );

        $output = apply_filters( 'ecommerce_wp_header_type', $ecommerce_wp_header_type );

        return $output;
    }
endif;


if ( ! function_exists( 'ecommerce_wp_woo_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function ecommerce_wp_woo_sidebar_position() {
        $ecommerce_wp_woo_sidebar_position = array(
			'left-sidebar' => get_template_directory_uri() . '/images/left.png',
            'right-sidebar' => get_template_directory_uri() . '/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/images/full.png',
        );

        $output = apply_filters( 'ecommerce_wp_woo_sidebar_position', $ecommerce_wp_woo_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'ecommerce_wp_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function ecommerce_wp_sidebar_position() {
        $ecommerce_wp_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/images/full.png',
        );

        $output = apply_filters( 'ecommerce_wp_sidebar_position', $ecommerce_wp_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'ecommerce_wp_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function ecommerce_wp_pagination_options() {
        $ecommerce_wp_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'ecommerce-wp' ),
            'default'   => esc_html__( 'Default [Older | Newer]', 'ecommerce-wp' ),
        );

        $output = apply_filters( 'ecommerce_wp_pagination_options', $ecommerce_wp_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'ecommerce_wp_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function ecommerce_wp_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'ecommerce-wp' ),
            'off'       => esc_html__( 'Disable', 'ecommerce-wp' )
        );
        return apply_filters( 'ecommerce_wp_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'ecommerce_wp_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function ecommerce_wp_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'ecommerce-wp' ),
            'off'       => esc_html__( 'No', 'ecommerce-wp' )
        );
        return apply_filters( 'ecommerce_wp_hide_options', $arr );
    }
endif;



function ecommerce_wp_activated( ) {
	if (class_exists('Ecommerce_Pro_Plugin')) {
		return esc_html__( 'Activated','ecommerce-wp' );
	
	} else {
		return esc_html__( 'Go Pro','ecommerce-wp' );
	}
}
