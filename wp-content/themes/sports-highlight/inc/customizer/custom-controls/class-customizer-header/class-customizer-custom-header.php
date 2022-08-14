<?php
/**
 * Custom blog-header control for the customizer.
 *
 * @package Sports_Highlight
 */

namespace Sports_Highlight\Custom_Control;

/**
 * Class for blog-header control in customizer.
 */
class Customizer_Custom_Header extends \WP_Customize_Control {

	/**
	 * The type of customize control.
	 *
	 * @access public
	 * @var    string
	 */
	public $type = 'sports-highlight-custom-header';
	/**
	 * Render the control's content.
	 */
	public function render_content() {
		$label = $this->label;
		?>
		<label>
			<span class="customize-control-title" style="font-weight: 700;font-size:xx-large;"> <?php echo esc_html( $label ); ?></span>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
}
