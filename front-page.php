<?php
/**
 * Front page — Home. Mirrors mocks/Home-desktop.html section-for-section.
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

get_header();
?>
<main id="main">
  <?php
  get_template_part('template-parts/section/hero');
  get_template_part('template-parts/section/services');
  get_template_part('template-parts/section/steps');
  get_template_part('template-parts/section/brands');
  get_template_part('template-parts/section/reviews');
  get_template_part('template-parts/section/commercial');
  get_template_part('template-parts/section/faq');
  get_template_part('template-parts/section/cta-band');
  ?>
</main>
<?php
get_footer();
