<?php

function cp_primary_shortcode() {
  if ( !is_admin() ) {
    $primaryColors = unserialize( get_option( 'primaryColors' ) );
    include( 'set-palette-primary.php' );
  }
}

function cp_accent_shortcode() {
  if ( !is_admin() ) {
    $accentColors = unserialize( get_option('accentColors') );
    include( 'set-palette-accent.php' );
  }
}

add_shortcode( 'primarycolors', 'cp_primary_shortcode' );
add_shortcode( 'accentcolors',  'cp_accent_shortcode' );
