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
