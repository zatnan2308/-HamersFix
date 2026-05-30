<?php
/**
 * ACF field group — About page (template-about.php).
 * Empty fields/repeaters fall back to the design defaults in the template.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $d = hf_about_defaults();

  acf_add_local_field_group([
    'key' => 'group_hf_about',
    'title' => 'About page',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'template-about.php']]],
    'menu_order' => 0,
    'fields' => [

      ['key' => 'field_hf_ab_tab_hero', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_ab_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'placeholder' => $d['hero']['eyebrow']],
      ['key' => 'field_hf_ab_hero_h1', 'label' => 'H1 (use <em>)', 'name' => 'hero_h1', 'type' => 'text', 'placeholder' => $d['hero']['h1']],
      ['key' => 'field_hf_ab_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_ab_hero_cta', 'label' => 'Primary CTA label', 'name' => 'hero_cta_label', 'type' => 'text', 'placeholder' => $d['hero']['cta_label']],

      ['key' => 'field_hf_ab_tab_who', 'label' => 'Who we are', 'type' => 'tab'],
      ['key' => 'field_hf_ab_who_eyebrow', 'label' => 'Eyebrow', 'name' => 'who_eyebrow', 'type' => 'text', 'placeholder' => $d['who']['eyebrow']],
      ['key' => 'field_hf_ab_who_h2', 'label' => 'Heading', 'name' => 'who_h2', 'type' => 'text', 'placeholder' => $d['who']['h2']],
      ['key' => 'field_hf_ab_who_paras', 'label' => 'Paragraphs', 'name' => 'who_paras', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add paragraph', 'sub_fields' => [
        ['key' => 'field_hf_ab_who_para', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 3],
      ]],
      ['key' => 'field_hf_ab_who_tags', 'label' => 'Tags', 'name' => 'who_tags', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add tag', 'sub_fields' => [
        ['key' => 'field_hf_ab_who_tag', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_ab_who_vlbl', 'label' => 'Panel label', 'name' => 'who_vis_lbl', 'type' => 'text'],
      ['key' => 'field_hf_ab_who_vh3', 'label' => 'Panel heading', 'name' => 'who_vis_h3', 'type' => 'text'],
      ['key' => 'field_hf_ab_who_items', 'label' => 'Panel items', 'name' => 'who_items', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add item', 'sub_fields' => [
        ['key' => 'field_hf_ab_who_it_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_ab_who_it_t', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_ab_who_it_s', 'label' => 'Sub', 'name' => 'sub', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_ab_tab_values', 'label' => 'Values', 'type' => 'tab'],
      ['key' => 'field_hf_ab_val_eyebrow', 'label' => 'Eyebrow', 'name' => 'values_eyebrow', 'type' => 'text', 'placeholder' => $d['values']['eyebrow']],
      ['key' => 'field_hf_ab_val_h2', 'label' => 'Heading', 'name' => 'values_h2', 'type' => 'text', 'placeholder' => $d['values']['h2']],
      ['key' => 'field_hf_ab_val_intro', 'label' => 'Intro', 'name' => 'values_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_ab_values', 'label' => 'Values', 'name' => 'value_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add value', 'sub_fields' => [
        ['key' => 'field_hf_ab_val_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_ab_val_h3', 'label' => 'Title', 'name' => 'h3', 'type' => 'text'],
        ['key' => 'field_hf_ab_val_p', 'label' => 'Description', 'name' => 'p', 'type' => 'textarea', 'rows' => 2],
      ]],

      ['key' => 'field_hf_ab_tab_trust', 'label' => 'Trust', 'type' => 'tab'],
      ['key' => 'field_hf_ab_tr_eyebrow', 'label' => 'Eyebrow', 'name' => 'trust_eyebrow', 'type' => 'text', 'placeholder' => $d['trust']['eyebrow']],
      ['key' => 'field_hf_ab_tr_h2', 'label' => 'Heading', 'name' => 'trust_h2', 'type' => 'text', 'placeholder' => $d['trust']['h2']],
      ['key' => 'field_hf_ab_tr_intro', 'label' => 'Intro', 'name' => 'trust_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_ab_tr_note', 'label' => '', 'type' => 'message', 'message' => '⚠️ Pillar values (rating, $2M, license status) are marketing claims — confirm before publishing.'],
      ['key' => 'field_hf_ab_pillars', 'label' => 'Pillars', 'name' => 'trust_pillars', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add pillar', 'sub_fields' => [
        ['key' => 'field_hf_ab_pil_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_ab_pil_val', 'label' => 'Value', 'name' => 'val', 'type' => 'text'],
        ['key' => 'field_hf_ab_pil_lbl', 'label' => 'Label', 'name' => 'lbl', 'type' => 'text'],
        ['key' => 'field_hf_ab_pil_sub', 'label' => 'Sub', 'name' => 'sub', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_ab_tab_hb', 'label' => 'Homes & businesses', 'type' => 'tab'],
      ['key' => 'field_hf_ab_hb_eyebrow', 'label' => 'Eyebrow', 'name' => 'hb_eyebrow', 'type' => 'text', 'placeholder' => $d['hb']['eyebrow']],
      ['key' => 'field_hf_ab_hb_h2', 'label' => 'Heading', 'name' => 'hb_h2', 'type' => 'text', 'placeholder' => $d['hb']['h2']],
      ['key' => 'field_hf_ab_hb_intro', 'label' => 'Intro', 'name' => 'hb_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_ab_hb_cards', 'label' => 'Cards', 'name' => 'hb_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add card', 'sub_fields' => [
        ['key' => 'field_hf_ab_hb_kind', 'label' => 'Art kind', 'name' => 'kind', 'type' => 'select', 'choices' => ['res' => 'Residential', 'com' => 'Commercial'], 'allow_null' => 1],
        ['key' => 'field_hf_ab_hb_eb', 'label' => 'Eyebrow', 'name' => 'eyebrow', 'type' => 'text'],
        ['key' => 'field_hf_ab_hb_h3', 'label' => 'Title', 'name' => 'h3', 'type' => 'text'],
        ['key' => 'field_hf_ab_hb_p', 'label' => 'Description', 'name' => 'p', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_ab_hb_items', 'label' => 'List items (one per line)', 'name' => 'items', 'type' => 'textarea', 'rows' => 5],
        ['key' => 'field_hf_ab_hb_link', 'label' => 'Link label', 'name' => 'link', 'type' => 'text'],
        ['key' => 'field_hf_ab_hb_url', 'label' => 'Link target', 'name' => 'url_key', 'type' => 'select', 'choices' => ['service' => 'Residential service', 'commercial' => 'Commercial page'], 'allow_null' => 1],
      ]],

      ['key' => 'field_hf_ab_tab_prom', 'label' => 'Promise', 'type' => 'tab'],
      ['key' => 'field_hf_ab_pr_eyebrow', 'label' => 'Eyebrow', 'name' => 'promise_eyebrow', 'type' => 'text', 'placeholder' => $d['promise']['eyebrow']],
      ['key' => 'field_hf_ab_pr_h2', 'label' => 'Heading', 'name' => 'promise_h2', 'type' => 'text', 'placeholder' => $d['promise']['h2']],
      ['key' => 'field_hf_ab_pr_intro', 'label' => 'Intro', 'name' => 'promise_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_ab_promise', 'label' => 'Steps', 'name' => 'promise_steps', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add step', 'sub_fields' => [
        ['key' => 'field_hf_ab_pr_h3', 'label' => 'Title', 'name' => 'h3', 'type' => 'text'],
        ['key' => 'field_hf_ab_pr_p', 'label' => 'Description', 'name' => 'p', 'type' => 'textarea', 'rows' => 2],
      ]],

      ['key' => 'field_hf_ab_tab_areas', 'label' => 'Local areas', 'type' => 'tab'],
      ['key' => 'field_hf_ab_ar_eyebrow', 'label' => 'Eyebrow', 'name' => 'areas_eyebrow', 'type' => 'text', 'placeholder' => $d['areas']['eyebrow']],
      ['key' => 'field_hf_ab_ar_h2', 'label' => 'Heading', 'name' => 'areas_h2', 'type' => 'text', 'placeholder' => $d['areas']['h2']],
      ['key' => 'field_hf_ab_ar_intro', 'label' => 'Intro', 'name' => 'areas_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_ab_ar_cards', 'label' => 'Area cards', 'name' => 'area_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add area', 'sub_fields' => [
        ['key' => 'field_hf_ab_ar_num', 'label' => 'Number/label', 'name' => 'num', 'type' => 'text'],
        ['key' => 'field_hf_ab_ar_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_ab_ar_cities', 'label' => 'Cities', 'name' => 'cities', 'type' => 'text'],
        ['key' => 'field_hf_ab_ar_link', 'label' => 'Link label', 'name' => 'link', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_ab_ar_note', 'label' => 'CTA bold', 'name' => 'areas_cta_note', 'type' => 'text'],
      ['key' => 'field_hf_ab_ar_text', 'label' => 'CTA text', 'name' => 'areas_cta_text', 'type' => 'text'],

      ['key' => 'field_hf_ab_tab_brands', 'label' => 'Brands', 'type' => 'tab'],
      ['key' => 'field_hf_ab_br_eyebrow', 'label' => 'Eyebrow', 'name' => 'brands_eyebrow', 'type' => 'text', 'placeholder' => $d['brands']['eyebrow']],
      ['key' => 'field_hf_ab_br_h2', 'label' => 'Heading', 'name' => 'brands_h2', 'type' => 'text', 'placeholder' => $d['brands']['h2']],
      ['key' => 'field_hf_ab_br_intro', 'label' => 'Intro', 'name' => 'brands_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_ab_br_cols', 'label' => 'Columns', 'name' => 'brand_cols', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add column', 'sub_fields' => [
        ['key' => 'field_hf_ab_br_h3', 'label' => 'Title', 'name' => 'h3', 'type' => 'text'],
        ['key' => 'field_hf_ab_br_sub', 'label' => 'Sub', 'name' => 'sub', 'type' => 'text'],
        ['key' => 'field_hf_ab_br_prem', 'label' => 'Premium style', 'name' => 'prem', 'type' => 'true_false', 'ui' => 1],
        ['key' => 'field_hf_ab_br_list', 'label' => 'Brands (one per line)', 'name' => 'list', 'type' => 'textarea', 'rows' => 6],
      ]],
      ['key' => 'field_hf_ab_br_cta', 'label' => 'CTA label', 'name' => 'brands_cta_label', 'type' => 'text'],
      ['key' => 'field_hf_ab_br_foot', 'label' => 'Footnote', 'name' => 'brands_footnote', 'type' => 'textarea', 'rows' => 2],

      ['key' => 'field_hf_ab_tab_friendly', 'label' => 'Friendly', 'type' => 'tab'],
      ['key' => 'field_hf_ab_fr_eyebrow', 'label' => 'Eyebrow', 'name' => 'friendly_eyebrow', 'type' => 'text', 'placeholder' => $d['friendly']['eyebrow']],
      ['key' => 'field_hf_ab_fr_h2', 'label' => 'Heading', 'name' => 'friendly_h2', 'type' => 'text', 'placeholder' => $d['friendly']['h2']],
      ['key' => 'field_hf_ab_fr_intro', 'label' => 'Intro', 'name' => 'friendly_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_ab_fr_stamp_nm', 'label' => 'Stamp name', 'name' => 'friendly_stamp_nm', 'type' => 'text'],
      ['key' => 'field_hf_ab_fr_stamp_role', 'label' => 'Stamp role', 'name' => 'friendly_stamp_role', 'type' => 'text'],
      ['key' => 'field_hf_ab_fr_items', 'label' => 'Checklist', 'name' => 'friendly_items', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add item', 'sub_fields' => [
        ['key' => 'field_hf_ab_fr_item', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_ab_tab_final', 'label' => 'Final CTA', 'type' => 'tab'],
      ['key' => 'field_hf_ab_fin_eyebrow', 'label' => 'Eyebrow', 'name' => 'final_eyebrow', 'type' => 'text', 'placeholder' => $d['final']['eyebrow']],
      ['key' => 'field_hf_ab_fin_h2', 'label' => 'Heading', 'name' => 'final_h2', 'type' => 'text', 'placeholder' => $d['final']['h2']],
      ['key' => 'field_hf_ab_fin_intro', 'label' => 'Intro', 'name' => 'final_intro', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_ab_fin_clbl', 'label' => 'Phone card label', 'name' => 'final_card_lbl', 'type' => 'text'],
    ],
  ]);
});
