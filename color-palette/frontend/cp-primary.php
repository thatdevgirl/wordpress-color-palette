<section class="colors__section">
    <h3>Primary Palette</h3>

    <?php foreach ($primaryColors as $key => $color): ?>
        <div class="primary-color">
            <div class="primary-color__div--swatch" style="background: #<?php echo $color; ?> "></div>

            <p class="primary-color__p">
                <strong><?php echo $key; ?></strong>
            </p>
            
            <p class="primary-color__p">#<?php echo $color; ?></p>
            <p class="primary-color__p">RBG: <?php echo implode(', ', hex2rgb($color)); ?></p>
            <p class="primary-color__p">CMYK: <?php echo implode(', ', hex2cmyk($color)); ?></p>
        </div>
    <?php endforeach; ?>
</section>