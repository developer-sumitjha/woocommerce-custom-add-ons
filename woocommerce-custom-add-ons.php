<?php
/*
 * Plugin Name:       WooCommerce Custom Add-ons Plugin
 * Plugin URI:        https://sumitjha.info.np/
 * Description:       Woocommerce Custom Add ons Plugin to add additional feature to ecommerce website.
 * Version:           1.0
 * Author:            Sumit Jha
 * Author URI:        https://sumitjha.info.np/
 * Requires Plugins:  woocommerce
 */

 //  Setup
 define('PLUGIN_URL', plugin_dir_url(__FILE__));

// Includes

 include('front/enqueue.php');
 include('includes/settings.php');

 include('includes/accounts.php');
 include('includes/setting-logic.php');


//  Hooks
add_action('wp_enqueue_scripts', 'woocommerce_custom_addons_scripts', 100);

wp_enqueue_style('wc-addons-admin-styles', plugin_dir_url( __FILE__ ) . 'admin/css/admin.css', array(), '1.0.0', false);





// Hook this function to run on the frontend
add_action('wp_enqueue_scripts', 'check_dashboard_stats_and_execute');