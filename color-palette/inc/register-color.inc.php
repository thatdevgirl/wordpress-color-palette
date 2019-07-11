<?php

/**
 * Register the Color (child) block.
 */

require_once( 'render-color.inc.php' );

function tdg_color_register() {
  register_block_type( 'tdg/color', array(
    'attributes' => array(
      'hex'   => array( 'type' => 'string', 'default' => '' ),
      'label' => array( 'type' => 'string', 'default' => '' )
    ),

  'render_callback' => 'tdg_color_render'
  ) );
}

// HOOK for block registration.
add_action( 'init', 'tdg_color_register' );
