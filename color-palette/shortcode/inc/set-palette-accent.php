<?php require_once( '../../inc/utils.php' ); ?>

<div class="cp-palette">
  <div class="cp-colors">
    <?php
      /* Iterate over the primaryColors associative array.
       * Key is the color name. Value is the color hex.
       */
    ?>

    <?php foreach ($accentColors as $key => $color): ?>
      <div class="cp-color">
        <div class="swatch" style="background: #<?php print $color; ?> "></div>

        <p class="cp-color-name"><?php print $key; ?></p>
        <p>#<?php print $color; ?></p>
        <p>RGB:  <?php print implode( ', ', hex2rgb( $color ) ); ?></p>
        <p>CMYK: <?php print implode( ', ', hex2cmyk( $color ) ); ?></p>
      </div>
    <?php endforeach; ?>

  </div>
</div>
