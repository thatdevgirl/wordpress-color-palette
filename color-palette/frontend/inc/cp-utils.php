<?php

// Convert Hex color value to RBG.
function hex2rgb($hex) {
   if (strlen($hex) == 3) {
      $red   = hexdec(substr($hex,0,1).substr($hex,0,1));
      $green = hexdec(substr($hex,1,1).substr($hex,1,1));
      $blue  = hexdec(substr($hex,2,1).substr($hex,2,1));

   } else {
      $red   = hexdec(substr($hex,0,2));
      $green = hexdec(substr($hex,2,2));
      $blue  = hexdec(substr($hex,4,2));
   }

   return array($red, $green, $blue);
}

// Convert Hex color value to CMYK.
function hex2cmyk($hex) {
   // Convert to RGB first.
   $rgb = hex2rgb($hex);

   // Get RGB values from array
   $r = $rgb['0'];
   $g = $rgb['1'];
   $b = $rgb['2'];

   // Then convert to CMYK.
   $cyan    = 1 - ($r / 255);
   $magenta = 1 - ($g / 255);
   $yellow  = 1 - ($b / 255);

   $black  = min($cyan, $magenta, $yellow);
   
   $cyan    = round( @(($cyan    - $black) / (1 - $black)) * 100, 2 );
   $magenta = round( @(($magenta - $black) / (1 - $black)) * 100, 2 );
   $yellow  = round( @(($yellow  - $black) / (1 - $black)) * 100, 2 );
   $black   = round( $black * 100, 2 );
   
   return array($cyan, $magenta, $yellow, $black);
}

// Determine brightness of a color based on RBG.
//  - Required parameter is an array of RGB values: 0 = R, 1 = G, 2 = B.
//  - Formula is from W3C standards: ((RED x 299) + (GREEN x 587) + (BLUE x 114)) / 1000
//  - Brightness threshold is 125.
//  - http://www.w3.org/TR/AERT (Checkpoint 2.2)
function isDark($rgb) {
   $red   = $rgb[0];
   $green = $rgb[1];
   $blue  = $rgb[2];

   $brightness = (($red * 299) + ($green * 587) + ($blue * 114)) / 1000;

   return ($brightness > 125) ? false : true;
}
