<?php
// If uninstall not called from WordPress, then exit
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Delete options
delete_option('service_area_pros_settings');

// Delete any custom post types and their data
$service_areas = get_posts(array('post_type' => 'service_area', 'numberposts' => -1));
foreach ($service_areas as $service_area) {
    wp_delete_post($service_area->ID, true);
}

// Remove any custom database tables
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}service_area_pros_data");
