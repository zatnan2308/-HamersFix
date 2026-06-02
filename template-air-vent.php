<?php
/**
 * Template Name: Air Vent Cleaning
 *
 * Source: Air-Vent-Cleaning.html. Fully ACF-editable — every string/list falls
 * back to hf_air_vent_defaults() until a field is set. Phone / booking /
 * internal links resolve from Theme Settings.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

get_header();

$d        = hf_air_vent_defaults();
$phone_l  = hf_phone_link();
$phone_d  = hf_phone_display();
$booking  = hf_booking_url();
$call     = sprintf(__('Call %s', 'hamersfix'), $phone_d);
$phone_svg = '<svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>';
$tick_svg  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>';

/* Hero image (optional). When set, it replaces the animated vent illustration. */
$hero_img = hf_pg('hero_image', '');
$hero_url = '';
$hero_alt = hf_pg('hero_image_alt', $d['hero']['tag_text']);
if (is_array($hero_img) && !empty($hero_img['url'])) { $hero_url = $hero_img['url']; if (!empty($hero_img['alt'])) $hero_alt = $hero_img['alt']; }
elseif (is_numeric($hero_img)) { $hero_url = wp_get_attachment_image_url((int) $hero_img, 'hf-hero'); }
elseif (is_string($hero_img) && $hero_img) { $hero_url = $hero_img; }

$trust    = hf_pg_rows('hero_trust', $d['hero']['trust']);
$incl     = hf_pg_rows('incl_items', array_map(function ($t) { return ['text' => $t]; }, $d['included']['items']));
$benefits = hf_pg_rows('benefit_cards', $d['benefits']['cards']);
$props    = hf_pg_rows('prop_cards', $d['props']['cards']);
$steps    = hf_pg_rows('how_steps', $d['how']['steps']);
$signals  = hf_pg_rows('final_signals', $d['final']['signals']);
$price_from = hf_pg('hero_price_from', $d['hero']['price_from']);
?>

<main id="main">

  <nav class="crumbs" aria-label="<?php esc_attr_e('Breadcrumb', 'hamersfix'); ?>">
    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'hamersfix'); ?></a>
    <span>›</span>
    <a href="#"><?php esc_html_e('Maintenance', 'hamersfix'); ?></a>
    <span>›</span>
    <b><?php echo esc_html(get_the_title()); ?></b>
  </nav>

  <!-- 1 · HERO -->
  <section class="svc-hero" aria-labelledby="svc-h">
    <div class="svc-hero__grid">
      <div>
        <span class="hero__eyebrow"><span class="pulse"></span><?php echo esc_html(hf_pg('hero_eyebrow', $d['hero']['eyebrow'])); ?></span>
        <h1 id="svc-h"><?php echo esc_html(hf_pg('hero_h1', $d['hero']['h1'])); ?></h1>
        <p class="lede"><?php echo esc_html(hf_pg('hero_lede', $d['hero']['lede'])); ?></p>

        <div class="ctas">
          <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>" data-call-tracking="av-hero">
            <?php echo $phone_svg; ?>
            <?php echo esc_html($call); ?>
          </a>
          <?php if ($price_from) : ?>
            <span class="price-tag"><small><?php esc_html_e('Starting at', 'hamersfix'); ?></small><b><?php echo esc_html($price_from); ?></b></span>
          <?php endif; ?>
        </div>

        <?php if ($trust) : ?>
          <ul class="trust-row" aria-label="<?php esc_attr_e('Why book vent cleaning', 'hamersfix'); ?>">
            <?php foreach ($trust as $t) :
              $style = isset($t['style']) ? $t['style'] : 'default';
              $cls = $style === 'green' ? ' ic--g' : ($style === 'orange' ? ' ic--o' : ''); ?>
              <li><span class="ic<?php echo esc_attr($cls); ?>"><?php echo esc_html(isset($t['ic']) ? $t['ic'] : '✓'); ?></span><?php echo esc_html(isset($t['label']) ? $t['label'] : ''); ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>

      <figure class="hero-photo">
        <?php if ($hero_url) : ?>
          <img src="<?php echo esc_url($hero_url); ?>" alt="<?php echo esc_attr($hero_alt); ?>" loading="eager" fetchpriority="high">
        <?php else : ?>
          <div class="scene"></div>
          <svg class="vent-art" viewBox="0 0 240 200" aria-hidden="true">
            <rect x="30" y="24" width="150" height="152" rx="14" fill="#fff" stroke="#0B4F9A" stroke-width="3"/>
            <rect x="44" y="40" width="122" height="120" rx="8" fill="#EEF4FC" stroke="#0B4F9A" stroke-width="2.5"/>
            <g stroke="#0B4F9A" stroke-width="2.5" stroke-linecap="round">
              <line x1="54" y1="56" x2="156" y2="56"/>
              <line x1="54" y1="72" x2="156" y2="72"/>
              <line x1="54" y1="88" x2="156" y2="88"/>
              <line x1="54" y1="104" x2="156" y2="104"/>
              <line x1="54" y1="120" x2="156" y2="120"/>
              <line x1="54" y1="136" x2="156" y2="136"/>
            </g>
            <circle cx="40" cy="34" r="3" fill="#99A2AD"/>
            <circle cx="170" cy="34" r="3" fill="#99A2AD"/>
            <circle cx="40" cy="166" r="3" fill="#99A2AD"/>
            <circle cx="170" cy="166" r="3" fill="#99A2AD"/>
            <path class="airflow a1" d="M186 70 q20 -8 38 0"/>
            <path class="airflow a2" d="M186 100 q20 -8 42 0"/>
            <path class="airflow a3" d="M186 130 q20 -8 38 0"/>
          </svg>
        <?php endif; ?>
        <span class="badge"><?php echo esc_html(hf_pg('hero_badge_text', $d['hero']['badge_text'])); ?></span>
        <div class="tag">
          <small><?php echo esc_html(hf_pg('hero_tag_small', $d['hero']['tag_small'])); ?></small>
          <?php echo esc_html(hf_pg('hero_tag_text', $d['hero']['tag_text'])); ?>
        </div>
      </figure>
    </div>
  </section>

  <!-- 2 · WHAT'S INCLUDED -->
  <section class="s" aria-labelledby="incl-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('incl_eyebrow', $d['included']['eyebrow'])); ?></span>
      <h2 id="incl-h"><?php echo esc_html(hf_pg('incl_h2', $d['included']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('incl_intro', $d['included']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="incl-grid">
        <?php foreach ($incl as $it) :
          $txt = is_array($it) ? (isset($it['text']) ? $it['text'] : '') : $it;
          if (!$txt) continue; ?>
          <div class="incl"><span class="tick"><?php echo $tick_svg; ?></span><span class="tx"><?php echo esc_html($txt); ?></span></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 3 · BENEFITS -->
  <section class="s s--bg" aria-labelledby="ben-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('benefits_eyebrow', $d['benefits']['eyebrow'])); ?></span>
      <h2 id="ben-h"><?php echo esc_html(hf_pg('benefits_h2', $d['benefits']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('benefits_intro', $d['benefits']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="benefit-grid">
        <?php foreach ($benefits as $c) : ?>
          <div class="benefit">
            <div class="benefit__ic"><?php echo isset($c['icon']) ? $c['icon'] : ''; /* trusted SVG */ ?></div>
            <h3><?php echo esc_html(isset($c['h3']) ? $c['h3'] : ''); ?></h3>
            <p><?php echo esc_html(isset($c['p']) ? $c['p'] : ''); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 4 · RESIDENTIAL & COMMERCIAL -->
  <section class="s" aria-labelledby="prop-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('props_eyebrow', $d['props']['eyebrow'])); ?></span>
      <h2 id="prop-h"><?php echo esc_html(hf_pg('props_h2', $d['props']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('props_intro', $d['props']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="prop-grid">
        <?php foreach ($props as $c) :
          $variant = isset($c['variant']) ? $c['variant'] : 'res';
          $items   = isset($c['items']) ? $c['items'] : [];
          if (is_string($items)) $items = preg_split('/[\r\n]+/', $items); ?>
          <div class="prop prop--<?php echo esc_attr($variant); ?>">
            <div class="prop__ic"><?php echo isset($c['icon']) ? $c['icon'] : ''; /* trusted SVG */ ?></div>
            <h3><?php echo esc_html(isset($c['h3']) ? $c['h3'] : ''); ?></h3>
            <p><?php echo esc_html(isset($c['p']) ? $c['p'] : ''); ?></p>
            <ul>
              <?php foreach ((array) $items as $li) :
                $li = trim((string) (is_array($li) ? (isset($li['text']) ? $li['text'] : '') : $li));
                if ($li === '') continue; ?>
                <li><?php echo esc_html($li); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 5 · HOW IT WORKS -->
  <section class="s s--bg" aria-labelledby="how-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('how_eyebrow', $d['how']['eyebrow'])); ?></span>
      <h2 id="how-h"><?php echo esc_html(hf_pg('how_h2', $d['how']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('how_intro', $d['how']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="steps">
        <?php foreach ($steps as $st) : ?>
          <div class="step">
            <div class="num"><?php echo esc_html(isset($st['num']) ? $st['num'] : ''); ?></div>
            <h3><?php echo esc_html(isset($st['h3']) ? $st['h3'] : ''); ?></h3>
            <p><?php echo esc_html(isset($st['p']) ? $st['p'] : ''); ?></p>
            <?php if (!empty($st['time'])) : ?><div class="time"><?php echo esc_html($st['time']); ?></div><?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 6 · PRICE CALLOUT -->
  <section class="s" aria-labelledby="price-h">
    <div class="s__body">
      <div class="price-band">
        <div>
          <h3 id="price-h"><?php echo esc_html(hf_pg('price_h3', $d['price']['h3'])); ?></h3>
          <p><?php echo esc_html(hf_pg('price_intro', $d['price']['intro'])); ?></p>
        </div>
        <div class="price-band__box">
          <div class="from"><?php echo esc_html(hf_pg('price_from_label', $d['price']['from_label'])); ?></div>
          <div class="amt"><?php echo esc_html(hf_pg('price_amount', $d['price']['amount'])); ?></div>
          <div class="note"><?php echo esc_html(hf_pg('price_note', $d['price']['note'])); ?></div>
          <a class="btn btn--cta" href="tel:<?php echo esc_attr($phone_l); ?>"><?php echo esc_html(hf_pg('price_cta', $d['price']['cta'])); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- 7 · FINAL CTA -->
  <section class="final-cta" aria-labelledby="cta-h">
    <div class="final-cta__inner">
      <div>
        <span class="eyebrow"><?php echo esc_html(hf_pg('final_eyebrow', $d['final']['eyebrow'])); ?></span>
        <h2 id="cta-h"><?php echo esc_html(hf_pg('final_h2', $d['final']['h2'])); ?></h2>
        <p><?php echo esc_html(hf_pg('final_intro', $d['final']['intro'])); ?></p>
        <div class="signals">
          <?php foreach ($signals as $sg) : ?>
            <div class="sig"><div class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div><div class="tx"><b><?php echo esc_html(isset($sg['title']) ? $sg['title'] : ''); ?></b><?php echo esc_html(isset($sg['sub']) ? $sg['sub'] : ''); ?></div></div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="phone-card">
        <div class="lbl"><?php esc_html_e('Call our dispatcher', 'hamersfix'); ?></div>
        <a class="num" href="tel:<?php echo esc_attr($phone_l); ?>">
          <svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
          <div>
            <div class="digits"><?php echo esc_html($phone_d); ?></div>
            <div class="sub"><?php esc_html_e('Real person · < 60-second wait', 'hamersfix'); ?></div>
          </div>
        </a>
        <div class="or"><?php esc_html_e('or', 'hamersfix'); ?></div>
        <a class="book" href="<?php echo esc_url($booking); ?>">
          <?php esc_html_e('Book online — 60 second flow', 'hamersfix'); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
        <div class="hours">
          <span class="dot"></span>
          <?php echo esc_html(hf_hours_short()); ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
