<?php

// Load CSS and JS on the frontend
function woocommerce_custom_addons_scripts()
{

  // css
  wp_register_style(
    'woocommerce-custom-addons-style',
    PLUGIN_URL . 'public/css/style.css',
    [],
    time()
  );
  wp_register_style(
    'woocommerce-custom-addons-accounts-style',
    PLUGIN_URL . 'public/css/accounts.css',
    [],
    time()
  );
  

  // js
  wp_register_script(
    'woocommerce-custom-addons-script',
    PLUGIN_URL . 'public/js/script.js',
    ['jquery'],
    time()
  );

  wp_enqueue_style('woocommerce-custom-addons-style');
  
  wp_enqueue_style('woocommerce-custom-addons-accounts-style');


  wp_enqueue_script('woocommerce-custom-addons-script');

  
// wp_enqueue_style('admin-styles', PLUGIN_URL . 'admin/css/admin.css', array(), '1.0.0', false);
}

