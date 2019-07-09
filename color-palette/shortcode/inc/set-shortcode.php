<?php

function cp_primary_shortcode() {
  $primaryColors = unserialize( get_option( 'primaryColors' ) );

  require_once( 'utils.php' );
  require_once( 'set-palette-primary.php' );
}

function cp_accent_shortcode() {
  $accentColors = unserialize( get_option('accentColors') );

  require_once( 'utils.php' );
  require_once( 'set-palette-accent.php' );
}

add_shortcode( 'primarycolors', 'cp_primary_shortcode' );
add_shortcode( 'accentcolors',  'cp_accent_shortcode' );
