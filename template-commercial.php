<?php
/**
 * Template Name: Commercial
 *
 * Source: Commercial.html. Fully ACF-editable — every string/list falls back
 * to the design defaults in hf_commercial_defaults() until a field is set.
 * Phone / booking / internal links resolve from Theme Settings.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

get_header();

$d         = hf_commercial_defaults();
$phone_l   = hf_phone_link();
$phone_d   = hf_phone_display();
$booking   = hf_booking_url();
$areas_url = hf_page_url('service-areas', '#');
$call      = sprintf(__('Call %s', 'hamersfix'), $phone_d);
$phone_svg = '<svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>';

/* Hero image (ACF array/id/url → default). */
$hero_img = hf_pg('hero_image', '');
$hero_alt = hf_pg('hero_image_alt', $d['hero']['image_alt']);
$hero_url = '';
if (is_array($hero_img) && !empty($hero_img['url'])) { $hero_url = $hero_img['url']; if (!empty($hero_img['alt'])) $hero_alt = $hero_img['alt']; }
elseif (is_numeric($hero_img)) { $hero_url = wp_get_attachment_image_url((int) $hero_img, 'hf-hero'); }
elseif (is_string($hero_img) && $hero_img) { $hero_url = $hero_img; }
if (!$hero_url) $hero_url = $d['hero']['image'];

$issues   = hf_pg_rows('hero_issues', array_map(function ($t) { return ['text' => $t]; }, $d['hero']['issues']));
$qpills   = hf_pg_rows('hero_qpills', array_map(function ($t) { return ['text' => $t]; }, $d['hero']['qpills']));
$services = hf_pg_rows('com_services', $d['services']['cards']);
$downtime = hf_pg_rows('downtime', $d['downtime']['cards']);
$pillars  = hf_pg_rows('trust_pillars', $d['trust']['pillars']);
$blist    = hf_pg_rows('brand_list', array_map(function ($t) { return ['name' => $t]; }, $d['brands']['list']));
$steps    = hf_pg_rows('process_steps', $d['process']['steps']);
$acards   = hf_pg_rows('area_cards', $d['areas']['cards']);
$faqs     = hf_pg_rows('faq', $d['faq']['items']);

/** Coerce a chips/cities value (array, ACF rows, or comma/newline string) to a flat string array. */
function hf_com_list($v) {
  if (is_string($v)) $v = preg_split('/[\r\n,]+/', $v);
  $out = [];
  foreach ((array) $v as $x) {
    $s = is_array($x) ? (isset($x['text']) ? $x['text'] : (isset($x['name']) ? $x['name'] : '')) : $x;
    $s = trim((string) $s);
    if ($s !== '') $out[] = $s;
  }
  return $out;
}
?>

<main id="main">

  <nav class="crumbs" aria-label="<?php esc_attr_e('Breadcrumb', 'hamersfix'); ?>"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'hamersfix'); ?></a><span>›</span><b><?php echo esc_html(get_the_title()); ?></b></nav>

  <!-- 1 · HERO -->
  <section class="c-hero" aria-labelledby="hero-h">
    <div class="c-hero__grid">
      <div>
        <span class="hero__eyebrow"><span class="pulse"></span><?php echo esc_html(hf_pg('hero_eyebrow', $d['hero']['eyebrow'])); ?></span>
        <h1 id="hero-h"><?php echo hf_kses_inline(hf_pg('hero_h1', $d['hero']['h1'])); ?></h1>
        <p class="lede"><?php echo esc_html(hf_pg('hero_lede', $d['hero']['lede'])); ?></p>

        <div class="issues">
          <?php foreach ($issues as $i) { $t = is_array($i) ? (isset($i['text']) ? $i['text'] : '') : $i; if ($t) echo '<span>' . esc_html($t) . '</span>'; } ?>
        </div>

        <div class="ctas">
          <a class="btn btn--cta btn--lg" href="<?php echo esc_url($booking); ?>"><?php echo esc_html(hf_pg('hero_cta_label', $d['hero']['cta_label'])); ?></a>
          <a class="btn btn--ghost btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>"><?php echo $phone_svg; ?><?php esc_html_e('Call Now', 'hamersfix'); ?></a>
        </div>
        <p class="note"><?php echo esc_html(hf_pg('hero_note', $d['hero']['note'])); ?></p>

        <div class="qpills">
          <?php foreach ($qpills as $q) { $t = is_array($q) ? (isset($q['text']) ? $q['text'] : '') : $q; if ($t) echo '<span>' . esc_html($t) . '</span>'; } ?>
        </div>
      </div>

      <figure class="c-hero__photo">
        <img src="<?php echo esc_url($hero_url); ?>" alt="<?php echo esc_attr($hero_alt); ?>" loading="eager" fetchpriority="high">
        <span class="badge"><?php echo esc_html(hf_pg('hero_badge', $d['hero']['badge'])); ?></span>
        <div class="tag">
          <div class="lbl"><?php echo esc_html(hf_pg('hero_tag_lbl', $d['hero']['tag_lbl'])); ?></div>
          <h3><?php echo esc_html(hf_pg('hero_tag_h3', $d['hero']['tag_h3'])); ?></h3>
        </div>
      </figure>
    </div>
  </section>

  <!-- 2 · OUR SERVICES -->
  <section class="s" aria-labelledby="svc-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('services_eyebrow', $d['services']['eyebrow'])); ?></span>
      <h2 id="svc-h"><?php echo esc_html(hf_pg('services_h2', $d['services']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('services_intro', $d['services']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="com-svc-grid">
        <?php foreach ($services as $c) : $chips = hf_com_list(isset($c['chips']) ? $c['chips'] : []); ?>
          <a class="com-svc" href="#book">
            <div class="com-svc__art" style="background: <?php echo esc_attr(isset($c['gradient']) ? $c['gradient'] : 'var(--brand-900)'); ?>;">
              <div class="ic"><?php echo isset($c['icon']) ? $c['icon'] : ''; /* trusted SVG */ ?></div>
            </div>
            <div class="com-svc__bd">
              <h3><?php echo esc_html(isset($c['title']) ? $c['title'] : ''); ?></h3>
              <p><?php echo esc_html(isset($c['desc']) ? $c['desc'] : ''); ?></p>
              <div class="chips"><?php foreach ($chips as $ch) echo '<span>' . esc_html($ch) . '</span>'; ?></div>
              <div class="more"><span><?php esc_html_e('Learn more', 'hamersfix'); ?></span><span>→</span></div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 3 · COMMON DOWNTIME -->
  <section class="s s--bg" aria-labelledby="down-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('downtime_eyebrow', $d['downtime']['eyebrow'])); ?></span>
      <h2 id="down-h"><?php echo esc_html(hf_pg('downtime_h2', $d['downtime']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('downtime_intro', $d['downtime']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="down-grid">
        <?php foreach ($downtime as $c) : ?>
          <div class="down-card">
            <div class="ic"><?php echo isset($c['icon']) ? $c['icon'] : ''; /* trusted SVG */ ?></div>
            <h3><?php echo esc_html(isset($c['title']) ? $c['title'] : ''); ?></h3>
            <p><?php echo esc_html(isset($c['desc']) ? $c['desc'] : ''); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 4 · TRUST & UPTIME -->
  <section class="s" aria-labelledby="trust-h">
    <div class="s__body">
      <div class="trust-band">
        <div class="trust-band__head">
          <span class="eyebrow"><?php echo esc_html(hf_pg('trust_eyebrow', $d['trust']['eyebrow'])); ?></span>
          <h2 id="trust-h"><?php echo esc_html(hf_pg('trust_h2', $d['trust']['h2'])); ?></h2>
          <p><?php echo esc_html(hf_pg('trust_intro', $d['trust']['intro'])); ?></p>
        </div>
        <div class="pillars">
          <?php foreach ($pillars as $p) : ?>
            <div class="pillar">
              <div class="ic"><?php echo isset($p['icon']) ? $p['icon'] : ''; /* trusted SVG */ ?></div>
              <div class="val"><?php echo esc_html(isset($p['val']) ? $p['val'] : ''); ?></div>
              <div class="lbl"><?php echo esc_html(isset($p['lbl']) ? $p['lbl'] : ''); ?></div>
              <div class="sub"><?php echo esc_html(isset($p['sub']) ? $p['sub'] : ''); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- 5 · BRANDS -->
  <section class="s s--bg" aria-labelledby="brands-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('brands_eyebrow', $d['brands']['eyebrow'])); ?></span>
      <h2 id="brands-h"><?php echo esc_html(hf_pg('brands_h2', $d['brands']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('brands_intro', $d['brands']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="com-brand-card">
        <div class="head">
          <div>
            <h3><?php echo esc_html(hf_pg('brands_card_h3', $d['brands']['card_h3'])); ?></h3>
            <div class="meta"><?php echo esc_html(hf_pg('brands_card_meta', $d['brands']['card_meta'])); ?></div>
          </div>
        </div>
        <div class="com-brand-list">
          <?php foreach ($blist as $b) { $n = is_array($b) ? (isset($b['name']) ? $b['name'] : '') : $b; if ($n) echo '<span>' . esc_html($n) . '</span>'; } ?>
        </div>
        <div class="footnote"><?php echo esc_html(hf_pg('brands_footnote', $d['brands']['footnote'])); ?></div>
      </div>

      <div class="ask-band">
        <div class="tx">
          <h4><?php echo esc_html(hf_pg('brands_ask_h4', $d['brands']['ask_h4'])); ?></h4>
          <p><?php echo esc_html(hf_pg('brands_ask_p', $d['brands']['ask_p'])); ?></p>
        </div>
        <a class="btn btn--cta" href="tel:<?php echo esc_attr($phone_l); ?>"><?php echo esc_html(hf_pg('brands_ask_btn', $d['brands']['ask_btn'])); ?></a>
      </div>
    </div>
  </section>

  <!-- 6 · WHAT TO EXPECT -->
  <section class="s" aria-labelledby="proc-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('process_eyebrow', $d['process']['eyebrow'])); ?></span>
      <h2 id="proc-h"><?php echo esc_html(hf_pg('process_h2', $d['process']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('process_intro', $d['process']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="proc">
        <?php foreach ($steps as $s) : ?>
          <div class="pstep">
            <h3><?php echo esc_html(isset($s['title']) ? $s['title'] : ''); ?></h3>
            <p><?php echo esc_html(isset($s['desc']) ? $s['desc'] : ''); ?></p>
            <div class="tag"><?php echo esc_html(isset($s['tag']) ? $s['tag'] : ''); ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 7 · LOCAL COVERAGE -->
  <section class="s s--bg" aria-labelledby="areas-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('areas_eyebrow', $d['areas']['eyebrow'])); ?></span>
      <h2 id="areas-h"><?php echo esc_html(hf_pg('areas_h2', $d['areas']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('areas_intro', $d['areas']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="areas-list">
        <?php foreach ($acards as $a) : ?>
          <a class="area-card" href="<?php echo esc_url($areas_url); ?>">
            <div class="num"><?php echo esc_html(isset($a['num']) ? $a['num'] : ''); ?></div>
            <h4><?php echo esc_html(isset($a['title']) ? $a['title'] : ''); ?></h4>
            <div class="cities"><?php echo esc_html(isset($a['cities']) ? $a['cities'] : ''); ?></div>
            <div class="arrow"><span><?php echo esc_html(isset($a['link']) ? $a['link'] : __('View area', 'hamersfix')); ?></span><span>→</span></div>
          </a>
        <?php endforeach; ?>
      </div>

      <div class="areas-cta">
        <p><b><?php echo esc_html(hf_pg('areas_cta_note', $d['areas']['cta_note'])); ?></b><?php echo esc_html(hf_pg('areas_cta_text', $d['areas']['cta_text'])); ?></p>
        <a class="btn btn--cta" href="tel:<?php echo esc_attr($phone_l); ?>"><?php echo esc_html($call); ?></a>
      </div>
    </div>
  </section>

  <!-- 8 · FAQ -->
  <section class="s" aria-labelledby="faq-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('faq_eyebrow', $d['faq']['eyebrow'])); ?></span>
      <h2 id="faq-h"><?php echo esc_html(hf_pg('faq_h2', $d['faq']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('faq_intro', $d['faq']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="faq-list">
        <?php foreach ($faqs as $i => $f) { $q = isset($f['q']) ? $f['q'] : ''; if (!$q) continue; ?>
          <details<?php echo $i === 0 ? ' open' : ''; ?>>
            <summary><?php echo esc_html($q); ?></summary>
            <p><?php echo esc_html(isset($f['a']) ? $f['a'] : ''); ?></p>
          </details>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- 9 · FINAL CTA -->
  <section class="final-cta" id="book" aria-labelledby="cta-h">
    <div class="final-cta__inner">
      <div>
        <span class="eyebrow"><?php echo esc_html(hf_pg('final_eyebrow', $d['final']['eyebrow'])); ?></span>
        <h2 id="cta-h"><?php echo esc_html(hf_pg('final_h2', $d['final']['h2'])); ?></h2>
        <p><?php echo esc_html(hf_pg('final_intro', $d['final']['intro'])); ?></p>
      </div>
      <div class="phone-card">
        <div class="lbl"><?php echo esc_html(hf_pg('final_card_lbl', $d['final']['card_lbl'])); ?></div>
        <a class="num" href="tel:<?php echo esc_attr($phone_l); ?>"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg><div><div class="digits"><?php echo esc_html($phone_d); ?></div><div class="sub"><?php esc_html_e('Real person · < 60 sec wait', 'hamersfix'); ?></div></div></a>
        <div class="or"><?php esc_html_e('or', 'hamersfix'); ?></div>
        <a class="book" href="<?php echo esc_url($booking); ?>"><?php echo esc_html(hf_pg('hero_cta_label', $d['hero']['cta_label'])); ?> <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        <div class="hours"><span class="dot"></span><?php echo esc_html(hf_hours_short()); ?></div>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
