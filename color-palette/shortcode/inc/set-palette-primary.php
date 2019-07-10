<section class="cp-palette" aria-labelledby="cp-primary-header">
  <div class="cp-colors">
    <?php
      /* Iterate over the primaryColors associative array.
       * Key is the color name. Value is the color hex.
       */
    ?>

    <?php foreach ($primaryColors as $key => $color): ?>
      <div class="cp-color">
        <div class="swatch" style="background: #<?php print $color; ?> "></div>

        <p class="cp-color-name"><?php print $key; ?></p>
        <p>#<?php print $color; ?></p>
        <p><?php print hex2rgb( $color ); ?></p>
        <p><?php print hex2cmyk( $color ); ?></p>
      </div>
    <?php endforeach; ?>

  </div>
</section>
