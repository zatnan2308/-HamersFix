<?php
/**
 * HamersFix — admin editor behaviour.
 *
 * The section pages are 100% ACF-driven page templates: their content comes
 * from ACF field groups, not the post body, so the block-editor canvas is
 * empty and only adds weight. On heavier pages (e.g. Brands, with a dozen
 * repeater rows) the block editor's REST `context=edit` preload can fail to
 * load on constrained hosting ("the editor won't open"). Forcing the classic
 * editor for these templates makes the edit screen reliable and shows exactly
 * the ACF fields — nothing else.
 *
 * Scope: only our page templates. Normal posts/pages keep the block editor.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/**
 * Fix the admin media uploader failing to open ("wp.media is undefined" /
 * "Cannot read properties of undefined (reading 'query')") with a 404 on a
 * JS resource.
 *
 * Root cause: WordPress concatenates wp-admin scripts and serves them through
 * /wp-admin/load-scripts.php. On some hosting (mod_security, server rules, or
 * the leading-dash repo path) that endpoint 404s, so the media-models/views
 * bundle never loads and wp.media is undefined. Disabling admin-script
 * concatenation makes WordPress load each script as its own file, bypassing the
 * broken endpoint. This runs at theme-load time — before admin scripts print —
 * so the constant is honoured. Harmless: it just means more, smaller requests.
 */
if (is_admin() && !defined('CONCATENATE_SCRIPTS')) {
  define('CONCATENATE_SCRIPTS', false);
}

/**
 * Safety net: never let a textarea field receive an array value.
 *
 * Root cause of a fatal 500 on the Brands edit screen:
 *   PHP Fatal error: htmlspecialchars(): Argument #1 must be string, array
 *   given … esc_textarea() … acf_get_textarea_input()
 * A textarea sub-field (e.g. a repeater "list"/"items"/"cities" column) held an
 * array in the database (written by an earlier demo-import build), so when ACF
 * rendered the edit screen it passed that array to esc_textarea() and the whole
 * page 500'd — which in turn aborted the media JS, so the image button died too.
 *
 * Coercing array → newline-joined string on load makes the edit screen (and the
 * front end) resilient to any such legacy value, with no DB surgery or re-import
 * required. Applies to subfields too (ACF loads each subfield value through
 * acf/load_value). Scalars pass through untouched.
 */
add_filter('acf/load_value/type=textarea', function ($value) {
  if (is_array($value)) {
    $flat = [];
    array_walk_recursive($value, function ($v) use (&$flat) {
      if (is_scalar($v)) $flat[] = (string) $v;
    });
    return implode("\n", $flat);
  }
  return $value;
}, 5);

/**
 * Same guard for plain text fields (defensive; cheap).
 */
add_filter('acf/load_value/type=text', function ($value) {
  if (is_array($value)) {
    $flat = [];
    array_walk_recursive($value, function ($v) use (&$flat) {
      if (is_scalar($v)) $flat[] = (string) $v;
    });
    return implode(', ', $flat);
  }
  return $value;
}, 5);

/** @return string[] Page templates that should use the classic editor. */
function hf_classic_editor_templates() {
  return [
    'template-commercial.php',
    'template-about.php',
    'template-brands.php',
    'template-contact.php',
    'template-service-areas.php',
    'template-services.php',
    'template-reviews.php',
    'template-deep-cleaning.php',
    'template-air-vent.php',
  ];
}

/** Disable the block editor for our ACF-driven page templates. */
add_filter('use_block_editor_for_post', function ($use_block_editor, $post) {
  if ($post && get_post_type($post) === 'page') {
    $tpl = get_page_template_slug($post);
    if ($tpl && in_array($tpl, hf_classic_editor_templates(), true)) {
      return false;
    }
  }
  return $use_block_editor;
}, 10, 2);

/**
 * Belt-and-suspenders: guarantee the WordPress media library JS (wp.media and
 * its models/views — the `media-models`/`media-views`/`media-editor` bundle) is
 * present on every classic post/page edit screen.
 *
 * Symptom this fixes: ACF image fields throw
 *   "Uncaught TypeError: Cannot read properties of undefined (reading 'query')"
 *   in acf-input.min.js (newMediaPopup → addFrameStates), and the "Add Image"
 *   button does nothing — because wp.media.query is missing when the media
 *   backbone never loaded. Calling wp_enqueue_media() on the edit screen forces
 *   that bundle to load. Not gated on the page template (that gate proved too
 *   fragile); harmless where media is already present.
 */
add_action('admin_enqueue_scripts', function ($hook) {
  if ($hook !== 'post.php' && $hook !== 'post-new.php') return;
  if (function_exists('wp_enqueue_media')) {
    wp_enqueue_media();
  }
}, 5);

