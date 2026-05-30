<?php
/**
 * Template Name: Appliance Repair Services
 *
 * Landing page for the six residential services. The service cards come from
 * the `service` CPT (same source as the homepage grid and the mega-menu);
 * headings/intro and the steps section fall back to design defaults.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

get_header();

$d        = hf_services_page_defaults();
$phone_l  = hf_phone_link();
$phone_d  = hf_phone_display();
$booking  = hf_booking_url();
$call     = sprintf(__('Call %s', 'hamersfix'), $phone_d);
$services = hf_get_services();
$steps    = hf_pg_rows('steps', hf_defaults()['steps']);
?>

<main id="main">

  <nav class="crumbs" aria-label="<?php esc_attr_e('Breadcrumb', 'hamersfix'); ?>"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'hamersfix'); ?></a><span>›</span><b><?php echo esc_html(get_the_title()); ?></b></nav>

  <!-- 1 · HERO (centered) -->
  <section class="c-hero" aria-labelledby="hero-h">
    <div class="c-hero__inner">
      <span class="hero__eyebrow"><span class="pulse"></span><?php echo esc_html(hf_pg('hero_eyebrow', $d['hero']['eyebrow'])); ?></span>
      <h1 id="hero-h"><?php echo hf_kses_inline(hf_pg('hero_h1', $d['hero']['h1'])); ?></h1>
      <p class="lede"><?php echo esc_html(hf_pg('hero_lede', $d['hero']['lede'])); ?></p>
      <div class="ctas" style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;margin-top:24px">
        <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>" data-call-tracking="services-hero">
          <svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
          <?php echo esc_html($call); ?>
        </a>
        <a class="btn btn--ghost btn--lg" href="<?php echo esc_url($booking); ?>"><?php echo esc_html(hf_pg('hero_book_label', $d['hero']['book_label'])); ?></a>
      </div>
    </div>
  </section>

  <!-- 2 · SERVICES GRID (from the service CPT) -->
  <section class="s" id="services" aria-labelledby="svc-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('services_eyebrow', $d['services']['eyebrow'])); ?></span>
      <h2 id="svc-h"><?php echo esc_html(hf_pg('services_h2', $d['services']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('services_intro', $d['services']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="svc-grid">
        <?php foreach ($services as $s) : ?>
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

  <!-- 3 · HOW IT WORKS -->
  <section class="s s--bg" aria-labelledby="how-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('steps_eyebrow', $d['steps']['eyebrow'])); ?></span>
      <h2 id="how-h"><?php echo esc_html(hf_pg('steps_h2', $d['steps']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('steps_intro', $d['steps']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="steps">
        <?php foreach ($steps as $st) : ?>
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

  <!-- 4 · CTA BAND -->
  <section class="cta-band" aria-labelledby="cta-h">
    <div class="cta-band__inner">
      <div>
        <span class="eyebrow"><?php echo esc_html(hf_pg('cta_eyebrow', $d['cta']['eyebrow'])); ?></span>
        <h2 id="cta-h"><?php echo esc_html(hf_pg('cta_h2', $d['cta']['h2'])); ?></h2>
        <p><?php echo esc_html(hf_pg('cta_intro', $d['cta']['intro'])); ?></p>
      </div>
      <div class="actions">
        <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>" style="font-size:18px"><span class="num" style="font-size:22px"><?php echo esc_html($phone_d); ?></span></a>
        <a class="btn btn--ghost btn--lg" href="<?php echo esc_url($booking); ?>" style="color:#fff;border-color:rgba(255,255,255,.4)"><?php echo esc_html(hf_pg('hero_book_label', $d['hero']['book_label'])); ?></a>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
