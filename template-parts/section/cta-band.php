<?php
/**
 * Home section — Phone CTA band (dark).
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$h          = hf_defaults()['home'];
$hf_phone_l = hf_phone_link();
$hf_phone_d = hf_phone_display();
$hf_booking = hf_booking_url();
$hf_book_label = hf_home('hero_book_label', $h['hero_book_label']);
?>
<section class="cta-band" aria-labelledby="cta-h">
  <div class="cta-band__inner">
    <div>
      <span class="eyebrow"><?php echo esc_html(hf_home('cta_eyebrow', $h['cta_eyebrow'])); ?></span>
      <h2 id="cta-h"><?php echo esc_html(hf_home('cta_h2', $h['cta_h2'])); ?></h2>
      <p><?php echo esc_html(hf_home('cta_intro', $h['cta_intro'])); ?></p>
    </div>
    <div class="actions">
      <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr($hf_phone_l); ?>" style="font-size:18px"><span class="num" style="font-size:22px"><?php echo esc_html($hf_phone_d); ?></span></a>
      <a class="btn btn--ghost btn--lg" href="<?php echo esc_url($hf_booking); ?>" style="color:#fff;border-color:rgba(255,255,255,.4)"><?php echo esc_html($hf_book_label); ?></a>
    </div>
  </div>
</section>
