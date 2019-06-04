<?php

/**
 * Set up this plugin's custom admin page.
 */

require_once( 'set-options-page-content.inc' );

function cp_set_options_page() {
  add_options_page(
    'Color Palette',               // page title
    'Color Palette',               // menu title
    'manage_options',              // capability
    'cp_options',                  // slug
    'cp_set_options_page_content'  // output function
  );
}

add_action( 'admin_menu', 'cp_set_options_page' );
