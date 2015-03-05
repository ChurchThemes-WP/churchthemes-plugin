<?php
/**
 * Theme Activation
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

/********************************************
 * AFTER ACTIVATION
 ********************************************/

/**
 * After Theme Activation
 *
 * Themes can request certain things to be done after activation:
 *
 *		add_theme_support( 'ctc-after-activation', array(
 *			'flush_rewrite_rules'	=> true,
 *			'replace_notice'		=> sprintf( __( 'Please follow the <a href="%s">Next Steps</a> now that the theme has been activated.', 'your-theme-textdomain' ), 'http://Steven Gliebe/guides/user/getting-started/' )
 *   	) );
 *
 * This does not affect the Customizer preview.
 *
 * @since 0.9
 * @global object $wp_rewrite
 */
function ctc_after_activation() {

	global $wp_rewrite;

	// Theme was just activated
	if ( ! empty( $_GET['activated'] ) ) {

		// Does theme support this?
		$support = get_theme_support( 'ctc-after-activation' );
		if ( $support ) {

			// What to do
			$activation_tasks = isset( $support[0] ) ? $support[0] : array();

			// Update .htaccess to make sure friendly URL's are in working order
			if ( ! empty( $activation_tasks['flush_rewrite_rules'] ) ) {
				flush_rewrite_rules();
			}

			// Show notice to user
			if ( ! empty( $activation_tasks['notice'] ) ) {

				add_action( 'admin_notices', 'ctc_activation_notice', 5 ); // show above other notices

				// Hide default notice
				if ( ! empty( $activation_tasks['hide_default_notice'] ) ) {
					add_action( 'admin_head', 'ctc_hide_default_activation_notice' );
				}

			}

		}

	}

}

add_action( 'load-themes.php', 'ctc_after_activation' );

/********************************************
 * NOTICES
 ********************************************/

/**
 * Message to show to user after activation
 *
 * Hooked in ctc_after_activation().
 *
 * @since 0.9
 */
function ctc_activation_notice() {

	// Get notice if supported by theme
	$support = get_theme_support( 'ctc-after-activation' );
	$notice = ! empty( $support[0]['notice'] ) ? $support[0]['notice'] : '';

	// Show notice if have it
	if ( $notice ) {

		?>
		<div id="ctc-activation-notice" class="updated">
			<p>
				<?php echo $notice; ?>
			</p>
		</div>
		<?php

	}

}

/**
 * Hide default activation notice
 *
 * @since 0.9
 */
function ctc_hide_default_activation_notice() {

	echo '<style>#message2{ display: none; }</style>';

}