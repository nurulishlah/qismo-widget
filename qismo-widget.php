<?php

/**
 * @link              https://ishlah.github.io
 * @since             0.1.0
 * @package           Qismo_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Qiscus Multichannel Widget
 * Plugin URI:        https://github.com/nurulishlah/qismo-widget
 * Description:       A simple plugin to integrate Qiscus Multichannel Customer Service (Qismo) Widget into WordPress Site
 * Version:           0.8.0
 * Author:            Qiscus Tekno Indonesia
 * Author URI:        https://www.qiscus.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       qismo-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'QISMO_WIDGET_VERSION', '0.8.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-qismo-widget-activator.php
 */
function activate_qismo_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-qismo-widget-activator.php';
	Qismo_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-qismo-widget-deactivator.php
 */
function deactivate_qismo_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-qismo-widget-deactivator.php';
	Qismo_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_qismo_widget' );
register_deactivation_hook( __FILE__, 'deactivate_qismo_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-qismo-widget.php';

/**
 * Begins execution of the plugin.
 *
 * @since    0.1.0
 */
function run_qismo_widget() {

	$plugin = new Qismo_Widget();
	$plugin->run();

}
run_qismo_widget();
