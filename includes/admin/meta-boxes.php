<?php
/**
 * Meta Boxes
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
 * CT Meta Box setup
 *
 * The actual class is included by ctc_include_files() in framework.php.
 * This is done here instead of there so ctc_theme_url() is available to use.
 *
 * @since 0.9
 */
function ctc_ctmb_setup() {

	if ( ! defined( 'CTMB_URL' ) ) { // in case also used in plugin
		define( 'CTMB_URL', CTC_URL . '/' . CTC_LIB_DIR . '/ct-meta-box' ); // for enqueing JS/CSS
	}

}

add_filter( 'after_setup_theme', 'ctc_ctmb_setup' ); // very early
