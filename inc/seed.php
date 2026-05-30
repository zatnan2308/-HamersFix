<?php
/**
 * HamersFix — first-run seeding (theme activation).
 *
 * Creates the six `service` posts and the site pages (Home + section pages),
 * assigns page templates, and sets a static front page — all idempotent — so
 * the menus link to real pages and content is editable immediately.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('after_switch_theme', 'hf_seed_all');

function hf_seed_all() {
  hf_seed_services();
  hf_seed_pages();
  flush_rewrite_rules();
}

/** Create the 6 service CPT posts (idempotent). */
function hf_seed_services() {
  if (!post_type_exists('service')) return;

  $defs  = hf_defaults()['services'];
  $order = 0;

  foreach ($defs as $s) {
    $slug = sanitize_title($s['title']); // e.g. "refrigerator-repair"
    $existing = get_page_by_path($slug, OBJECT, 'service');
    if ($existing) { $order++; continue; }

    $post_id = wp_insert_post([
      'post_type'    => 'service',
      'post_status'  => 'publish',
      'post_title'   => $s['title'],
      'post_name'    => $slug,
      'menu_order'   => $order,
      'post_content' => '',
    ]);

    if ($post_id && !is_wp_error($post_id) && function_exists('update_field')) {
      update_field('icon', $s['icon'], $post_id);
      update_field('short_desc', $s['short_desc'], $post_id);
      update_field('long_desc', $s['long_desc'], $post_id);
      update_field('price_note', $s['price_note'], $post_id);
      update_field('job_count', $s['job_count'], $post_id);
    }
    $order++;
  }
}

/** Create Home + section pages, assign templates, set the static front page. */
function hf_seed_pages() {
  // Home → static front page.
  $home = get_page_by_path('home');
  $home_id = $home ? $home->ID : wp_insert_post([
    'post_type' => 'page', 'post_status' => 'publish',
    'post_title' => 'Home', 'post_name' => 'home', 'post_content' => '',
  ]);
  if ($home_id && !is_wp_error($home_id)) {
    if (get_option('show_on_front') !== 'page' || !get_option('page_on_front')) {
      update_option('show_on_front', 'page');
      update_option('page_on_front', (int) $home_id);
    }
  }

  // Section pages with their templates.
  $pages = [
    ['title' => 'Service Areas', 'slug' => 'service-areas', 'tpl' => 'template-service-areas.php'],
    ['title' => 'Commercial',    'slug' => 'commercial',    'tpl' => 'template-commercial.php'],
    ['title' => 'About',         'slug' => 'about',         'tpl' => 'template-about.php'],
    ['title' => 'Brands',        'slug' => 'brands',        'tpl' => 'template-brands.php'],
    ['title' => 'Contact',       'slug' => 'contact',       'tpl' => 'template-contact.php'],
    ['title' => 'Appliance Repair Services', 'slug' => 'appliance-repair-services', 'tpl' => 'template-services.php'],
    ['title' => 'Reviews',       'slug' => 'reviews',       'tpl' => 'template-reviews.php'],
  ];
  foreach ($pages as $p) {
    $existing = get_page_by_path($p['slug']);
    if ($existing) {
      if (get_post_meta($existing->ID, '_wp_page_template', true) !== $p['tpl']) {
        update_post_meta($existing->ID, '_wp_page_template', $p['tpl']);
      }
      continue;
    }
    $id = wp_insert_post([
      'post_type' => 'page', 'post_status' => 'publish',
      'post_title' => $p['title'], 'post_name' => $p['slug'], 'post_content' => '',
    ]);
    if ($id && !is_wp_error($id)) {
      update_post_meta($id, '_wp_page_template', $p['tpl']);
    }
  }
}
