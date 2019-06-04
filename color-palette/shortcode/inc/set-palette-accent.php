<section class="section-palette" aria-label="Block of accent colors">
  <h2>Accent Color Palette</h2>

  <?php
    /* Iterate over the accentColors associative array.
     * Key is the color name. Value is the color hex.
     */
  ?>

  <?php foreach ( $accentColors as $key => $color ): ?>
    <?php $rgb_arr = hex2rgb( $color ); ?>

    <?php $rgb  = implode( ', ', $rgb_arr ); ?>
    <?php $cmyk = implode( ', ', hex2cmyk( $color ) ); ?>

    <div class="accent-colors <?php if ( isDark( $rgb_arr ) ): ?>dark<?php endif; ?>" style="background: #<?php echo $color; ?>">
      <div class="main">
        <p>
          <strong><?php echo $key; ?></strong>
        </p>

        <p>#<?php echo $color; ?></p>
        <p>RGB <?php echo $rgb; ?></p>
        <p>CMYK <?php echo $cmyk; ?></p>
      </div>

      <div class="gradient">
        <?php for( $i = 20; $i <= 80; $i = $i + 20 ): ?>
          <p style="background: rgba(<?php echo $rgb . ', ' . $i/100; ?>)">
            <?php echo $i; ?>%
          </p>
        <?php endfor; ?>
      </div>
    </div>
  <?php endforeach; ?>
</section>
