<?php
/**
 * ACF field group — Reviews page (template-reviews.php).
 * Ratings/counts/testimonials are editable placeholders — replace with
 * verified data before publishing.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $d = hf_reviews_defaults();

  acf_add_local_field_group([
    'key' => 'group_hf_reviews',
    'title' => 'Reviews page',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'template-reviews.php']]],
    'menu_order' => 0,
    'fields' => [

      ['key' => 'field_hf_rv_tab_hero', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_rv_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'placeholder' => $d['hero']['eyebrow']],
      ['key' => 'field_hf_rv_hero_h1', 'label' => 'H1 (use <em>)', 'name' => 'hero_h1', 'type' => 'text', 'placeholder' => $d['hero']['h1']],
      ['key' => 'field_hf_rv_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],

      ['key' => 'field_hf_rv_tab_agg', 'label' => 'Aggregate', 'type' => 'tab'],
      ['key' => 'field_hf_rv_note', 'label' => '', 'type' => 'message', 'message' => '⚠️ Score, counts and testimonials are placeholders — replace with verified data before publishing. (aggregateRating schema only emits when you enable it under Theme Settings → Social / SEO with real numbers.)'],
      ['key' => 'field_hf_rv_eyebrow', 'label' => 'Section eyebrow', 'name' => 'reviews_eyebrow', 'type' => 'text'],
      ['key' => 'field_hf_rv_h2', 'label' => 'Section heading', 'name' => 'reviews_h2', 'type' => 'text'],
      ['key' => 'field_hf_rv_intro', 'label' => 'Section intro', 'name' => 'reviews_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_rv_score', 'label' => 'Aggregate score', 'name' => 'review_score', 'type' => 'text', 'placeholder' => $d['agg']['score']],
      ['key' => 'field_hf_rv_title', 'label' => 'Aggregate title', 'name' => 'review_title', 'type' => 'text', 'placeholder' => $d['agg']['title']],
      ['key' => 'field_hf_rv_sources', 'label' => 'Sources', 'name' => 'review_sources', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add source', 'sub_fields' => [
        ['key' => 'field_hf_rv_src_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['key' => 'field_hf_rv_src_val', 'label' => 'Value', 'name' => 'value', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_rv_tab_list', 'label' => 'Testimonials', 'type' => 'tab'],
      ['key' => 'field_hf_rv_reviews', 'label' => 'Testimonials', 'name' => 'reviews', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add review', 'instructions' => 'Empty = design defaults. Add as many as you like.', 'sub_fields' => [
        ['key' => 'field_hf_rv_r_init', 'label' => 'Initials', 'name' => 'initials', 'type' => 'text'],
        ['key' => 'field_hf_rv_r_src', 'label' => 'Source', 'name' => 'source', 'type' => 'text'],
        ['key' => 'field_hf_rv_r_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 3],
        ['key' => 'field_hf_rv_r_name', 'label' => 'Author', 'name' => 'name', 'type' => 'text'],
        ['key' => 'field_hf_rv_r_meta', 'label' => 'Meta', 'name' => 'meta', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_rv_tab_cta', 'label' => 'CTA band', 'type' => 'tab'],
      ['key' => 'field_hf_rv_cta_eyebrow', 'label' => 'Eyebrow', 'name' => 'cta_eyebrow', 'type' => 'text', 'placeholder' => $d['cta']['eyebrow']],
      ['key' => 'field_hf_rv_cta_h2', 'label' => 'Heading', 'name' => 'cta_h2', 'type' => 'text', 'placeholder' => $d['cta']['h2']],
      ['key' => 'field_hf_rv_cta_intro', 'label' => 'Intro', 'name' => 'cta_intro', 'type' => 'textarea', 'rows' => 2],
    ],
  ]);
});
