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
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );


		wp_enqueue_style( 'srt-bootstrap', get_template_directory_uri() . '/srt-assets/css/bootstrap.min.css', array(), $css_version );
		wp_enqueue_style( 'srt-all-min', get_template_directory_uri() . '/srt-assets/css/all.min.css', array(), $css_version );
		wp_enqueue_style( 'srt-animate', get_template_directory_uri() . '/srt-assets/css/animate.min.css', array(), $css_version );
		wp_enqueue_style( 'srt-carousel', get_template_directory_uri() . '/srt-assets/css/owl.carousel.min.css', array(), $css_version );
		wp_enqueue_style( 'srt-slicknav', get_template_directory_uri() . '/srt-assets/css/slicknav.min.css', array(), $css_version );
		wp_enqueue_style( 'srt-style', get_template_directory_uri() . '/srt-assets/css/style.css', array(), $css_version );
		wp_enqueue_style( 'srt-responsive', get_template_directory_uri() . '/srt-assets/css/responsive.css', array(), $css_version );
		wp_enqueue_style( 'srt-theme-style', get_stylesheet_uri());


		// wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );


		wp_enqueue_script( 'srt-jquery', get_template_directory_uri() . '/srt-assets/js/jquery-1.11.1.min.js', array(), $js_version, true );
		wp_enqueue_script( 'srt-bootstrap', get_template_directory_uri() . '/srt-assets/js/bootstrap.min.js', array(), $js_version, true );
		wp_enqueue_script( 'srt-slicknav', get_template_directory_uri() . '/srt-assets/js/jquery.slicknav.min.js', array(), $js_version, true );
		wp_enqueue_script( 'srt-all-min', get_template_directory_uri() . '/srt-assets/js/all.min.js', array(), $js_version, true );
		wp_enqueue_script( 'srt-carousel', get_template_directory_uri() . '/srt-assets/js/owl.carousel.min.js', array(), $js_version, true );
		wp_enqueue_script( 'srt-validate', get_template_directory_uri() . '/srt-assets/js/jquery.validate.min.js', array(), $js_version, true );

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
