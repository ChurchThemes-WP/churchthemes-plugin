<?php
/**
 * Admin Widgets Functions
 *
 * @package    ChurchThemes_Framework
 * @subpackage Admin
 * @copyright  Copyright (c) 2013-2014, Steven Gliebe
 * @link       https://github.com/churchthemes/church-theme-framework
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      0.9
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/*******************************************
 * DATA
 *******************************************/

/**
 * Admin widget JavaScript data
 *
 * This is for passing into localization for JavaScript when admin-widget.js is enqueued.
 * It's functionized because admin-widget.js is inqueued in two places: Appearance > Widgets and Customize
 *
 * @since 1.2
 * @return array Data for JavaScript
 */

function ctc_admin_widgets_js_data() {

	$data = array( // make data available
		'image_library_title'	=> _x( 'Choose Image for Widget', 'widget image library', 'church-theme-framework' ),
		'image_library_button'	=> _x( 'Use in Widget', 'widget image library', 'church-theme-framework' ),
	);

	return apply_filters( 'ctc_admin_widgets_js_data', $data );

}
