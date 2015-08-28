<section class="primary-colors">
    <h3>Primary Palette</h3>

            <div class="primary-color">
                <?php $hex = get_sub_field('hex'); ?>

                <div class="primary-color__div--swatch" style="background: #<?php echo $hex; ?> "></div>

                <p class="primary-color__p"><b><?php the_sub_field('name'); ?></b></p>
                <p class="primary-color__p">#<?php echo $hex; ?></p>
                <p class="primary-color__p">RBG: <?php echo implode(', ', hex2rgb($hex)); ?></p>
                <p class="primary-color__p">CMYK: <?php echo implode(', ', hex2cmyk($hex)); ?></p>
            </div>
            
        <?php endwhile; ?>
    <?php endif; ?>
</section>