<?php
/**
 * HamersFix functions — theme bootstrap.
 *
 * Loads the modular includes in /inc. Each file guards itself with an
 * ABSPATH check and (where relevant) a function_exists() ACF guard, so the
 * theme degrades gracefully when ACF Pro is not active.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

define('HF_VERSION', '1.0.1');
define('HF_DIR', get_template_directory());
define('HF_URI', get_template_directory_uri());

$hf_includes = [
  'inc/defaults.php',        // design default content (single source of truth)
  'inc/helpers.php',         // ACF-or-default accessors, ZIP/hours/services helpers
  'inc/service-defaults.php',// single-service reference content + accessors
  'inc/page-defaults.php',   // Commercial/About/Brands/Contact default content
  'inc/setup.php',           // theme supports, menus, image sizes
  'inc/enqueue.php',         // styles, scripts, fonts, HF_ZIP localization
  'inc/cpt.php',             // `service` custom post type
  'inc/seed.php',            // first-run: create the 6 service posts
  'inc/nav-mega.php',     // primary nav config + Residential mega from CPT
  'inc/zip-checker.php',  // optional AJAX endpoint (client-side is primary)
  'inc/seo.php',          // title/meta/OG/Twitter (yields to SEO plugins)
  'inc/schema.php',       // JSON-LD: LocalBusiness, FAQPage, Service, Breadcrumbs
  'inc/acf.php',          // ACF detection notice, Options page, field groups
  'inc/demo-import.php',  // admin "Demo Data" importer (fill-empty / reset)
  'inc/demo-pages.php',   // demo importer: the 7 section pages
];

foreach ($hf_includes as $hf_file) {
  $hf_path = HF_DIR . '/' . $hf_file;
  if (file_exists($hf_path)) {
    require_once $hf_path;
  }
}
unset($hf_includes, $hf_file, $hf_path);
