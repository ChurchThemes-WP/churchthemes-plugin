<?php
/**
 * Widget Setup
 *
 * Register widgets that are supported by theme and filter fields according to theme support.
 * Widgets are also restricted to certain sidebars as configured.
 *
 * Also see classes/widget.php which widgets extend for automatic field rendering, template loading, etc.
 *
 * @package    ChurchThemes_Framework
 * @subpackage Functions
 * @copyright  Copyright (c) 2015, churchthemes.net
 * @copyright  Copyright (c) 2013 - 2015, Steven Gliebe
 * @link       https://github.com/churchthemes/church-theme-framework
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      0.9
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**********************************
 * WIDGET DATA
 **********************************/

/**
 * Available Widgets
 *
 * This can be filtered to register more widgets extending the framework's CTFW_Widgets class from the theme or child theme.
 * Widget classes existing in theme's includes/classes folder are loaded the same as those in framework/includes/classes.
 * Likewise, templates in the theme's widget-templates directory will be auto-loaded.
 *
 * @since 0.9
 * @return array $widgets Available widgets configuration
 */
function ctc_widgets() {

	// Available widgets
	$widgets = array(
		'ctc-categories' => array(										// id_base as specified in widget's class
			'class'						=> 'CTFW_Widget_Categories',	// widget class name
			'class_file'				=> 'widget-categories.php',		// filename of class in framework class directory
			'template_file'				=> 'widget-categories.php',		// filename of template in widget-templates directory
		),
		'ctc-posts' => array(
			'class'						=> 'CTFW_Widget_Posts',
			'class_file'				=> 'widget-posts.php',
			'template_file'				=> 'widget-posts.php',
		),
		'ctc-sermons' => array(
			'class'						=> 'CTFW_Widget_Sermons',
			'class_file'				=> 'widget-sermons.php',
			'template_file'				=> 'widget-sermons.php',
		),
		'ctc-events' => array(
			'class'						=> 'CTFW_Widget_Events',
			'class_file'				=> 'widget-events.php',
			'template_file'				=> 'widget-events.php',
		),
		'ctc-gallery' => array(
			'class'						=> 'CTFW_Widget_Gallery',
			'class_file'				=> 'widget-gallery.php',
			'template_file'				=> 'widget-gallery.php',
		),
		'ctc-galleries' => array(
			'class'						=> 'CTFW_Widget_Galleries',
			'class_file'				=> 'widget-galleries.php',
			'template_file'				=> 'widget-galleries.php',
		),
		'ctc-people' => array(
			'class'						=> 'CTFW_Widget_People',
			'class_file'				=> 'widget-people.php',
			'template_file'				=> 'widget-people.php',
		),
		'ctc-locations' => array(
			'class'						=> 'CTFW_Widget_Locations',
			'class_file'				=> 'widget-locations.php',
			'template_file'				=> 'widget-locations.php',
		),
		'ctc-archives' => array(
			'class'						=> 'CTFW_Widget_Archives',
			'class_file'				=> 'widget-archives.php',
			'template_file'				=> 'widget-archives.php',
		),
		'ctc-giving' => array(
			'class'						=> 'CTFW_Widget_Giving',
			'class_file'				=> 'widget-giving.php',
			'template_file'				=> 'widget-giving.php',
		),
		'ctc-slide' => array(
			'class'						=> 'CTFW_Widget_Slide',
			'class_file'				=> 'widget-slide.php',
			'template_file'				=> 'widget-slide.php',
		),
		'ctc-highlight' => array(
			'class'						=> 'CTFW_Widget_Highlight',
			'class_file'				=> 'widget-highlight.php',
			'template_file'				=> 'widget-highlight.php',
		),
	);

	// Return filterable
	return apply_filters( 'ctc_widgets', $widgets );

}

/**********************************
 * REGISTER WIDGETS
 **********************************/

/**
 * Register Widgets
 *
 * Include and register widgets that theme supports.
 *
 * @since 0.9
 */
function ctc_register_widgets() {

	// Available widgets
	$widgets = ctc_widgets();

	// Loop widgets
	foreach ( $widgets as $widget_id => $widget_data ) {

		// Register the widget
		register_widget( $widget_data['class'] );

	}

}

add_action( 'widgets_init', 'ctc_register_widgets' ); // same as init 1
