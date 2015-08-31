<?php

function insertColorRow($arr, $id, $fieldName) {
    ?>
    <section id="<?php echo $id; ?>" data-name="<?php echo $fieldName; ?>">
        <div>
            <?php if ($arr): ?>
                <?php foreach ($arr as $key => $color): ?>
                    <div class="cp-colors">
                        <label>Color</label>
                        
                        <span>
                            #<input name="<?php echo $fieldName . '[' . $key . ']'; ?>" value="<?php echo $arr[$key] ?>" />
                        </span>
                        
                        <a href="#" class="cp--del">x</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <a href="#" class="cp--button cp--add">Add Color</a>
    </section>
    <?php
}