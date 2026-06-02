<?php
/**
 * HamersFix — primary navigation config + mega/drawer renderers.
 *
 * The header has three dropdowns:
 *   • Residential  — appliance repair grid, generated from the `service` CPT
 *                    (fallback to the six design defaults); parent links to the
 *                    Appliance Repair Services landing page.
 *   • Maintenance  — cleaning services (Appliance Deep Cleaning, Air Vent
 *                    Cleaning) from hf_maintenance_items().
 *   • About        — compact link list (About, Brands, Service Areas).
 *
 * Simple items (Home, Commercial, Contact) are plain links. This file is the
 * single source for both the desktop header and the mobile drawer.
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
    ['key' => 'home',       'label' => __('Home', 'hamersfix'),        'url' => home_url('/')],
    ['key' => 'services',   'label' => __('Residential', 'hamersfix'), 'url' => hf_page_url('appliance-repair-services', '#'), 'mega' => 'services'],
    ['key' => 'commercial', 'label' => __('Commercial', 'hamersfix'),  'url' => hf_page_url('commercial', '#'), 'badge' => 'B2B'],
    ['key' => 'maintenance','label' => __('Maintenance', 'hamersfix'), 'url' => hf_page_url('appliance-deep-cleaning', '#'), 'mega' => 'maintenance'],
    ['key' => 'about',      'label' => __('About', 'hamersfix'),       'url' => hf_page_url('about', '#'), 'mega' => 'about'],
    ['key' => 'contact',    'label' => __('Contact', 'hamersfix'),     'url' => hf_page_url('contact', '#')],
  ];
}

/**
 * Cleaning / maintenance services for the Maintenance mega + drawer.
 * @return array[] each: icon, title, short_desc, url
 */
function hf_maintenance_items() {
  return [
    [
      'icon'       => 'clean',
      'title'      => __('Appliance Deep Cleaning', 'hamersfix'),
      'short_desc' => __('Refrigerator & oven · sanitize', 'hamersfix'),
      'url'        => hf_page_url('appliance-deep-cleaning', '#'),
    ],
    [
      'icon'       => 'vent',
      'title'      => __('Air Vent Cleaning', 'hamersfix'),
      'short_desc' => __('Dust removal · better airflow', 'hamersfix'),
      'url'        => hf_page_url('air-vent-cleaning', '#'),
    ],
  ];
}

/**
 * Links for the About mega + drawer accordion.
 * @return array[] each: icon, title, short_desc, url
 */
function hf_about_items() {
  return [
    ['icon' => 'about',  'title' => __('About HamersFix', 'hamersfix'),  'short_desc' => __('Our story, license & team', 'hamersfix'),      'url' => hf_page_url('about', '#')],
    ['icon' => 'brands', 'title' => __('Brands we service', 'hamersfix'), 'short_desc' => __('Sub-Zero, Wolf, Samsung & more', 'hamersfix'), 'url' => hf_page_url('brands', '#')],
    ['icon' => 'areas',  'title' => __('Service areas', 'hamersfix'),     'short_desc' => __('14 cities across NE Georgia', 'hamersfix'),    'url' => hf_page_url('service-areas', '#')],
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
  if ($key === 'maintenance') {
    foreach (['appliance-deep-cleaning', 'air-vent-cleaning'] as $s) {
      $p = get_page_by_path($s);
      if ($p && is_page($p->ID)) return true;
    }
    return false;
  }
  if ($key === 'about') {
    foreach (['about', 'brands', 'service-areas'] as $s) {
      $p = get_page_by_path($s);
      if ($p && is_page($p->ID)) return true;
    }
    return false;
  }
  $page = get_page_by_path($key);
  return $page && is_page($page->ID);
}

/**
 * Dispatch: render the correct mega panel for a nav item's mega type.
 * @param string $type services|maintenance|about
 * @return string HTML
 */
function hf_render_mega($type) {
  switch ($type) {
    case 'services':    return hf_render_residential_mega();
    case 'maintenance': return hf_render_maintenance_mega();
    case 'about':       return hf_render_about_mega();
  }
  return '';
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
 * Render the Maintenance mega-menu panel (desktop).
 * @return string HTML
 */
function hf_render_maintenance_mega() {
  $items = hf_maintenance_items();
  $combo = hf_page_url('appliance-deep-cleaning', '#');
  ob_start(); ?>
  <div class="mega mega--maint" id="mega-maint" role="menu">
    <div>
      <p class="mega__title"><?php esc_html_e('Cleaning & maintenance', 'hamersfix'); ?></p>
      <div class="mega__grid">
        <?php foreach ($items as $s) : ?>
          <a class="mega__item" href="<?php echo esc_url($s['url']); ?>" role="menuitem">
            <div class="ic"><?php echo hf_icon($s['icon']); /* trusted SVG */ ?></div>
            <div>
              <div class="nm"><?php echo esc_html($s['title']); ?></div>
              <div class="ds"><?php echo esc_html($s['short_desc']); ?></div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="mega__promo">
      <span class="lbl"><?php esc_html_e('Bundle & save', 'hamersfix'); ?></span>
      <h4><?php echo esc_html(hf_opt('maint_promo_title', __('Fridge + oven combo', 'hamersfix'))); ?></h4>
      <p><?php echo esc_html(hf_opt('maint_promo_text', __('Book both deep cleans on one visit and save time and money.', 'hamersfix'))); ?></p>
      <a class="btn-cta" href="<?php echo esc_url($combo . '#combo'); ?>"><?php esc_html_e('See the combo →', 'hamersfix'); ?></a>
      <div class="meta"><?php esc_html_e('Safe, family-friendly products', 'hamersfix'); ?></div>
    </div>
  </div>
  <?php
  return ob_get_clean();
}

/**
 * Render the About dropdown panel (desktop).
 * @return string HTML
 */
function hf_render_about_mega() {
  $items = hf_about_items();
  ob_start(); ?>
  <div class="mega mega--about" id="mega-about" role="menu">
    <?php foreach ($items as $s) : ?>
      <a class="mega__item" href="<?php echo esc_url($s['url']); ?>" role="menuitem">
        <div class="ic"><?php echo hf_icon($s['icon']); /* trusted SVG */ ?></div>
        <div>
          <div class="nm"><?php echo esc_html($s['title']); ?></div>
          <div class="ds"><?php echo esc_html($s['short_desc']); ?></div>
        </div>
      </a>
    <?php endforeach; ?>
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

/**
 * Render the Maintenance accordion for the mobile drawer.
 * @return string HTML
 */
function hf_render_maintenance_drawer() {
  $items = hf_maintenance_items();
  ob_start(); ?>
  <details class="group">
    <summary>
      <?php esc_html_e('Maintenance & Cleaning', 'hamersfix'); ?>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
    </summary>
    <div class="group__body">
      <?php foreach ($items as $s) : ?>
        <a href="<?php echo esc_url($s['url']); ?>">
          <span class="ic"><?php echo hf_icon($s['icon']); /* trusted SVG */ ?></span>
          <?php echo esc_html($s['title']); ?>
        </a>
      <?php endforeach; ?>
    </div>
  </details>
  <?php
  return ob_get_clean();
}

/**
 * Render the About accordion for the mobile drawer.
 * @return string HTML
 */
function hf_render_about_drawer() {
  $items = hf_about_items();
  ob_start(); ?>
  <details class="group">
    <summary>
      <?php esc_html_e('About', 'hamersfix'); ?>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
    </summary>
    <div class="group__body">
      <?php foreach ($items as $s) : ?>
        <a href="<?php echo esc_url($s['url']); ?>">
          <span class="ic"><?php echo hf_icon($s['icon']); /* trusted SVG */ ?></span>
          <?php echo esc_html($s['title']); ?>
        </a>
      <?php endforeach; ?>
    </div>
  </details>
  <?php
  return ob_get_clean();
}
