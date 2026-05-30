<?php
/**
 * HamersFix — per-appliance section headings (Problems / Types), extracted
 * verbatim from the Claude Design service mocks. The grids themselves are
 * verbatim partials in template-parts/svc/{problems,types}-<slug>.php.
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

function hf_appliance_grids() {
  static $g = null;
  if ($g !== null) return $g;
  $g = [
    'washer' => [
      'problems' => ['eyebrow' => 'Common issues we see weekly', 'h2' => 'Washer problems we repair', 'intro' => 'The failures we get called for most across Northeast Georgia. Most are fixed in a single same-day visit with parts we carry on the van.'],
      'types'    => ['eyebrow' => 'Pick your style', 'h2' => 'Which washer type do you have?', 'intro' => 'We service every washer configuration — from a stackable apartment unit to a coin-op laundromat bank. Tell our dispatcher yours so the right parts ride along on the first visit.'],
    ],
    'dryer' => [
      'problems' => ['eyebrow' => 'Common issues we see weekly', 'h2' => 'Dryer problems we repair', 'intro' => 'The dryer faults we get called for most. Many are a same-day fix — and most start with a heating element, thermal fuse, or a clogged vent.'],
      'types'    => ['eyebrow' => 'Pick your style', 'h2' => 'Which dryer type do you have?', 'intro' => 'Gas or electric, vented or ventless, full-size or stacked — we service every configuration and bring the right parts for yours.'],
    ],
    'dishwasher' => [
      'problems' => ['eyebrow' => 'Common issues we see weekly', 'h2' => 'Dishwasher problems we repair', 'intro' => 'The faults we get called for most. Most are a single same-day visit — drain pumps, valves, and seals ride on the van.'],
      'types'    => ['eyebrow' => 'Pick your style', 'h2' => 'Which dishwasher type do you have?', 'intro' => 'From a standard 24-inch built-in to a flush panel-ready integrated unit, we service every configuration — including drawer and portable models.'],
    ],
    'oven' => [
      'problems' => ['eyebrow' => 'Common issues we see weekly', 'h2' => 'Oven problems we repair', 'intro' => 'The oven and range faults we get called for most. Most are a same-day fix — bake elements, igniters, and sensors ride on the van.'],
      'types'    => ['eyebrow' => 'Pick your style', 'h2' => 'Which oven or range do you have?', 'intro' => 'Wall oven or freestanding range, gas or electric, single or double — we service every configuration and bring the right parts for yours.'],
    ],
    'cooktop' => [
      'problems' => ['eyebrow' => 'Common issues we see weekly', 'h2' => 'Cooktop problems we repair', 'intro' => 'The cooktop faults we get called for most. Igniters, switches, and induction boards ride on the van for a single-visit fix where possible.'],
      'types'    => ['eyebrow' => 'Pick your style', 'h2' => 'Which cooktop type do you have?', 'intro' => 'Gas, electric coil, radiant glass, or induction — plus downdraft and modular setups. We service every type and bring the right parts for yours.'],
    ],
  ];
  return $g;
}
