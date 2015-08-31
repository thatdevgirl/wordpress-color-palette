<section class="accent-colors">
    <h3>Accent Palette</h3>

    <?php foreach ($accentColors as $color): ?>
        <?php $rgb = implode(', ', hex2rgb($color)); ?>
        <?php $cmyk = implode(', ', hex2cmyk($color)); ?>

        <div class="tints" style="background: #<?php echo $color; ?>">
             <p class="tints__p">
                <span>#<?php echo $color; ?></span>
                <span>RGB <?php echo $rgb; ?></span>
                <span>CMYK <?php echo $cmyk; ?></span>
            </p>

            <table class="tints__table">
                <?php for($i=20; $i<=80; $i=$i+20): ?>

                    <tr style="background: rgba(<?php echo $rgb . ', ' . $i/100; ?>)">
                        <td class="tints__td"><?php echo $i; ?></td>
                        <td class="tints__td"><?php echo $color; ?></td>
                        <td class="tints__td">RGB <?php echo $rgb; ?></td>
                        <td class="tints__td">CMYK <?php echo $cmyk; ?></td>
                    </tr>

                <?php endfor; ?>
            </table>
        </div>
    <?php endforeach; ?>
</section>