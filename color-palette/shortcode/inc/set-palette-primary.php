<section class="section-palette" aria-label="Block of primary colors">
  <h2>Primary Color Palette</h2>

  <?php
    /* Iterate over the primaryColors associative array.
     * Key is the color name. Value is the color hex.
     */
  ?>

  <?php foreach ($primaryColors as $key => $color): ?>
    <div class="primary-color">
      <div class="swatch" style="background: #<?php echo $color; ?> "></div>

      <p><strong><?php echo $key; ?></strong></p>

      <p>#<?php echo $color; ?></p>
      <p>RBG: <?php echo implode(', ', hex2rgb($color)); ?></p>
      <p>CMYK: <?php echo implode(', ', hex2cmyk($color)); ?></p>
    </div>
  <?php endforeach; ?>
</section>
