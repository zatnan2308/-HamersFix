<?php
/**
 * Template Name: Service Areas
 *
 * Source: ServiceAreas.html. Cities/ZIPs come from the Theme Settings
 * service_zips repeater; the stylized coverage map is a verbatim SVG partial.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

get_header();

$phone_l = hf_phone_link();
$phone_d = hf_phone_display();
$booking = hf_booking_url();
$call    = sprintf(__('Call %s', 'hamersfix'), $phone_d);
$cities  = hf_count_cities();
$zips    = hf_count_zips();
$contact = hf_page_url('contact', $booking);

/* ---- Defaults (editable via the page's ACF fields) ---- */
$def_regions = [
  ['pill' => 'Tier 1 · Same-day priority', 'featured' => true, 'pill_cta' => false, 'title' => 'Gwinnett · Core', 'meta' => '6 cities · HQ region',
   'cities' => ['Bethlehem', 'Braselton', 'Snellville', 'Monroe', 'Grayson', 'Statham', 'Watkinsville', 'Loganville'],
   'stats' => [['Avg arrival', '1.8 hr'], ['Same-day rate', '94%'], ['Jobs/month', '410']]],
  ['pill' => 'Tier 1 · Same-day', 'featured' => false, 'pill_cta' => false, 'title' => 'Barrow & Jackson · North', 'meta' => '4 cities · daily routes',
   'cities' => ['Lawrenceville', 'Winder', 'Statham', 'Braselton', 'Hoschton', 'Auburn'],
   'stats' => [['Avg arrival', '2.4 hr'], ['Same-day rate', '88%'], ['Jobs/month', '295']]],
  ['pill' => 'Tier 2 · By appointment', 'featured' => false, 'pill_cta' => true, 'title' => 'Walton & Oconee · Outer ring', 'meta' => '4 cities · ~25 min from HQ',
   'cities' => ['Monroe', 'Loganville', 'Bogart', 'Watkinsville'],
   'stats' => [['Avg arrival', '3.2 hr'], ['Same-day rate', '72%'], ['Jobs/month', '180']]],
];
$def_zones = [
  ['level' => 'fast', 'lbl' => 'Gwinnett · Core', 'time' => '1.8', 'suffix' => 'hr', 'area' => 'Bethlehem & ring', 'desc' => 'From booking to doorbell. HQ proximity + dense routes keep this zone fastest.', 'bar' => ''],
  ['level' => 'fast', 'lbl' => 'Barrow & Jackson · North', 'time' => '2.4', 'suffix' => 'hr', 'area' => 'Lawrenceville, Winder', 'desc' => 'Two dedicated vans cover this zone all day; same-day in 88% of cases.', 'bar' => '85%'],
  ['level' => 'med', 'lbl' => 'Athens corridor · South', 'time' => '3.2', 'suffix' => 'hr', 'area' => 'Lawrenceville, Auburn', 'desc' => 'Slightly longer routing. Call before 11 AM for same-day; after, next morning.', 'bar' => ''],
  ['level' => 'slow', 'lbl' => 'Edge zones', 'time' => 'Next', 'suffix' => 'day', 'area' => 'Outer ring', 'desc' => 'Outside our daily route. We schedule for the following morning at first window.', 'bar' => ''],
];
$def_features = ['After-hours emergency dispatch', 'NSF/health-code compliance', 'Insurance & warranty billing', 'Net-30 terms available', 'Multi-unit volume pricing', 'COI on request'];
$def_comstats = [['Active commercial accounts', '54', ''], ['Avg after-hours response', '2.1', 'hr'], ['Multi-unit property portfolios', '8', ''], ['Repeat-business rate', '92', '%']];
$def_faq = [
  ['q' => 'Do you charge extra for outer-ring cities?', 'a' => 'No — flat-rate pricing is identical across all 14 cities. The only difference is scheduling: outer-ring areas may be next-day rather than same-day.'],
  ['q' => "What if my city isn't listed?", 'a' => "Call us — we may still cover you, or we'll refer a vetted partner. We're expanding our coverage area regularly."],
  ['q' => 'How fast can you actually get here?', 'a' => 'In our core Gwinnett zone, often within 2 hours. Outer areas, same-day if you call before noon, otherwise next morning.'],
  ['q' => 'Do you cover commercial accounts everywhere?', 'a' => 'Yes — commercial service covers our entire area with after-hours emergency dispatch, including the outer ring.'],
];
$def_signals = [
  ['b' => 'Same-day across 14 cities', 'sub' => 'Call before noon'],
  ['b' => '3-month warranty', 'sub' => 'Parts & labor'],
  ['b' => 'Flat-rate pricing', 'sub' => 'All 14 cities'],
];

$regions  = hf_pg_rows('regions', $def_regions);
$zones    = hf_pg_rows('zones', $def_zones);
$features = hf_pg_rows('com_features', array_map(function ($t) { return ['text' => $t]; }, $def_features));
$comstats = hf_pg_rows('com_stats', array_map(function ($s) { return ['k' => $s[0], 'v' => $s[1], 'suffix' => $s[2]]; }, $def_comstats));
$faqs     = hf_pg_rows('faq', $def_faq);
$signals  = hf_pg_rows('final_signals', array_map(function ($s) { return ['b' => $s['b'], 'sub' => $s['sub']]; }, $def_signals));
?>

<main id="main">

  <nav class="crumbs" aria-label="<?php esc_attr_e('Breadcrumb', 'hamersfix'); ?>">
    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'hamersfix'); ?></a>
    <span>›</span>
    <b><?php echo esc_html(get_the_title()); ?></b>
  </nav>

  <?php /* ── 1 · HERO + booking card ──────────────────────────────── */ ?>
  <section class="sa-hero" aria-labelledby="hero-h">
    <div class="sa-hero__grid">
      <div>
        <span class="hero__eyebrow"><span class="pulse"></span><?php echo esc_html(hf_pg('hero_eyebrow', sprintf(__('%1$d cities · %2$d ZIPs · same-day', 'hamersfix'), $cities, $zips))); ?></span>
        <h1 id="hero-h"><?php echo hf_kses_inline(hf_pg('hero_h1', 'Serving the <em>Northeast Georgia</em> — 14 cities, one local team.')); ?></h1>
        <p class="lede"><?php echo esc_html(hf_pg('hero_lede', 'We cover the Gwinnett, Barrow and Athens area end-to-end. 8 service vans on the road, 6 days a week, with parts for the top 12 brands stocked on every truck.')); ?></p>
        <div class="ctas">
          <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>" data-call-tracking="sa-hero">
            <svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
            <?php echo esc_html($call); ?>
          </a>
          <a class="btn btn--ghost btn--lg" href="#cities"><?php esc_html_e('See all cities ↓', 'hamersfix'); ?></a>
        </div>
      </div>

      <div class="sa-zip" role="region" aria-label="<?php esc_attr_e('Book service', 'hamersfix'); ?>">
        <span class="badge-top"><?php esc_html_e('Same-day available', 'hamersfix'); ?></span>
        <h2><?php echo esc_html(hf_pg('book_h2', __('Ready to book?', 'hamersfix'))); ?></h2>
        <p><?php echo esc_html(hf_pg('book_p', __('You\'re on our coverage page — pick the option that fits. Booking takes about a minute through our scheduler.', 'hamersfix'))); ?></p>
        <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 8px;">
          <a class="btn btn--cta btn--lg" href="<?php echo esc_url($booking); ?>"<?php echo ($booking !== '#') ? ' target="_blank" rel="noopener"' : ''; ?> style="width: 100%;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 9h18M8 3v4M16 3v4"/></svg>
            <?php esc_html_e('Open booking form ↗', 'hamersfix'); ?>
          </a>
          <a class="btn btn--ghost btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>" style="width: 100%;">
            <svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
            <?php echo esc_html(sprintf(__('Or call %s', 'hamersfix'), $phone_d)); ?>
          </a>
        </div>
        <p style="margin: 16px 0 0; font-size: 13px; color: var(--ink-500); display: flex; gap: 8px; align-items: center;">
          <span style="width: 8px; height: 8px; border-radius: 50%; background: #25C97D; box-shadow: 0 0 6px rgba(37,201,125,.6);"></span>
          <?php esc_html_e('Open now · < 60-second wait · SMS confirmation', 'hamersfix'); ?>
        </p>
      </div>
    </div>
  </section>

  <?php /* ── 2 · STATS STRIP ──────────────────────────────────────── */ ?>
  <section class="stats-strip" aria-label="<?php esc_attr_e('Service area stats', 'hamersfix'); ?>">
    <div class="stats-strip__inner">
      <div class="stat"><div class="n"><?php echo esc_html($cities); ?></div><div class="l"><?php esc_html_e('Cities covered', 'hamersfix'); ?></div></div>
      <div class="stat"><div class="n"><?php echo esc_html($zips); ?></div><div class="l"><?php esc_html_e('ZIP codes', 'hamersfix'); ?></div></div>
      <div class="stat"><div class="n"><?php echo esc_html(hf_pg('stat_arrival', '2.4')); ?><small>hr</small></div><div class="l"><?php esc_html_e('Avg arrival', 'hamersfix'); ?></div></div>
      <div class="stat"><div class="n"><?php echo esc_html(hf_pg('stat_vans', '8')); ?></div><div class="l"><?php esc_html_e('Vans on road', 'hamersfix'); ?></div></div>
      <div class="stat"><div class="n"><?php echo esc_html(hf_pg('stat_ontime', '96')); ?><small>%</small></div><div class="l"><?php esc_html_e('On-time rate', 'hamersfix'); ?></div></div>
    </div>
  </section>

  <?php /* ── 3 · BIG COVERAGE MAP ─────────────────────────────────── */ ?>
  <section class="map-section" aria-labelledby="map-h">
    <div class="map-section__inner">
      <div class="s__head" style="padding:0; margin-bottom:32px">
        <span class="eyebrow"><?php esc_html_e('Coverage map', 'hamersfix'); ?></span>
        <h2 id="map-h"><?php echo esc_html(hf_pg('map_h2', __("Where you'll find our vans", 'hamersfix'))); ?></h2>
        <p><?php echo esc_html(hf_pg('map_intro', 'Gwinnett and Athens corridor — across Gwinnett, Barrow, Walton, Jackson and Oconee — from Lawrenceville east to Statham, north through Hoschton and Braselton, south to Monroe and Loganville. Beyond? We refer to vetted partners.')); ?></p>
      </div>
      <?php get_template_part('template-parts/sa-coverage-map'); ?>
    </div>
  </section>

  <?php /* ── 4 · CITIES BY REGION ─────────────────────────────────── */ ?>
  <section class="s" id="cities" aria-labelledby="cities-h">
    <div class="s__head">
      <span class="eyebrow"><?php esc_html_e('Where we work', 'hamersfix'); ?></span>
      <h2 id="cities-h"><?php echo esc_html(hf_pg('cities_h2', __('Cities we serve, grouped by region', 'hamersfix'))); ?></h2>
      <p><?php echo esc_html(hf_pg('cities_intro', 'Click your city for hyper-local info — local technician profiles, response time, top brands serviced in that ZIP cluster.')); ?></p>
    </div>
    <div class="s__body">
      <div class="regions">
        <?php foreach ($regions as $r) :
          $featured = !empty($r['featured']);
          $pill_cta = !empty($r['pill_cta']);
          // cities can be an array (default) or textarea string (ACF)
          $rc = isset($r['cities']) ? $r['cities'] : [];
          if (is_string($rc)) $rc = preg_split('/[\r\n,]+/', $rc);
          $rc = array_values(array_filter(array_map('trim', (array) $rc)));
          // stats can be array-of-pairs (default) or sub-fields (ACF)
          $rstats = [];
          if (isset($r['stats']) && is_array($r['stats'])) {
            foreach ($r['stats'] as $st) {
              if (isset($st[0])) $rstats[] = [$st[0], isset($st[1]) ? $st[1] : ''];
              elseif (isset($st['label'])) $rstats[] = [$st['label'], isset($st['value']) ? $st['value'] : ''];
            }
          }
        ?>
          <div class="region<?php echo $featured ? ' --featured' : ''; ?>">
            <span class="pill"<?php echo $pill_cta ? ' style="background:var(--cta-100);color:var(--cta-700)"' : ''; ?>><?php echo esc_html(isset($r['pill']) ? $r['pill'] : ''); ?></span>
            <h3><?php echo esc_html(isset($r['title']) ? $r['title'] : ''); ?></h3>
            <div class="meta"><?php echo esc_html(isset($r['meta']) ? $r['meta'] : ''); ?></div>
            <div class="cities">
              <?php foreach ($rc as $c) echo '<a href="#">' . esc_html($c) . '</a>'; ?>
            </div>
            <?php if ($rstats) : ?>
              <div class="stats">
                <?php foreach ($rstats as $st) : ?>
                  <div><span><?php echo esc_html($st[0]); ?></span><b><?php echo esc_html($st[1]); ?></b></div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php /* ── 5 · RESPONSE TIME BY ZONE ────────────────────────────── */ ?>
  <section class="s s--bg" aria-labelledby="resp-h">
    <div class="s__head">
      <span class="eyebrow"><?php esc_html_e('Be there fast', 'hamersfix'); ?></span>
      <h2 id="resp-h"><?php echo esc_html(hf_pg('resp_h2', __('Response time by zone', 'hamersfix'))); ?></h2>
      <p><?php echo esc_html(hf_pg('resp_intro', 'Real arrival data from the past 12 months. We track every call from booking to the tech ringing the doorbell — and we publish it.')); ?></p>
    </div>
    <div class="s__body">
      <div class="response">
        <?php foreach ($zones as $z) :
          $level = isset($z['level']) ? $z['level'] : 'fast';
          $bar = isset($z['bar']) ? $z['bar'] : ''; ?>
          <div class="response-card --<?php echo esc_attr($level); ?>">
            <div class="lbl"><?php echo esc_html(isset($z['lbl']) ? $z['lbl'] : ''); ?></div>
            <div class="time"><?php echo esc_html(isset($z['time']) ? $z['time'] : ''); ?><small><?php echo esc_html(isset($z['suffix']) ? $z['suffix'] : ''); ?></small></div>
            <div class="area"><?php echo esc_html(isset($z['area']) ? $z['area'] : ''); ?></div>
            <div class="desc"><?php echo esc_html(isset($z['desc']) ? $z['desc'] : ''); ?></div>
            <div class="bar"><div<?php echo $bar ? ' style="width:' . esc_attr($bar) . '"' : ''; ?>></div></div>
          </div>
        <?php endforeach; ?>
      </div>
      <p style="margin-top:24px; text-align:center; font-size:14px; color:var(--ink-500)">
        <?php esc_html_e('Times are', 'hamersfix'); ?> <b style="color:var(--ink-900)"><?php esc_html_e('median', 'hamersfix'); ?></b> <?php esc_html_e("across the last 12 months. We'll always quote a real arrival window when you call.", 'hamersfix'); ?>
      </p>
    </div>
  </section>

  <?php /* ── 6 · COMMERCIAL COVERAGE ──────────────────────────────── */ ?>
  <section class="s" id="commercial-coverage" aria-labelledby="com-h">
    <div class="s__body">
      <div class="com-coverage">
        <div>
          <span class="eyebrow"><?php esc_html_e('Commercial · B2B', 'hamersfix'); ?></span>
          <h2 id="com-h"><?php echo esc_html(hf_pg('com_h2', __('Restaurants & multi-unit property managers — anywhere in our zone.', 'hamersfix'))); ?></h2>
          <p><?php echo esc_html(hf_pg('com_intro', 'Single restaurants, laundromats, multi-family complexes, prep kitchens. Same map, expanded service hours. After-hours emergency dispatch; maintenance contracts available for recurring portfolios.')); ?></p>
          <ul>
            <?php foreach ($features as $f) { $t = is_array($f) ? (isset($f['text']) ? $f['text'] : '') : $f; if (!$t) continue; echo '<li>' . esc_html($t) . '</li>'; } ?>
          </ul>
          <div class="ctas">
            <a class="btn btn--cta" href="tel:<?php echo esc_attr($phone_l); ?>"><?php esc_html_e('Call B2B dispatcher', 'hamersfix'); ?></a>
            <a class="btn btn--ghost" href="<?php echo esc_url(hf_pg('com_cta_url', $contact)); ?>"><?php esc_html_e('Request a B2B quote →', 'hamersfix'); ?></a>
          </div>
        </div>
        <div class="com-stats">
          <?php foreach ($comstats as $cs) :
            $k = is_array($cs) ? (isset($cs['k']) ? $cs['k'] : '') : '';
            $v = is_array($cs) ? (isset($cs['v']) ? $cs['v'] : '') : '';
            $sfx = is_array($cs) ? (isset($cs['suffix']) ? $cs['suffix'] : '') : ''; ?>
            <div class="row">
              <div class="k"><?php echo esc_html($k); ?></div>
              <div class="v"><?php echo esc_html($v); ?><?php if ($sfx) : ?><small><?php echo esc_html($sfx); ?></small><?php endif; ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <?php /* ── 7 · FAQ ──────────────────────────────────────────────── */ ?>
  <section class="s s--bg" aria-labelledby="faq-h">
    <div class="s__head">
      <span class="eyebrow"><?php esc_html_e('Coverage FAQ', 'hamersfix'); ?></span>
      <h2 id="faq-h"><?php echo esc_html(hf_pg('faq_h2', __('Questions about coverage', 'hamersfix'))); ?></h2>
    </div>
    <div class="s__body">
      <div class="faq-list">
        <?php foreach ($faqs as $i => $f) :
          $q = isset($f['q']) ? $f['q'] : '';
          if (!$q) continue; ?>
          <details<?php echo $i === 0 ? ' open' : ''; ?>>
            <summary><?php echo esc_html($q); ?></summary>
            <p><?php echo esc_html(isset($f['a']) ? $f['a'] : ''); ?></p>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php /* ── 8 · FINAL CTA ────────────────────────────────────────── */ ?>
  <section class="final-cta" aria-labelledby="cta-h">
    <div class="final-cta__inner">
      <div>
        <span class="eyebrow"><?php esc_html_e('Ready when you are', 'hamersfix'); ?></span>
        <h2 id="cta-h"><?php echo esc_html(hf_pg('final_h2', __('Tech at your door. Today, most likely.', 'hamersfix'))); ?></h2>
        <p><?php echo esc_html(hf_pg('final_intro', "One call to a real dispatcher. Tell us your city and the appliance — we'll quote a flat rate and an arrival window on the spot.")); ?></p>
        <div class="signals">
          <?php foreach ($signals as $sg) : ?>
            <div class="sig">
              <div class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
              <div class="tx"><b><?php echo esc_html(isset($sg['b']) ? $sg['b'] : ''); ?></b><?php echo esc_html(isset($sg['sub']) ? $sg['sub'] : ''); ?></div>
            </div>
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
        <div class="hours"><span class="dot"></span><?php echo esc_html(hf_hours_short()); ?></div>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
