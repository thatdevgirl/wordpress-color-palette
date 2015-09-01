<?php

function insertColorRow($arr, $id, $fieldName) {
    ?>
    <section id="<?php echo $id; ?>" data-name="<?php echo $fieldName; ?>">
        <div class="cp-input-block">
            <?php if ($arr): ?>
                <?php $i = 0; ?>

                <?php foreach ($arr as $key => $color): ?>
                    <div class="cp-colors">
                        <label>Color</label>

                        <span>
                            <input 
                                name="<?php echo $fieldName . 'Names[' . $i . ']'; ?>" 
                                value="<?php echo $key; ?>" 
                                placeholder="color name" 
                                required 
                            />
                        </span>
                        
                        <span>
                            #<input 
                                type="text" 
                                name="<?php echo $fieldName . '[' . $i . ']'; ?>" 
                                value="<?php echo $color; ?>" 
                                placeholder="hex value" 
                                pattern="^([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" 
                                maxlength="6" 
                                title="Please enter a valid hex value."
                                required
                            />
                        </span>
                        
                        <a href="#" class="cp--del">x</a>
                    </div>

                    <?php $i++; ?>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <a href="#" class="cp--button cp--add">Add Color</a>
    </section>
    <?php
}