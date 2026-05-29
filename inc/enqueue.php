<?php
/**
 * HamersFix — styles & scripts.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('wp_enqueue_scripts', function () {
  $uri = HF_URI;
  $ver = HF_VERSION;

  // Google Fonts — same families/weights as the mock.
  wp_enqueue_style(
    'hf-fonts',
    'https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&family=Archivo:wght@600;700;800&family=IBM+Plex+Mono:wght@400;500;600&display=swap',
    [],
    null
  );

  // Design system (verbatim) + theme glue, dependency-ordered.
  wp_enqueue_style('hf-tokens',     "$uri/assets/css/tokens.css",     [], $ver);
  wp_enqueue_style('hf-site',       "$uri/assets/css/site.css",       ['hf-tokens'], $ver);
  wp_enqueue_style('hf-menu',       "$uri/assets/css/menu.css",       ['hf-tokens'], $ver);
  wp_enqueue_style('hf-responsive', "$uri/assets/css/responsive.css", ['hf-tokens', 'hf-site', 'hf-menu'], $ver);
  wp_enqueue_style('hf-theme',      "$uri/assets/css/theme.css",      ['hf-responsive'], $ver);
  wp_enqueue_style('hf-pages',      "$uri/assets/css/pages.css",      ['hf-theme'], $ver);

  // The registered theme stylesheet (header only) loads last.
  wp_enqueue_style('hamersfix', get_stylesheet_uri(), ['hf-pages'], $ver);

  // Scripts — footer, deferred (vanilla, no dependencies).
  wp_enqueue_script('hf-nav',       "$uri/assets/js/nav.js",        [], $ver, true);
  wp_enqueue_script('hf-scrolltop', "$uri/assets/js/scroll-top.js", [], $ver, true);
  wp_enqueue_script('hf-zip',       "$uri/assets/js/zip-checker.js", [], $ver, true);

  // Data for the real ZIP checker.
  $d = hf_defaults();
  wp_localize_script('hf-zip', 'HF_ZIP', [
    'zips'         => hf_get_flat_service_zips(),
    'success'      => hf_opt('zip_success', $d['zip_copy']['zip_success']),
    'fail'         => hf_opt('zip_fail',    $d['zip_copy']['zip_fail']),
    'invalid'      => hf_opt('zip_invalid', $d['zip_copy']['zip_invalid']),
    'bookingUrl'   => hf_booking_url(),
    'phoneDisplay' => hf_phone_display(),
    'phoneLink'    => hf_phone_link(),
  ]);
});

/** Add defer to our front-end scripts. */
add_filter('script_loader_tag', function ($tag, $handle) {
  $deferred = ['hf-nav', 'hf-scrolltop', 'hf-zip'];
  if (in_array($handle, $deferred, true) && strpos($tag, ' defer') === false) {
    $tag = str_replace(' src', ' defer src', $tag);
  }
  return $tag;
}, 10, 2);

/** Preconnect to the Google Fonts hosts. */
add_filter('wp_resource_hints', function ($urls, $relation) {
  if ($relation === 'preconnect') {
    $urls[] = 'https://fonts.googleapis.com';
    $urls[] = ['href' => 'https://fonts.gstatic.com', 'crossorigin'];
  }
  return $urls;
}, 10, 2);
