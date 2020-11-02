<?php

/**
 * Plugin Name: Color Palette
 * Description: This WordPress plugin adds a color palette block to the post editor, to be used for branding and style guide pages.
 * Version: 3.2
 * Author: Joni Halabi
 * Author URI: https://thatdevgirl.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
  exit;
}

// Setup the plguin.
require_once( 'inc/setup.php' );

// Register dynamic blocks.
require_once( 'source/blocks/color/register.php' );

// [DEPRECATED] Shortcode functionality.
require_once( 'shortcode/index.php' );
