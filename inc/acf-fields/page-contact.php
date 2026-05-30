<?php
/**
 * ACF field group — Contact page (template-contact.php).
 * Empty fields/repeaters fall back to the design defaults in the template.
 * No contact form by design — channels resolve to tel/mailto/booking from
 * Theme Settings; the hours list and NAP come from Theme Settings too.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $d = hf_contact_defaults();

  $kind_choices = ['call' => 'Call (tel:)', 'book' => 'Book (booking URL)', 'email' => 'Email (mailto:)', 'commercial' => 'Commercial (tel:)'];

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

      ['key' => 'field_hf_ct_tab_chan', 'label' => 'Channels', 'type' => 'tab'],
      ['key' => 'field_hf_ct_channels', 'label' => 'Channel cards', 'name' => 'channels', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add channel',
        'instructions' => 'Kind resolves the link (call/commercial→phone, book→booking URL, email→email) from Theme Settings.',
        'sub_fields' => [
          ['key' => 'field_hf_ct_ch_kind', 'label' => 'Kind', 'name' => 'kind', 'type' => 'select', 'choices' => $kind_choices, 'allow_null' => 1],
          ['key' => 'field_hf_ct_ch_primary', 'label' => 'Primary (highlighted)', 'name' => 'primary', 'type' => 'true_false', 'ui' => 1],
          ['key' => 'field_hf_ct_ch_badge', 'label' => 'Badge', 'name' => 'badge', 'type' => 'text'],
          ['key' => 'field_hf_ct_ch_bstyle', 'label' => 'Badge style', 'name' => 'badge_style', 'type' => 'select', 'choices' => ['' => 'Default', 'cta' => 'Orange'], 'allow_null' => 0],
          ['key' => 'field_hf_ct_ch_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
          ['key' => 'field_hf_ct_ch_h3', 'label' => 'Heading', 'name' => 'h3', 'type' => 'text'],
          ['key' => 'field_hf_ct_ch_ds', 'label' => 'Description', 'name' => 'ds', 'type' => 'textarea', 'rows' => 2],
          ['key' => 'field_hf_ct_ch_action', 'label' => 'Action label', 'name' => 'action', 'type' => 'text', 'instructions' => 'Ignored for call/commercial (shows the phone number).'],
        ],
      ],

      ['key' => 'field_hf_ct_tab_reach', 'label' => 'Reach + info', 'type' => 'tab'],
      ['key' => 'field_hf_ct_reach_eyebrow', 'label' => 'Eyebrow', 'name' => 'reach_eyebrow', 'type' => 'text', 'placeholder' => $d['reach']['eyebrow']],
      ['key' => 'field_hf_ct_reach_h2', 'label' => 'Heading', 'name' => 'reach_h2', 'type' => 'text', 'placeholder' => $d['reach']['h2']],
      ['key' => 'field_hf_ct_reach_sub', 'label' => 'Sub', 'name' => 'reach_sub', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_ct_reach_links', 'label' => 'Reach links', 'name' => 'reach_links', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add link', 'sub_fields' => [
        ['key' => 'field_hf_ct_rl_kind', 'label' => 'Kind', 'name' => 'kind', 'type' => 'select', 'choices' => $kind_choices, 'allow_null' => 1],
        ['key' => 'field_hf_ct_rl_cls', 'label' => 'Style', 'name' => 'cls', 'type' => 'select', 'choices' => ['' => 'Default', '--cta' => 'CTA (orange)', '--g' => 'Green'], 'allow_null' => 0],
        ['key' => 'field_hf_ct_rl_ttl', 'label' => 'Title', 'name' => 'ttl', 'type' => 'text'],
        ['key' => 'field_hf_ct_rl_val', 'label' => 'Value override', 'name' => 'val', 'type' => 'text', 'instructions' => 'Empty = phone/email auto-filled from kind.'],
        ['key' => 'field_hf_ct_rl_ds', 'label' => 'Description', 'name' => 'ds', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_ct_reach_note', 'label' => '"Why no form" note', 'name' => 'reach_note', 'type' => 'textarea', 'rows' => 3, 'instructions' => 'Allows <b> tags.'],
      ['key' => 'field_hf_ct_info_note', 'label' => '', 'type' => 'message', 'message' => 'The hours list, address and phone lines are pulled from <strong>Theme Settings</strong> (single source of truth). Only the labels/notes below are page-specific.'],
      ['key' => 'field_hf_ct_info_hours_h3', 'label' => 'Hours card heading', 'name' => 'info_hours_h3', 'type' => 'text', 'placeholder' => $d['info']['hours_h3']],
      ['key' => 'field_hf_ct_info_hours_note', 'label' => 'Hours card note', 'name' => 'info_hours_note', 'type' => 'text', 'placeholder' => $d['info']['hours_note']],
      ['key' => 'field_hf_ct_info_addr_h3', 'label' => 'Address card heading', 'name' => 'info_addr_h3', 'type' => 'text', 'placeholder' => $d['info']['addr_h3']],
      ['key' => 'field_hf_ct_info_addr_note', 'label' => 'Address note', 'name' => 'info_addr_note', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_ct_info_addr_link', 'label' => 'Address link label', 'name' => 'info_addr_link', 'type' => 'text', 'placeholder' => $d['info']['addr_link']],
      ['key' => 'field_hf_ct_info_lines_h3', 'label' => 'Phone-lines card heading', 'name' => 'info_lines_h3', 'type' => 'text', 'placeholder' => $d['info']['lines_h3']],

      ['key' => 'field_hf_ct_tab_final', 'label' => 'Final CTA', 'type' => 'tab'],
      ['key' => 'field_hf_ct_fin_eyebrow', 'label' => 'Eyebrow', 'name' => 'final_eyebrow', 'type' => 'text', 'placeholder' => $d['final']['eyebrow']],
      ['key' => 'field_hf_ct_fin_h2', 'label' => 'Heading', 'name' => 'final_h2', 'type' => 'text', 'placeholder' => $d['final']['h2']],
      ['key' => 'field_hf_ct_fin_intro', 'label' => 'Intro', 'name' => 'final_intro', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_ct_fin_clbl', 'label' => 'Phone card label', 'name' => 'final_card_lbl', 'type' => 'text'],
    ],
  ]);
});
