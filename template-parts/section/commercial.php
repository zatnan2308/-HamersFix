<?php
/**
 * Home section — Commercial teaser (dark band + client snapshot panel).
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$c           = hf_defaults()['commercial'];
$hf_features = hf_home_rows('com_features', array_map(function ($t) { return ['text' => $t]; }, $c['features']));
$hf_stats    = hf_home_rows('com_stats', $c['stats']);
$hf_cta_url  = hf_home('com_cta_url', '');
if (!$hf_cta_url) $hf_cta_url = hf_booking_url();
?>
<section class="s" id="commercial" aria-labelledby="com-h">
  <div class="s__body">
    <div class="com-band">
      <div>
        <span class="eyebrow"><?php echo esc_html(hf_home('com_eyebrow', $c['eyebrow'])); ?></span>
        <h2 id="com-h"><?php echo esc_html(hf_home('com_h2', $c['h2'])); ?></h2>
        <p><?php echo esc_html(hf_home('com_intro', $c['intro'])); ?></p>
        <ul>
          <?php foreach ($hf_features as $f) {
            $t = is_array($f) ? (isset($f['text']) ? $f['text'] : '') : $f;
            if (!$t) continue;
            echo '<li>' . esc_html($t) . '</li>';
          } ?>
        </ul>
        <a href="<?php echo esc_url($hf_cta_url); ?>" class="btn btn--cta"><?php echo esc_html(hf_home('com_cta_label', $c['cta_label'])); ?></a>
      </div>
      <div class="com-band__panel">
        <div style="font: 700 12px/1 var(--ff-mono); letter-spacing:.12em; color: var(--cta-500); text-transform: uppercase;"><?php echo esc_html(hf_home('com_panel_label', $c['panel_label'])); ?></div>
        <?php $first = true; foreach ($hf_stats as $st) {
          $l = is_array($st) ? (isset($st['label']) ? $st['label'] : '') : '';
          $v = is_array($st) ? (isset($st['value']) ? $st['value'] : '') : '';
          if (!$l) continue;
          echo '<div class="row"' . ($first ? ' style="margin-top:14px"' : '') . '><span>' . esc_html($l) . '</span><b>' . esc_html($v) . '</b></div>';
          $first = false;
        } ?>
      </div>
    </div>
  </div>
</section>
