<?php
/**
 * Topline (NAP / hours / license).
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;
?>
<div class="topline" role="region" aria-label="<?php esc_attr_e('Business hours and location', 'hamersfix'); ?>">
  <div class="topline__inner">
    <div class="grp">
      <span>🕒 <?php echo esc_html(hf_hours_short()); ?></span>
      <span class="sep"></span>
      <span>📍 <?php echo esc_html(hf_serving_area()); ?></span>
    </div>
    <div class="grp">
      <?php $hf_discount = hf_discount_text(); if ($hf_discount) : ?>
        <span class="topline__offer">🎖️ <?php echo esc_html($hf_discount); ?></span>
        <span class="sep"></span>
      <?php endif; ?>
      <span><?php echo esc_html(hf_license_text()); ?></span>
    </div>
  </div>
</div>
