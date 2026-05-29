<?php
/**
 * HamersFix — first-run seeding.
 *
 * On theme activation, create the six `service` posts (idempotent) so the
 * Residential mega-menu and homepage grid link to real pages and the
 * Refrigerator reference page exists. Scalar ACF fields are populated from the
 * design defaults; the Refrigerator's rich sections come from the template
 * defaults / verbatim partials.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('after_switch_theme', 'hf_seed_services');

function hf_seed_services() {
  if (!post_type_exists('service')) return;

  $defs  = hf_defaults()['services'];
  $order = 0;

  foreach ($defs as $s) {
    $slug = sanitize_title($s['title']); // e.g. "refrigerator-repair"
    $existing = get_page_by_path($slug, OBJECT, 'service');
    if ($existing) { $order++; continue; }

    $post_id = wp_insert_post([
      'post_type'   => 'service',
      'post_status' => 'publish',
      'post_title'  => $s['title'],
      'post_name'   => $slug,
      'menu_order'  => $order,
      'post_content'=> '',
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

  flush_rewrite_rules();
}
