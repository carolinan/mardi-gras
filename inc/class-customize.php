<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Mardi_Gras_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self();
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param object $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'inc/class-mardi-gras-customize-section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Mardi_Gras_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Mardi_Gras_Customize_Section_Pro(
				$manager,
				'mardi_gras_support',
				array(
					'pro_text'  => esc_html__( 'Rate this theme', 'mardi-gras' ),
					'pro_url'   => 'https://wordpress.org/support/theme/mardi-gras/reviews/#new-post',
					'pro_text2' => esc_html__( 'Visit the support forum', 'mardi-gras' ),
					'pro_url2'  => 'https://wordpress.org/support/theme/mardi-gras',
					'priority'  => '300',
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'mardi-gras-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ), wp_get_theme()->get( 'Version' ), true );
	}
}

// Doing this customizer thang!
Mardi_Gras_Customize::get_instance();
