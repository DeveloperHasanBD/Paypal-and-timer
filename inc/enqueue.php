<?php
/**
 * srt enqueue scripts
 *
 * @package srt
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		
        	wp_enqueue_script('srt-paypalobjects-js', 'https://www.paypalobjects.com/api/checkout.js');
		wp_enqueue_script( 'srt-custom', get_template_directory_uri() . '/srt-assets/js/custom.js', array(), $js_version, true );
		wp_localize_script('srt-custom', 'action_url_ajax', [
			'ajax_url' => admin_url('admin-ajax.php'),
		]);


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
