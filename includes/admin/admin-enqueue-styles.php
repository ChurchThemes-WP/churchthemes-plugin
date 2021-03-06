<?php
/**
 * Framework Admin Styles
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

/*******************************************
 * ENQUEUE STYLESHEETS
 *******************************************/

/**
 * Enqueue admin stylesheets
 *
 * Note: CT Meta Box and other framework components handle their own stylesheets.
 *
 * @since 0.9
 */
function ctc_admin_enqueue_styles() {

	$screen = get_current_screen();

	// Admin widgets
	// Framework also enqueues this for Customizer in framework/includes/customize.php
	if ( 'widgets' == $screen->base ) {
		wp_enqueue_style( 'ctc-widgets', CTFW_WIDGETS_CSS_DIR_URL . '/admin-widgets.css', false ); // bust cache on update
	}

	// Theme license
	if ( 'appearance_page_theme-license' == $screen->base ) {
		wp_enqueue_style( 'ctc-license', CTFW_WIDGETS_CSS_DIR_URL . '/admin-license.css', false ); // bust cache on update
	}

}

add_action( 'admin_enqueue_scripts', 'ctc_admin_enqueue_styles' );
