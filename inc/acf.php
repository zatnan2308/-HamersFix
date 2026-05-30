<?php
/**
 * HamersFix — ACF Pro integration.
 *
 * - Admin notice when ACF Pro is missing (the site still renders via defaults).
 * - Registers the "Theme Settings" options page.
 * - Loads the in-code field groups from inc/acf-fields/.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/** Notice if ACF (Pro) is not active. */
add_action('admin_notices', function () {
  if (function_exists('acf_add_local_field_group')) return;
  if (!current_user_can('activate_plugins')) return;
  echo '<div class="notice notice-warning"><p><strong>HamersFix:</strong> '
    . esc_html__('This theme is built for Advanced Custom Fields PRO. The site still renders with the design defaults, but content becomes editable only after ACF Pro is installed and activated.', 'hamersfix')
    . '</p></div>';
});

/** Register the Theme Settings options page. */
add_action('acf/init', function () {
  if (!function_exists('acf_add_options_page')) return;
  acf_add_options_page([
    'page_title'  => __('Theme Settings', 'hamersfix'),
    'menu_title'  => __('Theme Settings', 'hamersfix'),
    'menu_slug'   => 'hf-theme-settings',
    'capability'  => 'edit_theme_options',
    'icon_url'    => 'dashicons-admin-generic',
    'position'    => 59,
    'redirect'    => false,
    'update_button' => __('Save Settings', 'hamersfix'),
  ]);
});

// Field groups defined in code (each self-guards and hooks acf/init).
foreach (['options-global', 'page-home', 'cpt-service', 'page-service-areas', 'page-commercial', 'page-about', 'page-contact', 'page-brands'] as $hf_group) {
  $hf_path = HF_DIR . '/inc/acf-fields/' . $hf_group . '.php';
  if (file_exists($hf_path)) require_once $hf_path;
}
unset($hf_group, $hf_path);
