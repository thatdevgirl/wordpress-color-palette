<?php

/**
 * Plugin Name: Color Palette
 * Description: This WordPress plugin adds a color palette block to the post editor, to be used for branding and style guide pages.
 * Version: 3.1
 * Author: Joni Halabi
 * Author URI: https://thatdevgirl.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

require_once( 'inc/set-plugin-meta.inc.php' );
require_once( 'inc/set-assets.inc.php' );
require_once( 'inc/register-color.inc.php' );

// [DEPRECATED] Shortcode functionality.
require_once( 'shortcode/index.php' );
