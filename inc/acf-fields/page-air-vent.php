<?php
/**
 * ACF field group — Air Vent Cleaning page (template-air-vent.php).
 * Empty fields/repeaters fall back to the design defaults in the template
 * (hf_air_vent_defaults()).
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $d = hf_air_vent_defaults();

  acf_add_local_field_group([
    'key' => 'group_hf_av',
    'title' => 'Air Vent Cleaning page',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'template-air-vent.php']]],
    'menu_order' => 0,
    'fields' => [

      ['key' => 'field_hf_av_tab_hero', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_av_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'placeholder' => $d['hero']['eyebrow']],
      ['key' => 'field_hf_av_hero_h1', 'label' => 'H1', 'name' => 'hero_h1', 'type' => 'text', 'placeholder' => $d['hero']['h1']],
      ['key' => 'field_hf_av_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_av_hero_price', 'label' => 'Hero "starting at" price', 'name' => 'hero_price_from', 'type' => 'text', 'placeholder' => $d['hero']['price_from'], 'instructions' => 'Leave blank to hide the price tag.'],
      ['key' => 'field_hf_av_hero_img', 'label' => 'Hero image (optional — replaces the animated vent illustration)', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],
      ['key' => 'field_hf_av_hero_alt', 'label' => 'Hero image alt', 'name' => 'hero_image_alt', 'type' => 'text'],
      ['key' => 'field_hf_av_hero_badge', 'label' => 'Image badge', 'name' => 'hero_badge_text', 'type' => 'text', 'placeholder' => $d['hero']['badge_text']],
      ['key' => 'field_hf_av_hero_tsmall', 'label' => 'Image tag label', 'name' => 'hero_tag_small', 'type' => 'text', 'placeholder' => $d['hero']['tag_small']],
      ['key' => 'field_hf_av_hero_ttext', 'label' => 'Image tag text', 'name' => 'hero_tag_text', 'type' => 'text', 'placeholder' => $d['hero']['tag_text']],
      ['key' => 'field_hf_av_hero_trust', 'label' => 'Trust row', 'name' => 'hero_trust', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add item', 'sub_fields' => [
        ['key' => 'field_hf_av_tr_ic', 'label' => 'Icon (✓ ★)', 'name' => 'ic', 'type' => 'text'],
        ['key' => 'field_hf_av_tr_style', 'label' => 'Style', 'name' => 'style', 'type' => 'select', 'choices' => ['default' => 'Default', 'green' => 'Green', 'orange' => 'Orange'], 'default_value' => 'default'],
        ['key' => 'field_hf_av_tr_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_av_tab_incl', 'label' => "What's included", 'type' => 'tab'],
      ['key' => 'field_hf_av_incl_eyebrow', 'label' => 'Eyebrow', 'name' => 'incl_eyebrow', 'type' => 'text', 'placeholder' => $d['included']['eyebrow']],
      ['key' => 'field_hf_av_incl_h2', 'label' => 'Heading', 'name' => 'incl_h2', 'type' => 'text', 'placeholder' => $d['included']['h2']],
      ['key' => 'field_hf_av_incl_intro', 'label' => 'Intro', 'name' => 'incl_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_av_incl_items', 'label' => 'Included items', 'name' => 'incl_items', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add item', 'sub_fields' => [
        ['key' => 'field_hf_av_incl_item', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_av_tab_ben', 'label' => 'Benefits', 'type' => 'tab'],
      ['key' => 'field_hf_av_ben_eyebrow', 'label' => 'Eyebrow', 'name' => 'benefits_eyebrow', 'type' => 'text', 'placeholder' => $d['benefits']['eyebrow']],
      ['key' => 'field_hf_av_ben_h2', 'label' => 'Heading', 'name' => 'benefits_h2', 'type' => 'text', 'placeholder' => $d['benefits']['h2']],
      ['key' => 'field_hf_av_ben_intro', 'label' => 'Intro', 'name' => 'benefits_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_av_ben_cards', 'label' => 'Benefit cards', 'name' => 'benefit_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add card', 'sub_fields' => [
        ['key' => 'field_hf_av_ben_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_av_ben_h3', 'label' => 'Heading', 'name' => 'h3', 'type' => 'text'],
        ['key' => 'field_hf_av_ben_p', 'label' => 'Text', 'name' => 'p', 'type' => 'textarea', 'rows' => 2],
      ]],

      ['key' => 'field_hf_av_tab_prop', 'label' => 'Who we serve', 'type' => 'tab'],
      ['key' => 'field_hf_av_prop_eyebrow', 'label' => 'Eyebrow', 'name' => 'props_eyebrow', 'type' => 'text', 'placeholder' => $d['props']['eyebrow']],
      ['key' => 'field_hf_av_prop_h2', 'label' => 'Heading', 'name' => 'props_h2', 'type' => 'text', 'placeholder' => $d['props']['h2']],
      ['key' => 'field_hf_av_prop_intro', 'label' => 'Intro', 'name' => 'props_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_av_prop_cards', 'label' => 'Property cards', 'name' => 'prop_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add card', 'sub_fields' => [
        ['key' => 'field_hf_av_prop_variant', 'label' => 'Variant', 'name' => 'variant', 'type' => 'select', 'choices' => ['res' => 'Residential', 'com' => 'Commercial'], 'default_value' => 'res'],
        ['key' => 'field_hf_av_prop_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_av_prop_h3', 'label' => 'Heading', 'name' => 'h3', 'type' => 'text'],
        ['key' => 'field_hf_av_prop_p', 'label' => 'Text', 'name' => 'p', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_av_prop_items', 'label' => 'Bullets', 'name' => 'items', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add bullet', 'sub_fields' => [
          ['key' => 'field_hf_av_prop_item', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
        ]],
      ]],

      ['key' => 'field_hf_av_tab_how', 'label' => 'How it works', 'type' => 'tab'],
      ['key' => 'field_hf_av_how_eyebrow', 'label' => 'Eyebrow', 'name' => 'how_eyebrow', 'type' => 'text', 'placeholder' => $d['how']['eyebrow']],
      ['key' => 'field_hf_av_how_h2', 'label' => 'Heading', 'name' => 'how_h2', 'type' => 'text', 'placeholder' => $d['how']['h2']],
      ['key' => 'field_hf_av_how_intro', 'label' => 'Intro', 'name' => 'how_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_av_how_steps', 'label' => 'Steps', 'name' => 'how_steps', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add step', 'sub_fields' => [
        ['key' => 'field_hf_av_step_num', 'label' => 'Number', 'name' => 'num', 'type' => 'text'],
        ['key' => 'field_hf_av_step_h3', 'label' => 'Heading', 'name' => 'h3', 'type' => 'text'],
        ['key' => 'field_hf_av_step_p', 'label' => 'Text', 'name' => 'p', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_av_step_time', 'label' => 'Time chip', 'name' => 'time', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_av_tab_price', 'label' => 'Price callout', 'type' => 'tab'],
      ['key' => 'field_hf_av_price_h3', 'label' => 'Heading', 'name' => 'price_h3', 'type' => 'text', 'placeholder' => $d['price']['h3']],
      ['key' => 'field_hf_av_price_intro', 'label' => 'Intro', 'name' => 'price_intro', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_av_price_fromlbl', 'label' => 'Box "from" label', 'name' => 'price_from_label', 'type' => 'text', 'placeholder' => $d['price']['from_label']],
      ['key' => 'field_hf_av_price_amount', 'label' => 'Box amount', 'name' => 'price_amount', 'type' => 'text', 'placeholder' => $d['price']['amount']],
      ['key' => 'field_hf_av_price_note', 'label' => 'Box note', 'name' => 'price_note', 'type' => 'text', 'placeholder' => $d['price']['note']],
      ['key' => 'field_hf_av_price_cta', 'label' => 'Box button label', 'name' => 'price_cta', 'type' => 'text', 'placeholder' => $d['price']['cta']],

      ['key' => 'field_hf_av_tab_final', 'label' => 'Final CTA', 'type' => 'tab'],
      ['key' => 'field_hf_av_final_eyebrow', 'label' => 'Eyebrow', 'name' => 'final_eyebrow', 'type' => 'text', 'placeholder' => $d['final']['eyebrow']],
      ['key' => 'field_hf_av_final_h2', 'label' => 'Heading', 'name' => 'final_h2', 'type' => 'text', 'placeholder' => $d['final']['h2']],
      ['key' => 'field_hf_av_final_intro', 'label' => 'Intro', 'name' => 'final_intro', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_av_final_signals', 'label' => 'Signals', 'name' => 'final_signals', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add signal', 'sub_fields' => [
        ['key' => 'field_hf_av_sig_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_av_sig_sub', 'label' => 'Sub', 'name' => 'sub', 'type' => 'text'],
      ]],
    ],
  ]);
});
