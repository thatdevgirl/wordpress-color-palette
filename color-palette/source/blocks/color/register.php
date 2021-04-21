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
    register_block_type( 'tdg/color', [
      'attributes' => [
        'hex'       => [ 'type' => 'string', 'default' => '' ],
        'label'     => [ 'type' => 'string', 'default' => '' ],
        'autoLabel' => [ 'type' => 'string', 'default' => '' ]
      ],

      'render_callback' => [ $this, 'render' ]
    ] );
  }


  /**
   * render()
   *
   * Render the block's front-end code.
   *
   * @param array $attributes
   * @return string
   */
  public function render( $attributes ): string {
    // If there is no hex value, do not display a swatch because there is
    // nothing to display here.
    $hex = $attributes[ 'hex' ];
    if ( !$hex ) { return ''; }

    // Get the label. If there is no actual label, the label is the
    // automatically generated label.
    $label = $attributes['label'] ? $attributes['label'] : $attributes['autoLabel'];

    // Get Hex converted to RGB and CMYK.
    $rgb = implode( ', ', $this->hex2rgb( $hex ) );
    $cmyk = implode( ', ', $this->hex2cmyk( $hex ) );

    // Construct the HTML.
    $html = <<<HTML
      <div class="cp-color">
        <div class="swatch" style="background-color: $hex"></div>
        <p class="cp-color-name">$label</p>
        <p class="cp-color-hex">$hex</p>
        <p class="cp-color-rgb">RGB: $rgb</p>
        <p class="cp-color-cmyk">CMYK: $cmyk</p>
      </div>
HTML;

    return $html;
  }


  /**
   * hex2rgb()
   *
   * Convert Hex color value to RBG.
   *
   * @param string $hex
   * @return array
   */
  private function hex2rgb( $hex ): array {
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
   * @return array
   */
  private function hex2cmyk( $hex ): array {
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
