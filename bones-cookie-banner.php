<?php
/**
 * Plugin Name:     Bones Cookie Banner
 * Description:     Adds a cookie banner to WordPress
 * Author:          Level Up Digital
 * Text Domain:     bones-cookie-banner
 * Domain Path:     /languages
 * Version:         0.1.1
 *
 * @package         Bones_Cookie_Banner
 */

global $bones_cookie_banner;

if ( ! defined( 'BONES_COOKIE_BANNER_DIR' ) ) {
	define( 'BONES_COOKIE_BANNER_DIR', trailingslashit( __DIR__ ) );
}

if ( ! defined( 'BONES_COOKIE_BANNER_DIR_NAME' ) ) {
	define( 'BONES_COOKIE_BANNER_DIR_NAME', basename( __DIR__ ) );
}

require_once( BONES_COOKIE_BANNER_DIR . 'classes/class-bones-cookie-banner.php' );

$bones_cookie_banner = new Bones_Cookie_Banner();
