<?php require('inc/cp-admin-color-row.php'); ?>

<h1 class="cp__h1">Color Palette Settings</h1>

<p>Use this page to set up the color palettes for your web site's style guide.</p>

<form action="" method="post">
    <input type="hidden" name="hasUpdates" value="Y" />

    <h2 class="cp__h2">Primary Colors</h2>
    <p>These are the primary colors used on your site and in your brand. Use the shortcode <strong>[primarycolors]</strong> to display this palette on your pages.</p>

    <?php insertColorRow($primaryColors, 'cp-primary', 'primaryColors'); ?>

    <h2 class="cp__h2">Accent Colors</h2>
    <p>These are the accent colors used on your site and in your brand that compliment your primary colors. Use the shortcode <strong>[accentcolors]</strong> to display this palette on your pages.</p>
    
    <?php insertColorRow($accentColors, 'cp-accent', 'accentColors'); ?>

    <input type="submit" value="Save Palette" class="cp--button cp__input--submit" />
</form>

<?php require('inc/cp-admin-color-row-template.php'); ?>