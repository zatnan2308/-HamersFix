<?php
/**
 * HamersFix — primary navigation config + Residential mega/drawer renderers.
 *
 * The simple nav items are defined here (single source for header + drawer).
 * The "Residential" dropdown is generated from the `service` CPT via
 * hf_get_services() (with a fallback to the design's six default services); its
 * parent links to the Appliance Repair Services landing page while still
 * opening the mega on click/hover.
 *
 * @package HamersFix
 */

if (!defined('ABSPATH')) exit;

/**
 * @return array Primary nav item definitions. Header keeps the design's short
 *               labels; full sitemap names live in page titles/footer.
 */
function hf_primary_nav() {
  return [
    ['key' => 'home',          'label' => __('Home', 'hamersfix'),          'url' => home_url('/')],
    ['key' => 'services',      'label' => __('Residential', 'hamersfix'),   'url' => hf_page_url('appliance-repair-services', '#'), 'mega' => true],
    ['key' => 'commercial',    'label' => __('Commercial', 'hamersfix'),    'url' => hf_page_url('commercial', '#'), 'badge' => 'B2B'],
    ['key' => 'brands',        'label' => __('Brands', 'hamersfix'),        'url' => hf_page_url('brands', '#')],
    ['key' => 'service-areas', 'label' => __('Service Areas', 'hamersfix'), 'url' => hf_page_url('service-areas', '#')],
    ['key' => 'reviews',       'label' => __('Reviews', 'hamersfix'),       'url' => hf_page_url('reviews', '#')],
    ['key' => 'about',         'label' => __('About', 'hamersfix'),         'url' => hf_page_url('about', '#')],
    ['key' => 'contact',       'label' => __('Contact', 'hamersfix'),       'url' => hf_page_url('contact', '#')],
  ];
}

/** True when the given nav key represents the current view (for aria-current). */
function hf_nav_is_current($key) {
  if ($key === 'home') return is_front_page();
  if ($key === 'services') {
    if (is_singular('service')) return true;
    $landing = get_page_by_path('appliance-repair-services');
    return $landing && is_page($landing->ID);
  }
  $page = get_page_by_path($key);
  return $page && is_page($page->ID);
}

/**
 * Render the Residential mega-menu panel (desktop).
 * @return string HTML
 */
function hf_render_residential_mega() {
  $services = hf_get_services();
  $all      = hf_page_url('appliance-repair-services', '');
  ob_start(); ?>
  <div class="mega mega--services" id="mega-services" role="menu">
    <div>
      <p class="mega__title"><?php esc_html_e('Residential appliance repair', 'hamersfix'); ?></p>
      <div class="mega__grid">
        <?php foreach ($services as $s) : ?>
          <a class="mega__item" href="<?php echo esc_url($s['url']); ?>" role="menuitem">
            <div class="ic"><?php echo hf_icon($s['icon']); /* trusted SVG */ ?></div>
            <div>
              <div class="nm"><?php echo esc_html($s['title']); ?></div>
              <div class="ds"><?php echo esc_html($s['short_desc']); ?></div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <?php if ($all) : ?>
        <a class="mega__all" href="<?php echo esc_url($all); ?>" role="menuitem"><?php esc_html_e('View all appliance repair services →', 'hamersfix'); ?></a>
      <?php endif; ?>
    </div>
    <div class="mega__promo">
      <span class="lbl"><?php esc_html_e('Same-day service', 'hamersfix'); ?></span>
      <h4><?php echo esc_html(hf_opt('mega_promo_title', __("Not sure what's broken?", 'hamersfix'))); ?></h4>
      <p><?php echo esc_html(hf_opt('mega_promo_text', __("Call our dispatcher. We'll triage your appliance and quote a flat-rate diagnostic in under 60 seconds.", 'hamersfix'))); ?></p>
      <a class="btn-cta" href="tel:<?php echo esc_attr(hf_phone_link()); ?>" data-call-tracking="mega">
        <svg width="14" height="14" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
        <?php echo esc_html(hf_phone_display()); ?>
      </a>
      <div class="meta"><?php echo esc_html(hf_hours_short()); ?></div>
    </div>
  </div>
  <?php
  return ob_get_clean();
}

/**
 * Render the Residential accordion for the mobile drawer.
 * @return string HTML
 */
function hf_render_residential_drawer() {
  $services = hf_get_services();
  $all      = hf_page_url('appliance-repair-services', '');
  ob_start(); ?>
  <details class="group" open>
    <summary>
      <?php esc_html_e('Residential', 'hamersfix'); ?>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
    </summary>
    <div class="group__body">
      <?php if ($all) : ?>
        <a href="<?php echo esc_url($all); ?>" style="font-weight:700;color:var(--brand-700)"><?php esc_html_e('All appliance repair services', 'hamersfix'); ?></a>
      <?php endif; ?>
      <?php foreach ($services as $s) : ?>
        <a href="<?php echo esc_url($s['url']); ?>">
          <span class="ic"><?php echo hf_icon($s['icon']); /* trusted SVG */ ?></span>
          <?php echo esc_html($s['title']); ?>
          <?php if (!empty($s['job_count'])) : ?><span class="meta"><?php echo esc_html($s['job_count']); ?></span><?php endif; ?>
        </a>
      <?php endforeach; ?>
    </div>
  </details>
  <?php
  return ob_get_clean();
}
