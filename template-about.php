<?php
/**
 * Template Name: About
 *
 * Source: About.html. Fully ACF-editable — every string/list falls back to the
 * design defaults in hf_about_defaults(). Local-area cities come from Theme
 * Settings → Service Area. Bespoke section SVGs (homes/businesses art, the
 * "friendly" visual) are kept inline as fixed decorative markup.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

get_header();

$d         = hf_about_defaults();
$phone_l   = hf_phone_link();
$phone_d   = hf_phone_display();
$booking   = hf_booking_url();
$areas_url = hf_page_url('service-areas', '#');
$ref_url   = home_url('/services/refrigerator-repair/');
$com_url   = hf_page_url('commercial', '#');
$brands_url = hf_page_url('brands', '#');
$call      = sprintf(__('Call %s', 'hamersfix'), $phone_d);
$phone_svg = '<svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>';
$chev      = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>';

$paras   = hf_pg_rows('who_paras', array_map(function ($t) { return ['text' => $t]; }, $d['who']['paras']));
$tags    = hf_pg_rows('who_tags', array_map(function ($t) { return ['text' => $t]; }, $d['who']['tags']));
$witems  = hf_pg_rows('who_items', $d['who']['items']);
$values  = hf_pg_rows('value_cards', $d['values']['cards']);
$pillars = hf_pg_rows('trust_pillars', $d['trust']['pillars']);
$hbcards = hf_pg_rows('hb_cards', $d['hb']['cards']);
$promise = hf_pg_rows('promise_steps', $d['promise']['steps']);
$acards  = hf_pg_rows('area_cards', $d['areas']['cards']);
$bcols   = hf_pg_rows('brand_cols', $d['brands']['cols']);
$fitems  = hf_pg_rows('friendly_items', array_map(function ($t) { return ['text' => $t]; }, $d['friendly']['items']));

/* Bespoke decorative SVGs for the homes/businesses cards + friendly visual. */
$svg_res = '<svg viewBox="0 0 200 140" fill="none"><rect x="20" y="10" width="56" height="120" rx="6" fill="currentColor" opacity=".25"/><rect x="22" y="12" width="52" height="38" rx="4" fill="#fff"/><rect x="22" y="54" width="52" height="74" rx="4" fill="#fff"/><rect x="90" y="40" width="48" height="60" rx="4" fill="currentColor" opacity=".25"/><circle cx="114" cy="70" r="14" fill="#fff"/><rect x="148" y="20" width="40" height="100" rx="4" fill="currentColor" opacity=".25"/><rect x="150" y="22" width="36" height="50" rx="3" fill="#fff"/><rect x="150" y="74" width="36" height="44" rx="3" fill="#fff"/></svg>';
$svg_com = '<svg viewBox="0 0 200 140" fill="none"><rect x="20" y="20" width="160" height="100" rx="6" fill="rgba(255,255,255,.12)"/><rect x="30" y="30" width="36" height="80" rx="3" fill="rgba(255,255,255,.25)"/><rect x="74" y="30" width="36" height="80" rx="3" fill="rgba(255,255,255,.18)"/><rect x="118" y="30" width="62" height="80" rx="3" fill="rgba(255,255,255,.25)"/><rect x="124" y="42" width="50" height="14" rx="2" fill="rgba(238,107,31,.4)"/><rect x="124" y="62" width="50" height="14" rx="2" fill="rgba(238,107,31,.4)"/><rect x="124" y="82" width="50" height="14" rx="2" fill="rgba(238,107,31,.4)"/><circle cx="48" cy="55" r="6" fill="#fff"/><circle cx="48" cy="80" r="6" fill="#fff"/></svg>';
?>

<main id="main">

  <nav class="crumbs" aria-label="<?php esc_attr_e('Breadcrumb', 'hamersfix'); ?>"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'hamersfix'); ?></a><span>›</span><b><?php echo esc_html(get_the_title()); ?></b></nav>

  <!-- 1 · HERO -->
  <section class="ab-hero" aria-labelledby="hero-h">
    <div class="ab-hero__inner">
      <span class="eyebrow"><?php echo esc_html(hf_pg('hero_eyebrow', $d['hero']['eyebrow'])); ?></span>
      <h1 id="hero-h"><?php echo hf_kses_inline(hf_pg('hero_h1', $d['hero']['h1'])); ?></h1>
      <p class="lede"><?php echo esc_html(hf_pg('hero_lede', $d['hero']['lede'])); ?></p>
      <div class="ctas">
        <a class="btn btn--cta btn--lg" href="<?php echo esc_url($booking); ?>"><?php echo esc_html(hf_pg('hero_cta_label', $d['hero']['cta_label'])); ?></a>
        <a class="btn btn--ghost btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>"><?php echo $phone_svg; ?><?php echo esc_html($call); ?></a>
      </div>
    </div>
  </section>

  <!-- 2 · WHO WE ARE -->
  <section class="s" aria-labelledby="who-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('who_eyebrow', $d['who']['eyebrow'])); ?></span>
      <h2 id="who-h"><?php echo esc_html(hf_pg('who_h2', $d['who']['h2'])); ?></h2>
    </div>
    <div class="s__body">
      <div class="who-grid">
        <div>
          <?php foreach ($paras as $p) { $t = is_array($p) ? (isset($p['text']) ? $p['text'] : '') : $p; if ($t) echo '<p>' . esc_html($t) . '</p>'; } ?>
          <div class="who-tags">
            <?php foreach ($tags as $tg) { $t = is_array($tg) ? (isset($tg['text']) ? $tg['text'] : '') : $tg; if ($t) echo '<span>' . esc_html($t) . '</span>'; } ?>
          </div>
        </div>
        <aside class="who-vis" aria-hidden="true">
          <div class="grid-bg"></div>
          <span class="lbl"><?php echo esc_html(hf_pg('who_vis_lbl', $d['who']['vis_lbl'])); ?></span>
          <h3><?php echo esc_html(hf_pg('who_vis_h3', $d['who']['vis_h3'])); ?></h3>
          <ul>
            <?php foreach ($witems as $it) : ?>
              <li>
                <span class="ic"><?php echo isset($it['icon']) ? $it['icon'] : ''; /* trusted SVG */ ?></span>
                <span class="tx"><?php echo esc_html(isset($it['title']) ? $it['title'] : ''); ?><small><?php echo esc_html(isset($it['sub']) ? $it['sub'] : ''); ?></small></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </aside>
      </div>
    </div>
  </section>

  <!-- 3 · OUR VALUES -->
  <section class="s s--bg" aria-labelledby="vals-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('values_eyebrow', $d['values']['eyebrow'])); ?></span>
      <h2 id="vals-h"><?php echo esc_html(hf_pg('values_h2', $d['values']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('values_intro', $d['values']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="values">
        <?php foreach ($values as $c) : ?>
          <div class="value">
            <div class="ic"><?php echo isset($c['icon']) ? $c['icon'] : ''; /* trusted SVG */ ?></div>
            <h3><?php echo esc_html(isset($c['h3']) ? $c['h3'] : ''); ?></h3>
            <p><?php echo esc_html(isset($c['p']) ? $c['p'] : ''); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 4 · TRUST & PEACE OF MIND -->
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

  <!-- 5 · HOMES & BUSINESSES -->
  <section class="s s--bg" id="commercial" aria-labelledby="hb-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('hb_eyebrow', $d['hb']['eyebrow'])); ?></span>
      <h2 id="hb-h"><?php echo esc_html(hf_pg('hb_h2', $d['hb']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('hb_intro', $d['hb']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="hb-grid">
        <?php foreach ($hbcards as $c) :
          $kind = isset($c['kind']) ? $c['kind'] : 'res';
          $items = hf_to_list(isset($c['items']) ? $c['items'] : []);
          $uk = isset($c['url_key']) ? $c['url_key'] : '';
          $url = $uk === 'service' ? $ref_url : ($uk === 'commercial' ? $com_url : '#');
        ?>
          <article class="hb-card">
            <div class="photo --<?php echo esc_attr($kind); ?>" aria-hidden="true"><?php echo $kind === 'com' ? $svg_com : $svg_res; ?></div>
            <span class="eyebrow"><?php echo esc_html(isset($c['eyebrow']) ? $c['eyebrow'] : ''); ?></span>
            <h3><?php echo esc_html(isset($c['h3']) ? $c['h3'] : ''); ?></h3>
            <p><?php echo esc_html(isset($c['p']) ? $c['p'] : ''); ?></p>
            <ul><?php foreach ($items as $li) echo '<li>' . esc_html($li) . '</li>'; ?></ul>
            <div class="more"><a href="<?php echo esc_url($url); ?>"><?php echo esc_html(isset($c['link']) ? $c['link'] : ''); ?> <?php echo $chev; ?></a></div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 6 · OUR PROMISE -->
  <section class="s" aria-labelledby="prom-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('promise_eyebrow', $d['promise']['eyebrow'])); ?></span>
      <h2 id="prom-h"><?php echo esc_html(hf_pg('promise_h2', $d['promise']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('promise_intro', $d['promise']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="promise">
        <?php foreach ($promise as $s) : ?>
          <div class="pstep"><h3><?php echo esc_html(isset($s['h3']) ? $s['h3'] : ''); ?></h3><p><?php echo esc_html(isset($s['p']) ? $s['p'] : ''); ?></p></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 7 · LOCAL SERVICE AREAS -->
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

  <!-- 8 · BRANDS & EQUIPMENT -->
  <section class="s" aria-labelledby="brands-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('brands_eyebrow', $d['brands']['eyebrow'])); ?></span>
      <h2 id="brands-h"><?php echo esc_html(hf_pg('brands_h2', $d['brands']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('brands_intro', $d['brands']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="brand-cols">
        <?php foreach ($bcols as $c) :
          $list = hf_to_list(isset($c['list']) ? $c['list'] : []);
          $prem = !empty($c['prem']);
        ?>
          <div class="brand-col<?php echo $prem ? ' --prem' : ''; ?>">
            <h3><?php echo esc_html(isset($c['h3']) ? $c['h3'] : ''); ?></h3>
            <div class="sub"><?php echo esc_html(isset($c['sub']) ? $c['sub'] : ''); ?></div>
            <ul><?php foreach ($list as $b) echo '<li>' . esc_html($b) . '</li>'; ?></ul>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="brand-cols__cta">
        <a class="btn btn--primary" href="<?php echo esc_url($brands_url); ?>"><?php echo esc_html(hf_pg('brands_cta_label', $d['brands']['cta_label'])); ?></a>
      </div>
      <p class="brand-cols__foot"><?php echo esc_html(hf_pg('brands_footnote', $d['brands']['footnote'])); ?></p>
    </div>
  </section>

  <!-- 9 · FRIENDLY & LOCAL -->
  <section class="s s--bg" aria-labelledby="friendly-h">
    <div class="s__body">
      <div class="friendly">
        <figure class="friendly__vis" aria-hidden="true">
          <svg viewBox="0 0 240 240" fill="none"><circle cx="120" cy="100" r="44" fill="currentColor" opacity=".25"/><circle cx="120" cy="100" r="36" fill="currentColor" opacity=".55"/><rect x="76" y="138" width="88" height="78" rx="12" fill="currentColor" opacity=".4"/><rect x="76" y="138" width="88" height="78" rx="12" fill="currentColor" opacity=".5"/><path d="M120 102l-12 12 12 12 12-12-12-12z" fill="#fff"/><rect x="86" y="160" width="68" height="6" rx="3" fill="#fff" opacity=".8"/><rect x="100" y="174" width="40" height="6" rx="3" fill="#fff" opacity=".6"/></svg>
          <div class="stamp">
            <div class="av"><?php echo esc_html(hf_logo_mark()); ?></div>
            <div>
              <div class="nm"><?php echo esc_html(hf_pg('friendly_stamp_nm', $d['friendly']['stamp_nm'])); ?></div>
              <div class="role"><?php echo esc_html(hf_pg('friendly_stamp_role', $d['friendly']['stamp_role'])); ?></div>
            </div>
          </div>
        </figure>
        <div>
          <span class="eyebrow" style="color:var(--brand-700)"><?php echo esc_html(hf_pg('friendly_eyebrow', $d['friendly']['eyebrow'])); ?></span>
          <h2 id="friendly-h"><?php echo esc_html(hf_pg('friendly_h2', $d['friendly']['h2'])); ?></h2>
          <p><?php echo esc_html(hf_pg('friendly_intro', $d['friendly']['intro'])); ?></p>
          <ul>
            <?php foreach ($fitems as $it) { $t = is_array($it) ? (isset($it['text']) ? $it['text'] : '') : $it; if (!$t) continue; ?>
              <li><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span><?php echo esc_html($t); ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- 10 · FINAL CTA -->
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
