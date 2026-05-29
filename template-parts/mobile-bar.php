<?php
/**
 * Sticky mobile bottom bar (hidden ≥ 769px via CSS).
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;
?>
<div class="mb-bar" role="region" aria-label="<?php esc_attr_e('Quick actions', 'hamersfix'); ?>">
  <a class="btn btn--cta" href="tel:<?php echo esc_attr(hf_phone_link()); ?>" data-call-tracking="mb-sticky">
    <svg width="16" height="16" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
    <?php esc_html_e('Call now', 'hamersfix'); ?>
  </a>
  <a class="btn btn--primary" href="<?php echo esc_url(hf_booking_url()); ?>"><?php esc_html_e('Book online', 'hamersfix'); ?></a>
</div>
