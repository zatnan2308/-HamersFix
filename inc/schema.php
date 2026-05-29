<?php
/**
 * HamersFix — JSON-LD structured data.
 *
 * Emits a single @graph: LocalBusiness (every page), FAQPage (any page with a
 * FAQ section), and Service + BreadcrumbList on single `service` entries.
 * aggregateRating is emitted ONLY when explicitly enabled with real numbers
 * (never fabricated).
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

if (!function_exists('hf_logo_url')) {
  function hf_logo_url() {
    $logo = hf_opt('logo', null);
    if (is_array($logo) && !empty($logo['url'])) return $logo['url'];
    if (is_numeric($logo)) {
      $u = wp_get_attachment_image_url((int) $logo, 'full');
      if ($u) return $u;
    }
    if (is_string($logo) && $logo) return $logo;
    return '';
  }
}

add_action('wp_head', 'hf_output_schema', 20);
function hf_output_schema() {
  $graph = [hf_schema_localbusiness()];

  $faq = hf_schema_faq();
  if ($faq) $graph[] = $faq;

  if (is_singular('service')) {
    $graph[] = hf_schema_service();
    $bc = hf_schema_breadcrumb();
    if ($bc) $graph[] = $bc;
  }

  $data = ['@context' => 'https://schema.org', '@graph' => $graph];
  echo "\n" . '<script type="application/ld+json">'
    . wp_json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
    . '</script>' . "\n";
}

function hf_schema_localbusiness() {
  $b = [
    '@type'          => hf_opt('business_type', 'LocalBusiness'),
    '@id'            => home_url('/#business'),
    'name'           => hf_site_title(),
    'url'            => home_url('/'),
    'telephone'      => hf_phone_link(),
    'email'          => hf_email(),
    'priceRange'     => '$$',
    'additionalType' => 'https://schema.org/HomeAndConstructionBusiness',
  ];

  $logo = hf_logo_url();
  if ($logo) { $b['logo'] = $logo; $b['image'] = $logo; }

  // Address (parse "City, ST ZIP").
  $csz    = hf_opt('address_city_state_zip', hf_d('contact', 'address_city_state_zip'));
  $street = hf_opt('address_street', hf_d('contact', 'address_street'));
  $addr   = ['@type' => 'PostalAddress', 'addressRegion' => 'GA', 'addressCountry' => 'US'];
  if ($street) $addr['streetAddress'] = $street;
  if (preg_match('/^(.*?),\s*([A-Za-z]{2})\s*(\d{5})?/', (string) $csz, $m)) {
    $addr['addressLocality'] = trim($m[1]);
    $addr['addressRegion']   = strtoupper($m[2]);
    if (!empty($m[3])) $addr['postalCode'] = $m[3];
  }
  $b['address'] = $addr;

  // Area served (cities).
  $areas = [];
  foreach (hf_get_service_zips() as $row) {
    $city = trim((string) $row['city']);
    if ($city !== '') $areas[] = $city;
  }
  if ($areas) $b['areaServed'] = $areas;

  // Opening hours.
  $spec = hf_schema_hours();
  if ($spec) $b['openingHoursSpecification'] = $spec;

  // sameAs (social + google reviews).
  $same = [];
  $social = hf_opt('social', []);
  if (is_array($social)) {
    foreach ($social as $s) {
      if (!empty($s['url'])) $same[] = $s['url'];
    }
  }
  $gr = hf_opt('google_reviews_url', '');
  if ($gr) $same[] = $gr;
  if ($same) $b['sameAs'] = array_values(array_unique($same));

  // aggregateRating — only with real, opted-in numbers.
  if (hf_opt('rating_enabled', false)) {
    $val   = hf_opt('rating_value', '');
    $count = hf_opt('rating_count', '');
    if ($val && $count) {
      $b['aggregateRating'] = [
        '@type'       => 'AggregateRating',
        'ratingValue' => (string) $val,
        'reviewCount' => (string) $count,
        'bestRating'  => '5',
      ];
    }
  }

  return $b;
}

/** Convert "7 AM" / "9 PM" / "13:30" to 24h "HH:MM". */
function hf_time_24($s) {
  $s = trim((string) $s);
  if ($s === '') return '';
  if (preg_match('/^(\d{1,2})(?::(\d{2}))?\s*([AaPp])[Mm]?/', $s, $m)) {
    $h   = (int) $m[1];
    $min = isset($m[2]) && $m[2] !== '' ? $m[2] : '00';
    $ap  = strtolower($m[3]);
    if ($ap === 'p' && $h < 12) $h += 12;
    if ($ap === 'a' && $h === 12) $h = 0;
    return sprintf('%02d:%s', $h, $min);
  }
  if (preg_match('/^(\d{1,2}):(\d{2})$/', $s, $m)) {
    return sprintf('%02d:%s', (int) $m[1], $m[2]);
  }
  return '';
}

function hf_schema_hours() {
  $order = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  $out = [];
  foreach (hf_get_hours() as $row) {
    if (!empty($row['closed'])) continue;
    $label = isset($row['label']) ? $row['label'] : '';
    $open  = hf_time_24(isset($row['open']) ? $row['open'] : '');
    $close = hf_time_24(isset($row['close']) ? $row['close'] : '');
    if (!$open || !$close) continue;

    $found = [];
    foreach ($order as $i => $name) {
      if (stripos($label, $name) !== false) $found[$i] = $name;
    }
    ksort($found);

    $days = [];
    if (count($found) >= 2) {
      $idx = array_keys($found);
      for ($i = min($idx); $i <= max($idx); $i++) $days[] = $order[$i];
    } elseif (count($found) === 1) {
      $days = array_values($found);
    } else {
      continue;
    }

    $out[] = [
      '@type'     => 'OpeningHoursSpecification',
      'dayOfWeek' => $days,
      'opens'     => $open,
      'closes'    => $close,
    ];
  }
  return $out;
}

function hf_schema_faq() {
  $faq = [];
  if (is_front_page()) {
    $faq = hf_home_rows('faq', hf_defaults()['faq']);
  } elseif (is_singular() && function_exists('get_field')) {
    $f = get_field('faq');
    if (is_array($f) && $f) $faq = $f;
  }
  if (empty($faq)) return null;

  $items = [];
  foreach ($faq as $row) {
    $q = isset($row['q']) ? $row['q'] : '';
    $a = isset($row['a']) ? $row['a'] : '';
    if (!$q || !$a) continue;
    $items[] = [
      '@type'          => 'Question',
      'name'           => wp_strip_all_tags($q),
      'acceptedAnswer' => ['@type' => 'Answer', 'text' => wp_strip_all_tags($a)],
    ];
  }
  if (empty($items)) return null;
  return ['@type' => 'FAQPage', 'mainEntity' => $items];
}

function hf_schema_service() {
  $areas = array_values(array_filter(array_map(function ($r) {
    return trim((string) $r['city']);
  }, hf_get_service_zips())));

  return [
    '@type'       => 'Service',
    'serviceType' => get_the_title(),
    'provider'    => ['@id' => home_url('/#business')],
    'areaServed'  => $areas,
    'url'         => get_permalink(),
  ];
}

function hf_schema_breadcrumb() {
  return [
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
      ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => home_url('/')],
      ['@type' => 'ListItem', 'position' => 2, 'name' => get_the_title(), 'item' => get_permalink()],
    ],
  ];
}
