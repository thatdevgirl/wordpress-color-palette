<?php

require_once( 'utils.php' );

/**
 * Render the Color (child) block front-end.
 */

function tdg_color_render( $attributes, $content ) {
  // Get attribute data.
  $label = $attributes[ 'label' ];
  $hex = $attributes[ 'hex' ];

  // Start the color block container.
  $html  = '<div class="cp-color">';

  // Color swatch.
  $html .= '<div class="swatch" style="background: ' . $hex . '"></div>';

  // Color name.
  $html .= '<p class="cp-color-name">' . $label . '</p>';

  // Colors.
  $html .= '<p>' . $hex . '</p>';
  $html .= '<p>RGB: ' . implode( ', ', hex2rgb( $hex ) ) . '</p>';
  $html .= '<p>CMYK: ' . implode( ', ', hex2cmyk( $hex ) ) . '</p>';

  // End the container.
  $html .= '</div>';

  return $html;
}
