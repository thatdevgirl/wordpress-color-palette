<?php

function cp_plugin_options() {
    add_options_page('Color Palette', 'Color Palette', 'manage_options', 'cp_options', 'cp_display_admin');
}

function cp_display_admin() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    // Set up admin CSS and JS.
    wp_enqueue_style('cp-admin-styles', plugin_dir_url( __FILE__ ) . 'css/cp-admin-styles.css');
    wp_enqueue_script('cp-admin-styles', plugin_dir_url( __FILE__ ) . 'js/cp-admin-primary.js');

    // Display colors.
    cp_display_colors();
}

function cp_display_colors() {
    // Get already saved colors from options.
    $primaryColors = unserialize( get_option('primaryColors') );
    $accentColors  = unserialize( get_option('accentColors') );

    // Save updates if form posted.
    if (isset($_POST['hasUpdates']) && $_POST['hasUpdates'] == 'Y' ) {
        $primaryColors = cp_save_colors('primaryColors');
        $accentColors  = cp_save_colors('accentColors');

        // Put a "settings saved" message on the screen
        ?>
        <div class="updated"><p><strong><?php _e('Color palette settings have been saved.', 'menu-test' ); ?></strong></p></div>
        <?php
    }

    // Display the color options page template.
    require('cp-admin-template.php');
}

function cp_save_colors($colorType) {
    // Get all the colors from the form.
    $colors = cp_get_colors_from_form($colorType);

    // Update colors in the WP options.
    update_option( $colorType , serialize($colors) );

    return $colors;
}

function cp_get_colors_from_form($colorType) {
    $colors = $_POST[$colorType];

    // If there are no colors, return the empty value.
    if (!$colors) {
        return $colors;
    }

    // Check to make sure each element in the array has a value.
    foreach ($colors as $key => $color) {
        // If an element has no value, delete it.
        if (!$color) {
            unset($colors[$key]);
        }
    }

    // Resequence the array if values were deleted from the middle.
    $colors = array_values($colors);

    return $colors;
}

add_action('admin_menu', 'cp_plugin_options');
