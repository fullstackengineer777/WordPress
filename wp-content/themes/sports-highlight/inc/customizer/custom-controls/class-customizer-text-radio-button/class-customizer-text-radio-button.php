<?php
/**
 * Text Radio Button Custom Control
 *
 * @author Anthony Hortin <http://maddisondesigns.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @link https://github.com/maddisondesigns
 * Custom range-value for the customizer.
 *
 * @package Sports_Highlight
 */

namespace Sports_Highlight\Custom_Control;

	/**
	 * Class for text radio button in customizer.
	 */
class Customizer_Text_Radio_Button extends \WP_Customize_Control {
	/**
	 * The type of control being rendered
	 *
	 * @var string
	 */
	public $type = 'sports-highlight-text-radio-button';
	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue() {
		$path   = esc_url( get_template_directory_uri() . '/inc/customizer/custom-controls/class-customizer-text-radio-button' );
		$handle = $this->type;
		wp_enqueue_style( "{$handle}-css", "{$path}/customizer-text-radio-button.css", array(), SPORTS_HIGHLIGHT_VERSION, 'all' );
	}

		/**
		 * Render the control in the customizer
		 */
	public function render_content() {
		?>
			<div class="text_radio_button_control">
			<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
			<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>

				<div class="radio-buttons">
				<?php foreach ( $this->choices as $key => $value ) { ?>
						<label class="radio-button-label">
							<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
							<span><?php echo esc_html( $value ); ?></span>
						</label>
					<?php	} ?>
				</div>
			</div>
		<?php
	}
}
