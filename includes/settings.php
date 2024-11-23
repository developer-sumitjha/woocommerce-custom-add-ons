<?php

// Define constants
define( 'PLUGIN_SLUG', 'wc-addon' );
define( 'PLUGIN_ROLE', 'manage_options' );
define( 'PLUGIN_DOMAIN', 'woocommerce-custom-add-ons' );

add_action( 'admin_menu', 'register_wc_addon_plugin_menu', 9 );

function register_wc_addon_plugin_menu() {
	add_menu_page(
		__( 'WC Addons', PLUGIN_DOMAIN ),
		'WC Addons',
		PLUGIN_ROLE,
		PLUGIN_SLUG,
		false,
		'dashicons-admin-generic',
		''
	);

	add_submenu_page(
		PLUGIN_SLUG,
		'WC Addon',
		'Dashboard',
		PLUGIN_ROLE,
		PLUGIN_SLUG,
		'wc_addon_plugin_dashboard_callback',
	);
    
    add_submenu_page(
        PLUGIN_SLUG,
        'WC Addon',
        'Setting',
        PLUGIN_ROLE,
        'wc-addon-setting',
        'wc_addon_plugin_setting_callback',
    );
}

function wc_addon_plugin_dashboard_callback(){
    $dashboard_output = '';
    echo $dashboard_output;
}

function wc_addon_plugin_setting_callback() {

    // Save settings if form is submitted and nonce is verified
    if (isset($_POST['submit']) && check_admin_referer('wc_addon_save_setting', 'wc_addon_plugin_nonce')) {
        $dashboard_stats = isset($_POST['dashboard-stats']) ? 'yes' : 'no';
        update_option('wc-dashboard-stats-status', $dashboard_stats);

        
    }

    // Retrieve the saved setting
    $dashboard_stats = get_option('wc-dashboard-stats-status', 'no');
    ?>

    <div class="wc-addon-setting-cont">

        <div class="wc-addon-header">
            <h1>Settings</h1>
        </div>

        <div class="wc-addon-setting-inner-section">
            <div class="wc-addon-setting-sidebar">
                <img src="<?php echo esc_url(PLUGIN_URL . '/assets/img/logo.png'); ?>" class="setting-logo">
            </div>

            <div class="wc-addon-setting-content">
                <h2>General Setting</h2>
                <p>Configure the plugin general setting</p>

                <hr>

                <div class="general-setting-form">
                    <form method="post" action="">
                        <?php wp_nonce_field('wc_addon_save_setting', 'wc_addon_plugin_nonce'); ?>
                        
                        <div class="row">
                            <label for="dashboard-stats">Dashboard Stats</label>
                            <input type="checkbox" id="dashboard-stats" name="dashboard-stats" <?php checked($dashboard_stats, 'yes'); ?>>
                        </div>

                        <input type="submit" name="submit" value="Save Settings">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
}
