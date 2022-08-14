<?php

	$storefront_ecommerce_custom_css ='';

	/*----------- Global First Color -----------*/
	$storefront_ecommerce_first_color = get_theme_mod('storefront_ecommerce_first_color');

	$storefront_ecommerce_custom_css .='input[type="submit"]:hover, #sidebar button, .slide-button i, .appointbtn, .primary-navigation ul ul a, .primary-navigation ul ul a, .postbtn i, .blog-section .section-title a:after, .page-content .read-moresec a.button:hover, #comments input[type="submit"].submit:hover, #comments a.comment-reply-link, #sidebar h3:after, #sidebar input[type="submit"]:hover, #sidebar .tagcloud a:hover, .widget_calendar tbody a, .copyright-wrapper, .footer-wp h3:after, .footer-wp input[type="submit"], .footer-wp .tagcloud a:hover , .pagination a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #navbar-header .socialbox, #navbar-header .socialbox, #scrollbutton, #sidebar button, .footer-wp button, .tags a:hover, .bottom-header,.frame, .header-search button[type="submit"], #slider .more-btn a, .postbtn a, #scrollbutton, #sidebar input[type="submit"], input[type="submit"],.nav-previous a, nav.navigation.post-navigation a:hover, #comments input[type="submit"].submit, .nav-next a, .woocommerce button.button, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .metabox .fa-calendar-alt:before, .metabox .fa-user:before, .metabox .fa-comments:before, .metabox .fa-clock:before, .pagination .current, #sidebar ul li:before{';
			$storefront_ecommerce_custom_css .='background-color: '.esc_attr($storefront_ecommerce_first_color).';';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_custom_css .='a, #header .socialbox i:hover, .metabox a:hover, .nav-previous a ,.nav-next a, p.logged-in-as a, nav.navigation.post-navigation a:hover, #sidebar ul li a:hover, .footer-wp li a:hover, h2.entry-title, h2.page-title, #project i, .woocommerce-message::before, .woocommerce-info a, td.product-name a, a.shipping-calculator-button, span.posted_in a, code, .topbar a:hover, #comments p a:hover, .entry-content a,.footer-wp h3, .new-text p a,  #sidebar .textwidget p a, #sidebar .textwidget p a:hover, #sidebar h3, .widget_calendar caption, #sidebar h3.widget-title a.rsswidget, a:hover, .metabox span i, .woocommerce .quantity .qty, td.product-name a:hover{';
			$storefront_ecommerce_custom_css .='color: '.esc_attr($storefront_ecommerce_first_color).';';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_custom_css .='.page-content .read-moresec a.button:hover, #scrollbutton, input[type="search"], .related-inner-box, #sidebar input[type="search"], .woocommerce .quantity .qty, .woocommerce ul.products li.product:hover, .woocommerce ul.products li.product:hover img{';
			$storefront_ecommerce_custom_css .='border-color: '.esc_attr($storefront_ecommerce_first_color).';';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_custom_css .='.woocommerce-message{';
		$storefront_ecommerce_custom_css .='border-top-color: '.esc_attr($storefront_ecommerce_first_color).';';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_custom_css .='.main-menu-navigation a:focus, a.closebtn:focus{';
		$storefront_ecommerce_custom_css .='border-bottom-color: '.esc_attr($storefront_ecommerce_first_color).'!important;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_custom_css .='.main-menu-navigation a:focus, a.closebtn:focus{';
		$storefront_ecommerce_custom_css .='outline-color: '.esc_attr($storefront_ecommerce_first_color).'!important;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_custom_css .='#scrollbutton {';
		$storefront_ecommerce_custom_css .='box-shadow: inset 0px 0px 0px '.esc_attr($storefront_ecommerce_first_color).', 0px 5px 0px 0px '.esc_attr($storefront_ecommerce_first_color).', 0px 5px 4px #000;';
	$storefront_ecommerce_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$storefront_ecommerce_theme_lay = get_theme_mod( 'storefront_ecommerce_width_layout_options','Default');
    if($storefront_ecommerce_theme_lay == 'Default'){
		$storefront_ecommerce_custom_css .='body{';
			$storefront_ecommerce_custom_css .='max-width: 100%;';
		$storefront_ecommerce_custom_css .='}';
	}else if($storefront_ecommerce_theme_lay == 'Container Layout'){
		$storefront_ecommerce_custom_css .='body{';
			$storefront_ecommerce_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$storefront_ecommerce_custom_css .='}';
	}else if($storefront_ecommerce_theme_lay == 'Box Layout'){
		$storefront_ecommerce_custom_css .='body{';
			$storefront_ecommerce_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$storefront_ecommerce_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$storefront_ecommerce_theme_lay = get_theme_mod( 'storefront_ecommerce_slider_content_layout','Left');
    if($storefront_ecommerce_theme_lay == 'Left'){
		$storefront_ecommerce_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$storefront_ecommerce_custom_css .='text-align:left;';
		$storefront_ecommerce_custom_css .='}';
	}else if($storefront_ecommerce_theme_lay == 'Center'){
		$storefront_ecommerce_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn{';
			$storefront_ecommerce_custom_css .='text-align:center; ';
		$storefront_ecommerce_custom_css .='}';
	}else if($storefront_ecommerce_theme_lay == 'Right'){
		$storefront_ecommerce_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$storefront_ecommerce_custom_css .='text-align:right;';
		$storefront_ecommerce_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$storefront_ecommerce_footer_text_align = get_theme_mod('storefront_ecommerce_footer_text_align');
	$storefront_ecommerce_custom_css .='.copyright-wrapper{';
		$storefront_ecommerce_custom_css .='text-align: '.esc_attr($storefront_ecommerce_footer_text_align).';';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_footer_text_padding = get_theme_mod('storefront_ecommerce_footer_text_padding');
	$storefront_ecommerce_custom_css .='.copyright-wrapper{';
		$storefront_ecommerce_custom_css .='padding-top: '.esc_attr($storefront_ecommerce_footer_text_padding).'px; padding-bottom: '.esc_attr($storefront_ecommerce_footer_text_padding).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_footer_bg_color = get_theme_mod('storefront_ecommerce_footer_bg_color');
	$storefront_ecommerce_custom_css .='.footer-wp{';
		$storefront_ecommerce_custom_css .='background-color: '.esc_attr($storefront_ecommerce_footer_bg_color).';';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_footer_bg_image = get_theme_mod('storefront_ecommerce_footer_bg_image');
	if($storefront_ecommerce_footer_bg_image != false){
		$storefront_ecommerce_custom_css .='.footer-wp{';
			$storefront_ecommerce_custom_css .='background: url('.esc_attr($storefront_ecommerce_footer_bg_image).');';
		$storefront_ecommerce_custom_css .='}';
	}

	$storefront_ecommerce_copyright_text_font_size = get_theme_mod('storefront_ecommerce_copyright_text_font_size', 15);
	$storefront_ecommerce_custom_css .='.copyright-wrapper p, .copyright-wrapper a{';
		$storefront_ecommerce_custom_css .='font-size: '.esc_attr($storefront_ecommerce_copyright_text_font_size).'px;';
	$storefront_ecommerce_custom_css .='}';

	/*------------- Back to Top  -------------------*/
	$storefront_ecommerce_back_to_top_border_radius = get_theme_mod('storefront_ecommerce_back_to_top_border_radius');
	$storefront_ecommerce_custom_css .='#scrollbutton {';
		$storefront_ecommerce_custom_css .='border-radius: '.esc_attr($storefront_ecommerce_back_to_top_border_radius).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_scroll_icon_font_size = get_theme_mod('storefront_ecommerce_scroll_icon_font_size', 22);
	$storefront_ecommerce_custom_css .='#scrollbutton {';
		$storefront_ecommerce_custom_css .='font-size: '.esc_attr($storefront_ecommerce_scroll_icon_font_size).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_top_bottom_scroll_padding = get_theme_mod('storefront_ecommerce_top_bottom_scroll_padding', 7);
	$storefront_ecommerce_custom_css .='#scrollbutton {';
		$storefront_ecommerce_custom_css .='padding-top: '.esc_attr($storefront_ecommerce_top_bottom_scroll_padding).'px; padding-bottom: '.esc_attr($storefront_ecommerce_top_bottom_scroll_padding).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_left_right_scroll_padding = get_theme_mod('storefront_ecommerce_left_right_scroll_padding', 17);
	$storefront_ecommerce_custom_css .='#scrollbutton {';
		$storefront_ecommerce_custom_css .='padding-left: '.esc_attr($storefront_ecommerce_left_right_scroll_padding).'px; padding-right: '.esc_attr($storefront_ecommerce_left_right_scroll_padding).'px;';
	$storefront_ecommerce_custom_css .='}';

	/*-------------- Post Button  -------------------*/
	$storefront_ecommerce_post_button_padding_top = get_theme_mod('storefront_ecommerce_post_button_padding_top');
	$storefront_ecommerce_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$storefront_ecommerce_custom_css .='padding-top: '.esc_attr($storefront_ecommerce_post_button_padding_top).'px; padding-bottom: '.esc_attr($storefront_ecommerce_post_button_padding_top).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_post_button_padding_right = get_theme_mod('storefront_ecommerce_post_button_padding_right');
	$storefront_ecommerce_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$storefront_ecommerce_custom_css .='padding-left: '.esc_attr($storefront_ecommerce_post_button_padding_right).'px; padding-right: '.esc_attr($storefront_ecommerce_post_button_padding_right).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_post_button_border_radius = get_theme_mod('storefront_ecommerce_post_button_border_radius');
	$storefront_ecommerce_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$storefront_ecommerce_custom_css .='border-radius: '.esc_attr($storefront_ecommerce_post_button_border_radius).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_post_comment_enable = get_theme_mod('storefront_ecommerce_post_comment_enable',true);
	if($storefront_ecommerce_post_comment_enable == false){
		$storefront_ecommerce_custom_css .='#comments{';
			$storefront_ecommerce_custom_css .='display: none;';
		$storefront_ecommerce_custom_css .='}';
	}

	/*----------- Preloader Color Option  ----------------*/
	$storefront_ecommerce_preloader_bg_color_option = get_theme_mod('storefront_ecommerce_preloader_bg_color_option');
	$storefront_ecommerce_preloader_icon_color_option = get_theme_mod('storefront_ecommerce_preloader_icon_color_option');
	$storefront_ecommerce_custom_css .='.frame{';
		$storefront_ecommerce_custom_css .='background-color: '.esc_attr($storefront_ecommerce_preloader_bg_color_option).';';
	$storefront_ecommerce_custom_css .='}';
	$storefront_ecommerce_custom_css .='.dot-1,.dot-2,.dot-3{';
		$storefront_ecommerce_custom_css .='background-color: '.esc_attr($storefront_ecommerce_preloader_icon_color_option).';';
	$storefront_ecommerce_custom_css .='}';

	// preloader type
	$storefront_ecommerce_theme_lay = get_theme_mod( 'storefront_ecommerce_preloader_type','First Preloader Type');
    if($storefront_ecommerce_theme_lay == 'First Preloader Type'){
		$storefront_ecommerce_custom_css .='.dot-1, .dot-2, .dot-3{';
			$storefront_ecommerce_custom_css .='';
		$storefront_ecommerce_custom_css .='}';
	}else if($storefront_ecommerce_theme_lay == 'Second Preloader Type'){
		$storefront_ecommerce_custom_css .='.dot-1, .dot-2, .dot-3{';
			$storefront_ecommerce_custom_css .='border-radius:0;';
		$storefront_ecommerce_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$storefront_ecommerce_theme_lay = get_theme_mod( 'storefront_ecommerce_background_skin','Without Background');
    if($storefront_ecommerce_theme_lay == 'With Background'){
		$storefront_ecommerce_custom_css .='.inner-service,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$storefront_ecommerce_custom_css .='background-color: #fff; padding:20px;';
		$storefront_ecommerce_custom_css .='}';
		$storefront_ecommerce_custom_css .='.login-box a{';
			$storefront_ecommerce_custom_css .='background-color: #fff;';
		$storefront_ecommerce_custom_css .='}';
	}else if($storefront_ecommerce_theme_lay == 'Without Background'){
		$storefront_ecommerce_custom_css .='{';
			$storefront_ecommerce_custom_css .='background-color: transparent;';
		$storefront_ecommerce_custom_css .='}';
	}

	/*-------------- Woocommerce Button  -------------------*/
	$storefront_ecommerce_woocommerce_button_padding_top = get_theme_mod('storefront_ecommerce_woocommerce_button_padding_top',12);
	$storefront_ecommerce_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$storefront_ecommerce_custom_css .='padding-top: '.esc_attr($storefront_ecommerce_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($storefront_ecommerce_woocommerce_button_padding_top).'px;';
	$storefront_ecommerce_custom_css .='}';
	

	$storefront_ecommerce_woocommerce_button_padding_right = get_theme_mod('storefront_ecommerce_woocommerce_button_padding_right',15);
	$storefront_ecommerce_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$storefront_ecommerce_custom_css .='padding-left: '.esc_attr($storefront_ecommerce_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($storefront_ecommerce_woocommerce_button_padding_right).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_woocommerce_button_border_radius = get_theme_mod('storefront_ecommerce_woocommerce_button_border_radius',0);
	$storefront_ecommerce_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.added_to_cart{';
		$storefront_ecommerce_custom_css .='border-radius: '.esc_attr($storefront_ecommerce_woocommerce_button_border_radius).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_related_product_enable = get_theme_mod('storefront_ecommerce_related_product_enable',true);
	if($storefront_ecommerce_related_product_enable == false){
		$storefront_ecommerce_custom_css .='.related.products{';
			$storefront_ecommerce_custom_css .='display: none;';
		$storefront_ecommerce_custom_css .='}';
	}

	$storefront_ecommerce_woocommerce_product_border_enable = get_theme_mod('storefront_ecommerce_woocommerce_product_border_enable',true);
	if($storefront_ecommerce_woocommerce_product_border_enable == false){
		$storefront_ecommerce_custom_css .='.products li{';
			$storefront_ecommerce_custom_css .='border: none;';
		$storefront_ecommerce_custom_css .='}';
	}

	$storefront_ecommerce_woocommerce_product_padding_top = get_theme_mod('storefront_ecommerce_woocommerce_product_padding_top',0);
	$storefront_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$storefront_ecommerce_custom_css .='padding-top: '.esc_attr($storefront_ecommerce_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($storefront_ecommerce_woocommerce_product_padding_top).'px !important;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_woocommerce_product_padding_right = get_theme_mod('storefront_ecommerce_woocommerce_product_padding_right',0);
	$storefront_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$storefront_ecommerce_custom_css .='padding-left: '.esc_attr($storefront_ecommerce_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($storefront_ecommerce_woocommerce_product_padding_right).'px !important;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_woocommerce_product_border_radius = get_theme_mod('storefront_ecommerce_woocommerce_product_border_radius',3);
	$storefront_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$storefront_ecommerce_custom_css .='border-radius: '.esc_attr($storefront_ecommerce_woocommerce_product_border_radius).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_woocommerce_product_box_shadow = get_theme_mod('storefront_ecommerce_woocommerce_product_box_shadow', 0);
	$storefront_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$storefront_ecommerce_custom_css .='box-shadow: '.esc_attr($storefront_ecommerce_woocommerce_product_box_shadow).'px '.esc_attr($storefront_ecommerce_woocommerce_product_box_shadow).'px '.esc_attr($storefront_ecommerce_woocommerce_product_box_shadow).'px #ddd;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_woo_product_sale_top_bottom_padding = get_theme_mod('storefront_ecommerce_woo_product_sale_top_bottom_padding', 0);
	$storefront_ecommerce_woo_product_sale_left_right_padding = get_theme_mod('storefront_ecommerce_woo_product_sale_left_right_padding', 0);
	$storefront_ecommerce_custom_css .='.woocommerce span.onsale{';
		$storefront_ecommerce_custom_css .='padding-top: '.esc_attr($storefront_ecommerce_woo_product_sale_top_bottom_padding).'px; padding-bottom: '.esc_attr($storefront_ecommerce_woo_product_sale_top_bottom_padding).'px; padding-left: '.esc_attr($storefront_ecommerce_woo_product_sale_left_right_padding).'px; padding-right: '.esc_attr($storefront_ecommerce_woo_product_sale_left_right_padding).'px; display:inline-block;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_woo_product_sale_border_radius = get_theme_mod('storefront_ecommerce_woo_product_sale_border_radius',0);
	$storefront_ecommerce_custom_css .='.woocommerce span.onsale {';
		$storefront_ecommerce_custom_css .='border-radius: '.esc_attr($storefront_ecommerce_woo_product_sale_border_radius).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_woo_product_sale_position = get_theme_mod('storefront_ecommerce_woo_product_sale_position', 'Right');
	if($storefront_ecommerce_woo_product_sale_position == 'Right' ){
		$storefront_ecommerce_custom_css .='.woocommerce ul.products li.product .onsale{';
			$storefront_ecommerce_custom_css .=' left:auto; right:0;';
		$storefront_ecommerce_custom_css .='}';
	}elseif($storefront_ecommerce_woo_product_sale_position == 'Left' ){
		$storefront_ecommerce_custom_css .='.woocommerce ul.products li.product .onsale{';
			$storefront_ecommerce_custom_css .=' left:0; right:auto;';
		$storefront_ecommerce_custom_css .='}';
	}

	$storefront_ecommerce_wooproduct_sale_font_size = get_theme_mod('storefront_ecommerce_wooproduct_sale_font_size',14);
	$storefront_ecommerce_custom_css .='.woocommerce span.onsale{';
		$storefront_ecommerce_custom_css .='font-size: '.esc_attr($storefront_ecommerce_wooproduct_sale_font_size).'px;';
	$storefront_ecommerce_custom_css .='}';

	// Responsive Media
	$storefront_ecommerce_post_date = get_theme_mod( 'storefront_ecommerce_display_post_date',true);
	if($storefront_ecommerce_post_date == true && get_theme_mod( 'storefront_ecommerce_metafields_date',true) != true){
    	$storefront_ecommerce_custom_css .='.metabox .entry-date{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} ';
	}
    if($storefront_ecommerce_post_date == true){
    	$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='.metabox .entry-date{';
			$storefront_ecommerce_custom_css .='display:inline-block;';
		$storefront_ecommerce_custom_css .='} }';
	}else if($storefront_ecommerce_post_date == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px){';
		$storefront_ecommerce_custom_css .='.metabox .entry-date{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	$storefront_ecommerce_post_author = get_theme_mod( 'storefront_ecommerce_display_post_author',true);
	if($storefront_ecommerce_post_author == true && get_theme_mod( 'storefront_ecommerce_metafields_author',true) != true){
    	$storefront_ecommerce_custom_css .='.metabox .entry-author{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} ';
	}
    if($storefront_ecommerce_post_author == true){
    	$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='.metabox .entry-author{';
			$storefront_ecommerce_custom_css .='display:inline-block;';
		$storefront_ecommerce_custom_css .='} }';
	}else if($storefront_ecommerce_post_author == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px){';
		$storefront_ecommerce_custom_css .='.metabox .entry-author{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	$storefront_ecommerce_post_comment = get_theme_mod( 'storefront_ecommerce_display_post_comment',true);
	if($storefront_ecommerce_post_comment == true && get_theme_mod( 'storefront_ecommerce_metafields_comment',true) != true){
    	$storefront_ecommerce_custom_css .='.metabox .entry-comments{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} ';
	}
    if($storefront_ecommerce_post_comment == true){
    	$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='.metabox .entry-comments{';
			$storefront_ecommerce_custom_css .='display:inline-block;';
		$storefront_ecommerce_custom_css .='} }';
	}else if($storefront_ecommerce_post_comment == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px){';
		$storefront_ecommerce_custom_css .='.metabox .entry-comments{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	$storefront_ecommerce_post_time = get_theme_mod( 'storefront_ecommerce_display_post_time',false);
	if($storefront_ecommerce_post_time == true && get_theme_mod( 'storefront_ecommerce_metafields_time',false) != true){
    	$storefront_ecommerce_custom_css .='.metabox .entry-time{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} ';
	}
    if($storefront_ecommerce_post_time == true){
    	$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='.metabox .entry-time{';
			$storefront_ecommerce_custom_css .='display:inline-block;';
		$storefront_ecommerce_custom_css .='} }';
	}else if($storefront_ecommerce_post_time == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px){';
		$storefront_ecommerce_custom_css .='.metabox .entry-time{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	if($storefront_ecommerce_post_date == false && $storefront_ecommerce_post_author == false && $storefront_ecommerce_post_comment == false && $storefront_ecommerce_post_time == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
    	$storefront_ecommerce_custom_css .='.metabox {';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	$storefront_ecommerce_metafields_date = get_theme_mod( 'storefront_ecommerce_metafields_date',true);
	$storefront_ecommerce_metafields_author = get_theme_mod( 'storefront_ecommerce_metafields_author',true);
	$storefront_ecommerce_metafields_comment = get_theme_mod( 'storefront_ecommerce_metafields_comment',true);
	$storefront_ecommerce_metafields_time = get_theme_mod( 'storefront_ecommerce_metafields_time',true);
	if($storefront_ecommerce_metafields_date == false && $storefront_ecommerce_metafields_author == false && $storefront_ecommerce_metafields_comment == false && $storefront_ecommerce_metafields_time == false){
		$storefront_ecommerce_custom_css .='@media screen and (min-width:576px) {';
    	$storefront_ecommerce_custom_css .='.metabox {';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	$storefront_ecommerce_slider = get_theme_mod( 'storefront_ecommerce_display_slider',false);
	if($storefront_ecommerce_slider == true && get_theme_mod( 'storefront_ecommerce_slider_hide', false) == false){
    	$storefront_ecommerce_custom_css .='#slider{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} ';
	}
    if($storefront_ecommerce_slider == true){
    	$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='#slider{';
			$storefront_ecommerce_custom_css .='display:block;';
		$storefront_ecommerce_custom_css .='} }';
	}else if($storefront_ecommerce_slider == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px){';
		$storefront_ecommerce_custom_css .='#slider{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	$storefront_ecommerce_sidebar = get_theme_mod( 'storefront_ecommerce_display_sidebar',true);
    if($storefront_ecommerce_sidebar == true){
    	$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='#sidebar{';
			$storefront_ecommerce_custom_css .='display:block;';
		$storefront_ecommerce_custom_css .='} }';
	}else if($storefront_ecommerce_sidebar == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='#sidebar{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	$storefront_ecommerce_scroll = get_theme_mod( 'storefront_ecommerce_display_scrolltop',true);
	if($storefront_ecommerce_scroll == true && get_theme_mod( 'storefront_ecommerce_hide_show_scroll',true) != true){
    	$storefront_ecommerce_custom_css .='#scrollbutton {';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} ';
	}
    if($storefront_ecommerce_scroll == true){
    	$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='#scrollbutton {';
			$storefront_ecommerce_custom_css .='display:block;';
		$storefront_ecommerce_custom_css .='} }';
	}else if($storefront_ecommerce_scroll == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px){';
		$storefront_ecommerce_custom_css .='#scrollbutton {';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	$storefront_ecommerce_preloader = get_theme_mod( 'storefront_ecommerce_display_preloader',false);
	if($storefront_ecommerce_preloader == true && get_theme_mod( 'storefront_ecommerce_preloader',false) == false){
		$storefront_ecommerce_custom_css .='@media screen and (min-width:575px) {';
    	$storefront_ecommerce_custom_css .='.frame{';
			$storefront_ecommerce_custom_css .=' visibility: hidden;';
		$storefront_ecommerce_custom_css .='} }';
	}
    if($storefront_ecommerce_preloader == true){
    	$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='.frame{';
			$storefront_ecommerce_custom_css .='visibility:visible;';
		$storefront_ecommerce_custom_css .='} }';
	}else if($storefront_ecommerce_preloader == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px){';
		$storefront_ecommerce_custom_css .='.frame{';
			$storefront_ecommerce_custom_css .='visibility: hidden;';
		$storefront_ecommerce_custom_css .='} }';
	}

	$storefront_ecommerce_search = get_theme_mod( 'storefront_ecommerce_display_search_category',true);
	if($storefront_ecommerce_search == true && get_theme_mod( 'storefront_ecommerce_search_enable_disable',true) != true){
    	$storefront_ecommerce_custom_css .='.search-cat-box{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} ';
	}
    if($storefront_ecommerce_search == true){
    	$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='.search-cat-box{';
			$storefront_ecommerce_custom_css .='display:block;';
		$storefront_ecommerce_custom_css .='} }';
	}else if($storefront_ecommerce_search == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px){';
		$storefront_ecommerce_custom_css .='.search-cat-box{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	$storefront_ecommerce_myaccount = get_theme_mod( 'storefront_ecommerce_display_myaccount',true);
	if($storefront_ecommerce_myaccount == true && get_theme_mod( 'storefront_ecommerce_myaccount_enable_disable',true) != true){
    	$storefront_ecommerce_custom_css .='.login-box{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} ';
	}
    if($storefront_ecommerce_myaccount == true){
    	$storefront_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$storefront_ecommerce_custom_css .='.login-box{';
			$storefront_ecommerce_custom_css .='display:block;';
		$storefront_ecommerce_custom_css .='} }';
	}else if($storefront_ecommerce_myaccount == false){
		$storefront_ecommerce_custom_css .='@media screen and (max-width:575px){';
		$storefront_ecommerce_custom_css .='.login-box{';
			$storefront_ecommerce_custom_css .='display:none;';
		$storefront_ecommerce_custom_css .='} }';
	}

	// menu settings
	$storefront_ecommerce_menu_font_size_option = get_theme_mod('storefront_ecommerce_menu_font_size_option');
	$storefront_ecommerce_custom_css .='.primary-navigation a{';
		$storefront_ecommerce_custom_css .='font-size: '.esc_attr($storefront_ecommerce_menu_font_size_option).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_menu_padding = get_theme_mod('storefront_ecommerce_menu_padding');
	$storefront_ecommerce_custom_css .='.primary-navigation a{';
		$storefront_ecommerce_custom_css .='padding: '.esc_attr($storefront_ecommerce_menu_padding).'px;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_theme_lay = get_theme_mod( 'storefront_ecommerce_text_tranform_menu','Uppercase');
    if($storefront_ecommerce_theme_lay == 'Uppercase'){
		$storefront_ecommerce_custom_css .='.primary-navigation a{';
			$storefront_ecommerce_custom_css .='';
		$storefront_ecommerce_custom_css .='}';
	}else if($storefront_ecommerce_theme_lay == 'Lowercase'){
		$storefront_ecommerce_custom_css .='.primary-navigation a{';
			$storefront_ecommerce_custom_css .='text-transform: lowercase;';
		$storefront_ecommerce_custom_css .='}';
	}
	else if($storefront_ecommerce_theme_lay == 'Capitalize'){
		$storefront_ecommerce_custom_css .='.primary-navigation a{';
			$storefront_ecommerce_custom_css .='text-transform: Capitalize;';
		$storefront_ecommerce_custom_css .='}';
	}

	$storefront_ecommerce_theme_lay = get_theme_mod( 'storefront_ecommerce_font_weight_option_menu','');
    if($storefront_ecommerce_theme_lay == 'Bold'){
		$storefront_ecommerce_custom_css .='.primary-navigation a{';
			$storefront_ecommerce_custom_css .='font-weight:bold;';
		$storefront_ecommerce_custom_css .='}';
	}else if($storefront_ecommerce_theme_lay == 'Normal'){
		$storefront_ecommerce_custom_css .='.primary-navigation a{';
			$storefront_ecommerce_custom_css .='font-weight: normal;';
		$storefront_ecommerce_custom_css .='}';
	}

	//  comment form width
	$storefront_ecommerce_comment_form_width = get_theme_mod( 'storefront_ecommerce_comment_form_width');
	$storefront_ecommerce_custom_css .='#comments textarea{';
		$storefront_ecommerce_custom_css .='width: '.esc_attr($storefront_ecommerce_comment_form_width).'%;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_title_comment_form = get_theme_mod('storefront_ecommerce_title_comment_form', 'Leave a Reply');
	if($storefront_ecommerce_title_comment_form == ''){
		$storefront_ecommerce_custom_css .='#comments h2#reply-title {';
			$storefront_ecommerce_custom_css .='display: none;';
		$storefront_ecommerce_custom_css .='}';
	}

	$storefront_ecommerce_comment_form_button_content = get_theme_mod('storefront_ecommerce_comment_form_button_content', 'Post Comment');
	if($storefront_ecommerce_comment_form_button_content == ''){
		$storefront_ecommerce_custom_css .='#comments p.form-submit {';
			$storefront_ecommerce_custom_css .='display: none;';
		$storefront_ecommerce_custom_css .='}';
	}

	// featured image setting
	$storefront_ecommerce_image_border_radius = get_theme_mod('storefront_ecommerce_image_border_radius', 0);
	$storefront_ecommerce_custom_css .='.box-image img, .content_box img{';
		$storefront_ecommerce_custom_css .='border-radius: '.esc_attr($storefront_ecommerce_image_border_radius).'%;';
	$storefront_ecommerce_custom_css .='}';

	$storefront_ecommerce_image_box_shadow = get_theme_mod('storefront_ecommerce_image_box_shadow',0);
	$storefront_ecommerce_custom_css .='.box-image img, .content_box img{';
		$storefront_ecommerce_custom_css .='box-shadow: '.esc_attr($storefront_ecommerce_image_box_shadow).'px '.esc_attr($storefront_ecommerce_image_box_shadow).'px '.esc_attr($storefront_ecommerce_image_box_shadow).'px #b5b5b5;';
	$storefront_ecommerce_custom_css .='}';

	// Post Block
	$storefront_ecommerce_post_block_option = get_theme_mod( 'storefront_ecommerce_post_block_option','By Block');
    if($storefront_ecommerce_post_block_option == 'By Without Block'){
		$storefront_ecommerce_custom_css .='.inner-service, #blog_sec .sticky{';
			$storefront_ecommerce_custom_css .='border:none; margin:30px 0;';
		$storefront_ecommerce_custom_css .='}';
	}

	// post image 
	$storefront_ecommerce_post_featured_color = get_theme_mod('storefront_ecommerce_post_featured_color', '#5c727d');
	$storefront_ecommerce_post_featured_image = get_theme_mod('storefront_ecommerce_post_featured_image','Image');
	if($storefront_ecommerce_post_featured_image == 'Color'){
		$storefront_ecommerce_custom_css .='.post-color{';
			$storefront_ecommerce_custom_css .='background-color: '.esc_attr($storefront_ecommerce_post_featured_color).';';
		$storefront_ecommerce_custom_css .='}';
	}

	// featured image dimention
	$storefront_ecommerce_post_featured_image_dimention = get_theme_mod('storefront_ecommerce_post_featured_image_dimention', 'Default');
	$storefront_ecommerce_post_featured_image_custom_width = get_theme_mod('storefront_ecommerce_post_featured_image_custom_width');
	$storefront_ecommerce_post_featured_image_custom_height = get_theme_mod('storefront_ecommerce_post_featured_image_custom_height');
	if($storefront_ecommerce_post_featured_image_dimention == 'Custom'){
		$storefront_ecommerce_custom_css .='.box-image img{';
			$storefront_ecommerce_custom_css .='width: '.esc_attr($storefront_ecommerce_post_featured_image_custom_width).'px; height: '.esc_attr($storefront_ecommerce_post_featured_image_custom_height).'px;';
		$storefront_ecommerce_custom_css .='}';
	}

	// featured image dimention
	$storefront_ecommerce_custom_post_color_width = get_theme_mod('storefront_ecommerce_custom_post_color_width');
	$storefront_ecommerce_custom_post_color_height = get_theme_mod('storefront_ecommerce_custom_post_color_height');
	if($storefront_ecommerce_post_featured_image == 'Color'){
		$storefront_ecommerce_custom_css .='.post-color{';
			$storefront_ecommerce_custom_css .='width: '.esc_attr($storefront_ecommerce_custom_post_color_width).'px; height: '.esc_attr($storefront_ecommerce_custom_post_color_height).'px;';
		$storefront_ecommerce_custom_css .='}';
	}

	// site title font size
	$storefront_ecommerce_site_title_font_size = get_theme_mod('storefront_ecommerce_site_title_font_size', 25);
	$storefront_ecommerce_custom_css .='.logo .site-title{';
	$storefront_ecommerce_custom_css .='font-size: '.esc_attr($storefront_ecommerce_site_title_font_size).'px;';
	$storefront_ecommerce_custom_css .='}';

	// site tagline font size
	$storefront_ecommerce_site_tagline_font_size = get_theme_mod('storefront_ecommerce_site_tagline_font_size', 13);
	$storefront_ecommerce_custom_css .='p.site-description{';
	$storefront_ecommerce_custom_css .='font-size: '.esc_attr($storefront_ecommerce_site_tagline_font_size).'px;';
	$storefront_ecommerce_custom_css .='}';

	// woocommerce Product Navigation
	$storefront_ecommerce_wooproducts_nav = get_theme_mod('storefront_ecommerce_wooproducts_nav', 'Yes');
	if($storefront_ecommerce_wooproducts_nav == 'No'){
		$storefront_ecommerce_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$storefront_ecommerce_custom_css .='display: none;';
		$storefront_ecommerce_custom_css .='}';
	}

	// social icons font size
	$storefront_ecommerce_social_icons_size = get_theme_mod('storefront_ecommerce_social_icons_size', 15);
	$storefront_ecommerce_custom_css .='.social-icon i{';
		$storefront_ecommerce_custom_css .='font-size: '.esc_attr($storefront_ecommerce_social_icons_size).'px;';
	$storefront_ecommerce_custom_css .='}';
