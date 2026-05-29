<?php
/**
 * Home section — FAQ (also powers FAQPage schema).
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$h      = hf_defaults()['home'];
$hf_faq = hf_home_rows('faq', hf_defaults()['faq']);
?>
<section class="s s--bg" aria-labelledby="faq-h">
  <div class="s__head">
    <span class="eyebrow"><?php echo esc_html(hf_home('faq_eyebrow', $h['faq_eyebrow'])); ?></span>
    <h2 id="faq-h"><?php echo esc_html(hf_home('faq_h2', $h['faq_h2'])); ?></h2>
    <p><?php echo esc_html(hf_home('faq_intro', $h['faq_intro'])); ?></p>
  </div>
  <div class="s__body">
    <div class="faq-list">
      <?php foreach ($hf_faq as $i => $f) :
        $q = isset($f['q']) ? $f['q'] : '';
        $a = isset($f['a']) ? $f['a'] : '';
        if (!$q) continue; ?>
        <details<?php echo $i === 0 ? ' open' : ''; ?>>
          <summary><?php echo esc_html($q); ?></summary>
          <p><?php echo esc_html($a); ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
