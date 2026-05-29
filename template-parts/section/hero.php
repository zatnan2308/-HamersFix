<?php
/**
 * Home section — Hero (eyebrow, H1, lede, CTAs, ZIP checker, trust row, photo).
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$h          = hf_defaults()['home'];
$hf_phone_l = hf_phone_link();
$hf_booking = hf_booking_url();

$hf_call_label = hf_home('hero_call_label', '');
if (!$hf_call_label) $hf_call_label = sprintf(__('Call %s', 'hamersfix'), hf_phone_display());
$hf_book_label = hf_home('hero_book_label', $h['hero_book_label']);

// Resolve hero image (ACF array/id/url → default).
$hf_hero   = hf_home('hero_image', '');
$hf_alt    = hf_home('hero_image_alt', $h['hero_image_alt']);
$hf_hero_url = '';
if (is_array($hf_hero) && !empty($hf_hero['url'])) {
  $hf_hero_url = $hf_hero['url'];
  if (!empty($hf_hero['alt'])) $hf_alt = $hf_hero['alt'];
} elseif (is_numeric($hf_hero)) {
  $hf_hero_url = wp_get_attachment_image_url((int) $hf_hero, 'hf-hero');
} elseif (is_string($hf_hero) && $hf_hero) {
  $hf_hero_url = $hf_hero;
}
if (!$hf_hero_url) $hf_hero_url = $h['hero_image'];
?>
<section class="hero" aria-labelledby="hero-h">
  <div class="hero__grid">
    <div>
      <span class="hero__eyebrow"><span class="pulse"></span><?php echo esc_html(hf_home('hero_eyebrow', $h['hero_eyebrow'])); ?></span>
      <h1 id="hero-h"><?php echo hf_kses_inline(hf_home('hero_h1', $h['hero_h1'])); ?></h1>
      <p class="lede"><?php echo esc_html(hf_home('hero_lede', $h['hero_lede'])); ?></p>

      <div class="hero__ctas">
        <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr($hf_phone_l); ?>" data-call-tracking="hero">
          <svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
          <?php echo esc_html($hf_call_label); ?>
        </a>
        <a class="btn btn--ghost btn--lg" href="<?php echo esc_url($hf_booking); ?>"><?php echo esc_html($hf_book_label); ?></a>
      </div>

      <?php get_template_part('template-parts/section/zip-checker'); ?>

      <ul class="trust-row" aria-label="<?php esc_attr_e('Credentials', 'hamersfix'); ?>">
        <?php foreach (hf_trust() as $t) :
          $style = isset($t['icon_style']) ? $t['icon_style'] : 'default';
          $cls = $style === 'green' ? ' ic--g' : ($style === 'orange' ? ' ic--o' : '');
        ?>
          <li><span class="ic<?php echo esc_attr($cls); ?>"><?php echo esc_html($t['icon_text']); ?></span><?php echo esc_html($t['label']); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <figure class="hero__photo">
      <img src="<?php echo esc_url($hf_hero_url); ?>" alt="<?php echo esc_attr($hf_alt); ?>" class="hf-cover" loading="eager" fetchpriority="high" width="1100" height="880">

      <div class="badge-float">
        <div class="av"><?php echo esc_html(hf_home('hero_tech_initials', $h['hero_tech_initials'])); ?></div>
        <div>
          <div class="nm"><?php echo esc_html(hf_home('hero_tech_name', $h['hero_tech_name'])); ?></div>
          <div class="ml"><?php echo esc_html(hf_home('hero_tech_meta', $h['hero_tech_meta'])); ?></div>
        </div>
      </div>

      <div class="ticket">
        <div class="lbl"><?php echo esc_html(hf_home('hero_slot_label', $h['hero_slot_label'])); ?></div>
        <div class="val"><?php echo esc_html(hf_home('hero_slot_value', $h['hero_slot_value'])); ?></div>
        <div class="ok"><?php echo esc_html(hf_home('hero_slot_note', $h['hero_slot_note'])); ?></div>
      </div>
    </figure>
  </div>
</section>
