<section class="colors__section">
    <h3>Accent Palette</h3>

    <?php foreach ($accentColors as $color): ?>
        <?php $rgb = implode(', ', hex2rgb($color)); ?>
        <?php $cmyk = implode(', ', hex2cmyk($color)); ?>

        <div class="tints" style="background: #<?php echo $color; ?>">
             <header class="tints__header">
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