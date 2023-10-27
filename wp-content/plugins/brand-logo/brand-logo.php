<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.visualvisitor.com
 * @since             1.0.0
 * @package           Brand_Logo
 *
 * @wordpress-plugin
 * Plugin Name:       Brand Logo
 * Plugin URI:        https://www.visualvisitor.com
 * Description:       This Plugin is used for Brand Logo Slider
 * Version:           1.0.0
 * Author:            Zignuts
 * Author URI:        https://www.visualvisitor.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       brand-logo
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
define( 'BRAND_LOGO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-brand-logo-activator.php
 */
function activate_brand_logo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-brand-logo-activator.php';
	Brand_Logo_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-brand-logo-deactivator.php
 */
function deactivate_brand_logo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-brand-logo-deactivator.php';
	Brand_Logo_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_brand_logo' );
register_deactivation_hook( __FILE__, 'deactivate_brand_logo' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-brand-logo.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_brand_logo() {

	$plugin = new Brand_Logo();
	$plugin->run();

}
run_brand_logo();
