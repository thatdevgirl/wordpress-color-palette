=== Color Palette ===
Contributors: thatdevgirl
Donate Link: https://www.buymeacoffee.com/thatdevgirl
Tags: colors, branding, palette, visual identity, block
Requires at least: 5.0
Tested up to: 5.8
Stable tag: 4.1.1

Add a Color Palette block to pages in the post editor.

== Description ==

The Color Palette block displays a group of colors on your page. The block starts with 3 individual Color blocks, but you can add additional blocks or remove excess blocks as needed.

Give each color block a color using the selector in the Inspector Panel on the right-hand side of the editor, give your color a name, and you are done! If you need to use the same color palette on multiple pages or posts, simply save the Color Palette block with all of your colors as a reusable block through the editor.

== Installation ==

1. Upload the plugin to your WordPress installation.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Edit any page or post and look for the 'Color Palette' block in the block library.
4. The 'Color Palette' block starts with 3 'Color' blocks, but you can add additional blocks or remove excess blocks as needed.
5. Choose a color for each 'Color' block using the color selector in the Inspector Panel on the right-hand side of the editor and give your color a name.
6. Choose a 'Color block style' in the 'Color Palette' block to determine how you want the colors inside the palette to display.
6. Save the page... and you're done!

== Screenshots ==

1. The Color Palette block in the post editor, displaying the colors as stylized cards.
2. The Color Palette block in the post editor, displaying the colors as circles.
3. The single Color block as a child block to the Color Palette block.
4. The Color Palette block in the front-end, displaying the colors as stylized cards.
5. The Color Palette block in the front-end, displaying the colors as circles.

== Changelog ==

= 4.1.1 =
* Tested for compatibility with Wordpress 5.8.
* Fixed minor "invalid color" bug when Color Palette block is added to a page.

= 4.1 =
* Updating donation link.
* Adding functionality from the Name That Color library to automatically add color labels. Check out https://chir.ag/projects/ntc/ and thank you to Paul C for the suggestion!

= 4.0 =
* I really want to include these blocks in the Block Directory. In order to do that, shortcode support must go. Sorry folks. You can stay on version 3.2 if you love your shortcodes. Otherwise, please consider converting to blocks and upgrading!
* Officially declaring the Color block as a child of the Color Palette block. (If you want to display a single color, you can create a palette of one color.)
* Adding block.json files to both the Color child block and Color Palette parent block.

= 3.2 =
* Code refactor to ensure blocks are not using deprecated components.
* Tested to ensure support for WP v5.5.
* Introducing new options for the color block display.
* Introducing the ability to hide Hex, RBG, or CMYK codes from front-end display.

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

= 4.0 =
This is it! The color palette shortcodes are no longer supported as of this version. Please convert your shortcodes to the Color Palette block in the post editor before upgrading.

= 3.0 =
Major code refactor to add the 'Color Palette' block to the editor. Please note that the settings page and shortcodes are no longer recommended and will be deprecated in a future version.
