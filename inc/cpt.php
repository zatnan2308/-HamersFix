<?php
/**
 * HamersFix — `service` custom post type.
 *
 * One template (single-service.php) drives all residential services. The
 * Residential mega-menu and the homepage services grid are generated from
 * these entries (with a fallback to the design defaults when none exist yet).
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('init', function () {
  $labels = [
    'name'                  => _x('Services', 'post type general name', 'hamersfix'),
    'singular_name'         => _x('Service', 'post type singular name', 'hamersfix'),
    'menu_name'             => _x('Services', 'admin menu', 'hamersfix'),
    'name_admin_bar'        => _x('Service', 'add new on admin bar', 'hamersfix'),
    'add_new'               => __('Add New', 'hamersfix'),
    'add_new_item'          => __('Add New Service', 'hamersfix'),
    'new_item'              => __('New Service', 'hamersfix'),
    'edit_item'             => __('Edit Service', 'hamersfix'),
    'view_item'             => __('View Service', 'hamersfix'),
    'all_items'             => __('All Services', 'hamersfix'),
    'search_items'          => __('Search Services', 'hamersfix'),
    'not_found'             => __('No services found.', 'hamersfix'),
    'not_found_in_trash'    => __('No services found in Trash.', 'hamersfix'),
    'featured_image'        => __('Service image', 'hamersfix'),
    'archives'              => __('Service archives', 'hamersfix'),
  ];

  register_post_type('service', [
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => false,
    'show_in_rest'       => true,
    'menu_position'      => 22,
    'menu_icon'          => 'dashicons-hammer',
    'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
    'rewrite'            => ['slug' => 'services', 'with_front' => false],
    'capability_type'    => 'post',
  ]);
});
