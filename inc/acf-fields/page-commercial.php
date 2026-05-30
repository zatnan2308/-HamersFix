<?php
/**
 * ACF field group — Commercial page (template-commercial.php).
 * Empty fields/repeaters fall back to the design defaults in the template.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $d = hf_commercial_defaults();

  acf_add_local_field_group([
    'key' => 'group_hf_com',
    'title' => 'Commercial page',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'template-commercial.php']]],
    'menu_order' => 0,
    'fields' => [

      ['key' => 'field_hf_com_tab_hero', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_com_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'placeholder' => $d['hero']['eyebrow']],
      ['key' => 'field_hf_com_hero_h1', 'label' => 'H1 (use <em>)', 'name' => 'hero_h1', 'type' => 'text', 'placeholder' => $d['hero']['h1']],
      ['key' => 'field_hf_com_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_com_hero_issues', 'label' => 'Issue chips', 'name' => 'hero_issues', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add chip', 'sub_fields' => [
        ['key' => 'field_hf_com_issue', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_com_hero_cta', 'label' => 'Primary CTA label', 'name' => 'hero_cta_label', 'type' => 'text', 'placeholder' => $d['hero']['cta_label']],
      ['key' => 'field_hf_com_hero_note', 'label' => 'Note', 'name' => 'hero_note', 'type' => 'text'],
      ['key' => 'field_hf_com_hero_qpills', 'label' => 'Quick pills', 'name' => 'hero_qpills', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add pill', 'sub_fields' => [
        ['key' => 'field_hf_com_qpill', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_com_hero_img', 'label' => 'Hero image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],
      ['key' => 'field_hf_com_hero_alt', 'label' => 'Hero image alt', 'name' => 'hero_image_alt', 'type' => 'text'],
      ['key' => 'field_hf_com_hero_badge', 'label' => 'Image badge', 'name' => 'hero_badge', 'type' => 'text'],
      ['key' => 'field_hf_com_hero_tlbl', 'label' => 'Image tag label', 'name' => 'hero_tag_lbl', 'type' => 'text'],
      ['key' => 'field_hf_com_hero_th3', 'label' => 'Image tag heading', 'name' => 'hero_tag_h3', 'type' => 'text'],

      ['key' => 'field_hf_com_tab_svc', 'label' => 'Services', 'type' => 'tab'],
      ['key' => 'field_hf_com_svc_eyebrow', 'label' => 'Eyebrow', 'name' => 'services_eyebrow', 'type' => 'text', 'placeholder' => $d['services']['eyebrow']],
      ['key' => 'field_hf_com_svc_h2', 'label' => 'Heading', 'name' => 'services_h2', 'type' => 'text', 'placeholder' => $d['services']['h2']],
      ['key' => 'field_hf_com_svc_intro', 'label' => 'Intro', 'name' => 'services_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_com_svc_cards', 'label' => 'Service cards', 'name' => 'com_services', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add card', 'sub_fields' => [
        ['key' => 'field_hf_com_svc_grad', 'label' => 'Art gradient (CSS)', 'name' => 'gradient', 'type' => 'text'],
        ['key' => 'field_hf_com_svc_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_com_svc_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_com_svc_desc', 'label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_com_svc_chips', 'label' => 'Chips', 'name' => 'chips', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add chip', 'sub_fields' => [
          ['key' => 'field_hf_com_svc_chip', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
        ]],
      ]],

      ['key' => 'field_hf_com_tab_down', 'label' => 'Downtime', 'type' => 'tab'],
      ['key' => 'field_hf_com_down_eyebrow', 'label' => 'Eyebrow', 'name' => 'downtime_eyebrow', 'type' => 'text', 'placeholder' => $d['downtime']['eyebrow']],
      ['key' => 'field_hf_com_down_h2', 'label' => 'Heading', 'name' => 'downtime_h2', 'type' => 'text', 'placeholder' => $d['downtime']['h2']],
      ['key' => 'field_hf_com_down_intro', 'label' => 'Intro', 'name' => 'downtime_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_com_down_cards', 'label' => 'Cards', 'name' => 'downtime', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add card', 'sub_fields' => [
        ['key' => 'field_hf_com_down_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_com_down_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_com_down_desc', 'label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2],
      ]],

      ['key' => 'field_hf_com_tab_trust', 'label' => 'Trust', 'type' => 'tab'],
      ['key' => 'field_hf_com_trust_eyebrow', 'label' => 'Eyebrow', 'name' => 'trust_eyebrow', 'type' => 'text', 'placeholder' => $d['trust']['eyebrow']],
      ['key' => 'field_hf_com_trust_h2', 'label' => 'Heading', 'name' => 'trust_h2', 'type' => 'text', 'placeholder' => $d['trust']['h2']],
      ['key' => 'field_hf_com_trust_intro', 'label' => 'Intro', 'name' => 'trust_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_com_trust_note', 'label' => '', 'type' => 'message', 'message' => '⚠️ Pillar values (rating, $2M policy, etc.) are marketing claims — confirm before publishing.'],
      ['key' => 'field_hf_com_trust_pillars', 'label' => 'Pillars', 'name' => 'trust_pillars', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add pillar', 'sub_fields' => [
        ['key' => 'field_hf_com_pil_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_com_pil_val', 'label' => 'Value', 'name' => 'val', 'type' => 'text'],
        ['key' => 'field_hf_com_pil_lbl', 'label' => 'Label', 'name' => 'lbl', 'type' => 'text'],
        ['key' => 'field_hf_com_pil_sub', 'label' => 'Sub', 'name' => 'sub', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_com_tab_brands', 'label' => 'Brands', 'type' => 'tab'],
      ['key' => 'field_hf_com_br_eyebrow', 'label' => 'Eyebrow', 'name' => 'brands_eyebrow', 'type' => 'text', 'placeholder' => $d['brands']['eyebrow']],
      ['key' => 'field_hf_com_br_h2', 'label' => 'Heading', 'name' => 'brands_h2', 'type' => 'text', 'placeholder' => $d['brands']['h2']],
      ['key' => 'field_hf_com_br_intro', 'label' => 'Intro', 'name' => 'brands_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_com_br_ch3', 'label' => 'Card heading', 'name' => 'brands_card_h3', 'type' => 'text'],
      ['key' => 'field_hf_com_br_cmeta', 'label' => 'Card meta', 'name' => 'brands_card_meta', 'type' => 'text'],
      ['key' => 'field_hf_com_br_list', 'label' => 'Brand list', 'name' => 'brand_list', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add brand', 'sub_fields' => [
        ['key' => 'field_hf_com_br_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_com_br_foot', 'label' => 'Footnote', 'name' => 'brands_footnote', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_com_br_ah4', 'label' => 'Ask heading', 'name' => 'brands_ask_h4', 'type' => 'text'],
      ['key' => 'field_hf_com_br_ap', 'label' => 'Ask text', 'name' => 'brands_ask_p', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_com_br_abtn', 'label' => 'Ask button', 'name' => 'brands_ask_btn', 'type' => 'text'],

      ['key' => 'field_hf_com_tab_proc', 'label' => 'Process', 'type' => 'tab'],
      ['key' => 'field_hf_com_proc_eyebrow', 'label' => 'Eyebrow', 'name' => 'process_eyebrow', 'type' => 'text', 'placeholder' => $d['process']['eyebrow']],
      ['key' => 'field_hf_com_proc_h2', 'label' => 'Heading', 'name' => 'process_h2', 'type' => 'text', 'placeholder' => $d['process']['h2']],
      ['key' => 'field_hf_com_proc_intro', 'label' => 'Intro', 'name' => 'process_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_com_proc_steps', 'label' => 'Steps', 'name' => 'process_steps', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add step', 'sub_fields' => [
        ['key' => 'field_hf_com_proc_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_com_proc_desc', 'label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_com_proc_tag', 'label' => 'Tag', 'name' => 'tag', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_com_tab_areas', 'label' => 'Local coverage', 'type' => 'tab'],
      ['key' => 'field_hf_com_ar_eyebrow', 'label' => 'Eyebrow', 'name' => 'areas_eyebrow', 'type' => 'text', 'placeholder' => $d['areas']['eyebrow']],
      ['key' => 'field_hf_com_ar_h2', 'label' => 'Heading', 'name' => 'areas_h2', 'type' => 'text', 'placeholder' => $d['areas']['h2']],
      ['key' => 'field_hf_com_ar_intro', 'label' => 'Intro', 'name' => 'areas_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_com_ar_cards', 'label' => 'Area cards', 'name' => 'area_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add area', 'sub_fields' => [
        ['key' => 'field_hf_com_ar_num', 'label' => 'Number/label', 'name' => 'num', 'type' => 'text'],
        ['key' => 'field_hf_com_ar_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
        ['key' => 'field_hf_com_ar_cities', 'label' => 'Cities', 'name' => 'cities', 'type' => 'text'],
        ['key' => 'field_hf_com_ar_link', 'label' => 'Link label', 'name' => 'link', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_com_ar_note', 'label' => 'CTA bold', 'name' => 'areas_cta_note', 'type' => 'text'],
      ['key' => 'field_hf_com_ar_text', 'label' => 'CTA text', 'name' => 'areas_cta_text', 'type' => 'text'],

      ['key' => 'field_hf_com_tab_faq', 'label' => 'FAQ', 'type' => 'tab'],
      ['key' => 'field_hf_com_faq_eyebrow', 'label' => 'Eyebrow', 'name' => 'faq_eyebrow', 'type' => 'text', 'placeholder' => $d['faq']['eyebrow']],
      ['key' => 'field_hf_com_faq_h2', 'label' => 'Heading', 'name' => 'faq_h2', 'type' => 'text', 'placeholder' => $d['faq']['h2']],
      ['key' => 'field_hf_com_faq_intro', 'label' => 'Intro', 'name' => 'faq_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_com_faq', 'label' => 'Questions', 'name' => 'faq', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add question', 'sub_fields' => [
        ['key' => 'field_hf_com_faq_q', 'label' => 'Question', 'name' => 'q', 'type' => 'text'],
        ['key' => 'field_hf_com_faq_a', 'label' => 'Answer', 'name' => 'a', 'type' => 'textarea', 'rows' => 3],
      ]],

      ['key' => 'field_hf_com_tab_final', 'label' => 'Final CTA', 'type' => 'tab'],
      ['key' => 'field_hf_com_fin_eyebrow', 'label' => 'Eyebrow', 'name' => 'final_eyebrow', 'type' => 'text', 'placeholder' => $d['final']['eyebrow']],
      ['key' => 'field_hf_com_fin_h2', 'label' => 'Heading', 'name' => 'final_h2', 'type' => 'text', 'placeholder' => $d['final']['h2']],
      ['key' => 'field_hf_com_fin_intro', 'label' => 'Intro', 'name' => 'final_intro', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_com_fin_clbl', 'label' => 'Phone card label', 'name' => 'final_card_lbl', 'type' => 'text'],
    ],
  ]);
});
