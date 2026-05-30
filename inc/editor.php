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
 * Belt-and-suspenders: make sure the WordPress media uploader (wp.media) is
 * present on the edit screens of our ACF-driven page templates. ACF normally
 * enqueues it itself, but on the classic-editor screen for a page that relies
 * entirely on ACF, this guarantees the image-field "Add Image" button can open
 * the media modal even if another plugin/cache interfered with the load order.
 */
add_action('admin_enqueue_scripts', function ($hook) {
  if ($hook !== 'post.php' && $hook !== 'post-new.php') return;

  $post_id = 0;
  if (isset($_GET['post'])) {
    $post_id = (int) $_GET['post'];
  } elseif (isset($GLOBALS['post']) && $GLOBALS['post'] instanceof WP_Post) {
    $post_id = (int) $GLOBALS['post']->ID;
  }
  if (!$post_id) return;
  if (get_post_type($post_id) !== 'page') return;

  $tpl = get_page_template_slug($post_id);
  if ($tpl && in_array($tpl, hf_classic_editor_templates(), true)) {
    if (function_exists('wp_enqueue_media')) {
      wp_enqueue_media();
    }
  }
});

