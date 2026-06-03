<?php
/**
 * ACF field group — Theme Settings (Options page).
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;
  $d = hf_defaults();

  acf_add_local_field_group([
    'key'    => 'group_hf_options',
    'title'  => 'Theme Settings — HamersFix',
    'location' => [[['param' => 'options_page', 'operator' => '==', 'value' => 'hf-theme-settings']]],
    'menu_order' => 0,
    'style'  => 'default',
    'fields' => [

      /* ---- Identity ---- */
      ['key' => 'field_hf_tab_identity', 'label' => 'Identity', 'type' => 'tab', 'placement' => 'top'],
      ['key' => 'field_hf_site_title',   'label' => 'Site title', 'name' => 'site_title', 'type' => 'text', 'default_value' => $d['identity']['site_title']],
      ['key' => 'field_hf_site_tagline', 'label' => 'Tagline', 'name' => 'site_tagline', 'type' => 'text', 'default_value' => $d['identity']['site_tagline']],
      ['key' => 'field_hf_logo',         'label' => 'Logo', 'name' => 'logo', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium', 'instructions' => 'If empty, the “HF” mark + name is shown (as in the design).'],
      ['key' => 'field_hf_logo_mark',    'label' => 'Logo mark text', 'name' => 'logo_mark_text', 'type' => 'text', 'default_value' => $d['identity']['logo_mark_text'], 'maxlength' => 3],
      ['key' => 'field_hf_favicon',      'label' => 'Favicon', 'name' => 'favicon', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail'],
      ['key' => 'field_hf_serving',      'label' => 'Serving area (topline)', 'name' => 'serving_area', 'type' => 'text', 'default_value' => $d['identity']['serving_area']],
      ['key' => 'field_hf_license',      'label' => 'License line', 'name' => 'license_text', 'type' => 'text', 'default_value' => $d['identity']['license_text']],

      /* ---- Contact / NAP ---- */
      ['key' => 'field_hf_tab_contact',  'label' => 'Contact / NAP', 'type' => 'tab'],
      ['key' => 'field_hf_phone_display','label' => 'Phone (display)', 'name' => 'phone_display', 'type' => 'text', 'default_value' => $d['contact']['phone_display']],
      ['key' => 'field_hf_phone_link',   'label' => 'Phone (tel:)', 'name' => 'phone_link', 'type' => 'text', 'default_value' => $d['contact']['phone_link'], 'instructions' => 'E.g. +17706014241. If empty, derived from the display number.'],
      ['key' => 'field_hf_email',        'label' => 'Email', 'name' => 'email', 'type' => 'email', 'default_value' => $d['contact']['email']],
      ['key' => 'field_hf_addr_street',  'label' => 'Street address', 'name' => 'address_street', 'type' => 'text', 'instructions' => 'Leave empty if not public.'],
      ['key' => 'field_hf_addr_csz',     'label' => 'City, State ZIP', 'name' => 'address_city_state_zip', 'type' => 'text', 'default_value' => $d['contact']['address_city_state_zip']],
      ['key' => 'field_hf_booking',      'label' => 'Booking URL', 'name' => 'booking_url', 'type' => 'url', 'instructions' => 'External booking service. All “Book online” buttons use this.'],
      ['key' => 'field_hf_greviews',     'label' => 'Google reviews URL', 'name' => 'google_reviews_url', 'type' => 'url'],

      /* ---- Hours ---- */
      ['key' => 'field_hf_tab_hours',    'label' => 'Hours', 'type' => 'tab'],
      ['key' => 'field_hf_hours_short',  'label' => 'Topline hours text', 'name' => 'hours_short', 'type' => 'text', 'default_value' => $d['hours_short']],
      ['key' => 'field_hf_hours', 'label' => 'Hours rows', 'name' => 'hours', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add day', 'sub_fields' => [
        ['key' => 'field_hf_hours_label',  'label' => 'Label', 'name' => 'label', 'type' => 'text'],
        ['key' => 'field_hf_hours_open',   'label' => 'Open', 'name' => 'open', 'type' => 'text'],
        ['key' => 'field_hf_hours_close',  'label' => 'Close', 'name' => 'close', 'type' => 'text'],
        ['key' => 'field_hf_hours_closed', 'label' => 'Closed', 'name' => 'closed', 'type' => 'true_false', 'ui' => 1],
      ]],

      /* ---- Service Area / ZIP ---- */
      ['key' => 'field_hf_tab_area', 'label' => 'Service Area / ZIP', 'type' => 'tab'],
      ['key' => 'field_hf_zips', 'label' => 'Service ZIPs', 'name' => 'service_zips', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add city',
        'instructions' => 'Single source of truth for the ZIP checker, area lists, footer and schema. Multiple ZIPs per city: comma-separated.',
        'sub_fields' => [
          ['key' => 'field_hf_zip_city',  'label' => 'City', 'name' => 'city', 'type' => 'text'],
          ['key' => 'field_hf_zip_codes', 'label' => 'ZIP code(s)', 'name' => 'zips', 'type' => 'text'],
        ]],
      ['key' => 'field_hf_stat_cities', 'label' => 'Stat: cities', 'name' => 'stat_cities', 'type' => 'number', 'instructions' => 'Leave empty to auto-count from the rows above.'],
      ['key' => 'field_hf_stat_zips',   'label' => 'Stat: ZIPs', 'name' => 'stat_zips', 'type' => 'number', 'instructions' => 'Leave empty to auto-count.'],

      /* ---- ZIP checker copy ---- */
      ['key' => 'field_hf_tab_zipcopy', 'label' => 'ZIP checker copy', 'type' => 'tab'],
      ['key' => 'field_hf_zip_label',   'label' => 'Label', 'name' => 'zip_label', 'type' => 'text', 'default_value' => $d['zip_copy']['zip_label']],
      ['key' => 'field_hf_zip_ph',      'label' => 'Placeholder', 'name' => 'zip_placeholder', 'type' => 'text', 'default_value' => $d['zip_copy']['zip_placeholder']],
      ['key' => 'field_hf_zip_hint',    'label' => 'Hint', 'name' => 'zip_hint', 'type' => 'text', 'instructions' => 'Leave empty to auto-build from the city count.'],
      ['key' => 'field_hf_zip_success', 'label' => 'Success message', 'name' => 'zip_success', 'type' => 'text', 'default_value' => $d['zip_copy']['zip_success']],
      ['key' => 'field_hf_zip_fail',    'label' => 'Not-covered message', 'name' => 'zip_fail', 'type' => 'text', 'default_value' => $d['zip_copy']['zip_fail']],
      ['key' => 'field_hf_zip_invalid', 'label' => 'Invalid message', 'name' => 'zip_invalid', 'type' => 'text', 'default_value' => $d['zip_copy']['zip_invalid']],

      /* ---- Trust badges + mega promo ---- */
      ['key' => 'field_hf_tab_trust', 'label' => 'Trust / Mega', 'type' => 'tab'],
      ['key' => 'field_hf_trust_note', 'label' => '', 'type' => 'message', 'message' => '⚠️ Marketing claims — confirm each badge is accurate before publishing.'],
      ['key' => 'field_hf_trust', 'label' => 'Trust badges', 'name' => 'trust_badges', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add badge', 'sub_fields' => [
        ['key' => 'field_hf_trust_ic',    'label' => 'Icon text', 'name' => 'icon_text', 'type' => 'text'],
        ['key' => 'field_hf_trust_style', 'label' => 'Style', 'name' => 'icon_style', 'type' => 'select', 'choices' => ['default' => 'Default', 'green' => 'Green', 'orange' => 'Orange'], 'default_value' => 'default'],
        ['key' => 'field_hf_trust_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_mega_promo_title', 'label' => 'Mega promo title', 'name' => 'mega_promo_title', 'type' => 'text', 'default_value' => "Not sure what's broken?"],
      ['key' => 'field_hf_mega_promo_text',  'label' => 'Mega promo text', 'name' => 'mega_promo_text', 'type' => 'textarea', 'rows' => 2, 'default_value' => "Call our dispatcher. We'll triage your appliance and quote a flat-rate diagnostic in under 60 seconds."],

      /* ---- Offers (discount / diagnostic / warranty) ---- */
      ['key' => 'field_hf_tab_offers', 'label' => 'Offers', 'type' => 'tab'],
      ['key' => 'field_hf_offer_note', 'label' => '', 'type' => 'message', 'message' => 'Veteran/senior discount, diagnostic pricing and the repair-warranty wording. These appear in the topline, the home hero and the service-page heroes.'],
      ['key' => 'field_hf_discount_text',  'label' => 'Discount — short (topline)', 'name' => 'discount_text', 'type' => 'text', 'default_value' => $d['offers']['discount_text'], 'instructions' => 'Shown in the top bar on every page. Leave empty to hide.'],
      ['key' => 'field_hf_discount_long',  'label' => 'Discount — long (home hero)', 'name' => 'discount_text_long', 'type' => 'text', 'default_value' => $d['offers']['discount_text_long'], 'instructions' => 'Shown under the buttons in the home hero. Leave empty to hide.'],
      ['key' => 'field_hf_diag_price',     'label' => 'Diagnostic price', 'name' => 'diag_price', 'type' => 'text', 'default_value' => $d['offers']['diag_price']],
      ['key' => 'field_hf_diag_combo',     'label' => 'Combo diagnostic price', 'name' => 'diag_combo_price', 'type' => 'text', 'default_value' => $d['offers']['diag_combo_price'], 'instructions' => 'For Stackable Washer/Dryer (Washer, Dryer pages) and Microwave/Oven (Oven page).'],
      ['key' => 'field_hf_diag_note',      'label' => 'Diagnostic note', 'name' => 'diag_note', 'type' => 'text', 'default_value' => $d['offers']['diag_note'], 'instructions' => 'Use %s where the price goes. Shown under the buttons on each repair page.'],
      ['key' => 'field_hf_warranty_text',  'label' => 'Repair warranty wording', 'name' => 'warranty_text', 'type' => 'text', 'default_value' => $d['offers']['warranty_text'], 'instructions' => 'Our HamersFix repair warranty (e.g. “3-month parts & labor warranty”).'],

      /* ---- Footer ---- */
      ['key' => 'field_hf_tab_footer', 'label' => 'Footer', 'type' => 'tab'],
      ['key' => 'field_hf_foot_services', 'label' => 'Footer — Services', 'name' => 'footer_services', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add link', 'sub_fields' => [
        ['key' => 'field_hf_fs_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
        ['key' => 'field_hf_fs_url',   'label' => 'URL', 'name' => 'url', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_foot_company', 'label' => 'Footer — Company', 'name' => 'footer_company', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add link', 'sub_fields' => [
        ['key' => 'field_hf_fcom_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
        ['key' => 'field_hf_fcom_url',   'label' => 'URL', 'name' => 'url', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_foot_legal', 'label' => 'Footer — Legal links', 'name' => 'footer_legal_links', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add link', 'sub_fields' => [
        ['key' => 'field_hf_fl_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text'],
        ['key' => 'field_hf_fl_url',   'label' => 'URL', 'name' => 'url', 'type' => 'text'],
      ]],
      ['key' => 'field_hf_credit_text', 'label' => 'Credit text', 'name' => 'footer_credit_text', 'type' => 'text', 'default_value' => $d['footer']['credit_text']],
      ['key' => 'field_hf_credit_url',  'label' => 'Credit URL', 'name' => 'footer_credit_url', 'type' => 'url', 'default_value' => $d['footer']['credit_url']],
      ['key' => 'field_hf_copyright',   'label' => 'Copyright', 'name' => 'copyright', 'type' => 'text', 'default_value' => $d['footer']['copyright'], 'instructions' => 'Use {year} for the current year.'],

      /* ---- Social / SEO ---- */
      ['key' => 'field_hf_tab_seo', 'label' => 'Social / SEO', 'type' => 'tab'],
      ['key' => 'field_hf_social', 'label' => 'Social profiles', 'name' => 'social', 'type' => 'repeater', 'layout' => 'table', 'button_label' => 'Add profile', 'sub_fields' => [
        ['key' => 'field_hf_social_net', 'label' => 'Network', 'name' => 'network', 'type' => 'select', 'choices' => ['facebook' => 'Facebook', 'instagram' => 'Instagram', 'x' => 'X / Twitter', 'youtube' => 'YouTube', 'linkedin' => 'LinkedIn', 'google' => 'Google', 'yelp' => 'Yelp'], 'allow_null' => 1],
        ['key' => 'field_hf_social_url', 'label' => 'URL', 'name' => 'url', 'type' => 'url'],
      ]],
      ['key' => 'field_hf_default_desc', 'label' => 'Default meta description', 'name' => 'default_description', 'type' => 'textarea', 'rows' => 2],
      ['key' => 'field_hf_default_og',   'label' => 'Default OG image', 'name' => 'default_og_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium'],
      ['key' => 'field_hf_biz_type',     'label' => 'Business type (schema)', 'name' => 'business_type', 'type' => 'select', 'choices' => ['LocalBusiness' => 'LocalBusiness', 'HomeAndConstructionBusiness' => 'HomeAndConstructionBusiness'], 'default_value' => 'LocalBusiness'],
      ['key' => 'field_hf_rating_enabled', 'label' => 'Enable aggregateRating', 'name' => 'rating_enabled', 'type' => 'true_false', 'ui' => 1, 'instructions' => 'Only enable with REAL, verifiable numbers.'],
      ['key' => 'field_hf_rating_value', 'label' => 'Rating value', 'name' => 'rating_value', 'type' => 'text', 'conditional_logic' => [[['field' => 'field_hf_rating_enabled', 'operator' => '==', 'value' => '1']]]],
      ['key' => 'field_hf_rating_count', 'label' => 'Rating count', 'name' => 'rating_count', 'type' => 'text', 'conditional_logic' => [[['field' => 'field_hf_rating_enabled', 'operator' => '==', 'value' => '1']]]],
    ],
  ]);
});
