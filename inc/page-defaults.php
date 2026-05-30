<?php
/**
 * HamersFix — default content for the Commercial / About / Brands / Contact
 * page templates. Mirrors the design mocks 1:1 so the templates render
 * pixel-perfect before any ACF data is entered; each value is overridable via
 * the matching page field group.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/** Cached defaults for the Commercial page. */
function hf_commercial_defaults() {
  static $d = null;
  if ($d !== null) return $d;

  $ic = [
    'fridge' => '<svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="20" height="24" rx="2"/><line x1="6" y1="14" x2="26" y2="14"/><line x1="9" y1="8" x2="9" y2="11"/></svg>',
    'oven'   => '<svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="5" width="22" height="22" rx="2"/><rect x="9" y="10" width="14" height="13" rx="1"/><circle cx="11" cy="8" r=".8"/><circle cx="16" cy="8" r=".8"/></svg>',
    'laundry'=> '<svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="20" height="24" rx="2"/><circle cx="16" cy="18" r="7"/><circle cx="16" cy="18" r="3"/></svg>',
    'walkin' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="2"/><line x1="4" y1="11" x2="20" y2="11"/></svg>',
    'comp'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M5 5l2 2M17 17l2 2M5 19l2-2M17 7l2-2"/></svg>',
    'flame'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3c-3 5-6 9-6 12a6 6 0 0 0 12 0c0-3-3-7-6-12z"/></svg>',
    'wash'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="12" height="16" rx="2"/><circle cx="12" cy="12" r="4"/></svg>',
    'mech'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 6v6l4 2"/></svg>',
    'ctrl'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><line x1="7" y1="9" x2="17" y2="9"/><line x1="7" y1="13" x2="13" y2="13"/></svg>',
    'shield' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'star'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15 9 22 10 17 15 18 22 12 18 6 22 7 15 2 10 9 9 12 2"/></svg>',
    'clock'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>',
    'home'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-8 9 8M5 9v12h14V9"/><rect x="9" y="13" width="6" height="8"/></svg>',
  ];

  $d = [
    'hero' => [
      'eyebrow' => '4.9 Google rating · Licensed & Insured',
      'h1'      => 'Commercial appliance repair in <em>Northeast Georgia</em>',
      'lede'    => 'Restaurants, cafés, offices, rentals, and local businesses — we help keep commercial refrigeration, kitchen equipment, and laundry running.',
      'issues'  => ['Refrigeration issues', 'Cooking equipment', 'Laundry / dishwashing', 'Downtime emergency'],
      'cta_label' => 'Schedule Service',
      'note'    => "Not sure what's wrong? Just describe the symptoms — we'll help guide you.",
      'qpills'  => ['Same-day availability', 'Residential & commercial', 'Transparent pricing'],
      'image'   => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1100&auto=format&fit=crop&q=80',
      'image_alt' => 'Commercial kitchen with stainless steel appliances',
      'badge'   => 'B2B · 24/7 emergency',
      'tag_lbl' => 'Commercial dispatch',
      'tag_h3'  => 'Restaurants · cafés · laundromats · property managers',
    ],
    'services' => [
      'eyebrow' => 'Our services',
      'h2'      => 'Commercial repairs we offer',
      'intro'   => 'Choose the appliance or equipment you need help with.',
      'cards'   => [
        ['gradient' => 'linear-gradient(135deg, #0B4F9A, #062B57)', 'icon' => $ic['fridge'], 'title' => 'Commercial refrigeration', 'desc' => 'Reach-ins, walk-ins, prep tables, ice makers, undercounter & display units.', 'chips' => ['Temperature loss', 'Compressor', 'Ice makers']],
        ['gradient' => 'linear-gradient(135deg, #C7501A, #082C58)', 'icon' => $ic['oven'], 'title' => 'Commercial kitchen equipment', 'desc' => 'Ovens, ranges, grills, fryers, steamers, mixers, prep equipment.', 'chips' => ['Heat / ignition', 'Controls', 'Mechanical']],
        ['gradient' => 'linear-gradient(135deg, #1F7A4C, #062B57)', 'icon' => $ic['laundry'], 'title' => 'Commercial laundry & dishwashers', 'desc' => 'Washers, dryers, dishwashers, glasswashers, ironing equipment.', 'chips' => ['Drain / fill', 'Heat', 'Error codes']],
      ],
    ],
    'downtime' => [
      'eyebrow' => 'Common downtime',
      'h2'      => 'Commercial equipment issues we see most',
      'intro'   => 'The most frequent commercial repair calls — restaurants, cafés, rentals, and local businesses.',
      'cards'   => [
        ['icon' => $ic['walkin'], 'title' => 'Walk-in temperature loss', 'desc' => 'Walk-in coolers and freezers warming up with product inside.'],
        ['icon' => $ic['comp'], 'title' => 'Compressor / refrigeration', 'desc' => 'Reach-ins, prep tables, ice machines short-cycling or down.'],
        ['icon' => $ic['flame'], 'title' => 'Cooking line issues', 'desc' => 'Ovens, fryers, grills, and steamers losing heat or controls.'],
        ['icon' => $ic['wash'], 'title' => 'Commercial laundry', 'desc' => 'Washers, dryers, and dishwashers not draining or heating.'],
        ['icon' => $ic['mech'], 'title' => 'Mechanical failure', 'desc' => 'Loud bearings, motors, fans, or vibration in commercial gear.'],
        ['icon' => $ic['ctrl'], 'title' => 'Controls / sensors', 'desc' => 'Error codes, electronic controls, or safety lockouts.'],
      ],
    ],
    'trust' => [
      'eyebrow' => 'Trust & uptime',
      'h2'      => 'Clear, friendly commercial equipment support',
      'intro'   => 'Downtime costs money. We work to get you scheduled fast, explain the issue clearly, and respect your operating hours.',
      'pillars' => [
        ['icon' => $ic['shield'], 'val' => 'Licensed', 'lbl' => '+ Bonded & Insured', 'sub' => "$2M general liability + workers' comp on every employee"],
        ['icon' => $ic['star'], 'val' => '4.9★', 'lbl' => 'Local reviews', 'sub' => 'Verified rating from Northeast Georgia customers'],
        ['icon' => $ic['clock'], 'val' => 'Same-day', 'lbl' => 'Availability', 'sub' => 'Subject to your location, schedule, and equipment'],
        ['icon' => $ic['home'], 'val' => 'Both', 'lbl' => 'Residential + Commercial', 'sub' => 'Homes, restaurants, cafés, rentals, offices'],
      ],
    ],
    'brands' => [
      'eyebrow' => 'Brands we service',
      'h2'      => 'Commercial equipment brands we service',
      'intro'   => 'Selected commercial refrigeration, kitchen, and laundry equipment brands used by Northeast Georgia restaurants, cafés, and local businesses.',
      'card_h3' => 'Commercial equipment',
      'card_meta' => 'Local business equipment · Restaurants · Cafés · Rentals',
      'list'    => ['True', 'Hoshizaki', 'Traulsen', 'Beverage-Air', 'Turbo Air', 'Manitowoc', 'Scotsman', 'Hobart', 'Vulcan', 'Blodgett', 'Garland', 'Southbend'],
      'footnote'=> 'Built for restaurants, cafés, rentals, and busy local commercial spaces. Brand names are used for identification purposes only. HamersFix is an independent appliance repair service unless otherwise stated.',
      'ask_h4'  => "Don't see your brand?",
      'ask_p'   => "There's a good chance we can still help. Tell us your appliance brand and model, and we'll point you in the right direction. No pressure — just clear guidance.",
      'ask_btn' => 'Ask About My Brand',
    ],
    'process' => [
      'eyebrow' => 'Simple, clear, stress-free repair',
      'h2'      => 'What to expect when you book service',
      'intro'   => 'From your first call to diagnosis and repair, we keep commercial service clear and minimize downtime.',
      'steps'   => [
        ['title' => 'Schedule service', 'desc' => 'Call us or request service online and describe the equipment issue.', 'tag' => 'Online booking or phone support'],
        ['title' => 'We confirm the details', 'desc' => 'We review the equipment type, brand, location, and operating hours.', 'tag' => 'Clear communication before the visit'],
        ['title' => 'Diagnosis & clear estimate', 'desc' => 'A technician checks the equipment, explains the issue, and gives an estimate.', 'tag' => 'No confusing surprises'],
        ['title' => 'Repair & back to service', 'desc' => 'Once approved, we complete the repair when possible to get you running again.', 'tag' => 'Minimize downtime'],
      ],
    ],
    'areas' => [
      'eyebrow' => 'Local coverage',
      'h2'      => 'Commercial appliance repair across Northeast Georgia',
      'intro'   => 'HamersFix helps local businesses across Gwinnett, Barrow, Walton, Jackson and Oconee counties get equipment repair support when they need it.',
      'cards'   => [
        ['num' => 'Area 1 · HQ region', 'title' => 'Bethlehem & Gwinnett Core', 'cities' => 'Bethlehem · Lawrenceville · Snellville · Dacula · Grayson · Auburn', 'link' => 'View area'],
        ['num' => 'Area 2 · Daily routes', 'title' => 'Barrow & Jackson', 'cities' => 'Winder · Statham · Braselton · Hoschton', 'link' => 'View area'],
        ['num' => 'Area 3 · Outer ring', 'title' => 'Walton & Oconee', 'cities' => 'Monroe · Loganville · Bogart · Watkinsville', 'link' => 'View area'],
        ['num' => 'Area 4 · Full map', 'title' => '14 cities · 18 ZIPs', 'cities' => 'Full coverage map with response times by zone', 'link' => 'View map'],
      ],
      'cta_note'  => "Don't see your city?",
      'cta_text'  => " Call us and we'll check availability for your exact location.",
    ],
    'faq' => [
      'eyebrow' => 'FAQ',
      'h2'      => 'Questions before you book?',
      'intro'   => 'Have questions about scheduling, pricing, brands, or service areas? Here are quick answers to help you feel confident before booking.',
      'items'   => [
        ['q' => 'Do you service commercial appliances and equipment?', 'a' => 'Yes. We service commercial refrigeration, kitchen equipment, and laundry / dishwashing equipment for restaurants, cafés, offices, and local businesses across Northeast Georgia.'],
        ['q' => 'How fast can you respond to commercial equipment downtime?', 'a' => "Same-day availability for most commercial calls. After-hours emergency dispatch is available for active commercial accounts — call our line directly and we'll route the closest technician."],
        ['q' => 'What types of commercial refrigeration do you service?', 'a' => 'Reach-in coolers and freezers, walk-ins, prep tables, ice makers, undercounter units, display cases, beverage units. We handle compressor work, temperature loss, ice production issues, and electronic controls.'],
        ['q' => 'Do you service commercial kitchen and cooking equipment?', 'a' => 'Yes — ovens, ranges, grills, fryers, steamers, mixers, and prep equipment. Common issues include heat / ignition problems, electronic controls, and mechanical failures.'],
        ['q' => 'How is pricing handled for commercial repair?', 'a' => 'We provide a clear estimate after diagnosis. Multi-unit operators and property managers get volume pricing; Net-30 terms available for active commercial accounts.'],
        ['q' => 'Do you offer maintenance contracts for restaurants?', 'a' => 'Yes. Preventative maintenance contracts are available for restaurants, cafés, and multi-unit operators — quarterly or semi-annual visits to inspect, clean, and replace common wear parts before they fail.'],
      ],
    ],
    'final' => [
      'eyebrow' => 'Ready when you need help',
      'h2'      => "Let's get your equipment running again.",
      'intro'   => "Tell us what's going on with your equipment. We'll guide you to the right next step for your restaurant, café, or business. Not sure what's wrong? Just describe the symptoms — we'll help guide you.",
      'card_lbl'=> 'Commercial dispatch',
    ],
  ];
  return $d;
}
