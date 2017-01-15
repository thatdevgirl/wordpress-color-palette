<?php
/**
 * @package Color Palette
 */

/*
Plugin Name: Color Palette
Description: This WordPress plugin creates a custom color palette section that you can add to any page (i.e. in a style guide).
Version: 1.0
Author: Joni Halabi
Author URI: http://www.jhalabi.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

$thisPHP = phpversion();
$minPHP = '5.4';

if (version_compare($thisPHP, $minPHP, 'lt')) {
  echo 'This plugin requires PHP 5.4 or greater to run. You are using ' . $thisPHP;
} else {
  require('admin/cp-admin-functions.php');
  require('frontend/cp-shortcode.php');
}
