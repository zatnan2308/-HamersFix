<?php
/**
 * Template Name: Reviews
 *
 * Aggregate rating + testimonial grid + CTA. Ratings/counts/testimonials are
 * editable placeholders (flagged in the ACF group) — replace with verified
 * data before publishing.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

get_header();

$d        = hf_reviews_defaults();
$phone_l  = hf_phone_link();
$phone_d  = hf_phone_display();
$booking  = hf_booking_url();
$call     = sprintf(__('Call %s', 'hamersfix'), $phone_d);

$agg     = $d['agg'];
$score   = hf_pg('review_score', $agg['score']);
$title   = hf_pg('review_title', $agg['title']);
$sources = hf_pg_rows('review_sources', $agg['sources']);
$reviews = hf_pg_rows('reviews', $d['reviews']);
?>

<main id="main">

  <nav class="crumbs" aria-label="<?php esc_attr_e('Breadcrumb', 'hamersfix'); ?>"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'hamersfix'); ?></a><span>›</span><b><?php echo esc_html(get_the_title()); ?></b></nav>

  <!-- 1 · HERO (centered) -->
  <section class="c-hero" aria-labelledby="hero-h">
    <div class="c-hero__inner">
      <span class="hero__eyebrow"><span class="pulse"></span><?php echo esc_html(hf_pg('hero_eyebrow', $d['hero']['eyebrow'])); ?></span>
      <h1 id="hero-h"><?php echo hf_kses_inline(hf_pg('hero_h1', $d['hero']['h1'])); ?></h1>
      <p class="lede"><?php echo esc_html(hf_pg('hero_lede', $d['hero']['lede'])); ?></p>
    </div>
  </section>

  <!-- 2 · AGGREGATE + REVIEWS -->
  <section class="s" id="reviews" aria-labelledby="rev-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('reviews_eyebrow', __('Reviews', 'hamersfix'))); ?></span>
      <h2 id="rev-h"><?php echo esc_html(hf_pg('reviews_h2', sprintf(__('%1$s stars from verified neighbors', 'hamersfix'), $score))); ?></h2>
      <p><?php echo esc_html(hf_pg('reviews_intro', __('Verified reviews across Google, BBB, Yelp, and HomeAdvisor — no curated highlight reel.', 'hamersfix'))); ?></p>
    </div>
    <div class="s__body">
      <div class="agg">
        <div class="agg__score"><?php echo esc_html($score); ?></div>
        <div class="agg__meta">
          <div class="stars"><?php echo esc_html(isset($agg['stars']) ? $agg['stars'] : '★★★★★'); ?></div>
          <div class="ttl"><?php echo esc_html($title); ?></div>
          <div class="src">
            <?php foreach ($sources as $src) : ?>
              <span><b><?php echo esc_html(isset($src['name']) ? $src['name'] : ''); ?></b> <?php echo esc_html(isset($src['value']) ? $src['value'] : ''); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="review-grid">
        <?php foreach ($reviews as $r) : ?>
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

  <!-- 3 · CTA BAND -->
  <section class="cta-band" aria-labelledby="cta-h">
    <div class="cta-band__inner">
      <div>
        <span class="eyebrow"><?php echo esc_html(hf_pg('cta_eyebrow', $d['cta']['eyebrow'])); ?></span>
        <h2 id="cta-h"><?php echo esc_html(hf_pg('cta_h2', $d['cta']['h2'])); ?></h2>
        <p><?php echo esc_html(hf_pg('cta_intro', $d['cta']['intro'])); ?></p>
      </div>
      <div class="actions">
        <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>" style="font-size:18px"><span class="num" style="font-size:22px"><?php echo esc_html($phone_d); ?></span></a>
        <a class="btn btn--ghost btn--lg" href="<?php echo esc_url($booking); ?>" style="color:#fff;border-color:rgba(255,255,255,.4)"><?php esc_html_e('Book online →', 'hamersfix'); ?></a>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
