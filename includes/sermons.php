<?php
/**
 * Sermon Functions
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
 * SERMON ARCHIVES
 **********************************/

/**
 * Enable date archives for sermon posts
 *
 * At time of making, WordPress (3.6 and possibly later) does not support dated archives for custom post types as it does for standard posts
 * This injects rules so that URL's like /cpt/2012/05 can be used with the custom post type archive template.
 * Refer to ctc_cpt_date_archive_setup() for full details.
 *
 * Use add_theme_support( 'ctc-sermon-date-archive' )
 *
 * @since 0.9
 * @param object $wp_rewrite object
 */
function ctc_sermon_date_archive( $wp_rewrite ) {

	// Theme supports this?
	if ( ! current_theme_supports( 'ctc-sermon-date-archive' ) ) {
		return;
	}

	// Post types to setup date archives for
	$post_types = array(
		'ctc_sermon'
	);

	// Do it
	ctc_cpt_date_archive_setup( $post_types, $wp_rewrite );

}

add_action( 'generate_rewrite_rules', 'ctc_sermon_date_archive' ); // enable date archive for sermon post type

/**********************************
 * SERMON DATA
 **********************************/

/**
 * Get sermon data
 *
 * @since 0.9
 * @param int $post_id Post ID to get data for; null for current post
 * @return array Sermon data
 */
function ctc_sermon_data( $post_id = null ) {

	// Get meta values
	$data = ctc_get_meta_data( array( // without _ctc_sermon_ prefix
		'video',		// URL to uploaded file, external file, external site with oEmbed support, or manual embed code (HTML or shortcode)
		'audio',		// URL to uploaded file, external file, external site with oEmbed support, or manual embed code (HTML or shortcode)
		'pdf',			// URL to uploaded file or external file
		'has_full_text'
	), $post_id );

	// Get media player code
	// Embed code generated from uploaded file, URL for file on other site, page on oEmbed-supported site, or manual embed code (HTML or shortcode)
	$data['video_player'] = ctc_embed_code( $data['video'] );
	$data['audio_player'] = ctc_embed_code( $data['audio'] );

	// Get download URL's
	// Only local files can have "Save As" forced
	// Only local files can are always actual files, not pages (ie. YouTube, SoundCloud, etc.)
	// Video and Audio URL's may be pages on other site (YouTube, SoundCloud, etc.), so provide download URL only for local files
	// PDF is likely always to be actual file, so provide download URL no matter what (although cannot force "Save As" on external sites)
	$data['video_download_url'] = ctc_is_local_url( $data['video'] ) ? ctc_force_download_url( $data['video'] ) : ''; // provide URL only if local so know it is actual file (not page) and can force "Save As"
	$data['audio_download_url'] = ctc_is_local_url( $data['audio'] ) ? ctc_force_download_url( $data['audio'] ) : ''; // provide URL only if local so know it is actual file (not page) and can force "Save As"
	$data['pdf_download_url'] = ctc_force_download_url( $data['pdf'] ); // provide URL only if local so know it is actual file (not page) and can force "Save As"

	// Return filtered
	return apply_filters( 'ctc_sermon_data', $data );

}

/**
	 * Get sermons
	 *
	 * This can optionally be used by the template.
	 * $this->instance is sanitized before being made available here.
	 *
	 * @since 0.9
	 * @return array Posts for widget template
	 */
	function ctc_get_sermons( $instance ) {

		// Base arguments
		$args = array(
			'post_type'       	=> 'ctc_sermon',
			'orderby'         	=> $instance['orderby'],
			'order'           	=> $instance['order'],
			'numberposts'     	=> $instance['limit'],
			'suppress_filters'	=> false // keep WPML from showing posts from all languages: http://bit.ly/I1JIlV + http://bit.ly/1f9GZ7D
		);

		// Topic argument
		if ( 'all' != $instance['topic'] && $topic_term = get_term( $instance['topic'], 'ctc_sermon_topic' ) ) {
			$args['ctc_sermon_topic'] = $topic_term->slug;
		}

		// Book argument
		if ( 'all' != $instance['book'] && $book_term = get_term( $instance['book'], 'ctc_sermon_book' ) ) {
			$args['ctc_sermon_book'] = $book_term->slug;
		}

		// Series argument
		if ( 'all' != $instance['series'] && $series_term = get_term( $instance['series'], 'ctc_sermon_series' ) ) {
			$args['ctc_sermon_series'] = $series_term->slug;
		}

		// Speaker argument
		if ( 'all' != $instance['speaker'] && $speaker_term = get_term( $instance['speaker'], 'ctc_sermon_speaker' ) ) {
			$args['ctc_sermon_speaker'] = $speaker_term->slug;
		}

		// Get posts
		$posts = get_posts( $args );

		// Return filtered
		return apply_filters( 'ctc_sermons_widget_get_posts', $posts );

	}
