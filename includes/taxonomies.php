<?php
/**
 * Taxonomy-related Functions
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
 * SERMON TAXONOMIES
 **********************************/

/**
 * Sermon topic
 *
 * @since 0.9
 */
function ctc_register_taxonomy_sermon_topic() {

	// Arguments
	$args = array(
		'labels' => array(
			'name' 							=> _x( 'Sermon Topics', 'taxonomy general name', 'churchthemes-framework' ),
			'singular_name'					=> _x( 'Sermon Topic', 'taxonomy singular name', 'churchthemes-framework' ),
			'search_items' 					=> _x( 'Search Topics', 'sermons', 'churchthemes-framework' ),
			'popular_items' 				=> _x( 'Popular Topics', 'sermons', 'churchthemes-framework' ),
			'all_items' 					=> _x( 'All Topics', 'sermons', 'churchthemes-framework' ),
			'parent_item' 					=> null,
			'parent_item_colon' 			=> null,
			'edit_item' 					=> _x( 'Edit Topic', 'sermons', 'churchthemes-framework' ),
			'update_item' 					=> _x( 'Update Topic', 'sermons', 'churchthemes-framework' ),
			'add_new_item' 					=> _x( 'Add Topic', 'sermons', 'churchthemes-framework' ),
			'new_item_name' 				=> _x( 'New Topic', 'sermons', 'churchthemes-framework' ),
			'separate_items_with_commas' 	=> _x( 'Separate topics with commas', 'sermons', 'churchthemes-framework' ),
			'add_or_remove_items' 			=> _x( 'Add or remove topics', 'sermons', 'churchthemes-framework' ),
			'choose_from_most_used' 		=> _x( 'Choose from the most used topics', 'sermons', 'churchthemes-framework' ),
			'menu_name' 					=> _x( 'Topics', 'sermon menu name', 'churchthemes-framework' )
		),
		'hierarchical'	=> true, // category-style instead of tag-style
		'public' 		=> ctc_taxonomy_supported( 'sermons', 'ctc_sermon_topic' ),
		'rewrite' 		=> array(
			'slug' 			=> 'sermon-topic',
			'with_front' 	=> false,
			'hierarchical' 	=> true
		)
	);
	$args = apply_filters( 'ctc_taxonomy_sermon_topic_args', $args ); // allow filtering

	// Registration
	register_taxonomy(
		'ctc_sermon_topic',
		'ctc_sermon',
		$args
	);

}

add_action( 'init', 'ctc_register_taxonomy_sermon_topic' );

/**
 * Sermon book
 *
 * @since 0.9
 */
function ctc_register_taxonomy_sermon_book() {

	// Arguments
	$args = array(
		'labels' => array(
			'name' 							=> _x( 'Sermon Books', 'taxonomy general name', 'churchthemes-framework' ),
			'singular_name'					=> _x( 'Sermon Book', 'taxonomy singular name', 'churchthemes-framework' ),
			'search_items' 					=> _x( 'Search Books', 'sermons', 'churchthemes-framework' ),
			'popular_items' 				=> _x( 'Popular Books', 'sermons', 'churchthemes-framework' ),
			'all_items' 					=> _x( 'All Books', 'sermons', 'churchthemes-framework' ),
			'parent_item' 					=> null,
			'parent_item_colon' 			=> null,
			'edit_item' 					=> _x( 'Edit Book', 'sermons', 'churchthemes-framework' ),
			'update_item' 					=> _x( 'Update Book', 'sermons', 'churchthemes-framework' ),
			'add_new_item' 					=> _x( 'Add Book', 'sermons', 'churchthemes-framework' ),
			'new_item_name' 				=> _x( 'New Book', 'sermons', 'churchthemes-framework' ),
			'separate_items_with_commas' 	=> _x( 'Separate books with commas', 'sermons', 'churchthemes-framework' ),
			'add_or_remove_items' 			=> _x( 'Add or remove books', 'sermons', 'churchthemes-framework' ),
			'choose_from_most_used' 		=> _x( 'Choose from the most used books', 'sermons', 'churchthemes-framework' ),
			'menu_name' 					=> _x( 'Books', 'sermon menu name', 'churchthemes-framework' )
		),
		'hierarchical'	=> true, // category-style instead of tag-style
		'public' 		=> ctc_taxonomy_supported( 'sermons', 'ctc_sermon_book' ),
		'rewrite' 		=> array(
			'slug' 			=> 'sermon-book',
			'with_front' 	=> false,
			'hierarchical' 	=> true
		)
	);
	$args = apply_filters( 'ctc_taxonomy_sermon_book_args', $args ); // allow filtering

	// Registration
	register_taxonomy(
		'ctc_sermon_book',
		'ctc_sermon',
		$args
	);

}

add_action( 'init', 'ctc_register_taxonomy_sermon_book' );

/**
 * Sermon series
 *
 * @since 0.9
 */
function ctc_register_taxonomy_sermon_series() {

	// Arguments
	$args = array(
		'labels' => array(
			'name' 							=> _x( "Sermon Series", 'taxonomy general name', 'churchthemes-framework' ),
			'singular_name'					=> _x( "Sermon Series", 'taxonomy singular name', 'churchthemes-framework' ),
			'search_items' 					=> _x( "Search Series", 'sermons', 'churchthemes-framework' ),
			'popular_items' 				=> _x( "Popular Series", 'sermons', 'churchthemes-framework' ),
			'all_items' 					=> _x( "All Series", 'sermons', 'churchthemes-framework' ),
			'parent_item' 					=> null,
			'parent_item_colon' 			=> null,
			'edit_item' 					=> _x( 'Edit Series', 'sermons', 'churchthemes-framework' ),
			'update_item' 					=> _x( 'Update Series', 'sermons', 'churchthemes-framework' ),
			'add_new_item' 					=> _x( 'Add Series', 'sermons', 'churchthemes-framework' ),
			'new_item_name' 				=> _x( 'New Series', 'sermons', 'churchthemes-framework' ),
			'separate_items_with_commas' 	=> _x( "Separate series with commas", 'sermons', 'churchthemes-framework' ),
			'add_or_remove_items' 			=> _x( "Add or remove series", 'sermons', 'churchthemes-framework' ),
			'choose_from_most_used' 		=> _x( "Choose from the most used series", 'sermons', 'churchthemes-framework' ),
			'menu_name' 					=> _x( "Series", 'sermon menu name', 'churchthemes-framework' )
		),
		'hierarchical'	=> true, // category-style instead of tag-style
		'public' 		=> ctc_taxonomy_supported( 'sermons', 'ctc_sermon_series' ),
		'rewrite' 		=> array(
			'slug' 			=> 'sermon-series',
			'with_front' 	=> false,
			'hierarchical' 	=> true
		)
	);
	$args = apply_filters( 'ctc_taxonomy_sermon_series_args', $args ); // allow filtering

	// Registration
	register_taxonomy(
		'ctc_sermon_series',
		'ctc_sermon',
		$args
	);

}

add_action( 'init', 'ctc_register_taxonomy_sermon_series' );

/**
 * Sermon speaker
 *
 * @since 0.9
 */
function ctc_register_taxonomy_sermon_speaker() {

	// Arguments
	$args = array(
		'labels' => array(
			'name' 							=> _x( 'Sermon Speakers', 'taxonomy general name', 'churchthemes-framework' ),
			'singular_name'					=> _x( 'Sermon Speaker', 'taxonomy singular name', 'churchthemes-framework' ),
			'search_items' 					=> _x( 'Search Speakers', 'sermons', 'churchthemes-framework' ),
			'popular_items' 				=> _x( 'Popular Speakers', 'sermons', 'churchthemes-framework' ),
			'all_items' 					=> _x( 'All Speakers', 'sermons', 'churchthemes-framework' ),
			'parent_item' 					=> null,
			'parent_item_colon' 			=> null,
			'edit_item' 					=> _x( 'Edit Speaker', 'sermons', 'churchthemes-framework' ),
			'update_item' 					=> _x( 'Update Speaker', 'sermons', 'churchthemes-framework' ),
			'add_new_item' 					=> _x( 'Add Speaker', 'sermons', 'churchthemes-framework' ),
			'new_item_name' 				=> _x( 'New Speaker', 'sermons', 'churchthemes-framework' ),
			'separate_items_with_commas' 	=> _x( 'Separate speakers with commas', 'sermons', 'churchthemes-framework' ),
			'add_or_remove_items' 			=> _x( 'Add or remove speakers', 'sermons', 'churchthemes-framework' ),
			'choose_from_most_used' 		=> _x( 'Choose from the most used speakers', 'sermons', 'churchthemes-framework' ),
			'menu_name' 					=> _x( 'Speakers', 'sermon menu name', 'churchthemes-framework' )
		),
		'hierarchical'	=> true, // category-style instead of tag-style
		'public' 		=> ctc_taxonomy_supported( 'sermons', 'ctc_sermon_speaker' ),
		'rewrite' 		=> array(
			'slug' 			=> 'sermon-speaker',
			'with_front' 	=> false,
			'hierarchical' 	=> true
		)
	);
	$args = apply_filters( 'ctc_taxonomy_sermon_speaker_args', $args ); // allow filtering

	// Registration
	register_taxonomy(
		'ctc_sermon_speaker',
		'ctc_sermon',
		$args
	);

}

add_action( 'init', 'ctc_register_taxonomy_sermon_speaker' );

/**
 * Sermon tag
 *
 * @since 0.9
 */
function ctc_register_taxonomy_sermon_tag() {

	// Arguments
	$args = array(
		'labels' => array(
			'name' 							=> _x( 'Sermon Tags', 'taxonomy general name', 'churchthemes-framework' ),
			'singular_name'					=> _x( 'Sermon Tag', 'taxonomy singular name', 'churchthemes-framework' ),
			'search_items' 					=> _x( 'Search Tags', 'sermons', 'churchthemes-framework' ),
			'popular_items' 				=> _x( 'Popular Tags', 'sermons', 'churchthemes-framework' ),
			'all_items' 					=> _x( 'All Tags', 'sermons', 'churchthemes-framework' ),
			'parent_item' 					=> null,
			'parent_item_colon' 			=> null,
			'edit_item' 					=> _x( 'Edit Tag', 'sermons', 'churchthemes-framework' ),
			'update_item' 					=> _x( 'Update Tag', 'sermons', 'churchthemes-framework' ),
			'add_new_item' 					=> _x( 'Add Tag', 'sermons', 'churchthemes-framework' ),
			'new_item_name' 				=> _x( 'New Tag', 'sermons', 'churchthemes-framework' ),
			'separate_items_with_commas' 	=> _x( 'Separate tags with commas', 'sermons', 'churchthemes-framework' ),
			'add_or_remove_items' 			=> _x( 'Add or remove tags', 'sermons', 'churchthemes-framework' ),
			'choose_from_most_used' 		=> _x( 'Choose from the most used tags', 'sermons', 'churchthemes-framework' ),
			'menu_name' 					=> _x( 'Tags', 'sermon menu name', 'churchthemes-framework' )
		),
		'hierarchical'	=> false, // tag style instead of category style
		'public' 		=> ctc_taxonomy_supported( 'sermons', 'ctc_sermon_tag' ),
		'rewrite' 		=> array(
			'slug' 			=> 'sermon-tag',
			'with_front'	=> false,
			'hierarchical' 	=> true
		)
	);
	$args = apply_filters( 'ctc_taxonomy_sermon_tag_args', $args ); // allow filtering

	// Registration
	register_taxonomy(
		'ctc_sermon_tag',
		'ctc_sermon',
		$args
	);

}

add_action( 'init', 'ctc_register_taxonomy_sermon_tag' );

/**********************************
 * PERSON TAXONOMIES
 **********************************/

/**
 * Person group
 *
 * @since 0.9
 */
function ctc_register_taxonomy_person_group() {

	// Arguments
	$args = array(
		'labels' => array(
			'name' 							=> _x( 'Groups', 'taxonomy general name', 'churchthemes-framework' ),
			'singular_name'					=> _x( 'Group', 'taxonomy singular name', 'churchthemes-framework' ),
			'search_items' 					=> _x( 'Search Groups', 'people', 'churchthemes-framework' ),
			'popular_items' 				=> _x( 'Popular Groups', 'people', 'churchthemes-framework' ),
			'all_items' 					=> _x( 'All Groups', 'people', 'churchthemes-framework' ),
			'parent_item' 					=> null,
			'parent_item_colon' 			=> null,
			'edit_item' 					=> _x( 'Edit Group', 'people', 'churchthemes-framework' ),
			'update_item' 					=> _x( 'Update Group', 'people', 'churchthemes-framework' ),
			'add_new_item' 					=> _x( 'Add Group', 'people', 'churchthemes-framework' ),
			'new_item_name' 				=> _x( 'New Group', 'people', 'churchthemes-framework' ),
			'separate_items_with_commas' 	=> _x( 'Separate groups with commas', 'people', 'churchthemes-framework' ),
			'add_or_remove_items' 			=> _x( 'Add or remove groups', 'people', 'churchthemes-framework' ),
			'choose_from_most_used' 		=> _x( 'Choose from the most used groups', 'people', 'churchthemes-framework' ),
			'menu_name' 					=> _x( 'Groups', 'people menu name', 'churchthemes-framework' )
		),
		'hierarchical'	=> true, // category-style instead of tag-style
		'public' 		=> ctc_taxonomy_supported( 'people', 'ctc_person_group' ),
		'rewrite' 		=> array(
			'slug' 			=> 'group',
			'with_front' 	=> false,
			'hierarchical' 	=> true
		)
	);
	$args = apply_filters( 'ctc_taxonomy_person_group_args', $args ); // allow filtering

	// Registration
	register_taxonomy(
		'ctc_person_group',
		'ctc_person',
		$args
	);

}

add_action( 'init', 'ctc_register_taxonomy_person_group' );


/**
 * Taxonomy term options
 *
 * Returns ID/name pairs useful for creating select options and sanitizing on front-end.
 *
 * @since 0.9
 * @param string $taxonomy_name Taxonomy slug
 * @param array $prepend Array to start with such as "All" or similar
 * @return array ID/name pairs
 */
function ctc_term_options( $taxonomy_name, $prepend = array() ) {

	$options = array();

	if ( ! preg_match( '/^ctc_/', $taxonomy_name ) || ctc_taxonomy_supported( 'sermons', $taxonomy_name ) ) { // make sure CTC taxonomy support

		$terms = $categories = get_terms( $taxonomy_name );

		if ( ! empty( $prepend ) ) {
			$options = $prepend;
		}

		foreach ( $terms as $term ) {
			$options[$term->term_id] = $term->name;
		}

	}

	return apply_filters( 'ctc_term_options', $options, $taxonomy_name, $prepend );

}
