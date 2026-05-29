<?php
/**
 * ACF field group — Service Areas page (template-service-areas.php).
 * Empty repeaters fall back to the design defaults in the template.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;

  acf_add_local_field_group([
    'key'   => 'group_hf_sa',
    'title' => 'Service Areas page',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'template-service-areas.php']]],
    'menu_order' => 0,
    'style' => 'default',
    'fields' => [

      ['key' => 'field_hf_sa_tab_hero', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_sa_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'instructions' => 'Empty = “{cities} cities · {zips} ZIPs · same-day”.'],
      ['key' => 'field_hf_sa_hero_h1', 'label' => 'H1 (use <em>)', 'name' => 'hero_h1', 'type' => 'text'],
      ['key' => 'field_hf_sa_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_sa_book_h2', 'label' => 'Booking card heading', 'name' => 'book_h2', 'type' => 'text'],
      ['key' => 'field_hf_sa_book_p', 'label' => 'Booking card text', 'name' => 'book_p', 'type' => 'textarea', 'rows' => 2],

      ['key' => 'field_hf_sa_tab_stats', 'label' => 'Stats', 'type' => 'tab'],
      ['key' => 'field_hf_sa_stat_arrival', 'label' => 'Avg arrival (hr)', 'name' => 'stat_arrival', 'type' => 'text', 'default_value' => '2.4'],
      ['key' => 'field_hf_sa_stat_vans', 'label' => 'Vans on road', 'name' => 'stat_vans', 'type' => 'text', 'default_value' => '8'],
      ['key' => 'field_hf_sa_stat_ontime', 'label' => 'On-time rate (%)', 'name' => 'stat_ontime', 'type' => 'text', 'default_value' => '96'],
      ['key' => 'field_hf_sa_note_stats', 'label' => '', 'type' => 'message', 'message' => 'Cities & ZIP counts are computed automatically from Theme Settings → Service Area.'],

      ['key' => 'field_hf_sa_tab_map', 'label' => 'Map', 'type' => 'tab'],
      ['key' => 'field_hf_sa_map_h2', 'label' => 'Heading', 'name' => 'map_h2', 'type' => 'text'],
      ['key' => 'field_hf_sa_map_intro', 'label' => 'Intro', 'name' => 'map_intro', 'type' => 'textarea', 'rows' => 3],

      ['key' => 'field_hf_sa_tab_regions', 'label' => 'Regions', 'type' => 'tab'],
      ['key' => 'field_hf_sa_cities_h2', 'label' => 'Heading', 'name' => 'cities_h2', 'type' => 'text'],
      ['key' => 'field_hf_sa_cities_intro', 'label' => 'Intro', 'name' => 'cities_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_sa_regions', 'label' => 'Regions', 'name' => 'regions', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add region', 'sub_fields' => [
        ['key' => 'field_hf_sa_r_pill', 'label' => 'Pill', 'name' => 'pill', 'type' => 'text'],
        ['key' => 'field_hf_sa_r_feat', 'label' => 'Featured (dark)', 'name' => 'featured', 'type' => 'true_false', 'ui' => 1],
        ['key' => 'field_hf_sa_r_pillcta', 'label' => 'Orange pill', 'name' => 'pill_cta', 'type' => 'true_false', 'ui' => 1],
        ['key' => 'field_hf_sa_r_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_sa_r_meta', 'label' => 'Meta', 'name' => 'meta', 'type' => 'text'],
        ['key' => 'field_hf_sa_r_cities', 'label' => 'Cities (one per line)', 'name' => 'cities', 'type' => 'textarea', 'rows' => 4],
        ['key' => 'field_hf_sa_r_stats', 'label' => 'Stats', 'name' => 'stats', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add stat', 'sub_fields' => [
          ['key' => 'field_hf_sa_r_stat_l', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
          ['key' => 'field_hf_sa_r_stat_v', 'label' => 'Value', 'name' => 'value', 'type' => 'text'],
        ]],
      ]],

      ['key' => 'field_hf_sa_tab_resp', 'label' => 'Response', 'type' => 'tab'],
      ['key' => 'field_hf_sa_resp_h2', 'label' => 'Heading', 'name' => 'resp_h2', 'type' => 'text'],
      ['key' => 'field_hf_sa_resp_intro', 'label' => 'Intro', 'name' => 'resp_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_sa_zones', 'label' => 'Zones', 'name' => 'zones', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add zone', 'sub_fields' => [
        ['key' => 'field_hf_sa_z_level', 'label' => 'Level', 'name' => 'level', 'type' => 'select', 'choices' => ['fast' => 'Fast', 'med' => 'Medium', 'slow' => 'Slow'], 'default_value' => 'fast'],
        ['key' => 'field_hf_sa_z_lbl', 'label' => 'Label', 'name' => 'lbl', 'type' => 'text'],
        ['key' => 'field_hf_sa_z_time', 'label' => 'Time', 'name' => 'time', 'type' => 'text'],
        ['key' => 'field_hf_sa_z_suffix', 'label' => 'Suffix', 'name' => 'suffix', 'type' => 'text'],
        ['key' => 'field_hf_sa_z_area', 'label' => 'Area', 'name' => 'area', 'type' => 'text'],
        ['key' => 'field_hf_sa_z_desc', 'label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_sa_z_bar', 'label' => 'Bar width (e.g. 85%)', 'name' => 'bar', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_sa_tab_com', 'label' => 'Commercial', 'type' => 'tab'],
      ['key' => 'field_hf_sa_com_h2', 'label' => 'Heading', 'name' => 'com_h2', 'type' => 'text'],
      ['key' => 'field_hf_sa_com_intro', 'label' => 'Intro', 'name' => 'com_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_sa_com_cta', 'label' => 'B2B quote URL', 'name' => 'com_cta_url', 'type' => 'text', 'instructions' => 'Empty = Contact page.'],
      ['key' => 'field_hf_sa_com_features', 'label' => 'Features', 'name' => 'com_features', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add feature', 'sub_fields' => [
        ['key' => 'field_hf_sa_com_feat', 'label' => 'Feature', 'name' => 'text', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_sa_com_stats', 'label' => 'Stats', 'name' => 'com_stats', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add stat', 'sub_fields' => [
        ['key' => 'field_hf_sa_com_k', 'label' => 'Label', 'name' => 'k', 'type' => 'text'],
        ['key' => 'field_hf_sa_com_v', 'label' => 'Value', 'name' => 'v', 'type' => 'text'],
        ['key' => 'field_hf_sa_com_sfx', 'label' => 'Suffix', 'name' => 'suffix', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_sa_tab_faq', 'label' => 'FAQ', 'type' => 'tab'],
      ['key' => 'field_hf_sa_faq_h2', 'label' => 'Heading', 'name' => 'faq_h2', 'type' => 'text'],
      ['key' => 'field_hf_sa_faq', 'label' => 'Questions', 'name' => 'faq', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add question', 'sub_fields' => [
        ['key' => 'field_hf_sa_faq_q', 'label' => 'Question', 'name' => 'q', 'type' => 'text'],
        ['key' => 'field_hf_sa_faq_a', 'label' => 'Answer', 'name' => 'a', 'type' => 'textarea', 'rows' => 3],
      ]],

      ['key' => 'field_hf_sa_tab_final', 'label' => 'Final CTA', 'type' => 'tab'],
      ['key' => 'field_hf_sa_final_h2', 'label' => 'Heading', 'name' => 'final_h2', 'type' => 'text'],
      ['key' => 'field_hf_sa_final_intro', 'label' => 'Intro', 'name' => 'final_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_sa_signals', 'label' => 'Signals', 'name' => 'final_signals', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add signal', 'sub_fields' => [
        ['key' => 'field_hf_sa_sig_b', 'label' => 'Bold', 'name' => 'b', 'type' => 'text'],
        ['key' => 'field_hf_sa_sig_sub', 'label' => 'Sub', 'name' => 'sub', 'type' => 'text'],
      ]],
    ],
  ]);
});
