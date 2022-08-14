<?php

function ecommerce_wp_custom_css(){

$option 			= ecommerce_wp_get_theme_options();

$color 				= esc_attr($option['primary_color']);
$link_color 		= esc_attr($option['link_color']);
$button_color 		= $color;
$text_color 		= esc_attr($option['text_color']);
$link_hover_color 	= esc_attr($option['link_hover_color']);
$header_bg_color	= esc_attr($option['header_bg_color']);
$accent_color		= esc_attr($option['accent_color']);

$two_colum_checkout =  esc_attr($option['two_colum_checkout']);
$footer_text_color  =  esc_attr($option['footer_text_color']);

$contact_bg_color  =  esc_attr($option['contact_bg_color']);

$store_menu_color 	=  esc_attr($option['store_menu_color']);
$store_menubar_color 	=  esc_attr($option['store_menubar_color']);

$header_text_color 	=  esc_attr($option['header_text_color']);

$menubar_border_height = esc_attr($option['menubar_border_height']);
$menubar_border_color = esc_attr($option['menubar_border_color']);

$footer_width = esc_attr($option['footer_width']);
$content_width = esc_attr($option['content_width']);
$header_width = esc_attr($option['header_width']);

$css = '

	/* Width */
	#masthead .container {
		max-width: '.$header_width.'px;
	}
	#inner-content-wrapper.container,
	.page-template .elementor-section.elementor-section-boxed > .elementor-container {
		max-width: '.$content_width.'px;
	}
	
	.site-footer .container {
		max-width: '.$footer_width.'px;
	}	

	/* CUSTOM FONTS */
	
	body {
		font-family: "'.$option['body_font'].'", sans-serif;
	}
	
	h1,	h2,	h3,	h4,	h5,	h6, .section-title {
		clear: both;
		margin: 16px 0;
		line-height: 1.2;
		font-weight: 400;
		font-family: "'.$option['heading_font'].'", sans-serif;
	}
	
	
	.site-title,
	.post-navigation a, 
	.posts-navigation a,
	.post-navigation span,
	.posts-navigation span,	
	.pagination .page-numbers,
	.pagination .page-numbers.dots:hover,
	.pagination .page-numbers.dots:focus,
	.post-navigation span,
	.posts-navigation span,
	.jetpack_subscription_widget input[type="submit"],
	.jetpack_subscription_widget button[type="submit"],
	.widget_popular_post a time,
	.widget_popular_post time,
	.widget_latest_post a time,
	.widget_latest_post time,
	.widget_featured_post a time,
	.widget_featured_post time,
	.reply a,
	.section-subtitle,
	.trail-items li,
	ul.filter-tabs li a,
	.post-categories a,
	.posted-on a,
	#masthead .login-register a,
	.main-navigation ul.nav-menu > li a {
		font-family: "'.$option['heading_font'].'", sans-serif;
	}
	
	
	/*----------------
	# Color Options
	-----------------*/
	
	.preloader-wrap {
		background-color: '.$color.';
	}
	
	@media screen and (min-width: 992px) {
	
		.header-storefront .main-navigation ul.nav-menu > li > a {
		
			color: '.$store_menu_color.';
			
		}
		
		.header-storefront.menu {
			background-color: '.$store_menubar_color.';
		}
		
		.header-storefront.menu.header-ticky-menu {
			background-color: '.$store_menubar_color.';
		}
		
		.header-storefront .main-navigation .nav-menu > li > a > svg {
			fill: '.$store_menu_color.';
		}
		
		.header-transparent .main-navigation .nav-menu > li > a > svg {
			fill: #ffffff;
		}
		
		.header-transparent .header-ticky-menu .main-navigation .nav-menu > li > a > svg {
			fill: #2d2d2d;
		}
		
		.has-header-image .main-navigation .nav-menu > li > a > svg {
			fill: #ffffff;
		}
		
		.has-header-image .header-ticky-menu .main-navigation .nav-menu > li > a > svg {
			fill: #2d2d2d;
		}
		
		.header-storefront.header-ticky-menu .main-navigation ul.nav-menu > li > a {
			color: '.$store_menu_color .';
		}
		
		.header-storefront.header-ticky-menu .main-navigation .nav-menu > li > a > svg {
			fill: '.$store_menu_color .';
		}
        

		
		
		.header-transparent .main-navigation ul#primary-menu > li.current-menu-item > a {
			color: #fff;
		}								
		
		.has-header-image .main-navigation ul#primary-menu > li.current-menu-item > a {
			color: #fff;
		}
		.has-header-image .header-storefront .main-navigation ul.nav-menu > li > a {
			color: #fff;
		}
		.has-header-image .header-storefront.menu {
			
		}
		
		.has-header-image .header-storefront.menu.header-ticky-menu {
			
		}
				
		.has-header-image .header-storefront.header-ticky-menu .main-navigation ul.nav-menu > li > a {
			
		}
				
	}
	
	.header-border {
		border-bottom: 1px solid '.$menubar_border_color.';
	}
	
	
	#masthead .top_bar_wrapper {
	  background-color:'.$contact_bg_color.';
	  margin-bottom: 5px;
	}	
	
	.site-footer .widget-title, 
	.site-footer a, 
	.site-footer p, 
	.site-footer li,
	.site-footer h1,
	.site-footer h2,
	.site-footer h3,
	.site-footer h4,
	.site-footer h5,
	.site-footer h6,
	.site-footer .widget_calendar th,
	.site-footer .widget_calendar td,
	caption,
	.footer-widgets-area, #colophon p,
	.site-footer .site-info a,
	.site-footer .site-info {
	  color:'.$footer_text_color.';
	}
	
	
	.full-underline .section-title { 

		border-bottom: 2px solid  '.$color.';
	
	}	
	
	#masthead {
		background-color: '.$header_bg_color.';
	}
	
	.amount-cart {
    	color: #fff;
    	background: '.$link_color.';
	}
	
	.amount-cart::before {
		border-right: 7px solid '.$link_color.';
	}	
	.cart-contents span.count {
    	color: #fff;
    	background: '.$link_color.';
	}
	
	
	.header-cart-inner  .cart-contents span,
	.header-cart-inner .amount-cart {
		background-color:'.$color.';
	}
	
	.header-cart-inner  .amount-cart::before {
		border-right: 7px solid '.$color.';
	}
	
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
		border-bottom-color:  '.$color.';  
	}
	
	.woocommerce span.onsale, 
	.my-yith-wishlist .button.yith-wcqv-button::before, 
	.my-yith-wishlist .compare-button a::before,
	.my-yith-wishlist .yith-wcwl-add-button .add_to_wishlist::before,
	.my-yith-wishlist .yith-wcwl-wishlistexistsbrowse a::before, 
	.my-yith-wishlist .yith-wcwl-wishlistaddedbrowse a::before {
		background-color: '.$color.';		
	}
	
	.product-wrapper .badge-wrapper .onsale {
		background-color: '.$color.';	
	}
	
	.glyphicon-menu-left::before, 
	.glyphicon-menu-right::before {
		background-color: '.$color.';
	}

	.carousel-indicators .active {
		background-color: '.$color.';
		border: 1px solid '.$color.';
	}
	
	.carousel-control:hover .glyphicon-menu-left::before,
	.carousel-control:focus .glyphicon-menu-left::before,
	.carousel-control:hover .glyphicon-menu-right::before, 
	.carousel-control:focus .glyphicon-menu-right::before {
		background-color: '.$accent_color.';
	}	
		
		
	/*
	 * Text Color
	 */

	body {
		color: '.$text_color.';	
	} 
	
	.woocommerce ul.products li.product .price,
	.woocommerce div.product p.price, 
	.woocommerce div.product span.price {
		color: '.$text_color.';	
	}

	/* 
	 *	button color 
	 */
	 
	#masthead .login-register a {
		background-color: '.$button_color.';
		border: 2px solid '.$button_color.';	
	}

	
	#respond input[type="submit"],
	input[type="submit"] {	
		background-color: '.$button_color.';
		color: #fff;
	}
	
	.btn {
		background-color: '.$button_color.';
	}
		
	.widget_search form.search-form .search-submit, 
	.widget_search form.search-form .search-submit {
		background-color: '.$button_color.';
		color: #fff;
		padding: initial;
	}
	
	
	.backtotop {
		background-color: '.$button_color.';
		color: #fff;
	}

	
	/* hover & focus */

	
	
	#masthead .main-navigation .login-register a:hover,
	#masthead .main-navigation .login-register a:focus {
		background-color: '.$accent_color.';
		border: 2px solid '.$accent_color.';
		color: #fff;
	}
	
	#respond input[type="submit"]:hover,
	input[type="submit"]:focus {	
		background-color: '.$accent_color.';
		color: #fff;
	}
	
	.btn:focus,
	.btn:hover {
		background-color: '.$accent_color.';
		color:#fff;
	}
	
	.reply a:focus, 
	.reply a:hover {
		background-color: '.$accent_color.';
		color:#fff;	
	}
		
	.widget_search form.search-form .search-submit:focus, 
	.widget_search form.search-form .search-submit:hover {
		background-color: '.$accent_color.';

	}
	
	.backtotop:hover,
	.backtotop:focus {
		background-color: '.$accent_color.';
		color: #fff;
	}
	
	.post-edit-link:hover,
	.post-edit-link:focus {
		background-color: '.$accent_color.';
		color: #fff;	
	}
	
	/* Link Hover */
	
	a:hover,
	a:focus {
		color: '.$link_hover_color.';
		text-decoration: none;
	}

	.post-categories a:hover,
	.post-categories a:focus {
		color: '.$link_hover_color.';
		text-transform:uppercase;
	}
	
	.posted-on a:hover,
	.posted-on a:focus{
		color: '.$link_hover_color.';
	}
	
	.single .post-categories a:hover,
	.single .post-categories a:focus,
	.single .byline a:hover
	.single .byline a:focus, {
		color: '.$link_hover_color.';
	}

		
			
	/* 
	 * link color 
	 */
	
	a {
		color: '.$link_color.';
		text-decoration: none;
	}

	.post-categories a {
		color: '.$link_color.';
		text-transform:uppercase;
	}
	
	.posted-on a {
		color: '.$link_color.';
	}
	
	.single .post-categories a,
	.single .byline a {
		color: '.$link_color.';
	}

	.jetpack_subscription_widget input[type="submit"],
	.jetpack_subscription_widget button[type="submit"] {
		background-color: '.$color.';
		color: #fff;
	}

	.widget_popular_post a time,
	.widget_popular_post time,
	.widget_latest_post a time,
	.widget_latest_post time,
	.widget_featured_post a time,
	.widget_featured_post time {
		color: '.$color.';
	}
	
	.widget svg {
		fill: '.$color.';
	}
	
	.reply a {
		background-color: '.$color.';
		color: #fff;
	}

	
	.single .posted-on a {
		background-color: '.$color.';
		color: #fff;
	}
	
	
	/*
	 * Menu
	 */
	 
	.main-navigation ul#primary-menu li.current-menu-item > a,
	.main-navigation ul#primary-menu li:hover > a {
		color: '.$accent_color.';
	}


	#masthead .main-navigation ul.nav-menu > li a:hover,
	#masthead .main-navigation ul.nav-menu > li a:focus {
		color: '.$accent_color.';
		
	}

	
	.main-navigation ul.nav-menu > li a:hover svg,
	.main-navigation ul.nav-menu > li a:focus svg {
		fill: '.$accent_color.';
	}	
	
	.main-navigation ul.nav-menu > li button:hover svg,
	.main-navigation ul.nav-menu > li button:focus svg {
		fill: '.$accent_color.';
	}
	
	#masthead .main-navigation ul.nav-menu > li.login-register-item a:hover,
	#masthead .main-navigation ul.nav-menu > li.login-register-item a:focus {
		color: #fff;	
	}

	
	
	button.menu-toggle:hover svg,
	button.menu-toggle:focus svg {
		fill: '.$accent_color.';
	}	

	@media screen and (min-width: 1024px) {
		
	}
	
	
	@media screen and (max-width: 1023px) {
	
		.main-navigation ul,
		.main-navigation ul ul,
		.main-navigation ul ul ul {
			background-color: #fff;
		}
		
	}
	
	@media screen and (min-width: 1024px) {
		.main-navigation ul ul,
		.main-navigation ul ul ul {
			background-color: #fff;
		}
	}
	
	/* woo colors */
	
	.woocommerce button.button.alt.disabled,
	.woocommerce a.add_to_cart_button,
	.woocommerce a.add_to_cart_button:focus,
	.woocommerce a.product_type_grouped, 
	.woocommerce a.product_type_external, 
	.woocommerce a.product_type_simple, 
	.woocommerce a.product_type_variable,
	.woocommerce button.button.alt,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce a.button.alt,
	.woocommerce #respond input#submit,
	.woocommerce .widget_price_filter .price_slider_amount .button {
		background: '.$color.';
		color:#fff;
		text-decoration: none;
	}	
		
	
	.woocommerce button.button.alt.disabled:hover,
	.woocommerce button.button.alt.disabled:focus,
	
	.woocommerce a.button:hover,
	.woocommerce a.button:focus,
	
	.woocommerce button.button:hover,
	.woocommerce button.button:focus,
	
	.woocommerce div.product form.cart .button:hover,
	.woocommerce div.product form.cart .button:focus,
	
	.woocommerce a.button.alt:hover,
	.woocommerce a.button.alt:focus {
		background-color: '.$accent_color.';
		color: #fff;
	}
	
	.woocommerce button.button.alt:hover,
	.woocommerce button.button.alt:focus {
		background-color: '.$accent_color.';
		color: #fff;
	}

	';
	
	if ($two_colum_checkout) {
	
		$css = $css.'
		
		/* Checkout Formating */
	
		
		.woocommerce-page.woocommerce-checkout form.checkout.woocommerce-checkout:after,
		.woocommerce.woocommerce-checkout form.checkout.woocommerce-checkout:after {
			content: "";
			clear: both;
			display: table
		}
		
		.woocommerce-page.woocommerce-checkout table.shop_table thead,
		.woocommerce.woocommerce-checkout table.shop_table thead {
			background: 0 0
		}
		
		.woocommerce-page.woocommerce-checkout table.shop_table th,
		.woocommerce.woocommerce-checkout table.shop_table th {
			padding: 14px 12px
		}
		
		.woocommerce-page.woocommerce-checkout table.shop_table td,
		.woocommerce.woocommerce-checkout table.shop_table td {
			padding: 10px 10px 10px 0;
			border-color: #ebebeb;
			opacity: .8
		}
		
		.woocommerce-page.woocommerce-checkout table.shop_table tfoot td,
		.woocommerce.woocommerce-checkout table.shop_table tfoot td {
			opacity: 1
		}
		
		.woocommerce-page.woocommerce-checkout table.shop_table td,
		.woocommerce-page.woocommerce-checkout table.shop_table th,
		.woocommerce.woocommerce-checkout table.shop_table td,
		.woocommerce.woocommerce-checkout table.shop_table th {
			border-bottom-width: 1px
		}
		
		.woocommerce-page.woocommerce-checkout #customer_details h3,
		.woocommerce.woocommerce-checkout #customer_details h3 {
			font-size: 1.2rem;
			padding: 20px 0 14px;
			margin: 0 0 20px;
			border-bottom: 1px solid #ebebeb
		}
		
		.woocommerce-page.woocommerce-checkout form #order_review_heading,
		.woocommerce.woocommerce-checkout form #order_review_heading {
			border-width: 2px 2px 0 2px;
			border-style: solid;
			font-size: 1.2rem;
			margin: 0;
			padding: 1.5em 1.5em 1em;
			border-color: #ebebeb
		}
		
		@media (min-width:769px) {
			.woocommerce-page.woocommerce-checkout form #customer_details.col2-set,
			.woocommerce.woocommerce-checkout form #customer_details.col2-set {
				width: 55%;
				float: left;
				margin-right: 4.347826087%
			}
			.woocommerce-page.woocommerce-checkout form #customer_details.col2-set .col-1,
			.woocommerce-page.woocommerce-checkout form #customer_details.col2-set .col-2,
			.woocommerce.woocommerce-checkout form #customer_details.col2-set .col-1,
			.woocommerce.woocommerce-checkout form #customer_details.col2-set .col-2 {
				float: none;
				width: auto
			}
		}
		
		.woocommerce-page.woocommerce-checkout form #order_review,
		.woocommerce.woocommerce-checkout form #order_review {
			padding: 0 1em;
			border-width: 0 2px 2px;
			border-style: solid;
			border-color: #ebebeb
		}
		
		.woocommerce-page.woocommerce-checkout form #order_review table,
		.woocommerce.woocommerce-checkout form #order_review table {
			border-width: 0
		}
		
		.woocommerce-page.woocommerce-checkout form #order_review td,
		.woocommerce-page.woocommerce-checkout form #order_review th,
		.woocommerce.woocommerce-checkout form #order_review td,
		.woocommerce.woocommerce-checkout form #order_review th {
			border-top: 0;
			border-right: 0;
			padding-left: 0;
			border-color: #ebebeb
		}
		
		@media (min-width:769px) {
			.woocommerce-page.woocommerce-checkout form #order_review,
			.woocommerce-page.woocommerce-checkout form #order_review_heading,
			.woocommerce.woocommerce-checkout form #order_review,
			.woocommerce.woocommerce-checkout form #order_review_heading {
				width: 40%;
				float: right;
				margin-right: 0;
				clear: right
			}
		}
		
		.woocommerce-page.woocommerce-checkout form .form-row:last-child,
		.woocommerce.woocommerce-checkout form .form-row:last-child {
			margin-bottom: 0
		}
		
		.woocommerce-page.woocommerce-checkout #payment,
		.woocommerce.woocommerce-checkout #payment {
			border-radius: 0
		}
		
		.woocommerce-page.woocommerce-checkout #payment ul.payment_methods,
		.woocommerce.woocommerce-checkout #payment ul.payment_methods {
			padding: 5px;
			margin-bottom: 1em;
			border-bottom: 0
		}
		
		.woocommerce-page.woocommerce-checkout #payment div.payment_box,
		.woocommerce.woocommerce-checkout #payment div.payment_box {
			background-color: #efefef
		}
		
		.woocommerce-page.woocommerce-checkout #payment div.payment_box:before,
		.woocommerce.woocommerce-checkout #payment div.payment_box:before {
			border-bottom-color: #efefef
		}
		
		.woocommerce-page.woocommerce-checkout #payment div.form-row,
		.woocommerce.woocommerce-checkout #payment div.form-row {
			padding: 0 0 2em
		}
		
		.woocommerce-page.woocommerce-checkout #payment div.form-row {
			padding: 0 1em 2em;
			background-color: transparent;
			margin-bottom: 15px;
		}
		
		.woocommerce-page.woocommerce-checkout #payment #place_order,
		.woocommerce.woocommerce-checkout #payment #place_order {
			width: 100%
		}
		
		.woocommerce-page.woocommerce-checkout .woocommerce-order table.shop_table td,
		.woocommerce-page.woocommerce-checkout .woocommerce-order table.shop_table th,
		.woocommerce.woocommerce-checkout .woocommerce-order table.shop_table td,
		.woocommerce.woocommerce-checkout .woocommerce-order table.shop_table th {
			padding: .7em 1em;
			border-bottom-width: 0
		}
		
		.woocommerce-page.woocommerce-checkout .woocommerce-order table.shop_table td:last-child,
		.woocommerce-page.woocommerce-checkout .woocommerce-order table.shop_table th:last-child,
		.woocommerce.woocommerce-checkout .woocommerce-order table.shop_table td:last-child,
		.woocommerce.woocommerce-checkout .woocommerce-order table.shop_table th:last-child {
			border-right-width: 0
		}
		
		.woocommerce-page.woocommerce-checkout .woocommerce-order h2.woocommerce-column__title,
		.woocommerce-page.woocommerce-checkout .woocommerce-order h2.woocommerce-order-details__title,
		.woocommerce.woocommerce-checkout .woocommerce-order h2.woocommerce-column__title,
		.woocommerce.woocommerce-checkout .woocommerce-order h2.woocommerce-order-details__title {
			background: #fbfbfb;
			padding: 1em;
			margin-bottom: 0;
			font-size: 1.3rem;
			border-width: 1px 1px 0 1px;
			border-style: solid;
			border-color: #e5e5e5
		}
		
		.woocommerce-page.woocommerce-checkout .woocommerce-order h2.wc-bacs-bank-details-heading,
		.woocommerce.woocommerce-checkout .woocommerce-order h2.wc-bacs-bank-details-heading {
			font-size: 1.5rem;
			border-top: 3px solid #ebebeb;
			padding-top: .5em
		}
		
		.woocommerce-page.woocommerce-checkout .woocommerce-order h3,
		.woocommerce.woocommerce-checkout .woocommerce-order h3 {
			font-size: 1.1rem
		}
		
		.woocommerce-page.woocommerce-checkout .woocommerce-order ul.order_details,
		.woocommerce.woocommerce-checkout .woocommerce-order ul.order_details {
			margin-bottom: 2em
		}
		
		.woocommerce-page.woocommerce-checkout .woocommerce-customer-details address,
		.woocommerce.woocommerce-checkout .woocommerce-customer-details address {
			border-right-width: 1px;
			border-bottom-width: 1px;
			border-radius: 0
		}
		
		.woocommerce form .form-row .required {
			text-decoration: none
		}
		
		.woocommerce form.checkout_coupon {
			margin: 0;
			border: 0;
			padding: 0 0 2em
		}
		
		@media (min-width:769px) {
			.woocommerce form.checkout_coupon {
				width: 50%
			}
		}
		
		.woocommerce form.checkout_coupon .form-row {
			margin: 0;
			padding: 0;
			float: none;
			display: inline-block
		}
		
		.woocommerce form.checkout_coupon [name=coupon_code] {
			padding-top: 9px;
			padding-bottom: 9px
		}
		
		.woocommerce form.checkout_coupon .button {
			padding: .5em 1em;
			vertical-align: initial;
			line-height: 1.35
		}
		
		.woocommerce form.checkout_coupon .button[name=apply_coupon] {
			padding: 10px 40px
		}
		
		@media (max-width:420px) {
			.woocommerce form.checkout_coupon .form-row-first,
			.woocommerce form.checkout_coupon .form-row-last {
				display: block;
				margin: 0 auto;
				width: 100%
			}
			.woocommerce form.checkout_coupon .form-row-first {
				margin-bottom: 10px
			}
			.woocommerce form.checkout_coupon .button[name=apply_coupon] {
				width: 100%;
				padding: 10px 5px
			}
		}
		
		.checkout_coupon .input-text {
			padding: .5em .75em
		}
		
		.woocommerce-checkout #payment {
			background: #ebe9eb00;
			border-top: 2px solid #ebebeb;
		}
		
		.woocommerce-page.woocommerce-checkout th.product-name,
		.woocommerce-page.woocommerce-checkout th.product-total {
			border-bottom: 1px solid #ebebeb;
		}
		
		.woocommerce-page.woocommerce-checkout form #order_review_heading {
			text-transform: uppercase;
			text-align: center;
		}
	
	
	';
	
	}
	
	
	return $css;
	

}
