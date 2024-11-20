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
//  include('includes/breadcrumbs.php');
 include('front/enqueue.php');


//  Hooks
add_action('wp_enqueue_scripts', 'woocommerce_custom_addons_scripts', 100);