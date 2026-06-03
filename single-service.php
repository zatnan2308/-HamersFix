<?php
/**
 * Single service template — drives all residential services (source:
 * Refrigerator-Repair.html). The Refrigerator ships with full default content;
 * other appliances inherit hero/brands/areas/final and hide problems/types/
 * reviews/faq until those repeaters are filled.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

get_header();

while (have_posts()) :
  the_post();

  $pid     = get_the_ID();
  $sd      = hf_service_defaults();
  $is_ref  = hf_is_ref_service($pid);
  $phone_l = hf_phone_link();
  $phone_d = hf_phone_display();
  $booking = hf_booking_url();
  $call    = sprintf(__('Call %s', 'hamersfix'), $phone_d);
  $title   = get_the_title();
  $phone_svg = '<svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>';

  /* Per-appliance design partials (Problems/Types grids) + headings, keyed by
     the service icon slug. Each appliance ships verbatim grids extracted from
     its Claude Design mock; the reference (fridge) uses its own partials. */
  $hf_slug = '';
  if (function_exists('get_field')) { $hf_icon = get_field('icon', $pid); if (is_string($hf_icon) && $hf_icon !== '') $hf_slug = $hf_icon; }
  if ($hf_slug === '' && $is_ref) $hf_slug = 'fridge';
  $hf_grids     = function_exists('hf_appliance_grids') ? hf_appliance_grids() : [];
  $hf_gh        = ($hf_slug && isset($hf_grids[$hf_slug])) ? $hf_grids[$hf_slug] : [];
  $hf_prob_part = $hf_slug ? locate_template('template-parts/svc/problems-' . $hf_slug . '.php') : '';
  $hf_type_part = $hf_slug ? locate_template('template-parts/svc/types-' . $hf_slug . '.php') : '';
  ?>

<main id="main">

  <nav class="crumbs" aria-label="<?php esc_attr_e('Breadcrumb', 'hamersfix'); ?>">
    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'hamersfix'); ?></a>
    <span>›</span>
    <a href="#"><?php esc_html_e('Residential', 'hamersfix'); ?></a>
    <span>›</span>
    <b><?php echo esc_html($title); ?></b>
  </nav>

  <?php
  /* ── 1 · HERO ─────────────────────────────────────────────── */
  $hero_img = hf_svc('hero_image', '', $pid);
  $hero_alt = hf_svc('hero_image_alt', $sd['hero']['image_alt'], $pid);
  $hero_url = '';
  if (is_array($hero_img) && !empty($hero_img['url'])) {
    $hero_url = $hero_img['url'];
    if (!empty($hero_img['alt'])) $hero_alt = $hero_img['alt'];
  } elseif (is_numeric($hero_img)) {
    $hero_url = wp_get_attachment_image_url((int) $hero_img, 'hf-hero');
  } elseif (is_string($hero_img) && $hero_img) {
    $hero_url = $hero_img;
  }
  if (!$hero_url && has_post_thumbnail($pid)) $hero_url = get_the_post_thumbnail_url($pid, 'hf-hero');
  if (!$hero_url && $is_ref) $hero_url = $sd['hero']['image'];

  $hero_eyebrow = hf_svc('hero_eyebrow', $sd['hero']['eyebrow'], $pid);
  $hero_h1   = hf_svc('hero_h1', ($is_ref ? 'Refrigerator repair across Northeast Georgia' : sprintf(__('%s across Northeast Georgia', 'hamersfix'), $title)), $pid);
  $hero_lede = hf_svc('hero_lede', ($is_ref ? $sd['hero']['lede'] : ''), $pid);
  $epa_show  = $is_ref ? true : (bool) hf_svc('epa_badge', false, $pid);
  $trust     = $is_ref ? $sd['hero']['trust'] : [];
  ?>
  <section class="svc-hero" aria-labelledby="svc-h">
    <div class="svc-hero__grid">
      <div>
        <span class="hero__eyebrow"><span class="pulse"></span><?php echo esc_html($hero_eyebrow); ?></span>
        <h1 id="svc-h"><?php echo esc_html($hero_h1); ?></h1>
        <?php if ($hero_lede) : ?><p class="lede"><?php echo esc_html($hero_lede); ?></p><?php endif; ?>

        <div class="ctas">
          <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>" data-call-tracking="svc-hero">
            <?php echo $phone_svg; ?>
            <?php echo esc_html($call); ?>
          </a>
          <a class="btn btn--ghost btn--lg" href="<?php echo esc_url($booking); ?>"><?php esc_html_e('Book online →', 'hamersfix'); ?></a>
        </div>

        <?php
        $hf_diag = hf_diagnostic_lines($hf_slug);
        if (!empty($hf_diag['base'])) : ?>
          <div class="diag-note">
            <span class="diag-note__row"><span class="diag-note__ic" aria-hidden="true">🔧</span><?php echo esc_html($hf_diag['base']); ?></span>
            <?php if (!empty($hf_diag['combo'])) : ?>
              <span class="diag-note__row diag-note__row--combo"><?php echo esc_html($hf_diag['combo']); ?></span>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($epa_show) : ?>
          <div style="margin-top:24px">
            <div class="epa-badge">
              <div class="ic">608</div>
              <div>
                <small><?php esc_html_e('EPA Section 608', 'hamersfix'); ?></small>
                <?php echo esc_html(hf_svc('epa_text', $sd['hero']['epa_text'], $pid)); ?>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($trust) : ?>
          <ul class="trust-row" aria-label="<?php esc_attr_e('Credentials', 'hamersfix'); ?>">
            <?php foreach ($trust as $t) :
              $cls = $t['style'] === 'green' ? ' ic--g' : ($t['style'] === 'orange' ? ' ic--o' : ''); ?>
              <li><span class="ic<?php echo esc_attr($cls); ?>"><?php echo esc_html($t['ic']); ?></span><?php echo esc_html($t['label']); ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>

      <figure class="fridge-illus">
        <?php if ($hero_url) : ?>
          <img src="<?php echo esc_url($hero_url); ?>" alt="<?php echo esc_attr($hero_alt); ?>" class="hf-cover" loading="eager" fetchpriority="high" width="1100" height="880">
          <span class="badge" style="position:absolute;left:20px;top:20px;z-index:2"><?php echo esc_html(hf_svc('hero_badge_text', $sd['hero']['badge_text'], $pid)); ?></span>
          <div class="tag" style="left:auto;right:24px;bottom:24px;top:auto;z-index:2">
            <small><?php echo esc_html($sd['hero']['tag_small']); ?></small>
            <?php echo esc_html(hf_svc('hero_tag_text', $sd['hero']['tag_text'], $pid)); ?>
          </div>
        <?php endif; ?>
      </figure>
    </div>
  </section>

  <?php
  /* ── 2 · PROBLEMS WE REPAIR ───────────────────────────────── */
  $prob_rows = hf_svc_rows('problems', [], $pid);
  $hf_pg_eye = $hf_gh ? $hf_gh['problems']['eyebrow'] : $sd['problems']['eyebrow'];
  $hf_pg_h2  = $hf_gh ? $hf_gh['problems']['h2'] : ($is_ref ? $sd['problems']['h2'] : sprintf(__('%s problems we repair', 'hamersfix'), $title));
  $hf_pg_in  = $hf_gh ? $hf_gh['problems']['intro'] : $sd['problems']['intro'];
  if (!empty($prob_rows) || $hf_prob_part || $is_ref) : ?>
    <section class="s" aria-labelledby="prob-h">
      <div class="s__head">
        <span class="eyebrow"><?php echo esc_html(hf_svc('problems_eyebrow', $hf_pg_eye, $pid)); ?></span>
        <h2 id="prob-h"><?php echo esc_html(hf_svc('problems_h2', $hf_pg_h2, $pid)); ?></h2>
        <p><?php echo esc_html(hf_svc('problems_intro', $hf_pg_in, $pid)); ?></p>
      </div>
      <div class="s__body">
        <?php if (!empty($prob_rows)) : ?>
          <div class="prob-grid">
            <?php foreach ($prob_rows as $p) : ?>
              <a class="prob" href="#book">
                <div class="prob__ic"><?php echo hf_icon(isset($p['icon']) ? $p['icon'] : ''); ?></div>
                <h3><?php echo esc_html(isset($p['title']) ? $p['title'] : ''); ?></h3>
                <p><?php echo esc_html(isset($p['desc']) ? $p['desc'] : ''); ?></p>
                <div class="arrow"><?php esc_html_e('Get a quote →', 'hamersfix'); ?></div>
              </a>
            <?php endforeach; ?>
          </div>
        <?php elseif ($hf_prob_part) : load_template($hf_prob_part, false); else : get_template_part('template-parts/svc/problems', 'fridge'); endif; ?>
        <p style="margin-top:24px; text-align:center; color:var(--ink-500); font-size:14.5px;">
          <?php esc_html_e("Don't see your symptom?", 'hamersfix'); ?>
          <a href="tel:<?php echo esc_attr($phone_l); ?>" style="color:var(--brand-700);font-weight:700;"><?php echo esc_html($call); ?></a>
          — <?php esc_html_e('our dispatcher will triage in under 60 seconds.', 'hamersfix'); ?>
        </p>
      </div>
    </section>
  <?php endif; ?>

  <?php
  /* ── 3 · WHICH TYPE DO YOU HAVE? ──────────────────────────── */
  $type_rows = hf_svc_rows('types', [], $pid);
  $hf_ty_eye = $hf_gh ? $hf_gh['types']['eyebrow'] : $sd['types']['eyebrow'];
  $hf_ty_h2  = $hf_gh ? $hf_gh['types']['h2'] : $sd['types']['h2'];
  $hf_ty_in  = $hf_gh ? $hf_gh['types']['intro'] : $sd['types']['intro'];
  if (!empty($type_rows) || $hf_type_part || $is_ref) : ?>
    <section class="s s--bg" aria-labelledby="type-h">
      <div class="s__head">
        <span class="eyebrow"><?php echo esc_html(hf_svc('types_eyebrow', $hf_ty_eye, $pid)); ?></span>
        <h2 id="type-h"><?php echo esc_html(hf_svc('types_h2', $hf_ty_h2, $pid)); ?></h2>
        <p><?php echo esc_html(hf_svc('types_intro', $hf_ty_in, $pid)); ?></p>
      </div>
      <div class="s__body">
        <?php if (!empty($type_rows)) : ?>
          <div class="types-grid">
            <?php foreach ($type_rows as $t) : ?>
              <div class="type-card">
                <div class="type-card__art">
                  <?php if (!empty($t['tag'])) : ?><span class="tag"><?php echo esc_html($t['tag']); ?></span><?php endif; ?>
                  <?php echo isset($t['art']) ? $t['art'] : ''; /* trusted SVG markup */ ?>
                </div>
                <div class="type-card__bd">
                  <?php if (!empty($t['meta'])) : ?><div class="meta"><?php echo esc_html($t['meta']); ?></div><?php endif; ?>
                  <h3><?php echo esc_html(isset($t['title']) ? $t['title'] : ''); ?></h3>
                  <p><?php echo esc_html(isset($t['desc']) ? $t['desc'] : ''); ?></p>
                  <div class="more"><?php esc_html_e('Get a quote', 'hamersfix'); ?> <span>→</span></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php elseif ($hf_type_part) : load_template($hf_type_part, false); else : get_template_part('template-parts/svc/types', 'fridge'); endif; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php /* ── 4 · BRANDS ───────────────────────────────────────────── */ ?>
  <section class="s" aria-labelledby="brand-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html($sd['brands']['eyebrow']); ?></span>
      <h2 id="brand-h"><?php echo esc_html($is_ref ? $sd['brands']['h2'] : $sd['brands']['h2_generic']); ?></h2>
      <p><?php echo esc_html($sd['brands']['intro']); ?></p>
    </div>
    <div class="s__body">
      <div class="tier-list">
        <div class="tier">
          <span class="badge"><?php echo esc_html($sd['brands']['tier1']['badge']); ?></span>
          <h3><?php echo esc_html($sd['brands']['tier1']['title']); ?></h3>
          <div class="meta"><?php echo esc_html($sd['brands']['tier1']['meta']); ?></div>
          <div class="brands"><?php foreach ($sd['brands']['tier1']['brands'] as $b) echo '<span>' . esc_html($b) . '</span>'; ?></div>
        </div>
        <div class="tier">
          <h3><?php echo esc_html($sd['brands']['tier2']['title']); ?></h3>
          <div class="meta"><?php echo esc_html($sd['brands']['tier2']['meta']); ?></div>
          <div class="brands"><?php foreach ($sd['brands']['tier2']['brands'] as $b) echo '<span>' . esc_html($b) . '</span>'; ?></div>
        </div>
      </div>
    </div>
  </section>

  <?php /* ── 5 · AREAS (static stylized map + cities from settings) ── */ ?>
  <section class="s s--bg" aria-labelledby="areas-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html($sd['areas']['eyebrow']); ?></span>
      <h2 id="areas-h"><?php echo esc_html($sd['areas']['h2']); ?></h2>
      <p><?php echo esc_html(sprintf(__('We cover %d cities across the Gwinnett, Barrow and Athens area.', 'hamersfix'), hf_count_cities()) . ' ' . $sd['areas']['intro']); ?></p>
    </div>
    <div class="s__body">
      <div class="areas-grid">
        <?php get_template_part('template-parts/svc-coverage-map'); ?>
        <aside class="areas-side">
          <h3><?php echo esc_html($sd['areas']['side_h3']); ?></h3>
          <div class="meta"><?php echo esc_html($sd['areas']['side_meta']); ?></div>
          <div class="col-cities">
            <?php
            $areas_url = hf_page_url('service-areas', '#');
            foreach (hf_get_service_zips() as $row) {
              $c = trim((string) $row['city']);
              if (!$c) continue;
              echo '<a href="' . esc_url($areas_url) . '">' . esc_html($c) . '</a>';
            }
            echo '<a href="' . esc_url($areas_url) . '" style="color:var(--brand-700); font-weight:700">' . esc_html(sprintf(__('All %d cities →', 'hamersfix'), hf_count_cities())) . '</a>';
            ?>
          </div>
          <p style="margin: 24px 0 0; padding: 18px 20px; background: var(--surf-100); border: 1px solid var(--line-200); border-radius: 10px; font-size: 14px; color: var(--ink-700); line-height: 1.55;">
            <strong style="color: var(--ink-900);"><?php esc_html_e("Don't see your city?", 'hamersfix'); ?></strong>
            <a href="tel:<?php echo esc_attr($phone_l); ?>" style="color: var(--brand-700); font-weight: 700;"><?php echo esc_html($call); ?></a>
            — <?php echo esc_html($sd['areas']['side_note']); ?>
          </p>
        </aside>
      </div>
    </div>
  </section>

  <?php
  /* ── 6 · REVIEWS ──────────────────────────────────────────── */
  $rev_rows = hf_svc_rows('reviews', [], $pid);
  if (!empty($rev_rows) || $is_ref) :
    $agg   = $sd['reviews']['agg'];
    $items = !empty($rev_rows) ? $rev_rows : $sd['reviews']['items']; ?>
    <section class="s" id="reviews" aria-labelledby="rev-h">
      <div class="s__head">
        <span class="eyebrow"><?php echo esc_html(hf_svc('reviews_eyebrow', $sd['reviews']['eyebrow'], $pid)); ?></span>
        <h2 id="rev-h"><?php echo esc_html(hf_svc('reviews_h2', $sd['reviews']['h2'], $pid)); ?></h2>
        <p><?php echo esc_html(hf_svc('reviews_intro', $sd['reviews']['intro'], $pid)); ?></p>
      </div>
      <div class="s__body">
        <div class="agg">
          <div class="agg__score"><?php echo esc_html(hf_svc('review_score', $agg['score'], $pid)); ?></div>
          <div class="agg__meta">
            <div class="stars">★★★★★</div>
            <div class="ttl"><?php echo esc_html(hf_svc('review_title', $agg['title'], $pid)); ?></div>
            <div class="src">
              <?php foreach ($agg['sources'] as $src) : ?>
                <span><b><?php echo esc_html($src['name']); ?></b> <?php echo esc_html($src['value']); ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="review-grid">
          <?php foreach ($items as $r) : ?>
            <article class="review">
              <div class="head"><div class="stars">★★★★★</div><span class="src"><?php echo esc_html(isset($r['source']) ? $r['source'] : ''); ?></span></div>
              <p>&ldquo;<?php echo esc_html(isset($r['text']) ? $r['text'] : ''); ?>&rdquo;</p>
              <div class="who"><span class="av"><?php echo esc_html(isset($r['initials']) ? $r['initials'] : ''); ?></span><div><div class="nm"><?php echo esc_html(isset($r['name']) ? $r['name'] : ''); ?></div><div class="meta"><?php echo esc_html(isset($r['meta']) ? $r['meta'] : ''); ?></div></div></div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  /* ── 7 · FAQ ──────────────────────────────────────────────── */
  $faq_rows = hf_svc_rows('faq', [], $pid);
  if (!empty($faq_rows) || $is_ref) :
    $faqs = !empty($faq_rows) ? $faq_rows : $sd['faq']['items']; ?>
    <section class="s s--bg" aria-labelledby="faq-h">
      <div class="s__head">
        <span class="eyebrow"><?php echo esc_html(hf_svc('faq_eyebrow', $sd['faq']['eyebrow'], $pid)); ?></span>
        <h2 id="faq-h"><?php echo esc_html(hf_svc('faq_h2', $sd['faq']['h2'], $pid)); ?></h2>
        <p><?php esc_html_e('The questions our dispatcher hears most often.', 'hamersfix'); ?></p>
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
  <?php endif; ?>

  <?php /* ── 8 · FINAL CTA ────────────────────────────────────────── */ ?>
  <section class="final-cta" id="book" aria-labelledby="cta-h">
    <div class="final-cta__inner">
      <div>
        <span class="eyebrow"><?php echo esc_html($sd['final']['eyebrow']); ?></span>
        <h2 id="cta-h"><?php echo esc_html($sd['final']['h2']); ?></h2>
        <p><?php echo esc_html($sd['final']['intro']); ?></p>
        <div class="signals">
          <?php foreach ($sd['final']['signals'] as $sig) : ?>
            <div class="sig">
              <div class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
              <div class="tx"><b><?php echo esc_html($sig['title']); ?></b><?php echo esc_html($sig['sub']); ?></div>
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
        <div class="hours">
          <span class="dot"></span>
          <?php echo esc_html(hf_hours_short()); ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php
endwhile;

get_footer();
