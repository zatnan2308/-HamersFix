<?php
/**
 * Template Name: Appliance Deep Cleaning
 *
 * Source: Appliance-Deep-Cleaning.html. Fully ACF-editable — every string/list
 * falls back to hf_deep_cleaning_defaults() until a field is set. Phone /
 * booking / internal links resolve from Theme Settings.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

get_header();

$d        = hf_deep_cleaning_defaults();
$phone_l  = hf_phone_link();
$phone_d  = hf_phone_display();
$booking  = hf_booking_url();
$call     = sprintf(__('Call %s', 'hamersfix'), $phone_d);
$phone_svg = '<svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>';
$tick_svg  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>';

/* Appliance illustration SVGs for the split blocks (verbatim from the mock). */
$illus_svgs = [
  'fridge' => '<svg class="appl" viewBox="0 0 200 240" aria-hidden="true"><rect x="46" y="10" width="108" height="220" rx="12" fill="#fff" stroke="#0B4F9A" stroke-width="3"/><rect x="46" y="10" width="108" height="74" rx="12" fill="#EEF4FC" stroke="#0B4F9A" stroke-width="3"/><line x1="46" y1="84" x2="154" y2="84" stroke="#0B4F9A" stroke-width="3"/><rect x="138" y="30" width="6" height="30" rx="3" fill="#99A2AD"/><rect x="138" y="110" width="6" height="54" rx="3" fill="#99A2AD"/><line x1="58" y1="116" x2="118" y2="116" stroke="#C9D2DE" stroke-width="3"/><line x1="58" y1="150" x2="118" y2="150" stroke="#C9D2DE" stroke-width="3"/><line x1="58" y1="184" x2="118" y2="184" stroke="#C9D2DE" stroke-width="3"/></svg>',
  'oven'   => '<svg class="appl" viewBox="0 0 200 240" aria-hidden="true"><rect x="34" y="24" width="132" height="192" rx="12" fill="#fff" stroke="#0B4F9A" stroke-width="3"/><rect x="34" y="24" width="132" height="34" rx="12" fill="#EEF4FC" stroke="#0B4F9A" stroke-width="3"/><circle cx="56" cy="41" r="4" fill="#99A2AD"/><circle cx="74" cy="41" r="4" fill="#99A2AD"/><rect x="122" y="37" width="30" height="8" rx="4" fill="#99A2AD"/><rect x="48" y="74" width="104" height="124" rx="8" fill="#F4F7FC" stroke="#0B4F9A" stroke-width="3"/><rect x="60" y="86" width="80" height="86" rx="4" fill="#DCE9FA" stroke="#C9D2DE" stroke-width="2"/><line x1="60" y1="206" x2="140" y2="206" stroke="#99A2AD" stroke-width="5" stroke-linecap="round"/></svg>',
];

/* Hero image (ACF array/id/url → default). */
$hero_img = hf_pg('hero_image', '');
$hero_alt = hf_pg('hero_image_alt', $d['hero']['image_alt']);
$hero_url = '';
if (is_array($hero_img) && !empty($hero_img['url'])) { $hero_url = $hero_img['url']; if (!empty($hero_img['alt'])) $hero_alt = $hero_img['alt']; }
elseif (is_numeric($hero_img)) { $hero_url = wp_get_attachment_image_url((int) $hero_img, 'hf-hero'); }
elseif (is_string($hero_img) && $hero_img) { $hero_url = $hero_img; }
if (!$hero_url) $hero_url = $d['hero']['image'];

$pills    = hf_pg_rows('hero_pills', $d['hero']['pills']);
$trust    = hf_pg_rows('hero_trust', $d['hero']['trust']);
$blocks   = hf_pg_rows('clean_blocks', $d['services']['blocks']);
$combo    = hf_pg_rows('combo_rows', array_map(function ($t) { return ['text' => $t]; }, $d['combo']['rows']));
$why      = hf_pg_rows('why_cards', $d['why']['cards']);
$steps    = hf_pg_rows('how_steps', $d['how']['steps']);
$faqs     = hf_pg_rows('faq', $d['faq']['items']);
$signals  = hf_pg_rows('final_signals', $d['final']['signals']);

$dot_class = ['g' => '', 'o' => ' dot--o', 'b' => ' dot--b'];
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
          <a class="btn btn--cta btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>" data-call-tracking="dc-hero">
            <?php echo $phone_svg; ?>
            <?php echo esc_html($call); ?>
          </a>
          <a class="btn btn--ghost btn--lg" href="<?php echo esc_url($booking); ?>"><?php esc_html_e('Book a cleaning →', 'hamersfix'); ?></a>
        </div>

        <?php if ($pills) : ?>
          <div class="pill-row">
            <?php foreach ($pills as $p) :
              $txt = is_array($p) ? (isset($p['text']) ? $p['text'] : '') : $p;
              $dk  = is_array($p) && isset($p['dot']) ? $p['dot'] : 'g';
              if (!$txt) continue; ?>
              <span class="pill"><span class="dot<?php echo isset($dot_class[$dk]) ? $dot_class[$dk] : ''; ?>"></span><?php echo esc_html($txt); ?></span>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if ($trust) : ?>
          <ul class="trust-row" aria-label="<?php esc_attr_e('Why homeowners book us', 'hamersfix'); ?>">
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
        <?php endif; ?>
        <span class="badge"><?php echo esc_html(hf_pg('hero_badge_text', $d['hero']['badge_text'])); ?></span>
        <div class="tag">
          <small><?php echo esc_html(hf_pg('hero_tag_small', $d['hero']['tag_small'])); ?></small>
          <?php echo esc_html(hf_pg('hero_tag_text', $d['hero']['tag_text'])); ?>
        </div>
      </figure>
    </div>
  </section>

  <!-- 2 · REFRIGERATOR + OVEN SPLIT BLOCKS -->
  <section class="s" aria-labelledby="svc2-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('services_eyebrow', $d['services']['eyebrow'])); ?></span>
      <h2 id="svc2-h"><?php echo esc_html(hf_pg('services_h2', $d['services']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('services_intro', $d['services']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <?php foreach ($blocks as $i => $b) :
        $media   = isset($b['media']) ? $b['media'] : 'fridge';
        $art     = isset($illus_svgs[$media]) ? $illus_svgs[$media] : reset($illus_svgs);
        $is_right = ($i % 2) === 1;
        $items   = isset($b['items']) ? $b['items'] : [];
        if (is_string($items)) $items = preg_split('/[\r\n]+/', $items);
        ?>
        <div class="split"<?php echo !empty($b['id']) ? ' id="' . esc_attr($b['id']) . '"' : ''; ?>>
          <div class="split__media<?php echo $is_right ? ' is-right' : ''; ?>">
            <div class="illus">
              <?php echo $art; /* trusted inline SVG */ ?>
              <div class="chip"><small><?php esc_html_e('Service', 'hamersfix'); ?></small><?php echo esc_html(isset($b['chip']) ? $b['chip'] : ''); ?></div>
            </div>
          </div>
          <div class="split__content svc-block">
            <span class="svc-block__eyebrow"><?php echo esc_html(isset($b['eyebrow']) ? $b['eyebrow'] : ''); ?></span>
            <h2><?php echo esc_html(isset($b['h2']) ? $b['h2'] : ''); ?></h2>
            <p class="sub"><?php echo esc_html(isset($b['sub']) ? $b['sub'] : ''); ?></p>
            <ul class="checklist">
              <?php foreach ((array) $items as $it) :
                $it = trim((string) (is_array($it) ? (isset($it['text']) ? $it['text'] : '') : $it));
                if ($it === '') continue; ?>
                <li><span class="tick"><?php echo $tick_svg; ?></span><?php echo esc_html($it); ?></li>
              <?php endforeach; ?>
            </ul>
            <a class="btn btn--primary mt-6" href="<?php echo esc_url($booking); ?>"><?php echo esc_html(isset($b['cta']) ? $b['cta'] : __('Book →', 'hamersfix')); ?></a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 3 · COMBO SPECIAL -->
  <section class="s s--bg" id="combo" aria-labelledby="combo-h">
    <div class="s__body">
      <div class="combo">
        <div class="combo__main">
          <span class="combo__badge"><?php echo esc_html(hf_pg('combo_badge', $d['combo']['badge'])); ?></span>
          <h2 id="combo-h"><?php echo esc_html(hf_pg('combo_h2', $d['combo']['h2'])); ?></h2>
          <p><?php echo esc_html(hf_pg('combo_intro', $d['combo']['intro'])); ?></p>
          <div class="ctas">
            <a class="btn btn--cta btn--lg" href="<?php echo esc_url($booking); ?>"><?php esc_html_e('Book the combo →', 'hamersfix'); ?></a>
            <a class="btn btn--ghost btn--lg" href="tel:<?php echo esc_attr($phone_l); ?>" style="color:#fff;border-color:rgba(255,255,255,.35)"><?php echo esc_html($call); ?></a>
          </div>
        </div>
        <div class="combo__panel">
          <h3><?php echo esc_html(hf_pg('combo_panel_title', $d['combo']['panel_title'])); ?></h3>
          <div class="meta"><?php echo esc_html(hf_pg('combo_panel_meta', $d['combo']['panel_meta'])); ?></div>
          <?php foreach ($combo as $row) :
            $txt = is_array($row) ? (isset($row['text']) ? $row['text'] : '') : $row;
            if (!$txt) continue; ?>
            <div class="row"><span class="ck"><?php echo $tick_svg; ?></span><?php echo esc_html($txt); ?></div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- 4 · WHY DEEP CLEAN -->
  <section class="s" aria-labelledby="why-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('why_eyebrow', $d['why']['eyebrow'])); ?></span>
      <h2 id="why-h"><?php echo esc_html(hf_pg('why_h2', $d['why']['h2'])); ?></h2>
      <p><?php echo esc_html(hf_pg('why_intro', $d['why']['intro'])); ?></p>
    </div>
    <div class="s__body">
      <div class="benefit-grid">
        <?php foreach ($why as $c) : ?>
          <div class="benefit">
            <div class="benefit__ic"><?php echo isset($c['icon']) ? $c['icon'] : ''; /* trusted SVG */ ?></div>
            <h3><?php echo esc_html(isset($c['h3']) ? $c['h3'] : ''); ?></h3>
            <p><?php echo esc_html(isset($c['p']) ? $c['p'] : ''); ?></p>
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

  <!-- 6 · FAQ -->
  <section class="s" aria-labelledby="faq-h">
    <div class="s__head">
      <span class="eyebrow"><?php echo esc_html(hf_pg('faq_eyebrow', $d['faq']['eyebrow'])); ?></span>
      <h2 id="faq-h"><?php echo esc_html(hf_pg('faq_h2', $d['faq']['h2'])); ?></h2>
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
