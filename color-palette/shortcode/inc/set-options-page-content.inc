<?php
/**
 * Set up the content and functionality for the admin page.
 */

function cp_set_options_page_content() {

  // Set up admin CSS and JS.
  wp_enqueue_style( 'cp-admin-styles', plugin_dir_url( __FILE__ ) . '../build/cp-admin.min.css' );
  wp_enqueue_script( 'cp-admin-styles', plugin_dir_url( __FILE__ ) . '../build/cp-admin.min.js' );

  // Get already saved colors from options.
  $primaryColors = unserialize( get_option( 'primaryColors' ) );
  $accentColors  = unserialize( get_option( 'accentColors' ) );

  // Save updates if form posted.
  if ( isset( $_POST['hasUpdates'] ) && $_POST['hasUpdates'] == 'Y' ) {
    $primaryColors = _cp_set_colors( 'primaryColors' );
    $accentColors  = _cp_set_colors( 'accentColors' );

    // Put a "settings saved" message on the screen.
    print '<div class="updated">Color palette settings have been saved.</div>';
  }

  // Display the color options page template.
  require( 'template-options-page.inc' );
}


/**
 * HELPER function to save color information.
 */

function _cp_set_colors( $colorType ) {
  // Get all the colors from the form.
  $colors = _cp_get_colors_from_form( $colorType );

  // Update colors in the WP options.
  update_option( $colorType , serialize( $colors ) );

  return $colors;
}


/**
 * HELPER function to get all color information from the form.
 */

function _cp_get_colors_from_form( $colorType ) {
  $colorHexes = $_POST[ $colorType ];
  $colorNames = $_POST[ $colorType . 'Names' ];

  // If there are no colors, return the empty value.
  if ( !$colorHexes ) {
    return [];
  }

  // Create a new empty array to house the associative array.
  $colors = [];

  // Check to make sure each element in the array has a value.
  foreach ( $colorHexes as $key => $color ) {
    if ( $color ) {
      $colors[ $colorNames[ $key ] ] = $color;
    }
  }

  return $colors;
}
