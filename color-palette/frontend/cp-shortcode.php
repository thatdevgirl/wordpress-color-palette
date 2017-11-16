<?php

function cp_add_styles() {
  wp_enqueue_style( 'cp-styles', plugin_dir_url( __FILE__ ) . 'css/cp-styles.min.css' );
}

function cp_primary_shortcode() {
  $primaryColors = unserialize( get_option( 'primaryColors' ) );

  cp_add_styles();

  include_once( 'inc/cp-utils.php' );
  include( 'cp-palette-primary.php' );
}

function cp_accent_shortcode() {
  $accentColors = unserialize( get_option('accentColors') );

  cp_add_styles();

  include_once( 'inc/cp-utils.php' );
  include( 'cp-palette-accent.php' );
}

add_shortcode( 'primarycolors', 'cp_primary_shortcode' );
add_shortcode( 'accentcolors',  'cp_accent_shortcode' );
