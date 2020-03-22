=== Color Palette ===
Contributors: thatdevgirl
Donate Link: https://www.paypal.me/thatdevgirl
Tags: colors, branding, palette, visual identity
Requires at least: 5.0
Tested up to: 5.4
Stable tag: 3.1

Add a color palette block to pages in the post editor.

== Description ==

This WordPress plugin adds a color palette block to the post editor, to be used for branding and style guide pages.

You can now take advantage of the new ("Gutenberg") post editor by creating color palettes on the fly using the new "Color Palette" block. The "Color Palette" block starts with 4 "Color" blocks, but you can add additional blocks or remove excess blocks as needed. Give each color block a color using the selector in the Inspector Panel on the right-hand side of the editor and give your color a name. Done!

If you need to use the same color palette on multiple pages or posts, simply save the "Color Palette" block with all of your colors as a reusable block through the editor.

= Deprecation coming =

The previous version of this plugin added primary and secondary color palettes via a series of shortcodes.  This version is still supported and palettes can be set up in the WordPress admin under Settings > Color Palette and then added to posts via short codes:

* **[primarycolors]**: This shortcode adds a block that will display all of your brand's primary colors.
* **[accentcolors]**: This shortcode adds a block that will display all of your brand's accent colors.  These can be colors that compliment your primary colors, for example.

This functionality will be deprecated in a future version.

== Installation ==

1. Upload the plugin to your WordPress installation.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Edit any page or post and look for the 'Color Palette' block in the block library.
4. The 'Color Palette' block starts with 4 'Color' blocks, but you can add additional blocks or remove excess blocks as needed.
5. Choose a color for each 'Color' block using the color selector in the Inspector Panel on the right-hand side of the editor and give your color a name.
6. Save the page. Done!

== Screenshots ==

1. The color palette block in the post editor.
2. The color palette block on the front-end.

== Changelog ==

= 3.1 =
* Tested for compatibility with the upcoming WordPress core 5.4 release.
* CSS fix to support 5.4.

= 3.0 =
* Major code refactor!
* New Feature! Gutenberg block to create custom color palettes within the post editor.
* Still supporting the options page / shortcode functionality, but there are plans to deprecate it in a future release.

= 2.0 =
* Tested plugin on v4.9.
* Updated code style to better adhere to WordPress code standards.
* Updated HTML to be WCAG AA compliant.
* Minor UI updates.
* Refactoring the CSS. This involved a pretty substantial reworking of class names. Please check any custom styles you may have created!
* Finally managing CSS through SCSS.
* Minifying CSS and JS files.

= 1.1 =
* Tested plugin on v4.7.1.
* Added a check to make sure user has PHP 5.4 or greater.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 3.0 =
Major code refactor to add the 'Color Palette' block to the editor. Please note that the settings page and shortcodes are no longer recommended and will be deprecated in a future version.
