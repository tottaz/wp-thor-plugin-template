<?php
/*
Plugin Name: WP Thor Plugin Template
Plugin URI:
Description: This is a template for building WordPress plugins.
Version: 1.3
Author: ThunderBear Design
Author URI: http://thunderbeardesign.com
Build: 1.3
*/

// Prevent direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
    header( 'HTTP/1.0 403 Forbidden' );
    echo 'This file should not be accessed directly!';
    exit; // Exit if accessed directly
}

//
define('THORPLUGINTEMPLATE_VERSION', '1.3');
define('THORPLUGINTEMPLATE_PLUGIN_URL', WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)));
define('THORPLUGINTEMPLATE_PLUGIN_PATH', WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)));
define('THORPLUGINTEMPLATE_PLUGIN_FILE_PATH', WP_PLUGIN_DIR . '/' . plugin_basename(__FILE__));
define('THORPLUGINTEMPLATE_SL_STORE_URL', 'https://thunderbeardesign.com' ); 
define('THORPLUGINTEMPLATE_SL_ITEM_NAME', 'WP Thor Plugin Template' );
// the name of the settings page for the license input to be displayed
define('THORPLUGINTEMPLATE_PLUGIN_LICENSE_PAGE', 'thor_custom_plugin_template_admin&tab=licenses' );

if( !class_exists( 'EDDPLUGINTEMPLATE_SL_Plugin_Updater' ) ) {
	// load our custom updater
	require_once THORPLUGINTEMPLATE_PLUGIN_PATH . '/app/edd-include/EDDPLUGINTEMPLATE_SL_Plugin_Updater.php';
}

$license_key = trim( get_option( 'edd_thor_ptemp_license_key' ) );
// setup the updater
$edd_updater = new EDDPLUGINTEMPLATE_SL_Plugin_Updater( THORPLUGINTEMPLATE_SL_STORE_URL, __FILE__, array( 
		'version' 	=> '1.3', 			// current version number
		'license' 	=> $license_key, 	// license key (used get_option above to retrieve from DB)
		'item_name'	=> urlencode( THORPLUGINTEMPLATE_SL_ITEM_NAME ), 	// name of this plugin
		'author' 	=> 'ThunderBear Design',  // author of this plugin
		'url'      	=> home_url()
	)
);

//Load The Admin Class
if (!class_exists('ThorPluginTempAdmin')) {
    require_once THORPLUGINTEMPLATE_PLUGIN_PATH . '/app/classes/ThorPluginTempAdmin.class.php';
}

$obj = new ThorPluginTempAdmin(); //initiate admin object    

?>