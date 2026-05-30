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
      'badge'   => 'B2B · After-hours',
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

/** Cached defaults for the About page (transcribed verbatim from About.html). */
function hf_about_defaults() {
  static $d = null;
  if ($d !== null) return $d;

  $d = [
    'hero' => [
      'eyebrow' => 'About HamersFix',
      'h1'      => 'Helping <em>Northeast Georgia</em> homes & businesses get back to normal.',
      'lede'    => 'HamersFix provides reliable appliance repair for homes, rentals, restaurants, cafés, and local businesses across Gwinnett, Barrow & the Athens area. When an appliance breaks down, we help make the next step simple, clear, and less stressful.',
      'cta_label' => 'Schedule Service',
    ],
    'who' => [
      'eyebrow' => 'Who we are',
      'h2'      => 'A local appliance repair team built around clear service',
      'paras'   => [
        'HamersFix was created to make appliance repair feel simple, professional, and easy to understand. Whether you are dealing with a refrigerator that is not cooling, a washer that will not drain, an oven that will not heat, or commercial equipment that needs attention, our goal is to help you move forward with confidence.',
        'We work with homeowners, landlords, restaurants, cafés, offices, and local businesses across Northeast Georgia. Our approach is simple: listen carefully, diagnose the issue, explain the repair options clearly, and help you get your home or business running smoothly again.',
      ],
      'tags'    => ['Homes & rental properties', 'Restaurants & cafés', 'Local businesses', 'Residential & commercial'],
      'vis_lbl' => 'Local service for everyday appliance problems',
      'vis_h3'  => 'One team. One number. One promise.',
      'items'   => [
        ['icon' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12l3-9 4 6 4-3 4 9 3-3"/></svg>', 'title' => 'Same-day service available', 'sub' => 'Most ZIPs · book before noon'],
        ['icon' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-7 8-13a8 8 0 10-16 0c0 6 8 13 8 13z"/><circle cx="12" cy="9" r="3"/></svg>', 'title' => '14 cities · 18 ZIPs', 'sub' => 'Gwinnett, Barrow & Athens area'],
        ['icon' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>', 'title' => '1-year parts & labor warranty', 'sub' => 'On every completed repair'],
        ['icon' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>', 'title' => 'Open 7 days a week', 'sub' => 'Mon–Fri 7 AM–9 PM · weekends too'],
      ],
    ],
    'values' => [
      'eyebrow' => 'Our values',
      'h2'      => 'Service that feels clear, respectful, and reliable',
      'intro'   => 'Appliance problems can interrupt real life. Our values are built around making the repair experience easier from the first call to the final update.',
      'cards'   => [
        ['icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>', 'h3' => 'Clear communication', 'p' => 'We explain what we find, what your options are, and what to expect before repair work begins.'],
        ['icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-8 9 8M5 9v12h14V9"/></svg>', 'h3' => 'Respect for your home', 'p' => 'We treat homes, kitchens, laundry rooms, and workspaces with care and professionalism.'],
        ['icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M9 9c0-1.5 1.5-3 3-3s3 1.5 3 3-3 2-3 4"/><circle cx="12" cy="17" r=".5" fill="currentColor"/></svg>', 'h3' => 'Honest guidance', 'p' => "You don't need to know the exact problem before calling. Tell us the symptoms and we'll help guide you."],
        ['icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>', 'h3' => 'Fast local support', 'p' => 'Same-day appointments may be available depending on location, schedule, and appliance issue.'],
      ],
    ],
    'trust' => [
      'eyebrow' => 'Trust & peace of mind',
      'h2'      => 'Licensed, insured, and ready to help',
      'intro'   => 'Choosing an appliance repair company means trusting someone in your home or business. HamersFix is built around professionalism, clear communication, and reliable local service.',
      'pillars' => [
        ['icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>', 'val' => 'Licensed', 'lbl' => '+ Bonded & Insured', 'sub' => "Licensing in progress · $2M general liability + workers' comp"],
        ['icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15 9 22 10 17 15 18 22 12 18 6 22 7 15 2 10 9 9 12 2"/></svg>', 'val' => '4.9★', 'lbl' => 'Local reviews', 'sub' => 'Verified Google rating across Gwinnett & Barrow customers'],
        ['icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>', 'val' => 'Same-day', 'lbl' => 'Availability', 'sub' => 'Subject to your location, schedule, and appliance issue'],
        ['icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-8 9 8M5 9v12h14V9"/><rect x="9" y="13" width="6" height="8"/></svg>', 'val' => 'Both', 'lbl' => 'Residential + Commercial', 'sub' => 'Homes, rentals, restaurants, cafés, offices, local businesses'],
      ],
    ],
    'hb' => [
      'eyebrow' => 'Homes & businesses',
      'h2'      => 'Repair support for everyday homes and local businesses',
      'intro'   => 'From family kitchens and laundry rooms to cafés, restaurants, rentals, and commercial spaces, HamersFix helps keep essential appliances and equipment working.',
      'cards'   => [
        ['kind' => 'res', 'eyebrow' => 'Residential', 'h3' => 'Residential appliance repair', 'p' => 'We help homeowners and landlords with the appliances people rely on every day.', 'items' => ['Refrigerator & Wine Cooler Repair', 'Washer & Dryer Repair', 'Dishwasher Repair', 'Oven, Stove & Cooktop Repair', 'Microwave & Small Appliances'], 'link' => 'View Residential Services', 'url_key' => 'service'],
        ['kind' => 'com', 'eyebrow' => 'Commercial', 'h3' => 'Commercial equipment repair', 'p' => 'We support local restaurants, cafés, rentals, offices, and business spaces with commercial equipment.', 'items' => ['Commercial Refrigeration', 'Commercial Kitchen Equipment', 'Commercial Laundry & Dishwashers'], 'link' => 'View Commercial Services', 'url_key' => 'commercial'],
      ],
    ],
    'promise' => [
      'eyebrow' => 'Our promise',
      'h2'      => 'We keep appliance repair simple',
      'intro'   => 'Our goal is to make the service experience clear from the moment you reach out.',
      'steps'   => [
        ['h3' => 'Listen first', 'p' => "Tell us what's happening with your appliance or equipment."],
        ['h3' => 'Confirm the details', 'p' => 'We review the appliance type, brand, location, and preferred timing.'],
        ['h3' => 'Diagnose & explain', 'p' => 'A technician checks the issue and explains repair options clearly.'],
        ['h3' => 'Help you move forward', 'p' => 'Once approved, we complete the repair when possible and help get things back to normal.'],
      ],
    ],
    'areas' => [
      'eyebrow' => 'Local service areas',
      'h2'      => 'Proudly serving Northeast Georgia and nearby communities',
      'intro'   => 'HamersFix helps homeowners and local businesses across Gwinnett, Barrow, Walton, Jackson and Oconee counties get appliance repair support when they need it.',
      'cards'   => [
        ['num' => 'Area 1 · HQ region', 'title' => 'Bethlehem & Gwinnett Core', 'cities' => 'Bethlehem · Lawrenceville · Snellville · Dacula · Grayson · Auburn', 'link' => 'View area'],
        ['num' => 'Area 2 · Daily routes', 'title' => 'Barrow & Jackson', 'cities' => 'Winder · Statham · Braselton · Hoschton', 'link' => 'View area'],
        ['num' => 'Area 3 · Outer ring', 'title' => 'Walton & Oconee', 'cities' => 'Monroe · Loganville · Bogart · Watkinsville', 'link' => 'View area'],
        ['num' => 'Area 4 · Full map', 'title' => '14 cities · 18 ZIPs', 'cities' => 'Full coverage map with response times by zone', 'link' => 'View map'],
      ],
      'cta_note' => "Don't see your city?",
      'cta_text' => " Call us and we'll check availability for your exact location.",
    ],
    'brands' => [
      'eyebrow' => 'Brands & equipment',
      'h2'      => 'We service many major appliance brands',
      'intro'   => 'From everyday home appliances to premium and commercial equipment, HamersFix works with many of the brands Northeast Georgia homes and businesses rely on.',
      'cols'    => [
        ['h3' => 'Everyday home', 'sub' => 'Mainstream brands', 'prem' => false, 'list' => ['Whirlpool', 'GE', 'Samsung', 'LG', 'KitchenAid', 'Maytag', 'Frigidaire', 'Bosch']],
        ['h3' => 'Premium', 'sub' => 'Factory-authorized', 'prem' => true, 'list' => ['Sub-Zero', 'Wolf', 'Viking', 'Thermador', 'Miele', 'JennAir']],
        ['h3' => 'Commercial', 'sub' => 'B2B equipment', 'prem' => false, 'list' => ['True', 'Hoshizaki', 'Vulcan', 'Hobart', 'Manitowoc']],
      ],
      'cta_label' => 'View All Brands We Service →',
      'footnote'  => 'Brand names are used for identification purposes only. HamersFix is an independent appliance repair service unless otherwise stated.',
    ],
    'friendly' => [
      'eyebrow' => 'Friendly & local',
      'h2'      => 'Professional help with a friendly local approach',
      'intro'   => 'Honest, careful service from people who live and work in the Northeast Georgia area.',
      'stamp_nm' => 'Local team',
      'stamp_role' => 'Northeast Georgia',
      'items'   => [
        'Clear explanations of every issue we find',
        'Estimates shared before any work begins',
        'Respect for your home, kitchen, and time',
        'Honest options instead of pressure to upsell',
      ],
    ],
    'final' => [
      'eyebrow' => 'Ready when you need help',
      'h2'      => "Let's get your appliance working again.",
      'intro'   => "Tell us what's going on with your appliance. We'll guide you to the right next step for your home or business. Not sure what's wrong? Just describe the symptoms — we'll help guide you.",
      'card_lbl'=> 'Call our dispatcher',
    ],
  ];
  return $d;
}

/** Cached defaults for the Contact page (transcribed verbatim from Contact.html). */
function hf_contact_defaults() {
  static $d = null;
  if ($d !== null) return $d;

  $svg_phone = '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>';

  $d = [
    'hero' => [
      'eyebrow' => 'Open now · < 60-second wait',
      'h1'      => 'Get in touch — <em>four ways</em>, your call.',
      'lede'    => 'Phone is fastest. Booking online is most accurate. Forms are for non-urgent stuff. Pick what fits.',
    ],
    // Section 2: the four channel cards. kind=call|book|email|commercial resolves the href.
    'channels' => [
      ['kind' => 'call',       'badge' => 'Fastest', 'badge_style' => '', 'icon' => $svg_phone, 'h3' => 'Call us', 'ds' => 'Real dispatcher, no IVR. Most callers reach a person in under 60 seconds. Best for same-day & emergency.', 'action' => '', 'primary' => true],
      ['kind' => 'book',       'badge' => '', 'badge_style' => '', 'icon' => '<svg viewBox="0 0 24 24" class="ic-stroke"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 9h18M8 3v4M16 3v4"/></svg>', 'h3' => 'Book online', 'ds' => '6-step flow takes about 60 seconds. Pick appliance, brand, symptom, ZIP, slot. SMS confirmation immediately.', 'action' => 'Start booking', 'primary' => false],
      ['kind' => 'email',      'badge' => '', 'badge_style' => '', 'icon' => '<svg viewBox="0 0 24 24" class="ic-stroke"><path d="M4 6l8 6 8-6M4 6v12h16V6"/></svg>', 'h3' => 'Email us', 'ds' => "Quotes, brand-specific questions, warranty paperwork, anything that isn't urgent. We reply within 2 business hours.", 'action' => 'Send an email', 'primary' => false],
      ['kind' => 'commercial', 'badge' => 'B2B', 'badge_style' => 'cta', 'icon' => '<svg viewBox="0 0 24 24" class="ic-stroke"><path d="M3 21l3-3M21 21l-3-3M5 18h14M7 6h10v12H7zM10 6V3M14 6V3"/></svg>', 'h3' => 'Commercial line', 'ds' => 'Restaurants, laundromats, property managers. After-hours emergency dispatch. Dedicated account manager.', 'action' => 'Call the B2B line', 'primary' => false],
    ],
    // Section 3: reach card (links) + info stack.
    'reach' => [
      'eyebrow' => 'Choose your channel',
      'h2'      => 'Four ways to reach us',
      'sub'     => 'No forms on our site — we route everything through real people or our scheduling platform. Pick what works.',
      'links'   => [
        ['kind' => 'call',  'cls' => '--cta', 'ttl' => 'Residential dispatch', 'val' => '', 'ds' => 'Real person · < 60-second wait · 7 days a week'],
        ['kind' => 'call',  'cls' => '', 'ttl' => 'Commercial line', 'val' => '', 'ds' => 'B2B emergency dispatch · property managers · restaurants'],
        ['kind' => 'book',  'cls' => '--g', 'ttl' => 'Open booking form ↗', 'val' => 'Schedule online', 'ds' => '60-second flow on our scheduling platform · opens new tab'],
        ['kind' => 'email', 'cls' => '', 'ttl' => 'Email · non-urgent', 'val' => '', 'ds' => 'Quotes, warranty docs, brand-specific questions · 2-hr reply'],
      ],
      'note'    => "<b>Why no contact form?</b> We've found phone &amp; SMS get you to a real dispatcher 10× faster than a form lying in someone's inbox. For scheduling, our external platform handles SMS confirmations &amp; calendar add — better than an HTML form can.",
    ],
    'info' => [
      'hours_h3'   => 'Hours of operation',
      'hours_note' => 'Commercial (B2B): after-hours emergency dispatch for active accounts.',
      'addr_h3'    => 'Address & service area',
      'addr_note'  => "Office is by appointment only — we're a service company, not a storefront. Tech & van dispatch happens here.",
      'addr_link'  => 'See full service area map →',
      'lines_h3'   => 'Two phone lines',
    ],
    'final' => [
      'eyebrow' => 'Still here?',
      'h2'      => 'Phone is faster than any form.',
      'intro'   => 'Real dispatcher, no IVR. Average wait under 60 seconds. We answer 7 days a week. Try us.',
      'card_lbl'=> 'Call our dispatcher',
    ],
  ];
  return $d;
}

/** Cached defaults for the Brands page (transcribed verbatim from Brands.html). */
function hf_brands_defaults() {
  static $d = null;
  if ($d !== null) return $d;

  // Scope-card icons (bespoke).
  $sc = [
    'chart' => '<svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M3 12l3-9 4 6 4-3 4 9 3-3"/></svg>',
    'star'  => '<svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><polygon points="12 2 15 9 22 10 17 15 18 22 12 18 6 22 7 15 2 10 9 9 12 2"/></svg>',
    'rack'  => '<svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><rect x="3" y="6" width="18" height="14" rx="2"/><path d="M3 12h18M8 6V4M16 6V4"/></svg>',
    'check' => '<svg width="22" height="22" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M9 12l2 2 4-4"/></svg>',
  ];
  // Matrix appliance icons (reuse appliance set).
  $mi = [
    'fridge'     => '<svg viewBox="0 0 32 32" class="ic-stroke"><rect x="7" y="3" width="18" height="26" rx="2"/><line x1="7" y1="13" x2="25" y2="13"/></svg>',
    'washer'     => '<svg viewBox="0 0 32 32" class="ic-stroke"><rect x="6" y="4" width="20" height="24" rx="2"/><circle cx="16" cy="18" r="6"/></svg>',
    'oven'       => '<svg viewBox="0 0 32 32" class="ic-stroke"><rect x="5" y="5" width="22" height="22" rx="2"/><rect x="9" y="10" width="14" height="13" rx="1"/></svg>',
    'dishwasher' => '<svg viewBox="0 0 32 32" class="ic-stroke"><rect x="6" y="5" width="20" height="22" rx="2"/><path d="M10 11h12M10 17h12"/></svg>',
    'cooktop'    => '<svg viewBox="0 0 32 32" class="ic-stroke"><circle cx="10" cy="11" r="3.5"/><circle cx="22" cy="11" r="3.5"/><circle cx="10" cy="22" r="3.5"/><circle cx="22" cy="22" r="3.5"/></svg>',
  ];

  $d = [
    'hero' => [
      'eyebrow' => 'Factory-authorized · OEM parts only',
      'h1'      => 'Appliance brands <em>homes &amp; businesses</em> rely on.',
      'lede'    => 'We service 25+ residential brands and 14+ commercial equipment makers across Northeast Georgia. Factory-authorized on premium, OEM-certified on mainstream — every repair backed by a 1-year warranty.',
      'image'   => 'https://images.unsplash.com/photo-1556911220-bff31c812dba?w=1100&auto=format&fit=crop&q=80',
      'image_alt' => 'Premium kitchen appliances — refrigerator, range, and oven',
      'badge'   => '25+ brands',
      'overlay_lbl' => 'Factory-authorized',
      'overlay_txt' => 'Sub-Zero · Wolf · Viking · Thermador · Miele',
      'stats'   => [
        ['n' => '25', 'sup' => '+', 'l' => 'Residential brands'],
        ['n' => '7', 'sup' => '', 'l' => 'Factory-authorized'],
        ['n' => '14', 'sup' => '+', 'l' => 'Commercial makers'],
      ],
    ],
    'scope' => [
      'eyebrow' => 'Our scope',
      'h2'      => 'Brands we repair',
      'intro'   => "Every brand we work on is covered by genuine OEM parts, manufacturer procedures, and our 1-year parts &amp; labor warranty. Here's what that scope looks like in practice.",
      'cards'   => [
        ['icon' => $sc['chart'], 'n' => '25', 'sup' => '+', 'l' => 'Residential brands', 'p' => 'From Whirlpool and GE to Bosch and KitchenAid — every major maker sold in U.S. homes.'],
        ['icon' => $sc['star'], 'n' => '7', 'sup' => '', 'l' => 'Factory-authorized', 'p' => 'Direct certification from Sub-Zero, Wolf, Viking, Thermador, Miele, Dacor, and Fisher & Paykel.'],
        ['icon' => $sc['rack'], 'n' => '14', 'sup' => '+', 'l' => 'Commercial makers', 'p' => 'True, Hoshizaki, Vulcan, Hobart, and more — for restaurants, laundromats, and prep kitchens.'],
        ['icon' => $sc['check'], 'n' => '100', 'sup' => '%', 'l' => 'OEM parts', 'p' => "We never use aftermarket parts. Always genuine, always with the manufacturer's spec sheet."],
      ],
    ],
    'home' => [
      'eyebrow' => 'Tier 2 · Mainstream',
      'h2'      => 'Home appliance brands',
      'intro'   => "The brands you'll find in most American kitchens and laundry rooms. We carry common-failure parts for the top 12 on every service van — meaning most repairs happen on the first visit.",
      'cards'   => [
        ['nm' => 'Whirlpool', 'ds' => 'U.S. mainstream leader. Solid parts availability. Strong on top-load washers and side-by-side fridges.', 'tags' => 'Fridge, Washer, Dryer, +3'],
        ['nm' => 'KitchenAid', 'ds' => "Whirlpool's premium label. Built-in dishwashers, French-door fridges, gas ranges.", 'tags' => 'Fridge, Dishwasher, Range, +3'],
        ['nm' => 'GE Appliances', 'ds' => 'Smart connectivity, Profile sub-line for high-end. Watch for control-board failures on 2015+ models.', 'tags' => 'Fridge, Range, Washer, +4'],
        ['nm' => 'Samsung', 'ds' => 'Strong on smart fridges and front-load washers. Common: ice-maker, control board, drain pump.', 'tags' => 'Fridge, Washer, Dryer, +3'],
        ['nm' => 'LG', 'ds' => 'Direct-drive washers, ThinQ smart line, French-door fridges. Common: linear compressor, board.', 'tags' => 'Fridge, Washer, Dryer, +3'],
        ['nm' => 'Bosch', 'ds' => 'German engineering, quiet dishwashers, 800 Series and benchmark fridges. OEM parts only.', 'tags' => 'Dishwasher, Fridge, Cooktop, +2'],
        ['nm' => 'Maytag', 'ds' => 'Whirlpool sub-brand. Heavy-duty washers/dryers. Famous Maytag Man = our entire crew.', 'tags' => 'Washer, Dryer, Fridge, +2'],
        ['nm' => 'Frigidaire', 'ds' => 'Electrolux subsidiary. Affordable mainstream. Common: defrost system, water valve, control board.', 'tags' => 'Fridge, Range, Dishwasher, +2'],
        ['nm' => 'Electrolux', 'ds' => 'European-style design, IQ-Touch controls. Service-friendly with modular sub-assemblies.', 'tags' => 'Fridge, Washer, Dryer, +2'],
        ['nm' => 'Kenmore', 'ds' => 'Sears-era OEM-rebadged units. We identify the actual manufacturer (Whirlpool, LG, Samsung) and parts.', 'tags' => 'Fridge, Washer, Dryer, +2'],
        ['nm' => 'Amana', 'ds' => 'Whirlpool budget label. Top-load washers, basic fridges. Very repairable, parts plentiful.', 'tags' => 'Fridge, Washer, Range'],
        ['nm' => 'Hisense', 'ds' => 'Newer entrant in U.S. mainstream. Compact fridges, induction ranges. Parts via authorized distributor.', 'tags' => 'Fridge, Range, Cooktop'],
      ],
    ],
    'prem' => [
      'eyebrow' => 'Tier 1 · Factory-authorized',
      'h2'      => 'Premium kitchen brands',
      'intro'   => "Luxury and built-in appliances require manufacturer-trained technicians and OEM parts sourced directly from the brand's distribution center. We hold factory authorization on all seven.",
      'cards'   => [
        ['seal' => 'Factory-authorized', 'nm' => 'Sub-Zero', 'ds' => 'The benchmark for built-in refrigeration. Dual-compressor sealed systems, 20+ year service life.', 'focus' => 'Specialty: refrigeration · wine'],
        ['seal' => 'Factory-authorized', 'nm' => 'Wolf', 'ds' => 'Pro-grade ranges, dual-fuel ovens, signature red knobs. Owned by Sub-Zero Group.', 'focus' => 'Specialty: ranges · ovens'],
        ['seal' => 'Factory-authorized', 'nm' => 'Viking', 'ds' => 'Commercial-style pro ranges, built-in fridges, range hoods. Old-school robust.', 'focus' => 'Specialty: ranges · refrigeration'],
        ['seal' => 'Factory-authorized', 'nm' => 'Thermador', 'ds' => 'BSH luxury sub-brand. Star-burner cooktops, Freedom induction, French-door fridges.', 'focus' => 'Specialty: cooktops · ovens'],
        ['seal' => 'Factory-authorized', 'nm' => 'Miele', 'ds' => 'German engineering top-tier. Dishwashers, coffee systems, washers, ovens. 20-year design spec.', 'focus' => 'Specialty: dishwashers · laundry'],
        ['seal' => 'Factory-authorized', 'nm' => 'Dacor', 'ds' => 'Now part of Samsung. Pro-style luxury ranges and built-in refrigeration with smart connectivity.', 'focus' => 'Specialty: ranges · fridges'],
        ['seal' => 'Factory-authorized', 'nm' => 'Fisher & Paykel', 'ds' => 'New Zealand brand. DishDrawer dishwashers, Active Smart refrigeration, ergonomic French-door units.', 'focus' => 'Specialty: refrigeration · dishwashers'],
        ['seal' => 'Authorized parts', 'nm' => 'JennAir', 'ds' => "Whirlpool's luxury label. Downdraft cooktops, wall ovens, refrigerated columns. Distinct silver finish.", 'focus' => 'Specialty: cooktops · wall ovens'],
      ],
    ],
    'com' => [
      'eyebrow' => 'B2B · Commercial',
      'h2'      => 'Commercial equipment brands',
      'intro'   => 'For restaurants, laundromats, multi-family property managers, and prep kitchens. NSF-compliant repairs, insurance billing, and Net-30 terms available.',
      'promo_eyebrow' => 'Commercial repair',
      'promo_h3'   => 'Same-day. After-hours. Net-30.',
      'promo_p'    => "We work with multi-unit operators, single restaurants, laundromats, and property managers. A broken cooler at 11 PM doesn't wait for a 9–5 service window.",
      'promo_list' => ['After-hours emergency dispatch', 'NSF/health-code-compliant work', 'Insurance & warranty billing', 'Maintenance contracts', 'Multi-unit volume pricing', 'COI on request'],
      'promo_cta'  => 'Request a B2B quote',
      'brands_h3'  => 'Commercial brands we service',
      'brands_meta'=> '14+ makers across refrigeration, cooking, & laundry',
      'cats' => [
        ['h4' => 'Refrigeration & ice', 'list' => 'True, Hoshizaki, Manitowoc, Continental, Traulsen, Beverage-Air, Turbo Air, Scotsman'],
        ['h4' => 'Cooking equipment', 'list' => 'Vulcan, Garland, Hobart, Pitco, Frymaster, Wolf Range, Imperial, Southbend'],
        ['h4' => 'Commercial laundry', 'list' => 'Speed Queen, Huebsch, UniMac, Continental Girbau, Wascomat'],
      ],
    ],
    'matrix' => [
      'eyebrow' => 'Cross-reference',
      'h2'      => 'Find brands by the appliance you need repaired',
      'intro'   => "Pick your appliance type — we'll show you every brand we service in that category. Dark-blue chips are factory-authorized; the rest are OEM-certified.",
      'hd_appl' => 'Appliance',
      'hd_brands' => 'Brands we repair',
      // Brand chips: lines starting "*" = factory-authorized (★), "+" = "more" link, else normal.
      'rows'    => [
        ['icon' => $mi['fridge'], 'nm' => 'Refrigerator', 'ct' => '21 brands', 'href' => 'service:refrigerator-repair', 'brands' => "*Sub-Zero\n*Viking\n*Thermador\n*Miele\n*Dacor\n*Fisher & Paykel\nWhirlpool\nKitchenAid\nGE\nSamsung\nLG\nBosch\nMaytag\nFrigidaire\n+7 more"],
        ['icon' => $mi['washer'], 'nm' => 'Washer', 'ct' => '13 brands', 'href' => '', 'brands' => "*Miele\nWhirlpool\nMaytag\nGE\nSamsung\nLG\nBosch\nFrigidaire\nElectrolux\nSpeed Queen\nAmana\nKenmore\n+1 more"],
        ['icon' => $mi['washer'], 'nm' => 'Dryer', 'ct' => '11 brands', 'href' => '', 'brands' => "*Miele\nWhirlpool\nMaytag\nGE\nSamsung\nLG\nBosch\nElectrolux\nFrigidaire\nSpeed Queen\nKenmore"],
        ['icon' => $mi['dishwasher'], 'nm' => 'Dishwasher', 'ct' => '14 brands', 'href' => '', 'brands' => "*Miele\n*Thermador\n*Fisher & Paykel\nBosch\nKitchenAid\nWhirlpool\nGE\nSamsung\nLG\nMaytag\nFrigidaire\nJennAir\n+2 more"],
        ['icon' => $mi['oven'], 'nm' => 'Oven / Range', 'ct' => '16 brands', 'href' => '', 'brands' => "*Wolf\n*Viking\n*Thermador\n*Miele\n*Dacor\nKitchenAid\nGE Profile\nWhirlpool\nSamsung\nLG\nBosch\nFrigidaire\n+4 more"],
        ['icon' => $mi['cooktop'], 'nm' => 'Cooktop', 'ct' => '12 brands', 'href' => '', 'brands' => "*Wolf\n*Thermador\n*Viking\n*Miele\nBosch\nGE\nKitchenAid\nWhirlpool\nSamsung\nJennAir\n+2 more"],
      ],
    ],
    'why' => [
      'eyebrow' => 'How brand repair works at HamersFix',
      'h2'      => 'Appliance brand repair',
      'intro'   => "Generic repair shops can't legally — or skillfully — touch a Sub-Zero sealed system or a Miele control board. Here's what proper brand-specific repair actually looks like.",
      'cards'   => [
        ['num' => '1', 'h3' => 'Brand-trained technicians', 'p' => "Our techs go through factory training programs for each premium brand we service. That's how Sub-Zero, Wolf, Viking, Thermador, Miele, Dacor, and Fisher & Paykel authorize us — they trained us first.", 'list' => ['Annual recertification with factory updates', 'Brand-specific diagnostic tooling on every van', 'Direct manufacturer tech-support line']],
        ['num' => '2', 'h3' => 'Genuine OEM parts only', 'p' => 'Aftermarket parts are cheaper — and they void manufacturer warranties, fail faster, and damage adjacent components. We source parts directly from manufacturer distribution centers.', 'list' => ['Common-failure parts stocked on every van', 'Specialty parts ordered same-day from distributor', 'Original spec sheets followed for every install']],
        ['num' => '3', 'h3' => 'Warranty-friendly procedures', 'p' => "If your appliance is still under manufacturer warranty, we follow their service protocol so coverage isn't voided. We also handle the paperwork on extended warranties and home-protection plans.", 'list' => ['Authorized service for AHS, Choice, Sears', 'Manufacturer warranty work direct-billed', '1-year HamersFix warranty stacks on top']],
      ],
    ],
    'faq' => [
      'eyebrow' => 'FAQ',
      'h2'      => 'Questions before you book?',
      'items'   => [
        ['q' => 'What does "factory-authorized" actually mean?', 'a' => "It means the manufacturer has certified our technicians, audited our procedures, and granted us access to their OEM parts distribution. For Sub-Zero, Wolf, Viking, Thermador, Miele, Dacor, and Fisher & Paykel, we're on the brand's official service-network roster — which protects your warranty."],
        ['q' => 'Do you charge more for premium brands?', 'a' => 'Labor is billed at the same flat-rate regardless of brand. Parts cost more on luxury brands — a Sub-Zero compressor is genuinely more expensive than a Whirlpool — but the labor flat-rate is consistent with what the brand publishes.'],
        ['q' => 'My fridge is from a brand not on your list — can you still fix it?', 'a' => 'Probably yes. We service 25+ residential brands and 14+ commercial makers, but our parts network extends further. Call us with the make and model — most lesser-known brands are rebadged from a major maker, and we can usually source parts in 1–2 days.'],
        ['q' => "Why won't generic shops touch my Sub-Zero?", 'a' => "Sub-Zero sealed-system work requires EPA Section 608 certification (a federal license) plus brand-specific training. Without authorization, shops can't source OEM parts and can't legally open the refrigerant system. Working without 608 is a federal violation."],
        ['q' => 'Can you service smart appliances (Wi-Fi connected)?', 'a' => "Yes — Samsung SmartThings, LG ThinQ, GE SmartHQ, Bosch Home Connect, and Whirlpool's smart line. Our diagnostic tablets pair directly with these systems to read error codes and run remote tests."],
        ['q' => 'What if my appliance is under manufacturer warranty?', 'a' => 'Bring it up when you call. For factory-authorized brands we can perform warranty work direct-billed to the manufacturer. For others, we can perform repairs the manufacturer recommends, with you handling the reimbursement.'],
        ['q' => 'Do you work with home warranty companies?', 'a' => "Yes — we're an approved technician for American Home Shield, Choice Home Warranty, Sears Home Services, and several smaller plans. We'll coordinate with your warranty company directly."],
        ['q' => 'Will using your repair void my appliance warranty?', 'a' => "No. Magnuson-Moss Warranty Act protects your right to use independent service without voiding the warranty, as long as parts and procedures are manufacturer-spec — which ours always are. For factory-authorized brands, we're literally the manufacturer's chosen service network."],
      ],
    ],
    'final' => [
      'eyebrow' => 'Ready when you are',
      'h2'      => "Let's get your appliance working again.",
      'intro'   => "One call, technician at your door today. We're open 7 days a week. Real dispatcher answers — every brand we listed is in our daily rotation.",
      'card_lbl'=> 'Call our dispatcher',
      'signals' => [
        ['b' => 'Factory-authorized', 'sub' => '7 premium brands'],
        ['b' => '100% OEM parts', 'sub' => 'No aftermarket'],
        ['b' => '1-year warranty', 'sub' => 'Parts & labor'],
        ['b' => 'Upfront quote', 'sub' => 'Approved before we start'],
      ],
    ],
  ];
  return $d;
}

/** Cached defaults for the Appliance Repair Services landing page. */
function hf_services_page_defaults() {
  static $d = null;
  if ($d !== null) return $d;
  $home = hf_defaults()['home'];
  $d = [
    'hero' => [
      'eyebrow' => 'Residential appliance repair',
      'h1'      => 'Appliance repair services for <em>every room</em>',
      'lede'    => 'Refrigerators, washers, dryers, dishwashers, ovens and cooktops — fixed right, often the same day. EPA-certified technicians, flat-rate pricing, and a 1-year parts & labor warranty on every repair.',
      'book_label' => 'Book online →',
    ],
    'services' => [
      'eyebrow' => $home['services_eyebrow'],
      'h2'      => $home['services_h2'],
      'intro'   => 'Kitchen and laundry, mainstream and high-end. Pick your appliance for the problems we repair, the brands we service, and same-day booking.',
    ],
    'steps' => [
      'eyebrow' => $home['steps_eyebrow'],
      'h2'      => $home['steps_h2'],
      'intro'   => $home['steps_intro'],
    ],
    'cta' => [
      'eyebrow' => $home['cta_eyebrow'],
      'h2'      => $home['cta_h2'],
      'intro'   => $home['cta_intro'],
    ],
  ];
  return $d;
}

/** Cached defaults for the Reviews page. */
function hf_reviews_defaults() {
  static $d = null;
  if ($d !== null) return $d;
  $D = hf_defaults();
  $d = [
    'hero' => [
      'eyebrow' => 'Verified reviews',
      'h1'      => 'What <em>Northeast Georgia</em> says about us',
      'lede'    => 'Real reviews from real neighbors across Google, BBB, Yelp, and HomeAdvisor — refrigerators to ranges, homes to restaurants. No curated highlight reel.',
    ],
    'agg'     => $D['reviews_agg'],   // score / stars / title / sources
    'reviews' => $D['reviews'],       // testimonials (add more in the admin)
    'cta' => [
      'eyebrow' => $D['home']['cta_eyebrow'],
      'h2'      => $D['home']['cta_h2'],
      'intro'   => $D['home']['cta_intro'],
    ],
  ];
  return $d;
}

/**
 * Cached defaults for the Service Areas page.
 *
 * Mirrors the inline defaults in template-service-areas.php so the Demo Data
 * importer can populate the page's ACF fields with the exact same content the
 * template renders by default. hero_eyebrow is computed from the live ZIP list.
 */
function hf_service_areas_defaults() {
  static $d = null;
  if ($d !== null) return $d;

  $cities = function_exists('hf_count_cities') ? hf_count_cities() : 14;
  $zips   = function_exists('hf_count_zips') ? hf_count_zips() : 18;

  $d = [
    'hero_eyebrow' => sprintf('%1$d cities · %2$d ZIPs · same-day', $cities, $zips),
    'hero_h1'      => 'Serving the <em>Northeast Georgia</em> — 14 cities, one local team.',
    'hero_lede'    => 'We cover the Gwinnett, Barrow and Athens area end-to-end. 8 service vans on the road, 6 days a week, with parts for the top 12 brands stocked on every truck.',
    'book_h2'      => 'Ready to book?',
    'book_p'       => "You're on our coverage page — pick the option that fits. Booking takes about a minute through our scheduler.",
    'stat_arrival' => '2.4',
    'stat_vans'    => '8',
    'stat_ontime'  => '96',
    'map_h2'       => "Where you'll find our vans",
    'map_intro'    => 'Gwinnett and Athens corridor — across Gwinnett, Barrow, Walton, Jackson and Oconee — from Lawrenceville east to Statham, north through Hoschton and Braselton, south to Monroe and Loganville. Beyond? We refer to vetted partners.',
    'cities_h2'    => 'Cities we serve, grouped by region',
    'cities_intro' => 'Click your city for hyper-local info — local technician profiles, response time, top brands serviced in that ZIP cluster.',
    'regions' => [
      ['pill' => 'Tier 1 · Same-day priority', 'featured' => true, 'pill_cta' => false, 'title' => 'Gwinnett · Core', 'meta' => '6 cities · HQ region',
       'cities' => ['Bethlehem', 'Braselton', 'Snellville', 'Monroe', 'Grayson', 'Statham', 'Watkinsville', 'Loganville'],
       'stats' => [['Avg arrival', '1.8 hr'], ['Same-day rate', '94%'], ['Jobs/month', '410']]],
      ['pill' => 'Tier 1 · Same-day', 'featured' => false, 'pill_cta' => false, 'title' => 'Barrow & Jackson · North', 'meta' => '4 cities · daily routes',
       'cities' => ['Lawrenceville', 'Winder', 'Statham', 'Braselton', 'Hoschton', 'Auburn'],
       'stats' => [['Avg arrival', '2.4 hr'], ['Same-day rate', '88%'], ['Jobs/month', '295']]],
      ['pill' => 'Tier 2 · By appointment', 'featured' => false, 'pill_cta' => true, 'title' => 'Walton & Oconee · Outer ring', 'meta' => '4 cities · ~25 min from HQ',
       'cities' => ['Monroe', 'Loganville', 'Bogart', 'Watkinsville'],
       'stats' => [['Avg arrival', '3.2 hr'], ['Same-day rate', '72%'], ['Jobs/month', '180']]],
    ],
    'resp_h2'    => 'Response time by zone',
    'resp_intro' => 'Real arrival data from the past 12 months. We track every call from booking to the tech ringing the doorbell — and we publish it.',
    'zones' => [
      ['level' => 'fast', 'lbl' => 'Gwinnett · Core', 'time' => '1.8', 'suffix' => 'hr', 'area' => 'Bethlehem & ring', 'desc' => 'From booking to doorbell. HQ proximity + dense routes keep this zone fastest.', 'bar' => ''],
      ['level' => 'fast', 'lbl' => 'Barrow & Jackson · North', 'time' => '2.4', 'suffix' => 'hr', 'area' => 'Lawrenceville, Winder', 'desc' => 'Two dedicated vans cover this zone all day; same-day in 88% of cases.', 'bar' => '85%'],
      ['level' => 'med', 'lbl' => 'Athens corridor · South', 'time' => '3.2', 'suffix' => 'hr', 'area' => 'Lawrenceville, Auburn', 'desc' => 'Slightly longer routing. Call before 11 AM for same-day; after, next morning.', 'bar' => ''],
      ['level' => 'slow', 'lbl' => 'Edge zones', 'time' => 'Next', 'suffix' => 'day', 'area' => 'Outer ring', 'desc' => 'Outside our daily route. We schedule for the following morning at first window.', 'bar' => ''],
    ],
    'com_h2'    => 'Restaurants & multi-unit property managers — anywhere in our zone.',
    'com_intro' => 'Single restaurants, laundromats, multi-family complexes, prep kitchens. Same map, expanded service hours. After-hours emergency dispatch; maintenance contracts available for recurring portfolios.',
    'com_features' => ['After-hours emergency dispatch', 'NSF/health-code compliance', 'Insurance & warranty billing', 'Net-30 terms available', 'Multi-unit volume pricing', 'COI on request'],
    'com_stats' => [['Active commercial accounts', '54', ''], ['Avg after-hours response', '2.1', 'hr'], ['Multi-unit property portfolios', '8', ''], ['Repeat-business rate', '92', '%']],
    'faq_h2' => 'Questions about coverage',
    'faq' => [
      ['q' => 'Do you charge extra for outer-ring cities?', 'a' => 'No — flat-rate pricing is identical across all 14 cities. The only difference is scheduling: outer-ring areas may be next-day rather than same-day.'],
      ['q' => "What if my city isn't listed?", 'a' => "Call us — we may still cover you, or we'll refer a vetted partner. We're expanding our coverage area regularly."],
      ['q' => 'How fast can you actually get here?', 'a' => 'In our core Gwinnett zone, often within 2 hours. Outer areas, same-day if you call before noon, otherwise next morning.'],
      ['q' => 'Do you cover commercial accounts everywhere?', 'a' => 'Yes — commercial service covers our entire area with after-hours emergency dispatch, including the outer ring.'],
    ],
    'final_h2'    => 'Tech at your door. Today, most likely.',
    'final_intro' => "One call to a real dispatcher. Tell us your city and the appliance — we'll quote a flat rate and an arrival window on the spot.",
    'final_signals' => [
      ['b' => 'Same-day across 14 cities', 'sub' => 'Call before noon'],
      ['b' => '1-year warranty', 'sub' => 'Parts & labor'],
      ['b' => 'Flat-rate pricing', 'sub' => 'All 14 cities'],
    ],
  ];
  return $d;
}
