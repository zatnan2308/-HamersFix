<?php
/**
 * Home section — Reviews (aggregate + testimonials).
 * NOTE: ratings/counts/testimonials are editable placeholders.
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$h          = hf_defaults()['home'];
$hf_agg     = hf_reviews_agg();
$hf_reviews = hf_home_rows('reviews', hf_defaults()['reviews']);
?>
<section class="s s--bg" id="reviews" aria-labelledby="rev-h">
  <div class="s__head">
    <span class="eyebrow"><?php echo esc_html(hf_home('reviews_eyebrow', $h['reviews_eyebrow'])); ?></span>
    <h2 id="rev-h"><?php echo esc_html(hf_home('reviews_h2', $h['reviews_h2'])); ?></h2>
    <p><?php echo esc_html(hf_home('reviews_intro', $h['reviews_intro'])); ?></p>
  </div>
  <div class="s__body">
    <div class="agg">
      <div class="agg__score"><?php echo esc_html($hf_agg['score']); ?></div>
      <div class="agg__meta">
        <div class="stars"><?php echo esc_html(isset($hf_agg['stars']) ? $hf_agg['stars'] : '★★★★★'); ?></div>
        <div class="ttl"><?php echo esc_html($hf_agg['title']); ?></div>
        <div class="src">
          <?php foreach ($hf_agg['sources'] as $src) : ?>
            <span><b><?php echo esc_html(isset($src['name']) ? $src['name'] : ''); ?></b> <?php echo esc_html(isset($src['value']) ? $src['value'] : ''); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="review-grid">
      <?php foreach ($hf_reviews as $r) : ?>
        <article class="review">
          <div class="head"><div class="stars" aria-label="<?php esc_attr_e('5 of 5', 'hamersfix'); ?>">★★★★★</div><span class="src"><?php echo esc_html(isset($r['source']) ? $r['source'] : ''); ?></span></div>
          <p>&ldquo;<?php echo esc_html(isset($r['text']) ? $r['text'] : ''); ?>&rdquo;</p>
          <div class="who">
            <span class="av"><?php echo esc_html(isset($r['initials']) ? $r['initials'] : ''); ?></span>
            <div><div class="nm"><?php echo esc_html(isset($r['name']) ? $r['name'] : ''); ?></div><div class="meta"><?php echo esc_html(isset($r['meta']) ? $r['meta'] : ''); ?></div></div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
