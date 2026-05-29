<?php
/**
 * Header: <head>, topline, sticky nav, mobile drawer.
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
$hf_favicon = hf_opt('favicon', null);
if (is_array($hf_favicon) && !empty($hf_favicon['url'])) {
  echo '<link rel="icon" href="' . esc_url($hf_favicon['url']) . '">' . "\n";
}
wp_head();
?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a href="#main" class="skip"><?php esc_html_e('Skip to content', 'hamersfix'); ?></a>
<?php
get_template_part('template-parts/header', 'topline');
get_template_part('template-parts/header', 'nav');
get_template_part('template-parts/drawer');
