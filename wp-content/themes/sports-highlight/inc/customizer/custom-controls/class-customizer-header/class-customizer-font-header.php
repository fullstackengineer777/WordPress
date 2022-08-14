<?php
/**
 * Custom font-header control for the customizer.
 *
 * @package Sports_Highlight
 */

namespace Sports_Highlight\Custom_Control;

	/**
	 * Class for font-header control in customizer.
	 */
class Customizer_Font_Header extends \WP_Customize_Control {
	/**
	 * The type of customize control.
	 *
	 * @access public
	 * @var    string
	 */
	public $type = 'sports-highlight-font-header';
	/**
	 * Render the control's content.
	 */
	public function render_content() {
		?>
<label>
			<span class="customize-control-title" style="font-weight: 700;">Font</span>
</label>
		<?php
	}
}

