<?php

function cp_plugin_options() {
  add_options_page( 'Color Palette', 'Color Palette', 'manage_options', 'cp_options', 'cp_display_admin' );
}

function cp_display_admin() {
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }

  // Set up admin CSS and JS.
  wp_enqueue_style( 'cp-admin-styles', plugin_dir_url( __FILE__ ) . 'css/cp-admin.min.css' );
  wp_enqueue_script( 'cp-admin-styles', plugin_dir_url( __FILE__ ) . 'js/cp-admin.min.js' );

  // Display colors.
  cp_display_colors();
}

function cp_display_colors() {
  // Get already saved colors from options.
  $primaryColors = unserialize( get_option( 'primaryColors' ) );
  $accentColors  = unserialize( get_option( 'accentColors' ) );

  // Save updates if form posted.
  if ( isset( $_POST['hasUpdates'] ) && $_POST['hasUpdates'] == 'Y' ) {
    $primaryColors = cp_save_colors( 'primaryColors' );
    $accentColors  = cp_save_colors( 'accentColors' );

    // Put a "settings saved" message on the screen
    ?>
    <div class="updated">
      <?php _e( 'Color palette settings have been saved.', 'menu-test' ); ?>
    </div>
    <?php
  }

  // Display the color options page template.
  require( 'cp-admin-template.php' );
}

function cp_save_colors( $colorType ) {
  // Get all the colors from the form.
  $colors = cp_get_colors_from_form( $colorType );

  // Update colors in the WP options.
  update_option( $colorType , serialize( $colors ) );

  return $colors;
}

function cp_get_colors_from_form( $colorType ) {
  $colorHexes = $_POST[$colorType];
  $colorNames = $_POST[$colorType . 'Names'];

  // If there are no colors, return the empty value.
  if ( !$colorHexes ) {
    return [];
  }

  // Create a new empty array to house the associative array.
  $colors = [];

  // Check to make sure each element in the array has a value.
  foreach ( $colorHexes as $key => $color ) {
    if ( $color ) {
      $colors[$colorNames[$key]] = $color;
    }
  }

  return $colors;
}

add_action( 'admin_menu', 'cp_plugin_options' );
