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
	 * Defines the plugin version.
	 */
	const VERSION = '0.1.2';

	/**
	 * Bones_Cookie_Banner constructor.
	 */
	public function __construct() {
		add_action( 'wp_footer', array( $this, 'show_banner' ) );
		add_action( 'customize_register', array( $this, 'register_customize_options' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
	}

	/**
	 * Show Cookie Banner
	 */
	public function show_banner() {
		if ( ! isset( $_COOKIE['cookie-banner-hide-banner'] ) || is_customize_preview() ) {
			echo $this->get_template( 'cookie-banner' );
		}
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
			include get_template_directory() . '/templates/' . $file_name . '.php';
		} elseif ( file_exists( BONES_COOKIE_BANNER_DIR . 'templates/' . $file_name . '.php' ) ) {
			include BONES_COOKIE_BANNER_DIR . 'templates/' . $file_name . '.php';
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
		$wp_customize->add_section( 'cookie_banner', array(
			'title' => __( 'Cookie Banner', 'Bones_Cookie_Banner' ),
		) );

		$wp_customize->add_setting( 'cookie_banner_position', array(
			'default' => 'bottom',
		) );

		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'cookie_banner_position',
			array(
				'label'    => __( 'Cookie Banner Position', 'Bones_Cookie_Banner' ),
				'settings' => 'cookie_banner_position',
				'priority' => 10,
				'section'  => 'cookie_banner',
				'type'     => 'select',
				'choices'  => array(
					'top'    => 'Top',
					'bottom' => 'Bottom',
				),
			)
		) );

		$wp_customize->add_setting( 'cookie_banner_background_color', array(
			'default' => '#000000',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'cookie_banner_background_color',
			array(
				'label'    => __( 'Cookie Background Color', 'Bones_Cookie_Banner' ),
				'settings' => 'cookie_banner_background_color',
				'section'  => 'cookie_banner',
			)
		) );

		$wp_customize->add_setting( 'cookie_banner_text_color', array(
			'default' => '#ffffff',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'cookie_banner_text_color',
			array(
				'label'    => __( 'Cookie Text Color', 'Bones_Cookie_Banner' ),
				'settings' => 'cookie_banner_text_color',
				'section'  => 'cookie_banner',
			)
		) );

		$wp_customize->add_setting( 'cookie_banner_content', array(
			'default' => 'We use cookies on this site to enhance your experience with us, please confirm you are happy with this.',
		) );

		$wp_customize->add_control( 'cookie_banner_content', array(
			'label'   => __( 'Cookie Banner Content' ),
			'section' => 'cookie_banner', // // Add a default or your own section
			'type'    => 'textarea',
		) );

		$wp_customize->add_setting( 'cookie_banner_button_text', array(
			'default' => 'Accept and Continue',
		) );

		$wp_customize->add_control( 'cookie_banner_button_text', array(
			'label'   => __( 'Cookie Banner Button Text' ),
			'section' => 'cookie_banner', // // Add a default or your own section
			'type'    => 'text',
		) );

		$wp_customize->add_setting( 'cookie_banner_button_background_color', array(
			'default' => '#ffffff',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'cookie_banner_button_background_color',
			array(
				'label'    => __( 'Cookie Button Background Color', 'Bones_Cookie_Banner' ),
				'settings' => 'cookie_banner_button_background_color',
				'section'  => 'cookie_banner',
			)
		) );

		$wp_customize->add_setting( 'cookie_banner_button_text_color', array(
			'default' => '#000000',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'cookie_banner_button_text_color',
			array(
				'label'    => __( 'Cookie Button Text Color', 'Bones_Cookie_Banner' ),
				'settings' => 'cookie_banner_button_text_color',
				'section'  => 'cookie_banner',
			)
		) );
	}

	/**
	 * Register assets
	 */
	public function register_assets() {
		wp_enqueue_style( 'bones-cookie-banner', plugins_url() . '/' . BONES_COOKIE_BANNER_DIR_NAME . '/assets/css/cookie-banner.css', '', self::VERSION );
		wp_enqueue_script( 'bones-cookie-banner', plugins_url() . '/' . BONES_COOKIE_BANNER_DIR_NAME . '/assets/js/cookie-banner.js', array( 'jquery' ), self::VERSION );
	}
}
