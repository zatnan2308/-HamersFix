<?php
/**
 * Sticky header: logo, primary nav (with Residential mega from CPT), phone CTA, burger.
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$hf_nav     = hf_primary_nav();
$hf_phone_l = hf_phone_link();
$hf_phone_d = hf_phone_display();
?>
<header class="site-hd" role="banner" id="siteHeader">
  <div class="site-hd__inner">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-hd__logo" aria-label="<?php echo esc_attr(hf_site_title() . ' — ' . __('Home', 'hamersfix')); ?>">
      <?php echo hf_logo_html('header'); /* trusted markup */ ?>
    </a>

    <nav class="site-hd__nav" aria-label="<?php esc_attr_e('Primary', 'hamersfix'); ?>">
      <?php foreach ($hf_nav as $item) :
        $is_current = hf_nav_is_current($item['key']);
        if (!empty($item['mega'])) : ?>
          <div class="nav-item" data-menu="services">
            <button class="nav-item__link" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="mega-services">
              <?php echo esc_html($item['label']); ?>
              <svg class="chev" viewBox="0 0 12 12" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 4.5 6 7.5 9 4.5"/></svg>
            </button>
            <?php echo hf_render_residential_mega(); /* trusted markup */ ?>
          </div>
        <?php else : ?>
          <a class="nav-item__link" href="<?php echo esc_url($item['url']); ?>"<?php echo $is_current ? ' aria-current="page"' : ''; ?>><?php echo esc_html($item['label']); ?></a>
        <?php endif;
      endforeach; ?>
    </nav>

    <div class="site-hd__cta">
      <a class="btn btn--cta" href="tel:<?php echo esc_attr($hf_phone_l); ?>" data-call-tracking="header" aria-label="<?php echo esc_attr(sprintf(__('Call %1$s at %2$s', 'hamersfix'), hf_site_title(), $hf_phone_d)); ?>">
        <svg width="16" height="16" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
        <span><?php echo esc_html($hf_phone_d); ?></span>
      </a>
      <button class="burger" id="burger" aria-label="<?php esc_attr_e('Open menu', 'hamersfix'); ?>" aria-expanded="false" aria-controls="drawer">
        <svg class="icon-open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="4" y1="7" x2="20" y2="7"/><line x1="4" y1="13" x2="20" y2="13"/><line x1="4" y1="19" x2="20" y2="19"/></svg>
        <svg class="icon-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
      </button>
    </div>
  </div>
</header>
