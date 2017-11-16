<section class="colors__section" aria-label="Color Palette">
    <h3>Accent Palette</h3>

    <?php
        /* Iterate over the accentColors associative array.
         * Key is the color name.
         * Value is the color hex.
         */
    ?>

    <?php foreach ( $accentColors as $key => $color ): ?>
        <?php $rgb_arr = hex2rgb( $color ); ?>

        <?php $rgb  = implode( ', ', $rgb_arr ); ?>
        <?php $cmyk = implode( ', ', hex2cmyk( $color ) ); ?>

        <div class="tints <?php if ( isDark( $rgb_arr ) ): ?>tints--dark<?php endif; ?>" style="background: #<?php echo $color; ?>">
             <header class="tints__header">
                <p class="tints__p">
                    <strong><?php echo $key; ?></strong>
                </p>

                <p class="tints__p">#<?php echo $color; ?></p>
                <p class="tints__p">RGB <?php echo $rgb; ?></p>
                <p class="tints__p">CMYK <?php echo $cmyk; ?></p>
            </header>

            <div class="tints__div">
                <?php for($i=20; $i<=80; $i=$i+20): ?>
                    <p class="tints__p--tint" style="background: rgba(<?php echo $rgb . ', ' . $i/100; ?>)">
                        <?php echo $i; ?>%
                    </p>
                <?php endfor; ?>
            </div>
        </div>
    <?php endforeach; ?>
</section>
