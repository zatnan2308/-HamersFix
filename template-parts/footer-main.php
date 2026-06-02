<?php
/**
 * Footer columns + legal row.
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$d            = hf_defaults();

/*
 * Footer link columns must point to REAL pages. The design defaults were '#'
 * placeholders (and a demo import may have stored '#' into the ACF options),
 * which left the footer with dead links. So: use the ACF rows ONLY where they
 * carry a usable (non-empty, non-'#') URL; otherwise build the links live from
 * the Services CPT and the section pages. Still fully overridable in admin.
 */
$hf_usable = function ($rows) {
  if (!is_array($rows)) return [];
  $out = [];
  foreach ($rows as $r) {
    if (!is_array($r)) continue;
    $l = isset($r['label']) ? trim((string) $r['label']) : '';
    $u = isset($r['url']) ? trim((string) $r['url']) : '';
    if ($l !== '' && $u !== '' && $u !== '#') $out[] = ['label' => $l, 'url' => $u];
  }
  return $out;
};

// Services column → the six service CPT entries + Commercial.
$hf_services = $hf_usable(function_exists('get_field') ? get_field('footer_services', 'option') : null);
if (!$hf_services) {
  $hf_services = [];
  foreach (hf_get_services() as $s) {
    if (!empty($s['title']) && !empty($s['url']) && $s['url'] !== '#') {
      $hf_services[] = ['label' => $s['title'], 'url' => $s['url']];
    }
  }
  $hf_services[] = ['label' => __('Commercial appliance', 'hamersfix'), 'url' => hf_page_url('commercial')];
  foreach ([
    ['label' => __('Appliance deep cleaning', 'hamersfix'), 'slug' => 'appliance-deep-cleaning'],
    ['label' => __('Air vent cleaning', 'hamersfix'),       'slug' => 'air-vent-cleaning'],
  ] as $hf_m) {
    $hf_m_url = hf_page_url($hf_m['slug'], '#');
    if ($hf_m_url !== '#') $hf_services[] = ['label' => $hf_m['label'], 'url' => $hf_m_url];
  }
}

// Company column → the section pages.
$hf_company = $hf_usable(function_exists('get_field') ? get_field('footer_company', 'option') : null);
if (!$hf_company) {
  $hf_company = [
    ['label' => __('About us', 'hamersfix'),         'url' => hf_page_url('about')],
    ['label' => __('Reviews', 'hamersfix'),          'url' => hf_page_url('reviews')],
    ['label' => __('Brands serviced', 'hamersfix'),  'url' => hf_page_url('brands')],
    ['label' => __('Service areas', 'hamersfix'),    'url' => hf_page_url('service-areas')],
    ['label' => __('Contact', 'hamersfix'),          'url' => hf_page_url('contact')],
  ];
}

// Legal row: keep usable ACF rows; otherwise wire what we can (Privacy, Sitemap)
// and drop the rest so there are no dead links.
$hf_legal = $hf_usable(function_exists('get_field') ? get_field('footer_legal_links', 'option') : null);
if (!$hf_legal) {
  $hf_legal = [];
  $hf_privacy = function_exists('get_privacy_policy_url') ? get_privacy_policy_url() : '';
  if ($hf_privacy) $hf_legal[] = ['label' => __('Privacy Policy', 'hamersfix'), 'url' => $hf_privacy];
  $hf_legal[] = ['label' => __('Sitemap', 'hamersfix'), 'url' => home_url('/wp-sitemap.xml')];
}
$hf_zips      = hf_get_service_zips();
$hf_phone_l   = hf_phone_link();
$hf_phone_d   = hf_phone_display();
$hf_area_url  = hf_page_url('service-areas', '#');

$hf_hours_parts = [];
foreach (hf_get_hours() as $hr) {
  if (!empty($hr['closed'])) {
    $hf_hours_parts[] = trim(($hr['label'] ?? '') . ' ' . __('Closed', 'hamersfix'));
  } else {
    $hf_hours_parts[] = trim(($hr['label'] ?? '') . ' ' . ($hr['open'] ?? '') . '–' . ($hr['close'] ?? ''));
  }
}
?>
<footer class="foot">
  <div class="foot__grid">
    <div>
      <div class="brand"><?php echo esc_html(hf_site_title()); ?></div>
      <p class="nap">
        <b><?php echo esc_html(hf_site_title() . ' ' . hf_site_tagline()); ?></b><br>
        <?php
        $hf_street = hf_opt('address_street', $d['contact']['address_street']);
        if ($hf_street) echo esc_html($hf_street) . '<br>';
        echo esc_html(hf_opt('address_city_state_zip', $d['contact']['address_city_state_zip']));
        ?><br><br>
        <b><?php esc_html_e('Hours:', 'hamersfix'); ?></b> <?php echo esc_html(implode(' · ', $hf_hours_parts)); ?><br>
        <b><?php esc_html_e('Phone:', 'hamersfix'); ?></b> <a href="tel:<?php echo esc_attr($hf_phone_l); ?>"><?php echo esc_html($hf_phone_d); ?></a><br>
        <b><?php esc_html_e('License:', 'hamersfix'); ?></b> <?php echo esc_html(hf_license_text()); ?>
      </p>
    </div>
    <div>
      <h4><?php esc_html_e('Services', 'hamersfix'); ?></h4>
      <?php foreach ($hf_services as $s) {
        $l = is_array($s) ? (isset($s['label']) ? $s['label'] : '') : '';
        $u = is_array($s) ? (isset($s['url']) ? $s['url'] : '#') : '#';
        if (!$l) continue;
        echo '<a href="' . esc_url($u) . '">' . esc_html($l) . '</a>';
      } ?>
    </div>
    <div>
      <h4><?php esc_html_e('Areas', 'hamersfix'); ?></h4>
      <?php
      $hf_shown = 0;
      foreach ($hf_zips as $row) {
        if ($hf_shown >= 6) break;
        $city = trim((string) $row['city']);
        if (!$city) continue;
        echo '<a href="' . esc_url($hf_area_url) . '">' . esc_html($city) . '</a>';
        $hf_shown++;
      }
      echo '<a href="' . esc_url($hf_area_url) . '">' . esc_html__('All service areas →', 'hamersfix') . '</a>';
      ?>
    </div>
    <div>
      <h4><?php esc_html_e('Company', 'hamersfix'); ?></h4>
      <?php foreach ($hf_company as $c) {
        $l = is_array($c) ? (isset($c['label']) ? $c['label'] : '') : '';
        $u = is_array($c) ? (isset($c['url']) ? $c['url'] : '#') : '#';
        if (!$l) continue;
        echo '<a href="' . esc_url($u) . '">' . esc_html($l) . '</a>';
      } ?>
    </div>
  </div>
  <div class="legal">
    <div>
      <?php
      echo esc_html(hf_copyright());
      $hf_credit_text = hf_opt('footer_credit_text', $d['footer']['credit_text']);
      $hf_credit_url  = hf_opt('footer_credit_url', $d['footer']['credit_url']);
      if ($hf_credit_text) {
        echo ' · ' . esc_html__('Website by', 'hamersfix') . ' ';
        echo '<a href="' . esc_url($hf_credit_url) . '" target="_blank" rel="noopener" style="color:inherit;text-decoration:underline;text-decoration-color:rgba(255,255,255,.3);text-underline-offset:3px">' . esc_html($hf_credit_text) . '</a>';
      }
      ?>
    </div>
    <div style="display:flex;gap:18px;flex-wrap:wrap">
      <?php foreach ($hf_legal as $l) {
        $lbl = is_array($l) ? (isset($l['label']) ? $l['label'] : '') : $l;
        $u   = is_array($l) ? (isset($l['url']) ? $l['url'] : '#') : '#';
        if (!$lbl) continue;
        echo '<a href="' . esc_url($u) . '">' . esc_html($lbl) . '</a>';
      } ?>
    </div>
  </div>
</footer>
