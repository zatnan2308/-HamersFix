<?php
/**
 * HamersFix — service (single) default content.
 *
 * The Refrigerator is the reference service: it ships with full default
 * content so single-service.php renders pixel-perfect to the mock out of the
 * box. The bespoke SVG art for the "problems" and "types" grids lives in
 * verbatim partials (template-parts/svc/*-fridge.php); this file carries the
 * editable text defaults. Other appliances inherit the shared sections
 * (hero/brands/areas/final) and hide problems/types/reviews/faq until filled.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

function hf_service_defaults() {
  static $d = null;
  if ($d !== null) return $d;

  $d = [
    'hero' => [
      'eyebrow'    => 'EPA-certified · Same-day available',
      'lede'       => 'Whether it\'s not cooling, the ice maker stopped, or your Sub-Zero is throwing an error — our EPA Section 608 certified technicians fix all major brands, often the same day.',
      'image'      => 'https://images.unsplash.com/photo-1584346133934-a3afd2a33c4c?w=1100&auto=format&fit=crop&q=80',
      'image_alt'  => 'Modern stainless steel refrigerator with French doors',
      'badge_text' => 'EPA-Certified Tech On Call',
      'tag_small'  => 'Same-day',
      'tag_text'   => 'Refrigerator repair across Northeast GA',
      'epa_text'   => 'Refrigerant work, by federal law, requires this. We have it.',
      'trust' => [
        ['ic' => 'A+', 'style' => 'green',   'label' => 'BBB Accredited'],
        ['ic' => '✓',  'style' => 'green',   'label' => 'Sub-Zero / Wolf factory-authorized'],
        ['ic' => '★',  'style' => 'default', 'label' => '4.9 · 318 fridge reviews'],
        ['ic' => '1y', 'style' => 'default', 'label' => 'Parts & labor warranty'],
      ],
    ],
    'problems' => [
      'eyebrow' => 'Common issues we see weekly',
      'h2'      => 'Refrigerator problems we repair',
      'intro'   => 'The most frequent failures we get called for in Northeast Georgia, in rough order of frequency. Most are fixed in a single same-day visit using parts we carry on the van.',
    ],
    'types' => [
      'eyebrow' => 'Pick your style',
      'h2'      => 'Which refrigerator type do you have?',
      'intro'   => 'We repair all major refrigerator configurations — from a compact under-counter unit to a 48-inch built-in Sub-Zero. Pick yours so our dispatcher brings the right parts on the first visit.',
    ],
    'brands' => [
      'eyebrow' => 'Brands · all major makers',
      'h2'      => 'Refrigerator brands we service',
      'h2_generic' => 'Brands we service',
      'intro'   => 'Factory-authorized on Tier 1 premium, certified across every mainstream brand. We carry common failure parts for the top 12 brands on every van.',
      'tier1' => ['badge' => 'Factory-authorized · Tier 1', 'title' => 'Premium & built-in', 'meta' => 'EPA 608 + manufacturer-spec parts', 'brands' => ['Sub-Zero', 'Wolf', 'Viking', 'Thermador', 'Miele', 'Dacor', 'Fisher & Paykel']],
      'tier2' => ['title' => 'Mainstream & smart appliances', 'meta' => 'Genuine OEM parts, manufacturer procedures', 'brands' => ['Whirlpool', 'KitchenAid', 'GE', 'GE Profile', 'Samsung', 'LG', 'Bosch', 'Maytag', 'Frigidaire', 'Electrolux', 'Kenmore', 'JennAir', 'Amana', 'Hisense']],
    ],
    'areas' => [
      'eyebrow' => 'Areas we service',
      'h2'      => 'Serving homes & businesses nearby',
      'intro'   => 'Residential and commercial — same flat-rate pricing, same 1-year warranty.',
      'side_h3' => 'Cities we cover',
      'side_meta' => 'Click your city for local info',
      'side_note' => 'we may still cover you, and if not we\'ll refer a trusted partner.',
    ],
    'reviews' => [
      'eyebrow' => 'Verified reviews',
      'h2'      => 'What customers say',
      'intro'   => '318 refrigerator jobs reviewed across Google, BBB, Yelp, and HomeAdvisor. Filtered to fridge repairs only — full reviews are public on each source.',
      'agg' => [
        'score' => '4.9',
        'title' => 'Excellent · 318 fridge reviews',
        'sources' => [
          ['name' => 'Google', 'value' => '4.9 · 218'],
          ['name' => 'BBB', 'value' => 'A+ · 42'],
          ['name' => 'Yelp', 'value' => '4.8 · 38'],
          ['name' => 'HomeAdvisor', 'value' => '4.9 · 20'],
        ],
      ],
      'items' => [
        ['initials' => 'JK', 'source' => 'via Google', 'text' => 'Sub-Zero stopped cooling overnight. Marcus arrived in the booked window, diagnosed an evaporator fan in 15 minutes, replaced it in another 30. Saved $4k worth of food. Exactly the quote.', 'name' => 'Jenny K.', 'meta' => 'Lawrenceville · Sub-Zero · 2 weeks ago'],
        ['initials' => 'DR', 'source' => 'via BBB', 'text' => 'Ice maker was making a horrible noise. They didn\'t push for replacement — said the dispenser auger was worn and replaced just that part. $220 vs the $1,400 quote my warranty company gave me.', 'name' => 'Daniel R.', 'meta' => 'Winder · KitchenAid · 1 month ago'],
        ['initials' => 'AL', 'source' => 'via Yelp', 'text' => 'Samsung French-door was leaking water from the dispenser line. Tech ran a frozen-tube diagnostic, thawed and replaced the water valve. Honest about prevention — adjusted the leveling so it wouldn\'t repeat.', 'name' => 'Anna L.', 'meta' => 'Monroe · Samsung · 3 weeks ago'],
      ],
    ],
    'faq' => [
      'eyebrow' => 'FAQ',
      'h2'      => 'Questions before you book?',
      'items' => [
        ['q' => 'Is it worth fixing a 10-year-old refrigerator?', 'a' => 'Usually yes — if the repair is under 50% of replacement cost. Modern fridges last 14–17 years on average; many Sub-Zero units last 20+. We\'ll be honest if a repair doesn\'t make sense.'],
        ['q' => 'How much does a service call cost?', 'a' => 'We provide a flat-rate written quote before any work begins, so you approve the price before we start — no surprise math.'],
        ['q' => 'Why is EPA Section 608 certification important?', 'a' => 'Federal law requires certification to handle refrigerant. Without 608, a technician cannot legally open the sealed system on your fridge. Many small operators don\'t have it; we always do.'],
        ['q' => 'How long does a typical fridge repair take?', 'a' => 'Most repairs are completed in 45–90 minutes. If a part needs to be ordered, we typically return within 24–48 hours.'],
        ['q' => 'Do you carry parts for Sub-Zero on the van?', 'a' => 'The 8 most common Sub-Zero failure parts, yes — fan motors, gaskets, defrost heaters, sensor probes. Sealed-system repairs require ordering from the Sub-Zero distribution center, typically 1–2 days.'],
        ['q' => 'What warranty do you provide?', 'a' => 'All repairs are backed by a 1-year parts & labor warranty. If the same issue returns within 12 months, we return at no charge — including the trip and the diagnosis.'],
        ['q' => 'Will you save the food in my fridge?', 'a' => 'Yes — first thing the tech does on a cooling job is move perishables to a cooler we bring, so you don\'t lose groceries while we work.'],
        ['q' => 'Do you offer same-day service?', 'a' => 'Yes — same-day across most of our coverage area when you call before 12 PM. After 12 PM we typically book the next morning. Emergency commercial service is available after hours.'],
      ],
    ],
    'final' => [
      'eyebrow' => 'Ready when you are',
      'h2'      => 'Let\'s get your appliance working again.',
      'intro'   => 'One call, technician at your door today. We\'re open 7 days a week, real dispatcher answers in under 60 seconds.',
      'signals' => [
        ['title' => 'EPA 608 certified', 'sub' => 'Sealed-system repairs by law'],
        ['title' => '1-year warranty',   'sub' => 'Parts & labor, in writing'],
        ['title' => 'Flat-rate pricing', 'sub' => 'No hourly. No surprises.'],
        ['title' => 'Vetted technicians', 'sub' => 'W-2, background-checked'],
      ],
    ],
  ];
  return $d;
}

/** Reference service = the refrigerator (ships with full default content). */
function hf_is_ref_service($post_id) {
  if (function_exists('get_field')) {
    $icon = get_field('icon', $post_id);
    if ($icon === 'fridge') return true;
  }
  $slug = get_post_field('post_name', $post_id);
  return is_string($slug) && strpos($slug, 'refrigerator') !== false;
}

/** Service post field with default. */
function hf_svc($key, $default, $post_id) {
  if (function_exists('get_field')) {
    $v = get_field($key, $post_id);
    if ($v !== null && $v !== '' && $v !== false && $v !== []) return $v;
  }
  return $default;
}

/** Service repeater rows or a default array. */
function hf_svc_rows($key, array $default_rows, $post_id) {
  if (function_exists('get_field')) {
    $v = get_field($key, $post_id);
    if (is_array($v) && !empty($v)) return $v;
  }
  return $default_rows;
}
