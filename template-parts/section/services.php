<?php
/**
 * Home section — Services grid (cards from the `service` CPT, or defaults).
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$h            = hf_defaults()['home'];
$hf_services  = hf_get_services();
?>
<section class="s" id="services" aria-labelledby="svc-h">
  <div class="s__head">
    <span class="eyebrow"><?php echo esc_html(hf_home('services_eyebrow', $h['services_eyebrow'])); ?></span>
    <h2 id="svc-h"><?php echo esc_html(hf_home('services_h2', $h['services_h2'])); ?></h2>
    <p><?php echo esc_html(hf_home('services_intro', $h['services_intro'])); ?></p>
  </div>
  <div class="s__body">
    <div class="svc-grid">
      <?php foreach ($hf_services as $s) : ?>
        <a class="svc" href="<?php echo esc_url($s['url']); ?>">
          <div class="svc__ic"><?php echo hf_icon($s['icon']); /* trusted SVG */ ?></div>
          <h3><?php echo esc_html($s['title']); ?></h3>
          <p><?php echo esc_html($s['long_desc']); ?></p>
          <div class="svc__meta"><span class="price"><?php echo esc_html($s['price_note']); ?></span><span class="arrow">→</span></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
