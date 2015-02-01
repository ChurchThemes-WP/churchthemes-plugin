<?php
/**
 * Register Post Types
 *
 * @package    ChurchThemes_Framework
 * @subpackage Functions
 * @copyright  Copyright (c) 2015, churchthemes.net
 * @copyright  Copyright (c) 2013 - 2015, churchthemes.com
 * @link       https://github.com/churchthemes-wp/churchthemes-plugin
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      0.9
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**********************************
 * SERMON
 **********************************/

/**
 * Register sermon post type
 *
 * @since 0.9
 */
function ctc_register_post_type_sermon() {

	// Arguments
	$args = array(
		'labels' => array(
			'name'					=> _x( 'Sermons', 'post type general name', 'churchthemes-framework' ),
			'singular_name'			=> _x( 'Sermon', 'post type singular name', 'churchthemes-framework' ),
			'add_new' 				=> _x( 'Add New', 'sermon', 'churchthemes-framework' ),
			'add_new_item' 			=> __( 'Add Sermon', 'churchthemes-framework' ),
			'edit_item' 			=> __( 'Edit Sermon', 'churchthemes-framework' ),
			'new_item' 				=> __( 'New Sermon', 'churchthemes-framework' ),
			'all_items' 			=> __( 'All Sermons', 'churchthemes-framework' ),
			'view_item' 			=> __( 'View Sermon', 'churchthemes-framework' ),
			'search_items' 			=> __( 'Search Sermons', 'churchthemes-framework' ),
			'not_found' 			=> __( 'No sermons found', 'churchthemes-framework' ),
			'not_found_in_trash' 	=> __( 'No sermons found in Trash', 'churchthemes-framework' )
		),
		'public' 		=> ctc_feature_supported( 'sermons' ),
		'has_archive' 	=> ctc_feature_supported( 'sermons' ),
		'rewrite'		=> array(
			'slug' 			=> 'sermons',
			'with_front' 	=> false,
			'feeds'			=> ctc_feature_supported( 'sermons' )
		),
		'supports' 		=> array( 'title', 'editor', 'excerpt', 'publicize', 'thumbnail', 'comments', 'author', 'revisions' ), // 'editor' required for media upload button (see Meta Boxes note below about hiding)
		'taxonomies' 	=> array( 'ctc_sermon_topic', 'ctc_sermon_book', 'ctc_sermon_series', 'ctc_sermon_speaker', 'ctc_sermon_tag' ),
		'menu_icon'		=> 'dashicons-video-alt3'
	);
	$args = apply_filters( 'ctc_post_type_sermon_args', $args ); // allow filtering

	// Registration
	register_post_type(
		'ctc_sermon',
		$args
	);

}

add_action( 'init', 'ctc_register_post_type_sermon' ); // register post type

/**********************************
 * EVENT
 **********************************/

/**
 * Register event post type
 *
 * @since 0.9
 */
function ctc_register_post_type_event() {

	// Arguments
	$args = array(
		'labels' => array(
			'name'					=> _x( 'Events', 'post type general name', 'churchthemes-framework' ),
			'singular_name'			=> _x( 'Event', 'post type singular name', 'churchthemes-framework' ),
			'add_new' 				=> _x( 'Add New', 'event', 'churchthemes-framework' ),
			'add_new_item' 			=> __( 'Add Event', 'churchthemes-framework' ),
			'edit_item' 			=> __( 'Edit Event', 'churchthemes-framework' ),
			'new_item' 				=> __( 'New Event', 'churchthemes-framework' ),
			'all_items' 			=> __( 'All Events', 'churchthemes-framework' ),
			'view_item' 			=> __( 'View Event', 'churchthemes-framework' ),
			'search_items' 			=> __( 'Search Events', 'churchthemes-framework' ),
			'not_found' 			=> __( 'No events found', 'churchthemes-framework' ),
			'not_found_in_trash' 	=> __( 'No events found in Trash', 'churchthemes-framework' )
		),
		'public' 		=> ctc_feature_supported( 'events' ),
		'has_archive' 	=> ctc_feature_supported( 'events' ),
		'rewrite'		=> array(
			'slug' 			=> 'events',
			'with_front'	=> false,
			'feeds'			=> ctc_feature_supported( 'events' ),
		),
		'supports' 		=> array( 'title', 'editor', 'excerpt', 'publicize', 'thumbnail', 'comments', 'author', 'revisions' ),
		'menu_icon'		=> 'dashicons-calendar'
	);
	$args = apply_filters( 'ctc_post_type_event_args', $args ); // allow filtering

	// Registration
	register_post_type(
		'ctc_event',
		$args
	);

}

add_action( 'init', 'ctc_register_post_type_event' ); // register post type

/**********************************
 * LOCATION
 **********************************/

/**
 * Register location post type
 *
 * @since 0.9
 */
function ctc_location_post_type() {

	// Arguments
	$args = array(
		'labels' => array(
			'name'					=> _x( 'Locations', 'post type general name', 'churchthemes-framework' ),
			'singular_name'			=> _x( 'Location', 'post type singular name', 'churchthemes-framework' ),
			'add_new' 				=> _x( 'Add New', 'location', 'churchthemes-framework' ),
			'add_new_item' 			=> __( 'Add Location', 'churchthemes-framework' ),
			'edit_item' 			=> __( 'Edit Location', 'churchthemes-framework' ),
			'new_item' 				=> __( 'New Location', 'churchthemes-framework' ),
			'all_items' 			=> __( 'All Locations', 'churchthemes-framework' ),
			'view_item' 			=> __( 'View Location', 'churchthemes-framework' ),
			'search_items' 			=> __( 'Search Locations', 'churchthemes-framework' ),
			'not_found' 			=> __( 'No location found', 'churchthemes-framework' ),
			'not_found_in_trash' 	=> __( 'No location found in Trash', 'churchthemes-framework' )
		),
		'public' 		=> ctc_feature_supported( 'locations' ),
		'has_archive' 	=> ctc_feature_supported( 'locations' ),
		'rewrite'		=> array(
			'slug' 			=> 'locations',
			'with_front' 	=> false,
			'feeds'			=> ctc_feature_supported( 'locations' ),
		),
		'supports' 		=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		'menu_icon'		=> 'dashicons-location'
	);
	$args = apply_filters( 'ctc_post_type_location_args', $args ); // allow filtering

	// Registration
	register_post_type(
		'ctc_location',
		$args
	);

}

add_action( 'init', 'ctc_location_post_type' ); // register post type

/**********************************
 * PERSON
 **********************************/

/**
 * Register person post type
 *
 * @since 0.9
 */
function ctc_register_post_type_person() {

	// Arguments
	$args = array(
		'labels' => array(
			'name'					=> _x( 'People', 'post type general name', 'churchthemes-framework' ),
			'singular_name'			=> _x( 'Person', 'post type singular name', 'churchthemes-framework' ),
			'add_new' 				=> _x( 'Add New', 'person', 'churchthemes-framework' ),
			'add_new_item' 			=> __( 'Add Person', 'churchthemes-framework' ),
			'edit_item' 			=> __( 'Edit Person', 'churchthemes-framework' ),
			'new_item' 				=> __( 'New Person', 'churchthemes-framework' ),
			'all_items' 			=> __( 'All People', 'churchthemes-framework' ),
			'view_item' 			=> __( 'View Person', 'churchthemes-framework' ),
			'search_items' 			=> __( 'Search People', 'churchthemes-framework' ),
			'not_found' 			=> __( 'No people found', 'churchthemes-framework' ),
			'not_found_in_trash' 	=> __( 'No people found in Trash', 'churchthemes-framework' )
		),
		'public' 		=> ctc_feature_supported( 'people' ),
		'has_archive' 	=> ctc_feature_supported( 'people' ),
		'rewrite'		=> array(
			'slug' 			=> 'people',
			'with_front' 	=> false,
			'feeds'			=> ctc_feature_supported( 'people' ),
		),
		'supports' 		=> array( 'title', 'editor', 'page-attributes', 'thumbnail', 'excerpt' ),
		'taxonomies' 	=> array( 'ctc_person_group' ),
		'menu_icon'		=> 'dashicons-admin-users'
	);
	$args = apply_filters( 'ctc_post_type_person_args', $args ); // allow filtering

	// Registration
	register_post_type(
		'ctc_person',
		$args
	);

}

add_action( 'init', 'ctc_register_post_type_person' ); // register post type
