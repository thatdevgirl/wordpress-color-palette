<?php

/**
 * Render the Color (child) block front-end.
 */

function tdg_color_render( $attributes, $content ) {
  $html  = '<p>Label: ' . $attributes['label'] . '</p>';
  $html .= '<p>Hex: ' . $attributes['hex'] . '</p>';

  return $html;
}
