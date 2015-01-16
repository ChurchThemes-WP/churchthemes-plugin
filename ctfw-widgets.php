<?php
/*
* Plugin Name: Church Theme Framework Widgets
* Version: 0.1.1
*/


// No direct access
if ( ! defined( 'ABSPATH' ) ){
	// init function to define variables and call setup
	exit;
}

class ChurchThemeFrameworkWidgets {

	// define plugin directory
	public static function init() {

		// bail if the CTFW_Widget class is loaded elsewhere
		if( class_exists( 'CTFW_Widget' ) ){
			return;
		}

		$pluginDir = untrailingslashit( plugin_dir_path( __FILE__ ) );
		$pluginURL = untrailingslashit( plugin_dir_url( __FILE__ ) );

		define( 'CTFW_INC_DIR', $pluginDir . '/includes' );
		define( 'CTFW_CLASS_DIR', CTFW_INC_DIR . '/classes' );
		define( 'CTFW_ADMIN_DIR', CTFW_INC_DIR . '/admin' );
		define( 'CTFW_WIDGET_TEMPLATE_DIR', CTFW_INC_DIR . '/widget-templates' );
		define( 'CTFW_JS_DIR', CTFW_INC_DIR . '/js' );
		define( 'CTFW_CSS_DIR', CTFW_INC_DIR . '/css' );
		define( 'CTFW_JS_DIR_URL', $pluginURL . '/js' );
		define( 'CTFW_CSS_DIR_URL', $pluginURL . '/css' );

        add_action( 'plugins_loaded', array( __CLASS__, 'setup') );

    }

    public static function setup() {

		self::loadIncludes();

		add_action( 'widgets_init', array( __CLASS__, 'registerWidgets' ) );

    }

	public static function loadIncludes() {

		$includes = array(

		   // Frontend or Admin
		   'always' => array(

				CTFW_INC_DIR . '/gallery.php',
				CTFW_INC_DIR . '/taxonomies.php',
				CTFW_CLASS_DIR . '/widget.php',

		   ),

		   // Admin Only
		   'admin' => array(

				CTFW_ADMIN_DIR . '/admin-enqueue-scripts.php',
				CTFW_ADMIN_DIR . '/admin-enqueue-styles.php',
				CTFW_ADMIN_DIR . '/admin-widgets.php',

		   ),

		   // Frontend Only
		   'frontend' => array (

			CTFW_INC_DIR . '/archives.php',
			CTFW_INC_DIR . '/conditions.php',
			CTFW_INC_DIR . '/downloads.php',
			CTFW_INC_DIR . '/embeds.php',
			CTFW_INC_DIR . '/events.php',
			CTFW_INC_DIR . '/helpers.php',
			CTFW_INC_DIR . '/locations.php',
			CTFW_INC_DIR . '/maps.php',
			CTFW_INC_DIR . '/meta-data.php',
			CTFW_INC_DIR . '/people.php',
			CTFW_INC_DIR . '/posts.php',
			CTFW_INC_DIR . '/sermons.php',
			CTFW_INC_DIR . '/template-tags.php',

		   ),

	   );

		// Check condition
		foreach ( $includes as $condition => $files ) {

			if( ( $condition == 'admin' && ! is_admin() ) || ( $condition == 'frontend' && is_admin() ) ){
				continue;
			}


			foreach ( $files as $file ) {

				if( file_exists( $file ) ){
					include_once( $file );
				}

			}


		}

	}

	public static function widgetList(){
		$widgets = array(

			// widget class name
			'ctfw-categories' => array(

				// filename of class in framework class directory
				'class' => 'CTFW_Widget_Categories',

				// filename of template in widget-templates directory
				'class_file' => 'widget-categories.php',

				// requires Church Theme Content plugin to be active
				'template_file' => 'widget-categories.php',

				// add_theme_support() feature required (can be empty)
				'ctc_required' => false,

				// additional features theme must support for widget to register
				'theme_support' => 'ctfw-widget-categories',

				'theme_support_required' => array(),
				// widgets to unregister when this is registered
				'icon' => 'dashicons-microphone',

				'unregister' => array(
					'WP_Widget_Categories'
				),
			),
			'ctfw-posts' => array(
				'class' => 'CTFW_Widget_Posts',
				'class_file' => 'widget-posts.php',
				'template_file' => 'widget-posts.php',
				'ctc_required' => false,
				'theme_support' => 'ctfw-widget-posts',
				'theme_support_required' => array(),
				'unregister' => array(
					'WP_Widget_Recent_Posts'
				)
			),
			'ctfw-sermons' => array(
				'class' => 'CTFW_Widget_Sermons',
				'class_file' => 'widget-sermons.php',
				'template_file' => 'widget-sermons.php',
				'ctc_required' => true,
				'theme_support' => 'ctfw-widget-sermons',
				'theme_support_required' => array(
					'ctc-sermons',
				),
				'unregister' => array(),
			),
			'ctfw-events' => array(
				'class' => 'CTFW_Widget_Events',
				'class_file' => 'widget-events.php',
				'template_file' => 'widget-events.php',
				'ctc_required' => true,
				'theme_support' => 'ctfw-widget-events',
				'theme_support_required' => array(
					'ctc-events',
				),
				'unregister' => array(),
			),
			'ctfw-gallery' => array(
				'class' => 'CTFW_Widget_Gallery',
				'class_file' => 'widget-gallery.php',
				'template_file' => 'widget-gallery.php',
				'ctc_required' => false, // uses native WordPress galleries
				'theme_support' => 'ctfw-widget-gallery',
				'theme_support_required' => array(),
				'unregister' => array(),
			),
			'ctfw-galleries' => array(
				'class' => 'CTFW_Widget_Galleries',
				'class_file' => 'widget-galleries.php',
				'template_file' => 'widget-galleries.php',
				'ctc_required' => false, // uses native WordPress galleries
				'theme_support' => 'ctfw-widget-galleries',
				'theme_support_required' => array(),
				'unregister' => array(),
			),
			'ctfw-people' => array(
				'class' => 'CTFW_Widget_People',
				'class_file' => 'widget-people.php',
				'template_file' => 'widget-people.php',
				'ctc_required' => true,
				'theme_support' => 'ctfw-widget-people',
				'theme_support_required' => array(
					'ctc-people',
				),
				'unregister' => array(),
			),
			'ctfw-locations' => array(
				'class' => 'CTFW_Widget_Locations',
				'class_file' => 'widget-locations.php',
				'template_file' => 'widget-locations.php',
				'ctc_required' => true,
				'theme_support' => 'ctfw-widget-locations',
				'theme_support_required' => array(
					'ctc-locations',
				),
				'unregister' => array(),
			),
			'ctfw-archives' => array(
				'class' => 'CTFW_Widget_Archives',
				'class_file' => 'widget-archives.php',
				'template_file' => 'widget-archives.php',
				'ctc_required' => false,
				'theme_support' => 'ctfw-widget-archives',
				'theme_support_required' => array(),
				'unregister' => array(
					'WP_Widget_Archives'
				)
			),
			'ctfw-giving' => array(
				'class' => 'CTFW_Widget_Giving',
				'class_file' => 'widget-giving.php',
				'template_file' => 'widget-giving.php',
				'ctc_required' => false,
				'theme_support' => 'ctfw-widget-giving',
				'theme_support_required' => array(),
				'unregister' => array(),
			),
			'ctfw-slide' => array(
				'class' => 'CTFW_Widget_Slide',
				'class_file' => 'widget-slide.php',
				'template_file' => 'widget-slide.php',
				'ctc_required' => false,
				'theme_support' => 'ctfw-widget-slide',
				'theme_support_required' => array(),
				'unregister' => array(),
			),
			'ctfw-highlight' => array(
				'class' => 'CTFW_Widget_Highlight',
				'class_file' => 'widget-highlight.php',
				'template_file' => 'widget-highlight.php',
				'ctc_required' => false,
				'theme_support' => 'ctfw-widget-highlight',
				'theme_support_required' => array(),
				'unregister' => array(),
			),

		);

		return $widgets;
	}

	public static function ctcActive(){
		return is_plugin_active( 'church-theme-content/church-theme-content.php' );
	}

	public static function registerWidgets() {

		$widgets = self::widgetList();


		$ctcActive = self::ctcActive();


		foreach ( $widgets as $widget_id => $widget_data ) {

			// skip widget if it requires the church themes content plugin but the plugin isn't active
			if( $widget_data['ctc_required'] && ! $ctcActive ){
				continue;
			}


			$widget_class_path = trailingslashit( CTFW_CLASS_DIR ) . $widget_data['class_file'];

			if ( file_exists( $widget_class_path ) ) {

				include_once( $widget_class_path );

				register_widget( $widget_data['class'] );

				if ( isset( $widget_data['unregister'] ) ) {
					foreach ( $widget_data['unregister'] as $unregister_widget ) {
						unregister_widget( $unregister_widget );
					}
				}

			}


		}

	}

}

ChurchThemeFrameworkWidgets::init();