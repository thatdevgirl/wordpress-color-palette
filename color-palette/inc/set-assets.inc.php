<?php

/**
 * Enqueue editor JS and CSS assets.
 */

add_action( 'enqueue_block_editor_assets', 'cp_enqueue_assets' );

function cp_enqueue_assets() {
  $editorJs = '../build/color-palette.min.js';
  $frontEndCss= '../build/color-palette.min.css';

  wp_enqueue_script(
    'cp-editor-js',
    plugins_url( $editorJs, __FILE__ ),
    array( 'wp-blocks', 'wp-editor', 'wp-components' ),
    filemtime( plugin_dir_path( __FILE__ ) . $editorJs )
  );

  wp_enqueue_style(
    'cp-editor-styles',
    plugin_dir_url( __FILE__ ) . $frontEndCss,
    array(),
    filemtime( plugin_dir_path( __FILE__ ) . $frontEndCss )
  );
}

/**
 * Enqueue front-end CSS assets.
 */

add_action( 'wp_enqueue_scripts', 'cp_enqueue_styles' );

function cp_enqueue_styles() {
  $frontEndCss= '../build/color-palette.min.css';

  wp_enqueue_style(
    'cp-frontend-styles',
    plugin_dir_url( __FILE__ ) . $frontEndCss,
    array(),
    filemtime( plugin_dir_path( __FILE__ ) . $frontEndCss )
  );
}
