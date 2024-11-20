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

  // js
  wp_register_script(
    'woocommerce-custom-addons-script',
    PLUGIN_URL . 'public/js/script.js',
    ['jquery'],
    time()
  );

  wp_enqueue_style('woocommerce-custom-addons-style');
  wp_enqueue_script('woocommerce-custom-addons-script');
}
