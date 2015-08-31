<?php require('inc/cp-admin-color-row.php'); ?>

<h1 class="cp__h1">Color Palette Settings</h1>

<p>Use this page to set up the primary colors of your web site's style guide.</p>

<form action="" method="post">
    <input type="hidden" name="hasUpdates" value="Y" />

    <h2 class="cp__h2">Primary Colors</h2>
    <p>These are the primary colors used on your site and in your brand.</p>

    <?php insertColorRow($primaryColors, 'cp-primary', 'primaryColors'); ?>

    <h2 class="cp__h2">Accent Colors</h2>
    <p>These are the accent colors used on your site and in your brand that compliment your primary colors.</p>
    
    <?php insertColorRow($accentColors, 'cp-accent', 'accentColors'); ?>

    <input type="submit" value="Create Palette" class="cp--button cp__input--submit" />
</form>

<div class="template">
    <div class="cp-colors">
        <label>Color</label>
        
        <span>
            #<input name="" value="" />
        </span>
        
        <a href="#" class="cp--del">x</a>
    </div>
</div>