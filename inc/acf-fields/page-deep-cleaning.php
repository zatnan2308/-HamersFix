<?php
/**
 * ACF field group — Appliance Deep Cleaning page (template-deep-cleaning.php).
 * Empty fields/repeaters fall back to the design defaults in the template
 * (hf_deep_cleaning_defaults()).
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $d = hf_deep_cleaning_defaults();

  acf_add_local_field_group([
    'key' => 'group_hf_dc',
    'title' => 'Appliance Deep Cleaning page',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'template-deep-cleaning.php']]],
    'menu_order' => 0,
    'fields' => [

      ['key' => 'field_hf_dc_tab_hero', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_dc_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'placeholder' => $d['hero']['eyebrow']],
      ['key' => 'field_hf_dc_hero_h1', 'label' => 'H1', 'name' => 'hero_h1', 'type' => 'text', 'placeholder' => $d['hero']['h1']],
      ['key' => 'field_hf_dc_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_dc_hero_img', 'label' => 'Hero image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],
      ['key' => 'field_hf_dc_hero_alt', 'label' => 'Hero image alt', 'name' => 'hero_image_alt', 'type' => 'text'],
      ['key' => 'field_hf_dc_hero_badge', 'label' => 'Image badge', 'name' => 'hero_badge_text', 'type' => 'text', 'placeholder' => $d['hero']['badge_text']],
      ['key' => 'field_hf_dc_hero_tsmall', 'label' => 'Image tag label', 'name' => 'hero_tag_small', 'type' => 'text', 'placeholder' => $d['hero']['tag_small']],
      ['key' => 'field_hf_dc_hero_ttext', 'label' => 'Image tag text', 'name' => 'hero_tag_text', 'type' => 'text', 'placeholder' => $d['hero']['tag_text']],
      ['key' => 'field_hf_dc_hero_pills', 'label' => 'Pills', 'name' => 'hero_pills', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add pill', 'sub_fields' => [
        ['key' => 'field_hf_dc_pill_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
        ['key' => 'field_hf_dc_pill_dot', 'label' => 'Dot color', 'name' => 'dot', 'type' => 'select', 'choices' => ['g' => 'Green', 'o' => 'Orange', 'b' => 'Blue'], 'default_value' => 'g'],
      ]],
      ['key' => 'field_hf_dc_hero_trust', 'label' => 'Trust row', 'name' => 'hero_trust', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add item', 'sub_fields' => [
        ['key' => 'field_hf_dc_tr_ic', 'label' => 'Icon (✓ ★ $)', 'name' => 'ic', 'type' => 'text'],
        ['key' => 'field_hf_dc_tr_style', 'label' => 'Style', 'name' => 'style', 'type' => 'select', 'choices' => ['default' => 'Default', 'green' => 'Green', 'orange' => 'Orange'], 'default_value' => 'default'],
        ['key' => 'field_hf_dc_tr_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_dc_tab_svc', 'label' => 'What we clean', 'type' => 'tab'],
      ['key' => 'field_hf_dc_svc_eyebrow', 'label' => 'Eyebrow', 'name' => 'services_eyebrow', 'type' => 'text', 'placeholder' => $d['services']['eyebrow']],
      ['key' => 'field_hf_dc_svc_h2', 'label' => 'Heading', 'name' => 'services_h2', 'type' => 'text', 'placeholder' => $d['services']['h2']],
      ['key' => 'field_hf_dc_svc_intro', 'label' => 'Intro', 'name' => 'services_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_dc_blocks', 'label' => 'Split blocks', 'name' => 'clean_blocks', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add block', 'sub_fields' => [
        ['key' => 'field_hf_dc_b_id', 'label' => 'Anchor id', 'name' => 'id', 'type' => 'text'],
        ['key' => 'field_hf_dc_b_media', 'label' => 'Illustration', 'name' => 'media', 'type' => 'select', 'choices' => ['fridge' => 'Refrigerator', 'oven' => 'Oven'], 'default_value' => 'fridge'],
        ['key' => 'field_hf_dc_b_eyebrow', 'label' => 'Eyebrow', 'name' => 'eyebrow', 'type' => 'text'],
        ['key' => 'field_hf_dc_b_h2', 'label' => 'Heading', 'name' => 'h2', 'type' => 'text'],
        ['key' => 'field_hf_dc_b_sub', 'label' => 'Subheading', 'name' => 'sub', 'type' => 'text'],
        ['key' => 'field_hf_dc_b_price', 'label' => 'Price', 'name' => 'price', 'type' => 'text', 'instructions' => 'e.g. “From $265”. Leave empty to hide.'],
        ['key' => 'field_hf_dc_b_chip', 'label' => 'Chip text', 'name' => 'chip', 'type' => 'text'],
        ['key' => 'field_hf_dc_b_items', 'label' => 'Checklist', 'name' => 'items', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add item', 'sub_fields' => [
          ['key' => 'field_hf_dc_b_item', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
        ]],
        ['key' => 'field_hf_dc_b_cta', 'label' => 'Button label', 'name' => 'cta', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_dc_tab_combo', 'label' => 'Combo', 'type' => 'tab'],
      ['key' => 'field_hf_dc_combo_badge', 'label' => 'Badge', 'name' => 'combo_badge', 'type' => 'text', 'placeholder' => $d['combo']['badge']],
      ['key' => 'field_hf_dc_combo_h2', 'label' => 'Heading', 'name' => 'combo_h2', 'type' => 'text', 'placeholder' => $d['combo']['h2']],
      ['key' => 'field_hf_dc_combo_price', 'label' => 'Price', 'name' => 'combo_price', 'type' => 'text', 'placeholder' => $d['combo']['price'], 'instructions' => 'e.g. “From $430”. Leave empty to hide.'],
      ['key' => 'field_hf_dc_combo_intro', 'label' => 'Intro', 'name' => 'combo_intro', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_dc_combo_ptitle', 'label' => 'Panel title', 'name' => 'combo_panel_title', 'type' => 'text', 'placeholder' => $d['combo']['panel_title']],
      ['key' => 'field_hf_dc_combo_pmeta', 'label' => 'Panel meta', 'name' => 'combo_panel_meta', 'type' => 'text', 'placeholder' => $d['combo']['panel_meta']],
      ['key' => 'field_hf_dc_combo_rows', 'label' => 'Panel rows', 'name' => 'combo_rows', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add row', 'sub_fields' => [
        ['key' => 'field_hf_dc_combo_row', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_dc_tab_why', 'label' => 'Why', 'type' => 'tab'],
      ['key' => 'field_hf_dc_why_eyebrow', 'label' => 'Eyebrow', 'name' => 'why_eyebrow', 'type' => 'text', 'placeholder' => $d['why']['eyebrow']],
      ['key' => 'field_hf_dc_why_h2', 'label' => 'Heading', 'name' => 'why_h2', 'type' => 'text', 'placeholder' => $d['why']['h2']],
      ['key' => 'field_hf_dc_why_intro', 'label' => 'Intro', 'name' => 'why_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_dc_why_cards', 'label' => 'Benefit cards', 'name' => 'why_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add card', 'sub_fields' => [
        ['key' => 'field_hf_dc_why_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_dc_why_h3', 'label' => 'Heading', 'name' => 'h3', 'type' => 'text'],
        ['key' => 'field_hf_dc_why_p', 'label' => 'Text', 'name' => 'p', 'type' => 'textarea', 'rows' => 2],
      ]],

      ['key' => 'field_hf_dc_tab_how', 'label' => 'How it works', 'type' => 'tab'],
      ['key' => 'field_hf_dc_how_eyebrow', 'label' => 'Eyebrow', 'name' => 'how_eyebrow', 'type' => 'text', 'placeholder' => $d['how']['eyebrow']],
      ['key' => 'field_hf_dc_how_h2', 'label' => 'Heading', 'name' => 'how_h2', 'type' => 'text', 'placeholder' => $d['how']['h2']],
      ['key' => 'field_hf_dc_how_intro', 'label' => 'Intro', 'name' => 'how_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_dc_how_steps', 'label' => 'Steps', 'name' => 'how_steps', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add step', 'sub_fields' => [
        ['key' => 'field_hf_dc_step_num', 'label' => 'Number', 'name' => 'num', 'type' => 'text'],
        ['key' => 'field_hf_dc_step_h3', 'label' => 'Heading', 'name' => 'h3', 'type' => 'text'],
        ['key' => 'field_hf_dc_step_p', 'label' => 'Text', 'name' => 'p', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_dc_step_time', 'label' => 'Time chip', 'name' => 'time', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_dc_tab_faq', 'label' => 'FAQ', 'type' => 'tab'],
      ['key' => 'field_hf_dc_faq_eyebrow', 'label' => 'Eyebrow', 'name' => 'faq_eyebrow', 'type' => 'text', 'placeholder' => $d['faq']['eyebrow']],
      ['key' => 'field_hf_dc_faq_h2', 'label' => 'Heading', 'name' => 'faq_h2', 'type' => 'text', 'placeholder' => $d['faq']['h2']],
      ['key' => 'field_hf_dc_faq', 'label' => 'Questions', 'name' => 'faq', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add Q&A', 'sub_fields' => [
        ['key' => 'field_hf_dc_faq_q', 'label' => 'Question', 'name' => 'q', 'type' => 'text'],
        ['key' => 'field_hf_dc_faq_a', 'label' => 'Answer', 'name' => 'a', 'type' => 'textarea', 'rows' => 3],
      ]],

      ['key' => 'field_hf_dc_tab_final', 'label' => 'Final CTA', 'type' => 'tab'],
      ['key' => 'field_hf_dc_final_eyebrow', 'label' => 'Eyebrow', 'name' => 'final_eyebrow', 'type' => 'text', 'placeholder' => $d['final']['eyebrow']],
      ['key' => 'field_hf_dc_final_h2', 'label' => 'Heading', 'name' => 'final_h2', 'type' => 'text', 'placeholder' => $d['final']['h2']],
      ['key' => 'field_hf_dc_final_intro', 'label' => 'Intro', 'name' => 'final_intro', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_dc_final_signals', 'label' => 'Signals', 'name' => 'final_signals', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add signal', 'sub_fields' => [
        ['key' => 'field_hf_dc_sig_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_dc_sig_sub', 'label' => 'Sub', 'name' => 'sub', 'type' => 'text'],
      ]],
    ],
  ]);
});
