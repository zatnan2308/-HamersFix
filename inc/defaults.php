<?php
/**
 * HamersFix — default content.
 *
 * Exact copy/structure transcribed from mocks/Home-desktop.html so the theme
 * renders identically to the design BEFORE any ACF data is entered. Every
 * helper in helpers.php falls back to these values. Editing a field in the
 * admin overrides the matching default.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/**
 * @return array Cached default content tree.
 */
function hf_defaults() {
  static $d = null;
  if ($d !== null) return $d;

  $icons = [
    'fridge'     => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><rect x="7" y="3" width="18" height="26" rx="2"/><line x1="7" y1="13" x2="25" y2="13"/><line x1="11" y1="7" x2="11" y2="10"/><line x1="11" y1="17" x2="11" y2="22"/></svg>',
    'washer'     => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><rect x="6" y="4" width="20" height="24" rx="2"/><circle cx="16" cy="18" r="6"/><circle cx="22" cy="9" r="1.5"/></svg>',
    'dryer'      => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><rect x="6" y="4" width="20" height="24" rx="2"/><circle cx="16" cy="17" r="7"/><circle cx="16" cy="17" r="3"/></svg>',
    'dishwasher' => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><rect x="6" y="5" width="20" height="22" rx="2"/><path d="M10 11h12M10 17h12"/></svg>',
    'oven'       => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><rect x="5" y="5" width="22" height="22" rx="2"/><rect x="9" y="10" width="14" height="13" rx="1"/><circle cx="11" cy="8" r=".8"/><circle cx="16" cy="8" r=".8"/><circle cx="21" cy="8" r=".8"/></svg>',
    'cooktop'    => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><circle cx="10" cy="11" r="3.5"/><circle cx="22" cy="11" r="3.5"/><circle cx="10" cy="22" r="3.5"/><circle cx="22" cy="22" r="3.5"/></svg>',
    'clean'      => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><path d="M12 4l1.6 4.4L18 10l-4.4 1.6L12 16l-1.6-4.4L6 10l4.4-1.6z"/><path d="M22 18l.9 2.4L25 21l-2.1.6L22 24l-.9-2.4L19 21l2.1-.6z"/></svg>',
    'vent'       => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><rect x="5" y="6" width="22" height="20" rx="2"/><path d="M5 11h22M5 16h22M5 21h22"/></svg>',
    'about'      => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><path d="M16 4l11 5v6c0 7-5 11-11 13C10 26 5 22 5 15V9z"/><path d="M12 16l3 3 6-6"/></svg>',
    'brands'     => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><path d="M5 5h11l11 11-11 11L5 16z"/><circle cx="11" cy="11" r="1.6"/></svg>',
    'areas'      => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><path d="M16 28s9-7.5 9-15a9 9 0 0 0-18 0c0 7.5 9 15 9 15z"/><circle cx="16" cy="13" r="3.2"/></svg>',
  ];

  $d = [
    'identity' => [
      'site_title'     => 'HamersFix',
      'site_tagline'   => 'Appliance Repair',
      'logo_mark_text' => 'HF',
      'license_text'   => 'License pending · Bonded · Insured',
      'serving_area'   => 'Serving Northeast Georgia',
    ],
    'contact' => [
      'phone_display'          => '(770) 601-4241',
      'phone_link'             => '+17706014241',
      'email'                  => 'service@hamersfix.com',
      'address_street'         => '',
      'address_city_state_zip' => 'Bethlehem, GA 30620',
      'booking_url'            => '#',
      'google_reviews_url'     => '',
    ],
    'hours_short' => 'Open today · 7 AM – 9 PM',
    'hours' => [
      ['label' => 'Monday – Friday', 'open' => '7 AM',  'close' => '9 PM', 'closed' => false],
      ['label' => 'Saturday',        'open' => '8 AM',  'close' => '8 PM', 'closed' => false],
      ['label' => 'Sunday',          'open' => '10 AM', 'close' => '8 PM', 'closed' => false],
    ],
    'service_zips' => [
      ['city' => 'Bethlehem',     'zips' => '30620'],
      ['city' => 'Winder',        'zips' => '30680'],
      ['city' => 'Lawrenceville', 'zips' => '30043, 30044, 30045, 30046'],
      ['city' => 'Bogart',        'zips' => '30622'],
      ['city' => 'Watkinsville',  'zips' => '30677'],
      ['city' => 'Loganville',    'zips' => '30052'],
      ['city' => 'Braselton',     'zips' => '30517'],
      ['city' => 'Hoschton',      'zips' => '30548'],
      ['city' => 'Snellville',    'zips' => '30039, 30078'],
      ['city' => 'Dacula',        'zips' => '30019'],
      ['city' => 'Auburn',        'zips' => '30011'],
      ['city' => 'Monroe',        'zips' => '30655'],
      ['city' => 'Grayson',       'zips' => '30017'],
      ['city' => 'Statham',       'zips' => '30666'],
    ],
    'zip_copy' => [
      'zip_label'       => 'Do we cover your ZIP?',
      'zip_placeholder' => 'e.g. 30620',
      'zip_hint'        => '', // empty => computed from city count at render time
      'zip_success'     => 'You\'re covered — earliest slot today, 4–6 PM',
      'zip_fail'        => 'We\'re not in that ZIP yet — call us and we\'ll check the nearest crew.',
      'zip_invalid'     => 'Please enter a valid 5-digit ZIP code.',
    ],
    'trust' => [
      ['icon_text' => 'A+',  'icon_style' => 'green',   'label' => 'BBB Accredited'],
      ['icon_text' => '✓',   'icon_style' => 'green',   'label' => 'Google Guaranteed'],
      ['icon_text' => '608', 'icon_style' => 'orange',  'label' => 'EPA Section 608'],
      ['icon_text' => 'L&I', 'icon_style' => 'default', 'label' => 'Licensed & Insured'],
      ['icon_text' => '15',  'icon_style' => 'default', 'label' => 'Years in business'],
    ],
    'icons' => $icons,
    'services' => [
      ['slug' => 'fridge',     'icon' => 'fridge',     'title' => 'Refrigerator Repair', 'short_desc' => 'Not cooling · ice maker · leaking',            'long_desc' => 'Not cooling · ice maker · leaking water · loud noise · frost build-up · door seal · compressor.', 'price_note' => 'EPA-certified · same-day', 'job_count' => '318 jobs', 'url' => '#'],
      ['slug' => 'washer',     'icon' => 'washer',     'title' => 'Washer Repair',       'short_desc' => 'Won\'t drain · won\'t spin · leaks',           'long_desc' => 'Won\'t drain · won\'t spin · leaking · vibration · door lock · error codes · belt & pump.',         'price_note' => 'Top & front-load',                   'job_count' => '241 jobs', 'url' => '#'],
      ['slug' => 'dryer',      'icon' => 'dryer',      'title' => 'Dryer Repair',        'short_desc' => 'Not heating · vent clog · belt',              'long_desc' => 'Not heating · won\'t tumble · long dry time · noisy · vent clog · thermal fuse · belt replacement.', 'price_note' => 'Gas & electric',                     'job_count' => '196 jobs', 'url' => '#'],
      ['slug' => 'dishwasher', 'icon' => 'dishwasher', 'title' => 'Dishwasher Repair',   'short_desc' => 'Not draining · poor cleaning',                'long_desc' => 'Won\'t drain · not cleaning · leaking · door latch · soap dispenser · sprayer arm.',                'price_note' => 'Built-in & portable',                'job_count' => '174 jobs', 'url' => '#'],
      ['slug' => 'oven',       'icon' => 'oven',       'title' => 'Oven Repair',         'short_desc' => 'Not heating · igniter · display',             'long_desc' => 'Not heating · uneven cook · igniter · door · temperature drift · self-clean failure · display.',    'price_note' => 'Gas, electric, dual-fuel',           'job_count' => '142 jobs', 'url' => '#'],
      ['slug' => 'cooktop',    'icon' => 'cooktop',    'title' => 'Cooktop Repair',      'short_desc' => 'Burner · induction · cracked glass',          'long_desc' => 'Burner not igniting · induction error · cracked glass · faulty knob · gas leak diagnostics.',       'price_note' => 'Gas · induction · electric',         'job_count' => '98 jobs',  'url' => '#'],
    ],
    'home' => [
      'hero_eyebrow'       => 'Same-day service available today',
      'hero_h1'            => 'Appliance repair, <em>done right</em> — same day.',
      'hero_lede'          => 'EPA-certified technicians. Licensed & insured. Flat-rate pricing — no surprises. Every repair is backed by a 1-year parts & labor warranty.',
      'hero_book_label'    => 'Book online →',
      'hero_image'         => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1100&auto=format&fit=crop&q=80',
      'hero_image_alt'     => 'Bright modern kitchen with refrigerator, range, and dishwasher',
      'hero_tech_initials' => 'MJ',
      'hero_tech_name'     => 'Marcus J. · Senior Tech',
      'hero_tech_meta'     => 'EPA 608 · 12 years · Sub-Zero certified',
      'hero_slot_label'    => 'Next available slot',
      'hero_slot_value'    => 'Today · 4 – 6 PM',
      'hero_slot_note'     => '3 technicians in your area',

      'services_eyebrow'   => 'What we fix',
      'services_h2'        => 'Six appliances, one expert team',
      'services_intro'     => 'Kitchen and laundry, residential and high-end. We handle 30+ models per week across Northeast Georgia — and our techs carry the parts for the most common failures.',

      'steps_eyebrow'      => 'How it works',
      'steps_h2'           => 'Three steps. No surprises.',
      'steps_intro'        => 'From the first call to the warranty paperwork — here\'s exactly what happens when you book us.',

      'brands_eyebrow'     => 'Brands we service',
      'brands_h2'          => 'Factory-authorized on premium, fluent on the mainstream',
      'brands_intro'       => 'From Sub-Zero refrigerators to Whirlpool washers — our technicians carry the right certifications and the right parts.',

      'reviews_eyebrow'    => 'Reviews',
      'reviews_h2'         => '4.9 stars from 1,247 neighbors',
      'reviews_intro'      => 'Verified reviews across Google, BBB, Yelp, and HomeAdvisor — no curated highlight reel.',

      'faq_eyebrow'        => 'FAQ',
      'faq_h2'             => 'Common questions',
      'faq_intro'          => 'Don\'t see your question? Call us — we answer the phone during business hours, not a call center.',

      'cta_eyebrow'        => 'Ready when you are',
      'cta_h2'             => 'One call, technician at your door today.',
      'cta_intro'          => 'Open 7 days · 7 AM – 9 PM. Phone-routed to a real dispatcher, not a call center.',
    ],
    'steps' => [
      ['num' => '1', 'title' => 'Call or book online',  'desc' => 'Tell us the appliance and the symptom. We confirm your ZIP, your slot, and the technician assigned — by name.',                 'time' => '≈ 4 min'],
      ['num' => '2', 'title' => 'On-site diagnosis',    'desc' => 'Your technician arrives in the booked window, diagnoses the issue, and gives you a flat-rate written quote on the spot.',         'time' => '≈ 20 min'],
      ['num' => '3', 'title' => 'Repair & warranty',    'desc' => 'If you approve, we repair — often during the same visit, using OEM parts. You get a 1-year parts & labor warranty in writing.',   'time' => 'avg. 45 min'],
    ],
    'brands' => ['Sub-Zero', 'Wolf', 'Viking', 'Thermador', 'Miele', 'Dacor', 'KitchenAid', 'Whirlpool', 'GE', 'Samsung', 'LG', 'Bosch', 'Maytag', 'Frigidaire', 'Electrolux', 'Kenmore', 'JennAir', 'F&P'],
    'reviews_agg' => [
      'score' => '4.9',
      'stars' => '★★★★★',
      'title' => 'Excellent · 1,247 verified reviews',
      'sources' => [
        ['name' => 'Google',      'value' => '4.9 · 892'],
        ['name' => 'BBB',         'value' => 'A+ · 156'],
        ['name' => 'Yelp',        'value' => '4.8 · 134'],
        ['name' => 'HomeAdvisor', 'value' => '4.9 · 65'],
      ],
    ],
    'reviews' => [
      ['initials' => 'JK', 'source' => 'via Google', 'text' => 'Showed up within the window, diagnosed our Sub-Zero in 15 minutes, fixed it the same afternoon. Honest pricing — exactly the quote, no upsell.', 'name' => 'Jenny K.',  'meta' => 'Lawrenceville · Refrigerator · 2 weeks ago'],
      ['initials' => 'RM', 'source' => 'via BBB',    'text' => 'Our washer was leaking the morning of a family visit. Booked online at 8 AM, technician at the door by 11. Saved the weekend.',                       'name' => 'Robert M.', 'meta' => 'Bethlehem · Washer · 1 month ago'],
      ['initials' => 'AL', 'source' => 'via Yelp',   'text' => 'Polite technician, wore booties, explained the failed igniter clearly, and showed me the old part. Charged exactly the quoted flat rate.',           'name' => 'Anna L.',   'meta' => 'Monroe · Oven · 3 weeks ago'],
    ],
    'commercial' => [
      'eyebrow' => 'Commercial appliance repair',
      'h2'      => 'Restaurants, laundromats, prep kitchens — running again, fast.',
      'intro'   => 'After-hours service, maintenance contracts, NSF/health-code compliance, and insurance billing. We work with multi-unit operators and property managers.',
      'features' => ['After-hours emergency dispatch', 'NSF-compliant repairs', 'Maintenance contracts', 'Multi-unit pricing', 'Insurance & warranty billing', 'Net-30 terms available'],
      'cta_label' => 'Request a B2B quote — callback in 30 min',
      'cta_url'   => '#',
      'panel_label' => 'Active client snapshot',
      'stats' => [
        ['label' => 'Restaurants & cafés',         'value' => '34'],
        ['label' => 'Laundromats',                 'value' => '12'],
        ['label' => 'Multi-family property mgmt',  'value' => '8 portfolios'],
        ['label' => 'Avg. response time',          'value' => '2.4 hours'],
        ['label' => 'Repeat-business rate',        'value' => '92%'],
      ],
    ],
    'faq' => [
      ['q' => 'Do you offer same-day service?',                       'a' => 'Yes — we offer same-day service across most of our coverage area when you call before 12 PM. After 12 PM we typically book the next morning. Emergency commercial service is available after hours.'],
      ['q' => 'How much does a service call cost?',                   'a' => 'We provide a flat-rate quote in writing before any work begins, so you approve the price before we start — no surprises.'],
      ['q' => 'What warranty do you provide?',                        'a' => 'All repairs are backed by a 1-year parts & labor warranty. If the same issue returns within 12 months, we return at no charge.'],
      ['q' => 'Which brands are you factory-authorized for?',         'a' => 'We are factory-authorized for Sub-Zero, Wolf, Viking, Thermador, and Dacor. We service all other major brands with manufacturer-spec parts and procedures.'],
      ['q' => 'Are your technicians background-checked and insured?', 'a' => 'Yes — every technician is W-2 employed (not subcontracted), background-checked, drug-tested, and covered under our $2M general liability + workers\' comp policies.'],
      ['q' => 'Do you offer financing?',                             'a' => 'Yes — we offer financing through Synchrony and Wisetack with same-as-cash terms on qualifying repairs over $400.'],
    ],
    'footer' => [
      'services' => [
        ['label' => 'Refrigerator repair', 'url' => '#'],
        ['label' => 'Washer repair',       'url' => '#'],
        ['label' => 'Dryer repair',        'url' => '#'],
        ['label' => 'Dishwasher repair',   'url' => '#'],
        ['label' => 'Oven repair',         'url' => '#'],
        ['label' => 'Cooktop repair',      'url' => '#'],
        ['label' => 'Commercial appliance','url' => '#'],
      ],
      'company' => [
        ['label' => 'About us',        'url' => '#'],
        ['label' => 'Reviews',         'url' => '#'],
        ['label' => 'Brands serviced', 'url' => '#'],
        ['label' => 'Contact',         'url' => '#'],
        ['label' => 'Careers',         'url' => '#'],
        ['label' => 'Blog',            'url' => '#'],
      ],
      'legal' => [
        ['label' => 'Privacy Policy',    'url' => '#'],
        ['label' => 'Terms of Service',  'url' => '#'],
        ['label' => 'Accessibility',     'url' => '#'],
        ['label' => 'Do Not Sell or Share My Personal Information', 'url' => '#'],
        ['label' => 'Sitemap',           'url' => '#'],
      ],
      'credit_text' => 'Alexey Kachan Agency',
      'credit_url'  => 'https://alexeykachan.com/',
      'copyright'   => '© {year} HamersFix Appliance Repair, LLC. All rights reserved.',
    ],
  ];

  return $d;
}
