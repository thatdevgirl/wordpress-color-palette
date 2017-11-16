<?php

function insertColorRow($arr, $id, $fieldName) {
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

            <a href="#" class="cp-del">x</a>
          </div>

          <?php $i++; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <a href="#" class="cp-btn cp-add">Add Color</a>
  </section>

  <?php
}
