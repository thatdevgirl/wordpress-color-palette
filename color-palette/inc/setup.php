<?php

/**
 * Functionality to setup plugin assets and meta data.
 */

namespace ThatDevGirl\ColorPalette;

class Setup {

  /**
   * _construct()
   */
  public function __construct() {
    add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_editor_assets' ] );
    add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_assets' ] );
    add_filter( 'plugin_row_meta', [ $this, 'add_meta' ], 10, 2 );
  }


  /**
   * enqueue_editor_assets()
   *
   * Enqueue JS and CSS for the editor.
   *
   * @return void
   */
  public function enqueue_editor_assets(): void {
    $js = '../build/color-palette.min.js';
    $css= '../build/styles-editor.min.css';

    $handle = 'color-palette-editor';

    wp_enqueue_script(
      $handle,
      plugins_url( $js, __FILE__ ),
      [ 'wp-blocks', 'wp-editor', 'wp-components' ],
      filemtime( plugin_dir_path( __FILE__ ) . $js )
    );

    wp_enqueue_style(
      $handle,
      plugin_dir_url( __FILE__ ) . $css,
      [],
      filemtime( plugin_dir_path( __FILE__ ) . $css )
    );
  }


  /**
   * enqueue_frontend_assets()
   *
   * Enqueue JS and CSS for the editor.
   *
   * @return void
   */
  public function enqueue_frontend_assets(): void {
    $css= '../build/styles-frontend.min.css';

    $handle = 'color-palette-frontend';

    wp_enqueue_style(
      $handle,
      plugin_dir_url( __FILE__ ) . $css,
      [],
      filemtime( plugin_dir_path( __FILE__ ) . $css )
    );
  }


  /**
   * add_meta()
   *
   * Add meta links to the Plugins page.
   *
   * @param string $links
   * @param string $file
   * @return string
   */
  public function add_meta( $links, $file ) {
    if ( strpos( $file, 'color-palette' ) !== false ) {
      $additional_links = array(
        '<a href="' . esc_url( 'https://www.paypal.me/thatdevgirl' ) . '">Donate</a>',
      );

      return array_merge( $links, $additional_links );
    }

    return $links;
  }

}

new Setup;
