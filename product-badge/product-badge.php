<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://cedcoss.com/
 * @since             1.0.0
 * @package           Product_Badge
 *
 * @wordpress-plugin
 * Plugin Name:       Product Badge
 * Plugin URI:        https://cedcoss.com/
 * Description:       This Plugins is use for WooCommerce Product Badge
 * Version:           1.0.0
 * Author:            Abdullah Shaikh
 * Author URI:        https://cedcoss.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       product-badge
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
define( 'PRODUCT_BADGE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-product-badge-activator.php
 */
function activate_product_badge() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-product-badge-activator.php';
	// Product_Badge_Activator::activate();
	$activate = new Product_Badge_Activator();
	$activate->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-product-badge-deactivator.php
 */
function deactivate_product_badge() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-product-badge-deactivator.php';
	// Product_Badge_Deactivator::deactivate();
	$deactivate = new Product_Badge_Deactivator();
	$deactivate->deactivate();
}

register_activation_hook( __FILE__, 'activate_product_badge' );
register_deactivation_hook( __FILE__, 'deactivate_product_badge' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-product-badge.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_product_badge() {

	$plugin = new Product_Badge();
	$plugin->run();

}
run_product_badge();
