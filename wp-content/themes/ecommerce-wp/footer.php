<?php
/**
 * @package ceylonthemes
 * @subpackage eCommerce WP
 * @since 1.0.0
 */
    $options = ecommerce_wp_get_theme_options();
	$copyright_text = $options['copyright_text'];

?>
</div><!-- #content -->
	
<footer id="colophon" class="site-footer" role="contentinfo" style="background-image:url('<?php echo esc_attr($options['footer_image']); ?>')" >

	<div style="background-color:<?php echo esc_attr($options['footer_bg_color']); ?>" >	
	
		<div class="container">
			<div class="row">
				<?php require get_template_directory() . '/inc/footer-widgets.php' ;?>		
			</div>		
		</div>
	
	
		<div class="site-info">
		
			<div class="container">
			
			<?php 
			if ($options['social_whatsapp_link'] =='' && $options['social_instagram_link'] =='' && $options['social_youtube_link'] =='' && $options['social_linkdin_link'] =='' && $options['social_twitter_link'] =='' && $options['social_facebook_link'] =='' ) {
			//do nothing
            } else {
			?>
			
			<div class="row">
				<div class="col-sm-12 col-xs-12 footer-social-container">
					 
					<div id="top-social-right" class="footer_social_links">
					  <ul>
						<?php if ($options['social_whatsapp_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_whatsapp_link']); ?>" class="social_links_header_4 whatsapp" target="_blank"> <span class="ts-icon"> <i class="fa fa-whatsapp"></i> </a></li> <?php } ?>
						<?php if ($options['social_pinterest_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_pinterest_link']); ?>" class="social_links_header_6 pinterest" target="_blank"> <span class="ts-icon"> <i class="fa fa-pinterest"></i> </a></li> <?php } ?>            
						<?php if ($options['social_instagram_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_instagram_link']); ?>" class="social_links_header_2 instagram" target="_blank"> <span class="ts-icon"> <i class="fa fa-instagram"></i> </a></li> <?php } ?>
						<?php if ($options['social_youtube_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_youtube_link']); ?>" class="social_links_header_3 youtube" target="_blank"> <span class="ts-icon"> <i class="fa fa-youtube"></i> </a></li> <?php } ?>
						<?php if ($options['social_linkdin_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_linkdin_link']); ?>" class="social_links_header_5 linkedin" target="_blank"> <span class="ts-icon"> <i class="fa fa-linkedin"></i> </a></li> <?php } ?>
						<?php if ($options['social_twitter_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_twitter_link']); ?>" class="social_links_header_1 twitter" target="_blank"> <span class="ts-icon"> <i class="fa fa-twitter"></i> </a></li> <?php } ?>
						<?php if ($options['social_facebook_link'] !='') { ?><li> <a href="<?php echo esc_url($options['social_facebook_link']); ?>" class="social_links_header_0 facebook" target="_blank"> <span class="ts-icon"> <i class="fa fa-facebook"></i> </a></li> <?php } ?>
					  </ul>
					</div>
					
				</div>
			</div>
			
			<?php } ?>
	
			<div class="row">
			<div class="col-sm-12 col-xs-12"> 
			<span>
				<?php
					// echo '<span>'.ecommerce_wp_santize_allowed_html( $copyright_text ).'</span>'; 
					echo '<a href="ceylonthemes.com">'.esc_html( $copyright_text ).'</a>'; 
				?>
			</span>
			</div>
			
			</div>
			
			</div><!-- .container -->
		</div><!-- .site-info -->
	
	
			<?php		
			if ( true === $options['scroll_top_visible'] ) :
			?><div class="backtotop"><?php echo ecommerce_wp_get_svg( array( 'icon' => 'up' ) ); ?></div>
			<?php endif; ?>
	
	</div> <!-- footer inner layer--> 
	
</footer>
<div class="popup-overlay"></div>
		
		
<?php wp_footer(); ?>

</body>
</html>
