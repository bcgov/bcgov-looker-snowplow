<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://cos.citz.gov.bc.ca/jira/browse/WD-608
 * @since             1.0.0
 * @package           BCGov_Looker_Snowplow
 *
 * @wordpress-plugin
 * Plugin Name:       BCGov Looker Snowplow
 * Plugin URI:        https://cos.citz.gov.bc.ca/jira/browse/WD-608
 * Description:       This plugin is used to interface with the new analytics tools, Snowplow and Looker.
 * Version:           1.0.1
 * Author:            Steve Howard
 * Author URI:        https://cos.citz.gov.bc.ca/jira/secure/ViewProfile.jspa?name=smhoward%40idir/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bcgov-looker-snowplow
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bcgov-looker-snowplow-activator.php
 */
function activate_bcgov_looker_snowplow() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bcgov-looker-snowplow-activator.php';
	BCGov_Looker_Snowplow_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bcgov-looker-snowplow-deactivator.php
 */
function deactivate_bcgov_looker_snowplow() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bcgov-looker-snowplow-deactivator.php';
	BCGov_Looker_Snowplow_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bcgov_looker_snowplow' );
register_deactivation_hook( __FILE__, 'deactivate_bcgov_looker_snowplow' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bcgov-looker-snowplow.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bcgov_looker_snowplow() {

	$plugin = new BCGov_Looker_Snowplow();
	$plugin->run();

}
run_bcgov_looker_snowplow();
