<?php

/*-----------------------------------------------------------------------------------*/
/* Define Theme Constants
/*-----------------------------------------------------------------------------------*/

define( 'SD_FRAMEWORK', get_template_directory() .'/framework/' );
define( 'SD_FRAMEWORK_INC', get_template_directory() .'/framework/inc/' );
define( 'SD_FRAMEWORK_CSS', get_template_directory_uri() .'/framework/css/' );
define( 'SD_FRAMEWORK_JS', get_template_directory_uri() .'/framework/js/' );

// Define content width
if ( ! isset( $content_width ) ) $content_width = 1170;

/* ------------------------------------------------------------------------ */
/* Localization
/* ------------------------------------------------------------------------ */

$lang = SD_FRAMEWORK . '/lang';
load_theme_textdomain('sd-framework', $lang);

/* ------------------------------------------------------------------------ */
/* Inlcudes
/* ------------------------------------------------------------------------ */

// Enqueue JavaScripts & CSS
require_once( SD_FRAMEWORK_INC . 'enqueue.php');
	
// Theme Functions
require_once( SD_FRAMEWORK_INC . 'sd-theme-functions/sd-functions.php' );

// Include Widgets
require_once( SD_FRAMEWORK_INC . 'widgets/widgets.php' );
	
// Posts 2 Posts
require_once( SD_FRAMEWORK_INC . 'connection-types.php' );
	
// Visual Composer
if ( class_exists( 'Vc_Manager' ) ) {
	require_once( SD_FRAMEWORK_INC . 'vc/sd-vc-functions.php' );
}
	
// Redux Theme Options
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/admin/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/admin/ReduxCore/framework.php' );
}

if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/admin/sd-admin-options/sd-admin-options.php' ) ) {
	require_once( dirname( __FILE__ ) . '/admin/sd-admin-options/sd-admin-options.php' );
}
	
/* Include Meta Box Script */
if ( !function_exists( 'sd_load_meta_box_plugin' ) ) {
	function sd_load_meta_box_plugin() {
		// Re-define meta box path and URL
		define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/framework/inc/metabox' ) );
		define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/framework/inc/metabox' ) );
		require_once RWMB_DIR . 'meta-box.php';
		include 'framework/inc/metabox/the-meta-boxes.php';
	}
	add_action('init', 'sd_load_meta_box_plugin');
}

/* TGMA Automatic Plugin Activation */
require_once( SD_FRAMEWORK_INC . 'tgma/plugin-activation.php' );
require_once( SD_FRAMEWORK_INC . 'tgma/sd-tgma.php' );
	
// WP Advanced Search
// http://wpadvancedsearch.com
require_once( SD_FRAMEWORK_INC . 'wp-advanced-search/wpas.php' );
require_once( SD_FRAMEWORK_INC . 'wp-advanced-search/sd-wp-advanced-search.php' );	

//New Menu
function register_my_menu() {
register_nav_menu('otro-menu',__( 'New Menu' ));
}
add_action( 'init', 'register_my_menu' );