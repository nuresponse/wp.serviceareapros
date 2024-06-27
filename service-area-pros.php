<?php
/**
 * Plugin Name: Service Area Pros
 * Plugin URI: https://serviceareapros.com
 * Description: A plugin for managing service area landing pages. Designed for local service companies & service professionals.
 * Version: 1.0.0
 * Author: Mark Dayley
 * Author URI: https://serviceareapros.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: service-area-pros
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Define plugin constants
define('SERVICE_AREA_PROS_VERSION', '1.0.0');
define('SERVICE_AREA_PROS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SERVICE_AREA_PROS_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * The code that runs during plugin activation.
 */
function activate_service_area_pros() {
    require_once SERVICE_AREA_PROS_PLUGIN_DIR . 'includes/class-service-area-pros-activator.php';
    Service_Area_Pros_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_service_area_pros() {
    require_once SERVICE_AREA_PROS_PLUGIN_DIR . 'includes/class-service-area-pros-deactivator.php';
    Service_Area_Pros_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_service_area_pros');
register_deactivation_hook(__FILE__, 'deactivate_service_area_pros');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require_once SERVICE_AREA_PROS_PLUGIN_DIR . 'includes/class-service-area-pros.php';

/**
 * Begins execution of the plugin.
 */
function run_service_area_pros() {
    $plugin = new Service_Area_Pros();
    $plugin->run();
}
run_service_area_pros();

