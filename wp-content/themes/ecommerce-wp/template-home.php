<?php
/**
 * Template Name: Home - Page
 */

	get_header();
	$ecommerce_wp_options = ecommerce_wp_get_theme_options();
	
?>

<div class="home-page inner-content-wrapper">
	<div class="container">
		<div class="row">
			
			<div class="col-sm-3 col-lg-3 col-xs-12">
				<?php get_sidebar('left-sidebar'); ?>
			</div>
			
			<div class="col-sm-6 col-lg-6 col-xs-12">
			
			<?php 
			
			
			?>			

			</div>
			
			<div class="col-sm-3 col-lg-3 col-xs-12">
				<?php get_sidebar('sidebar-1'); ?>
			</div>
			
		</div>
	</div>
</div>

<?php
get_footer();
