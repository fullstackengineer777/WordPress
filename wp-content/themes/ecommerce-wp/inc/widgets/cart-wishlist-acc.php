<?php
/*
 * Display product categories
 */
if (!class_exists('WooCommerce')) return;

class ecommerce_wp_cart_wishlist_acc_widget extends WC_Widget {

		function __construct() {
		
				$this->widget_cssclass    = 'woocommerce cart_wishlist_acc_widget';
				$this->widget_description = __( 'Display Cart Wishlist My Account.', 'ecommerce-wp' );
				$this->widget_id          = 'ecommerce_wp_cart_wishlist_acc_widget';
				$this->widget_name        = __( '+ Cart Wishlist My Account', 'ecommerce-wp' );
		
				parent::__construct();
				
		}

		// Creating widget front-end
		public function widget($args, $instance) {
		
			?>
			<div class="header-icon-container">
			<?php
			
			if (class_exists('WooCommerce')) {
			?>		
			<div class="header-icons">
				<div class="header-my-account">
					<div class="header-login"> 
						<a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" data-tooltip="<?php esc_attr_e('My Account', 'ecommerce-wp'); ?>" title="<?php esc_attr_e('My Account', 'ecommerce-wp'); ?>">
							<i class="fa fa-user-circle-o"></i>
						</a>
					</div>
				</div>
			</div>
			<?php } // end my account
			
			
			
			if (function_exists('YITH_WCWL')) {
				$wishlist_url = YITH_WCWL()->get_wishlist_url();
			?>
			<div class="header-icons">
				<div class="header-wishlist">
					<a href="<?php echo esc_url($wishlist_url); ?>" data-tooltip="<?php esc_attr_e('Wishlist', 'ecommerce-wp'); ?>" title="<?php esc_attr_e('Wishlist', 'ecommerce-wp'); ?>">
						<i class="fa fa-heart-o"></i>
					</a>
				</div>
			</div>
			<?php
			} //wishlist
			
			
			if (function_exists('yith_woocompare_constructor') ) {
				global $yith_woocompare;
				?>
				<div class="header-icons">
					<div class="header-compare product">
						<a class="compare added" rel="nofollow" href="<?php if(!empty($yith_woocompare->obj) && method_exists($yith_woocompare->obj, 'view_table_url')) { echo esc_url($yith_woocompare->obj->view_table_url()); } ?>" data-tooltip="<?php esc_attr_e('Compare', 'ecommerce-wp'); ?>" title="<?php esc_attr_e('Compare', 'ecommerce-wp'); ?>">
							<i class="fa fa-balance-scale"></i>
						</a>
					</div>
				</div>
				<?php
			} //end compare
			
			
			if (class_exists('WooCommerce')) {
			?>	
			<div class="header-icons">
				<div class="header-cart">
					<div class="header-cart-block">
						<div class="header-cart-inner">                       
	
							<?php ecommerce_wp_cart_link(); ?>
	
							<ul class="site-header-cart menu list-unstyled text-center">
								<li>
									<?php the_widget('WC_Widget_Cart', 'title='); ?>
								</li>
							</ul>
							
						</div>
					</div>
				</div>
			</div>
		<?php } //end cart ?>
		
		
		</div> <!-- //end header icon container -->
		
			
		<?php
			
		}

		public function form($instance) { }

		public function update($new_instance, $old_instance) {
				$instance = array();
				return $instance;
		}
}


function ecommerce_wp_cart_wishlist_acc_widget() {
		register_widget('ecommerce_wp_cart_wishlist_acc_widget');
}
add_action('widgets_init', 'ecommerce_wp_cart_wishlist_acc_widget');





