<?php

function check_dashboard_stats_and_execute() {
    // Retrieve the saved setting
    $dashboard_stats = get_option('wc-dashboard-stats-status', 'no');

    // Check if the checkbox was checked
    if ($dashboard_stats === 'yes') {
        // Call your custom function for frontend
       
        add_action('woocommerce_account_dashboard','get_user_order_count');
    }
}