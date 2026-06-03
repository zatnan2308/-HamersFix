<?php
/**
 * HamersFix — Demo Data importer: section pages.
 *
 * Extends the importer (inc/demo-import.php) to populate the nine section-page
 * templates (Commercial, About, Brands, Contact, Appliance Repair Services,
 * Reviews, Service Areas, Appliance Deep Cleaning, Air Vent Cleaning) so NO ACF
 * field is empty in the admin after an import. The front end already renders
 * these from design defaults; this just mirrors the same defaults into the
 * editable fields.
 *
 * Called from hf_demo_apply() (inc/demo-import.php). Reuses hf_demo_set() and
 * hf_demo_rows() defined there.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/** Resolve a section page by its template, falling back to its slug. */
function hf_demo_page_id($template, $slug) {
  $q = get_posts([
    'post_type'   => 'page',
    'post_status' => 'any',
    'numberposts' => 1,
    'fields'      => 'ids',
    'meta_key'    => '_wp_page_template',
    'meta_value'  => $template,
    'no_found_rows' => true,
  ]);
  if (!empty($q)) return (int) $q[0];
  $p = get_page_by_path($slug);
  return $p ? (int) $p->ID : 0;
}

/** Map an array of associative rows to only the given subkeys (in order). */
function hf_demo_map($rows, $keys) {
  $out = [];
  foreach ((array) $rows as $r) {
    $row = [];
    foreach ($keys as $k) $row[$k] = isset($r[$k]) ? $r[$k] : '';
    $out[] = $row;
  }
  return $out;
}

/** Join a flat list into a newline string (for ACF textarea subfields). */
function hf_demo_lines($list) {
  return implode("\n", array_map('strval', (array) $list));
}

/** Populate all nine section pages. */
function hf_demo_apply_pages($overwrite, &$count) {

  /* ===== Commercial ===== */
  $pid = hf_demo_page_id('template-commercial.php', 'commercial');
  if ($pid) {
    $d = hf_commercial_defaults();
    $h = $d['hero'];
    hf_demo_set('hero_eyebrow',   $h['eyebrow'],   $pid, $overwrite, $count);
    hf_demo_set('hero_h1',        $h['h1'],        $pid, $overwrite, $count);
    hf_demo_set('hero_lede',      $h['lede'],      $pid, $overwrite, $count);
    hf_demo_set('hero_issues',    hf_demo_rows($h['issues'], 'text'), $pid, $overwrite, $count);
    hf_demo_set('hero_cta_label', $h['cta_label'], $pid, $overwrite, $count);
    hf_demo_set('hero_note',      $h['note'],      $pid, $overwrite, $count);
    hf_demo_set('hero_qpills',    hf_demo_rows($h['qpills'], 'text'), $pid, $overwrite, $count);
    hf_demo_set('hero_image_alt', $h['image_alt'], $pid, $overwrite, $count);
    hf_demo_set('hero_badge',     $h['badge'],     $pid, $overwrite, $count);
    hf_demo_set('hero_tag_lbl',   $h['tag_lbl'],   $pid, $overwrite, $count);
    hf_demo_set('hero_tag_h3',    $h['tag_h3'],    $pid, $overwrite, $count);

    hf_demo_set('services_eyebrow', $d['services']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('services_h2',      $d['services']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('services_intro',   $d['services']['intro'],   $pid, $overwrite, $count);
    $svc = [];
    foreach ($d['services']['cards'] as $c) {
      $svc[] = ['gradient' => $c['gradient'], 'icon' => $c['icon'], 'title' => $c['title'], 'desc' => $c['desc'], 'chips' => hf_demo_rows($c['chips'], 'text')];
    }
    hf_demo_set('com_services', $svc, $pid, $overwrite, $count);

    hf_demo_set('downtime_eyebrow', $d['downtime']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('downtime_h2',      $d['downtime']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('downtime_intro',   $d['downtime']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('downtime', hf_demo_map($d['downtime']['cards'], ['icon', 'title', 'desc']), $pid, $overwrite, $count);

    hf_demo_set('trust_eyebrow', $d['trust']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('trust_h2',      $d['trust']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('trust_intro',   $d['trust']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('trust_pillars', hf_demo_map($d['trust']['pillars'], ['icon', 'val', 'lbl', 'sub']), $pid, $overwrite, $count);

    hf_demo_set('brands_eyebrow',   $d['brands']['eyebrow'],   $pid, $overwrite, $count);
    hf_demo_set('brands_h2',        $d['brands']['h2'],        $pid, $overwrite, $count);
    hf_demo_set('brands_intro',     $d['brands']['intro'],     $pid, $overwrite, $count);
    hf_demo_set('brands_card_h3',   $d['brands']['card_h3'],   $pid, $overwrite, $count);
    hf_demo_set('brands_card_meta', $d['brands']['card_meta'], $pid, $overwrite, $count);
    hf_demo_set('brand_list',       hf_demo_rows($d['brands']['list'], 'name'), $pid, $overwrite, $count);
    hf_demo_set('brands_footnote',  $d['brands']['footnote'],  $pid, $overwrite, $count);
    hf_demo_set('brands_ask_h4',    $d['brands']['ask_h4'],    $pid, $overwrite, $count);
    hf_demo_set('brands_ask_p',     $d['brands']['ask_p'],     $pid, $overwrite, $count);
    hf_demo_set('brands_ask_btn',   $d['brands']['ask_btn'],   $pid, $overwrite, $count);

    hf_demo_set('process_eyebrow', $d['process']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('process_h2',      $d['process']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('process_intro',   $d['process']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('process_steps', hf_demo_map($d['process']['steps'], ['title', 'desc', 'tag']), $pid, $overwrite, $count);

    hf_demo_set('areas_eyebrow', $d['areas']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('areas_h2',      $d['areas']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('areas_intro',   $d['areas']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('area_cards', hf_demo_map($d['areas']['cards'], ['num', 'title', 'cities', 'link']), $pid, $overwrite, $count);
    hf_demo_set('areas_cta_note', $d['areas']['cta_note'], $pid, $overwrite, $count);
    hf_demo_set('areas_cta_text', $d['areas']['cta_text'], $pid, $overwrite, $count);

    hf_demo_set('faq_eyebrow', $d['faq']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('faq_h2',      $d['faq']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('faq_intro',   $d['faq']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('faq', hf_demo_map($d['faq']['items'], ['q', 'a']), $pid, $overwrite, $count);

    hf_demo_set('final_eyebrow',  $d['final']['eyebrow'],  $pid, $overwrite, $count);
    hf_demo_set('final_h2',       $d['final']['h2'],       $pid, $overwrite, $count);
    hf_demo_set('final_intro',    $d['final']['intro'],    $pid, $overwrite, $count);
    hf_demo_set('final_card_lbl', $d['final']['card_lbl'], $pid, $overwrite, $count);
  }

  /* ===== About ===== */
  $pid = hf_demo_page_id('template-about.php', 'about');
  if ($pid) {
    $d = hf_about_defaults();
    $h = $d['hero'];
    hf_demo_set('hero_eyebrow',   $h['eyebrow'],   $pid, $overwrite, $count);
    hf_demo_set('hero_h1',        $h['h1'],        $pid, $overwrite, $count);
    hf_demo_set('hero_lede',      $h['lede'],      $pid, $overwrite, $count);
    hf_demo_set('hero_cta_label', $h['cta_label'], $pid, $overwrite, $count);

    $w = $d['who'];
    hf_demo_set('who_eyebrow', $w['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('who_h2',      $w['h2'],      $pid, $overwrite, $count);
    hf_demo_set('who_paras',   hf_demo_rows($w['paras'], 'text'), $pid, $overwrite, $count);
    hf_demo_set('who_tags',    hf_demo_rows($w['tags'], 'text'),  $pid, $overwrite, $count);
    hf_demo_set('who_vis_lbl', $w['vis_lbl'], $pid, $overwrite, $count);
    hf_demo_set('who_vis_h3',  $w['vis_h3'],  $pid, $overwrite, $count);
    hf_demo_set('who_items',   hf_demo_map($w['items'], ['icon', 'title', 'sub']), $pid, $overwrite, $count);

    hf_demo_set('values_eyebrow', $d['values']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('values_h2',      $d['values']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('values_intro',   $d['values']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('value_cards', hf_demo_map($d['values']['cards'], ['icon', 'h3', 'p']), $pid, $overwrite, $count);

    hf_demo_set('trust_eyebrow', $d['trust']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('trust_h2',      $d['trust']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('trust_intro',   $d['trust']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('trust_pillars', hf_demo_map($d['trust']['pillars'], ['icon', 'val', 'lbl', 'sub']), $pid, $overwrite, $count);

    hf_demo_set('hb_eyebrow', $d['hb']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('hb_h2',      $d['hb']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('hb_intro',   $d['hb']['intro'],   $pid, $overwrite, $count);
    $hb = [];
    foreach ($d['hb']['cards'] as $c) {
      $hb[] = ['kind' => $c['kind'], 'eyebrow' => $c['eyebrow'], 'h3' => $c['h3'], 'p' => $c['p'], 'items' => hf_demo_lines($c['items']), 'link' => $c['link'], 'url_key' => $c['url_key']];
    }
    hf_demo_set('hb_cards', $hb, $pid, $overwrite, $count);

    hf_demo_set('promise_eyebrow', $d['promise']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('promise_h2',      $d['promise']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('promise_intro',   $d['promise']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('promise_steps', hf_demo_map($d['promise']['steps'], ['h3', 'p']), $pid, $overwrite, $count);

    hf_demo_set('areas_eyebrow', $d['areas']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('areas_h2',      $d['areas']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('areas_intro',   $d['areas']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('area_cards', hf_demo_map($d['areas']['cards'], ['num', 'title', 'cities', 'link']), $pid, $overwrite, $count);
    hf_demo_set('areas_cta_note', $d['areas']['cta_note'], $pid, $overwrite, $count);
    hf_demo_set('areas_cta_text', $d['areas']['cta_text'], $pid, $overwrite, $count);

    hf_demo_set('brands_eyebrow', $d['brands']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('brands_h2',      $d['brands']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('brands_intro',   $d['brands']['intro'],   $pid, $overwrite, $count);
    $cols = [];
    foreach ($d['brands']['cols'] as $c) {
      $cols[] = ['h3' => $c['h3'], 'sub' => $c['sub'], 'prem' => !empty($c['prem']), 'list' => hf_demo_lines($c['list'])];
    }
    hf_demo_set('brand_cols', $cols, $pid, $overwrite, $count);
    hf_demo_set('brands_cta_label', $d['brands']['cta_label'], $pid, $overwrite, $count);
    hf_demo_set('brands_footnote',  $d['brands']['footnote'],  $pid, $overwrite, $count);

    hf_demo_set('friendly_eyebrow',    $d['friendly']['eyebrow'],    $pid, $overwrite, $count);
    hf_demo_set('friendly_h2',         $d['friendly']['h2'],         $pid, $overwrite, $count);
    hf_demo_set('friendly_intro',      $d['friendly']['intro'],      $pid, $overwrite, $count);
    hf_demo_set('friendly_stamp_nm',   $d['friendly']['stamp_nm'],   $pid, $overwrite, $count);
    hf_demo_set('friendly_stamp_role', $d['friendly']['stamp_role'], $pid, $overwrite, $count);
    hf_demo_set('friendly_items', hf_demo_rows($d['friendly']['items'], 'text'), $pid, $overwrite, $count);

    hf_demo_set('final_eyebrow',  $d['final']['eyebrow'],  $pid, $overwrite, $count);
    hf_demo_set('final_h2',       $d['final']['h2'],       $pid, $overwrite, $count);
    hf_demo_set('final_intro',    $d['final']['intro'],    $pid, $overwrite, $count);
    hf_demo_set('final_card_lbl', $d['final']['card_lbl'], $pid, $overwrite, $count);
  }

  /* ===== Brands ===== */
  $pid = hf_demo_page_id('template-brands.php', 'brands');
  if ($pid) {
    $d = hf_brands_defaults();
    $h = $d['hero'];
    hf_demo_set('hero_eyebrow',     $h['eyebrow'],     $pid, $overwrite, $count);
    hf_demo_set('hero_h1',          $h['h1'],          $pid, $overwrite, $count);
    hf_demo_set('hero_lede',        $h['lede'],        $pid, $overwrite, $count);
    hf_demo_set('hero_image_alt',   $h['image_alt'],   $pid, $overwrite, $count);
    hf_demo_set('hero_badge',       $h['badge'],       $pid, $overwrite, $count);
    hf_demo_set('hero_overlay_lbl', $h['overlay_lbl'], $pid, $overwrite, $count);
    hf_demo_set('hero_overlay_txt', $h['overlay_txt'], $pid, $overwrite, $count);
    hf_demo_set('hero_stats', hf_demo_map($h['stats'], ['n', 'sup', 'l']), $pid, $overwrite, $count);

    hf_demo_set('scope_eyebrow', $d['scope']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('scope_h2',      $d['scope']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('scope_intro',   $d['scope']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('scope_cards', hf_demo_map($d['scope']['cards'], ['icon', 'n', 'sup', 'l', 'p']), $pid, $overwrite, $count);

    hf_demo_set('home_eyebrow', $d['home']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('home_h2',      $d['home']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('home_intro',   $d['home']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('home_cards', hf_demo_map($d['home']['cards'], ['nm', 'ds', 'tags']), $pid, $overwrite, $count);

    hf_demo_set('prem_eyebrow', $d['prem']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('prem_h2',      $d['prem']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('prem_intro',   $d['prem']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('prem_cards', hf_demo_map($d['prem']['cards'], ['seal', 'nm', 'ds', 'focus']), $pid, $overwrite, $count);

    hf_demo_set('com_eyebrow',       $d['com']['eyebrow'],       $pid, $overwrite, $count);
    hf_demo_set('com_h2',            $d['com']['h2'],            $pid, $overwrite, $count);
    hf_demo_set('com_intro',         $d['com']['intro'],         $pid, $overwrite, $count);
    hf_demo_set('com_promo_eyebrow', $d['com']['promo_eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('com_promo_h3',      $d['com']['promo_h3'],      $pid, $overwrite, $count);
    hf_demo_set('com_promo_p',       $d['com']['promo_p'],       $pid, $overwrite, $count);
    hf_demo_set('com_promo_list', hf_demo_rows($d['com']['promo_list'], 'text'), $pid, $overwrite, $count);
    hf_demo_set('com_promo_cta',     $d['com']['promo_cta'],     $pid, $overwrite, $count);
    hf_demo_set('com_brands_h3',     $d['com']['brands_h3'],     $pid, $overwrite, $count);
    hf_demo_set('com_brands_meta',   $d['com']['brands_meta'],   $pid, $overwrite, $count);
    $cats = [];
    foreach ($d['com']['cats'] as $c) $cats[] = ['h4' => $c['h4'], 'list' => $c['list']];
    hf_demo_set('com_cats', $cats, $pid, $overwrite, $count);

    hf_demo_set('matrix_eyebrow', $d['matrix']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('matrix_h2',      $d['matrix']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('matrix_intro',   $d['matrix']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('matrix_rows', hf_demo_map($d['matrix']['rows'], ['icon', 'nm', 'ct', 'brands']), $pid, $overwrite, $count);

    hf_demo_set('why_eyebrow', $d['why']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('why_h2',      $d['why']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('why_intro',   $d['why']['intro'],   $pid, $overwrite, $count);
    $why = [];
    foreach ($d['why']['cards'] as $c) {
      // why_cards.list is a nested REPEATER (subfield 'text'), so write rows —
      // not a newline string — or a Reset-to-demo leaves the bullets empty.
      $why[] = ['num' => $c['num'], 'h3' => $c['h3'], 'p' => $c['p'], 'list' => hf_demo_rows($c['list'], 'text')];
    }
    hf_demo_set('why_cards', $why, $pid, $overwrite, $count);

    hf_demo_set('faq_eyebrow', $d['faq']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('faq_h2',      $d['faq']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('faq', hf_demo_map($d['faq']['items'], ['q', 'a']), $pid, $overwrite, $count);

    hf_demo_set('final_eyebrow',  $d['final']['eyebrow'],  $pid, $overwrite, $count);
    hf_demo_set('final_h2',       $d['final']['h2'],       $pid, $overwrite, $count);
    hf_demo_set('final_intro',    $d['final']['intro'],    $pid, $overwrite, $count);
    hf_demo_set('final_card_lbl', $d['final']['card_lbl'], $pid, $overwrite, $count);
    hf_demo_set('final_signals', hf_demo_map($d['final']['signals'], ['b', 'sub']), $pid, $overwrite, $count);
  }

  /* ===== Contact ===== */
  $pid = hf_demo_page_id('template-contact.php', 'contact');
  if ($pid) {
    $d = hf_contact_defaults();
    hf_demo_set('hero_eyebrow', $d['hero']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('hero_h1',      $d['hero']['h1'],      $pid, $overwrite, $count);
    hf_demo_set('hero_lede',    $d['hero']['lede'],    $pid, $overwrite, $count);
    hf_demo_set('channels', hf_demo_map($d['channels'], ['kind', 'primary', 'badge', 'badge_style', 'icon', 'h3', 'ds', 'action']), $pid, $overwrite, $count);

    $r = $d['reach'];
    hf_demo_set('reach_eyebrow', $r['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('reach_h2',      $r['h2'],      $pid, $overwrite, $count);
    hf_demo_set('reach_sub',     $r['sub'],     $pid, $overwrite, $count);
    hf_demo_set('reach_links', hf_demo_map($r['links'], ['kind', 'cls', 'ttl', 'val', 'ds']), $pid, $overwrite, $count);
    hf_demo_set('reach_note',    $r['note'],    $pid, $overwrite, $count);

    $i = $d['info'];
    hf_demo_set('info_hours_h3',   $i['hours_h3'],   $pid, $overwrite, $count);
    hf_demo_set('info_hours_note', $i['hours_note'], $pid, $overwrite, $count);
    hf_demo_set('info_addr_h3',    $i['addr_h3'],    $pid, $overwrite, $count);
    hf_demo_set('info_addr_note',  $i['addr_note'],  $pid, $overwrite, $count);
    hf_demo_set('info_addr_link',  $i['addr_link'],  $pid, $overwrite, $count);
    hf_demo_set('info_lines_h3',   $i['lines_h3'],   $pid, $overwrite, $count);

    hf_demo_set('final_eyebrow',  $d['final']['eyebrow'],  $pid, $overwrite, $count);
    hf_demo_set('final_h2',       $d['final']['h2'],       $pid, $overwrite, $count);
    hf_demo_set('final_intro',    $d['final']['intro'],    $pid, $overwrite, $count);
    hf_demo_set('final_card_lbl', $d['final']['card_lbl'], $pid, $overwrite, $count);
  }

  /* ===== Appliance Repair Services (landing) ===== */
  $pid = hf_demo_page_id('template-services.php', 'appliance-repair-services');
  if ($pid) {
    $d = hf_services_page_defaults();
    hf_demo_set('hero_eyebrow',    $d['hero']['eyebrow'],    $pid, $overwrite, $count);
    hf_demo_set('hero_h1',         $d['hero']['h1'],         $pid, $overwrite, $count);
    hf_demo_set('hero_lede',       $d['hero']['lede'],       $pid, $overwrite, $count);
    hf_demo_set('hero_book_label', $d['hero']['book_label'], $pid, $overwrite, $count);
    hf_demo_set('services_eyebrow', $d['services']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('services_h2',      $d['services']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('services_intro',   $d['services']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('steps_eyebrow', $d['steps']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('steps_h2',      $d['steps']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('steps_intro',   $d['steps']['intro'],   $pid, $overwrite, $count);
    hf_demo_set('steps', hf_demo_map(hf_defaults()['steps'], ['num', 'title', 'desc', 'time']), $pid, $overwrite, $count);
    hf_demo_set('cta_eyebrow', $d['cta']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('cta_h2',      $d['cta']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('cta_intro',   $d['cta']['intro'],   $pid, $overwrite, $count);
  }

  /* ===== Reviews ===== */
  $pid = hf_demo_page_id('template-reviews.php', 'reviews');
  if ($pid) {
    $d = hf_reviews_defaults();
    hf_demo_set('hero_eyebrow', $d['hero']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('hero_h1',      $d['hero']['h1'],      $pid, $overwrite, $count);
    hf_demo_set('hero_lede',    $d['hero']['lede'],    $pid, $overwrite, $count);
    hf_demo_set('review_score',   $d['agg']['score'], $pid, $overwrite, $count);
    hf_demo_set('review_title',   $d['agg']['title'], $pid, $overwrite, $count);
    hf_demo_set('review_sources', hf_demo_map($d['agg']['sources'], ['name', 'value']), $pid, $overwrite, $count);
    hf_demo_set('reviews', hf_demo_map($d['reviews'], ['initials', 'source', 'text', 'name', 'meta']), $pid, $overwrite, $count);
    hf_demo_set('cta_eyebrow', $d['cta']['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('cta_h2',      $d['cta']['h2'],      $pid, $overwrite, $count);
    hf_demo_set('cta_intro',   $d['cta']['intro'],   $pid, $overwrite, $count);
  }

  /* ===== Service Areas ===== */
  $pid = hf_demo_page_id('template-service-areas.php', 'service-areas');
  if ($pid) {
    $d = hf_service_areas_defaults();
    hf_demo_set('hero_eyebrow', $d['hero_eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('hero_h1',      $d['hero_h1'],      $pid, $overwrite, $count);
    hf_demo_set('hero_lede',    $d['hero_lede'],    $pid, $overwrite, $count);
    hf_demo_set('book_h2',      $d['book_h2'],      $pid, $overwrite, $count);
    hf_demo_set('book_p',       $d['book_p'],       $pid, $overwrite, $count);
    hf_demo_set('stat_arrival', $d['stat_arrival'], $pid, $overwrite, $count);
    hf_demo_set('stat_vans',    $d['stat_vans'],    $pid, $overwrite, $count);
    hf_demo_set('stat_ontime',  $d['stat_ontime'],  $pid, $overwrite, $count);
    hf_demo_set('map_h2',       $d['map_h2'],       $pid, $overwrite, $count);
    hf_demo_set('map_intro',    $d['map_intro'],    $pid, $overwrite, $count);
    hf_demo_set('cities_h2',    $d['cities_h2'],    $pid, $overwrite, $count);
    hf_demo_set('cities_intro', $d['cities_intro'], $pid, $overwrite, $count);

    $regions = [];
    foreach ($d['regions'] as $r) {
      $regions[] = [
        'pill' => $r['pill'], 'featured' => !empty($r['featured']), 'pill_cta' => !empty($r['pill_cta']),
        'title' => $r['title'], 'meta' => $r['meta'],
        'cities' => hf_demo_lines($r['cities']),
        'stats' => hf_demo_map(array_map(function ($s) { return ['label' => $s[0], 'value' => $s[1]]; }, $r['stats']), ['label', 'value']),
      ];
    }
    hf_demo_set('regions', $regions, $pid, $overwrite, $count);

    hf_demo_set('resp_h2',    $d['resp_h2'],    $pid, $overwrite, $count);
    hf_demo_set('resp_intro', $d['resp_intro'], $pid, $overwrite, $count);
    hf_demo_set('zones', hf_demo_map($d['zones'], ['level', 'lbl', 'time', 'suffix', 'area', 'desc', 'bar']), $pid, $overwrite, $count);

    hf_demo_set('com_h2',       $d['com_h2'],    $pid, $overwrite, $count);
    hf_demo_set('com_intro',    $d['com_intro'], $pid, $overwrite, $count);
    hf_demo_set('com_features', hf_demo_rows($d['com_features'], 'text'), $pid, $overwrite, $count);
    hf_demo_set('com_stats', hf_demo_map(array_map(function ($s) { return ['k' => $s[0], 'v' => $s[1], 'suffix' => $s[2]]; }, $d['com_stats']), ['k', 'v', 'suffix']), $pid, $overwrite, $count);

    hf_demo_set('faq_h2', $d['faq_h2'], $pid, $overwrite, $count);
    hf_demo_set('faq', hf_demo_map($d['faq'], ['q', 'a']), $pid, $overwrite, $count);

    hf_demo_set('final_h2',    $d['final_h2'],    $pid, $overwrite, $count);
    hf_demo_set('final_intro', $d['final_intro'], $pid, $overwrite, $count);
    hf_demo_set('final_signals', hf_demo_map($d['final_signals'], ['b', 'sub']), $pid, $overwrite, $count);
  }

  /* ===== Appliance Deep Cleaning ===== */
  $pid = hf_demo_page_id('template-deep-cleaning.php', 'appliance-deep-cleaning');
  if ($pid && function_exists('hf_deep_cleaning_defaults')) {
    $d = hf_deep_cleaning_defaults();
    $h = $d['hero'];
    hf_demo_set('hero_eyebrow',     $h['eyebrow'],     $pid, $overwrite, $count);
    hf_demo_set('hero_h1',          $h['h1'],          $pid, $overwrite, $count);
    hf_demo_set('hero_lede',        $h['lede'],        $pid, $overwrite, $count);
    hf_demo_set('hero_image_alt',   $h['image_alt'],   $pid, $overwrite, $count);
    hf_demo_set('hero_badge_text',  $h['badge_text'],  $pid, $overwrite, $count);
    hf_demo_set('hero_tag_small',   $h['tag_small'],   $pid, $overwrite, $count);
    hf_demo_set('hero_tag_text',    $h['tag_text'],    $pid, $overwrite, $count);
    hf_demo_set('hero_pills', hf_demo_map($h['pills'], ['text', 'dot']), $pid, $overwrite, $count);
    hf_demo_set('hero_trust', hf_demo_map($h['trust'], ['ic', 'style', 'label']), $pid, $overwrite, $count);

    $s = $d['services'];
    hf_demo_set('services_eyebrow', $s['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('services_h2',      $s['h2'],      $pid, $overwrite, $count);
    hf_demo_set('services_intro',   $s['intro'],   $pid, $overwrite, $count);
    $blocks = [];
    foreach ($s['blocks'] as $b) {
      $blocks[] = [
        'id' => $b['id'], 'media' => $b['media'], 'eyebrow' => $b['eyebrow'],
        'h2' => $b['h2'], 'sub' => $b['sub'], 'chip' => $b['chip'],
        'items' => hf_demo_rows($b['items'], 'text'), 'cta' => $b['cta'],
      ];
    }
    hf_demo_set('clean_blocks', $blocks, $pid, $overwrite, $count);

    $cb = $d['combo'];
    hf_demo_set('combo_badge',       $cb['badge'],       $pid, $overwrite, $count);
    hf_demo_set('combo_h2',          $cb['h2'],          $pid, $overwrite, $count);
    hf_demo_set('combo_intro',       $cb['intro'],       $pid, $overwrite, $count);
    hf_demo_set('combo_panel_title', $cb['panel_title'], $pid, $overwrite, $count);
    hf_demo_set('combo_panel_meta',  $cb['panel_meta'],  $pid, $overwrite, $count);
    hf_demo_set('combo_rows', hf_demo_rows($cb['rows'], 'text'), $pid, $overwrite, $count);

    $w = $d['why'];
    hf_demo_set('why_eyebrow', $w['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('why_h2',      $w['h2'],      $pid, $overwrite, $count);
    hf_demo_set('why_intro',   $w['intro'],   $pid, $overwrite, $count);
    hf_demo_set('why_cards', hf_demo_map($w['cards'], ['icon', 'h3', 'p']), $pid, $overwrite, $count);

    $hw = $d['how'];
    hf_demo_set('how_eyebrow', $hw['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('how_h2',      $hw['h2'],      $pid, $overwrite, $count);
    hf_demo_set('how_intro',   $hw['intro'],   $pid, $overwrite, $count);
    hf_demo_set('how_steps', hf_demo_map($hw['steps'], ['num', 'h3', 'p', 'time']), $pid, $overwrite, $count);

    $fq = $d['faq'];
    hf_demo_set('faq_eyebrow', $fq['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('faq_h2',      $fq['h2'],      $pid, $overwrite, $count);
    hf_demo_set('faq', hf_demo_map($fq['items'], ['q', 'a']), $pid, $overwrite, $count);

    $fn = $d['final'];
    hf_demo_set('final_eyebrow', $fn['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('final_h2',      $fn['h2'],      $pid, $overwrite, $count);
    hf_demo_set('final_intro',   $fn['intro'],   $pid, $overwrite, $count);
    hf_demo_set('final_signals', hf_demo_map($fn['signals'], ['title', 'sub']), $pid, $overwrite, $count);
  }

  /* ===== Air Vent Cleaning ===== */
  $pid = hf_demo_page_id('template-air-vent.php', 'air-vent-cleaning');
  if ($pid && function_exists('hf_air_vent_defaults')) {
    $d = hf_air_vent_defaults();
    $h = $d['hero'];
    hf_demo_set('hero_eyebrow',    $h['eyebrow'],    $pid, $overwrite, $count);
    hf_demo_set('hero_h1',         $h['h1'],         $pid, $overwrite, $count);
    hf_demo_set('hero_lede',       $h['lede'],       $pid, $overwrite, $count);
    hf_demo_set('hero_price_from', $h['price_from'], $pid, $overwrite, $count);
    hf_demo_set('hero_badge_text', $h['badge_text'], $pid, $overwrite, $count);
    hf_demo_set('hero_tag_small',  $h['tag_small'],  $pid, $overwrite, $count);
    hf_demo_set('hero_tag_text',   $h['tag_text'],   $pid, $overwrite, $count);
    hf_demo_set('hero_trust', hf_demo_map($h['trust'], ['ic', 'style', 'label']), $pid, $overwrite, $count);

    $in = $d['included'];
    hf_demo_set('incl_eyebrow', $in['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('incl_h2',      $in['h2'],      $pid, $overwrite, $count);
    hf_demo_set('incl_intro',   $in['intro'],   $pid, $overwrite, $count);
    hf_demo_set('incl_items', hf_demo_rows($in['items'], 'text'), $pid, $overwrite, $count);

    $bn = $d['benefits'];
    hf_demo_set('benefits_eyebrow', $bn['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('benefits_h2',      $bn['h2'],      $pid, $overwrite, $count);
    hf_demo_set('benefits_intro',   $bn['intro'],   $pid, $overwrite, $count);
    hf_demo_set('benefit_cards', hf_demo_map($bn['cards'], ['icon', 'h3', 'p']), $pid, $overwrite, $count);

    $pr = $d['props'];
    hf_demo_set('props_eyebrow', $pr['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('props_h2',      $pr['h2'],      $pid, $overwrite, $count);
    hf_demo_set('props_intro',   $pr['intro'],   $pid, $overwrite, $count);
    $props = [];
    foreach ($pr['cards'] as $c) {
      $props[] = [
        'variant' => $c['variant'], 'icon' => $c['icon'], 'h3' => $c['h3'],
        'p' => $c['p'], 'items' => hf_demo_rows($c['items'], 'text'),
      ];
    }
    hf_demo_set('prop_cards', $props, $pid, $overwrite, $count);

    $hw = $d['how'];
    hf_demo_set('how_eyebrow', $hw['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('how_h2',      $hw['h2'],      $pid, $overwrite, $count);
    hf_demo_set('how_intro',   $hw['intro'],   $pid, $overwrite, $count);
    hf_demo_set('how_steps', hf_demo_map($hw['steps'], ['num', 'h3', 'p', 'time']), $pid, $overwrite, $count);

    $p = $d['price'];
    hf_demo_set('price_h3',         $p['h3'],         $pid, $overwrite, $count);
    hf_demo_set('price_intro',      $p['intro'],      $pid, $overwrite, $count);
    hf_demo_set('price_from_label', $p['from_label'], $pid, $overwrite, $count);
    hf_demo_set('price_amount',     $p['amount'],     $pid, $overwrite, $count);
    hf_demo_set('price_note',       $p['note'],       $pid, $overwrite, $count);
    hf_demo_set('price_cta',        $p['cta'],        $pid, $overwrite, $count);

    $fn = $d['final'];
    hf_demo_set('final_eyebrow', $fn['eyebrow'], $pid, $overwrite, $count);
    hf_demo_set('final_h2',      $fn['h2'],      $pid, $overwrite, $count);
    hf_demo_set('final_intro',   $fn['intro'],   $pid, $overwrite, $count);
    hf_demo_set('final_signals', hf_demo_map($fn['signals'], ['title', 'sub']), $pid, $overwrite, $count);
  }

  /* ===== Per-page SEO (title + description) ===== */
  hf_demo_apply_seo($overwrite, $count);
}

/** Fill seo_title / seo_description on the seven section pages. */
function hf_demo_apply_seo($overwrite, &$count) {
  $seo = [
    ['template-commercial.php', 'commercial',
      'Commercial Appliance Repair in Northeast Georgia | HamersFix',
      'Commercial refrigeration, kitchen and laundry equipment repair for restaurants, cafés and property managers across Northeast Georgia. After-hours dispatch, NSF-compliant.'],
    ['template-about.php', 'about',
      'About HamersFix — Local Appliance Repair in Northeast Georgia',
      'Locally owned, licensed and insured appliance repair serving Northeast Georgia. Clear communication, flat-rate pricing, and a 3-month warranty on every repair.'],
    ['template-brands.php', 'brands',
      'Appliance Brands We Repair — Sub-Zero to Whirlpool | HamersFix',
      'Factory-authorized on Sub-Zero, Wolf, Viking, Thermador and Miele; OEM-certified on 25+ mainstream brands. Genuine parts and a 3-month warranty across Northeast Georgia.'],
    ['template-contact.php', 'contact',
      'Contact HamersFix — Call, Book or Email | Northeast Georgia',
      'Reach HamersFix appliance repair: call our dispatcher, book online, or email. Real person, under-60-second wait, serving Northeast Georgia seven days a week.'],
    ['template-service-areas.php', 'service-areas',
      'Service Areas — 14 Cities in Northeast Georgia | HamersFix',
      'HamersFix covers 14 cities across Gwinnett, Barrow and the Athens area — Bethlehem, Lawrenceville, Winder, Monroe and more. Same-day appliance repair, flat-rate pricing.'],
    ['template-services.php', 'appliance-repair-services',
      'Appliance Repair Services in Northeast Georgia | HamersFix',
      'We repair refrigerators, washers, dryers, dishwashers, ovens and cooktops across Northeast Georgia. Same-day service, flat-rate pricing, a 3-month parts & labor warranty.'],
    ['template-reviews.php', 'reviews',
      'Reviews — Appliance Repair in Northeast Georgia | HamersFix',
      'Read verified customer reviews of HamersFix appliance repair across Google, BBB, Yelp and HomeAdvisor. Honest pricing, on-time service, and warranty-backed repairs.'],
    ['template-deep-cleaning.php', 'appliance-deep-cleaning',
      'Appliance Deep Cleaning — Refrigerator & Oven | HamersFix',
      'Professional refrigerator and oven deep cleaning across Northeast Georgia. Safe products, sanitized surfaces, odor removal — book the fridge + oven combo and save.'],
    ['template-air-vent.php', 'air-vent-cleaning',
      'Air Vent Cleaning in Northeast Georgia — From $179 | HamersFix',
      'Professional air vent cleaning from $179 — includes dryer vent inspection and flexible vent hose replacement. Better airflow, less dust, residential & commercial.'],
  ];
  foreach ($seo as $row) {
    $pid = hf_demo_page_id($row[0], $row[1]);
    if (!$pid) continue;
    hf_demo_set('seo_title',       $row[2], $pid, $overwrite, $count);
    hf_demo_set('seo_description', $row[3], $pid, $overwrite, $count);
  }
}
