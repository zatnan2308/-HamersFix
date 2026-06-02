<?php
/**
 * HamersFix — default content for the two Maintenance page templates:
 * Appliance Deep Cleaning and Air Vent Cleaning. Transcribed 1:1 from the
 * design mocks (Appliance-Deep-Cleaning.html, Air-Vent-Cleaning.html) so the
 * templates render pixel-perfect before any ACF data is entered; every value
 * is overridable via the matching page field group.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/** Cached defaults for the Appliance Deep Cleaning page. */
function hf_deep_cleaning_defaults() {
  static $d = null;
  if ($d !== null) return $d;

  $d = [
    'hero' => [
      'eyebrow'     => 'Maintenance · safe, family-friendly products',
      'h1'          => 'Appliance maintenance & deep cleaning',
      'lede'        => 'Professional deep cleaning for your refrigerator and oven. We remove odors, grease, and food residue with safe products and thorough attention to hard-to-reach areas — keeping your appliances sanitary, efficient, and lasting longer.',
      'image'       => 'https://images.unsplash.com/photo-1556911220-bff31c812dba?w=1100&auto=format&fit=crop&q=80',
      'image_alt'   => 'Clean modern kitchen with stainless refrigerator and oven',
      'badge_text'  => 'Deep clean · sanitize',
      'tag_small'   => 'Fridge & oven',
      'tag_text'    => 'Spotless, odor-free, efficient',
      'pills' => [
        ['text' => 'Safe cleaning products',    'dot' => 'g'],
        ['text' => 'Residential & commercial',  'dot' => 'b'],
        ['text' => 'Refrigerator + oven combo', 'dot' => 'o'],
      ],
      'trust' => [
        ['ic' => '✓', 'style' => 'green',   'label' => 'Eliminates odors'],
        ['ic' => '✓', 'style' => 'green',   'label' => 'Sanitized surfaces'],
        ['ic' => '★', 'style' => 'default', 'label' => 'Extends appliance life'],
        ['ic' => '$', 'style' => 'orange',  'label' => 'Bundle & save'],
      ],
    ],
    'services' => [
      'eyebrow' => 'Two deep-cleaning services',
      'h2'      => 'What we deep clean',
      'intro'   => 'Book either service on its own, or bundle both for a single, money-saving visit. Every clean uses safe products and reaches the spots a wipe-down misses.',
      'blocks' => [
        [
          'id'       => 'refrigerator',
          'media'    => 'fridge',
          'eyebrow'  => 'Refrigerator deep cleaning',
          'h2'       => 'Refrigerator deep cleaning',
          'sub'      => 'Professional refrigerator cleaning service',
          'chip'     => 'Refrigerator deep clean',
          'cta'      => 'Book refrigerator cleaning →',
          'items' => [
            'Interior deep cleaning',
            'Shelves and drawers removal & sanitization',
            'Removal of odors and food residue',
            'Gasket cleaning',
            'Drain line cleaning (if accessible)',
            'Freezer compartment cleaning',
          ],
        ],
        [
          'id'       => 'oven',
          'media'    => 'oven',
          'eyebrow'  => 'Oven deep cleaning',
          'h2'       => 'Oven deep cleaning',
          'sub'      => 'Professional oven cleaning service',
          'chip'     => 'Oven deep clean',
          'cta'      => 'Book oven cleaning →',
          'items' => [
            'Interior degreasing',
            'Removal of baked-on grease and carbon buildup',
            'Oven door glass cleaning',
            'Rack cleaning',
            'Safe cleaning products',
            'Electric and gas ovens',
          ],
        ],
      ],
    ],
    'combo' => [
      'badge'  => 'Combo special',
      'h2'     => 'Refrigerator + oven deep cleaning',
      'intro'  => 'Save time and money by scheduling both services together. One visit, one appointment, two appliances left spotless, sanitary, and running efficiently.',
      'panel_title' => 'Both appliances, one visit',
      'panel_meta'  => 'Everything included',
      'rows' => [
        'Full refrigerator interior & freezer',
        'Oven degrease, glass & racks',
        'Odor & residue removal throughout',
        'Safe products, single scheduled visit',
      ],
    ],
    'why' => [
      'eyebrow' => 'Why it matters',
      'h2'      => 'Cleaner appliances, working better for longer',
      'intro'   => 'Deep cleaning helps eliminate odors, grease buildup, food residue, and other contaminants — while keeping your appliances sanitary and helping extend their service life.',
      'cards' => [
        ['icon' => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><path d="M16 5c4 6 7 9 7 13a7 7 0 0 1-14 0c0-4 3-7 7-13z"/><path d="M13 18a3 3 0 0 0 6 0"/></svg>', 'h3' => 'Eliminates odors', 'p' => 'We clear out the sources of smell — spills, residue, and trapped moisture — so the inside stays fresh.'],
        ['icon' => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><rect x="6" y="6" width="20" height="20" rx="3"/><path d="M11 21l4-10 3 6 2-3 1 2"/></svg>', 'h3' => 'Removes grease & residue', 'p' => 'Baked-on grease, carbon buildup, and food residue are degreased and wiped from hard-to-reach areas.'],
        ['icon' => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><path d="M16 4l10 4v7c0 6-4 10-10 13C10 25 6 21 6 15V8z"/><path d="M12 16l3 3 6-6"/></svg>', 'h3' => 'Sanitizes surfaces', 'p' => 'Shelves, drawers, racks, and gaskets are cleaned and sanitized for a healthier place to store and cook food.'],
        ['icon' => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><circle cx="16" cy="16" r="11"/><path d="M16 9v7l5 3"/></svg>', 'h3' => 'Extends appliance life', 'p' => 'Clean coils, drains, and seals help appliances run efficiently and avoid the strain that shortens their lifespan.'],
      ],
    ],
    'how' => [
      'eyebrow' => 'Simple process',
      'h2'      => 'How a deep-clean visit works',
      'intro'   => 'Book a time, we arrive prepared, and you get spotless appliances the same day — no mess left behind.',
      'steps' => [
        ['num' => '1', 'h3' => 'Book a time',         'p' => 'Call or book online and pick refrigerator, oven, or the combo. Tell us your appliance types so we arrive with the right supplies.', 'time' => '~60 seconds'],
        ['num' => '2', 'h3' => 'We deep clean',        'p' => 'Our technician removes shelves and racks, degreases and sanitizes every surface, and reaches the gaskets, drains, and corners a wipe-down misses.', 'time' => 'On site'],
        ['num' => '3', 'h3' => 'Spotless & efficient', 'p' => 'Everything is reassembled, wiped down, and odor-free — your appliances left sanitary and running at their best.', 'time' => 'Same day'],
      ],
    ],
    'faq' => [
      'eyebrow' => 'Good to know',
      'h2'      => 'Deep cleaning questions',
      'items' => [
        ['q' => 'Are the cleaning products safe around food and family?', 'a' => 'Yes. We use safe cleaning products throughout, with thorough rinsing of food-contact surfaces, so your refrigerator and oven are ready to use right after we finish.'],
        ['q' => 'Do you clean both gas and electric ovens?', 'a' => 'We deep clean both electric and gas ovens — degreasing the interior, cleaning the door glass, and washing the racks. We work carefully around burners, igniters, and elements.'],
        ['q' => 'How long does a deep clean take?', 'a' => 'Most single-appliance cleans are completed in one visit. A refrigerator-plus-oven combo is scheduled together so both are done on the same appointment.'],
        ['q' => 'Can I book the combo to save money?', 'a' => 'Yes — scheduling the refrigerator and oven together saves time and money over booking two separate visits. Choose the combo when you book or ask our dispatcher.'],
        ['q' => 'Will deep cleaning help my appliance run better?', 'a' => 'Clean coils, drains, gaskets, and interiors help appliances run more efficiently and can help extend their service life by reducing strain and buildup.'],
        ['q' => 'Do you offer cleaning for businesses too?', 'a' => 'Yes. We provide deep cleaning for residential and commercial kitchens. Call us to arrange recurring or one-time service for your business.'],
      ],
    ],
    'final' => [
      'eyebrow' => 'Ready when you are',
      'h2'      => 'Book a refrigerator & oven deep clean.',
      'intro'   => "One call and we'll have your appliances spotless, sanitary, and running efficiently — using safe products, with no mess left behind.",
      'signals' => [
        ['title' => 'Safe products',     'sub' => 'Food-safe, family-friendly'],
        ['title' => 'Combo savings',     'sub' => 'Fridge + oven, one visit'],
        ['title' => 'Sanitized',         'sub' => 'Shelves, racks & gaskets'],
        ['title' => 'Res. & commercial', 'sub' => 'Homes and businesses'],
      ],
    ],
  ];
  return $d;
}

/** Cached defaults for the Air Vent Cleaning page. */
function hf_air_vent_defaults() {
  static $d = null;
  if ($d !== null) return $d;

  $d = [
    'hero' => [
      'eyebrow'    => 'Maintenance · residential & commercial',
      'h1'         => 'Air vent cleaning',
      'lede'       => 'Our professional air vent cleaning service removes dust, dirt, and debris from your air vents and ventilation openings — improving airflow, reducing dust buildup throughout your home, and helping maintain cleaner, healthier indoor air.',
      'price_from' => '$79',
      'badge_text' => 'Dust & debris removed',
      'tag_small'  => 'Cleaner air',
      'tag_text'   => 'Improved airflow & ventilation',
      'trust' => [
        ['ic' => '✓', 'style' => 'green',   'label' => 'Better indoor air'],
        ['ic' => '✓', 'style' => 'green',   'label' => 'Improved airflow'],
        ['ic' => '★', 'style' => 'default', 'label' => 'Less dust at home'],
        ['ic' => '✓', 'style' => 'orange',  'label' => 'Safe methods'],
      ],
    ],
    'included' => [
      'eyebrow' => 'Professional air vent cleaning service',
      'h2'      => "What's included",
      'intro'   => 'A thorough, professional clean of your vents and grilles using safe methods — for residential and commercial properties alike.',
      'items' => [
        'Cleaning of air vents and grilles',
        'Removal of dust, dirt, and debris',
        'Improved airflow and ventilation efficiency',
        'Reduction of dust accumulation in the home',
        'Residential and commercial properties',
        'Professional and safe cleaning methods',
      ],
    ],
    'benefits' => [
      'eyebrow' => 'Why clean your vents',
      'h2'      => 'Cleaner air, better airflow, less dust',
      'intro'   => 'Clean vents help improve indoor air quality by removing the dust, dirt, and debris that builds up in your ventilation openings over time.',
      'cards' => [
        ['icon' => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><path d="M4 18h13a4 4 0 1 0-4-4"/><path d="M4 24h17a4 4 0 1 1-4 4"/></svg>', 'h3' => 'Better indoor air quality', 'p' => 'Removing built-up dust and debris from vents helps keep the air you breathe at home cleaner and fresher.'],
        ['icon' => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><path d="M6 12h14a4 4 0 1 0-4-4"/><path d="M6 20h18a4 4 0 1 1-4 4"/></svg>', 'h3' => 'Improved airflow', 'p' => 'Clear vents and grilles let air move freely, improving ventilation efficiency throughout the property.'],
        ['icon' => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><circle cx="9" cy="11" r="2"/><circle cx="20" cy="8" r="1.6"/><circle cx="23" cy="18" r="2.2"/><circle cx="13" cy="21" r="1.6"/><path d="M5 27h22"/></svg>', 'h3' => 'Less dust buildup', 'p' => 'Cleaner vents mean less dust circulating and settling on surfaces throughout your home.'],
        ['icon' => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><path d="M16 4l10 4v7c0 6-4 10-10 13C10 25 6 21 6 15V8z"/><path d="M12 16l3 3 6-6"/></svg>', 'h3' => 'Healthier environment', 'p' => 'A cleaner ventilation system helps maintain a healthier, more comfortable indoor environment.'],
      ],
    ],
    'props' => [
      'eyebrow' => 'Who we serve',
      'h2'      => 'Residential & commercial properties',
      'intro'   => "The same professional, safe cleaning methods — sized to the space, whether it's a single-family home or a busy commercial building.",
      'cards' => [
        [
          'variant' => 'res',
          'icon'    => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><path d="M5 14L16 5l11 9"/><path d="M8 12v14h16V12"/><rect x="13" y="18" width="6" height="8"/></svg>',
          'h3'      => 'Homes',
          'p'       => 'Cleaner air and less dust where your family lives, sleeps, and breathes every day.',
          'items'   => ['Supply & return vent grilles', 'Bedroom, living & kitchen vents', 'Reduced dust on furniture & floors'],
        ],
        [
          'variant' => 'com',
          'icon'    => '<svg viewBox="0 0 32 32" class="ic-stroke" aria-hidden="true"><rect x="6" y="5" width="20" height="22"/><path d="M11 10h3M18 10h3M11 15h3M18 15h3M11 20h3M18 20h3"/></svg>',
          'h3'      => 'Businesses',
          'p'       => 'Comfortable, cleaner air for staff and customers across offices, shops, and facilities.',
          'items'   => ['Offices, retail & facilities', 'One-time or recurring service', 'Scheduled around your hours'],
        ],
      ],
    ],
    'how' => [
      'eyebrow' => 'Simple process',
      'h2'      => 'How vent cleaning works',
      'intro'   => 'Book a time, we arrive prepared, and we leave your vents clean and your airflow improved — with no mess behind.',
      'steps' => [
        ['num' => '1', 'h3' => 'Book a time',        'p' => "Call or book online. Tell us roughly how many vents and whether it's a home or a business so we come prepared.", 'time' => 'From $79'],
        ['num' => '2', 'h3' => 'We clean the vents', 'p' => 'Our technician removes dust, dirt, and debris from each vent and grille using professional, safe cleaning methods.', 'time' => 'On site'],
        ['num' => '3', 'h3' => 'Breathe easier',     'p' => 'Airflow is improved, dust buildup is reduced, and your indoor environment is left cleaner and healthier.', 'time' => 'Same day'],
      ],
    ],
    'price' => [
      'h3'   => 'Professional air vent cleaning, starting at $79',
      'intro'=> 'Pricing depends on the number of vents and the size of your property. Call us for a quick, clear quote — no surprises, just cleaner air.',
      'from_label' => 'Starting at',
      'amount'     => '$79',
      'note'       => 'Residential & commercial',
      'cta'        => 'Call for a quote',
    ],
    'final' => [
      'eyebrow' => 'Ready when you are',
      'h2'      => 'Cleaner vents, fresher air.',
      'intro'   => 'Book professional air vent cleaning and improve your airflow, cut dust buildup, and help keep your indoor air cleaner and healthier.',
      'signals' => [
        ['title' => 'From $79',          'sub' => 'Clear, upfront pricing'],
        ['title' => 'Safe methods',      'sub' => 'Professional & thorough'],
        ['title' => 'Better airflow',    'sub' => 'Improved ventilation'],
        ['title' => 'Res. & commercial', 'sub' => 'Homes and businesses'],
      ],
    ],
  ];
  return $d;
}
