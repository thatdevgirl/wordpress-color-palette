<?php

/**
 * Color block (single) registration and render functionality.
 */

namespace ThatDevGirl\ColorPalette;

class Color {

  /**
   * __construct()
   */
  public function __construct() {
    add_action( 'init', [ $this, 'register' ] );
  }


  /**
   * register()
   *
   * Register the block.
   *
   * @return void
   */
  public function register(): void {
    register_block_type_from_metadata( __DIR__, [
      'render_callback' => [ $this, 'render' ]
    ] );
  }


  /**
   * render()
   *
   * Render the block's front-end code.
   *
   * @param array $attributes
   * 
   * @return string
   */
  public function render( $attributes ): string {
    // Get relevant attributes, for reading ease.
    $hex = $attributes['hex'] ?? null;

    // If there is no hex value, do not display a swatch because there is
    // nothing to display here.
    if ( !$hex ) { return ''; }

    // Get the HTML for the different color code formats.
    $hex_html = $this->get_hex_html( $hex, $hide_hex );
    $rgb_html = $this->get_rgb_html( $hex, $hide_rgb );
    $cmyk_html = $this->get_cmyk_html( $hex, $hide_cmyk );

    // Get the label. If there is no actual label, the label is the
    // automatically generated label.
    $label = $attributes['label'] ? $attributes['label'] : $attributes['autoLabel'];

    // Construct the HTML.
    return <<<HTML
      <div class="cp-color">
        <div class="swatch" style="background-color: $hex"></div>
        <p class="cp-color-name">$label</p>
        $hex_html
        $rgb_html
        $cmyk_html
      </div>
HTML;
  }


  /**
   * get_hex_html()
   * 
   * Get the markup for the hex code.
   * 
   * @param string $hex
   * 
   * @return string
   */
  private function get_hex_html( string $hex ): string {
    return '<p class="cp-color-hex">' . $hex . '</p>';
  }


  /**
   * get_rgb_html()
   * 
   * Get the markup for the RBG code (based on the passed-in hex code).
   * 
   * @param string $hex
   * 
   * @return string
   */
  private function get_rgb_html( string $hex ): string {
    // If we're still here, calculate the RGB code based on the hex.
    $rgb = implode( ', ', $this->hex2rgb( $hex ) );

    // Return the markup!
    return '<p class="cp-color-rgb">RGB: ' . $rgb . '</p>';
  }


  /**
   * get_cmyk_html()
   * 
   * Get the markup for the CMYK code (based on the passed-in hex code). 
   * 
   * @param string $hex
   * 
   * @return string
   */
  private function get_cmyk_html( string $hex ): string {
    // If we're still here, calculate the CMYK code based on the hex.
    $cmyk = implode( ', ', $this->hex2cmyk( $hex ) );

    // Return the markup!
    return '<p class="cp-color-cmyk">CMYK: ' . $cmyk . '</p>';
  }


  /**
   * hex2rgb()
   *
   * Convert Hex color value to RBG.
   *
   * @param string $hex
   * 
   * @return array
   */
  private function hex2rgb( string $hex ): array {
    $hex = str_replace( '#', '', $hex );

    if ( strlen( $hex ) == 3 ) {
      $red   = hexdec( substr( $hex, 0, 1 ).substr( $hex, 0, 1 ) );
      $green = hexdec( substr( $hex, 1, 1 ).substr( $hex, 1, 1 ) );
      $blue  = hexdec( substr( $hex, 2, 1 ).substr( $hex, 2, 1 ) );
    } else {
      $red   = hexdec( substr( $hex, 0, 2 ) );
      $green = hexdec( substr( $hex, 2, 2 ) );
      $blue  = hexdec( substr( $hex, 4, 2 ) );
    }

    // Return the RGB values as a string since they are display-only.
    return [ $red, $green, $blue ];
  }


  /**
   * hex2cmyk()
   *
   * Convert Hex color value to CMYK.
   *
   * @param string $hex
   * 
   * @return array
   */
  private function hex2cmyk( string $hex ): array {
    $hex = str_replace( '#', '', $hex );

    // Convert to RGB first.
    $rgb = $this->hex2rgb( $hex );

    // Get RGB values from array
    $r = $rgb['0'];
    $g = $rgb['1'];
    $b = $rgb['2'];

    // Then convert to CMYK.
    $cyan    = 1 - ( $r / 255 );
    $magenta = 1 - ( $g / 255 );
    $yellow  = 1 - ( $b / 255 );

    $black  = min( $cyan, $magenta, $yellow );

    $cyan    = ( $black != 1 ) ? round( @( ($cyan    - $black) / (1 - $black)) * 100, 0 ) : 0;
    $magenta = ( $black != 1 ) ? round( @( ($magenta - $black) / (1 - $black)) * 100, 0 ) : 0;
    $yellow  = ( $black != 1 ) ? round( @( ($yellow  - $black) / (1 - $black)) * 100, 0 ) : 0;
    $black   = round( $black * 100, 0 );

    // Return the CMYK values as a string since they are display-only.
    return [ $cyan, $magenta, $yellow, $black ];
  }

}

new Color;
