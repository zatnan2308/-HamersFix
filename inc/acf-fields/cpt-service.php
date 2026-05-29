<?php
/**
 * ACF field group — Service (CPT). Drives the mega-menu, homepage grid and
 * single-service.php. Empty repeaters fall back to design defaults (for the
 * Refrigerator) or hide the section (other appliances).
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;

  acf_add_local_field_group([
    'key'   => 'group_hf_service',
    'title' => 'Service details',
    'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'service']]],
    'menu_order' => 0,
    'style' => 'default',
    'fields' => [

      /* ---- Card / menu ---- */
      ['key' => 'field_hf_s_tab_card', 'label' => 'Card / menu', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_s_icon', 'label' => 'Icon', 'name' => 'icon', 'type' => 'select',
        'choices' => ['fridge' => 'Refrigerator', 'washer' => 'Washer', 'dryer' => 'Dryer', 'dishwasher' => 'Dishwasher', 'oven' => 'Oven', 'cooktop' => 'Cooktop'],
        'allow_null' => 1, 'instructions' => 'Built-in appliance icon for the menu/grid. The “fridge” icon marks the reference service that ships with full default content.'],
      ['key' => 'field_hf_s_short', 'label' => 'Short description (menu)', 'name' => 'short_desc', 'type' => 'text', 'instructions' => 'e.g. “Not cooling · ice maker · leaking”.'],
      ['key' => 'field_hf_s_long', 'label' => 'Long description (card)', 'name' => 'long_desc', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_s_price', 'label' => 'Price note', 'name' => 'price_note', 'type' => 'text'],
      ['key' => 'field_hf_s_jobs', 'label' => 'Job count', 'name' => 'job_count', 'type' => 'text', 'instructions' => '⚠️ Placeholder metric (drawer). Confirm or remove before publishing.'],

      /* ---- Hero ---- */
      ['key' => 'field_hf_s_tab_hero', 'label' => 'Hero', 'type' => 'tab'],
      ['key' => 'field_hf_s_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text', 'default_value' => 'EPA-certified · Same-day available'],
      ['key' => 'field_hf_s_hero_h1', 'label' => 'H1', 'name' => 'hero_h1', 'type' => 'text', 'instructions' => 'Empty = “{Title} across Northeast Georgia”.'],
      ['key' => 'field_hf_s_hero_lede', 'label' => 'Lede', 'name' => 'hero_lede', 'type' => 'textarea', 'rows' => 3],
      ['key' => 'field_hf_s_hero_img', 'label' => 'Hero image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],
      ['key' => 'field_hf_s_hero_badge', 'label' => 'Image badge text', 'name' => 'hero_badge_text', 'type' => 'text'],
      ['key' => 'field_hf_s_hero_tag', 'label' => 'Image tag text', 'name' => 'hero_tag_text', 'type' => 'text'],
      ['key' => 'field_hf_s_epa', 'label' => 'Show EPA 608 badge', 'name' => 'epa_badge', 'type' => 'true_false', 'ui' => 1, 'instructions' => 'Relevant for refrigerant work (fridge, some cooktops).'],
      ['key' => 'field_hf_s_epa_text', 'label' => 'EPA badge text', 'name' => 'epa_text', 'type' => 'text', 'default_value' => 'Refrigerant work, by federal law, requires this. We have it.', 'conditional_logic' => [[['field' => 'field_hf_s_epa', 'operator' => '==', 'value' => '1']]]],

      /* ---- Problems ---- */
      ['key' => 'field_hf_s_tab_prob', 'label' => 'Problems', 'type' => 'tab'],
      ['key' => 'field_hf_s_prob_eyebrow', 'label' => 'Eyebrow', 'name' => 'problems_eyebrow', 'type' => 'text'],
      ['key' => 'field_hf_s_prob_h2', 'label' => 'Heading', 'name' => 'problems_h2', 'type' => 'text'],
      ['key' => 'field_hf_s_prob_intro', 'label' => 'Intro', 'name' => 'problems_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_s_prob', 'label' => 'Problems', 'name' => 'problems', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add problem',
        'instructions' => 'Empty on the Refrigerator = the design’s 12 default cards. Empty on other appliances = section hidden.',
        'sub_fields' => [
          ['key' => 'field_hf_s_prob_icon', 'label' => 'Icon SVG', 'name' => 'icon', 'type' => 'textarea', 'rows' => 2, 'instructions' => 'Paste inline <svg class="ic-stroke">…</svg> markup (optional).'],
          ['key' => 'field_hf_s_prob_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
          ['key' => 'field_hf_s_prob_desc', 'label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2],
        ],
      ],

      /* ---- Types ---- */
      ['key' => 'field_hf_s_tab_type', 'label' => 'Types', 'type' => 'tab'],
      ['key' => 'field_hf_s_type_eyebrow', 'label' => 'Eyebrow', 'name' => 'types_eyebrow', 'type' => 'text'],
      ['key' => 'field_hf_s_type_h2', 'label' => 'Heading', 'name' => 'types_h2', 'type' => 'text'],
      ['key' => 'field_hf_s_type_intro', 'label' => 'Intro', 'name' => 'types_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_s_type', 'label' => 'Types', 'name' => 'types', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add type',
        'instructions' => 'Empty on the Refrigerator = the design’s 8 default cards. Empty on other appliances = section hidden.',
        'sub_fields' => [
          ['key' => 'field_hf_s_type_tag', 'label' => 'Tag', 'name' => 'tag', 'type' => 'text'],
          ['key' => 'field_hf_s_type_meta', 'label' => 'Meta', 'name' => 'meta', 'type' => 'text'],
          ['key' => 'field_hf_s_type_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'],
          ['key' => 'field_hf_s_type_desc', 'label' => 'Description', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2],
          ['key' => 'field_hf_s_type_art', 'label' => 'Art SVG', 'name' => 'art', 'type' => 'textarea', 'rows' => 3, 'instructions' => 'Paste inline <svg>…</svg> art (optional).'],
        ],
      ],

      /* ---- Reviews ---- */
      ['key' => 'field_hf_s_tab_rev', 'label' => 'Reviews', 'type' => 'tab'],
      ['key' => 'field_hf_s_rev_note', 'label' => '', 'type' => 'message', 'message' => '⚠️ Ratings/counts/testimonials are placeholders — replace with verified data before publishing.'],
      ['key' => 'field_hf_s_rev_eyebrow', 'label' => 'Eyebrow', 'name' => 'reviews_eyebrow', 'type' => 'text'],
      ['key' => 'field_hf_s_rev_h2', 'label' => 'Heading', 'name' => 'reviews_h2', 'type' => 'text'],
      ['key' => 'field_hf_s_rev_intro', 'label' => 'Intro', 'name' => 'reviews_intro', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_s_rev_score', 'label' => 'Aggregate score', 'name' => 'review_score', 'type' => 'text'],
      ['key' => 'field_hf_s_rev_title', 'label' => 'Aggregate title', 'name' => 'review_title', 'type' => 'text'],
      ['key' => 'field_hf_s_rev', 'label' => 'Testimonials', 'name' => 'reviews', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add review',
        'sub_fields' => [
          ['key' => 'field_hf_s_rev_init', 'label' => 'Initials', 'name' => 'initials', 'type' => 'text'],
          ['key' => 'field_hf_s_rev_src', 'label' => 'Source', 'name' => 'source', 'type' => 'text'],
          ['key' => 'field_hf_s_rev_text', 'label' => 'Text', 'name' => 'text', 'type' => 'textarea', 'rows' => 3],
          ['key' => 'field_hf_s_rev_name', 'label' => 'Author', 'name' => 'name', 'type' => 'text'],
          ['key' => 'field_hf_s_rev_meta', 'label' => 'Meta', 'name' => 'meta', 'type' => 'text'],
        ],
      ],

      /* ---- FAQ ---- */
      ['key' => 'field_hf_s_tab_faq', 'label' => 'FAQ', 'type' => 'tab'],
      ['key' => 'field_hf_s_faq_eyebrow', 'label' => 'Eyebrow', 'name' => 'faq_eyebrow', 'type' => 'text'],
      ['key' => 'field_hf_s_faq_h2', 'label' => 'Heading', 'name' => 'faq_h2', 'type' => 'text'],
      ['key' => 'field_hf_s_faq', 'label' => 'Questions', 'name' => 'faq', 'type' => 'repeater', 'layout' => 'block', 'button_label' => 'Add question',
        'instructions' => 'Empty on the Refrigerator = the design’s default Q&A. Also powers FAQ schema.',
        'sub_fields' => [
          ['key' => 'field_hf_s_faq_q', 'label' => 'Question', 'name' => 'q', 'type' => 'text'],
          ['key' => 'field_hf_s_faq_a', 'label' => 'Answer', 'name' => 'a', 'type' => 'textarea', 'rows' => 3],
        ],
      ],

      /* ---- SEO ---- */
      ['key' => 'field_hf_s_tab_seo', 'label' => 'SEO', 'type' => 'tab'],
      ['key' => 'field_hf_s_seo_title', 'label' => 'SEO title', 'name' => 'seo_title', 'type' => 'text'],
      ['key' => 'field_hf_s_seo_desc', 'label' => 'Meta description', 'name' => 'seo_description', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_s_seo_img', 'label' => 'OG image', 'name' => 'seo_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],
    ],
  ]);
});
