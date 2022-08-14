<?php

/**
 *  Class for Metabox.
 *
 *  @package Sports_Highlight
 */

namespace Sports_Highlight;

/**
 * Init class.
 */
class Metabox {

	/**
	 * Fonts array.
	 *
	 * @var array
	 */
	public $choices = array();

	/**
	 *  Init class.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_meta_box' ) );
	}

	/**
	 * Register meta boxes.
	 */
	/**
	 * Register meta boxes.
	 */
	public function register_meta_boxes() {
		add_meta_box(
			'sports-highlight-metabox',
			esc_html__( 'Sports Highlight', 'sports-highlight' ),
			array( $this, 'display_callback' ),
			array( 'page', 'post' ),
			'side'
		);
	}

	/**
	 * Meta box display callback.
	 *
	 * @param \WP_Post $post Current post object.
	 */
	public function display_callback( $post ) {

		$post_id = $post->ID;
		$nonce   = "sports_highlight_nonce_{$post_id}";

		$val = get_post_meta( $post->ID, 'sports_highlight_singular_meta_data', true );

		wp_nonce_field( $nonce, 'sports_highlight_nonce' );

		$choices = $this->get_display_choices();

		$sidebar_choices = array(
			'default' => esc_html__( 'Default', 'sports-highlight' ),
			'no'      => esc_html__( 'No', 'sports-highlight' ),
			'right'   => esc_html__( 'Right', 'sports-highlight' ),
			'left'    => esc_html__( 'Left', 'sports-highlight' ),
		);
		$options         = array(
			'enable'  => esc_html__( 'Enable', 'sports-highlight' ),
			'disable' => esc_html__( 'Disable', 'sports-highlight' ),
		);
		$layouts         = array(
			'default'    => esc_html__( 'Default', 'sports-highlight' ),
			'full-width' => esc_html__( 'Full Width', 'sports-highlight' ),
			'boxed'      => esc_html__( 'Boxed', 'sports-highlight' ),
		);
		?>
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="header"><?php esc_html_e( 'Display Header', 'sports-highlight' ); ?></label>
				</th>
				<td>
					<select name="header" id="header">
						<?php foreach ( $options as $value => $label ) { ?>
							<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, isset( $val['header'] ) ? $val['header'] : '' ); ?>><?php echo esc_html( $label ); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="page_banner"><?php esc_html_e( 'Display Page Banner', 'sports-highlight' ); ?></label>
				</th>
				<td>
					<select name="page_banner" id="page_banner">
						<?php foreach ( $choices as $value => $label ) { ?>
							<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, isset( $val['page_banner'] ) ? $val['page_banner'] : '' ); ?>><?php echo esc_html( $label ); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="breadcrumb"><?php esc_html_e( 'Display Breadcrumb', 'sports-highlight' ); ?></label>
				</th>
				<td>
					<select name="breadcrumb" id="breadcrumb">
						<?php foreach ( $choices as $value => $label ) { ?>
							<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, isset( $val['breadcrumb'] ) ? $val['breadcrumb'] : '' ); ?>><?php echo esc_html( $label ); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="footer"><?php esc_html_e( 'Display Footer', 'sports-highlight' ); ?></label>
				</th>
				<td>
					<select name="footer" id="footer">
						<?php foreach ( $choices as $value => $label ) { ?>
							<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, isset( $val['footer'] ) ? $val['footer'] : '' ); ?>><?php echo esc_html( $label ); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="sidebar"><?php esc_html_e( 'Display Sidebar', 'sports-highlight' ); ?></label>
				</th>
				<td>
					<select name="sidebar" id="sidebar">
						<?php
						foreach ( $sidebar_choices as $value => $label ) {
							?>
							<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, isset( $val['sidebar'] ) ? $val['sidebar'] : '' ); ?>><?php echo esc_html( $label ); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="page_layout"><?php esc_html_e( 'Page Layout', 'sports-highlight' ); ?></label>
				</th>
				<td>
					<select name="page_layout" id="page_layout">
						<?php
						foreach ( $layouts as $key => $label ) {
							?>
							<option value="<?php echo esc_attr( $key ); ?>"<?php selected( $key, isset( $val['page_layout'] ) ? $val['page_layout'] : '' ); ?> ><?php echo esc_html( $label ); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
		</table>
		<?php
	}

	/**
	 * Save meta box content.
	 *
	 * @param int $post_id Post ID.
	 */
	public function save_meta_box( $post_id ) {

		$nonce = "sports_highlight_nonce_{$post_id}";

		if ( ! isset( $_POST['sports_highlight_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sports_highlight_nonce'] ) ), $nonce ) ) {
			return;
		}

		$singular_meta_data                = array();
		$singular_meta_data['header']      = isset( $_POST['header'] ) ? sanitize_text_field( wp_unslash( $_POST['header'] ) ) : '';
		$singular_meta_data['footer']      = isset( $_POST['footer'] ) ? sanitize_text_field( wp_unslash( $_POST['footer'] ) ) : '';
		$singular_meta_data['sidebar']     = isset( $_POST['sidebar'] ) ? sanitize_text_field( wp_unslash( $_POST['sidebar'] ) ) : '';
		$singular_meta_data['page_banner'] = isset( $_POST['page_banner'] ) ? sanitize_text_field( wp_unslash( $_POST['page_banner'] ) ) : '';
		$singular_meta_data['breadcrumb']  = isset( $_POST['breadcrumb'] ) ? sanitize_text_field( wp_unslash( $_POST['breadcrumb'] ) ) : '';
		$singular_meta_data['page_layout'] = isset( $_POST['page_layout'] ) ? sanitize_text_field( wp_unslash( $_POST['page_layout'] ) ) : '';
		update_post_meta( $post_id, 'sports_highlight_singular_meta_data', $singular_meta_data );
	}

	/**
	 * Method for display options.
	 */
	public function get_display_choices() {
		return array(
			'default' => esc_html__( 'Default', 'sports-highlight' ),
			'enable'  => esc_html__( 'Enable', 'sports-highlight' ),
			'disable' => esc_html__( 'Disable', 'sports-highlight' ),
		);
	}
}

new Metabox();
