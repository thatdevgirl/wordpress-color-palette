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
    add_action( 'admin_notices', [ $this, 'sunset' ] );
    add_action( 'enqueue_block_assets', [ $this, 'enqueue_block_assets' ] );
    add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_assets' ] );
    add_filter( 'plugin_row_meta', [ $this, 'add_meta' ], 10, 2 );
    add_action( 'in_plugin_update_message-color-palette/color-palette.php', [ $this, 'update_message' ], 10, 2 );
  }


  /**
   * sunset()
   *
   * Sunset notice that is displayed with the plugin is activated.
   *
   * @return void
   */
  public function sunset(): void {
    $screen = get_current_screen();
    if ($screen && ( $screen->id == 'plugins') ) {
      print <<<HTML
        <div id="sunset" class="notice notice-warning is-dismissible">
          <p><strong>Important notice about the Color Palette plugin:</strong></p>
          <p>
            Due to a shift in my personal and professional priorities, I have decided
            to take a step back from development. As a result, this plugin is <strong>no longer
            being actively maintained.</strong> You are welcome to
            <a href="https://github.com/thatdevgirl/wordpress-color-palette" target="_blank">fork it</a>
            and create your own updates. If you do so, please credit me as the original author.
            (I would also love to
            <a href="mailto:joni@jhalabi.com">hear about this plugin’s new life</a>!)
          </p>
          <p>
            All the best, Joni.
          </p>
        </div>
HTML;
    }
  }


  /**
   * enqueue_editor_assets()
   *
   * Enqueue JS and CSS for the editor.
   *
   * @return void
   */
  public function enqueue_block_assets(): void {
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
    $js = '../build/color-palette-frontend.min.js';
    $css= '../build/styles-frontend.min.css';

    $handle = 'color-palette-frontend';

    wp_enqueue_script(
      $handle,
      plugins_url( $js, __FILE__ ),
      [ 'jquery' ],
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
        '<a href="' . esc_url( 'https://www.buymeacoffee.com/thatdevgirl' ) . '">Donate</a>',
      );

      return array_merge( $links, $additional_links );
    }

    return $links;
  }


  /**
   * update_message()
   *
   * Add an update message for the 4.0 version because it contains breaking
   * changes.
   */
  public function update_message( $data, $response ) {
    printf(
      '<div class="update-message"><p><strong>%s</strong></p></div>',
      __( 'Version 4.0 is a breaking change. Please update any color palette shortcodes to blocks before upgrading.', 'tdg-color-palette' )
    );
  }

}

new Setup;
