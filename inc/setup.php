<?php
/**
 * HamersFix — theme setup: supports, menus, image sizes.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('after_setup_theme', function () {
  load_theme_textdomain('hamersfix', HF_DIR . '/languages');

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('responsive-embeds');
  add_theme_support('customize-selective-refresh-widgets');
  add_theme_support('html5', [
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets',
  ]);

  register_nav_menus([
    'primary'         => __('Primary Menu', 'hamersfix'),
    'footer_services' => __('Footer — Services', 'hamersfix'),
    'footer_areas'    => __('Footer — Areas', 'hamersfix'),
    'footer_company'  => __('Footer — Company', 'hamersfix'),
  ]);

  // Hero is portrait (5:4 desktop / 4:5 source); cards landscape.
  add_image_size('hf-hero', 1100, 1375, true);
  add_image_size('hf-card', 800, 600, true);
});

/** Content width for embeds. */
add_action('after_setup_theme', function () {
  $GLOBALS['content_width'] = 1200;
}, 0);

/** Friendlier image-size labels in the media picker. */
add_filter('image_size_names_choose', function ($sizes) {
  return array_merge($sizes, [
    'hf-hero' => __('Hero (portrait)', 'hamersfix'),
    'hf-card' => __('Card (landscape)', 'hamersfix'),
  ]);
});
