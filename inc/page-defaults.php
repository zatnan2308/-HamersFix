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

  $d = [
    'hero' => [
      'eyebrow' => 'Contact HamersFix',
      'h1'      => 'Talk to a real person about your <em>appliance repair</em>',
      'lede'    => 'No phone trees, no call centers. Call, text, or book online and reach a real local dispatcher who can schedule your repair — usually same or next day.',
    ],
    'reach' => [
      'eyebrow' => 'Four ways to reach us',
      'h2'      => "Pick whatever's easiest",
      'intro'   => 'Phone is fastest for same-day service. For everything else, we answer texts, emails, and online bookings throughout the day.',
      'cards'   => [
        ['kind' => 'call',  'primary' => true,  'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>', 'lbl' => 'Call us', 'ds' => 'Fastest — real dispatcher, < 60-second wait'],
        ['kind' => 'text',  'primary' => false, 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>', 'lbl' => 'Text us', 'ds' => 'Send a photo of the appliance & model sticker'],
        ['kind' => 'email', 'primary' => false, 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg>', 'lbl' => 'Email us', 'ds' => 'Best for quotes, invoices & commercial accounts'],
        ['kind' => 'book',  'primary' => false, 'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>', 'lbl' => 'Book online', 'val' => 'Schedule a visit', 'ds' => 'Pick your slot — 60-second flow, SMS confirmation'],
      ],
    ],
    'final' => [
      'eyebrow' => 'Phone is faster than any form',
      'h2'      => "One call and you're on the schedule.",
      'intro'   => "Open 7 days a week with a real dispatcher. Tell us the appliance and the symptom — we'll book your window on the spot.",
      'card_lbl'=> 'Call our dispatcher',
      'signals' => [
        ['b' => 'Same-day service', 'sub' => 'Call before noon'],
        ['b' => '1-year warranty', 'sub' => 'Parts & labor'],
        ['b' => 'EPA-certified techs', 'sub' => 'Licensed & insured'],
      ],
    ],
  ];
  return $d;
}
