<?php
/*
Plugin Name: Event Manager Pro
Description: A plugin to manage event registrations with email confirmation and CSV export.
Version: 1.3
Author: Your Name
*/

defined('ABSPATH') or die('No script kiddies please!');

register_activation_hook(__FILE__, 'emp_create_db');
include_once plugin_dir_path(__FILE__) . 'includes/emp-functions.php';

function emp_enqueue_assets() {
    wp_enqueue_style('emp-style', plugin_dir_url(__FILE__) . 'assets/style.css');
    wp_enqueue_script('emp-script', plugin_dir_url(__FILE__) . 'assets/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'emp_enqueue_assets');

function emp_event_form_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/emp-event-form.php';
    return ob_get_clean();
}
add_shortcode('emp_event_form', 'emp_event_form_shortcode');

function emp_event_list_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/emp-event-list.php';
    return ob_get_clean();
}
add_shortcode('emp_event_list', 'emp_event_list_shortcode');

add_action('admin_post_emp_download_csv', 'emp_download_csv');
