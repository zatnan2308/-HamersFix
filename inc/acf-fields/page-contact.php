<?php
/**
 * ACF field group — Contact page (template-contact.php).
 * Empty fields/repeaters fall back to the design defaults in the template.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $d = hf_contact_defaults();

  acf_add_local_field_group([
    'key' => 'group_hf_contact',
    'title' => 'Contact page',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'template-contact.php']]],
    'menu_order' => 0,
    'fields' => [

      ['key' => 'field_hf_ct_tab_hero', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_ct_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'placeholder' => $d['hero']['eyebrow']],
      ['key' => 'field_hf_ct_hero_h1', 'label' => 'H1 (use <em>)', 'name' => 'hero_h1', 'type' => 'text', 'placeholder' => $d['hero']['h1']],
      ['key' => 'field_hf_ct_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],

      ['key' => 'field_hf_ct_tab_reach', 'label' => 'Reach cards', 'type' => 'tab'],
      ['key' => 'field_hf_ct_reach_eyebrow', 'label' => 'Eyebrow', 'name' => 'reach_eyebrow', 'type' => 'text', 'placeholder' => $d['reach']['eyebrow']],
      ['key' => 'field_hf_ct_reach_h2', 'label' => 'Heading', 'name' => 'reach_h2', 'type' => 'text', 'placeholder' => $d['reach']['h2']],
      ['key' => 'field_hf_ct_reach_intro', 'label' => 'Intro', 'name' => 'reach_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_ct_reach', 'label' => 'Cards', 'name' => 'reach_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add card',
        'instructions' => 'Kind resolves the link/value: call→tel, text→sms, email→mailto, book→booking URL (all from Theme Settings).',
        'sub_fields' => [
          ['key' => 'field_hf_ct_r_kind', 'label' => 'Kind', 'name' => 'kind', 'type' => 'select', 'choices' => ['call' => 'Call', 'text' => 'Text/SMS', 'email' => 'Email', 'book' => 'Book online'], 'allow_null' => 1],
          ['key' => 'field_hf_ct_r_primary', 'label' => 'Primary (highlighted)', 'name' => 'primary', 'type' => 'true_false', 'ui' => 1],
          ['key' => 'field_hf_ct_r_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
          ['key' => 'field_hf_ct_r_lbl', 'label' => 'Label', 'name' => 'lbl', 'type' => 'text'],
          ['key' => 'field_hf_ct_r_val', 'label' => 'Value override', 'name' => 'val', 'type' => 'text', 'instructions' => 'Leave empty to auto-fill from kind (phone/email).'],
          ['key' => 'field_hf_ct_r_ds', 'label' => 'Description', 'name' => 'ds', 'type' => 'text'],
        ],
      ],

      ['key' => 'field_hf_ct_tab_final', 'label' => 'Final CTA', 'type' => 'tab'],
      ['key' => 'field_hf_ct_fin_eyebrow', 'label' => 'Eyebrow', 'name' => 'final_eyebrow', 'type' => 'text', 'placeholder' => $d['final']['eyebrow']],
      ['key' => 'field_hf_ct_fin_h2', 'label' => 'Heading', 'name' => 'final_h2', 'type' => 'text', 'placeholder' => $d['final']['h2']],
      ['key' => 'field_hf_ct_fin_intro', 'label' => 'Intro', 'name' => 'final_intro', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_ct_fin_clbl', 'label' => 'Phone card label', 'name' => 'final_card_lbl', 'type' => 'text'],
      ['key' => 'field_hf_ct_signals', 'label' => 'Signals', 'name' => 'final_signals', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add signal', 'sub_fields' => [
        ['key' => 'field_hf_ct_sig_b', 'label' => 'Bold', 'name' => 'b', 'type' => 'text'],
        ['key' => 'field_hf_ct_sig_sub', 'label' => 'Sub', 'name' => 'sub', 'type' => 'text'],
      ]],
    ],
  ]);
});
