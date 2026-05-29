<?php
/**
 * Home section — How it works (3 steps).
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$h        = hf_defaults()['home'];
$hf_steps = hf_home_rows('steps', hf_defaults()['steps']);
?>
<section class="s s--bg" aria-labelledby="how-h">
  <div class="s__head">
    <span class="eyebrow"><?php echo esc_html(hf_home('steps_eyebrow', $h['steps_eyebrow'])); ?></span>
    <h2 id="how-h"><?php echo esc_html(hf_home('steps_h2', $h['steps_h2'])); ?></h2>
    <p><?php echo esc_html(hf_home('steps_intro', $h['steps_intro'])); ?></p>
  </div>
  <div class="s__body">
    <div class="steps">
      <?php foreach ($hf_steps as $st) : ?>
        <div class="step">
          <div class="num"><?php echo esc_html(isset($st['num']) ? $st['num'] : ''); ?></div>
          <h3><?php echo esc_html(isset($st['title']) ? $st['title'] : ''); ?></h3>
          <p><?php echo esc_html(isset($st['desc']) ? $st['desc'] : ''); ?></p>
          <div class="time"><?php echo esc_html(isset($st['time']) ? $st['time'] : ''); ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
