<?php

function getColorRow( $arr, $id, $fieldName ) {
  ?>
  <section id="<?php echo $id; ?>" data-name="<?php echo $fieldName; ?>">
    <div class="cp-input-block">
      <?php if ($arr): ?>
        <?php $i = 0; ?>

        <?php foreach ($arr as $key => $color): ?>
          <div class="cp-colors">
            <label>
              Color Name:
              <input
                name="<?php echo $fieldName . 'Names[' . $i . ']'; ?>"
                value="<?php echo $key; ?>"
                required>
            </label>

            <label>
              Hex: #
              <input
                name="<?php echo $fieldName . '[' . $i . ']'; ?>"
                value="<?php echo $color; ?>"
                pattern="^([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$"
                placeholder="ffffff"
                maxlength="6"
                required>
            </label>

            <button class="cp-del">x</button>
          </div>

          <?php $i++; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <button class="cp-btn cp-add">Add Color</button>
  </section>

  <?php
}
