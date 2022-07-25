<?php

include_once("inc/customizer/customizer.php");
include_once("inc/mail-send/mail-sending.php");
include_once("inc/mail-send/acf-mail-text.php");
include_once("inc/mcq/mcq.php");
include_once("inc/woo/hook.php");

// include_once("inc/nel-mondo/country-search.php");
// include_once("inc/woo/woo-ajax/product-filter.php");

/**
 * srt functions and definitions
 *
 * @package srt
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// srt's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/srt/srt/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/tgm.php',                      // Load deprecated functions.
	'/user-dashboard-customize.php',                      // Load deprecated functions.
	'/srt/mcq-category.php',                      // Load deprecated functions.


);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ($understrap_includes as $file) {
	require_once get_theme_file_path($understrap_inc_dir . $file);
}

// crizaf header class 
function crzf_header_class_setup($class)
{
	if (is_front_page()) {
	} else {
		$class = 'fpage_normal_menu';
	}
	return $class;
}
// add_filter('class_change_as_page', 'crzf_header_class_setup');



// function _remove_script_version($src)
// {
// 	$parts = explode('?ver', $src);
// 	return $parts[0];
// }
// add_filter('script_loader_src', '_remove_script_version', 15, 1);


// $si = site_url() . 'sdsd';
// add_query_arg('key', 'value', $si);


