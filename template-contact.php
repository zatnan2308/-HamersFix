<?php
/**
 * Template Name: Contact
 *
 * Source: Contact.html. Fully ACF-editable. No contact form by design — all
 * channels are tel: / mailto: / booking links resolved from Theme Settings.
 * The hours list and NAP block come from Theme Settings (single source of
 * truth); per-day hours highlight "today" via the site timezone.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

get_header();

$d        = hf_contact_defaults();
$phone_l  = hf_phone_link();
$phone_d  = hf_phone_display();
$email    = hf_email();
$booking  = hf_booking_url();
$areas    = hf_page_url('service-areas', '#');

$channels = hf_pg_rows('channels', $d['channels']);
$links    = hf_pg_rows('reach_links', $d['reach']['links']);

/** Resolve a channel/link href from its kind (all from Theme Settings). */
function hf_ch_href($kind, $phone_l, $booking) {
  switch ($kind) {
    case 'call':
    case 'commercial': return 'tel:' . $phone_l;
    case 'email':      return 'mailto:' . hf_email();
    case 'book':       return $booking;
  }
  return '#';
}
?>

<main id="main">

  <nav class="crumbs" aria-label="<?php esc_attr_e('Breadcrumb', 'hamersfix'); ?>"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'hamersfix'); ?></a><span>›</span><b><?php echo esc_html(get_the_title()); ?></b></nav>

  <!-- 1 · HERO -->
  <section class="c-hero" aria-labelledby="hero-h">
    <div class="c-hero__inner">
      <span class="hero__eyebrow"><span class="pulse"></span><?php echo esc_html(hf_pg('hero_eyebrow', $d['hero']['eyebrow'])); ?></span>
      <h1 id="hero-h"><?php echo hf_kses_inline(hf_pg('hero_h1', $d['hero']['h1'])); ?></h1>
      <p class="lede"><?php echo esc_html(hf_pg('hero_lede', $d['hero']['lede'])); ?></p>
    </div>
  </section>

  <!-- 2 · CHANNELS GRID -->
  <div class="channels">
    <?php foreach ($channels as $c) :
      $kind = isset($c['kind']) ? $c['kind'] : '';
      $href = $kind === 'book' ? esc_url($booking) : esc_attr(hf_ch_href($kind, $phone_l, $booking));
      $primary = !empty($c['primary']);
      $badge = isset($c['badge']) ? $c['badge'] : '';
      $bstyle = (isset($c['badge_style']) && $c['badge_style'] === 'cta') ? ' style="background:var(--cta-100);color:var(--cta-700)"' : '';
      // Action value: phone shows number, others show the action label.
      $action_b = ($kind === 'call' || $kind === 'commercial') ? $phone_d : '';
    ?>
      <a class="ch<?php echo $primary ? ' --primary' : ''; ?>" href="<?php echo $href; ?>">
        <?php if ($badge) : ?><span class="badge"<?php echo $bstyle; ?>><?php if ($primary) echo '<span class="dot"></span>'; echo esc_html($badge); ?></span><?php endif; ?>
        <div class="ic"><?php echo isset($c['icon']) ? $c['icon'] : ''; /* trusted SVG */ ?></div>
        <h3><?php echo esc_html(isset($c['h3']) ? $c['h3'] : ''); ?></h3>
        <p class="ds"><?php echo esc_html(isset($c['ds']) ? $c['ds'] : ''); ?></p>
        <div class="action"><?php
          if ($action_b) { echo '<b>' . esc_html($action_b) . '</b> '; }
          echo '<span>' . ($action_b ? '→' : esc_html(isset($c['action']) ? $c['action'] : '') . ' →') . '</span>';
        ?></div>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- 3 · REACH + INFO -->
  <section class="form-section" id="contact-form" aria-labelledby="form-h">
    <div class="form-section__inner">

      <div class="reach-card">
        <span class="eyebrow"><?php echo esc_html(hf_pg('reach_eyebrow', $d['reach']['eyebrow'])); ?></span>
        <h2 id="form-h"><?php echo esc_html(hf_pg('reach_h2', $d['reach']['h2'])); ?></h2>
        <p class="sub"><?php echo esc_html(hf_pg('reach_sub', $d['reach']['sub'])); ?></p>

        <div class="reach-list">
          <?php foreach ($links as $l) :
            $kind = isset($l['kind']) ? $l['kind'] : '';
            $href = $kind === 'book' ? esc_url($booking) : esc_attr(hf_ch_href($kind, $phone_l, $booking));
            $cls = isset($l['cls']) ? $l['cls'] : '';
            $val = !empty($l['val']) ? $l['val'] : (($kind === 'email') ? $email : (($kind === 'call') ? $phone_d : ''));
            $valstyle = ($cls === '--g') ? ' style="color: #1F7A4C"' : '';
            $ext = ($kind === 'book') ? ' target="_blank" rel="noopener"' : '';
          ?>
            <a class="reach-link <?php echo esc_attr($cls); ?>" href="<?php echo $href; ?>"<?php echo $ext; ?>>
              <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg></div>
              <div class="body">
                <div class="ttl"><?php echo esc_html(isset($l['ttl']) ? $l['ttl'] : ''); ?></div>
                <div class="val"<?php echo $valstyle; ?>><?php echo esc_html($val); ?></div>
                <div class="ds"><?php echo esc_html(isset($l['ds']) ? $l['ds'] : ''); ?></div>
              </div>
              <span class="chev">→</span>
            </a>
          <?php endforeach; ?>
        </div>

        <div class="note"><?php echo wp_kses(hf_pg('reach_note', $d['reach']['note']), ['b' => [], 'strong' => []]); ?></div>
      </div>

      <aside class="info-stack">
        <div class="info-card --dark">
          <h3><span class="ic"><svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span><?php echo esc_html(hf_pg('info_hours_h3', $d['info']['hours_h3'])); ?></h3>
          <div class="hours-list">
            <?php
            // Per-day rows from Theme Settings, with "today" highlighted by site timezone.
            $today = date_i18n('l'); // e.g. "Monday"
            foreach (hf_get_hours() as $hr) {
              $label = isset($hr['label']) ? $hr['label'] : '';
              if (!empty($hr['closed'])) {
                $time = __('Closed', 'hamersfix');
              } else {
                $time = trim((isset($hr['open']) ? $hr['open'] : '') . ' – ' . (isset($hr['close']) ? $hr['close'] : ''));
              }
              $is_today = ($label !== '' && stripos($label, $today) !== false);
              echo '<div class="row' . ($is_today ? ' --today' : '') . '"><span class="day">' . esc_html($label) . ($is_today ? ' · ' . esc_html__('Today', 'hamersfix') : '') . '</span><span class="time">' . esc_html($time) . '</span></div>';
            }
            ?>
          </div>
          <p style="margin-top:14px; font-size: 12.5px;"><?php echo esc_html(hf_pg('info_hours_note', $d['info']['hours_note'])); ?></p>
        </div>

        <div class="info-card">
          <h3><span class="ic"><svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 22s8-7 8-13a8 8 0 10-16 0c0 6 8 13 8 13z"/><circle cx="12" cy="9" r="3"/></svg></span><?php echo esc_html(hf_pg('info_addr_h3', $d['info']['addr_h3'])); ?></h3>
          <p class="nap-block">
            <b><?php echo esc_html(hf_site_title() . ' ' . hf_site_tagline()); ?></b><br>
            <?php
            $street = hf_opt('address_street', hf_d('contact', 'address_street'));
            if ($street) echo esc_html($street) . '<br>';
            echo esc_html(hf_opt('address_city_state_zip', hf_d('contact', 'address_city_state_zip')));
            ?><br><br>
            <?php echo esc_html(hf_pg('info_addr_note', $d['info']['addr_note'])); ?><br><br>
            <a href="<?php echo esc_url($areas); ?>"><?php echo esc_html(hf_pg('info_addr_link', $d['info']['addr_link'])); ?></a>
          </p>
        </div>

        <div class="info-card">
          <h3><span class="ic"><svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"/></svg></span><?php echo esc_html(hf_pg('info_lines_h3', $d['info']['lines_h3'])); ?></h3>
          <p class="nap-block">
            <b><?php esc_html_e('Residential:', 'hamersfix'); ?></b> <a href="tel:<?php echo esc_attr($phone_l); ?>"><?php echo esc_html($phone_d); ?></a><br>
            <b><?php esc_html_e('Commercial:', 'hamersfix'); ?></b> <a href="tel:<?php echo esc_attr($phone_l); ?>"><?php echo esc_html($phone_d); ?></a><br><br>
            <b><?php esc_html_e('Email:', 'hamersfix'); ?></b> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
          </p>
        </div>
      </aside>

    </div>
  </section>

  <!-- 4 · FINAL CTA -->
  <section class="final-cta" aria-labelledby="cta-h">
    <div class="final-cta__inner">
      <div>
        <span class="eyebrow"><?php echo esc_html(hf_pg('final_eyebrow', $d['final']['eyebrow'])); ?></span>
        <h2 id="cta-h"><?php echo esc_html(hf_pg('final_h2', $d['final']['h2'])); ?></h2>
        <p><?php echo esc_html(hf_pg('final_intro', $d['final']['intro'])); ?></p>
      </div>
      <div class="phone-card">
        <div class="lbl"><?php echo esc_html(hf_pg('final_card_lbl', $d['final']['card_lbl'])); ?></div>
        <a class="num" href="tel:<?php echo esc_attr($phone_l); ?>"><svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg><div><div class="digits"><?php echo esc_html($phone_d); ?></div><div class="sub"><?php esc_html_e('Residential · < 60 sec wait', 'hamersfix'); ?></div></div></a>
        <div class="or"><?php esc_html_e('or', 'hamersfix'); ?></div>
        <a class="book" href="<?php echo esc_url($booking); ?>"><?php esc_html_e('Book online — 60 second flow', 'hamersfix'); ?> <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        <div class="hours-x"><span class="dot"></span><?php echo esc_html(hf_hours_short()); ?></div>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
