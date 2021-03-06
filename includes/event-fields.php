<?php
/**
 * Event Fields
 *
 * Global event field functions (ie. functions necessary outside of admin area)
 *
 * @package    ChurchThemes_Framework
 * @subpackage Functions
 * @copyright  Copyright (c) 2015, churchthemes.net
 * @copyright  Copyright (c) 2013 - 2015, Steven Gliebe
 * @link       https://github.com/churchthemes-wp/churchthemes-plugin
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      1.2
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**********************************
 * META DATA
 **********************************/

/**
 * Update Date/Time Hidden Fields
 *
 * Date and Time fields are combined into one field for easier ordering (simpler queries)
 *
 * If no date, value will be 0000-00-00 00:00:00
 * If no time, value will be 2014-10-28 00:00:00
 *
 * This is run after an event is saved and after an event recurs.
 *
 * @since 1.2
 * @param int $post_id Post ID
 */
function ctc_update_event_date_time( $post_id ) {

	// Get Start/End Date and Time fields
	$start_date 	= get_post_meta( $post_id, '_ctc_event_start_date', true );
	$end_date 		= get_post_meta( $post_id, '_ctc_event_end_date', true );
	$start_time 	= get_post_meta( $post_id, '_ctc_event_start_time', true );
	$end_time 		= get_post_meta( $post_id, '_ctc_event_end_time', true );

	// Combine dates and times
	$start_date_start_time 	= ctc_convert_to_datetime( $start_date, $start_time );	// Useful for ordering upcoming events (soonest to farthest)
	$start_date_end_time  	= ctc_convert_to_datetime( $start_date, $end_time ); 	// It's possible there will be a use for this combination
	$end_date_start_time  	= ctc_convert_to_datetime( $end_date, $start_time );	// Useful for ordering past events (those ended most recently first)
	$end_date_end_time  	= ctc_convert_to_datetime( $end_date, $end_time );  	// It's possible there will be a use for this combination

	// Update date/time fields
	update_post_meta( $post_id, '_ctc_event_start_date_start_time', $start_date_start_time );
	update_post_meta( $post_id, '_ctc_event_start_date_end_time', $start_date_end_time );
	update_post_meta( $post_id, '_ctc_event_end_date_start_time', $end_date_start_time );
	update_post_meta( $post_id, '_ctc_event_end_date_end_time', $end_date_end_time );

}

/*************************************************
 * DATES
 *************************************************/
/**
 * Convert date and time to MySQL DATETIME format
 *
 * If no date, value will be 0000-00-00 00:00:00
 * If no time, value will be 2014-10-28 00:00:00
 *
 * @since 1.2
 * @param string $date Date in YYYY-mm-dd format (e.g. 2014-05-10 for May 5th, 2014)
 * @param string $time Time in 24-hour hh-mm format (e.g. 08:00 for 8 AM or 13:12 for 1:12 PM)
 * @return string Date and time in DATETIME format (e.g. 2014-05-10 13:12:00)
 */
function ctc_convert_to_datetime( $date, $time ) {
	if ( empty( $date ) ) {
		$date = '0000-00-00';
	}
	if ( empty( $time ) ) {
		$time = '00:00';
	}
	$datetime = $date . ' ' . $time . ':00';
	return apply_filters( 'ctc_convert_to_datetime', $datetime, $date, $time );
}
