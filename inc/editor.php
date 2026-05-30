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

