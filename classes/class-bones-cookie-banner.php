<?php
/**
 * Cookie Banner
 *
 * @category Core
 * @package  Bones_Cookie_Banner
 * @author   Level Up Digital
 */

/**
 * Cookie Banner Main Class
 *
 * @category Core
 * @package  Bones_Cookie_Banner
 * @author   Level Up Digital
 */
class Bones_Cookie_Banner {

	/**
	 * Bones_Cookie_Banner constructor.
	 */
	public function __construct() {
		add_action( 'wp_footer', array( $this, 'show_banner' ) );
		add_action( 'customize_register', array( $this, 'register_customize_options' ) );
	}

	/**
	 * Show Cookie Banner
	 */
	public function show_banner() {
		echo $this->get_template( 'cookie-banner' );
	}

	/**
	 * Gets the required template.
	 *
	 * @param string $file_name The name of the file.
	 *
	 * @return WP_Error|string
	 */
	private function get_template( $file_name = '' ) {
		if ( is_dir( get_template_directory() . '/templates' ) && is_file( get_template_directory() . '/templates/' . $file_name . '.php' ) ) {
			return file_get_contents( get_template_directory() . '/templates/' . $file_name . '.php' );
		} elseif ( file_exists( BONES_COOKIE_BANNER_DIR . 'templates/' . $file_name . '.php' ) ) {
			return file_get_contents( BONES_COOKIE_BANNER_DIR . 'templates/' . $file_name . '.php' );
		} else {
			return new WP_Error( 'broke', 'File: ' . $file_name . ' Not Found' );
		}
	}

	/**
	 * Register the options for the Customize Editor
	 *
	 * @param WP_Customize_Manager $wp_customize The WP_Customize_Manager object.
	 */
	public function register_customize_options( $wp_customize ) {

	}
}
