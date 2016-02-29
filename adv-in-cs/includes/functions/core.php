<?php
namespace TenUp\Adventures_in_Cyberspace\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @since 0.1.0
 *
 * @uses add_action()
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme',  $n( 'i18n' )        );
	add_action( 'after_setup_theme',  $n('load_included_plugins'));
	add_action( 'wp_head',            $n( 'header_meta' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' )     );
	add_action( 'wp_enqueue_scripts', $n( 'styles' )      );

	add_theme_support( 'post-thumbnails' );

}

/**
 * Makes WP Theme available for translation.
 *
 * Translations can be added to the /lang directory.
 * If you're building a theme based on WP Theme, use a find and replace
 * to change 'wptheme' to the name of your theme in all template files.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 *
 * @since 0.1.0
 *
 * @return void
 */
function i18n() {
	load_theme_textdomain( 'advincs_', ADVINCS__PATH . '/languages' );
 }

/**
 * Enqueue scripts for front-end.
 *
 * @uses wp_enqueue_script() to load front end scripts.
 *
 * @since 0.1.0
 *
 * @param bool $debug Whether to enable loading uncompressed/debugging assets. Default false.
 * @return void
 */
function scripts( $debug = false ) {
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script('jquery');
	wp_enqueue_script(
		'advincs_',
		ADVINCS__TEMPLATE_URL . "/assets/js/adventures-in-cyberspace{$min}.js",
		array(),
		ADVINCS__VERSION,
		true
	);

}

/**
 * Enqueue styles for front-end.
 *
 * @uses wp_enqueue_style() to load front end styles.
 *
 * @since 0.1.0
 *
 * @param bool $debug Whether to enable loading uncompressed/debugging assets. Default false.
 * @return void
 */
function styles( $debug = false ) {
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'advincs_',
		ADVINCS__URL . "/assets/css/adventures-in-cyberspace{$min}.css",
		array(),
		ADVINCS__VERSION
	);
}

/**
 * Add humans.txt to the <head> element.
 *
 * @uses apply_filters()
 *
 * @since 0.1.0
 *
 * @return void
 */
function header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . ADVINCS__TEMPLATE_URL . '/humans.txt" />';

	echo apply_filters( 'advincs__humans', $humans );
}

function load_included_plugins() {
	$included_plugins[] = array('class'=>'Automatically_Paginate_Posts', 'path'=>'automatically-paginate-posts');

	foreach($included_plugins as $plugin ) {
		if ( ! class_exists($plugin['class'] ) ) {
			include_once( TEMPLATEPATH.'/plugins/'.$plugin['path'].'/'.$plugin['path'].'.php' );
		}
	}
}
