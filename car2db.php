<?php

/**
 * @link              https://car2db.com/
 * @since             1.0.0
 * @package           Car2db
 *
 * @wordpress-plugin
 * Plugin Name:       Car2DB
 * Plugin URI:        https://car2db.com/
 * Description:       Car Make, Model, Serie selection widget with ajax autocomplete from the database. Uses Car2DB data structure.
 * Version:           1.0.0
 * Author:            Car2DB dev team
 * Author URI:        https://car2db.com/
 * License:           Apache License 2.0
 * License URI:       http://www.apache.org/licenses/
 * Text Domain:       car2db
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CAR2DB_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_car2db() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-car2db-activator.php';
	Car2db_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-car2db-deactivator.php
 */
function deactivate_car2db() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-car2db-deactivator.php';
	Car2db_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_car2db' );
register_deactivation_hook( __FILE__, 'deactivate_car2db' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-car2db.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_car2db() {

	$plugin = new Car2db();
	$plugin->run();

}
run_car2db();
