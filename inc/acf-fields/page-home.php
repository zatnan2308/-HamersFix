<?php
/**
 * ACF field group — Homepage (bound to the static front page).
 *
 * Repeaters left empty fall back to the design defaults on the front end
 * (see hf_home_rows / helpers). Set a static front page under
 * Settings → Reading to edit these in the page editor.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $h = hf_defaults()['home'];

  acf_add_local_field_group([
    'key'   => 'group_hf_home',
    'title' => 'Homepage — HamersFix',
    'location' => [[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']]],
    'menu_order' => 0,
    'style' => 'default',
    'fields' => [

      /* ---- Hero ---- */
      ['key' => 'field_hf_h_tab_hero', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'default_value' => $h['hero_eyebrow']],
      ['key' => 'field_hf_hero_h1', 'label' => 'H1 (use <em> for the accent)', 'name' => 'hero_h1', 'type' => 'text', 'default_value' => $h['hero_h1']],
      ['key' => 'field_hf_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3, 'default_value' => $h['hero_lede']],
      ['key' => 'field_hf_hero_call', 'label' => 'Call button label', 'name' => 'hero_call_label', 'type' => 'text', 'instructions' => 'Empty = “Call {phone}”.'],
      ['key' => 'field_hf_hero_book', 'label' => 'Book button label', 'name' => 'hero_book_label', 'type' => 'text', 'default_value' => $h['hero_book_label']],
      ['key' => 'field_hf_hero_img', 'label' => 'Hero image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],
      ['key' => 'field_hf_hero_alt', 'label' => 'Hero image alt', 'name' => 'hero_image_alt', 'type' => 'text', 'default_value' => $h['hero_image_alt']],
      ['key' => 'field_hf_hero_tinit', 'label' => 'Tech initials', 'name' => 'hero_tech_initials', 'type' => 'text', 'default_value' => $h['hero_tech_initials']],
      ['key' => 'field_hf_hero_tname', 'label' => 'Tech name/role', 'name' => 'hero_tech_name', 'type' => 'text', 'default_value' => $h['hero_tech_name']],
      ['key' => 'field_hf_hero_tmeta', 'label' => 'Tech credentials', 'name' => 'hero_tech_meta', 'type' => 'text', 'default_value' => $h['hero_tech_meta']],
      ['key' => 'field_hf_hero_slotl', 'label' => 'Slot label', 'name' => 'hero_slot_label', 'type' => 'text', 'default_value' => $h['hero_slot_label']],
      ['key' => 'field_hf_hero_slotv', 'label' => 'Slot value', 'name' => 'hero_slot_value', 'type' => 'text', 'default_value' => $h['hero_slot_value']],
      ['key' => 'field_hf_hero_slotn', 'label' => 'Slot note', 'name' => 'hero_slot_note', 'type' => 'text', 'default_value' => $h['hero_slot_note']],

      /* ---- Services (cards come from the Services CPT) ---- */
      ['key' => 'field_hf_h_tab_svc', 'label' => 'Services', 'type' => 'tab'],
      ['key' => 'field_hf_svc_eyebrow', 'label' => 'Eyebrow', 'name' => 'services_eyebrow', 'type' => 'text', 'default_value' => $h['services_eyebrow']],
      ['key' => 'field_hf_svc_h2', 'label' => 'Heading', 'name' => 'services_h2', 'type' => 'text', 'default_value' => $h['services_h2']],
      ['key' => 'field_hf_svc_intro', 'label' => 'Intro', 'name' => 'services_intro', 'type' => 'textarea', 'rows' => 2, 'default_value' => $h['services_intro']],
      ['key' => 'field_hf_svc_note', 'label' => '', 'type' => 'message', 'message' => 'The six service cards are pulled from the <strong>Services</strong> (CPT). Add/edit them under Services.'],

      /* ---- How it works ---- */
      ['key' => 'field_hf_h_tab_steps', 'label' => 'How it works', 'type' => 'tab'],
      ['key' => 'field_hf_steps_eyebrow', 'label' => 'Eyebrow', 'name' => 'steps_eyebrow', 'type' => 'text', 'default_value' => $h['steps_eyebrow']],
      ['key' => 'field_hf_steps_h2', 'label' => 'Heading', 'name' => 'steps_h2', 'type' => 'text', 'default_value' => $h['steps_h2']],
      ['key' => 'field_hf_steps_intro', 'label' => 'Intro', 'name' => 'steps_intro', 'type' => 'textarea', 'rows' => 2, 'default_value' => $h['steps_intro']],
      ['key' => 'field_hf_steps', 'label' => 'Steps', 'name' => 'steps', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add step', 'instructions' => 'Empty = design defaults.', 'sub_fields' => [
        ['key' => 'field_hf_step_num', 'label' => 'Number', 'name' => 'num', 'type' => 'text'],
        ['key' => 'field_hf_step_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_step_desc', 'label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_step_time', 'label' => 'Time', 'name' => 'time', 'type' => 'text'],
      ]],

      /* ---- Brands ---- */
      ['key' => 'field_hf_h_tab_brands', 'label' => 'Brands', 'type' => 'tab'],
      ['key' => 'field_hf_brands_eyebrow', 'label' => 'Eyebrow', 'name' => 'brands_eyebrow', 'type' => 'text', 'default_value' => $h['brands_eyebrow']],
      ['key' => 'field_hf_brands_h2', 'label' => 'Heading', 'name' => 'brands_h2', 'type' => 'text', 'default_value' => $h['brands_h2']],
      ['key' => 'field_hf_brands_intro', 'label' => 'Intro', 'name' => 'brands_intro', 'type' => 'textarea', 'rows' => 2, 'default_value' => $h['brands_intro']],
      ['key' => 'field_hf_brand_wall', 'label' => 'Brand wall', 'name' => 'brand_wall', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add brand', 'instructions' => 'Empty = design defaults.', 'sub_fields' => [
        ['key' => 'field_hf_brand_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text'],
      ]],

      /* ---- Reviews ---- */
      ['key' => 'field_hf_h_tab_rev', 'label' => 'Reviews', 'type' => 'tab'],
      ['key' => 'field_hf_rev_note', 'label' => '', 'type' => 'message', 'message' => '⚠️ Ratings, counts and testimonials are placeholders — replace with verified data before publishing.'],
      ['key' => 'field_hf_rev_eyebrow', 'label' => 'Eyebrow', 'name' => 'reviews_eyebrow', 'type' => 'text', 'default_value' => $h['reviews_eyebrow']],
      ['key' => 'field_hf_rev_h2', 'label' => 'Heading', 'name' => 'reviews_h2', 'type' => 'text', 'default_value' => $h['reviews_h2']],
      ['key' => 'field_hf_rev_intro', 'label' => 'Intro', 'name' => 'reviews_intro', 'type' => 'textarea', 'rows' => 2, 'default_value' => $h['reviews_intro']],
      ['key' => 'field_hf_rev_score', 'label' => 'Aggregate score', 'name' => 'review_score', 'type' => 'text'],
      ['key' => 'field_hf_rev_title', 'label' => 'Aggregate title', 'name' => 'review_title', 'type' => 'text'],
      ['key' => 'field_hf_rev_sources', 'label' => 'Sources', 'name' => 'review_sources', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add source', 'sub_fields' => [
        ['key' => 'field_hf_rev_src_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text'],
        ['key' => 'field_hf_rev_src_val', 'label' => 'Value', 'name' => 'value', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_reviews', 'label' => 'Testimonials', 'name' => 'reviews', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add review', 'sub_fields' => [
        ['key' => 'field_hf_r_init', 'label' => 'Initials', 'name' => 'initials', 'type' => 'text'],
        ['key' => 'field_hf_r_src', 'label' => 'Source', 'name' => 'source', 'type' => 'text'],
        ['key' => 'field_hf_r_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 3],
        ['key' => 'field_hf_r_name', 'label' => 'Author', 'name' => 'name', 'type' => 'text'],
        ['key' => 'field_hf_r_meta', 'label' => 'Meta', 'name' => 'meta', 'type' => 'text'],
      ]],

      /* ---- Commercial teaser ---- */
      ['key' => 'field_hf_h_tab_com', 'label' => 'Commercial', 'type' => 'tab'],
      ['key' => 'field_hf_com_eyebrow', 'label' => 'Eyebrow', 'name' => 'com_eyebrow', 'type' => 'text', 'default_value' => hf_defaults()['commercial']['eyebrow']],
      ['key' => 'field_hf_com_h2', 'label' => 'Heading', 'name' => 'com_h2', 'type' => 'text', 'default_value' => hf_defaults()['commercial']['h2']],
      ['key' => 'field_hf_com_intro', 'label' => 'Intro', 'name' => 'com_intro', 'type' => 'textarea', 'rows' => 2, 'default_value' => hf_defaults()['commercial']['intro']],
      ['key' => 'field_hf_com_features', 'label' => 'Features', 'name' => 'com_features', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add feature', 'sub_fields' => [
        ['key' => 'field_hf_com_feat', 'label' => 'Feature', 'name' => 'text', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_com_cta_label', 'label' => 'CTA label', 'name' => 'com_cta_label', 'type' => 'text', 'default_value' => hf_defaults()['commercial']['cta_label']],
      ['key' => 'field_hf_com_cta_url', 'label' => 'CTA URL', 'name' => 'com_cta_url', 'type' => 'text', 'instructions' => 'Empty = booking URL.'],
      ['key' => 'field_hf_com_panel', 'label' => 'Panel label', 'name' => 'com_panel_label', 'type' => 'text', 'default_value' => hf_defaults()['commercial']['panel_label']],
      ['key' => 'field_hf_com_stats', 'label' => 'Panel stats', 'name' => 'com_stats', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add stat', 'sub_fields' => [
        ['key' => 'field_hf_com_stat_l', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
        ['key' => 'field_hf_com_stat_v', 'label' => 'Value', 'name' => 'value', 'type' => 'text'],
      ]],

      /* ---- FAQ ---- */
      ['key' => 'field_hf_h_tab_faq', 'label' => 'FAQ', 'type' => 'tab'],
      ['key' => 'field_hf_faq_eyebrow', 'label' => 'Eyebrow', 'name' => 'faq_eyebrow', 'type' => 'text', 'default_value' => $h['faq_eyebrow']],
      ['key' => 'field_hf_faq_h2', 'label' => 'Heading', 'name' => 'faq_h2', 'type' => 'text', 'default_value' => $h['faq_h2']],
      ['key' => 'field_hf_faq_intro', 'label' => 'Intro', 'name' => 'faq_intro', 'type' => 'textarea', 'rows' => 2, 'default_value' => $h['faq_intro']],
      ['key' => 'field_hf_faq', 'label' => 'Questions', 'name' => 'faq', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add question', 'instructions' => 'Empty = design defaults. Also powers FAQ schema.', 'sub_fields' => [
        ['key' => 'field_hf_faq_q', 'label' => 'Question', 'name' => 'q', 'type' => 'text'],
        ['key' => 'field_hf_faq_a', 'label' => 'Answer', 'name' => 'a', 'type' => 'textarea', 'rows' => 3],
      ]],

      /* ---- CTA band ---- */
      ['key' => 'field_hf_h_tab_cta', 'label' => 'CTA band', 'type' => 'tab'],
      ['key' => 'field_hf_cta_eyebrow', 'label' => 'Eyebrow', 'name' => 'cta_eyebrow', 'type' => 'text', 'default_value' => $h['cta_eyebrow']],
      ['key' => 'field_hf_cta_h2', 'label' => 'Heading', 'name' => 'cta_h2', 'type' => 'text', 'default_value' => $h['cta_h2']],
      ['key' => 'field_hf_cta_intro', 'label' => 'Intro', 'name' => 'cta_intro', 'type' => 'textarea', 'rows' => 2, 'default_value' => $h['cta_intro']],

      /* ---- SEO ---- */
      ['key' => 'field_hf_h_tab_seo', 'label' => 'SEO', 'type' => 'tab'],
      ['key' => 'field_hf_h_seo_title', 'label' => 'SEO title', 'name' => 'seo_title', 'type' => 'text'],
      ['key' => 'field_hf_h_seo_desc', 'label' => 'Meta description', 'name' => 'seo_description', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_h_seo_img', 'label' => 'OG image', 'name' => 'seo_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],
    ],
  ]);
});
