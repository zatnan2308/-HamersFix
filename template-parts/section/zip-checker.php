<?php
/**
 * Home section — real ZIP coverage checker (driven by assets/js/zip-checker.js).
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;
?>
<form class="zipbox" id="hf-zipbox" novalidate>
  <label for="hf-zip"><?php echo esc_html(hf_opt('zip_label', hf_d('zip_copy', 'zip_label'))); ?></label>
  <div class="row">
    <input id="hf-zip" name="zip" class="input" inputmode="numeric" pattern="\d{5}" maxlength="5" autocomplete="postal-code" placeholder="<?php echo esc_attr(hf_opt('zip_placeholder', hf_d('zip_copy', 'zip_placeholder'))); ?>" aria-describedby="hf-zip-hint">
    <button class="btn btn--primary" type="submit"><?php esc_html_e('Check coverage', 'hamersfix'); ?></button>
  </div>
  <div class="hint" id="hf-zip-hint"><?php echo esc_html(hf_zip_hint()); ?></div>
  <div class="zipbox__msg" role="status" aria-live="polite"></div>
</form>
