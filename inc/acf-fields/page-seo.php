<?php
/**
 * ACF field group — shared SEO (title / description / OG image) for the section
 * page templates. Home and the `service` CPT carry their own SEO fields in
 * their groups; this fills the gap for Commercial / About / Brands / Contact /
 * Service Areas / Appliance Repair Services / Reviews in one place.
 *
 * inc/seo.php already reads these names generically on any singular view, so no
 * template or seo.php change is needed — the fields only need to exist.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;

  $templates = [
    'template-commercial.php',
    'template-about.php',
    'template-brands.php',
    'template-contact.php',
    'template-service-areas.php',
    'template-services.php',
    'template-reviews.php',
  ];
  // ACF location: OR-group — match any of the section page templates.
  $location = [];
  foreach ($templates as $tpl) {
    $location[] = [['param' => 'page_template', 'operator' => '==', 'value' => $tpl]];
  }

  acf_add_local_field_group([
    'key'        => 'group_hf_page_seo',
    'title'      => 'SEO',
    'location'   => $location,
    'menu_order' => 100,
    'position'   => 'side',
    'style'      => 'default',
    'fields'     => [
      ['key' => 'field_hf_pseo_title', 'label' => 'SEO title', 'name' => 'seo_title', 'type' => 'text',
        'instructions' => 'Optional. Empty = the page title + site name. Ignored if Yoast/Rank Math is active.'],
      ['key' => 'field_hf_pseo_desc', 'label' => 'Meta description', 'name' => 'seo_description', 'type' => 'textarea', 'rows' => 2,
        'instructions' => 'Optional. ~150–160 characters. Ignored if an SEO plugin is active.'],
      ['key' => 'field_hf_pseo_img', 'label' => 'Social share image', 'name' => 'seo_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium',
        'instructions' => 'Optional Open Graph / Twitter image for this page.'],
    ],
  ]);
});
