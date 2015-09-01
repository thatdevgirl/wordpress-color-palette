<section class="colors__section">
    <h3>Accent Palette</h3>

    <?php foreach ($accentColors as $color): ?>
        <?php $rgb = implode(', ', hex2rgb($color)); ?>
        <?php $cmyk = implode(', ', hex2cmyk($color)); ?>

        <div class="tints" style="background: #<?php echo $color; ?>">
             <div class="tints__div">
                <p class="tints__p">#<?php echo $color; ?></p>
                <p class="tints__p">RGB <?php echo $rgb; ?></p>
                <p class="tints__p">CMYK <?php echo $cmyk; ?></p>
            </div>

            <table class="tints__table">
                <?php for($i=20; $i<=80; $i=$i+20): ?>

                    <tr style="background: rgba(<?php echo $rgb . ', ' . $i/100; ?>)">
                        <td class="tints__td"><?php echo $i; ?>%</td>
                        
                    </tr>

                <?php endfor; ?>
            </table>
        </div>
    <?php endforeach; ?>
</section>