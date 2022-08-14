<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Sports_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'vw-sports-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-sports' ),
				'family'      => esc_html__( 'Font Family', 'vw-sports' ),
				'size'        => esc_html__( 'Font Size',   'vw-sports' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-sports' ),
				'style'       => esc_html__( 'Font Style',  'vw-sports' ),
				'line_height' => esc_html__( 'Line Height', 'vw-sports' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-sports' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-sports-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-sports-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-sports' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-sports' ),
        'Acme' => __( 'Acme', 'vw-sports' ),
        'Anton' => __( 'Anton', 'vw-sports' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-sports' ),
        'Arimo' => __( 'Arimo', 'vw-sports' ),
        'Arsenal' => __( 'Arsenal', 'vw-sports' ),
        'Arvo' => __( 'Arvo', 'vw-sports' ),
        'Alegreya' => __( 'Alegreya', 'vw-sports' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-sports' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-sports' ),
        'Bangers' => __( 'Bangers', 'vw-sports' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-sports' ),
        'Bad Script' => __( 'Bad Script', 'vw-sports' ),
        'Bitter' => __( 'Bitter', 'vw-sports' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-sports' ),
        'BenchNine' => __( 'BenchNine', 'vw-sports' ),
        'Cabin' => __( 'Cabin', 'vw-sports' ),
        'Cardo' => __( 'Cardo', 'vw-sports' ),
        'Courgette' => __( 'Courgette', 'vw-sports' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-sports' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-sports' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-sports' ),
        'Cuprum' => __( 'Cuprum', 'vw-sports' ),
        'Cookie' => __( 'Cookie', 'vw-sports' ),
        'Chewy' => __( 'Chewy', 'vw-sports' ),
        'Days One' => __( 'Days One', 'vw-sports' ),
        'Dosis' => __( 'Dosis', 'vw-sports' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-sports' ),
        'Economica' => __( 'Economica', 'vw-sports' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-sports' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-sports' ),
        'Francois One' => __( 'Francois One', 'vw-sports' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-sports' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-sports' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-sports' ),
        'Handlee' => __( 'Handlee', 'vw-sports' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-sports' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-sports' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-sports' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-sports' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-sports' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-sports' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-sports' ),
        'Kanit' => __( 'Kanit', 'vw-sports' ),
        'Lobster' => __( 'Lobster', 'vw-sports' ),
        'Lato' => __( 'Lato', 'vw-sports' ),
        'Lora' => __( 'Lora', 'vw-sports' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-sports' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-sports' ),
        'Merriweather' => __( 'Merriweather', 'vw-sports' ),
        'Monda' => __( 'Monda', 'vw-sports' ),
        'Montserrat' => __( 'Montserrat', 'vw-sports' ),
        'Muli' => __( 'Muli', 'vw-sports' ),
        'Marck Script' => __( 'Marck Script', 'vw-sports' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-sports' ),
        'Open Sans' => __( 'Open Sans', 'vw-sports' ),
        'Overpass' => __( 'Overpass', 'vw-sports' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-sports' ),
        'Oxygen' => __( 'Oxygen', 'vw-sports' ),
        'Orbitron' => __( 'Orbitron', 'vw-sports' ),
        'Patua One' => __( 'Patua One', 'vw-sports' ),
        'Pacifico' => __( 'Pacifico', 'vw-sports' ),
        'Padauk' => __( 'Padauk', 'vw-sports' ),
        'Playball' => __( 'Playball', 'vw-sports' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-sports' ),
        'PT Sans' => __( 'PT Sans', 'vw-sports' ),
        'Philosopher' => __( 'Philosopher', 'vw-sports' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-sports' ),
        'Poiret One' => __( 'Poiret One', 'vw-sports' ),
        'Quicksand' => __( 'Quicksand', 'vw-sports' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-sports' ),
        'Raleway' => __( 'Raleway', 'vw-sports' ),
        'Rubik' => __( 'Rubik', 'vw-sports' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-sports' ),
        'Russo One' => __( 'Russo One', 'vw-sports' ),
        'Righteous' => __( 'Righteous', 'vw-sports' ),
        'Slabo' => __( 'Slabo', 'vw-sports' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-sports' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-sports'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-sports' ),
        'Sacramento' => __( 'Sacramento', 'vw-sports' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-sports' ),
        'Tangerine' => __( 'Tangerine', 'vw-sports' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-sports' ),
        'VT323' => __( 'VT323', 'vw-sports' ),
        'Varela Round' => __( 'Varela Round', 'vw-sports' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-sports' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-sports' ),
        'Volkhov' => __( 'Volkhov', 'vw-sports' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-sports' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-sports' ),
			'100' => esc_html__( 'Thin',       'vw-sports' ),
			'300' => esc_html__( 'Light',      'vw-sports' ),
			'400' => esc_html__( 'Normal',     'vw-sports' ),
			'500' => esc_html__( 'Medium',     'vw-sports' ),
			'700' => esc_html__( 'Bold',       'vw-sports' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-sports' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'vw-sports' ),
			'normal'  => esc_html__( 'Normal', 'vw-sports' ),
			'italic'  => esc_html__( 'Italic', 'vw-sports' ),
			'oblique' => esc_html__( 'Oblique', 'vw-sports' )
		);
	}
}
