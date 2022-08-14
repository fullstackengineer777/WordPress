<?php

get_template_part( '/inc/tgm/class-tgm-plugin-activation');
/**
 * Recommended plugins.
 */
function storefront_ecommerce_proregister_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'GTranslate', 'storefront-ecommerce' ),
			'slug'             => 'gtranslate',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Currency Switcher for WooCommerce', 'storefront-ecommerce' ),
			'slug'             => 'currency-switcher-woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'storefront-ecommerce' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'YITH WooCommerce Wishlist', 'storefront-ecommerce' ),
			'slug'             => 'yith-woocommerce-wishlist',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'storefront_ecommerce_proregister_recommended_plugins' );