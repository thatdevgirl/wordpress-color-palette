<?php
/**
 * Enqueue JS and CSS assets.
 */

add_action( 'enqueue_block_editor_assets', 'cp_enqueue_assets' );

function cp_enqueue_assets() {
  $editorJS = '../build/color-palette.min.js';

  // Block Javascript.
  wp_enqueue_script(
    'cp-editor-blocks-js',
    plugins_url( $editorJS, __FILE__ ),
    array( 'wp-blocks', 'wp-editor', 'wp-components' ),
    filemtime( plugin_dir_path( __FILE__ ) . $editorJS )
  );
}
