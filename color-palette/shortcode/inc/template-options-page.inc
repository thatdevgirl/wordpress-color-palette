<section class="color-palette" aria-label="Color Palette Settings">
  <?php require( 'get-color-row.inc' ); ?>

  <h1>Color Palette Settings</h1>

  <p><strong>Deprecation coming!</strong> This method of setting up a color palette on posts will be deprecated in a future update. Please use the "Color Palette" block in the post editor. (If you need the block on multiple pages, create a reusable block.)</p>

  <p>Use this page to set up the color palettes for your web site's style guide.</p>

  <form action="" method="post">
    <input type="hidden" name="hasUpdates" value="Y" />

    <hr>
    <h2>Primary Colors</h2>
    <p>These are the primary colors used on your site and in your brand. Use the shortcode <b>[primarycolors]</b> to display this palette on your pages.</p>

    <?php getColorRow( $primaryColors, 'cp-primary', 'primaryColors' ); ?>

    <hr>
    <h2>Accent Colors</h2>
    <p>These are the accent colors used on your site and in your brand that compliment your primary colors. Use the shortcode <b>[accentcolors]</b> to display this palette on your pages.</p>

    <?php getColorRow( $accentColors, 'cp-accent', 'accentColors' ); ?>

    <input type="submit" value="Save Colors" class="cp-btn cp-submit" />
  </form>

  <?php require( 'template-color-row.inc' ); ?>
</section>
