<?php

function cp_plugin_options() {
    add_options_page('Color Palette', 'Color Palette', 'manage_options', 'cp_options', 'cp_options_display');
}

function cp_options_display() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    // Set up admin CSS and JS.
    wp_enqueue_style('cp-admin-styles', plugin_dir_url( __FILE__ ) . 'css/cp-styles.css');
    wp_enqueue_script('cp-admin-styles', plugin_dir_url( __FILE__ ) . 'js/cp-primary.js');

    // Get saved primary colors.
    $primaryColors = cp_get_primary_colors();

    // Display the options page.
    require('cp-admin-template.php');
}

function cp_get_primary_colors() {
    // Get already saved colors from options.
    $primaryColors = unserialize( get_option('primaryColors') );

    // Save updates if form posted.
    if (isset($_POST['hasUpdates']) && $_POST['hasUpdates'] == 'Y' ) {
        $primaryColors = $_POST['primaryColors'];

        // Resequence the array if values were deleted from the middle.
        $primaryColors = array_values($primaryColors);

        // Update prmary colors in the options.
        update_option( 'primaryColors', serialize($primaryColors) );

        // Put a "settings saved" message on the screen
        ?>
        <div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
        <?php
    }

    return $primaryColors;
}

add_action('admin_menu', 'cp_plugin_options');
