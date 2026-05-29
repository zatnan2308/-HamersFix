<?php
/**
 * HamersFix — lightweight SEO (title, description, Open Graph, Twitter,
 * canonical). Yields entirely to Yoast / Rank Math / SEOPress / TSF when one
 * of them is active.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/** Is a dedicated SEO plugin handling output? */
function hf_seo_plugin_active() {
  return defined('WPSEO_VERSION')               // Yoast
    || defined('RANK_MATH_VERSION')             // Rank Math
    || defined('SEOPRESS_VERSION')              // SEOPress
    || class_exists('The_SEO_Framework\\Load'); // The SEO Framework
}

/** Best meta description for the current view. */
function hf_meta_description() {
  if (is_front_page()) {
    $d = hf_home('seo_description', '');
    if (!$d) $d = hf_opt('default_description', '');
    if (!$d) $d = hf_home('hero_lede', hf_d('home', 'hero_lede'));
    return wp_strip_all_tags($d);
  }
  if (is_singular()) {
    $d = hf_field('seo_description', '');
    if (!$d) {
      $excerpt = get_the_excerpt();
      $d = $excerpt ? $excerpt : wp_trim_words(wp_strip_all_tags(get_post_field('post_content', get_the_ID())), 30);
    }
    return wp_strip_all_tags($d);
  }
  return wp_strip_all_tags(get_bloginfo('description'));
}

/** Best OG/Twitter image URL for the current view. */
function hf_og_image_url() {
  if (is_singular()) {
    $img = hf_field('seo_image', '');
    if (is_array($img) && !empty($img['url'])) return $img['url'];
    if (has_post_thumbnail()) return (string) get_the_post_thumbnail_url(null, 'full');
  }
  $def = hf_opt('default_og_image', '');
  if (is_array($def) && !empty($def['url'])) return $def['url'];
  if (is_numeric($def)) {
    $u = wp_get_attachment_image_url((int) $def, 'full');
    if ($u) return $u;
  }
  $hero = hf_home('hero_image', hf_d('home', 'hero_image'));
  if (is_array($hero) && !empty($hero['url'])) return $hero['url'];
  if (is_string($hero) && $hero) return $hero;
  return '';
}

/** Use ACF SEO title when set (and no SEO plugin). */
add_filter('pre_get_document_title', function ($title) {
  if ($title !== '' || hf_seo_plugin_active()) return $title;
  if (is_front_page()) {
    $t = hf_home('seo_title', '');
    if ($t) return $t;
  } elseif (is_singular()) {
    $t = hf_field('seo_title', '');
    if ($t) return $t;
  }
  return $title;
});

/** Emit description / canonical / OG / Twitter. */
add_action('wp_head', function () {
  if (hf_seo_plugin_active()) return;

  $desc  = hf_meta_description();
  $title = wp_get_document_title();
  $url   = is_singular() ? get_permalink() : home_url('/');
  $img   = hf_og_image_url();
  $type  = (is_singular() && !is_front_page()) ? 'article' : 'website';

  echo "\n<!-- HamersFix SEO -->\n";
  if ($desc) echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
  echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";

  echo '<meta property="og:type" content="' . esc_attr($type) . '">' . "\n";
  echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
  if ($desc) echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
  echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
  echo '<meta property="og:site_name" content="' . esc_attr(hf_site_title()) . '">' . "\n";
  if ($img) echo '<meta property="og:image" content="' . esc_url($img) . '">' . "\n";

  echo '<meta name="twitter:card" content="' . ($img ? 'summary_large_image' : 'summary') . '">' . "\n";
  echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
  if ($desc) echo '<meta name="twitter:description" content="' . esc_attr($desc) . '">' . "\n";
  if ($img) echo '<meta name="twitter:image" content="' . esc_url($img) . '">' . "\n";
}, 1);
