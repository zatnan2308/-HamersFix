<?php
/**
 * HamersFix — Demo Data importer.
 *
 * Admin screen (Appearance → Demo Data) with two buttons:
 *  - "Import demo data (fill empty only)" — writes design defaults into any ACF
 *    field that is currently empty; never touches data you've entered.
 *  - "Reset everything to demo (overwrite)" — overwrites with design defaults
 *    (JS confirm required).
 *
 * Scope: Theme Settings (global NAP / hours / ZIPs / footer / trust / SEO),
 * the six `service` CPT entries, and the Home page fields. Section-page copy
 * (Commercial/About/Brands/Contact/Services/Reviews/Service Areas) already
 * renders from design defaults and shows them as field placeholders, so it is
 * editable without an import.
 *
 * Failure mode is graceful: a value that can't be written just leaves the
 * field empty, and the front end keeps rendering the design default.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/* ---- Admin menu ------------------------------------------------ */
add_action('admin_menu', function () {
  add_theme_page(
    __('HamersFix Demo Data', 'hamersfix'),
    __('Demo Data', 'hamersfix'),
    'manage_options',
    'hf-demo-data',
    'hf_demo_data_page'
  );
});

function hf_demo_data_page() {
  if (!current_user_can('manage_options')) return;
  $acf  = function_exists('update_field');
  $done = isset($_GET['hf_done']) ? (int) $_GET['hf_done'] : -1;
  $mode = isset($_GET['hf_mode']) ? sanitize_key($_GET['hf_mode']) : '';
  $when = get_option('hf_demo_imported');
  ?>
  <div class="wrap">
    <h1><?php esc_html_e('HamersFix — Demo Data', 'hamersfix'); ?></h1>

    <?php if ($done >= 0) : ?>
      <div class="notice notice-success is-dismissible"><p>
        <?php echo esc_html(sprintf(
          $mode === 'reset'
            ? __('Reset complete — %d fields written from the demo content.', 'hamersfix')
            : __('Import complete — %d empty fields filled from the demo content.', 'hamersfix'),
          $done
        )); ?>
      </p></div>
    <?php endif; ?>

    <?php if (!$acf) : ?>
      <div class="notice notice-error"><p><?php esc_html_e('Advanced Custom Fields PRO must be active to import demo data.', 'hamersfix'); ?></p></div>
    <?php endif; ?>

    <p style="max-width:680px">
      <?php esc_html_e('Populate the theme’s editable fields (Theme Settings, the six Services, and the Home page) with the built-in demo content so you can see and tweak everything in the admin. The site already displays this content by default even before importing.', 'hamersfix'); ?>
    </p>

    <p>
      <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="display:inline-block;margin-right:10px">
        <input type="hidden" name="action" value="hf_demo_fill">
        <?php wp_nonce_field('hf_demo_fill'); ?>
        <?php submit_button(__('Import demo data (fill empty only)', 'hamersfix'), 'primary', 'submit', false, $acf ? [] : ['disabled' => 'disabled']); ?>
      </form>

      <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="display:inline-block"
            onsubmit="return confirm(<?php echo esc_js('"' . __('This OVERWRITES theme content (Theme Settings, Services, Home) with demo data. Your current values there will be lost. Continue?', 'hamersfix') . '"'); ?>);">
        <input type="hidden" name="action" value="hf_demo_reset">
        <?php wp_nonce_field('hf_demo_reset'); ?>
        <?php submit_button(__('Reset everything to demo (overwrite)', 'hamersfix'), 'delete', 'submit', false, $acf ? [] : ['disabled' => 'disabled']); ?>
      </form>
    </p>

    <?php if ($when) : ?>
      <p class="description"><?php echo esc_html(sprintf(__('Last run: %s', 'hamersfix'), date_i18n(get_option('date_format') . ' ' . get_option('time_format'), (int) $when))); ?></p>
    <?php endif; ?>
  </div>
  <?php
}

/* ---- Handlers -------------------------------------------------- */
add_action('admin_post_hf_demo_fill', function () { hf_demo_handle(false); });
add_action('admin_post_hf_demo_reset', function () { hf_demo_handle(true); });

function hf_demo_handle($overwrite) {
  $action = $overwrite ? 'hf_demo_reset' : 'hf_demo_fill';
  if (!current_user_can('manage_options')) wp_die(esc_html__('Insufficient permissions.', 'hamersfix'));
  check_admin_referer($action);
  if (!function_exists('update_field')) wp_die(esc_html__('ACF Pro is required.', 'hamersfix'));

  $count = 0;
  hf_demo_apply($overwrite, $count);
  update_option('hf_demo_imported', time());

  wp_safe_redirect(add_query_arg([
    'page'    => 'hf-demo-data',
    'hf_done' => $count,
    'hf_mode' => $overwrite ? 'reset' : 'fill',
  ], admin_url('themes.php')));
  exit;
}

/* ---- Core: write one field (respecting fill-vs-overwrite) ------ */
function hf_demo_set($name, $value, $post_id, $overwrite, &$count) {
  if ($value === null || $value === '' || $value === []) return;
  if (!$overwrite) {
    $cur = get_field($name, $post_id);
    if ($cur !== null && $cur !== '' && $cur !== false && $cur !== []) return; // keep user value
  }
  if (update_field($name, $value, $post_id)) $count++;
}

/** Wrap a flat list of strings as repeater rows: [['<key>' => value], ...]. */
function hf_demo_rows($list, $key) {
  $out = [];
  foreach ((array) $list as $v) $out[] = [$key => $v];
  return $out;
}

/* ---- Core: apply all demo content ----------------------------- */
function hf_demo_apply($overwrite, &$count) {
  $d = hf_defaults();

  /* ===== Theme Settings (Options) ===== */
  $opt = 'option';
  $id  = $d['identity'];
  hf_demo_set('site_title',     $id['site_title'],     $opt, $overwrite, $count);
  hf_demo_set('site_tagline',   $id['site_tagline'],   $opt, $overwrite, $count);
  hf_demo_set('logo_mark_text', $id['logo_mark_text'], $opt, $overwrite, $count);
  hf_demo_set('serving_area',   $id['serving_area'],   $opt, $overwrite, $count);
  hf_demo_set('license_text',   $id['license_text'],   $opt, $overwrite, $count);

  $c = $d['contact'];
  hf_demo_set('phone_display',          $c['phone_display'],          $opt, $overwrite, $count);
  hf_demo_set('phone_link',             $c['phone_link'],             $opt, $overwrite, $count);
  hf_demo_set('email',                  $c['email'],                  $opt, $overwrite, $count);
  hf_demo_set('address_city_state_zip', $c['address_city_state_zip'], $opt, $overwrite, $count);
  // address_street, booking_url, google_reviews_url intentionally left for the client.

  hf_demo_set('hours_short',  $d['hours_short'],  $opt, $overwrite, $count);
  hf_demo_set('hours',        $d['hours'],        $opt, $overwrite, $count); // rows: label/open/close/closed
  hf_demo_set('service_zips', $d['service_zips'], $opt, $overwrite, $count); // rows: city/zips

  $z = $d['zip_copy'];
  hf_demo_set('zip_label',       $z['zip_label'],       $opt, $overwrite, $count);
  hf_demo_set('zip_placeholder', $z['zip_placeholder'], $opt, $overwrite, $count);
  hf_demo_set('zip_success',     $z['zip_success'],     $opt, $overwrite, $count);
  hf_demo_set('zip_fail',        $z['zip_fail'],        $opt, $overwrite, $count);
  hf_demo_set('zip_invalid',     $z['zip_invalid'],     $opt, $overwrite, $count);

  hf_demo_set('trust_badges', $d['trust'], $opt, $overwrite, $count); // rows: icon_text/icon_style/label

  $f = $d['footer'];
  hf_demo_set('footer_services',     $f['services'], $opt, $overwrite, $count); // rows: label/url
  hf_demo_set('footer_company',      $f['company'],  $opt, $overwrite, $count);
  hf_demo_set('footer_legal_links',  $f['legal'],    $opt, $overwrite, $count);
  hf_demo_set('footer_credit_text',  $f['credit_text'], $opt, $overwrite, $count);
  hf_demo_set('footer_credit_url',   $f['credit_url'],  $opt, $overwrite, $count);
  hf_demo_set('copyright',           $f['copyright'],   $opt, $overwrite, $count);

  /* ===== Services (CPT) ===== */
  if (post_type_exists('service')) {
    foreach ($d['services'] as $s) {
      $slug = sanitize_title($s['title']);
      $post = get_page_by_path($slug, OBJECT, 'service');
      if (!$post) continue;
      $pid = $post->ID;
      hf_demo_set('icon',       $s['icon'],       $pid, $overwrite, $count);
      hf_demo_set('short_desc', $s['short_desc'], $pid, $overwrite, $count);
      hf_demo_set('long_desc',  $s['long_desc'],  $pid, $overwrite, $count);
      hf_demo_set('price_note', $s['price_note'], $pid, $overwrite, $count);
      hf_demo_set('job_count',  $s['job_count'],  $pid, $overwrite, $count);
    }
  }

  /* ===== Home page ===== */
  $home_id = (int) get_option('page_on_front');
  if (!$home_id) {
    $hp = get_page_by_path('home');
    if ($hp) $home_id = $hp->ID;
  }
  if ($home_id) {
    $h = $d['home'];
    foreach ([
      'hero_eyebrow', 'hero_h1', 'hero_lede', 'hero_book_label', 'hero_image_alt',
      'hero_tech_initials', 'hero_tech_name', 'hero_tech_meta',
      'hero_slot_label', 'hero_slot_value', 'hero_slot_note',
      'services_eyebrow', 'services_h2', 'services_intro',
      'steps_eyebrow', 'steps_h2', 'steps_intro',
      'brands_eyebrow', 'brands_h2', 'brands_intro',
      'reviews_eyebrow', 'reviews_h2', 'reviews_intro',
      'faq_eyebrow', 'faq_h2', 'faq_intro',
      'cta_eyebrow', 'cta_h2', 'cta_intro',
    ] as $k) {
      if (isset($h[$k])) hf_demo_set($k, $h[$k], $home_id, $overwrite, $count);
    }

    hf_demo_set('steps',      $d['steps'], $home_id, $overwrite, $count); // num/title/desc/time
    hf_demo_set('brand_wall', hf_demo_rows($d['brands'], 'name'), $home_id, $overwrite, $count);
    hf_demo_set('faq',        $d['faq'],   $home_id, $overwrite, $count); // q/a

    // Reviews block.
    $agg = $d['reviews_agg'];
    hf_demo_set('review_score',   $agg['score'],   $home_id, $overwrite, $count);
    hf_demo_set('review_title',   $agg['title'],   $home_id, $overwrite, $count);
    hf_demo_set('review_sources', $agg['sources'], $home_id, $overwrite, $count); // name/value
    hf_demo_set('reviews',        $d['reviews'],   $home_id, $overwrite, $count); // initials/source/text/name/meta

    // Commercial teaser.
    $cm = $d['commercial'];
    hf_demo_set('com_eyebrow',     $cm['eyebrow'],     $home_id, $overwrite, $count);
    hf_demo_set('com_h2',          $cm['h2'],          $home_id, $overwrite, $count);
    hf_demo_set('com_intro',       $cm['intro'],       $home_id, $overwrite, $count);
    hf_demo_set('com_features',    hf_demo_rows($cm['features'], 'text'), $home_id, $overwrite, $count);
    hf_demo_set('com_cta_label',   $cm['cta_label'],   $home_id, $overwrite, $count);
    hf_demo_set('com_panel_label', $cm['panel_label'], $home_id, $overwrite, $count);
    hf_demo_set('com_stats',       $cm['stats'],       $home_id, $overwrite, $count); // label/value
  }
}
