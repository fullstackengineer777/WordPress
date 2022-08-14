<?php
/**
 * The template part for displaying content
 * @package Storefront Ecommerce
 * @subpackage storefront_ecommerce
 * @since 1.0
 */
?>

<?php $storefront_ecommerce_theme_lay = get_theme_mod( 'storefront_ecommerce_post_layouts','Layout 2');
if($storefront_ecommerce_theme_lay == 'Layout 1'){ 
	get_template_part('template-parts/Post-layouts/layout1'); 
}else if($storefront_ecommerce_theme_lay == 'Layout 2'){ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}else if($storefront_ecommerce_theme_lay == 'Layout 3'){ 
	get_template_part('template-parts/Post-layouts/layout3'); 
}else{ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}