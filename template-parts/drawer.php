<?php
/**
 * Mobile drawer: phone CTA, Residential accordion (from CPT), other links.
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

$hf_nav     = hf_primary_nav();
$hf_phone_l = hf_phone_link();
$hf_phone_d = hf_phone_display();
?>
<div class="drawer-scrim" id="drawerScrim" aria-hidden="true"></div>
<aside class="drawer" id="drawer" aria-label="<?php esc_attr_e('Mobile menu', 'hamersfix'); ?>" aria-hidden="true">
  <div class="drawer__hd">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo"><?php echo hf_logo_html('drawer'); /* trusted */ ?></a>
    <button class="drawer__close" aria-label="<?php esc_attr_e('Close menu', 'hamersfix'); ?>" id="drawerClose">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
    </button>
  </div>
  <div class="drawer__body">
    <div class="drawer__cta">
      <div class="lbl"><?php esc_html_e('Need a tech today?', 'hamersfix'); ?></div>
      <a class="num" href="tel:<?php echo esc_attr($hf_phone_l); ?>">
        <svg width="18" height="18" viewBox="0 0 24 24" class="ic-stroke" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>
        <?php echo esc_html($hf_phone_d); ?>
      </a>
      <div class="hours"><span class="dot"></span><?php echo esc_html(hf_hours_short()); ?></div>
    </div>

    <?php foreach ($hf_nav as $item) :
      if ($item['key'] === 'home') continue;
      if (!empty($item['mega'])) :
        // Render the matching drawer accordion for each mega.
        if ($item['mega'] === 'services')         echo hf_render_residential_drawer();   /* trusted */
        elseif ($item['mega'] === 'maintenance')  echo hf_render_maintenance_drawer();   /* trusted */
        elseif ($item['mega'] === 'about')        echo hf_render_about_drawer();         /* trusted */
        continue;
      endif; ?>
      <a class="group" href="<?php echo esc_url($item['url']); ?>" style="display:flex;justify-content:space-between;padding:16px 4px;font-weight:700;text-decoration:none;color:var(--ink-900)">
        <?php echo esc_html($item['label']); ?>
        <?php if (!empty($item['badge'])) : ?><span style="color:var(--cta-700);font:700 11px/1 var(--ff-mono);letter-spacing:.08em;text-transform:uppercase;background:var(--cta-100);padding:4px 8px;border-radius:4px"><?php echo esc_html($item['badge']); ?></span><?php endif; ?>
      </a>
    <?php endforeach; ?>
  </div>
  <div class="drawer__foot">
    <?php
    $hf_legal = hf_opt_rows('footer_legal_links', hf_defaults()['footer']['legal']);
    $hf_shown = 0;
    foreach ($hf_legal as $l) {
      if ($hf_shown >= 2) break;
      $label = is_array($l) ? (isset($l['label']) ? $l['label'] : '') : $l;
      $url   = is_array($l) ? (isset($l['url']) ? $l['url'] : '#') : '#';
      if (!$label) continue;
      echo '<a href="' . esc_url($url) . '">' . esc_html($label) . '</a>';
      $hf_shown++;
    }
    ?>
  </div>
</aside>
