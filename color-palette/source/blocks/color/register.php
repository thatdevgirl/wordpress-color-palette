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
    register_block_type( __DIR__, [
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
    $hex_html = $this->get_hex_html( $hex );
    $rgb_html = $this->get_rgb_html( $hex );
    $cmyk_html = $this->get_cmyk_html( $hex );

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
    return '<p class="cp-color-hex">' . $hex . $this->get_copy_icon() . '</p>';
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


  /**
   * get_copy_icon()
   * 
   * Get the copy hex code icon code for the front-end. This is static code,
   * but it is long (because of the SVG), so it is far easier to include it in
   * its own function.
   * 
   * Icon references: 
   *   Copy icon: https://thenounproject.com/icon/copy-4651792/
   *   Complete icon: https://thenounproject.com/icon/complete-3012493/
   * 
   * @return string
   */
  private function get_copy_icon(): string {
    return <<<HTML
      <a href="#" role="button" class="cp-copy-hex">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 45" x="0px" y="0px" aria-label="Copy hex code">
          <g>
            <path d="M18.88889,12.66667H6.44444A4.44967,4.44967,0,0,0,2,17.11111V29.55556A4.44967,4.44967,0,0,0,6.44444,34H18.88889a4.44967,4.44967,0,0,0,4.44444-4.44444V17.11111A4.44967,4.44967,0,0,0,18.88889,12.66667Zm2.66667,16.88889a2.66958,2.66958,0,0,1-2.66667,2.66666H6.44444a2.66958,2.66958,0,0,1-2.66666-2.66666V17.11111a2.66959,2.66959,0,0,1,2.66666-2.66667H18.88889a2.66959,2.66959,0,0,1,2.66667,2.66667Z"/>
            <path d="M29.55556,2H17.11111a4.44967,4.44967,0,0,0-4.44444,4.44444V10a.88889.88889,0,1,0,1.77777,0V6.44444a2.66959,2.66959,0,0,1,2.66667-2.66666H29.55556a2.66958,2.66958,0,0,1,2.66666,2.66666V18.88889a2.66958,2.66958,0,0,1-2.66666,2.66667H26a.88889.88889,0,1,0,0,1.77777h3.55556A4.44967,4.44967,0,0,0,34,18.88889V6.44444A4.44967,4.44967,0,0,0,29.55556,2Z"/>
          </g>
        </svg>
      </a>

      <span class="cp-copy-complete">
        <svg xmlns:x="http://ns.adobe.com/Extensibility/1.0/" xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/" xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="enable-background:new 0 0 100 100;" xml:space="preserve" aria-label="Hex code copied to the clipboard">
          <g>
            <path d="M5273.1,2400.1v-2c0-2.8-5-4-9.7-4s-9.7,1.3-9.7,4v2c0,1.8,0.7,3.6,2,4.9l5,4.9c0.3,0.3,0.4,0.6,0.4,1v6.4     c0,0.4,0.2,0.7,0.6,0.8l2.9,0.9c0.5,0.1,1-0.2,1-0.8v-7.2c0-0.4,0.2-0.7,0.4-1l5.1-5C5272.4,2403.7,5273.1,2401.9,5273.1,2400.1z      M5263.4,2400c-4.8,0-7.4-1.3-7.5-1.8v0c0.1-0.5,2.7-1.8,7.5-1.8c4.8,0,7.3,1.3,7.5,1.8C5270.7,2398.7,5268.2,2400,5263.4,2400z"/>
            <path d="M5268.4,2410.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H5268.4z"/>
            <path d="M5272.7,2413.7h-4.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1C5273.7,2414.1,5273.3,2413.7,5272.7,2413.7z"/>
            <path d="M5272.7,2417h-4.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1C5273.7,2417.5,5273.3,2417,5272.7,2417z"/>
          </g>
          <g>
            <path d="M50,2.5C23.8,2.5,2.5,23.8,2.5,50c0,26.2,21.3,47.5,47.5,47.5S97.5,76.2,97.5,50C97.5,23.8,76.2,2.5,50,2.5z M74,40.2    L45.3,68.9c-0.8,0.8-2.1,0.8-2.8,0L26,52.4c-0.8-0.8-0.8-2.1,0-2.8l6.3-6.3c0.8-0.8,2.1-0.8,2.8,0l8.8,8.8l21-21    c0.8-0.8,2.1-0.8,2.8,0l6.3,6.3C74.8,38.2,74.8,39.4,74,40.2z"/>
          </g>
        </svg>
      </span>
HTML;
  }

}

new Color;
