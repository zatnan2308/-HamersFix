<?php
/**
 * Home section — Brand wall.
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$h         = hf_defaults()['home'];
$hf_brands = hf_brands();
?>
<section class="s" id="brands" aria-labelledby="brands-h">
  <div class="s__head">
    <span class="eyebrow"><?php echo esc_html(hf_home('brands_eyebrow', $h['brands_eyebrow'])); ?></span>
    <h2 id="brands-h"><?php echo esc_html(hf_home('brands_h2', $h['brands_h2'])); ?></h2>
    <p><?php echo esc_html(hf_home('brands_intro', $h['brands_intro'])); ?></p>
  </div>
  <div class="s__body">
    <div class="brand-wall">
      <?php foreach ($hf_brands as $b) : if ($b === '') continue; ?>
        <div class="b"><?php echo esc_html($b); ?></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
