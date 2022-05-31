<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://bowo.io
 * @since             1.0.0
 * @package           Database_Admin
 *
 * @wordpress-plugin
 * Plugin Name:       Database Admin
 * Plugin URI:        https://wordpress.org/plugins/database-admin/
 * Description:       Securely manage your website's database with a clean and user-friendly interface.
 * Version:           1.0.1
 * Author:            Bowo
 * Author URI:        https://bowo.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       database-admin
 * Domain Path:       /languages
 * GitHub Plugin URI: qriouslad/database-admin
 * GitHub Plugin URI: https://github.com/qriouslad/database-admin
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
define( 'DATABASE_ADMIN_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-database-admin-activator.php
 */
function activate_database_admin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-database-admin-activator.php';
	Database_Admin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-database-admin-deactivator.php
 */
function deactivate_database_admin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-database-admin-deactivator.php';
	Database_Admin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_database_admin' );
register_deactivation_hook( __FILE__, 'deactivate_database_admin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-database-admin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_database_admin() {

	$plugin = new Database_Admin();
	$plugin->run();

}
run_database_admin();
