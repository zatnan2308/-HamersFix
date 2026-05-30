<?php
/**
 * ACF field group — Appliance Repair Services landing (template-services.php).
 * The six service cards come from the `service` CPT, not this group.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $d = hf_services_page_defaults();

  acf_add_local_field_group([
    'key' => 'group_hf_services',
    'title' => 'Appliance Repair Services page',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'template-services.php']]],
    'menu_order' => 0,
    'fields' => [

      ['key' => 'field_hf_sv_tab_hero', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_sv_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'placeholder' => $d['hero']['eyebrow']],
      ['key' => 'field_hf_sv_hero_h1', 'label' => 'H1 (use <em>)', 'name' => 'hero_h1', 'type' => 'text', 'placeholder' => $d['hero']['h1']],
      ['key' => 'field_hf_sv_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_sv_hero_book', 'label' => 'Book button label', 'name' => 'hero_book_label', 'type' => 'text', 'placeholder' => $d['hero']['book_label']],

      ['key' => 'field_hf_sv_tab_svc', 'label' => 'Services', 'type' => 'tab'],
      ['key' => 'field_hf_sv_svc_note', 'label' => '', 'type' => 'message', 'message' => 'The six service cards are pulled from the <strong>Services</strong> (CPT). Edit them under Services.'],
      ['key' => 'field_hf_sv_svc_eyebrow', 'label' => 'Eyebrow', 'name' => 'services_eyebrow', 'type' => 'text', 'placeholder' => $d['services']['eyebrow']],
      ['key' => 'field_hf_sv_svc_h2', 'label' => 'Heading', 'name' => 'services_h2', 'type' => 'text', 'placeholder' => $d['services']['h2']],
      ['key' => 'field_hf_sv_svc_intro', 'label' => 'Intro', 'name' => 'services_intro', 'type' => 'textarea', 'rows' => 2],

      ['key' => 'field_hf_sv_tab_steps', 'label' => 'How it works', 'type' => 'tab'],
      ['key' => 'field_hf_sv_steps_eyebrow', 'label' => 'Eyebrow', 'name' => 'steps_eyebrow', 'type' => 'text', 'placeholder' => $d['steps']['eyebrow']],
      ['key' => 'field_hf_sv_steps_h2', 'label' => 'Heading', 'name' => 'steps_h2', 'type' => 'text', 'placeholder' => $d['steps']['h2']],
      ['key' => 'field_hf_sv_steps_intro', 'label' => 'Intro', 'name' => 'steps_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_sv_steps', 'label' => 'Steps', 'name' => 'steps', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add step', 'instructions' => 'Empty = design defaults (same as the homepage).', 'sub_fields' => [
        ['key' => 'field_hf_sv_step_num', 'label' => 'Number', 'name' => 'num', 'type' => 'text'],
        ['key' => 'field_hf_sv_step_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_sv_step_desc', 'label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_sv_step_time', 'label' => 'Time', 'name' => 'time', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_sv_tab_cta', 'label' => 'CTA band', 'type' => 'tab'],
      ['key' => 'field_hf_sv_cta_eyebrow', 'label' => 'Eyebrow', 'name' => 'cta_eyebrow', 'type' => 'text', 'placeholder' => $d['cta']['eyebrow']],
      ['key' => 'field_hf_sv_cta_h2', 'label' => 'Heading', 'name' => 'cta_h2', 'type' => 'text', 'placeholder' => $d['cta']['h2']],
      ['key' => 'field_hf_sv_cta_intro', 'label' => 'Intro', 'name' => 'cta_intro', 'type' => 'textarea', 'rows' => 2],
    ],
  ]);
});
