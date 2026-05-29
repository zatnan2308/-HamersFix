<?php
/**
 * HamersFix — helpers.
 *
 * Every getter returns the ACF value when ACF Pro is active and the field is
 * filled, otherwise the matching design default from hf_defaults(). This is
 * what lets the theme render identically to the mock with zero data entered,
 * while remaining 100% editable once content is added.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/* ----------------------------------------------------------------
 * Low-level getters
 * ---------------------------------------------------------------- */

/** Options-page field with default fallback. */
function hf_opt($key, $default = '') {
  if (function_exists('get_field')) {
    $v = get_field($key, 'option');
    if ($v !== null && $v !== '' && $v !== false && $v !== []) return $v;
  }
  return $default;
}

/** Post field (current post by default) with default fallback. */
function hf_field($key, $default = '', $post_id = false) {
  if (function_exists('get_field')) {
    $v = get_field($key, $post_id);
    if ($v !== null && $v !== '' && $v !== false && $v !== []) return $v;
  }
  return $default;
}

/** Quick reach into the defaults tree: hf_d('contact','email'). */
function hf_d($group, $key = null) {
  $d = hf_defaults();
  if (!isset($d[$group])) return $key === null ? null : '';
  if ($key === null) return $d[$group];
  return isset($d[$group][$key]) ? $d[$group][$key] : '';
}

/* ----------------------------------------------------------------
 * Identity / contact
 * ---------------------------------------------------------------- */

function hf_site_title()   { return hf_opt('site_title', hf_d('identity', 'site_title')); }
function hf_site_tagline() { return hf_opt('site_tagline', hf_d('identity', 'site_tagline')); }
function hf_logo_mark()    { return hf_opt('logo_mark_text', hf_d('identity', 'logo_mark_text')); }
function hf_license_text() { return hf_opt('license_text', hf_d('identity', 'license_text')); }
function hf_serving_area() { return hf_opt('serving_area', hf_d('identity', 'serving_area')); }
function hf_email()        { return hf_opt('email', hf_d('contact', 'email')); }

function hf_phone_display() { return hf_opt('phone_display', hf_d('contact', 'phone_display')); }

/** tel: target — explicit option, then default, then derived from display. */
function hf_phone_link() {
  $l = hf_opt('phone_link', '');
  if ($l) return $l;
  $l = hf_d('contact', 'phone_link');
  if ($l) return $l;
  return hf_tel(hf_phone_display());
}

/** Turn a display phone into an E.164-ish tel string (+1XXXXXXXXXX). */
function hf_tel($display) {
  $digits = preg_replace('/\D+/', '', (string) $display);
  if (strlen($digits) === 10) $digits = '1' . $digits;
  return $digits !== '' ? '+' . $digits : '';
}

/** External booking URL ('#' when not configured). */
function hf_booking_url() {
  $u = hf_opt('booking_url', hf_d('contact', 'booking_url'));
  return $u ? $u : '#';
}

/* ----------------------------------------------------------------
 * Logo block (image, or HF mark + name fallback — matches the mock)
 * ---------------------------------------------------------------- */
function hf_logo_html($context = 'header') {
  $logo = hf_opt('logo', null);
  $url = '';
  if (is_array($logo) && !empty($logo['url'])) {
    $url = $logo['url'];
  } elseif (is_numeric($logo)) {
    $url = wp_get_attachment_image_url((int) $logo, 'full');
  } elseif (is_string($logo) && $logo) {
    $url = $logo;
  }
  if ($url) {
    return '<img src="' . esc_url($url) . '" alt="' . esc_attr(hf_site_title()) . '" style="height:40px;width:auto;display:block">';
  }
  // Text logo fallback (mock style).
  $mark = '<span class="mark">' . esc_html(hf_logo_mark()) . '</span>';
  if ($context === 'drawer') {
    return $mark . esc_html(hf_site_title());
  }
  return $mark . '<span>' . esc_html(hf_site_title()) . '<small>' . esc_html(hf_site_tagline()) . '</small></span>';
}

/* ----------------------------------------------------------------
 * Headings with limited inline HTML (<em> accent in the hero H1)
 * ---------------------------------------------------------------- */
function hf_kses_inline($html) {
  return wp_kses($html, [
    'em'     => [],
    'strong' => [],
    'b'      => [],
    'br'     => [],
    'span'   => ['class' => true],
  ]);
}

/* ----------------------------------------------------------------
 * Icons
 * ---------------------------------------------------------------- */
/** Return inline SVG for a known appliance slug, or pass through custom SVG. */
function hf_icon($slug) {
  if (!$slug) return '';
  if (strpos((string) $slug, '<svg') !== false) return $slug; // custom markup field
  $icons = hf_defaults()['icons'];
  return isset($icons[$slug]) ? $icons[$slug] : '';
}

/* ----------------------------------------------------------------
 * ZIP coverage (single source of truth: service_zips repeater)
 * ---------------------------------------------------------------- */
function hf_get_service_zips() {
  if (function_exists('get_field')) {
    $acf = get_field('service_zips', 'option');
    if (is_array($acf) && !empty($acf)) {
      $rows = [];
      foreach ($acf as $r) {
        $rows[] = [
          'city' => isset($r['city']) ? $r['city'] : '',
          'zips' => isset($r['zips']) ? $r['zips'] : '',
        ];
      }
      return $rows;
    }
  }
  return hf_defaults()['service_zips'];
}

/** Flat, de-duplicated list of valid 5-digit ZIPs. */
function hf_get_flat_service_zips() {
  $flat = [];
  foreach (hf_get_service_zips() as $row) {
    foreach (preg_split('/[,\s]+/', (string) $row['zips']) as $p) {
      $p = trim($p);
      if (preg_match('/^\d{5}$/', $p)) $flat[$p] = true;
    }
  }
  return array_keys($flat);
}

function hf_count_cities() {
  $c = 0;
  foreach (hf_get_service_zips() as $row) {
    if (trim((string) $row['city']) !== '') $c++;
  }
  return $c;
}
function hf_count_zips() { return count(hf_get_flat_service_zips()); }

/** Computed ZIP-checker hint (uses city count when the field is empty). */
function hf_zip_hint() {
  $hint = hf_opt('zip_hint', hf_d('zip_copy', 'zip_hint'));
  if ($hint) return $hint;
  return sprintf(
    /* translators: %d = number of cities served */
    _n('We service %d city across the Gwinnett, Barrow & Athens area.', 'We service %d cities across the Gwinnett, Barrow & Athens area.', hf_count_cities(), 'hamersfix'),
    hf_count_cities()
  );
}

/* ----------------------------------------------------------------
 * Hours
 * ---------------------------------------------------------------- */
function hf_get_hours() {
  if (function_exists('get_field')) {
    $acf = get_field('hours', 'option');
    if (is_array($acf) && !empty($acf)) return $acf;
  }
  return hf_defaults()['hours'];
}

/** Short hours string for the topline (editable; dynamic "open now" is a future enhancement). */
function hf_hours_short() {
  return hf_opt('hours_short', hf_defaults()['hours_short']);
}

/* ----------------------------------------------------------------
 * Services (prefer the `service` CPT, fall back to design defaults)
 * ---------------------------------------------------------------- */
function hf_get_services() {
  if (post_type_exists('service')) {
    $posts = get_posts([
      'post_type'      => 'service',
      'posts_per_page' => -1,
      'orderby'        => ['menu_order' => 'ASC', 'date' => 'ASC'],
      'order'          => 'ASC',
      'no_found_rows'  => true,
    ]);
    if (!empty($posts)) {
      $out = [];
      foreach ($posts as $p) {
        $icon = hf_field('icon', '', $p->ID);
        $out[] = [
          'title'      => get_the_title($p),
          'icon'       => $icon ? $icon : 'fridge',
          'short_desc' => hf_field('short_desc', '', $p->ID),
          'long_desc'  => hf_field('long_desc', wp_strip_all_tags(get_the_excerpt($p)), $p->ID),
          'price_note' => hf_field('price_note', '', $p->ID),
          'job_count'  => hf_field('job_count', '', $p->ID),
          'url'        => get_permalink($p),
        ];
      }
      return $out;
    }
  }
  return hf_defaults()['services'];
}

/* ----------------------------------------------------------------
 * Homepage content accessors (front page post id, fields, repeaters)
 * ---------------------------------------------------------------- */
function hf_home_id() {
  $pid = (int) get_option('page_on_front');
  return $pid > 0 ? $pid : false;
}

/** Scalar homepage field with default. */
function hf_home($key, $default = '') {
  return hf_field($key, $default, hf_home_id());
}

/** Homepage repeater rows or a supplied default array. */
function hf_home_rows($key, array $default_rows) {
  $pid = hf_home_id();
  if ($pid && function_exists('get_field')) {
    $acf = get_field($key, $pid);
    if (is_array($acf) && !empty($acf)) return $acf;
  }
  return $default_rows;
}

/** Options repeater rows or a supplied default array. */
function hf_opt_rows($key, array $default_rows) {
  if (function_exists('get_field')) {
    $acf = get_field($key, 'option');
    if (is_array($acf) && !empty($acf)) return $acf;
  }
  return $default_rows;
}

/** Trust badges (Options). */
function hf_trust() {
  return hf_opt_rows('trust_badges', hf_defaults()['trust']);
}

/** Brand wall names as a flat array (home repeater 'brand_wall' or defaults). */
function hf_brands() {
  $pid = hf_home_id();
  if ($pid && function_exists('get_field')) {
    $acf = get_field('brand_wall', $pid);
    if (is_array($acf) && !empty($acf)) {
      return array_values(array_filter(array_map(function ($r) {
        return is_array($r) ? (isset($r['name']) ? $r['name'] : '') : $r;
      }, $acf)));
    }
  }
  return hf_defaults()['brands'];
}

/** Aggregate review block (home fields, merged over defaults). */
function hf_reviews_agg() {
  $agg = hf_defaults()['reviews_agg'];
  $pid = hf_home_id();
  if ($pid && function_exists('get_field')) {
    $score = get_field('review_score', $pid);
    if ($score) $agg['score'] = $score;
    $title = get_field('review_title', $pid);
    if ($title) $agg['title'] = $title;
    $src = get_field('review_sources', $pid);
    if (is_array($src) && !empty($src)) {
      $agg['sources'] = array_map(function ($r) {
        return ['name' => isset($r['name']) ? $r['name'] : '', 'value' => isset($r['value']) ? $r['value'] : ''];
      }, $src);
    }
  }
  return $agg;
}

/* ----------------------------------------------------------------
 * Misc
 * ---------------------------------------------------------------- */
/** Copyright string with {year} replaced by the current site-time year. */
function hf_copyright() {
  $txt = hf_opt('copyright', hf_defaults()['footer']['copyright']);
  return str_replace('{year}', date_i18n('Y'), $txt);
}

/** Permalink of a page by slug/path, with a safe fallback. */
function hf_page_url($slug, $fallback = '#') {
  $page = get_page_by_path($slug);
  if ($page) return get_permalink($page);
  return $fallback;
}

/* ----------------------------------------------------------------
 * Generic current-page accessors (used by page templates)
 * ---------------------------------------------------------------- */
/** Current page field with default. */
function hf_pg($key, $default = '') {
  return hf_field($key, $default, get_the_ID());
}

/** Current page repeater rows or a supplied default array. */
function hf_pg_rows($key, array $default_rows) {
  $pid = get_the_ID();
  if ($pid && function_exists('get_field')) {
    $acf = get_field($key, $pid);
    if (is_array($acf) && !empty($acf)) return $acf;
  }
  return $default_rows;
}
