<?php

	$vw_sports_custom_css= "";

	$vw_sports_first_color = get_theme_mod('vw_sports_first_color');

	if($vw_sports_first_color != false){
		$vw_sports_custom_css .='#header, .main-navigation ul.sub-menu>li>a:before, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .more-btn a:before, .more-btn a,#comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, #footer-2, .scrollup i, #sidebar h3, .pagination span, .pagination a, .widget_product_search button, .woocommerce span.onsale, #preloader, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label{';
			$vw_sports_custom_css .='background-color: '.esc_attr($vw_sports_first_color).';';
		$vw_sports_custom_css .='}';
	}

	if($vw_sports_first_color != false){
		$vw_sports_custom_css .='a, .tab button:hover,button.tablinks.active, #footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce ul.products li.product .price, .slider-inner-box h1 a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a{';
			$vw_sports_custom_css .='color: '.esc_attr($vw_sports_first_color).';';
		$vw_sports_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_sports_theme_lay = get_theme_mod( 'vw_sports_width_option','Full Width');
    if($vw_sports_theme_lay == 'Boxed'){
		$vw_sports_custom_css .='body{';
			$vw_sports_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#slider .carousel-caption{';
			$vw_sports_custom_css .='right: 30% !important; left:20% !important';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.logo-inner{';
			$vw_sports_custom_css .='margin-left: 20%;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='right: 100px;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.scrollup.left i{';
			$vw_sports_custom_css .='left: 100px;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_theme_lay == 'Wide Width'){
		$vw_sports_custom_css .='body{';
			$vw_sports_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='right: 30px;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.scrollup.left i{';
			$vw_sports_custom_css .='left: 30px;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_theme_lay == 'Full Width'){
		$vw_sports_custom_css .='body{';
			$vw_sports_custom_css .='max-width: 100%;';
		$vw_sports_custom_css .='}';
	}

	/*------------------ Slider Content Layout -------------------*/

	$vw_sports_theme_lay = get_theme_mod( 'vw_sports_slider_content_option','Left');
    if($vw_sports_theme_lay == 'Left'){
		$vw_sports_custom_css .='#slider .carousel-caption{';
			$vw_sports_custom_css .='text-align:left; right: 55%; left:20%';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#slider .more-btn{';
			$vw_sports_custom_css .='margin: 40px auto 0 15px;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_theme_lay == 'Center'){
		$vw_sports_custom_css .='#slider .carousel-caption{';
			$vw_sports_custom_css .='text-align:center; right: 30%; left: 30%;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#slider .more-btn{';
			$vw_sports_custom_css .='margin: 40px auto 0 auto;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_theme_lay == 'Right'){
		$vw_sports_custom_css .='#slider .carousel-caption{';
			$vw_sports_custom_css .='text-align:right; right: 20%; left: 45%;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#slider .more-btn{';
			$vw_sports_custom_css .='margin: 40px 15px 0 auto;';
		$vw_sports_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_sports_slider_content_padding_top_bottom = get_theme_mod('vw_sports_slider_content_padding_top_bottom');
	$vw_sports_slider_content_padding_left_right = get_theme_mod('vw_sports_slider_content_padding_left_right');
	if($vw_sports_slider_content_padding_top_bottom != false || $vw_sports_slider_content_padding_left_right != false){
		$vw_sports_custom_css .='#slider .carousel-caption{';
			$vw_sports_custom_css .='top: '.esc_attr($vw_sports_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_sports_slider_content_padding_top_bottom).';left: '.esc_attr($vw_sports_slider_content_padding_left_right).';right: '.esc_attr($vw_sports_slider_content_padding_left_right).';';
		$vw_sports_custom_css .='}';
	}

	/*--------------------------- Menus settings -------------------*/

	$vw_sports_navigation_menu_font_size = get_theme_mod('vw_sports_navigation_menu_font_size');
	if($vw_sports_navigation_menu_font_size != false){
		$vw_sports_custom_css .='.main-navigation a{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_navigation_menu_font_size).';';
		$vw_sports_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_sports_slider = get_theme_mod('vw_sports_slider_arrows');
	if($vw_sports_slider == false){
		$vw_sports_custom_css .='.home-page-header, .page-template-custom-home-page .homepageheader{';
			$vw_sports_custom_css .='padding:25px 0 0;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.admin-bar .home-page-header, .page-template-custom-home-page.admin-bar .homepageheader{';
			$vw_sports_custom_css .='padding:50px 0 0;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.admin-bar .home-page-header{';
			$vw_sports_custom_css .='margin-top: 0px;';
		$vw_sports_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_sports_resp_slider = get_theme_mod( 'vw_sports_resp_slider_hide_show',false);
	if($vw_sports_resp_slider == true && get_theme_mod( 'vw_sports_slider_arrows', false) == false){
    	$vw_sports_custom_css .='#slider{';
			$vw_sports_custom_css .='display:none;';
		$vw_sports_custom_css .='} ';
	}
    if($vw_sports_resp_slider == true){
    	$vw_sports_custom_css .='@media screen and (max-width:575px) {';
		$vw_sports_custom_css .='#slider{';
			$vw_sports_custom_css .='display:block;';
		$vw_sports_custom_css .='} }';
	}else if($vw_sports_resp_slider == false){
		$vw_sports_custom_css .='@media screen and (max-width:575px) {';
		$vw_sports_custom_css .='#slider{';
			$vw_sports_custom_css .='display:none;';
		$vw_sports_custom_css .='} }';
		$vw_sports_custom_css .='@media screen and (max-width:575px){';
			$vw_sports_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
				$vw_sports_custom_css .='margin-top: 45px;';
			$vw_sports_custom_css .='} }';
	}

	$vw_sports_resp_sidebar = get_theme_mod( 'vw_sports_sidebar_hide_show',true);
    if($vw_sports_resp_sidebar == true){
    	$vw_sports_custom_css .='@media screen and (max-width:575px) {';
		$vw_sports_custom_css .='#sidebar{';
			$vw_sports_custom_css .='display:block;';
		$vw_sports_custom_css .='} }';
	}else if($vw_sports_resp_sidebar == false){
		$vw_sports_custom_css .='@media screen and (max-width:575px) {';
		$vw_sports_custom_css .='#sidebar{';
			$vw_sports_custom_css .='display:none;';
		$vw_sports_custom_css .='} }';
	}

	$vw_sports_resp_scroll_top = get_theme_mod( 'vw_sports_resp_scroll_top_hide_show',true);
	if($vw_sports_resp_scroll_top == true && get_theme_mod( 'vw_sports_hide_show_scroll',true) == false){
    	$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='visibility:hidden !important;';
		$vw_sports_custom_css .='} ';
	}
    if($vw_sports_resp_scroll_top == true){
    	$vw_sports_custom_css .='@media screen and (max-width:575px) {';
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='visibility:visible !important;';
		$vw_sports_custom_css .='} }';
	}else if($vw_sports_resp_scroll_top == false){
		$vw_sports_custom_css .='@media screen and (max-width:575px){';
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='visibility:hidden !important;';
		$vw_sports_custom_css .='} }';
	}

	/*---------------- Posts Settings ------------------*/

	$vw_sports_featured_image_border_radius = get_theme_mod('vw_sports_featured_image_border_radius', 0);
	if($vw_sports_featured_image_border_radius != false){
		$vw_sports_custom_css .='.box-image img, .feature-box img{';
			$vw_sports_custom_css .='border-radius: '.esc_attr($vw_sports_featured_image_border_radius).'px;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_featured_image_box_shadow = get_theme_mod('vw_sports_featured_image_box_shadow',0);
	if($vw_sports_featured_image_box_shadow != false){
		$vw_sports_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_sports_custom_css .='box-shadow: '.esc_attr($vw_sports_featured_image_box_shadow).'px '.esc_attr($vw_sports_featured_image_box_shadow).'px '.esc_attr($vw_sports_featured_image_box_shadow).'px #cccccc;';
		$vw_sports_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_sports_button_border_radius = get_theme_mod('vw_sports_button_border_radius');
	if($vw_sports_button_border_radius != false){
		$vw_sports_custom_css .='.post-main-box .more-btn a{';
			$vw_sports_custom_css .='border-radius: '.esc_attr($vw_sports_button_border_radius).'px;';
		$vw_sports_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_sports_footer_background_color = get_theme_mod('vw_sports_footer_background_color');
	if($vw_sports_footer_background_color != false){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='background-color: '.esc_attr($vw_sports_footer_background_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_copyright_font_size = get_theme_mod('vw_sports_copyright_font_size');
	if($vw_sports_copyright_font_size != false){
		$vw_sports_custom_css .='.copyright p{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_copyright_font_size).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_copyright_alignment = get_theme_mod('vw_sports_copyright_alignment');
	if($vw_sports_copyright_alignment != false){
		$vw_sports_custom_css .='.copyright p{';
			$vw_sports_custom_css .='text-align: '.esc_attr($vw_sports_copyright_alignment).';';
		$vw_sports_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$vw_sports_single_blog_comment_title = get_theme_mod('vw_sports_single_blog_comment_title', 'Leave a Reply');
	if($vw_sports_single_blog_comment_title == ''){
		$vw_sports_custom_css .='#comments h2#reply-title {';
			$vw_sports_custom_css .='display: none;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_single_blog_comment_button_text = get_theme_mod('vw_sports_single_blog_comment_button_text', 'Post Comment');
	if($vw_sports_single_blog_comment_button_text == ''){
		$vw_sports_custom_css .='#comments p.form-submit {';
			$vw_sports_custom_css .='display: none;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_comment_width = get_theme_mod('vw_sports_single_blog_comment_width');
	if($vw_sports_comment_width != false){
		$vw_sports_custom_css .='#comments textarea{';
			$vw_sports_custom_css .='width: '.esc_attr($vw_sports_comment_width).';';
		$vw_sports_custom_css .='}';
	}

	/*------------------ Woocommerce Settings -------------------*/

	$vw_sports_products_btn_padding_top_bottom = get_theme_mod('vw_sports_products_btn_padding_top_bottom');
	if($vw_sports_products_btn_padding_top_bottom != false){
		$vw_sports_custom_css .='.woocommerce a.button{';
			$vw_sports_custom_css .='padding-top: '.esc_attr($vw_sports_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_sports_products_btn_padding_top_bottom).' !important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_products_btn_padding_left_right = get_theme_mod('vw_sports_products_btn_padding_left_right');
	if($vw_sports_products_btn_padding_left_right != false){
		$vw_sports_custom_css .='.woocommerce a.button{';
			$vw_sports_custom_css .='padding-left: '.esc_attr($vw_sports_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_sports_products_btn_padding_left_right).' !important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_products_button_border_radius = get_theme_mod('vw_sports_products_button_border_radius', 0);
	if($vw_sports_products_button_border_radius != false){
		$vw_sports_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_sports_custom_css .='border-radius: '.esc_attr($vw_sports_products_button_border_radius).'px;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_woocommerce_sale_font_size = get_theme_mod('vw_sports_woocommerce_sale_font_size');
	if($vw_sports_woocommerce_sale_font_size != false){
		$vw_sports_custom_css .='.woocommerce span.onsale{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_woocommerce_sale_font_size).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_woocommerce_sale_position = get_theme_mod( 'vw_sports_woocommerce_sale_position','left');
    if($vw_sports_woocommerce_sale_position == 'left'){
		$vw_sports_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_sports_custom_css .='left: 0px !important; right: auto !important;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_woocommerce_sale_position == 'right'){
		$vw_sports_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_sports_custom_css .='left: auto !important; right: 0 !important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_woocommerce_sale_padding_top_bottom = get_theme_mod('vw_sports_woocommerce_sale_padding_top_bottom');
	if($vw_sports_woocommerce_sale_padding_top_bottom != false){
		$vw_sports_custom_css .='.woocommerce span.onsale{';
			$vw_sports_custom_css .='padding-top: '.esc_attr($vw_sports_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_sports_woocommerce_sale_padding_top_bottom).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_woocommerce_sale_padding_left_right = get_theme_mod('vw_sports_woocommerce_sale_padding_left_right');
	if($vw_sports_woocommerce_sale_padding_left_right != false){
		$vw_sports_custom_css .='.woocommerce span.onsale{';
			$vw_sports_custom_css .='padding-left: '.esc_attr($vw_sports_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($vw_sports_woocommerce_sale_padding_left_right).';';
		$vw_sports_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_sports_site_title_font_size = get_theme_mod('vw_sports_site_title_font_size');
	if($vw_sports_site_title_font_size != false){
		$vw_sports_custom_css .='.logo-inner p.site-title, .logo-inner h1{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_site_title_font_size).';';
		$vw_sports_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_sports_site_tagline_font_size = get_theme_mod('vw_sports_site_tagline_font_size');
	if($vw_sports_site_tagline_font_size != false){
		$vw_sports_custom_css .='.logo-inner p.site-description{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_site_tagline_font_size).';';
		$vw_sports_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_sports_preloader_bg_color = get_theme_mod('vw_sports_preloader_bg_color');
	if($vw_sports_preloader_bg_color != false){
		$vw_sports_custom_css .='#preloader{';
			$vw_sports_custom_css .='background-color: '.esc_attr($vw_sports_preloader_bg_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_preloader_border_color = get_theme_mod('vw_sports_preloader_border_color');
	if($vw_sports_preloader_border_color != false){
		$vw_sports_custom_css .='.loader-line{';
			$vw_sports_custom_css .='border-color: '.esc_attr($vw_sports_preloader_border_color).'!important;';
		$vw_sports_custom_css .='}';
	}