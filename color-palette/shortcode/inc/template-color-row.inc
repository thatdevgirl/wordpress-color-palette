<div class="template">
  <label>
    Color Name:
    <input
      name="<?php echo $fieldName . 'Names[' . $i . ']'; ?>"
      value="<?php echo $key; ?>"
      class="new-input-name"
      required>
  </label>

  <label>
    Hex: #
    <input
      name="<?php echo $fieldName . '[' . $i . ']'; ?>"
      value="<?php echo $color; ?>"
      pattern="^([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$"
      maxlength="6"
      class="new-input-hex"
      required>
  </label>

  <button class="cp-del">x</button>
</div>
