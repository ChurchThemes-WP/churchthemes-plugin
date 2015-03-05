<?php
/**
 * Framework Admin JavaScript
 *
 * @package    ChurchThemes_Framework
 * @subpackage Admin
 * @copyright  Copyright (c) 2015, churchthemes.net
 * @copyright  Copyright (c) 2013 - 2015, Steven Gliebe
 * @link       https://github.com/churchthemes/church-theme-framework
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      0.9
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Enqueue Admin JavaScript
 *
 * Note: CT Meta Box and other framework components handle their own scripts.
 *
 * @since 0.9
 */
function ctc_admin_enqueue_scripts() {

	$screen = get_current_screen();

	// Widgets JavaScript
	// wp_enqueue_media() is run in classes/widget.php
	if ( 'widgets' == $screen->base ) { // don't enqueue unless needed

		// New media uploader in WP 3.5+
		wp_enqueue_media();

		// Main widgets script
		wp_enqueue_script( 'ctc-admin-widgets', CTFW_WIDGETS_JS_DIR_URL . '/admin-widgets.js', array( 'jquery' ) ); // bust cache on update
		wp_localize_script( 'ctc-admin-widgets', 'ctc_widgets', ctc_admin_widgets_js_data() ); // see admin-widgets.php

	}

}

add_action( 'admin_enqueue_scripts', 'ctc_admin_enqueue_scripts' ); // admin-end only
