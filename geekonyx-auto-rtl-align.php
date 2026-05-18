<?php
/**
 * Plugin Name: GeekOnyx Auto RTL Align
 * Plugin URI:  https://github.com/geekonyx/wp-auto-rtl-align
 * Description: Automatically detects Arabic text in post titles and content to apply RTL (Right-to-Left) alignment.
 * Version:     1.0.4
 * Author:      GeekOnyx
 * Author URI:  https://github.com/geekonyx
 * License:     GPL2
 * Text Domain: geekonyx-auto-rtl-align
 * Domain Path: /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define Constants
 */
define( 'GEEKONYX_AUTO_RTL_VERSION', '1.0.4' );
define( 'GEEKONYX_AUTO_RTL_PATH', plugin_dir_path( __FILE__ ) );
define( 'GEEKONYX_AUTO_RTL_URL', plugin_dir_url( __FILE__ ) );

/**
 * Initialize the plugin
 */
function geekonyx_auto_rtl_init() {
	// Translations are handled automatically by WordPress.org
}
add_action( 'plugins_loaded', 'geekonyx_auto_rtl_init' );

// Enqueue Styles
function geekonyx_auto_rtl_enqueue_styles() {
	wp_enqueue_style( 'geekonyx-auto-rtl-style', GEEKONYX_AUTO_RTL_URL . 'assets/css/style.css', array(), GEEKONYX_AUTO_RTL_VERSION );
}
add_action( 'wp_enqueue_scripts', 'geekonyx_auto_rtl_enqueue_styles' );

/**
 * Detect if string contains Arabic characters
 */
function geekonyx_auto_rtl_has_arabic( $text ) {
	if ( empty( $text ) ) {
		return false;
	}
	return preg_match( '/[\x{0600}-\x{06FF}]/u', $text );
}

/**
 * Filter the title to add RTL support if Arabic is detected
 */
function geekonyx_auto_rtl_filter_title( $title, $id = null ) {
	if ( is_admin() ) {
		return $title;
	}

	if ( geekonyx_auto_rtl_has_arabic( $title ) ) {
		return "\xe2\x80\xab" . $title . "\xe2\x80\xac";
	}
	return $title;
}
add_filter( 'the_title', 'geekonyx_auto_rtl_filter_title', 10, 2 );

/**
 * Add a class to the post container if it contains Arabic
 */
function geekonyx_auto_rtl_add_post_class( $classes, $class, $post_id ) {
	if ( ! $post_id ) {
		return $classes;
	}

	$title = get_the_title( $post_id );
	if ( geekonyx_auto_rtl_has_arabic( $title ) ) {
		$classes[] = 'geekonyx-auto-rtl-detected';
	}
	return $classes;
}
add_filter( 'post_class', 'geekonyx_auto_rtl_add_post_class', 10, 3 );

/**
 * Add a class to the body tag if the current post is Arabic
 */
function geekonyx_auto_rtl_add_body_class( $classes ) {
	if ( is_singular() ) {
		$post_id = get_the_ID();
		$title = get_the_title( $post_id );
		if ( geekonyx_auto_rtl_has_arabic( $title ) ) {
			$classes[] = 'geekonyx-auto-rtl-detected';
		}
	}
	return $classes;
}
add_filter( 'body_class', 'geekonyx_auto_rtl_add_body_class' );

/**
 * Filter the content to add RTL support if Arabic is detected
 */
function geekonyx_auto_rtl_filter_content( $content ) {
	if ( is_admin() ) {
		return $content;
	}

	if ( geekonyx_auto_rtl_has_arabic( $content ) ) {
		return '<div class="geekonyx-auto-rtl-content" dir="rtl">' . $content . '</div>';
	}
	return $content;
}
add_filter( 'the_content', 'geekonyx_auto_rtl_filter_content' );
