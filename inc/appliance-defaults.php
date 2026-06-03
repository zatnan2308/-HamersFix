<?php
/**
 * HamersFix — per-appliance default content (Washer, Dryer, Dishwasher, Oven,
 * Cooktop). The Refrigerator is the reference service and carries its own full
 * content in inc/service-defaults.php; this file fills the "Problems we repair"
 * and "FAQ" sections for the other five services so each single-service page
 * has substantial, appliance-specific content out of the box.
 *
 * Content is ORIGINAL (written from general appliance-repair domain knowledge,
 * not copied from any third-party site) and factual. Marketing/unverifiable
 * claims are deliberately avoided here — pricing/warranty wording mirrors the
 * theme defaults and stays editable in the admin.
 *
 * Keyed by the service `icon` slug: washer | dryer | dishwasher | oven | cooktop.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/** @return array Per-appliance Problems + FAQ defaults, keyed by icon slug. */
function hf_appliance_defaults() {
  static $d = null;
  if ($d !== null) return $d;

  // Reusable stroke icons (hf_icon() passes inline <svg> through as-is).
  $ic = [
    'drop'  => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M12 3c-3 5-6 9-6 12a6 6 0 0 0 12 0c0-3-3-7-6-12z"/></svg>',
    'spin'  => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="3"/></svg>',
    'drain' => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M12 3v11M8 10l4 4 4-4M5 20h14"/></svg>',
    'wave'  => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M3 12h2l2-6 4 12 4-9 2 3h4"/></svg>',
    'power' => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M12 3v9"/><path d="M6.6 6.6a8 8 0 1 0 10.8 0"/></svg>',
    'board' => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><line x1="7" y1="9" x2="17" y2="9"/><line x1="7" y1="13" x2="13" y2="13"/></svg>',
    'flame' => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M12 3c-3 5-6 8-6 11a6 6 0 0 0 12 0c0-2-1-3-2-5-1 2-2 2-3 1 0-3 0-5-1-7z"/></svg>',
    'heat'  => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M14 14V5a2 2 0 0 0-4 0v9a4 4 0 1 0 4 0z"/></svg>',
    'gear'  => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path d="M12 4v2M12 18v2M4 12h2M18 12h2M6 6l1.5 1.5M16.5 16.5L18 18M6 18l1.5-1.5M16.5 7.5L18 6"/></svg>',
    'fan'   => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><circle cx="12" cy="12" r="2"/><path d="M12 10c0-4 1-6 3-6s2 4-1 6M14 12c4 0 6 1 6 3s-4 2-6-1M12 14c0 4-1 6-3 6s-2-4 1-6M10 12c-4 0-6-1-6-3s4-2 6 1"/></svg>',
    'bolt'  => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
    'spark' => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M12 2v5M12 17v5M4.2 7l3.5 2M16.3 15l3.5 2M19.8 7l-3.5 2M7.7 15l-3.5 2"/><circle cx="12" cy="12" r="2"/></svg>',
    'crack' => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M8 4l3 7-2 3 3 6"/></svg>',
    'door'  => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><rect x="5" y="3" width="14" height="18" rx="2"/><circle cx="15" cy="12" r="1" fill="currentColor"/></svg>',
    'temp'  => '<svg viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>',
  ];

  $d = [

    /* ───────────── WASHER ───────────── */
    'washer' => [
      'problems' => [
        'eyebrow' => 'Common issues we see weekly',
        'h2'      => 'Washer problems we repair',
        'intro'   => 'Top-load and front-load washers from every major brand. Most failures are diagnosed on the first visit, and we carry the common-failure parts on the van.',
        'items'   => [
          ['icon' => $ic['drain'], 'title' => "Won't drain", 'desc' => 'Water sits in the drum after the cycle. Usually a clogged drain pump or hose, a blocked filter, or a stray item caught in the pump.'],
          ['icon' => $ic['spin'],  'title' => "Won't spin", 'desc' => 'Clothes come out soaking wet. Common causes are a worn drive belt, a failed lid or door-lock switch, the motor coupler, or an off-balance load sensor.'],
          ['icon' => $ic['drop'],  'title' => 'Leaking water', 'desc' => 'A puddle under the machine. We trace it to a cracked hose, a worn door boot or tub seal, loose fittings, or a failing pump.'],
          ['icon' => $ic['wave'],  'title' => 'Shaking or walking', 'desc' => 'The drum bangs or the unit moves across the floor. Worn shock absorbers, broken suspension springs, or feet that need leveling.'],
          ['icon' => $ic['power'], 'title' => "Won't start", 'desc' => 'A dead panel or a cycle that never begins. We test the lid switch, door interlock, thermal fuse, and control board.'],
          ['icon' => $ic['board'], 'title' => 'Error codes', 'desc' => 'A flashing or beeping display. We read the manufacturer code and trace it to the real fault — a sensor, valve, or board.'],
          ['icon' => $ic['drop'],  'title' => "Won't fill or fills slowly", 'desc' => 'A clogged or failed water inlet valve, a kinked supply hose, or low household water pressure.'],
          ['icon' => $ic['gear'],  'title' => 'Loud noise during wash', 'desc' => 'Grinding or rumbling often points to worn drum bearings, the tub bearing, or a foreign object in the outer tub.'],
        ],
      ],
      'faq' => [
        'eyebrow' => 'FAQ',
        'h2'      => 'Washer repair questions',
        'items'   => [
          ['q' => 'Do you repair both top-load and front-load washers?', 'a' => 'Yes — both styles, plus high-efficiency and stacked units, across all major brands.'],
          ['q' => 'Is it worth repairing my washer or should I replace it?', 'a' => 'As a rule of thumb, if the repair costs less than about half the price of a comparable new machine and yours is under roughly 8–10 years old, repair is the better value. We will tell you honestly if it is not.'],
          ['q' => 'Why won\'t my washer spin or drain?', 'a' => 'Most often a clogged pump or drain hose, a worn drive belt, or a failed lid/door-lock switch. We test the likely causes before replacing anything.'],
          ['q' => 'How long does a typical washer repair take?', 'a' => 'Most repairs are finished in a single visit, usually 45–90 minutes. If a part has to be ordered, we typically return within 24–48 hours.'],
          ['q' => 'How much does a service call cost?', 'a' => 'You get a flat-rate written quote before any work begins, so you approve the price before we start.'],
          ['q' => 'Do you warranty the work?', 'a' => 'Yes — every repair is backed by a 3-month parts & labor warranty.'],
        ],
      ],
    ],

    /* ───────────── DRYER ───────────── */
    'dryer' => [
      'problems' => [
        'eyebrow' => 'Common issues we see weekly',
        'h2'      => 'Dryer problems we repair',
        'intro'   => 'Gas and electric dryers, vented and condenser. Several of these faults are also a fire-safety issue, so we restore safe airflow as part of the repair.',
        'items'   => [
          ['icon' => $ic['heat'],  'title' => 'Not heating', 'desc' => 'The drum turns but clothes stay damp or cold. On electric units it is usually the heating element, thermal fuse, or thermostat; on gas, the igniter or gas valve.'],
          ['icon' => $ic['spin'],  'title' => "Won't tumble", 'desc' => 'The drum will not turn. Typically a broken drive belt, a seized idler pulley, or a failed motor.'],
          ['icon' => $ic['fan'],   'title' => 'Takes too long to dry', 'desc' => 'Weak airflow from a clogged lint filter, a blocked vent, or a long restricted duct run. We clean the full path and restore airflow.'],
          ['icon' => $ic['temp'],  'title' => 'Overheats or shuts off', 'desc' => 'Restricted venting or a failing cycling thermostat trips the safety. We find why it is overheating, not just reset it.'],
          ['icon' => $ic['gear'],  'title' => 'Noisy — squeal or thump', 'desc' => 'Worn drum rollers, glide bearings, the idler pulley, or a worn belt. We replace the worn parts and the noise goes away.'],
          ['icon' => $ic['power'], 'title' => "Won't start", 'desc' => 'A dead dryer usually comes down to the door switch, thermal fuse, start switch, or control board.'],
          ['icon' => $ic['wave'],  'title' => 'Vent or duct blockage', 'desc' => 'Lint buildup is the leading cause of dryer fires. We clear the duct, cut dry time, and improve safety.'],
          ['icon' => $ic['board'], 'title' => 'Error codes or controls', 'desc' => 'A blank panel or fault code. We read the code and trace it to the sensor or control board.'],
        ],
      ],
      'faq' => [
        'eyebrow' => 'FAQ',
        'h2'      => 'Dryer repair questions',
        'items'   => [
          ['q' => 'Do you service gas and electric dryers?', 'a' => 'Yes — both gas and electric, vented and condenser, across all major brands.'],
          ['q' => 'My dryer runs but takes forever to dry — what\'s wrong?', 'a' => 'Almost always airflow: a clogged lint filter or a blocked vent duct. We clean the full run and confirm the heat and thermostat are working.'],
          ['q' => 'Is a clogged dryer vent really dangerous?', 'a' => 'Yes. Lint is highly flammable and a restricted vent is a common cause of dryer fires. We recommend cleaning the vent at least once a year.'],
          ['q' => 'Should I repair or replace my dryer?', 'a' => 'If the repair is under about half the cost of a new unit and yours is under roughly 8–10 years old, repair usually makes sense. We will be straight with you either way.'],
          ['q' => 'How long does a dryer repair take?', 'a' => 'Most repairs are completed in one visit, around 45–90 minutes. Ordered parts typically arrive within 24–48 hours.'],
          ['q' => 'What does it cost and is the work guaranteed?', 'a' => 'You get a flat-rate quote up front before any work begins, and every repair carries a 3-month parts & labor warranty.'],
        ],
      ],
    ],

    /* ───────────── DISHWASHER ───────────── */
    'dishwasher' => [
      'problems' => [
        'eyebrow' => 'Common issues we see weekly',
        'h2'      => 'Dishwasher problems we repair',
        'intro'   => 'Built-in and portable dishwashers from every major brand. Most issues come down to water in, water out, or heat — and most are fixed on the first visit.',
        'items'   => [
          ['icon' => $ic['drain'], 'title' => 'Not draining', 'desc' => 'Standing water in the bottom of the tub. Usually a clogged filter or drain hose, a blocked air gap, or a failed drain pump.'],
          ['icon' => $ic['spin'],  'title' => 'Not cleaning dishes', 'desc' => 'Dishes come out gritty. Common causes are clogged spray arms, a worn wash pump, water that is not hot enough, or a detergent/loading issue.'],
          ['icon' => $ic['drop'],  'title' => 'Leaking onto the floor', 'desc' => 'We trace leaks to the door gasket, tub seal, hose connections, or a stuck float switch.'],
          ['icon' => $ic['power'], 'title' => "Won't start", 'desc' => 'A dead panel or a cycle that never runs. We check the door latch switch, thermal fuse, wiring, and control board.'],
          ['icon' => $ic['drop'],  'title' => 'Not filling with water', 'desc' => 'Typically a failed water inlet valve or a float assembly that is stuck closed.'],
          ['icon' => $ic['heat'],  'title' => 'Not drying', 'desc' => 'A burned-out heating element or a vent/fan fault. We test the element and advise on rinse-aid where it helps.'],
          ['icon' => $ic['wave'],  'title' => 'Bad odor', 'desc' => 'Trapped food in the filter or sump, or a drainage problem. We clean it out and confirm the dishwasher drains fully.'],
          ['icon' => $ic['board'], 'title' => 'Error codes or dead buttons', 'desc' => 'Unresponsive controls or a fault code usually point to the control panel or main board.'],
        ],
      ],
      'faq' => [
        'eyebrow' => 'FAQ',
        'h2'      => 'Dishwasher repair questions',
        'items'   => [
          ['q' => 'Do you repair built-in and portable dishwashers?', 'a' => 'Yes — built-in, portable, and drawer-style units across all major brands.'],
          ['q' => 'Why is there water left in the bottom after a cycle?', 'a' => 'That is a drainage problem — usually a clogged filter, drain hose, or air gap, or a failed drain pump. It is one of the most common and quickest repairs.'],
          ['q' => 'My dishes come out dirty — can that be fixed?', 'a' => 'Usually yes. We check the spray arms, wash pump, inlet water temperature, and loading. Often it is a clogged spray arm or a worn pump.'],
          ['q' => 'Is it worth repairing a dishwasher?', 'a' => 'If the repair is under roughly half the cost of a new machine and the unit is under about 8–10 years old, repair is usually the better choice.'],
          ['q' => 'How long does the repair take?', 'a' => 'Most repairs are done in a single visit, about 45–90 minutes. If a part must be ordered we generally return within 24–48 hours.'],
          ['q' => 'What about pricing and warranty?', 'a' => 'Pricing is flat-rate and quoted in writing first, and the work is covered by a 3-month parts & labor warranty.'],
        ],
      ],
    ],

    /* ───────────── OVEN / RANGE / STOVE ───────────── */
    'oven' => [
      'problems' => [
        'eyebrow' => 'Common issues we see weekly',
        'h2'      => 'Oven & range problems we repair',
        'intro'   => 'Gas, electric, and dual-fuel ovens, ranges, and wall units. We diagnose heating and control faults safely and get your kitchen back to working temperature.',
        'items'   => [
          ['icon' => $ic['heat'],  'title' => 'Not heating', 'desc' => 'On electric ovens the bake or broil element burns out; on gas, the igniter weakens or the safety valve fails. We test and replace the right part.'],
          ['icon' => $ic['temp'],  'title' => 'Uneven or wrong temperature', 'desc' => 'Food undercooks or burns. Usually a faulty oven temperature sensor or a unit that needs recalibration.'],
          ['icon' => $ic['spark'], 'title' => "Gas burner won't light", 'desc' => 'Clicking with no flame, or a slow light. Typically a worn igniter, a clogged burner, or the safety valve.'],
          ['icon' => $ic['power'], 'title' => "Won't turn on", 'desc' => 'A dark display or dead controls. We check power, wiring, and the control board.'],
          ['icon' => $ic['door'],  'title' => 'Self-clean / door locked', 'desc' => 'The door stays locked or the oven quits after self-clean. Often the door latch motor or a blown thermal fuse.'],
          ['icon' => $ic['flame'], 'title' => 'Broiler not working', 'desc' => 'No heat from the top element or burner. Usually the broil element, igniter, or a relay on the control board.'],
          ['icon' => $ic['board'], 'title' => 'Error / F-codes', 'desc' => 'A fault code on the display. We read it and trace it to the sensor, relay, or board.'],
          ['icon' => $ic['door'],  'title' => "Door won't seal", 'desc' => 'Heat escapes and cook times suffer. We replace the door gasket or realign the hinges.'],
        ],
      ],
      'faq' => [
        'eyebrow' => 'FAQ',
        'h2'      => 'Oven & range repair questions',
        'items'   => [
          ['q' => 'Do you repair gas, electric, and dual-fuel ovens?', 'a' => 'Yes — gas, electric, and dual-fuel ovens, ranges, and built-in wall ovens across all major brands.'],
          ['q' => 'My oven runs hot or cold — can you fix that?', 'a' => 'Yes. That is usually the oven temperature sensor or a calibration issue. We measure actual vs. set temperature and correct it.'],
          ['q' => 'The gas burner clicks but won\'t light — why?', 'a' => 'Most often a worn igniter, a clogged burner port, or the safety valve. We diagnose it safely and replace the faulty part.'],
          ['q' => 'Is oven repair worth it?', 'a' => 'If the repair is under about half the cost of a comparable new unit, repair is usually the smart choice — especially for higher-end ranges that last well past a decade.'],
          ['q' => 'How long does the repair take?', 'a' => 'Most are completed in one visit, around 45–90 minutes. Ordered parts typically arrive within 24–48 hours.'],
          ['q' => 'Pricing and warranty?', 'a' => 'You get a flat-rate written quote first before any work begins, and the work is backed by a 3-month parts & labor warranty.'],
        ],
      ],
    ],

    /* ───────────── COOKTOP ───────────── */
    'cooktop' => [
      'problems' => [
        'eyebrow' => 'Common issues we see weekly',
        'h2'      => 'Cooktop problems we repair',
        'intro'   => 'Gas, induction, and electric cooktops. From a burner that won\'t light to a cracked glass surface, we diagnose the fault and handle gas components safely.',
        'items'   => [
          ['icon' => $ic['spark'], 'title' => "Gas burner won't ignite", 'desc' => 'Clicking with no flame. Usually a clogged burner port, a failed igniter, or a wiring fault on the spark module.'],
          ['icon' => $ic['power'], 'title' => 'Induction not heating', 'desc' => 'No heat or the pan is "not detected." Often the induction coil, the control board, or cookware that is not induction-compatible.'],
          ['icon' => $ic['crack'], 'title' => 'Cracked glass surface', 'desc' => 'A cracked ceramic or glass top is a safety hazard and can short the elements. We replace the cooktop surface.'],
          ['icon' => $ic['heat'],  'title' => "Electric element won't heat", 'desc' => 'A dead burner on a radiant cooktop. Typically a burned-out element, the infinite switch, or a loose connection.'],
          ['icon' => $ic['power'], 'title' => "Won't power on", 'desc' => 'No response from the cooktop. We check power, wiring, and the control board or touch interface.'],
          ['icon' => $ic['gear'],  'title' => 'Knob or control faults', 'desc' => 'A burner stuck on high or unresponsive controls. Usually a failed switch, knob, or spark module.'],
          ['icon' => $ic['flame'], 'title' => 'Gas smell or weak flame', 'desc' => 'A low or yellow flame, or a gas odor. We inspect connections and components — turn off the gas and call us right away if you smell gas.'],
          ['icon' => $ic['board'], 'title' => 'Error codes (induction)', 'desc' => 'A fault code on an induction top. We read it and trace it to the sensor or control board.'],
        ],
      ],
      'faq' => [
        'eyebrow' => 'FAQ',
        'h2'      => 'Cooktop repair questions',
        'items'   => [
          ['q' => 'Do you repair gas, induction, and electric cooktops?', 'a' => 'Yes — all three types, including glass/ceramic radiant tops, across all major brands.'],
          ['q' => 'Can a cracked glass cooktop be replaced?', 'a' => 'Yes. A cracked surface is a safety risk and should not be used. We source and install the correct replacement glass for your model.'],
          ['q' => 'My induction cooktop won\'t heat — what\'s wrong?', 'a' => 'Often it is the cookware (induction needs magnetic-bottom pans), but it can also be the induction coil or control board. We confirm which before quoting.'],
          ['q' => 'I smell gas near my cooktop — what should I do?', 'a' => 'Turn off the cooktop and the gas supply, ventilate the room, and call us — or your gas utility — immediately. We diagnose and repair gas components safely.'],
          ['q' => 'Is it worth repairing a cooktop?', 'a' => 'Usually yes, especially for induction and high-end gas units. If the repair is under roughly half the cost of a new cooktop, repair is the better value.'],
          ['q' => 'Pricing, timing, and warranty?', 'a' => 'Pricing is flat-rate and quoted in writing, most repairs take one visit, and the work carries a 3-month parts & labor warranty.'],
        ],
      ],
    ],
  ];

  return $d;
}
