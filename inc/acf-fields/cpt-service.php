<?php
/**
 * ACF field group — Service (CPT).
 *
 * Drives the Residential mega-menu and the homepage services grid. The hero/
 * SEO fields are also ready for the upcoming single-service.php template.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;

  acf_add_local_field_group([
    'key'   => 'group_hf_service',
    'title' => 'Service details',
    'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'service']]],
    'menu_order' => 0,
    'style' => 'default',
    'fields' => [

      ['key' => 'field_hf_s_tab_card', 'label' => 'Card / menu', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_s_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'select',
        'choices' => [
          'fridge' => 'Refrigerator', 'washer' => 'Washer', 'dryer' => 'Dryer',
          'dishwasher' => 'Dishwasher', 'oven' => 'Oven', 'cooktop' => 'Cooktop',
        ],
        'allow_null' => 1,
        'instructions' => 'Pick a built-in appliance icon. Leave empty to default to the refrigerator icon.',
      ],
      ['key' => 'field_hf_s_short', 'label' => 'Short description (menu)', 'name' => 'short_desc', 'type' => 'text', 'instructions' => 'e.g. “Not cooling · ice maker · leaking”.'],
      ['key' => 'field_hf_s_long', 'label' => 'Long description (card)', 'name' => 'long_desc', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_s_price', 'label' => 'Price note', 'name' => 'price_note', 'type' => 'text', 'instructions' => 'e.g. “$89 diagnostic — waived with repair”.'],
      ['key' => 'field_hf_s_jobs', 'label' => 'Job count', 'name' => 'job_count', 'type' => 'text', 'instructions' => '⚠️ Placeholder metric (drawer). Confirm or remove before publishing.'],

      ['key' => 'field_hf_s_tab_hero', 'label' => 'Hero (single page)', 'type' => 'tab'],
      ['key' => 'field_hf_s_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'default_value' => 'EPA-certified · Same-day available'],
      ['key' => 'field_hf_s_hero_h1', 'label' => 'H1', 'name' => 'hero_h1', 'type' => 'text'],
      ['key' => 'field_hf_s_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_s_hero_img', 'label' => 'Hero image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],

      ['key' => 'field_hf_s_tab_faq', 'label' => 'FAQ', 'type' => 'tab'],
      ['key' => 'field_hf_s_faq', 'label' => 'Questions', 'name' => 'faq', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add question', 'sub_fields' => [
        ['key' => 'field_hf_s_faq_q', 'label' => 'Question', 'name' => 'q', 'type' => 'text'],
        ['key' => 'field_hf_s_faq_a', 'label' => 'Answer', 'name' => 'a', 'type' => 'textarea', 'rows' => 3],
      ]],

      ['key' => 'field_hf_s_tab_seo', 'label' => 'SEO', 'type' => 'tab'],
      ['key' => 'field_hf_s_seo_title', 'label' => 'SEO title', 'name' => 'seo_title', 'type' => 'text'],
      ['key' => 'field_hf_s_seo_desc', 'label' => 'Meta description', 'name' => 'seo_description', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_s_seo_img', 'label' => 'OG image', 'name' => 'seo_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],
    ],
  ]);
});
