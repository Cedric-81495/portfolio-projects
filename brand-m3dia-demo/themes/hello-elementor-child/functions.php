<?php
/**
 * Brand M3dia child theme functions.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access to this file.
}

define( 'BM3_CHILD_VERSION', '1.0.0' );

/**
 * Load the child theme stylesheet after the parent theme's styles.
 */
function bm3_child_enqueue_styles() {
	// Only depend on parent stylesheets that are actually loaded.
	// A missing dependency would silently stop this stylesheet from loading.
	$parent_handles = array( 'hello-elementor', 'hello-elementor-theme-style' );
	$deps           = array_values( array_filter( $parent_handles, 'wp_style_is' ) );

	wp_enqueue_style(
		'bm3-child-style',
		get_stylesheet_uri(),
		$deps,
		BM3_CHILD_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'bm3_child_enqueue_styles', 20 );