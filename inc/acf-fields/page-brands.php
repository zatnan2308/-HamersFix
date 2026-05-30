<?php
/**
 * ACF field group — Brands page (template-brands.php).
 * Empty fields/repeaters fall back to the design defaults in the template.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $d = hf_brands_defaults();

  acf_add_local_field_group([
    'key' => 'group_hf_brands',
    'title' => 'Brands page',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'template-brands.php']]],
    'menu_order' => 0,
    'fields' => [

      ['key' => 'field_hf_br_tab_hero', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_br_note', 'label' => '', 'type' => 'message', 'message' => '⚠️ "Factory-authorized" and the brand/stat counts are marketing claims — confirm each is accurate before publishing.'],
      ['key' => 'field_hf_br_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'placeholder' => $d['hero']['eyebrow']],
      ['key' => 'field_hf_br_hero_h1', 'label' => 'H1 (use <em>)', 'name' => 'hero_h1', 'type' => 'text', 'placeholder' => $d['hero']['h1']],
      ['key' => 'field_hf_br_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_br_hero_img', 'label' => 'Hero image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],
      ['key' => 'field_hf_br_hero_alt', 'label' => 'Hero image alt', 'name' => 'hero_image_alt', 'type' => 'text'],
      ['key' => 'field_hf_br_hero_badge', 'label' => 'Image badge', 'name' => 'hero_badge', 'type' => 'text'],
      ['key' => 'field_hf_br_hero_olbl', 'label' => 'Overlay label', 'name' => 'hero_overlay_lbl', 'type' => 'text'],
      ['key' => 'field_hf_br_hero_otxt', 'label' => 'Overlay text', 'name' => 'hero_overlay_txt', 'type' => 'text'],
      ['key' => 'field_hf_br_hero_stats', 'label' => 'Hero stats', 'name' => 'hero_stats', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add stat', 'sub_fields' => [
        ['key' => 'field_hf_br_hs_n', 'label' => 'Number', 'name' => 'n', 'type' => 'text'],
        ['key' => 'field_hf_br_hs_sup', 'label' => 'Superscript', 'name' => 'sup', 'type' => 'text'],
        ['key' => 'field_hf_br_hs_l', 'label' => 'Label', 'name' => 'l', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_br_tab_scope', 'label' => 'Scope', 'type' => 'tab'],
      ['key' => 'field_hf_br_sc_eyebrow', 'label' => 'Eyebrow', 'name' => 'scope_eyebrow', 'type' => 'text', 'placeholder' => $d['scope']['eyebrow']],
      ['key' => 'field_hf_br_sc_h2', 'label' => 'Heading', 'name' => 'scope_h2', 'type' => 'text', 'placeholder' => $d['scope']['h2']],
      ['key' => 'field_hf_br_sc_intro', 'label' => 'Intro', 'name' => 'scope_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_br_scope', 'label' => 'Scope cards', 'name' => 'scope_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add card', 'sub_fields' => [
        ['key' => 'field_hf_br_sc_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_br_sc_n', 'label' => 'Number', 'name' => 'n', 'type' => 'text'],
        ['key' => 'field_hf_br_sc_sup', 'label' => 'Superscript', 'name' => 'sup', 'type' => 'text'],
        ['key' => 'field_hf_br_sc_l', 'label' => 'Label', 'name' => 'l', 'type' => 'text'],
        ['key' => 'field_hf_br_sc_p', 'label' => 'Description', 'name' => 'p', 'type' => 'textarea', 'rows' => 2],
      ]],

      ['key' => 'field_hf_br_tab_home', 'label' => 'Home brands', 'type' => 'tab'],
      ['key' => 'field_hf_br_hm_eyebrow', 'label' => 'Eyebrow', 'name' => 'home_eyebrow', 'type' => 'text', 'placeholder' => $d['home']['eyebrow']],
      ['key' => 'field_hf_br_hm_h2', 'label' => 'Heading', 'name' => 'home_h2', 'type' => 'text', 'placeholder' => $d['home']['h2']],
      ['key' => 'field_hf_br_hm_intro', 'label' => 'Intro', 'name' => 'home_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_br_home', 'label' => 'Brand cards', 'name' => 'home_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add brand', 'sub_fields' => [
        ['key' => 'field_hf_br_hm_nm', 'label' => 'Name', 'name' => 'nm', 'type' => 'text'],
        ['key' => 'field_hf_br_hm_ds', 'label' => 'Description', 'name' => 'ds', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_br_hm_tags', 'label' => 'Tags', 'name' => 'tags', 'type' => 'text', 'instructions' => 'Comma-separated chips.'],
      ]],

      ['key' => 'field_hf_br_tab_prem', 'label' => 'Premium brands', 'type' => 'tab'],
      ['key' => 'field_hf_br_pr_eyebrow', 'label' => 'Eyebrow', 'name' => 'prem_eyebrow', 'type' => 'text', 'placeholder' => $d['prem']['eyebrow']],
      ['key' => 'field_hf_br_pr_h2', 'label' => 'Heading', 'name' => 'prem_h2', 'type' => 'text', 'placeholder' => $d['prem']['h2']],
      ['key' => 'field_hf_br_pr_intro', 'label' => 'Intro', 'name' => 'prem_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_br_prem', 'label' => 'Premium cards', 'name' => 'prem_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add brand', 'sub_fields' => [
        ['key' => 'field_hf_br_pr_seal', 'label' => 'Seal', 'name' => 'seal', 'type' => 'text', 'instructions' => '⚠️ e.g. "Factory-authorized" — confirm before publishing.'],
        ['key' => 'field_hf_br_pr_nm', 'label' => 'Name', 'name' => 'nm', 'type' => 'text'],
        ['key' => 'field_hf_br_pr_ds', 'label' => 'Description', 'name' => 'ds', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_br_pr_focus', 'label' => 'Focus line', 'name' => 'focus', 'type' => 'text'],
      ]],

      ['key' => 'field_hf_br_tab_com', 'label' => 'Commercial', 'type' => 'tab'],
      ['key' => 'field_hf_br_cm_eyebrow', 'label' => 'Eyebrow', 'name' => 'com_eyebrow', 'type' => 'text', 'placeholder' => $d['com']['eyebrow']],
      ['key' => 'field_hf_br_cm_h2', 'label' => 'Heading', 'name' => 'com_h2', 'type' => 'text', 'placeholder' => $d['com']['h2']],
      ['key' => 'field_hf_br_cm_intro', 'label' => 'Intro', 'name' => 'com_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_br_cm_peyebrow', 'label' => 'Promo eyebrow', 'name' => 'com_promo_eyebrow', 'type' => 'text'],
      ['key' => 'field_hf_br_cm_ph3', 'label' => 'Promo heading', 'name' => 'com_promo_h3', 'type' => 'text'],
      ['key' => 'field_hf_br_cm_pp', 'label' => 'Promo text', 'name' => 'com_promo_p', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_br_cm_plist', 'label' => 'Promo list (one per line)', 'name' => 'com_promo_list', 'type' => 'textarea', 'rows' => 6],
      ['key' => 'field_hf_br_cm_pcta', 'label' => 'Promo CTA label', 'name' => 'com_promo_cta', 'type' => 'text'],
      ['key' => 'field_hf_br_cm_bh3', 'label' => 'Brands heading', 'name' => 'com_brands_h3', 'type' => 'text'],
      ['key' => 'field_hf_br_cm_bmeta', 'label' => 'Brands meta', 'name' => 'com_brands_meta', 'type' => 'text'],
      ['key' => 'field_hf_br_cats', 'label' => 'Brand categories', 'name' => 'com_cats', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add category', 'sub_fields' => [
        ['key' => 'field_hf_br_cat_h4', 'label' => 'Heading', 'name' => 'h4', 'type' => 'text'],
        ['key' => 'field_hf_br_cat_list', 'label' => 'Brands', 'name' => 'list', 'type' => 'text', 'instructions' => 'Comma-separated.'],
      ]],

      ['key' => 'field_hf_br_tab_matrix', 'label' => 'Matrix', 'type' => 'tab'],
      ['key' => 'field_hf_br_mx_eyebrow', 'label' => 'Eyebrow', 'name' => 'matrix_eyebrow', 'type' => 'text', 'placeholder' => $d['matrix']['eyebrow']],
      ['key' => 'field_hf_br_mx_h2', 'label' => 'Heading', 'name' => 'matrix_h2', 'type' => 'text', 'placeholder' => $d['matrix']['h2']],
      ['key' => 'field_hf_br_mx_intro', 'label' => 'Intro', 'name' => 'matrix_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_br_matrix', 'label' => 'Rows', 'name' => 'matrix_rows', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add row', 'sub_fields' => [
        ['key' => 'field_hf_br_mx_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_br_mx_nm', 'label' => 'Appliance', 'name' => 'nm', 'type' => 'text'],
        ['key' => 'field_hf_br_mx_ct', 'label' => 'Count', 'name' => 'ct', 'type' => 'text'],
        ['key' => 'field_hf_br_mx_brands', 'label' => 'Brands (one per line)', 'name' => 'brands', 'type' => 'textarea', 'rows' => 6, 'instructions' => 'Prefix "*" = factory-authorized (★); "+N more" = more link.'],
      ]],

      ['key' => 'field_hf_br_tab_why', 'label' => 'Why us', 'type' => 'tab'],
      ['key' => 'field_hf_br_wh_eyebrow', 'label' => 'Eyebrow', 'name' => 'why_eyebrow', 'type' => 'text', 'placeholder' => $d['why']['eyebrow']],
      ['key' => 'field_hf_br_wh_h2', 'label' => 'Heading', 'name' => 'why_h2', 'type' => 'text', 'placeholder' => $d['why']['h2']],
      ['key' => 'field_hf_br_wh_intro', 'label' => 'Intro', 'name' => 'why_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_br_why', 'label' => 'Cards', 'name' => 'why_cards', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add card', 'sub_fields' => [
        ['key' => 'field_hf_br_wh_num', 'label' => 'Number', 'name' => 'num', 'type' => 'text'],
        ['key' => 'field_hf_br_wh_h3', 'label' => 'Title', 'name' => 'h3', 'type' => 'text'],
        ['key' => 'field_hf_br_wh_p', 'label' => 'Description', 'name' => 'p', 'type' => 'textarea', 'rows' => 2],
        ['key' => 'field_hf_br_wh_list', 'label' => 'Bullets', 'name' => 'list', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add bullet', 'sub_fields' => [
          ['key' => 'field_hf_br_wh_li', 'label' => 'Text', 'name' => 'text', 'type' => 'text'],
        ]],
      ]],

      ['key' => 'field_hf_br_tab_faq', 'label' => 'FAQ', 'type' => 'tab'],
      ['key' => 'field_hf_br_fq_eyebrow', 'label' => 'Eyebrow', 'name' => 'faq_eyebrow', 'type' => 'text', 'placeholder' => $d['faq']['eyebrow']],
      ['key' => 'field_hf_br_fq_h2', 'label' => 'Heading', 'name' => 'faq_h2', 'type' => 'text', 'placeholder' => $d['faq']['h2']],
      ['key' => 'field_hf_br_faq', 'label' => 'Questions', 'name' => 'faq', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add question', 'sub_fields' => [
        ['key' => 'field_hf_br_fq_q', 'label' => 'Question', 'name' => 'q', 'type' => 'text'],
        ['key' => 'field_hf_br_fq_a', 'label' => 'Answer', 'name' => 'a', 'type' => 'textarea', 'rows' => 3],
      ]],

      ['key' => 'field_hf_br_tab_final', 'label' => 'Final CTA', 'type' => 'tab'],
      ['key' => 'field_hf_br_fn_eyebrow', 'label' => 'Eyebrow', 'name' => 'final_eyebrow', 'type' => 'text', 'placeholder' => $d['final']['eyebrow']],
      ['key' => 'field_hf_br_fn_h2', 'label' => 'Heading', 'name' => 'final_h2', 'type' => 'text', 'placeholder' => $d['final']['h2']],
      ['key' => 'field_hf_br_fn_intro', 'label' => 'Intro', 'name' => 'final_intro', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_br_fn_clbl', 'label' => 'Phone card label', 'name' => 'final_card_lbl', 'type' => 'text'],
      ['key' => 'field_hf_br_signals', 'label' => 'Signals', 'name' => 'final_signals', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add signal', 'sub_fields' => [
        ['key' => 'field_hf_br_sig_b', 'label' => 'Bold', 'name' => 'b', 'type' => 'text'],
        ['key' => 'field_hf_br_sig_sub', 'label' => 'Sub', 'name' => 'sub', 'type' => 'text'],
      ]],
    ],
  ]);
});
