<?php
/**
 * HamersFix — optional AJAX ZIP coverage endpoint.
 *
 * The PRIMARY checker is client-side (assets/js/zip-checker.js): the ZIP list
 * is public marketing info, so no round-trip is required. This endpoint exists
 * for parity / future use (e.g. logging lookups or hiding the list).
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('wp_ajax_hf_check_zip', 'hf_ajax_check_zip');
add_action('wp_ajax_nopriv_hf_check_zip', 'hf_ajax_check_zip');

function hf_ajax_check_zip() {
  $raw = isset($_REQUEST['zip']) ? wp_unslash($_REQUEST['zip']) : '';
  $zip = preg_replace('/\D+/', '', (string) $raw);
  $d = hf_defaults();

  if (!preg_match('/^\d{5}$/', $zip)) {
    wp_send_json([
      'status'  => 'invalid',
      'message' => hf_opt('zip_invalid', $d['zip_copy']['zip_invalid']),
    ]);
  }

  $covered = in_array($zip, hf_get_flat_service_zips(), true);
  wp_send_json([
    'status'  => $covered ? 'covered' : 'not_covered',
    'message' => $covered
      ? hf_opt('zip_success', $d['zip_copy']['zip_success'])
      : hf_opt('zip_fail', $d['zip_copy']['zip_fail']),
  ]);
}
