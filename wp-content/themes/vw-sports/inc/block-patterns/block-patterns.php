<?php
/**
 * VW Sports: Block Patterns
 *
 * @package VW Sports
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-sports',
		array( 'label' => __( 'VW Sports', 'vw-sports' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-sports/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vw-sports' ),
			'categories' => array( 'vw-sports' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider.png\",\"id\":1369,\"dimRatio\":0,\"align\":\"full\",\"className\":\"banner-section p-5\"} -->\n<div class=\"wp-block-cover alignfull banner-section p-5\"><img class=\"wp-block-cover__image-background wp-image-1369\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"px-lg-5\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center px-lg-5\"><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"50%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:50%\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":1,\"style\":{\"typography\":{\"fontSize\":35}}} -->\n<h1 class=\"has-text-align-left\" style=\"font-size:35px\">Lorem Ipsum&nbsp;is dummy text</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"style\":{\"typography\":{\"fontSize\":17}}} -->\n<p class=\"has-text-align-left\" style=\"font-size:17px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":0,\"style\":{\"color\":{\"background\":\"#ff6c26\"}}} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background no-border-radius\" style=\"background-color:#ff6c26\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"50%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:50%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-sports/services-section',
		array(
			'title'      => __( 'Game Section', 'vw-sports' ),
			'categories' => array( 'vw-sports' ),
			'content'    => "<!-- wp:group {\"className\":\"game-section py-5\"} -->\n<div class=\"wp-block-group game-section py-5\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"style\":{\"typography\":{\"fontSize\":35},\"color\":{\"text\":\"#151821\"}}} -->\n<h2 class=\"has-text-align-center has-text-color\" style=\"color:#151821;font-size:35px\">GAME HIGHLIGHTS</h2>\n<!-- /wp:heading -->\n\n<!-- wp:image {\"align\":\"center\",\"id\":1382,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"mb-5\"} -->\n<div class=\"wp-block-image mb-5\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/assets/images/title-icon.png\" alt=\"\" class=\"wp-image-1382\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"className\":\"game-box mb-lg-0 mb-3\"} -->\n<div class=\"wp-block-column game-box mb-lg-0 mb-3\"><!-- wp:image {\"id\":7933,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"mb-0\"} -->\n<figure class=\"wp-block-image size-large mb-0\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/game1.png\" alt=\"\" class=\"wp-image-7933\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:group {\"className\":\"game-content\"} -->\n<div class=\"wp-block-group game-content\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"style\":{\"typography\":{\"fontSize\":25},\"color\":{\"text\":\"#ff6c26\"}}} -->\n<h3 class=\"has-text-align-center has-text-color\" style=\"color:#ff6c26;font-size:25px\">Game 1</h3>\n<!-- /wp:heading --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"game-box mb-lg-0 mb-3\"} -->\n<div class=\"wp-block-column game-box mb-lg-0 mb-3\"><!-- wp:image {\"id\":7935,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"mb-0\"} -->\n<figure class=\"wp-block-image size-large mb-0\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/game3.png\" alt=\"\" class=\"wp-image-7935\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:group {\"className\":\"game-content\"} -->\n<div class=\"wp-block-group game-content\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"style\":{\"typography\":{\"fontSize\":25},\"color\":{\"text\":\"#ff6c26\"}}} -->\n<h3 class=\"has-text-align-center has-text-color\" style=\"color:#ff6c26;font-size:25px\">Game 2</h3>\n<!-- /wp:heading --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"game-box mb-lg-0 mb-3\"} -->\n<div class=\"wp-block-column game-box mb-lg-0 mb-3\"><!-- wp:image {\"id\":7934,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"mb-0\"} -->\n<figure class=\"wp-block-image size-large mb-0\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/game2.png\" alt=\"\" class=\"wp-image-7934\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:group {\"className\":\"game-content\"} -->\n<div class=\"wp-block-group game-content\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"style\":{\"typography\":{\"fontSize\":25},\"color\":{\"text\":\"#ff6c26\"}}} -->\n<h3 class=\"has-text-align-center has-text-color\" style=\"color:#ff6c26;font-size:25px\">Game 3</h3>\n<!-- /wp:heading --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
		)
	);
}