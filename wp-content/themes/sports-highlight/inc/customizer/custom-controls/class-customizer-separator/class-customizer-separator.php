<?php
/**
 * Custom separator for the customizer.
 *
 * @package Sports_Highlight
 */

namespace Sports_Highlight\Custom_Control;

	/**
	 * Class for separator in customizer.
	 */
class Customizer_Separator extends \WP_Customize_Control {
	/**
	 * The type of customize control.
	 *
	 * @access public
	 * @var    string
	 */
	public $type = 'sports-highlight-separator';
	/**
	 * Render the control's content.
	 */
	public function render_content() {
		?>
<label>
			<hr>
</label>
		<?php
	}
}

