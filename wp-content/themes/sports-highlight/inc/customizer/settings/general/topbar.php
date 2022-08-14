<?php
/**
 * Controls and settings of Top Bar Section in General Panel.
 *
 * @package sports-highlight
 */

namespace Sports_Highlight;

use function Sports_Highlight\Helpers\get_social_links;

$section_id = 'general_topbar_section';
$panel_id   = 'general_option_panel';

$wp_customize->add_section(
	$section_id,
	array(
		'title'      => esc_html__( 'Top Bar', 'sports-highlight' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => $panel_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_option_topbar_enable_topbar',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Enable Top bar', 'sports-highlight' ),
		'section'           => $section_id,
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_option_topbar_display_topbar_date',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Display Date', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_topbar_enabled' ),
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_option_topbar_enable_social_links',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Enable Social Links', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_topbar_enabled' ),
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'name'              => 'general_option_topbar_bg_color',
		'sanitize_callback' => 'Sports_Highlight\Customizer_Callbacks::sanitize_hex_color',
		'label'             => esc_html__( 'Topbar Background Color', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_is_topbar_enabled' ),
	)
);

$social_links = get_social_links();

if ( is_array( $social_links ) && ! empty( $social_links ) ) {
	foreach ( $social_links as $social_link_class => $social_link_label ) {

		Customizer_Helpers::register_option(
			$wp_customize,
			array(
				'type'              => 'text',
				'name'              => "general_option_topbar_social_link_{$social_link_class}",
				'sanitize_callback' => 'esc_url_raw',
				'label'             => $social_link_label,
				'active_callback'   => function( $control ) {
					$is_topbar_enabled = Customizer_Callbacks::customizer_is_topbar_enabled( $control );

					$setting = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_topbar_enable_social_links]' )->value();

					return $is_topbar_enabled && ( 1 === $setting );
				},
				'section'           => $section_id,
			)
		);

	}
}


Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'light',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Toggle_Control',
		'name'              => 'general_option_topbar_enable_news_ticker',
		'sanitize_callback' => 'absint',
		'label'             => esc_html__( 'Enable News Ticker', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => function( $control ) {
			$is_topbar_enabled   = Customizer_Callbacks::customizer_is_topbar_enabled( $control );
			$header_layout       = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_header_layout]' )->value();

			return $is_topbar_enabled && ( 'layout-three' !== $header_layout );
		},
	)
);


Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'general_option_topbar_news_ticker_label',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'News Ticker Label', 'sports-highlight' ),
		'section'           => $section_id,
		'active_callback'   => function( $control ) {
			$is_topbar_enabled   = Customizer_Callbacks::customizer_is_topbar_enabled( $control );
			$news_ticker_enabled = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_topbar_enable_news_ticker]' )->value();
			$header_layout       = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_header_layout]' )->value();

			return $is_topbar_enabled && ( 'layout-three' !== $header_layout ) && ( 1 === $news_ticker_enabled );
		},
	)
);

Customizer_Helpers::register_option(
	$wp_customize,
	array(
		'type'              => 'sports-highlight-dropdown-control',
		'custom_control'    => 'Sports_Highlight\Custom_Control\Customizer_Dropdown_Control',
		'name'              => 'general_option_topbar_news_ticker_category',
		'sanitize_callback' => array( 'Sports_Highlight\Customizer_Callbacks', 'customizer_sanitize_select' ),
		'label'             => esc_html__( 'News Ticker Category', 'sports-highlight' ),
		'choices'           => Customizer_Helpers::get_categories(),
		'section'           => $section_id,
		'active_callback'   => function( $control ) {
			$is_topbar_enabled   = Customizer_Callbacks::customizer_is_topbar_enabled( $control );
			$news_ticker_enabled = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_topbar_enable_news_ticker]' )->value();
			$header_layout       = $control->manager->get_setting( 'sports_highlight_theme_mod[general_option_header_layout]' )->value();

			return $is_topbar_enabled && ( 'layout-three' !== $header_layout ) && ( 1 === $news_ticker_enabled );
		},
	)
);
